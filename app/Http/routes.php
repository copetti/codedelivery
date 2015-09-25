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

Route::group(['prefix'=>'admin', 'as'=>'admin.'], function() {
    Route::get('categories',['as'=>'categories.index', 'uses'=>'CategoriesController@index']);
    Route::get('categories/create',['as'=>'categories.create', 'uses'=>'CategoriesController@create']);
    Route::post('categories/store',['as'=>'categories.store', 'uses'=>'CategoriesController@store']);
    Route::get('categories/edit/{id}',['as'=>'categories.edit', 'uses'=>'CategoriesController@edit']);
    Route::put('categories/update/{id}',['as'=>'categories.update', 'uses'=>'CategoriesController@update']);
    Route::post('categories/destroy/{id}',['as'=>'categories.destroy', 'uses'=>'CategoriesController@destroy']);
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