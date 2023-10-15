<?php

Route::get('/pricing', 'Modules\Superadmin\Http\Controllers\PricingController@index')->name('pricing');

Route::group(['middleware' => ['web', 'auth', 'language', 'AdminSidebarMenu', 'superadmin'], 'prefix' => 'superadmin', 'namespace' => 'Modules\Superadmin\Http\Controllers'], function () {
    Route::get('/install', 'InstallController@index');
    Route::get('/install/update', 'InstallController@update');
    Route::get('/install/uninstall', 'InstallController@uninstall');

    Route::get('/', 'SuperadminController@index');
    Route::get('/stats', 'SuperadminController@stats');

    Route::get('/{business_id}/toggle-active/{is_active}', 'BusinessController@toggleActive');
    Route::get('/{business_id}/toggle-isold/{is_old}', 'BusinessController@toggleISold');

    Route::get('/users/{business_id}', 'BusinessController@usersList');
    Route::post('/update-password', 'BusinessController@updatePassword');


    Route::resource('/business', 'BusinessController');
    Route::get('/business/{id}/destroy', 'BusinessController@destroy');

    Route::resource('/packages', 'PackagesController');
    Route::get('/packages/{id}/destroy', 'PackagesController@destroy');

    Route::get('/settings', 'SuperadminSettingsController@edit');
    Route::put('/settings', 'SuperadminSettingsController@update');
    Route::get('/edit-subscription/{id}', 'SuperadminSubscriptionsController@editSubscription');
    Route::post('/update-subscription', 'SuperadminSubscriptionsController@updateSubscription');
    Route::resource('/superadmin-subscription', 'SuperadminSubscriptionsController');

    Route::get('/communicator', 'CommunicatorController@index');
    Route::post('/communicator/send', 'CommunicatorController@send');
    Route::get('/communicator/get-history', 'CommunicatorController@getHistory');


    Route::resource('/categories', 'BusinessCategoryController');


    Route::resource('/frontend-pages', 'PageController');
    Route::resource('/products', 'SuperadminProductController');
});

