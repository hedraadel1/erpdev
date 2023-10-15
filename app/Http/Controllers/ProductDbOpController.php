<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductVariation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class ProductDbOpController extends Controller
{
  public function backupProducts(Request $request)  
  {
  
    // Get current authenticated user's business ID
    $business_id = Auth::user()->business_id;
  
    // Get products for this business  
    $products = Product::where('business_id', $business_id)->get();
  
    // Loop through products and get variations
    foreach ($products as $product) {
      $product->variations = ProductVariation::where('product_id', $product->id)->get(); 
    }
  
    // Generate filename
    $fileName = 'products_backup_' . now()->format('Y-m-d_H-i-s') . '.sql'; 
    $sql = "";

    foreach ($products as $product) {
      $sql .= buildProductInsertSql($product);
      
      foreach ($product->variations as $variation) {
        $sql .= buildVariationInsertSql($variation);
      }
    }
  
    // Write SQL file   
    Storage::put($fileName, $sql);

  
    // Offer download
    return response()->download(storage_path($fileName));
  
  }

  public function restoreProducts(Request $request)
  {

    // Validate SQL file
    if (!$this->validSqlFile($request->file)) {
      return Response()->error();
    }

    // Delete existing products for this business

    // Get products for this business
    $business_id = Auth::user()->business_id;
    $products = Product::where('business_id', $business_id)->get();

    // Delete variations for those products
    ProductVariation::whereIn('product_id', $products->pluck('id'))->delete();

    // Delete products
    Product::where('business_id', $business_id)->delete();

    // Run SQL inserts to restore data
    DB::unprepared(file_get_contents($request->file));

    return Response()->success();
  }



  public function deleteProducts(Request $request)
  {

    if (!$request->has('confirmed')) {

      return Response()->json(['success' => false]);

    }

    // Get products for this business
    $business_id = Auth::user()->business_id;
    $products = Product::where('business_id', $business_id)->get();

    // Delete variations for those products
    ProductVariation::whereIn('product_id', $products->pluck('id'))->delete();

    // Delete products
    Product::where('business_id', $business_id)->delete();

    return Response()->json(['success' => true]);

  }

  // Helper functions
  private function buildInsertSQL($products)
  {

    // Build INSERT statements
    $sql = '';

    foreach ($products as $product) {
      $sql .= $this->getInsertStatement($product);

      foreach ($product->variations as $variation) {
        $sql .= $this->getInsertStatement($variation);
      }
    }

    return $sql;
  }

  private function getInsertStatement($model)
  {
    // Build INSERT statement for model
    $data = $model->toArray();

    // Format SQL
    return 'INSERT INTO ' . $model->getTable() . ' (' . implode(",", array_keys($data)) . ') VALUES (' . implode(
      ",",
      array_values($data)
    ) . ');';
  }

  private function validSqlFile($file)
  {

    // Only allow .sql files
    if (pathinfo($file, PATHINFO_EXTENSION) !== 'sql') {
      return false;
    }

    // Validate SQL contains allowed table names
    $allowedTables = ['products', 'product_variations'];
    $contents = file_get_contents($file);
    foreach ($allowedTables as $table) {
      if (stripos($contents, $table) === false) {
        return false;
      }
    }

    return true;
  }

  public function viewOperations()
  {
    $this->middleware('auth');

    return view('business.product_operations');
  }
}