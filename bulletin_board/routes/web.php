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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/post','PostController@index')->name('post.post');
Route::post('/postconfirm','PostController@confirm');
Route::post('/store', 'PostController@store');
Route::get('/postlist','PostController@show');
Route::post('postlist','PostController@show');
Route::get('delete/{id}','PostController@destroy');
Route::get('download', 'PostController@download');
Route::get('/search', 'PostController@search');
Route::post('/search', 'PostController@search');
Route::get('/postupdate/{id}','PostController@postupdate');
Route::post('/updateconfirm','PostController@updateconfirm');
Route::post('/update','PostController@update');
Route::get('/postupload', 'PostController@postupload');
Route::post('/uploadFile', 'PostController@uploadFile');

Route::get('/usercreate','UserController@index');
Route::post('/userconfirm','UserController@confirm');
Route::post('/storeUser', 'UserController@store');
Route::get('/userlist','UserController@show');
Route::post('/userlist','UserController@show');
Route::get('/multi_search', 'UserController@search');
Route::post('/multi_search', 'UserController@search');
Route::get('deleted/{id}','UserController@destroy');
Route::view('/profile','user.profile');
Route::get('/userupdate/{id}','UserController@update_user');
Route::post('/userupconfirm','UserController@update_user_confirm');
Route::post('/updated_user','UserController@update');
Route::get('/change_password','UserController@change_password');
Route::post('/changed', 'UserController@changed_new_password');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
