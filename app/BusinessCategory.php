<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
   
  protected $table = "business_categories";
  protected $hidden = [];
  
  
  protected $fillable = [
      "name",
      "description",
  ];


    
}
