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

//Home
Route::get('/home/{pole}', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');

//Auth
Auth::routes();

//Support
Route::get('/support/consultation', 'SupportController@visu')->name('support.visu');
Route::resource('support', 'SupportController', ['except' => ['index', 'destroy']]);

//administration utilisateurs
Route::get('/administration/consultation', 'AdminController@index')->name('administration.index');
Route::resource('administration', 'AdminController', ['except' => ['index']]);


Route::resource('note', 'NoteController');

Route::get('/note/download/{note}', 'NoteController@downloadFile')->name('note.download');
Route::get('/administration/password/{nom}/edit', 'AdminController@editPassword')->name('administration.editPassword');
Route::put('/administration/password/{id}', 'AdminController@updatePassword')->name('administration.updatePassword');
