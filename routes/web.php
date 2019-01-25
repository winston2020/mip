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
//Route::get('sitemap{page}.xml','SiteMapController@index');
//Route::get('/','HomeController@index')->middleware('cache.response:420');
//Route::get('{nav}/','HomeController@list')->middleware('cache.response:420');
//Route::get('{nav}/{id}.html','HomeController@show')->middleware('cache.response:40000000000');
Route::get('sitemap{page}.xml','SiteMapController@index');
Route::get('/','HomeController@index');
Route::get('{nav}/','HomeController@list')->middleware('cache.response:420');
Route::get('{nav}/{id}.html','HomeController@show')->middleware('cache.response:40000000000');
