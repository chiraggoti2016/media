<?php 
if (!function_exists('splitAmount')) {
	function splitAmount($amount = 0.0){
		$whole = $decimal = 0;
		if($amount) list($whole, $decimal) = explode('.', (float)$amount);
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