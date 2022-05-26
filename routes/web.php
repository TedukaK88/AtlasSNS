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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

Route::get('/logout', 'Auth\LoginController@logout');

//=======================================================================
//下記追記
//register
// Route::get('/register','PostsController@register');

//ログイン中のページ
Route::get('/top','PostsController@index');
Route::get('/post/index','PostsController@index');

Route::get('/profile/{id}','UsersController@profile');

Route::get('/search','UsersController@search');

Route::get('/follow-list','PostsController@followList');
Route::get('/follower-list','PostsController@followerList');


//=======================================================================
//===============  add code  ============================================
//=======================================================================

//=== general ===========================================================
Route::get('/home','PostsController@home');
//logout
Route::get('/logout','Auth\LoginController@logout');


//=== top ===============================================================
//newPost
Route::post('/post','PostsController@postCreate');
//updatePost
Route::post('/post/index/update','PostsController@postUpdate');
//deletePost
Route::get('/post/index/{id}/delete','PostsController@postDelete');

//=== follow ============================================================
//follow user
Route::get('/f_user','UsersController@f_user');
//follow cancel
Route::get('/f_cancel_user','UsersController@f_cancel_user');
//search_result
Route::get('/search_result','UsersController@search_result');

//=== follow ============================================================
//profile update
Route::post('/profile/update','UsersController@prof_update');

