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

        $availableplan = Plan::select('type','id')->whereNotNull('address')->where('address',"{$check_address}")->whereIn('id', array_values($checkavailability))->pluck('id', 'type')->toArray();

        if($availableplan) {
            Session::put('availableplan', $availableplan);   
        }

        $availability = count($availableplan) ? 1 : 0;

        $checkedable = $availability ? array_keys($checkavailability) : [];

        return response()->json(['selected_address' => $check_address, 'checkedable' => $checkedable,'availability' => $availability]);
    
        
    }

    public function process() {
        
        if(request('selection')) {
            Session::put('stepqueue', request('selection'));
        }

        $stepqueue = Session::get('stepqueue');
        
        if(count($stepqueue)>0) {
            $step = current($stepqueue);
            $availableplanId = Session::get('availableplan.'.$step);
            $plan = Plan::find($availableplanId);

            Session::put('cart.data.' . $step, $plan);

        }

        return view('cart.process',compact('plan'));        
    }
}
