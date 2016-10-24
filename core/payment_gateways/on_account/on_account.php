<?php

class LcpOnAccountPayment {
	
	protected $options;

	function __construct($options, $db)
	{

		$this->db 		= $db;
		$this->options 	= $options;

	}

	/*
	 *
	 * 	Purpose: Charges a users on account
	 * 	Added in Version 1.2
	 *
	 */
	function charge($data, $lead_reference, $company)
	{

		$this->store($data, $lead_reference, $company);
		return true;

	}

	/*
	 *
	 * 	Purpose: Stores the purchased details
	 * 	Added in Version 1.2
	 *
	 */
	private function store($data, $lead_reference, $company) 
	{

		$data = array(	'lead_id' => $lead_reference->id, 
						'company_id' => $company->id, 
						'payment_provider' => 'on_account', 
						'transaction_reference' => uniqid(), 
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s'));

		$this->db->wpdb->insert($this->db->tables['orders'], $data);

	}

}

?>