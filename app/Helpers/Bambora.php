<?php
	require 'beanstream-php/vendor/autoload.php';
	

	class Bambora {
		private $merchant_id = ''; //INSERT MERCHANT ID (must be a 9 digit string)
		private $api_key = ''; //INSERT API ACCESS PASSCODE
		private $api_version = 'v1'; //default
		private $platform = 'api'; //default

		private $beanstream;

		function __construct() {
	    	//Create Beanstream Gateway
	    	try {
				$this->beanstream = new \Beanstream\Gateway($this->merchant_id, $this->api_key, $this->platform, $this->api_version);
	    	} catch(Exception $e) {

	    	}
	  	}

	  	function makeCardPayment(array $payment_data) {
			$complete = TRUE; //set to FALSE for PA

			//Try to submit a Card Payment
			try {

				$result = $this->beanstream->payments()->makeCardPayment($payment_data, $complete);
			    	
			    /*
			     * Handle successful transaction, payment method returns
			     * transaction details as result, so $result contains that data
			     * in the form of associative array.
			     */
			} catch (\Beanstream\Exception $e) {
				return false;
			    /*
			     * Handle transaction error, $e->code can be checked for a
			     * specific error, e.g. 211 corresponds to transaction being
			     * DECLINED, 314 - to missing or invalid payment information
			     * etc.
			     */
			}
			return true;
	  	}

	} 