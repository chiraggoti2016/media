<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\PlanType;
use App;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.header', function ($view) {

            $locale_prefix = Session::get('locale_prefix');

            $plan_types = PlanType::all()->pluck( $locale_prefix . 'name', 'id');

            if(App::getLocale() == config('language.options.EN.code')){
                $lang_code = config('language.options.FR.code');
                $lang_name = config('language.options.FR.name');
            } else {
                $lang_code = config('language.options.EN.code');
                $lang_name = config('language.options.EN.name');
            }

            $view->with('plan_types', $plan_types)->with('lang_code', $lang_code)->with('lang_name', $lang_name);
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
