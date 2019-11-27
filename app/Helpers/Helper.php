<?php 
if (!function_exists('splitAmount')) {
	function splitAmount($amount = 0.0){
		$whole = $decimal = 0;
		if($amount) list($whole, $decimal) = explode('.', $amount);
		return ['whole' => $whole, 'decimal' => $decimal];
	}
}

if (!function_exists('getDiscountedPrice')) {
	function getDiscountedPrice($plan){
		$price = $plan->price;
		$discount = getDiscount($plan);
		$discountable = number_format(($price - $discount),2) ;
		return $discountable;
	}
}

if (!function_exists('getPrice')) {
	function getPrice($plan){
		$price = 0;
		if(!empty($plan->price)){ 
			if(hasDiscount($plan)) 
				$price = getDiscountedPrice($plan);
			 else 
				$price = $plan->price;
		}
		return $price;
	}
}

if (!function_exists('hasDiscount')) {
	function hasDiscount($plan){
		return is_numeric($plan->discount) && $plan->discount > 0;
	}
}

if (!function_exists('getDiscount')) {
	function getDiscount($plan){
		$discount = 0;
		if(hasDiscount($plan)) {
			if($plan->discount_type == 'fix') {
				$discount = $plan->discount;
			} else {
				$discount = ($plan->price * $plan->discount) / 100;
			}
		}
		return number_format($discount,2);
	}
}
if (!function_exists('doCartCalculation')) {
	function doCartCalculation(&$cart){
	
		$total = $discount = $one_time = 0;
		if(isset($cart['data'])) {
		    foreach($cart['data'] as $plantype => $plan) {
		        $total += getPrice($plan);
		        $discount += getDiscount($plan);
		        $addon_total = 0;
		        if(isset($cart['addon'][$plantype]['modem'])) {
		           foreach($cart['addon'][$plantype]['modem'] as $modem_id => $modem) {
		                // $modem['addon'];
		                if(in_array($modem['buying_method'], ['none', 'purchase'])) {
		                    $total += $modem['addon']->amount;
		                    $addon_total +=$modem['addon']->amount;
		                } else {
		                    $total += $modem['addon']->rent_amount;
		                    $total += $modem['addon']->deposit;
		                    $one_time += $modem['addon']->deposit;
		                    $addon_total +=$modem['addon']->rent_amount;
		                    $addon_total +=$modem['addon']->deposit;
		                }
		           }
		        }
		        if(isset($cart['addon'][$plantype]['other'])) {
		           foreach($cart['addon'][$plantype]['other'] as $other_id => $other) {
		                $total += $other['addon']->amount;
		                $addon_total +=$other['addon']->amount;
		           } 
		        }
		        $cart['data'][$plantype]->addon_total = $addon_total; 
		    }
		}

	    if(isset($cart['installation']['charge'])){
	        $total += $cart['installation']['charge'];
	    }
	    $shipping = setting('site.shipping-charge') ?? 0;
	    $total += $shipping;
	    $tax = ($total * (setting('site.tax') ?? 0) / 100);
	    $grand_total = $total + $tax;

	    $cart['summary']['total'] = $total;
	    $cart['summary']['one_time'] = $one_time;
	    $cart['summary']['discount'] = $discount;
	    $cart['summary']['tax'] = $tax;
	    $cart['summary']['shipping'] = $shipping;
	    $cart['summary']['grand_total'] = $grand_total;
		return $cart;
	}
}

if (!function_exists('paymentGateway')) {
	function paymentGateway($data, $order) {
		//Example Card Payment Data
		$payment_data = array(
		        'order_number' => $order['order_number'],
		        'amount' => $order['grand_total'],
		        'payment_method' => 'card',
		        'card' => array(
		            'name' => $data['holder_name'],
		            'number' => $data['account_number'],
		            'expiry_month' => $data['expiry_month'],
		            'expiry_year' => $data['expiry_year'],
		            'cvd' => $data['cvd'],
		        )
		);

		$result = (new Bambora)->makeCardPayment($payment_data);

		if($result) {

			$transaction_data = [
				'transaction_id' => isset($result['id'])?$result['id']:'', 
				'authorizing_merchant_id' => isset($result['authorizing_merchant_id'])?$result['authorizing_merchant_id']:'', 
				'approved' => isset($result['approved'])?$result['approved']:'', 
				'message' => isset($result['message'])?$result['message']:'', 
				'auth_code' => isset($result['auth_code'])?$result['auth_code']:'', 
				'transaction_created' => isset($result['created'])?$result['created']:'', 
				'order_number' => isset($result['order_number'])?$result['order_number']:'', 
				'type' => isset($result['type'])?$result['type']:'', 
				'payment_method' => isset($result['payment_method'])?$result['payment_method']:'', 
				'risk_score' => isset($result['risk_score'])?$result['risk_score']:'', 
				'amount' => isset($result['amount'])?$result['amount']:'', 
				'jsondata' => is_array($result) ? json_encode($result) : '[]', 
			];

			\App\Transaction::create($transaction_data);

			return true;
		}
		return false;
	}
}
