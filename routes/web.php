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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::get('threads', 'ThreadsController@index')->name('all_threads');
Route::get('threads/create', 'ThreadsController@create');
Route::get('threads/{channel}', 'ThreadsController@index')->name('threads_channel');
Route::get('threads/{thread}', 'ThreadsController@show');
Route::get('threads/{channel}/{thread}', 'ThreadsController@show')->name('home');

Route::post('threads', 'ThreadsController@store');
Route::post('threads/{channel}/{thread}/replies', 'RepliesController@store')->name('store_reply');
Route::post('replies/{reply}/favorites', "FavoritesController@store")->name('submit_reply');

Route::get('home', 'HomeController@index')->name('home');

