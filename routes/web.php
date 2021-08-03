<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

//Route::group(['middleware' => 'auth'], function () {
    // Route::resource('adpacks', 'AdpacksController'); 
    Route::redirect('/', '/dashboard');
    Route::get('/customer', 'App\Http\Controllers\CustomerController@index');
    Route::get('/customer/{customer}/edit', 'App\Http\Controllers\CustomerController@edit');
    Route::get('/customer/create', 'App\Http\Controllers\CustomerController@create');
    Route::put('/customer/create', 'App\Http\Controllers\CustomerController@store');
    Route::put('/customer/{customer}/edit', 'App\Http\Controllers\CustomerController@update');
    Route::get('/ship', 'App\Http\Controllers\ShipController@index');
    Route::get('/ship/create', 'App\Http\Controllers\ShipController@create');
    Route::put('/ship/create', 'App\Http\Controllers\ShipController@createOrUpdateShip');
    Route::get('/ship/{ship}/edit', 'App\Http\Controllers\ShipController@edit');
    Route::put('/ship/{ship}/edit', 'App\Http\Controllers\ShipController@createOrUpdateShip');
    Route::get('/quotation', 'App\Http\Controllers\QuotationController@index');
    Route::get('/quotation/create', 'App\Http\Controllers\QuotationController@create');
    Route::put('/quotation/create', 'App\Http\Controllers\QuotationController@store');
    Route::get('/quotation/{quotation}', 'App\Http\Controllers\QuotationController@show');
    Route::get('/quotation/{quotation}/edit', 'App\Http\Controllers\QuotationController@edit');
    Route::put('/quotation/{quotation}/edit', 'App\Http\Controllers\QuotationController@update');
    Route::get('/sales', 'App\Http\Controllers\SalesController@index');
    Route::get('/sales/create', 'App\Http\Controllers\SalesController@create');
    Route::put('/sales/create', 'App\Http\Controllers\SalesController@store');
    Route::get('/sales/{sales}', 'App\Http\Controllers\SalesController@show');
    Route::get('/sales/{sales}/edit', 'App\Http\Controllers\SalesController@edit');
    Route::put('/sales/{sales}/edit', 'App\Http\Controllers\SalesController@update');
    Route::get('/name', function () {
        return view('admin.name');
    });

    Route::resource("/name/sales_company_classification", "App\Http\Controllers\SalesCompanyClassificationController")->except('show');
    Route::resource("/name/service_store", "App\Http\Controllers\OutsourcedServiceStoreController")->except('show');
    Route::resource("/name/sales_in_charge", "App\Http\Controllers\SalesInChargeController")->except('show');
    Route::resource("/name/service_in_charge", "App\Http\Controllers\ServiceInChargeController")->except('show');
    Route::resource("/name/engine_model_list", "App\Http\Controllers\EngineModelController")->except('show');
    Route::resource("/name/storage_marina", "App\Http\Controllers\StorageMarinaController")->except('show');
    Route::resource("/name/type_classification" , 'App\Http\Controllers\TypeClassificationController')->except("show");
    Route::resource("/name/sales_category" , "App\Http\Controllers\SalesCategoryController")->except('show');
    Route::resource("/name/expense_detail" ,"App\Http\Controllers\ExpenseDetailController")->except('show');
    Route::resource("/name/estimate_delivery_date" , "App\Http\Controllers\DeliveryDateController")->except('show');
    Route::resource("/name/estimate_payment_terms" , "App\Http\Controllers\PaymentTermController")->except('show');
    Route::resource("/name/estimated_delivery_place", "App\Http\Controllers\DeliveryPlaceController")->except('show');
    Route::resource("/name/job_title", "App\Http\Controllers\JobTitleController")->except('show');
    Route::resource("/name/limited_coastal_area", "App\Http\Controllers\CoastalAreaController")->except('show');
    Route::resource("/name/navigation_area", 'App\Http\Controllers\NavigationAreaController')->except('show');
    Route::resource("/name/ship_type", "App\Http\Controllers\ShipTypeController")->except('show');
    Route::resource("/name/use_ship", "App\Http\Controllers\UseShipController")->except('show');
    Route::resource("/name/ship_special_name", "App\Http\Controllers\ShipNameController")->except('show');
    Route::resource("/boat", "App\Http\Controllers\BoatTypeMasterController")->except('show');

    #Route::resource("/name/", "App\Http\Controllers\\")->except('show');

   # Route::get('/boat', 'App\Http\Controllers\BoatTypeMasterController@index');
    Route::get('/base', "App\Http\Controllers\BaseController@index");
    Route::put('/base', "App\Http\Controllers\BaseController@update");
    Route::get('/consumption_tax', "App\Http\Controllers\ConsumptionTaxController@index");
    Route::post('/consumption_tax', "App\Http\Controllers\ConsumptionTaxController@store");
    // Route::resource('adpacks', 'AdpacksController'); 
    //
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::get('/password_change', "App\Http\Controllers\PasswordChangeController@index");
    Route::post('/password_change', "App\Http\Controllers\PasswordChangeController@changePassword");
//});
Auth::routes(['register' => false, 'confirm' => false, 'reset' => false, 'verify' => false]);