Route::group([
    'middleware' => ['web', 'SetSessionData', 'auth', 'language', 'timezone', 'AdminSidebarMenu'],
    'namespace' => 'Modules\Superadmin\Http\Controllers'
], function () {


    //Server Subscruption Start 

    Route::get('/all-server-subscriptions', 'Server_SubscriptionsController@allSubscriptions');

    // Route::get('/server-typeedit/{id}', 'ServerTypeController@edit');

    Route::get('/server-types', 'ServerTypeController@index');
    Route::resource('/server-types', 'ServerTypeController');

    Route::put('/server-types/{id}/edit', 'ServerTypeController@update')->name('server-types.update');
    Route::get('/erver-types/{id}/destroy', 'ServerTypeController@destroy');

    Route::resource('/user-server-subscription', 'Server_SubscriptionsController');
    Route::resource('/server-subscription', 'Server_SubscriptionsController');
    //Server Subscruption E n D 

  Route::resource('/education-learn', 'EducationCategoryController');
  Route::resource('/settings/go-fast', 'SettingGoFastController');


    // Superadmin Server
    /*   Route::get('/sersupbscr', 'SerSuperadminSubscriptionsController@index'); */
    /* Route::get('/addserversub/create', 'SerSuperadminSubscriptionsController@create'); */

    Route::get('/ser-edit-subscription/{id}', 'SerSuperadminSubscriptionsController@editSubscription');

    Route::post('/ser-ser-update-subscription', 'SerSuperadminSubscriptionsController@updateSubscription');

    Route::resource('/addserversubstore', 'SerSuperadminSubscriptionsController');

    // End Superadmin Server


    Route::resource('/wallets', 'WalletController');


    //Routes related to paypal checkout
    Route::get('/subscription/{package_id}/paypal-express-checkout', 'SubscriptionController@paypalExpressCheckout');

    Route::get('/subscription/post-flutterwave-payment', 'SubscriptionController@postFlutterwavePaymentCallback');

    Route::post('/subscription/pay-stack', 'SubscriptionController@getRedirectToPaystack');
    Route::get('/subscription/post-payment-pay-stack-callback', 'SubscriptionController@postPaymentPaystackCallback');

    //Routes related to pesapal checkout
    Route::get('/subscription/{package_id}/pesapal-callback', ['as' => 'pesapalCallback', 'uses' => 'SubscriptionController@pesapalCallback']);

    Route::get('/subscription/{package_id}/pay', 'SubscriptionController@pay');
    Route::any('/subscription/{package_id}/confirm', 'SubscriptionController@confirm')->name('subscription-confirm');
    Route::get('/all-subscriptions', 'SubscriptionController@allSubscriptions');

    Route::get('/subscription/{package_id}/register-pay', 'SubscriptionController@registerPay')->name('register-pay');
    Route::resource('/products', 'SuperadminProductController');
    Route::resource('/subscription', 'SubscriptionController');


    Route::get('/brand-store', 'SuperadminProductController@getBrandStore');
    Route::get('/brand-store_ifram', 'SuperadminProductController@getBrandStoreIfram');
    Route::get('/brand-store/pproduct-details/{id}', 'SuperadminProductController@productDetails');
    Route::get('/products-delete-media/{id}', 'SuperadminProductController@deleteMedia');
    Route::get('/products-short-create', 'SuperadminProductController@shortCreate');
    Route::get('/products-cheak-duration', 'SuperadminProductController@checkDuration');
    Route::post('/products-storeProduct', 'SuperadminProductController@storeProduct');
    Route::post('/products-payProduct', 'SuperadminProductController@payProduct');
    Route::get('/products/business-products/{id}', 'SuperadminProductController@showBusinessProduct');
    Route::get('/products/delete-product/{id}', 'SuperadminProductController@deleteProduct');
    Route::post('/products-hideProduct', 'SuperadminProductController@hideProduct');

    Route::post('deposit_requests/saveImage', 'DepositRequestController@saveImage');
    Route::get('superadmin/deposit_requests', 'DepositRequestController@getAllDepositRequests');
    Route::get('image-modal/{id}', 'DepositRequestController@showImageModal');
    Route::post('approved/deposit_requests', 'DepositRequestController@approvedDepositRequests');

    Route::post('business/requestPassCode', 'DepositRequestController@requestPassCode');
    Route::get('business/getCodeValue', 'DepositRequestController@getCodeValue');
    Route::resource('/superadmin/deposit_requests_code', 'DepositRequestCodeController');
    Route::post('/superadmin/code-status', 'DepositRequestCodeController@toggleStatus');

    Route::get('/contents', 'ContentController@index');
    Route::post('/contents', 'ContentController@store');



    Route::resource('/settings/whatsapp-notification', 'WhatsappNotificationController');
    Route::post('/settings/whatsapp-notification-status', 'WhatsappNotificationController@toggleStatus');
    Route::get('/settings/check-whatsapp-message', 'WhatsappNotificationController@checkWhatsappMessage');
    Route::get('/settings/sendMessagemanual', 'WhatsappNotificationController@sendMessagemanual');
    Route::post('/settings/sendMessage1', 'WhatsappNotificationController@checkWhatsappmanual');


  //DepositRequest
  Route::resource('/business/deposit_requests', 'DepositRequestController');
  Route::get('business/requestByCode', 'DepositRequestController@requestByCode');
  Route::post('business/requestPassCode', 'DepositRequestController@requestPassCode');
  Route::get('business/getCodeValue', 'DepositRequestController@getCodeValue');
  Route::resource('/superadmin/deposit_requests_code', 'DepositRequestCodeController');
  Route::post('/superadmin/code-status', 'DepositRequestCodeController@toggleStatus');

});

Route::get('/page/{slug}', 'Modules\Superadmin\Http\Controllers\PageController@showPage')->name('frontend-pages');
