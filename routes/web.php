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


Route::get('/', 'BookController@index')->name('book.index');

Route::get('/send', 'OneChatController@sendMessage');


Route::group(['middleware' => ['user']], function (){
    Route::get('/create', 'BookController@createIndex')->name('book.create.index');
    Route::post('/create', 'BookController@create')->name('book.create');

    Route::get('/edit/{id}', 'BookController@editIndex')->name('book.edit.index');
    Route::post('/edit', 'BookController@edit')->name('book.edit');

    Route::get('/delete/{id}', 'BookController@delete')->name('book.delete');

    Route::get('/book', 'BookController@ownBook')->name('book.own.page');

    Route::get('/fb/posts', 'FaceBookController@getPosts')->name('fb.posts');
    Route::get('/fb/me', 'FaceBookController@me')->name('fb.me');
});




Route::name('user.')->group(function () {
    Route::get('/register', 'UserController@regisPage')->name('regis.page');
    Route::post('/register', 'UserController@regis')->name('regis');

    Route::get('/login', 'UserController@loginPage')->name('login.page');
    Route::post('/login', 'UserController@login')->name('login');

    Route::get('/logout', 'UserController@logout')->name('logout');

});

Route::get('/login/facebook', 'UserController@redirectToProvider')
    ->name('user.login.facebook');

Route::get('/login/facebook/callback',
    'UserController@handleProviderCallBack');
















