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
    return view('account');
});



Route::get('/users/info', function () {
    if ( Auth::check() ) {
        $user = Auth::user();
        return $user;
    }
});






Route::post('/users', 'UsersController@index')->middleware('admin');
Route::post('/users/update/info', 'UsersController@updateInfo')->middleware('auth');
Route::post('/users/update/password', 'UsersController@updatePassword')->middleware('auth');
//Route::get('/users', 'UsersController@index')->middleware('auth');  // testing  

Route::post('/products', 'ProductsController@store')->middleware('auth');
Route::get('/products/info', 'ProductsController@info');
//Route::get('/products', 'ProductsController@index'); // testing


Route::post('/stocks', 'StocksController@store')->middleware('auth');
Route::get('/stocks', 'StocksController@index'); // testing



Route::get('/sales/daily-report', 'SaleDetailsController@getDailyReport'); // testing
Route::get('/sales/receipt', 'SaleDetailsController@getReceiptById'); // testing
Route::get('/sale-details', 'SaleDetailsController@index'); // testing


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/admin', function(){})->middleware('admin');

Auth::routes();







