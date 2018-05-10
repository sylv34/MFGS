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
