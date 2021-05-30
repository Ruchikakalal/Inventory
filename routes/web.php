<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => 'auth'], function () {

    Route::resources([
        'users' => 'UserController',
        'providers' => 'ProviderController',
        'inventory/products' => 'ProductController',
        'inventory/orders' => 'OrderController',
    ]);
    
    Route::post('home/index', ['as' => 'home.index', 'uses' => 'HomeController@index']);

    Route::get('inventory/product/add', ['as' => 'product.add', 'uses' => 'ProductController@create']);
    Route::post('inventory/product/store', ['as' => 'product.store', 'uses' => 'ProductController@store']);
    Route::get('inventory/product/edit', ['as' => 'product.edit', 'uses' => 'ProductController@edit']);
    Route::get('inventory/product/show', ['as' => 'product.show', 'uses' => 'ProductController@show']);

    Route::get('inventory/order/add', ['as' => 'order.add', 'uses' => 'OrderController@create']);
    Route::post('inventory/order/store', ['as' => 'order.store', 'uses' => 'OrderController@store']);
    Route::get('inventory/order/order/{id}', ['as' => 'order.order', 'uses' => 'OrderController@order']);
    Route::post('inventory/order/edit', ['as' => 'order.edit', 'uses' => 'OrderController@edit']);
    Route::post('inventory/order/update', ['as' => 'order.update', 'uses' => 'OrderController@update']);

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::match(['put', 'patch'], 'profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::match(['put', 'patch'], 'profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
    Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
    Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
    Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
});
