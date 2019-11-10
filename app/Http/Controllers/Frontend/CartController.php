<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class CartController extends Controller
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function index()
    {
        return view('cart.index');
    }
}
