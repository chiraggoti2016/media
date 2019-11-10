<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Plan;
use App;
use Illuminate\Http\Request;
use URL;
use Session;

class HomeController extends Controller
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function index()
    {
        $this->lang  = Session::get('locale_prefix');

        $plans = \DB::select("SELECT * FROM `plans` WHERE `plans`.`price` IN (SELECT MIN(p.price) FROM `plans` as p GROUP BY p.type )");

        return view('home.index', compact('plans'));
    }

    public function plan($type)
    {
        $plans = \DB::select("SELECT *  FROM `plans` WHERE `plans`.`type` = '{$type}'");

        return view('home.plan', compact('plans'));
    }
    
    public function setState()
    {
        $selected_state = request('selected_state');
        Session::put('selected_state', $selected_state);
        return redirect(url(URL::previous()));
    }
}
