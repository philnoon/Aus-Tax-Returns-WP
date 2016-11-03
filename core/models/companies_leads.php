<?php

class LcpCompanies_leads {

	function __construct($db){

		$this->db = $db;

	}

	
	function getLastId() {

		return $this->db->wpdb->insert_id;
		//$lastid = $wpdb->insert_id;

	}
	


}

$LcpCompanies_leads = new LcpCompanies_leads($LcpDb);

?>