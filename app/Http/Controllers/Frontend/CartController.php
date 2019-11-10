<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Plan;
use Session;

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
        if(in_array(request('plan_type'), config('plantypes.list'))) {
            // Store Plan to Cart
            Session::put('checkavailability.' . request('plan_type'), request('plan_id'));
        }

        return view('cart.index');
    }

    public function sugguestAddressAjax() {
        $q = request('q');
        $addresses = Plan::distinct('address')->whereNotNull('address')->where('address','like',"%{$q}%")->pluck('address')->toArray();
        return response()->json($addresses);
    }

    public function checkAddressAvailability()
    {
        $check_address = request("check_address");

        $checkavailability = Session::get('checkavailability');

        $available_addresses = Plan::distinct('address')->whereNotNull('address')->where('address',"{$check_address}")->whereIn('id', array_values($checkavailability))->pluck('address')->toArray();

        $availability = count($available_addresses) ? 1 : 0;

        return response()->json(['selected_address' => $check_address, 'checkedable' => array_keys($checkavailability),'availability' => $availability]);
    
        
    }
}
