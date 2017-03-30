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

Route::get('/', 'DishController@index');

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

Route::post('cart/reservation', 'CheckoutController@store')->name('checkout.store');

Route::get('cart/confirm', 'CheckoutController@confirm')->name('checkout.confirm');

Route::get('profile', 'UserController@profile')->name('profile')->middleware('auth');

Route::put('profile', 'UserController@update')->name('profile.update')->middleware('auth');

Route::delete('orders/line/{id}/destroy', 'OrdersController@destroyLine')->name('orders.line_destroy');

Route::put('orders/{id}/add-dish', 'OrdersController@addToOrder')->name('orders.add_dish');

Route::resource('contacts', 'ContactController');

Route::resource('users', 'UserController');
