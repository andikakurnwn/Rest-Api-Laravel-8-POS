<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login', 'AuthController@login')->name('api.login');
Route::post('register', 'AuthController@register')->name('api.register');

Route::get('products', 'ProductController@index')->name('api.products');
Route::get('products/{id}', 'ProductController@detail')->name('api.product.detail');

Route::get('/category/{slug}', 'ProductController@productByCategory')->name('category.product');

Route::group(['as' => 'customer.', 'prefix' => 'customer', 'namespace' => 'Customer', 'middleware' => ['auth:api', 'customer']], function(){

    Route::get('profile', 'SettingController@profile')->name('profile');
    Route::put('profile-update', 'SettingController@updateProfile')->name('profile.update');
    Route::get('password-update', 'SettingController@updatePassword')->name('password.update');

    Route::get('cart', 'CartController@index')->name('cart.index');
    Route::post('cart', 'CartController@store')->name('cart.store');
    Route::delete('cart/{cart}', 'CartController@destroy')->name('cart.destroy');

    Route::get('history-transaction', 'TransactionController@history')->name('transaction.history');
    Route::get('pending-transaction', 'TransactionController@pendingTransaction')->name('transaction.pending');
    Route::post('checkOut', 'TransactionController@checkOut')->name('transaction.checkOut');
    Route::post('store','TransactionController@store')->name('transaction.store');

});

Route::group(['as' => 'cashier.', 'prefix' => 'cashier', 'namespace' => 'Cashier', 'middleware' => ['auth:api', 'cashier']], function(){

    Route::get('profile', 'SettingController@profile')->name('profile');
    Route::put('profile-update', 'SettingController@updateProfile')->name('profile.update');
    Route::get('password-update', 'SettingController@updatePassword')->name('password.update');

    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

    Route::resource('product', 'ProductController');
    Route::post('product/storeImage/{product}', 'ProductController@storeImage')->name('product.storeImage');
    Route::delete('product/desroyImage/{image}', 'ProductController@desroyImage')->name('product.desroyImage');
    Route::post('product/storeWithVariations', 'ProductController@storeWithVariations')->name('product.storeWithVariations');
    Route::put('product/updateWithVariations/{product}', 'ProductController@updateWithVariations')->name('product.updateWithVariations');
    Route::resource('category', 'CategoryController');


});

