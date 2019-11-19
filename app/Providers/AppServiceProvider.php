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

        view()->composer(['layouts.checkout.footer', 'cart.addons.internet', 'cart.step.installation'], function ($view) {
            
            $cart = Session::has('cart') ? Session::get('cart') : [];


            $stepqueue = Session::get('stepqueue');
            
            $activestep = Session::get('activestep');

            $process_done = false;
            if(count($stepqueue)>0) {
                
                $step = isset($stepqueue[$activestep])?$stepqueue[$activestep]:current($stepqueue);

                if(in_array($step, config('plantypes.list'))) {
                    $process_done = isset($cart['data'][$step]) && count($cart['data'][$step]) > 0;
                    $process_done = $process_done && isset($cart['addon'][$step]['modem']) && count($cart['addon'][$step]['modem']) > 0;                    
                } elseif($step == 'installation') {
                    $process_done = (isset($cart['installation']['data']));
                }

            }

            $total = $discount = $one_time = 0;

            foreach($cart['data'] as $plantype => $plan) {
                $total += getPrice($plan);
                $discount += getDiscount($plan);
                $addon_total = 0;
                if(isset($cart['addon'][$plantype]['modem'])) {
                   foreach($cart['addon'][$plantype]['modem'] as $modem_id => $modem) {
                        // $modem['addon'];
                        if(in_array($modem['buying_method'], ['none', 'purchase'])) {
                            $total += $modem['addon']->amount;
                            $addon_total +=$modem['addon']->amount;
                        } else {
                            $total += $modem['addon']->rent_amount;
                            $total += $modem['addon']->deposit;
                            $one_time += $modem['addon']->deposit;
                            $addon_total +=$modem['addon']->rent_amount;
                            $addon_total +=$modem['addon']->deposit;
                        }
                   }
                }
                if(isset($cart['addon'][$plantype]['other'])) {
                   foreach($cart['addon'][$plantype]['other'] as $other_id => $other) {
                        $total += $other['addon']->amount;
                        $addon_total +=$other['addon']->amount;
                   } 
                }
                $cart['data'][$plantype]->addon_total = $addon_total; 
            }



            if(isset($cart['installation']['charge'])){
                $total += $cart['installation']['charge'];
            }

            $cart['summary']['total'] = $total;
            $cart['summary']['one_time'] = $one_time;
            $cart['summary']['discount'] = $discount;

            $view->with('cart', $cart)->with('process_done', $process_done);
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
