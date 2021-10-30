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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/product');
    }
    return view('newlogin');
})->name('login');
Route::get('dashboard', 'AdminController@index');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');


// product route
Route::get('/product','ProductController@index');
Route::get('product_form/{id}','ProductController@create');
Route::post('product_insert','ProductController@store');
Route::put('product_update/{id}','ProductController@update');
Route::put('product_delete/{id}','ProductController@destroy');

// stock route
Route::get('/stock','StockController@index');
Route::get('stock_form/{id}','StockController@create');
Route::put('stock_delete/{id}','StockController@destroy');



// sale route
Route::get('/sale','SaleController@index');
Route::get('/sale_form/{id}','SaleController@create');
Route::post('sale_insert','SaleController@store');
Route::put('sale_update/{id}','SaleController@update');
Route::put('sale_delete/{id}','SaleController@destroy');
Route::get('search_date/{date}','SaleController@Search');
Route::get('search_between_dates','SaleController@SearchDates');
Route::get('search','SaleController@show');
Route::post('check_serial_number','SaleController@CheckNumber');
Route::post('check_engine_number','SaleController@CheckEngineNumber');

//bank account route
Route::get('/bank_account','BankAccountController@index');
Route::get('/bank_account_form/{id}','BankAccountController@create');

// change password
Route::get('/change_password','ChangeCredentialsController@changeUserPassword');
Route::get('/change_username','ChangeCredentialsController@changeUsername');
Route::put('/change_password','ChangeCredentialsController@ChangePassword');
Route::put('/change_username','ChangeCredentialsController@Username');

// purchase 
Route::get('/purchase/{filter}','PurchaseController@index');
Route::get('purchase_form/{id}','PurchaseController@create');
Route::post('purchase_insert','PurchaseController@store');
Route::put('purchase_update/{id}','PurchaseController@update');
Route::put('purchase_delete/{id}','PurchaseController@destroy');
Route::get('search_dates/{date}','PurchaseController@Search');
Route::get('search_between_dates','PurchaseController@SearchDates');

// client
Route::get('/client','ClientController@index');
Route::get('client_form/{id}','ClientController@create');
Route::post('client_insert','ClientController@store');
Route::put('client_update/{id}','ClientController@update');
Route::put('client_delete/{id}','ClientController@destroy');

// cashflow
Route::get('/get_client','CashFlowController@index')->middleware('auth');
Route::get('/ledger_create/{id}','CashFlowController@create')->middleware('auth');
Route::get('/ledger','CashFlowController@view')->middleware('auth');
Route::PUT('/update_ledger/{id}','CashFlowController@update')->middleware('auth');
Route::PUT('ledger_delete/{id}','CashFlowController@destroy')->middleware('auth');
Route::Post('/save_transaction','CashFlowController@SaveTransaction')->middleware('auth');

// Route::get('/invoice','CashFlowController@SaveTransaction')->middleware('auth');

// sale summary
Route::get('/sale_summary/{id}','SaleController@SaleSummary');
Route::post('/receive_installment_store','SaleController@ReceiveInstallment');


// cashflow search
Route::get("cash_flow_search",'CashFlowController@search');