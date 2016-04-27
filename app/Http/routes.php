<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth.checkrole',  'as' => 'admin.'], function(){

    Route::get('/categories',['as' => 'categories.index', 'uses' =>'CategoriesController@index']);
    Route::get('/categories/create',['as' => 'categories.create', 'uses' =>'CategoriesController@create']);
    Route::post('/categories/store',['as' => 'categories.store', 'uses' =>'CategoriesController@store']);
    Route::get('/categories/{id}/edit',['as' => 'categories.edit', 'uses' =>'CategoriesController@edit']);
    Route::put('/categories/{id}/update',['as' => 'categories.update', 'uses' =>'CategoriesController@update']);

    Route::get('/products',['as' => 'products.index', 'uses' =>'ProductsController@index']);
    Route::get('/products/create',['as' => 'products.create', 'uses' =>'ProductsController@create']);
    Route::post('/products/store',['as' => 'products.store', 'uses' =>'ProductsController@store']);
    Route::get('/products/{id}/edit',['as' => 'products.edit', 'uses' =>'ProductsController@edit']);
    Route::put('/products/{id}/update',['as' => 'products.update', 'uses' =>'ProductsController@update']);
    Route::get('/products/{id}/destroy',['as' => 'products.destroy', 'uses' =>'ProductsController@destroy']);

    Route::get('/clients',['as' => 'clients.index', 'uses' =>'ClientsController@index']);
    Route::get('/clients/create',['as' => 'clients.create', 'uses' =>'ClientsController@create']);
    Route::post('/clients/store',['as' => 'clients.store', 'uses' =>'ClientsController@store']);
    Route::get('/clients/{id}/edit',['as' => 'clients.edit', 'uses' =>'ClientsController@edit']);
    Route::put('/clients/{id}/update',['as' => 'clients.update', 'uses' =>'ClientsController@update']);
    Route::get('/clients/{id}/destroy',['as' => 'clients.destroy', 'uses' =>'ClientsController@destroy']);

    Route::get('/orders',['as' => 'orders.index', 'uses' =>'OrdersController@index']);
    Route::get('/orders/create',['as' => 'orders.create', 'uses' =>'OrdersController@create']);
    Route::post('/orders/store',['as' => 'orders.store', 'uses' =>'OrdersController@store']);
    Route::get('/orders/{id}/edit',['as' => 'orders.edit', 'uses' =>'OrdersController@edit']);
    Route::put('/orders/{id}/update',['as' => 'orders.update', 'uses' =>'OrdersController@update']);
    Route::get('/orders/{id}/destroy',['as' => 'orders.destroy', 'uses' =>'OrdersController@destroy']);

});


