<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use URL;
use Cookie;

class LocaleController extends Controller {

    public function setLocale(Request $request, $locale = 'en')
    {
        if (! in_array($locale,['en','fr']))
        {
            $locale = 'en';
        }
        Cookie::queue('locale', $locale);
        return redirect(url(URL::previous()));
    }
}