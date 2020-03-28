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
Route::get('/not-approved', 'PostController@not_approved')
    ->name('not-approved');

Route::group(['prefix' => '/post'], function () {
    Route::get('/{id}', 'PostController@post')
        ->where('id', '[0-9]+')
        ->name('post.post');

    Route::get('/add', 'PostController@add_get')
        ->name('post.add_get')
        ->middleware('can:add,App\Post');

    Route::post('/add', 'PostController@add_post')
        ->name('post.add_post')
        ->middleware('can:add,App\Post');

    Route::get('/{id}/edit', 'PostController@edit_get')
        ->where('id', '[0-9]+')
        ->name('post.edit_get')
        ->middleware('can:edit,App\Post');

    Route::post('/{id}/edit', 'PostController@edit_post')
        ->where('id', '[0-9]+')
        ->name('post.edit_post')
        ->middleware('can:edit,App\Post');

    Route::get('/{id}/approve', 'PostController@approve')
        ->where('id', '[0-9]+')
        ->name('post.approve')
        ->middleware('can:approve,App\Post');
});

Route::group([], function () {
    Route::get('/login', 'AuthController@login_get')->name('auth.login_get');
    Route::post('/login', 'AuthController@login_post')->name('auth.login_post');
    Route::get('/signup', 'AuthController@signup_get')->name('auth.signup_get');
    Route::post('/signup', 'AuthController@signup_post')->name('auth.signup_post');
    Route::get('/logout', 'AuthController@logout')->name('auth.logout');
});

Route::get('/feedback', 'FeedbackController@get')->name('feedback_get');
Route::post('/feedback', 'FeedbackController@post')->name('feedback_post');
Route::get('/feedback/success', 'FeedbackController@success')->name('feedback_success');

Route::get('/test', function () {
    /* 1-MANY */
    // User::create([
    //     'name' => 'Влад',
    //     'surname' => 'Кибардин',
    //     'login' => 'kibaba',
    //     'password' => password_hash('54321', \PASSWORD_DEFAULT)
    // ]);

    // Post::create([
    //     'title' => 'Hello',
    //     'content' => 'World',
    //     'user_id' => '1'
    // ]);

    // $post = Post::find(2);
    // $author = $post->user->name;

    // dump($author); // Женя

    /* MANY-MANY */

    // Tag::create([
    //     'name' => 'politics'
    // ]);

    // $tag = Tag::find(1);
    // $post = Post::find(2);
    // $post->tags()->sync($tag);

    // $role = User::find(2)->role->can_add_post;
    // dump($role);

    // if (Gate::denies('promote')) {
    //     return 'NO';
    // }

    return 'OK';
});
