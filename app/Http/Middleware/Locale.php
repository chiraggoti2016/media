<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use App;
use Config;
use Session;

class Locale {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->cookie('locale', Config::get('app.locale'));
        App::setLocale($locale);
        Carbon::setLocale($locale);

        $locale_prefix = '';
        if($locale != config('language.options.EN.code')){
            $locale_prefix = $locale . '_';
        }
        Session::put('locale_prefix', $locale_prefix);

        return $next($request);
    }
}
