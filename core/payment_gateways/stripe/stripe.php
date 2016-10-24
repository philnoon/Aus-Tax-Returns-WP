<?php

include_once 'init.php'; // Include the Stripe class

class LcpStripePayment {
	
	protected $options;

	function __construct($options, $db)
	{

		$this->db 		= $db;
		$this->options 	= $options;
		$this->setKeys();

		// Set the API key
		\Stripe\Stripe::setApiKey ($this->secret_key);

	}

	/*
	 *
	 * 	Purpose: Charges a users stripe account
	 * 	Added in Version 1.1
	 *
	 */
	function charge($token, $lead_reference, $company)
	{

		try {

			$purchased = true;
			$payment = \Stripe\Charge::create (array(
							"amount"      => $this->options['global']['lcp_lead_price'],
							"currency"    => $this->options['global']['lcp_currency_accepted'],
							"source"      => $token,
							"description" => "Lead Reference:" . $lead_reference->id)
						);

			$this->store($payment, $lead_reference, $company);
			return true;			

		} catch (Stripe\Error\ApiConnection $e) {
			return $e;
		}
	}

	/*
	 *
	 * 	Purpose: Stores the payment details
	 * 	Added in Version 1.1
	 *
	 */
	private function store($payment, $lead_reference, $company) 
	{

		$data = array(	'lead_id' => $lead_reference->id, 
						'company_id' => $company->id, 
						'payment_provider' => 'stripe', 
						'transaction_reference' => $payment['id'], 
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s'));

		$this->db->wpdb->insert($this->db->tables['orders'], $data);

	}

	/*
	 *
	 * 	Purpose: Sets the stripe keys
	 * 	Added in Version 1.1
	 *
	 */
	function setKeys()
	{

		$mode = $this->options['stripe']['lcp_stripe_mode'];

		// Get the Stripe keys based on the mode we are running in
		if ( $mode=='live' ) {
			$this->secret_key 		= $this->options['stripe']['lcp_stripe_api_live_secret_key'];
			$this->publishable_key 	= $this->options['stripe']['lcp_stripe_api_live_publishable_key'];
		} else {
			$this->secret_key 		= $this->options['stripe']['lcp_stripe_api_test_secret_key'];
			$this->publishable_key 	= $this->options['stripe']['lcp_stripe_api_test_publishable_key'];
		}

	}

	/*
	 *
	 * 	Purpose: Returns the stripe keys
	 * 	Added in Version 1.1
	 *
	 */
	function getKeys()
	{

		return array('secret_key'=>$this->secret_key, 'publishable_key'=>$this->publishable_key);

	}


}

?>