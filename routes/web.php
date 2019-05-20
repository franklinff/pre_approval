<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'Auth\LoginController@login_user')->name('login');
Route::get('/loginUser', 'Auth\LoginController@loginUser')->name('loginUser');
Route::get('/registerUser', 'Auth\LoginController@registerUser')->name('registerUser');
Route::get('/logout', 'Auth\LoginController@logout')->name('user.logout');
//Route::resource('/role', 'RoleController');

Route::group(['middleware' => ['check-permission']], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/company/delete/{id}', 'CompanyController@delete')->name('company.delete');
    Route::resource('/company', 'CompanyController');
    Route::get('/vendor/delete/{id}', 'VendorController@delete')->name('vendor.delete');
    Route::resource('/vendor', 'VendorController');
    Route::get('/delivery_location/delete/{id}', 'DeliveryLocationController@delete')->name('delivery_location.delete');
    Route::resource('/delivery_location', 'DeliveryLocationController');
    Route::get('/role/delete/{id}', 'RoleController@delete')->name('role.delete');
    Route::resource('/role', 'RoleController');
    Route::resource('/pr_number', 'PRnumberController');
    Route::resource('/po_number', 'POnumberController');

    Route::get('/pr_items/delete/{id}', 'PRitemsController@delete')->name('pr_items.delete');
    Route::resource('/pr_items', 'PRitemsController');

    Route::resource('/user', 'UserController');
//    Route::get('/terms_of_delivery/delete/{id}', 'TermsOfDeliveryController@delete')->name('terms_of_delivery.delete');
//    Route::resource('/terms_of_delivery', 'TermsOfDeliveryController');
//    Route::get('generate-pdf','DeliveryLocationController@generatePDF');
    Route::get('purchase-order/{pr_number_id}/get-pdf','DeliveryLocationController@generatePDF')
        ->name('generate.purchase_order_pdf');
});



//Route::get('/index', 'HomeController@index')->name('index');

