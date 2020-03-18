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
    Route::get('/{id}', 'PostController@single')->where('id', '[0-9]+')->name('post.single');
    Route::get('/add', 'PostController@add')->name('post.add');
    Route::get('/{id}/edit', 'PostController@edit')->where('id', '[0-9]+')->name('post.edit');
});

Route::group([], function () {
    Route::get('/login', 'AuthController@login')->name('auth.login');
    Route::get('/signup', 'AuthController@signup')->name('auth.signup');
    Route::get('/logout', 'AuthController@logout')->name('auth.logout');
});