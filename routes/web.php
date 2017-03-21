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

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::resource('dishes', 'DishController');

Route::resource('orders', 'OrdersController');

Route::post('cart', 'OrdersController@addToCart')->name('cart.add');

Route::delete('cart', 'OrdersController@clearCart')->name('cart.clear');

Route::get('cart', 'OrdersController@checkout')->name('cart.checkout');

Route::get('checkout', 'OrdersController@carToOrder')->name('cart.to_order');

Route::get('checkout/delete/{id}', 'OrdersController@deleteItem')->name('cart.delete_item');

Route::resource('tables', 'TableController');