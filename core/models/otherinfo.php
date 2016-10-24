<?php

class LcpOtherinfo {

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
			$query = "SELECT * FROM ".$this->db->tables['otherinfo'];
		} else {
			$query = "SELECT * FROM ".$this->db->tables['otherinfo'] ." WHERE status='".$status."'";
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
	$results =  $this->db->wpdb->get_results(	"SELECT * FROM " . $this->db->tables['otherinfo'] .
												" JOIN " .$this->db->tables['users'] . " ON " . $this->db->tables['users'] . ".id = ".$this->db->tables['otherinfo'].".user_id".
												" WHERE status='" . $status . "'".
												" AND ".$this->db->tables['users'].".id = '".$user_id."'");

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

		$results = $this->db->wpdb->get_results(	"SELECT * FROM " . $this->db->tables['otherinfo'] .
													" JOIN " .$this->db->tables['otherinfo']. " ON ".$this->db->tables['otherinfo'].".id = ".$this->db->tables['otherinfo'].".lead_id".
													" WHERE ".$this->db->tables['otherinfo'].".company_id='".$id."'" .
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
		$results = $this->db->wpdb->get_results( "	SELECT * FROM ".$this->db->tables['otherinfo']. " WHERE hash='".$hash."'" );
		return $results[0];
	}

	/*
	 *
	 * 	Purpose: Stores a lead
	 * 	Added in Version 1.0.5
	 *
	 */
	function insert($data) {

		return $this->db->wpdb->insert($this->db->tables['otherinfo'], $data);

	}

	/*
	 *
	 * 	Purpose: Updates a lead
	 * 	Added in Version 1.1.0
	 *
	 */
	/*
	function update($data) {

		return $this->db->wpdb->update($this->db->tables['otherinfo'], $data, array('hash'=>$data['hash']));

	}*/
		 
		function update($data, $user_id){
		
			$this->db->wpdb->show_errors();	
			
			//$result['id']=$data['id'];
			//$result['hash']=$data['hash'];
			//$result['company_id']=$data['company_id'];
			//$result['user_id']=$data['user_id'];
			//$result['lodgement_id']=$data['lodgement_id'];
			$result['othr_prvt_hlth_insr_whl_yr_q']=$data['othr_prvt_hlth_insr_whl_yr_q'];
			$result['othr_prvt_hlth_insr_nme']=$data['othr_prvt_hlth_insr_nme'];
			$result['othr_prvt_hlth_insr_mbr_num']=$data['othr_prvt_hlth_insr_mbr_num'];
			$result['othr_prvt_hlth_insr_prem_pd']=$data['othr_prvt_hlth_insr_prem_pd'];
			$result['othr_prvt_hlth_insr_rbt_recvd']=$data['othr_prvt_hlth_insr_rbt_recvd'];
			$result['othr_prvt_hlth_insr_rbt_pcnt']=$data['othr_prvt_hlth_insr_rbt_pcnt'];
			//$result['othr_prvt_hlth_insr_docs']=$data['othr_prvt_hlth_insr_docs'];
			$result['othr_spr_cont_spuce_q']=$data['othr_spr_cont_spuce_q'];
			$result['othr_spr_cont_spuce_amnt']=$data['othr_spr_cont_spuce_amnt'];
			$result['othr_lve_remt_aus_q']=$data['othr_lve_remt_aus_q'];
			$result['othr_lve_remt_aus_dt_frm']=$data['othr_lve_remt_aus_dt_frm'];
			$result['othr_lve_remt_aus_dt_to']=$data['othr_lve_remt_aus_dt_to'];
			$result['othr_lve_remt_aus_pst_ofce']=$data['othr_lve_remt_aus_pst_ofce'];
			$result['othr_med_exp_ovr_2120_q']=$data['othr_med_exp_ovr_2120_q'];
			$result['othr_med_exp_ofst_yr_1314_q']=$data['othr_med_exp_ofst_yr_1314_q'];
			$result['othr_med_exp_crnt_yr_amnt']=$data['othr_med_exp_crnt_yr_amnt'];
			//$result['othr_med_exp_crnt_yr_amnt_docs']=$data['othr_med_exp_crnt_yr_amnt_docs'];
			$result['othr_med_ent_medicr_exmt_rd_q']=$data['othr_med_ent_medicr_exmt_rd_q'];
			$result['othr_med_ent_medicr_exmt_rd_amnt']=$data['othr_med_ent_medicr_exmt_rd_amnt'];
			$result['othr_hecs_help_std_ln_dept_q']=$data['othr_hecs_help_std_ln_dept_q'];
			$result['othr_hecs_help_std_ln_dept_amnt']=$data['othr_hecs_help_std_ln_dept_amnt'];
			$result['othr_icm_trst_paid_q']=$data['othr_icm_trst_paid_q'];
			$result['othr_icm_trst_amnt']=$data['othr_icm_trst_amnt'];
			$result['othr_icm_trst_name']=$data['othr_icm_trst_name'];
			$result['othr_icm_trst_tfn']=$data['othr_icm_trst_tfn'];
			//$result['othr_icm_trst_docs']=$data['othr_icm_trst_docs'];
			$result['othr_info_comnts']=$data['othr_info_comnts'];
			$result['othr_perm_aus_tx_prtl']=$data['othr_perm_aus_tx_prtl'];
			$result['othr_declare']=$data['othr_declare'];
			
			$result['updated_at']= date('Y-m-d H:i:s');		
			$this->db->wpdb->update($this->db->tables['otherinfo'], $result, array('user_id'=>$user_id));
	
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
		if ( !file_exists( $client_docs_user_dir . '/otherinfo' ) ) {				
			mkdir($client_docs_user_dir . '/otherinfo', 0777, true);						
		}
		
		$upload_dir = $plugin_dir . 'client-docs/'. $username .'/otherinfo/';
		
		$filenames = array(
			'othr_prvt_hlth_insr_docs',
			'othr_med_exp_crnt_yr_amnt_docs',
			'othr_icm_trst_docs'
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
			$this->db->wpdb->update($this->db->tables['otherinfo'], $result, array('user_id'=>$user_id));		
		}		
	}	

	/*
	 *
	 * 	Purpose: Gets availability of lead
	 * 	Added in Version 1.0.5
	 *
	 */
	function available($purchased_leads)
	{

		return $this->db->wpdb->get_results(	" SELECT * FROM ".$this->db->tables['otherinfo'].
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
		return $this->db->wpdb->query( " DELETE FROM ".$this->db->tables['otherinfo']." WHERE hash = '".$hash."'");
	}

	/*
	 *
	 * 	Purpose: Changes status of lead
	 * 	Added in Version 1.0.5
	 *
	 */
	private function updateStatus($status, $hash)
	{
		return $this->db->wpdb->query( " UPDATE ".$this->db->tables['otherinfo']." SET status = '".$status."' WHERE hash = '".$hash."'");
	}

		

}

$LcpOtherinfo = new LcpOtherinfo($LcpDb);

?>