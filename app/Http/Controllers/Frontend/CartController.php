<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Plan;
use App\Addon;
use App\Order;
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
            $selection = request('selection');
            $additional = ['installation', 'summary', 'payment'];
            $selection = array_merge($selection, $additional);
            Session::put('stepqueue', $selection);
            Session::put('activestep', 0);
        }

        $stepqueue = Session::get('stepqueue');
        $activestep = Session::get('activestep');
        
        if(count($stepqueue)>0) {
            $step = isset($stepqueue[$activestep]) ? $stepqueue[$activestep] : current($stepqueue);
            $addons = $alternate_plans = [];

            $availableplanId = Session::get('availableplan.'.$step);

            $plan = Plan::find($availableplanId);

            $alternate_plans = Plan::where('type', $step)->get();

            if(in_array($step, ['internet'])) {
                $addons['modem'] = Addon::where('type', $step)->where('device_type', 'modem')->get();
                $addons['other'] = Addon::where('type', $step)->where('device_type', '!=','modem')->get();
            } elseif(in_array($step, ['home_phone'])) {
                $addons['modem'] = Addon::where('type', $step)->where('device_type', 'modem')->get();
                $addons['other'] = Addon::where('type', $step)->where('device_type', '!=','modem')->get();
            }

            Session::put('cart.data.' . $step, $plan);                

        } else {
            return redirect()->back();
        }

        return view('cart.process',compact('stepqueue', 'step', 'plan', 'alternate_plans', 'addons'));        
    }

    public function processDone() {
        $stepqueue = Session::get('stepqueue');

        $activestep = Session::get('activestep');
        $activestep++;

        if(isset($stepqueue[$activestep])) {
            Session::put('activestep', $activestep);
        }

        return redirect()->back();
    }

    public function doPayment() {
        \DB::beginTransaction();
        try{
            $cart = Session::has('cart') ? Session::get('cart') : [];

            $planIds = [];
            foreach($cart['data'] as $eachplan) {
                if(isset($eachplan->id)) {
                    $planIds[] = $eachplan->id;
                }
            }

            doCartCalculation($cart);

            $data = request()->all();

            $order_data = [
                'name' => $cart['installation']['data']['installation_name'],
                'phone_number' => $cart['installation']['data']['phone_number'],
                // 'plan_id' => $cart['data']['internet']->id,
                'plan_install_fee' => $cart['installation']['charge'],
                'install_date1' => $cart['installation']['data']['install_date1'],
                'install_date2' => $cart['installation']['data']['install_date2'],
                'install_date3' => $cart['installation']['data']['install_date3'],
                'install_time1' => $cart['installation']['data']['install_time1'],
                'install_time2' => $cart['installation']['data']['install_time2'],
                'install_time3' => $cart['installation']['data']['install_time3'],
                'installation_addr' => $cart['installation']['data']['installation_address'],
                'addons_data' => isset($cart['addon']) ? json_encode($cart['addon']) : '[]',
                "total" => $cart['summary']['total'],
                "discount" => $cart['summary']['discount'],
                "tax" => $cart['summary']['tax'],
                "shipping" => $cart['summary']['shipping'],
                "grand_total" => $cart['summary']['grand_total'],
                "order_number" => 'ORD' . time(),
                "first_name" => $data['first_name'],
                "last_name" => $data['last_name'],
                "email" => $data['email'],
                "homephone" => $data['homephone'],
                "cellphone" => $data['cellphone'],
                "prefered_method" => $data['prefered_method'],
            ];

            if(paymentGateway($data, $order_data)) {

                $order = Order::create($order_data);

                if($order){
                    $order->plans()->attach($planIds);
                    Session::forget(['checkavailability', 'cart', 'availableplan', 'stepqueue', 'activestep']);

                    // Session::flush(); 
                }

                \DB::commit();

                return redirect()->route('order.complete');
            }    
        } catch (\Exception $e) {
            \DB::rollBack();
            dd($e);
        }

        return redirect()->back();
    }

    public function changePlan($step, $id) {
        $plan = Plan::find($id);
        
        if(in_array($step,config('plantypes.list')) && $plan) {            
            Session::put('availableplan.'.$step, $id);
        }

        return redirect()->back();
    }

    public function addAddon($step) {
        
        $ids = request('id');
        $buying_method = request('buying_method');

        foreach($ids as $index => $id) {
            $addon = Addon::find($id);

            if(in_array($step,config('plantypes.list')) && $addon) {            
                Session::put('cart.addon.'.$step.'.'.((strtolower($addon->device_type) == "modem")?'modem':'other').'.'.$id, ['addon' => $addon, 'buying_method' => $buying_method[$index]]);
            }            
        }


        return redirect()->back();
    }

    public function removeAddon($step) {
        
        $ids = request('id');

        foreach($ids as $index => $id) {
            $addon = Addon::find($id);
            if(in_array($step,config('plantypes.list')) && $addon) {            
                Session::forget('cart.addon.'.$step.'.'.((strtolower($addon->device_type) == "modem")?'modem':'other').'.'.$id);
            }            
        }


        return redirect()->back();
    }

    public function addInstallationCharge($amount) {

        Session::put('cart.installation.charge', $amount);

        return redirect()->back();
    }

    public function removeInstallationCharge() {

        Session::forget('cart.installation.charge');

        return redirect()->back();
    }

    public function submitInstallationData() {

        $data = request()->all();

        Session::put('cart.installation.data', $data);

        return redirect()->back();
    }

    public function resetInstallationData() {

        Session::forget('cart.installation.data');

        return redirect()->back();
    }

    public function changeStep($step) {

        $activestep = Session::get('activestep');

        if($step>=0 && $step<$activestep) {
            Session::put('activestep', $step);
        }

        return redirect()->back();
    }

    


}
