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

Route::get('/create', 'BookController@createIndex')->name('book.create.index');
Route::post('/create', 'BookController@create')->name('book.create');

Route::get('/edit/{id}', 'BookController@editIndex')->name('book.edit.index');
Route::post('/edit', 'BookController@edit')->name('book.edit');

Route::get('/delete/{id}', 'BookController@delete')->name('book.delete');
