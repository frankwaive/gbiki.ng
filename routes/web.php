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

Route::get('/users', 'FollowController@index');
Route::post('/follow/{user}', 'FollowController@follow');
Route::delete('/unfollow/{user}', 'FollowController@unfollow');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
Route::resource('post', 'PostController');
Route::resource('category', 'CategoryController');
Route::resource('comment', 'CommentController');
Route::resource('profile', 'UserController');

Route::get('/markAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
});
