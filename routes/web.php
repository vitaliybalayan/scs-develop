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

Route::get('/', function() {
	return redirect(app()->getLocale());
});

Route::group([
	'prefix' => '{locale}',
	'where' => ['locale' => '[a-zA-Z]{2}'],
	'middleware' => 'setlocale'
], function()
{
	Route::get('/', 'PagesController@index')->name('index');

	// Route::get('/services/', 'ServicesController@index')->name('_services.index');
	Route::get('/services/{slug}', 'ServicesController@show')->name('_services.show');

	Route::get('/clients/', 'ClientsController@index')->name('_clients.index');
	Route::get('/clients/{slug}', 'ClientsController@show')->name('_clients.show');

	Route::get('/about/', 'PagesController@about')->name('_about.index');

	Route::get('/news/', 'ArticlesController@index')->name('_articles.index');
	Route::get('/news/{slug}', 'ArticlesController@show')->name('_articles.show');

	Route::get('/contacts/', 'PagesController@contacts')->name('_contacts.index');
	Route::get('/career/', 'PagesController@career')->name('_career.index');

	Route::post('/contacts/send', 'EmailsController@contacts')->name('_emails.contacts');
});


Route::group(['prefix'=>'parallaxpanel', 'namespace'=>'Admin', 'middleware'=>'auth_custom'], function(){
	Route::get('/', 'AuthController@index')->name('panel.index');

	Route::post('login', 'AuthController@login')->name('panel.login');
	Route::post('register', 'AuthController@register')->name('panel.register');

});

Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware'	=>	'admin'], function(){

	Route::get('/', 'HomeController@index')->name('admin.dashboard');

	Route::get('/getfile', 'FilesController@get');

	Route::post('/fileupload', 'FilesController@upload')->name('admin.file_upload');
	Route::post('/fileupload/remove', 'FilesController@remove')->name('admin.file_upload.remove');

	Route::get('/settings', 'SettingController@index')->name('admin.settings');
	Route::post('/settings/store', 'SettingController@store')->name('admin.settings.store');
	Route::post('/settings/update/{id}', 'SettingController@update')->name('admin.settings.update');

	Route::get('/about', 'AboutController@index')->name('about.index');
	Route::post('/about/store', 'AboutController@store')->name('about.store');
	Route::post('/about/update/{id}', 'AboutController@update')->name('about.update');
	
	Route::resource('/users', 'UsersController');
	Route::resource('/menu', 'MenuController');
	Route::resource('/pages', 'PagesController');
	Route::resource('/services', 'ServicesController');
	Route::resource('/languages', 'LanguagesController');
	Route::resource('/clients', 'ClientsController');
	Route::resource('/articles', 'ArticlesController');
	Route::resource('/locations', 'LocationsController');
	Route::resource('/certificates', 'CertificatesController');
	Route::post('/services/image_upload', 'ServicesController@preview_upload')->name('services.preview_uplaod');

});

Route::get('parallaxpanel/logout', 'Admin\AuthController@logout')->name('panel.logout');