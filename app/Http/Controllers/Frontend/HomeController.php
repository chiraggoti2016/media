<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Plan;
use App;
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

        $plans = \DB::select("SELECT `plan_types`.id, `plan_types`.{$this->lang}name as name, `plans`.`price`, `plans`.`desctiption`, `plans`.`time_period` FROM `plan_types` JOIN `plans` ON `plans`.`plan_type_id` = `plan_types`.`id` WHERE `plans`.`price` IN (SELECT MIN(p.price) FROM `plans` as p GROUP BY p.plan_type_id )");

        return view('home.index', compact('plans'));
    }
}
