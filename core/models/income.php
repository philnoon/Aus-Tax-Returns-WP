<?php

class LcpIncome {

	function __construct($db){

		$this->db = $db;

	}

	/*
	 *
	 * 	Purpose: Gets all income based on status
	 * 	Added in Version 1.0.5
	 *
	 */
	function get($status = null) 
	{

		if ( $status == null) {
			$query = "SELECT * FROM ".$this->db->tables['income'];
		} else {
			$query = "SELECT * FROM ".$this->db->tables['income'] ." WHERE status='".$status."'";
		}

		return $this->db->wpdb->get_results( $query );

	}

	
	/*
	 *
	 * 	Purpose: Gets income by the user id
	 * 	Added in Version 1.0.5
	 *
	 */
	function byUserID($user_id, $status) 
	{
		$results =  $this->db->wpdb->get_results(	"SELECT * FROM " . $this->db->tables['income'] .
													" JOIN " .$this->db->tables['users'] . " ON " . $this->db->tables['users'] . ".id = ".$this->db->tables['income'].".user_id".
													" WHERE status='" . $status . "'".
													" AND ".$this->db->tables['users'].".id = '".$user_id."'");

		return $results[0];
	}
	
	
	
	/*
		 *
		 * 	Purpose: Gets income by row id
		 * 	Added in Version 1.0.5
		 *
		 */
		function byUserIDandRowId($id) 
		{
			$results =  $this->db->wpdb->get_results("SELECT * FROM " . $this->db->tables['income'] ." WHERE id=" . $id);
	
			return $results[0];
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

		$results = $this->db->wpdb->get_results(	"SELECT * FROM " . $this->db->tables['companies_income'] .
													" JOIN " .$this->db->tables['income']. " ON ".$this->db->tables['income'].".id = ".$this->db->tables['companies_income'].".lead_id".
													" WHERE ".$this->db->tables['companies_income'].".company_id='".$id."'" .
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
		$results = $this->db->wpdb->get_results( "	SELECT * FROM ".$this->db->tables['income']. " WHERE hash='".$hash."'" );
		return $results[0];
	}

	/*
	 *
	 * 	Purpose: Stores a lead
	 * 	Added in Version 1.0.5
	 *
	 */
	function insert($data) {

		return $this->db->wpdb->insert($this->db->tables['income'], $data);

	}
	
	/*
	 *
	 * 	Purpose: Updates the income form
	 * 	Added in Version 1.1.0
	 *
	 */
	
	
	function update($data, $user_id)
	{
		$this->db->wpdb->show_errors();
		
        //$result['icm_current_fin_yr']=$data['icm_current_fin_yr'];	
		$result['icm_fin_yr']=$data['icm_fin_yr'];		
		$result['icm_ern_salary_or_wage_q']=$data['icm_ern_salary_or_wage_q'];
		$result['icm_ern_salary_or_wage_c']=$data['icm_ern_salary_or_wage_c'];

		$result['icm_alwn_erns_tips_q']=$data['icm_alwn_erns_tips_q'];
		$result['icm_alwn_erns_tips_c']=$data['icm_alwn_erns_tips_c'];
		
		$result['icm_employr_lump_pymtns_q']=$data['icm_employr_lump_pymtns_q'];
		$result['icm_employr_lump_pymtns_c']=$data['icm_employr_lump_pymtns_c'];			
		
		$result['icm_employr_term_pymtns_q']=$data['icm_employr_term_pymtns_q'];
		$result['icm_employr_term_pymtns_c']=$data['icm_employr_term_pymtns_c'];
		
		$result['icm_au_gov_alwnc_q']=$data['icm_au_gov_alwnc_q'];
		$result['icm_au_gov_alwnc_c']=$data['icm_au_gov_alwnc_c'];	
		
		$result['icm_au_gov_pensions_q']=$data['icm_au_gov_pensions_q'];
		$result['icm_au_gov_pensions_c']=$data['icm_au_gov_pensions_c'];
		
		$result['icm_au_supr_inc_strm_q']=$data['icm_au_supr_inc_strm_q'];
		$result['icm_au_supr_inc_strm_c']=$data['icm_au_supr_inc_strm_c'];		

		$result['icm_au_supr_lump_paymt_q']=$data['icm_au_supr_lump_paymt_q'];
		$result['icm_au_supr_lump_paymt_c']=$data['icm_au_supr_lump_paymt_c'];
		
		$result['icm_attr_ser_inc_q']=$data['icm_attr_ser_inc_q'];
		$result['icm_attr_ser_inc_c']=$data['icm_attr_ser_inc_c'];

		$result['icm_intst_icm_q']=$data['icm_intst_icm_q'];
		$result['icm_intst_icm_c']=$data['icm_intst_icm_c'];	
		
		$result['icm_recve_dvdends_q']=$data['icm_recve_dvdends_q'];
		$result['icm_recve_dvdends_c']=$data['icm_recve_dvdends_c'];	
		
		$result['icm_prt_emp_shr_schme_q']=$data['icm_prt_emp_shr_schme_q'];
		$result['icm_prt_emp_shr_schme_c']=$data['icm_prt_emp_shr_schme_c'];	
		
		$result['icm_distbtn_prtnshps_trsts_q']=$data['icm_distbtn_prtnshps_trsts_q'];
		$result['icm_distbtn_prtnshps_trsts_c']=$data['icm_distbtn_prtnshps_trsts_c'];	
		
		$result['icm_psnl_srv_icm_q']=$data['icm_psnl_srv_icm_q'];
		$result['icm_psnl_srv_icm_c']=$data['icm_psnl_srv_icm_c'];	
		
		$result['icm_business_inc_q']=$data['icm_business_inc_q'];
		$result['icm_business_inc_c']=$data['icm_business_inc_c'];
		$result['icm_business_inc_abn']=$data['icm_business_inc_abn'];	
		$result['icm_business_inc_name']=$data['icm_business_inc_name'];	
		$result['icm_business_inc_address']=$data['icm_business_inc_address'];	
		
		$result['icm_captl_gns_ls_q']=$data['icm_captl_gns_ls_q'];
		$result['icm_captl_gns_ls_c']=$data['icm_captl_gns_ls_c'];	
		
		$result['icm_forgn_incm_q']=$data['icm_forgn_incm_q'];			
		$result['icm_forgn_incm_c']=$data['icm_forgn_incm_c'];	
		
		$result['updated_at']= date('Y-m-d H:i:s');		
		//unset($result['Update']);	
		$this->db->wpdb->update($this->db->tables['income'], $result, array('user_id'=>$user_id));
		
	}
	
	/*
	 *
	 * 	Purpose: Update income files 	
	 *
	 */
	function updateFile($files, $user_id, $plugin_dir, $username ) {
		
		$result = array();
			
		$client_docs_user_dir = $plugin_dir . 'client-docs/' . $username;
		
		//Create upload directory for user		
		if ( !file_exists($client_docs_user_dir ) ) {				
			mkdir($client_docs_user_dir, 0777, true);				
		}
		//Create income folder
		if ( !file_exists( $client_docs_user_dir . '/income' ) ) {				
			mkdir($client_docs_user_dir . '/income', 0777, true);						
		}
		
		$upload_dir = $plugin_dir . 'client-docs/'. $username .'/income/';
		
		$filenames = array(
			'icm_payg_summary_docs',
			'icm_alwn_erns_tips_docs',
			'icm_employr_lump_pymtns_docs',
			'icm_employr_term_pymtns_docs',
			'icm_au_gov_alwnc_docs',
			'icm_au_gov_pensions_docs',
			'icm_au_supr_inc_strm_docs',
			'icm_au_supr_lump_paymt_docs',
			'icm_attr_ser_inc_docs',
			'icm_intst_icm_docs',
			'icm_recve_dvdends_docs',
			'icm_prt_emp_shr_schme_docs',
			'icm_distbtn_prtnshps_trsts_docs',
			'icm_psnl_srv_icm_docs',
			'icm_business_inc_docs',
			'icm_captl_gns_ls_docs',
			'icm_forgn_incm_docs'
		);			
		
		for( $i=0; $i < count($filenames); $i++ ) {				
			
			//checks if has value then move flle
			if( $files[$filenames[$i]]['name'] ) {	
				
				//echo 'ampao';
			
				$file = $upload_dir . basename( $files[$filenames[$i]]['name']);						
				move_uploaded_file($files[$filenames[$i]]["tmp_name"], $file );
				
				$result[$filenames[$i]] = $files[$filenames[$i]]['name'];
				
			}
			
		}		
		
		//update filename to the database
		if( $result ) {
			$this->db->wpdb->update($this->db->tables['income'], $result, array('user_id'=>$user_id));		
		}		
	}	

	/*
	 *
	 * 	Purpose: Gets availability of lead
	 * 	Added in Version 1.0.5
	 *
	 */
	function available($purchased_income)
	{

		return $this->db->wpdb->get_results(	" SELECT * FROM ".$this->db->tables['income'].
												" WHERE id NOT IN (".$purchased_income.")".
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
		return $this->db->wpdb->query( " DELETE FROM ".$this->db->tables['income']." WHERE hash = '".$hash."'");
	}

	/*
	 *
	 * 	Purpose: Changes status of lead
	 * 	Added in Version 1.0.5
	 *
	 */
	private function updateStatus($status, $hash)
	{
		return $this->db->wpdb->query( " UPDATE ".$this->db->tables['income']." SET status = '".$status."' WHERE hash = '".$hash."'");
	}
	
	function getLastId() {
	
			return $this->db->wpdb->insert_id;
			//$lastid = $wpdb->insert_id;
	
		}

		

}

$LcpIncome = new LcpIncome($LcpDb);

?>