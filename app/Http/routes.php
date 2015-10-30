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

//rotas
Route::get('home', 'HomeController@index');
Route::get('', 'HomeController@index');

Route::group(['prefix'=>'admin', 'middleware'=>'auth.checkrole', 'as'=>'admin.'], function() {

    Route::get('',['as'=>'dashboard.index', 'uses'=>'DashboardController@index']);
    Route::get('dashboard',['as'=>'dashboard.index', 'uses'=>'DashboardController@index']);

    Route::get('categories',['as'=>'categories.index', 'uses'=>'CategoriesController@index']);
    Route::get('categories/create',['as'=>'categories.create', 'uses'=>'CategoriesController@create']);
    Route::post('categories/store',['as'=>'categories.store', 'uses'=>'CategoriesController@store']);
    Route::get('categories/edit/{id}',['as'=>'categories.edit', 'uses'=>'CategoriesController@edit']);
    Route::put('categories/update/{id}',['as'=>'categories.update', 'uses'=>'CategoriesController@update']);
    Route::get('categories/destroy/{id}/{status}',['as'=>'categories.destroy', 'uses'=>'CategoriesController@destroy']);

    Route::get('products',['as'=>'products.index', 'uses'=>'ProductsController@index']);
    Route::get('products/create',['as'=>'products.create', 'uses'=>'ProductsController@create']);
    Route::post('products/store',['as'=>'products.store', 'uses'=>'ProductsController@store']);
    Route::get('products/edit/{id}',['as'=>'products.edit', 'uses'=>'ProductsController@edit']);
    Route::put('products/update/{id}',['as'=>'products.update', 'uses'=>'ProductsController@update']);
    Route::get('products/destroy/{id}/{status}',['as'=>'products.destroy', 'uses'=>'ProductsController@destroy']);

    Route::get('clients',['as'=>'clients.index', 'uses'=>'ClientsController@index']);
    Route::get('clients/create',['as'=>'clients.create', 'uses'=>'ClientsController@create']);
    Route::post('clients/store',['as'=>'clients.store', 'uses'=>'ClientsController@store']);
    Route::get('clients/edit/{id}',['as'=>'clients.edit', 'uses'=>'ClientsController@edit']);
    Route::put('clients/update/{id}',['as'=>'clients.update', 'uses'=>'ClientsController@update']);
    Route::get('clients/destroy/{id}/{status}',['as'=>'clients.destroy', 'uses'=>'ClientsController@destroy']);

    Route::get('orders',['as'=>'orders.index', 'uses'=>'OrdersController@index']);
    Route::get('orders/filter/{status}',['as'=>'orders.filter', 'uses'=>'OrdersController@filter']);
    Route::get('orders/create',['as'=>'orders.create', 'uses'=>'OrdersController@create']);
    Route::post('orders/store',['as'=>'orders.store', 'uses'=>'OrdersController@store']);
    Route::get('orders/edit/{id}',['as'=>'orders.edit', 'uses'=>'OrdersController@edit']);
    Route::put('orders/update/{id}',['as'=>'orders.update', 'uses'=>'OrdersController@update']);
    Route::get('orders/destroy/{id}/{status}',['as'=>'orders.destroy', 'uses'=>'OrdersController@destroy']);
    Route::post('orders/status/{id}',['as'=>'orders.status', 'uses'=>'OrdersController@status']);

    Route::get('cupoms',['as'=>'cupoms.index', 'uses'=>'CupomsController@index']);
    Route::get('cupoms/create',['as'=>'cupoms.create', 'uses'=>'CupomsController@create']);
    Route::post('cupoms/store',['as'=>'cupoms.store', 'uses'=>'CupomsController@store']);
    Route::get('cupoms/edit/{id}',['as'=>'cupoms.edit', 'uses'=>'CupomsController@edit']);
    Route::put('cupoms/update/{id}',['as'=>'cupoms.update', 'uses'=>'CupomsController@update']);
    Route::get('cupoms/destroy/{id}/{used}',['as'=>'cupoms.destroy', 'uses'=>'CupomsController@destroy']);
});

Route::group(['prefix'=>'customer', 'as'=>'customer.'], function() {

    Route::get('order', ['as' => 'order.index', 'uses' => 'CheckoutController@index']);
    Route::get('order/create', ['as' => 'order.create', 'uses' => 'CheckoutController@create']);
    Route::post('order/store', ['as' => 'order.store', 'uses' => 'CheckoutController@store']);

});

Route::get('/charts', function()
{
    return View::make('mcharts');
});
Route::get('/tables', function()
{
    return View::make('table');
});
Route::get('/forms', function()
{
    return View::make('form');
});
Route::get('/grid', function()
{
    return View::make('grid');
});
Route::get('/buttons', function()
{
    return View::make('buttons');
});
Route::get('/icons', function()
{
    return View::make('icons');
});
Route::get('/panels', function()
{
    return View::make('panel');
});
Route::get('/typography', function()
{
    return View::make('typography');
});
Route::get('/notifications', function()
{
    return View::make('notifications');
});
Route::get('/blank', function()
{
    return View::make('blank');
});
Route::get('/documentation', function()
{
    return View::make('documentation');
});