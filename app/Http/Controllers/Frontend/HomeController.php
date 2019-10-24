<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Plan;

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
        $plans = \DB::select("SELECT `plan_types`.id, `plan_types`.name, `plans`.`price`, `plans`.`desctiption` FROM `plan_types` JOIN `plans` ON `plans`.`plan_type_id` = `plan_types`.`id` WHERE `plans`.`price` IN (SELECT MIN(p.price) FROM `plans` as p GROUP BY p.plan_type_id )");

        // dd($plans);

        return view('home.index');
    }
}
