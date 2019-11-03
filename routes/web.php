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

Route::group(['namespace' => 'Frontend'], function(){
	Route::group(['middleware' => 'locale'], function(){
		Route::get('/', 'HomeController@index');
	});
		
	Route::get('locale/{locale?}',
    [
        'as' => 'locale.setlocale',
        'uses' => 'LocaleController@setLocale'
    ]);

});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
