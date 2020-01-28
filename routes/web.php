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
    return view('welcome');
});


Route::group(['prefix'=>'parallaxpanel', 'namespace'=>'Admin', 'middleware'=>'auth_custom'], function(){
	Route::get('/', 'AuthController@index')->name('panel.index');

	Route::post('login', 'AuthController@login')->name('panel.login');
	Route::post('register', 'AuthController@register')->name('panel.register');
	Route::get('logout', 'AuthController@logout')->name('panel.logout');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware'	=>	'admin'], function(){

	Route::resource('/users', 'UsersController');

});
