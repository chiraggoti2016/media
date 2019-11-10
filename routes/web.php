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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::group(['namespace' => 'Frontend'], function(){
	Route::group(['middleware' => 'locale'], function(){
		// HomeController
		Route::get('/', 'HomeController@index');
		Route::post('/set-state', 'HomeController@setState')->name('set-state');

		// CartController
	    Route::group(['prefix' => 'cart'], function(){
    		Route::any('/', 'CartController@index')->name('cart.index');
    		Route::get('/sugguest/address', 'CartController@sugguestAddressAjax')->name('cart.sugguest.address');
    		Route::post('/check/address/availability', 'CartController@checkAddressAvailability')->name('cart.check.address.availability');
    	});
        
        
		Route::get('/{type}', 'HomeController@plan')->name('plan');
		

	});
		
	Route::get('locale/{locale?}',
    [
        'as' => 'locale.setlocale',
        'uses' => 'LocaleController@setLocale'
    ]);
    // Route::get('/', function(){
    //     return redirect('/admin');
    // });
});


