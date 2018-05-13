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


Route::get('/', function()
{
	if(Auth::check()){
		return redirect()->route('home');
	}
	return redirect()->route('login');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::get('/support/consultation', 'SupportController@visu')->name('support.visu');

Route::resource('support', 'SupportController', ['except' => ['index']]);
Route::resource('administration', 'AdminController');
Route::resource('note', 'NoteController');
Route::get('/note/download/{note}', 'NoteController@downloadFile')->name('note.download');
Route::get('/administration/password/{nom}/edit', 'AdminController@editPassword')->name('administration.editPassword');
Route::put('/administration/password/{id}', 'AdminController@updatePassword')->name('administration.updatePassword');
