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

Route::get('/', 'PageController@index')->name('index');

Route::group(['prefix'=>'parallaxpanel', 'namespace'=>'Admin', 'middleware'=>'auth_custom'], function(){
	Route::get('/', 'AuthController@index')->name('panel.index');

	Route::post('login', 'AuthController@login')->name('panel.login');
	Route::post('register', 'AuthController@register')->name('panel.register');

});

Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware'	=>	'admin'], function(){

	Route::get('/', 'PageController@index')->name('admin.dashboard');

	Route::get('/settings', 'SettingController@index')->name('admin.settings');
	Route::post('/settings/store', 'SettingController@store')->name('admin.settings.store');
	Route::post('/settings/update/{id}', 'SettingController@update')->name('admin.settings.update');
	
	Route::resource('/users', 'UsersController');
	Route::resource('/menu', 'MenuController');

});

Route::get('parallaxpanel/logout', 'Admin\AuthController@logout')->name('panel.logout');