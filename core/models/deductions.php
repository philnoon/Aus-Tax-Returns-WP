<?php

class LcpDeductions {

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
			$query = "SELECT * FROM ".$this->db->tables['deductions'];
		} else {
			$query = "SELECT * FROM ".$this->db->tables['deductions'] ." WHERE status='".$status."'";
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
		$results =  $this->db->wpdb->get_results(	"SELECT * FROM " . $this->db->tables['deductions'] .
													" JOIN " .$this->db->tables['users'] . " ON " . $this->db->tables['users'] . ".id = ".$this->db->tables['deductions'].".user_id".
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

		return $this->db->wpdb->insert($this->db->tables['deductions'], $data);
							
	}

	/*
	 *
	 * 	Purpose: Updates a lead
	 * 	Added in Version 1.1.0
	 *
	 */
	 
	function update($data, $user_id){
	
		$this->db->wpdb->show_errors();
		
		$result['ded_veh_wk_purposes_q']=$data['ded_veh_wk_purposes_q'];
		$result['ded_veh_wk_make']=$data['ded_veh_wk_make'];
		$result['ded_veh_wk_model']=$data['ded_veh_wk_model'];
		$result['ded_veh_wk_engine_size']=$data['ded_veh_wk_engine_size'];
		$result['ded_veh_wk_opening_mileage']=$data['ded_veh_wk_opening_mileage'];
		$result['ded_veh_wk_closing_mileage']=$data['ded_veh_wk_closing_mileage'];
		$result['ded_veh_wk_purchase_price']=$data['ded_veh_wk_purchase_price'];
		$result['ded_veh_wk_purchased_date']=$data['ded_veh_wk_purchased_date'];
		$result['ded_veh_wk_kilo_driven']=$data['ded_veh_wk_kilo_driven'];
		$result['ded_veh_expense']=$data['ded_veh_expense'];
		$result['ded_veh_lease_interest']=$data['ded_veh_lease_interest'];
		$result['ded_veh_rego']=$data['ded_veh_rego'];
		$result['ded_veh_insurance']=$data['ded_veh_insurance'];
		$result['ded_veh_services']=$data['ded_veh_services'];
		$result['ded_veh_tyres_batteries']=$data['ded_veh_tyres_batteries'];
		$result['ded_veh_repairs_maint']=$data['ded_veh_repairs_maint'];
		$result['ded_veh_car_washes']=$data['ded_veh_car_washes'];
		$result['ded_veh_parking_other_q']=$data['ded_veh_parking_other_q'];
		//$result['ded_veh_parking_other_docs']=$data['ded_veh_parking_other_docs'];
		$result['ded_veh_taxi_fares_q']=$data['ded_veh_taxi_fares_q'];
		//$result['ded_veh_taxi_fares_docs']=$data['ded_veh_taxi_fares_docs'];
		$result['ded_veh_travel_for_work_q']=$data['ded_veh_travel_for_work_q'];
		$result['ded_veh_travel_allowance_q']=$data['ded_veh_travel_allowance_q'];
		$result['ded_veh_travel_allowance_gross']=$data['ded_veh_travel_allowance_gross'];
		$result['ded_veh_travel_allowance_tax']=$data['ded_veh_travel_allowance_tax'];
		$result['ded_veh_ppe_q']=$data['ded_veh_ppe_q'];
		$result['ded_veh_ppe_desc']=$data['ded_veh_ppe_desc'];
		$result['ded_veh_ppe_amount']=$data['ded_veh_ppe_amount'];
		//$result['ded_veh_ppe_docs']=$data['ded_veh_ppe_docs'];
		$result['ded_slf_ed_q']=$data['ded_slf_ed_q'];
		$result['ded_slf_ed_course_name']=$data['ded_slf_ed_course_name'];
		$result['ded_slf_ed_union_fees']=$data['ded_slf_ed_union_fees'];
		$result['ded_slf_ed_course_fees']=$data['ded_slf_ed_course_fees'];
		$result['ded_slf_ed_books_stat']=$data['ded_slf_ed_books_stat'];
		$result['ded_slf_ed_depreciation']=$data['ded_slf_ed_depreciation'];
		$result['ded_slf_ed_seminars']=$data['ded_slf_ed_seminars'];
		$result['ded_slf_ed_travel']=$data['ded_slf_ed_travel'];
		$result['ded_slf_ed_other_desc']=$data['ded_slf_ed_other_desc'];
		$result['ded_slf_ed_other_amount']=$data['ded_slf_ed_other_amount'];
		$result['ded_othr_wk_exp_q']=$data['ded_othr_wk_exp_q'];
		$result['ded_othr_wk_exp_home_office']=$data['ded_othr_wk_exp_home_office'];
		$result['ded_othr_wk_exp_comp_softwre']=$data['ded_othr_wk_exp_comp_softwre'];
		$result['ded_othr_wk_exp_phone_mobile']=$data['ded_othr_wk_exp_phone_mobile'];
		$result['ded_othr_wk_exp_tools_equip']=$data['ded_othr_wk_exp_tools_equip'];
		$result['ded_othr_wk_exp_subscrip_union']=$data['ded_othr_wk_exp_subscrip_union'];
		$result['ded_othr_wk_exp_journals_magz']=$data['ded_othr_wk_exp_journals_magz'];
		$result['ded_othr_wk_exp_depreciation']=$data['ded_othr_wk_exp_depreciation'];
		$result['ded_othr_wk_exp_sun_protect']=$data['ded_othr_wk_exp_sun_protect'];
		$result['ded_othr_wk_exp_crs_fees']=$data['ded_othr_wk_exp_crs_fees'];
		$result['ded_othr_wk_exp_crs_trvl_fees']=$data['ded_othr_wk_exp_crs_trvl_fees'];
		$result['ded_othr_wk_exp_crs_othr_desc']=$data['ded_othr_wk_exp_crs_othr_desc'];
		$result['ded_othr_wk_exp_crs_othr_amnt']=$data['ded_othr_wk_exp_crs_othr_amnt'];
		$result['ded_othr_wk_exp_othr_desc']=$data['ded_othr_wk_exp_othr_desc'];
		$result['ded_othr_wk_exp_othr_amount']=$data['ded_othr_wk_exp_othr_amount'];
		//$result['ded_othr_wk_exp_othr_docs']=$data['ded_othr_wk_exp_othr_docs'];
		$result['ded_low_val_pool_prv_yr_q']=$data['ded_low_val_pool_prv_yr_q'];
		$result['ded_low_val_pool_prv_yr_balce']=$data['ded_low_val_pool_prv_yr_balce'];
		$result['ded_low_val_pool_prv_yr_assets']=$data['ded_low_val_pool_prv_yr_assets'];
		$result['ded_exp_ern_int_or_divd_q']=$data['ded_exp_ern_int_or_divd_q'];
		$result['ded_exp_ern_int_or_divd_desc']=$data['ded_exp_ern_int_or_divd_desc'];
		$result['ded_exp_ern_int_paid']=$data['ded_exp_ern_int_paid'];
		$result['ded_exp_ern_mngt_fes']=$data['ded_exp_ern_mngt_fes'];		
		$result['ded_chrty_gfts_donat_q']=$data['ded_chrty_gfts_donat_q'];
		$result['ded_chrty_name']=$data['ded_chrty_name'];
		$result['ded_chrty_amount']=$data['ded_chrty_amount'];
		//$result['ded_chrty_docs']=$data['ded_chrty_docs'];
		$result['ded_lst_yr_rt_tx_agt_q']=$data['ded_lst_yr_rt_tx_agt_q'];
		$result['ded_lst_yr_tx_agt_name']=$data['ded_lst_yr_tx_agt_name'];
		$result['ded_lst_yr_tx_agt_address']=$data['ded_lst_yr_tx_agt_address'];
		$result['ded_lst_yr_tx_agt_paid']=$data['ded_lst_yr_tx_agt_paid'];
		$result['ded_lst_yr_tx_agt_dist_trvl']=$data['ded_lst_yr_tx_agt_dist_trvl'];
		$result['ded_prsn_spr_cont_q']=$data['ded_prsn_spr_cont_q'];
		$result['ded_prsn_spr_fund_name']=$data['ded_prsn_spr_fund_name'];
		$result['ded_prsn_spr_acc_num']=$data['ded_prsn_spr_acc_num'];
		$result['ded_prsn_spr_fund_abn']=$data['ded_prsn_spr_fund_abn'];
		$result['ded_prsn_spr_fund_tfn']=$data['ded_prsn_spr_fund_tfn'];
		$result['ded_prsn_othr_ded_q']=$data['ded_prsn_othr_ded_q'];
		$result['ded_prsn_othr_ded_desc']=$data['ded_prsn_othr_ded_desc'];
		$result['ded_prsn_othr_ded_amnt']=$data['ded_prsn_othr_ded_amnt'];
		//$result['ded_misc_other']=$data['ded_misc_other'];
		//$result['status']=$data['status'];
		//$result['created_at']=$data['created_at'];
		//$result['updated_at']=$data['updated_at'];

		//return $this->db->wpdb->update($this->db->tables['deuctions'], $data, array('hash'=>$data['hash']));
		
		$result['updated_at']= date('Y-m-d H:i:s');		
		//unset($result['Update']);	
		$this->db->wpdb->update($this->db->tables['deductions'], $result, array('user_id'=>$user_id));

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
			//Create deductions folder
			if ( !file_exists( $client_docs_user_dir . '/deductions' ) ) {				
				mkdir($client_docs_user_dir . '/deductions', 0777, true);						
			}
			
			$upload_dir = $plugin_dir . 'client-docs/'. $username .'/deductions/';
			
			$filenames = array(			
			'ded_veh_parking_other_docs',
			'ded_veh_taxi_fares_docs',
			'ded_veh_ppe_docs',
			'ded_othr_wk_exp_othr_docs',
			'ded_chrty_docs'	
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
				$this->db->wpdb->update($this->db->tables['deductions'], $result, array('user_id'=>$user_id));		
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

		

}

$LcpDeductions = new LcpDeductions($LcpDb);

?>