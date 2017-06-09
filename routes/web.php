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

Route::post('/threads/{thread}/replies', 'RepliesController@store');
//Route::resource('threads', 'ThreadsController');
Route::get('/threads', 'ThreadsController@index')->name('all_threads');
Route::post('/threads', 'ThreadsController@store');
Route::get('/threads/create', 'ThreadsController@create');
Route::get('/threads/{thread}', 'ThreadsController@show');
Route::get('/threads/{channel}/{thread}', 'ThreadsController@show')->name('home');

Route::get('/home', 'HomeController@index')->name('home');


