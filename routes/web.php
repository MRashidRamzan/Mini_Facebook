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

Route::get('/', 'FeedPageController@index');

Auth::routes();


	
	Route::resource('post','PostController')->middleware('auth');
	Route::resource('comment','CommentController')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
