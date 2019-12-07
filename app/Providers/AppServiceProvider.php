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

        view()->composer(['layouts.checkout.footer', 'cart.addons.internet', 'cart.step.installation','cart.step.summary','cart.step.internet', 'cart.step.tv'], function ($view) {
            
            $cart = Session::has('cart') ? Session::get('cart') : [];


            $stepqueue = Session::get('stepqueue');
            
            $activestep = Session::get('activestep');

            $process_done = false;
            $next_url = '';
            $step = '';
            if(count($stepqueue)>0) {
                
                $step = isset($stepqueue[$activestep])?$stepqueue[$activestep]:current($stepqueue);

                if(in_array($step, config('plantypes.list'))) {
                    $process_done = isset($cart['data'][$step]) && count($cart['data'][$step]) > 0;

                    if($step == 'internet') {
                        $process_done = $process_done && isset($cart['addon'][$step]['modem']) && count($cart['addon'][$step]['modem']) > 0;                    
                    }
                } elseif($step == 'installation') {
                    $process_done = (isset($cart['installation']['data']));
                } elseif($step == 'summary') {
                    $process_done = true;
                } elseif($step == 'payment') {
                    $process_done = true;
                }

                $next_url = ($process_done) ? (($step == 'payment')?route('cart.do.payment'):route('cart.process.done')) : '';

            }
            
            doCartCalculation($cart);

            $view->with('cart', $cart)->with('process_done', $process_done)->with('next_url', $next_url)->with('step', $step);
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
