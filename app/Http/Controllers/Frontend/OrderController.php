<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Plan;
use App\Addon;
use App\Order;
use Session;

class OrderController extends Controller
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function complete()
    {

        return view('order.complete');
    }

}
