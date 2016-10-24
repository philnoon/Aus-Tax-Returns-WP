<?php

class LcpStatistics {

	function __construct($db, $leads, $companies, $users){

		$this->db 			= $db;
		$this->leads 		= $leads;
		$this->companies 	= $companies;
		$this->users 		= $users;

	}

	/*
	 *
	 * 	Purpose: Gets the total number of approved companies
	 * 	Added in Version 1.1.0
	 *
	 */
	function totalCompanies() {

		return sizeof($this->companies->get('approved'));

	}

	/*
	 *
	 * 	Purpose: Gets the total number of approved leads
	 * 	Added in Version 1.1.0
	 *
	 */
	function totalLeads() {

		return sizeof($this->leads->get('approved'));

	}

	/*
	 *
	 * 	Purpose: Gets the total revenue earnt
	 * 	Added in Version 1.1.0
	 *
	 */
	function totalRevenue() {

		$total_leads = $this->leads->totalPurchased();
		$options = get_option('lcp');
		$price = $options['global']['lcp_lead_price'];

		if ( $options['global']['lcp_payment_gateway'] == 'stripe') {

			$revenue = $total_leads * ($price / 100); 

		} else {
			$revenue = $total_leads * $price; 
		}

		return $options['global']['lcp_currency_accepted'] . ' ' . $revenue;;

	}

}

?>