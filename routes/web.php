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

Route::get('/', 'PostController@index')->name('index');

Route::group(['prefix' => '/post'], function () {
    Route::get('/{id}', 'PostController@post')->where('id', '[0-9]+')->name('post.post');
    Route::get('/add', 'PostController@add_get')->name('post.add_get');
    Route::post('/add', 'PostController@add_post')->name('post.add_post');
    Route::get('/{id}/edit', 'PostController@edit_get')->where('id', '[0-9]+')->name('post.edit_get');
    Route::post('/{id}/edit', 'PostController@edit_post')->where('id', '[0-9]+')->name('post.edit_post');
});

Route::group([], function () {
    Route::get('/login', 'AuthController@login')->name('auth.login');
    Route::get('/signup', 'AuthController@signup')->name('auth.signup');
    Route::get('/logout', 'AuthController@logout')->name('auth.logout');
});
