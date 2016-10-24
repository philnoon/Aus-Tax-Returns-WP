<?php

class LcpLeads {

	function __construct($db){

		$this->db = $db;

	}

	/*
	 *
	 * 	Purpose: Gets all leads based on status
	 * 	Added in Version 1.0.5
	 *
	 */
	function get($status = null) 
	{

		if ( $status == null) {
			$query = "SELECT * FROM ".$this->db->tables['leads'];
		} else {
			$query = "SELECT * FROM ".$this->db->tables['leads'] ." WHERE status='".$status."'";
		}

		return $this->db->wpdb->get_results( $query );

	}

	/*
	 *
	 * 	Purpose: Gets a lead by the company id
	 * 	Added in Version 1.0.5
	 *
	 */
	function getByCompanyID($id)
	{

		if ( strlen($id) ==0 ) {
			return array();
		}

		$results = $this->db->wpdb->get_results(	"SELECT * FROM " . $this->db->tables['companies_leads'] .
													" JOIN " .$this->db->tables['leads']. " ON ".$this->db->tables['leads'].".id = ".$this->db->tables['companies_leads'].".lead_id".
													" WHERE ".$this->db->tables['companies_leads'].".company_id='".$id."'" .
													" ORDER BY created_at DESC");
		return $results;

	}

	/*
	 *
	 * 	Purpose: Gets a lead by its hash
	 * 	Added in Version 1.0.5
	 *
	 */
	function getByHash($hash)
	{
		$results = $this->db->wpdb->get_results( "	SELECT * FROM ".$this->db->tables['leads']. " WHERE hash='".$hash."'" );
		return $results[0];
	}

	/*
	 *
	 * 	Purpose: Stores a lead
	 * 	Added in Version 1.0.5
	 *
	 */
	function insert($data) {

		return $this->db->wpdb->insert($this->db->tables['leads'], $data);

	}

	/*
	 *
	 * 	Purpose: Updates a lead
	 * 	Added in Version 1.1.0
	 *
	 */
	function update($data) {

		return $this->db->wpdb->update($this->db->tables['leads'], $data, array('hash'=>$data['hash']));

	}

	/*
	 *
	 * 	Purpose: Gets availability of lead
	 * 	Added in Version 1.0.5
	 *
	 */
	function available($purchased_leads)
	{

		return $this->db->wpdb->get_results(	" SELECT * FROM ".$this->db->tables['leads'].
												" WHERE id NOT IN (".$purchased_leads.")".
												" AND status='approved'" );

	}

	/*
	 *
	 * 	Purpose: Sets status to approved
	 * 	Added in Version 1.0.5
	 *
	 */
	function approve($hash) {
		return $this->updateStatus('approved', $hash);
	}

	/*
	 *
	 * 	Purpose: Sets status to rejected
	 * 	Added in Version 1.0.5
	 *
	 */
	function reject($hash) {
		return $this->updateStatus('rejected', $hash);
	}

	/*
	 *
	 * 	Purpose: Deletes a lead
	 * 	Added in Version 1.0.5
	 *
	 */
	function delete($hash){
		return $this->db->wpdb->query( " DELETE FROM ".$this->db->tables['leads']." WHERE hash = '".$hash."'");
	}

	/*
	 *
	 * 	Purpose: Changes status of lead
	 * 	Added in Version 1.0.5
	 *
	 */
	private function updateStatus($status, $hash)
	{
		return $this->db->wpdb->query( " UPDATE ".$this->db->tables['leads']." SET status = '".$status."' WHERE hash = '".$hash."'");
	}

	/*
	 *
	 * 	Purpose: Gets the stock level of lead
	 * 	Added in Version 1.0.5
	 *
	 */
	function stockLevel($lead_id)
	{
		return $this->db->wpdb->get_results(	"SELECT * FROM ".$this->db->tables['companies_leads'].
												" WHERE ".$this->db->tables['companies_leads'].".lead_id='".$lead_id."'" );
	}

	/*
	 *
	 * 	Purpose: Checks to see if lead has been purchased
	 * 	Added in Version 1.0.5
	 *
	 */
	function hasPurchased($company_id, $lead_id)
	{

		$sql = "SELECT * FROM " . $this->db->tables['companies_leads'] .
								" JOIN " . $this->db->tables['orders'] . " ON " . $this->db->tables['orders'] . ".lead_id = " . $this->db->tables['companies_leads'] . ".lead_id" .
								" WHERE " . $this->db->tables['companies_leads'] . ".company_id='".$company_id."'".
								" AND " . $this->db->tables['companies_leads'] . ".lead_id='".$lead_id."'";
		$results = $this->db->wpdb->get_row($sql);
		return $results;

	}

	/*
	 *
	 * 	Purpose: Purchases a lead
	 * 	Added in Version 1.0.5
	 *
	 */
	function purchase($company_id, $lead_id)
	{

		$data['lead_id'] 		= $lead_id;
		$data['company_id'] 	= $company_id;
		return $this->db->wpdb->insert( $this->db->tables['companies_leads'], $data);

	}

	/*
	 *
	 * 	Purpose: Returns total leads purchased as a number
	 * 	Added in Version 1.1.0
	 *
	 */
	function totalPurchased()
	{

		$result = $this->db->wpdb->get_row( "SELECT COUNT(id) AS total FROM " . $this->db->tables['companies_leads']);
		return $result->total;

	}

	/*
	 *
	 * 	Purpose: Returns purchase history of lead
	 * 	Added in Version 1.1.0
	 *
	 */
	function purchaseHistory($lead_id)
	{

		return $this->db->wpdb->get_results( 	" SELECT ".$this->db->tables['orders'].".*, ".$this->db->tables['companies'].".company_name FROM " . $this->db->tables['orders'] .
												" JOIN ".$this->db->tables['companies']." ON ".$this->db->tables['companies'].".id = ".$this->db->tables['orders'].".company_id".
												" WHERE lead_id = '".$lead_id."'"
												);

	}

}

$LcpLeads = new LcpLeads($LcpDb);

?>