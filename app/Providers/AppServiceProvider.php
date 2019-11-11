<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
use Session;
use App\State;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['layouts.master.header', 'layouts.checkout.header'], function ($view) {

            $locale_prefix = Session::get('locale_prefix');

            if(App::getLocale() == config('language.options.EN.code')){
                $lang_code = config('language.options.FR.code');
                $lang_name = config('language.options.FR.name');
            } else {
                $lang_code = config('language.options.EN.code');
                $lang_name = config('language.options.EN.name');
            }

            $view->with('lang_code', $lang_code)->with('lang_name', $lang_name);
        });
        
        view()->composer('partials.states', function ($view) {
            $has_selected_state = Session::has('selected_state');
            $states = State::all()->pluck('name', 'id');
            $view->with('states', $states)->with('has_selected_state', $has_selected_state);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
