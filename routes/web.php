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
    Route::get('/{id}', 'PostController@post')
        ->where('id', '[0-9]+')
        ->name('post.post');

    Route::get('/add', 'PostController@add_get')
        ->name('post.add_get')
        ->middleware('auth');

    Route::post('/add', 'PostController@add_post')
        ->name('post.add_post')
        ->middleware('auth');

    Route::get('/{id}/edit', 'PostController@edit_get')
        ->where('id', '[0-9]+')
        ->name('post.edit_get')
        ->middleware('auth');

    Route::post('/{id}/edit', 'PostController@edit_post')
        ->where('id', '[0-9]+')
        ->name('post.edit_post')
        ->middleware('auth');
});

Route::group([], function () {
    Route::get('/login', 'AuthController@login_get')->name('auth.login_get');
    Route::post('/login', 'AuthController@login_post')->name('auth.login_post');
    Route::get('/signup', 'AuthController@signup_get')->name('auth.signup_get');
    Route::post('/signup', 'AuthController@signup_post')->name('auth.signup_post');
    Route::get('/logout', 'AuthController@logout')->name('auth.logout');
});
