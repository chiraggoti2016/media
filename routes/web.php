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
            Route::any('/process', 'CartController@process')->name('cart.process');
            Route::any('/process/done', 'CartController@processDone')->name('cart.process.done');

            Route::post('/change/plan/{step}/{id}', 'CartController@changePlan')->name('cart.change.plan');


            Route::post('/add/addon/{step}', 'CartController@addAddon')->name('cart.add.addon');
            Route::post('/remove/addon/{step}', 'CartController@removeAddon')->name('cart.remove.addon');

            Route::get('/add/installation/charge/{amount}', 'CartController@addInstallationCharge')->name('cart.add.installation.charge');

            Route::get('/remove/installation/charge', 'CartController@removeInstallationCharge')->name('cart.remove.installation.charge');

            Route::post('/submit/installation/data', 'CartController@submitInstallationData')->name('cart.submit.installation.data');

            Route::get('/reset/installation/data', 'CartController@resetInstallationData')->name('cart.reset.installation.data');

            Route::get('/change/step/{step}', 'CartController@changeStep')->name('cart.change.step');
            Route::post('/do/payment', 'CartController@doPayment')->name('cart.do.payment');
    	});
        
        Route::group(['prefix' => 'order'], function(){
            Route::any('/complete', 'OrderController@complete')->name('order.complete');
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


