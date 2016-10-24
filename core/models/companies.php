<?php

class LcpCompanies {

	function __construct($db){

		$this->db = $db;

	}

	/*
	 *
	 * 	Purpose: Gets a company by the user id
	 * 	Added in Version 1.0.5
	 *
	 */
	function byUserID($user_id, $status) 
	{
		$results =  $this->db->wpdb->get_results(	"SELECT * FROM " . $this->db->tables['companies'] .
													" JOIN " .$this->db->tables['users'] . " ON " . $this->db->tables['users'] . ".id = ".$this->db->tables['companies'].".user_id".
													" WHERE status='" . $status . "'".
													" AND ".$this->db->tables['users'].".id = '".$user_id."'");

		return $results[0];
	}

	
	function getLastId() {

		return $this->db->wpdb->insert_id;
		//$lastid = $wpdb->insert_id;

	}
	
		
	/*
	 *
	 * 	Purpose: Gets a company by its id
	 * 	Added in Version 1.0.5
	 *
	 */
	function byCompanyID($company_id)
	{

		$results = $this->db->wpdb->get_results( 	"SELECT * FROM ".$this->db->tables['companies'].
													" JOIN ".$this->db->tables['users']." ON ".$this->db->tables['users'].".id = ".$this->db->tables['companies'].".user_id".
													" WHERE ".$this->db->tables['companies'].".id='".$company_id."'" );
		return $results[0];

	}

	/*
	 *
	 * 	Purpose: Gets all companies based on status
	 * 	Added in Version 1.0.5
	 *
	 */
	function get($status = null, $where = null)
	{

		$query = 	"SELECT * FROM " .$this->db->tables['companies'] .
					" JOIN ".$this->db->tables['users']." ON ".$this->db->tables['companies'].".user_id = ".$this->db->tables['users'].".id";

		if ( $status != null ) {
			$query .= " WHERE status='".$status."'";
		}

		if ( $where != null ) {

			if ( $status != null ) {

				foreach( $where as $clause_key => $clause_value ){

					$query .= " AND " . $clause_key . " = '" . $clause_value . "'";

				}

			} else {

				$where_size = count($where);

				for($i=0; $i<$where_size; $i++){

					if ($i==0) {
						$query .= " WHERE " . key($where) . " = '" . $where[key($where)] . "'";
					} else {
						$query .= " AND " . key($where) . " = '" . $where[key($where)] . "'";
					}

				}

			}


		}

		return $this->db->wpdb->get_results( $query );

	}

	/*
 	 *
	 * 	Purpose: Updates a company
	 * 	Added in Version 1.1.0
	 *
	 */
	function update($data, $where)
	{
		$this->db->wpdb->update($this->db->tables['companies'], $data, $where);
	}

	/*
 	*
	 * 	Purpose: Stores a company
	 * 	Added in Version 1.0.5
	 *
	 */
	function insert($data)
	{
		$this->db->wpdb->insert($this->db->tables['companies'], $data);
	}

	/*
	 *
	 * 	Purpose: Sets a companies status to approved
	 * 	Added in Version 1.0.5
	 *
	 */
	function approve($id)
	{
		$this->updateStatus('approved', $id);
	}

	/*
	 *
	 * 	Purpose: Sets a companies status to rejected
	 * 	Added in Version 1.0.5
	 *
	 */
	function reject($id)
	{
		$this->updateStatus('rejected', $id);
	}

	/*
	 *
	 * 	Purpose: Changes the status of a company
	 * 	Added in Version 1.0.5
	 *
	 */
	private function updateStatus($status, $id)
	{
		$this->db->wpdb->query( " UPDATE ".$this->db->tables['companies']." SET status = '".$status."' WHERE id = '".$id."'");
	}

	/*
	 *
	 * 	Purpose: Deletes a company
	 * 	Added in Version 1.0.5
	 *
	 */
	function delete($id)
	{
		$user = $this->db->wpdb->get_results( "SELECT * FROM ".$this->db->tables['companies']." WHERE id='".$id."'" );
		$this->db->wpdb->query( " DELETE FROM ".$this->db->tables['users']." WHERE ID = '".$user[0]->user_id."'");
		$this->db->wpdb->query( " DELETE FROM ".$this->db->tables['companies']." WHERE ID = '".$id."'");
	}

	/*
	 *
	 * 	Purpose: Gets the credit limit
	 * 	Added in Version 1.2
	 *
	 */
	function creditLimit($id)
	{

		$options = get_option('lcp');
		$global_credit_limit = $options['on_account']['lcp_on_account_credit_limit'];

		$company = $this->byCompanyID($id);
		$company_credit_limit = $company->credit_limit;
		
		if ( $company_credit_limit !=0 ) {
			return $company_credit_limit;
		}

		return $global_credit_limit;

	}

	/*
	 *
	 * 	Purpose: Reduces the credit limit
	 * 	Added in Version 1.2
	 *
	 */
	function reduceCreditLimit($id)
	{

		$options = get_option('lcp');
		$lead_price = $options['global']['lcp_lead_price'];

		$company = $this->byCompanyID($id);

		$data['credit_limit'] = $company->credit_limit - $lead_price;

		$this->update($data, array('id'=>$id));
		
	}
        
        /*
	 *      
	 * 	Purpose: My update - get the user by the wp user
	 * 	Added in Version 1.2
	 *
	 */
	function byCompanyUserID($user_id)
	{

		$results = $this->db->wpdb->get_results("SELECT * FROM ".$this->db->tables['companies'].
		" JOIN ".$this->db->tables['users']." ON ".$this->db->tables['users'].".id = ".$this->db->tables['companies'].".user_id".
		" WHERE ".$this->db->tables['companies'].".user_id='".$user_id."'" );
		return $results[0];

	}
        
        /*
	 *      
	 * 	Purpose: My update - auto approve
	 * 	Added in Version 1.2
	 *
	 */        
        	function approvebyuid($id)
	{
		$this->updateStatusByUId('approved', $id);
	}
        
        /*
	 *      
	 * 	Purpose: My update - auto approve
	 * 	Added in Version 1.2
	 *
	 */ 
        private function updateStatusByUId($status, $id)
	{
		$this->db->wpdb->query("UPDATE ".$this->db->tables['companies']." SET status = '".$status."' WHERE user_id = '".$id."'");
	}


}

$LcpCompanies = new LcpCompanies($LcpDb);

?>