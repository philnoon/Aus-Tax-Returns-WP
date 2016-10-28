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
		
        $result['icm_current_fin_yr']=$data['icm_current_fin_yr'];	
		$result['icm_fin_yr']=$data['icm_fin_yr'];		
		$result['icm_ern_salary_or_wage_q']=$data['icm_ern_salary_or_wage_q'];
		//$result['icm_payg_summary_docs']=$data['icm_payg_summary_docs'];
		$result['icm_ern_gross']=$data['icm_ern_gross'];
		$result['icm_ern_tax']=$data['icm_ern_tax'];
		$result['icm_ern_fnge_befts']=$data['icm_ern_fnge_befts'];
		$result['icm_ern_emlyr_spr_cont']=$data['icm_ern_emlyr_spr_cont'];
		$result['icm_alwn_erns_tips_q']=$data['icm_alwn_erns_tips_q'];
		$result['icm_alwn_erns_tips_desc']=$data['icm_alwn_erns_tips_desc'];
		$result['icm_alwn_erns_tips_amnt']=$data['icm_alwn_erns_tips_amnt'];
		//$result['icm_alwn_erns_tips_docs']=$data['icm_alwn_erns_tips_docs'];
		
		$result['icm_employr_lump_pymtns_q']=$data['icm_employr_lump_pymtns_q'];
		//$result['icm_employr_lump_pymtns_docs']=$data['icm_employr_lump_pymtns_docs'];
		$result['icm_employr_term_pymtns_q']=$data['icm_employr_term_pymtns_q'];
		
		//$result['icm_employr_term_pymtns_docs']=$data['icm_employr_term_pymtns_docs'];
		$result['icm_au_gov_alwnc_q']=$data['icm_au_gov_alwnc_q'];
		$result['icm_au_gov_alwnc_recieved']=$data['icm_au_gov_alwnc_recieved'];
		$result['icm_au_gov_alwnc_amnt']=$data['icm_au_gov_alwnc_amnt'];
		$result['icm_au_gov_alwnc_tx_wthhld']=$data['icm_au_gov_alwnc_tx_wthhld'];
		$result['icm_au_gov_alwnc_date_frm']=$data['icm_au_gov_alwnc_date_frm'];
		$result['icm_au_gov_alwnc_date_to']=$data['icm_au_gov_alwnc_date_to'];
		
		$result['icm_au_gov_pensions_q']=$data['icm_au_gov_pensions_q'];
		$result['icm_au_gov_pensions_desc']=$data['icm_au_gov_pensions_desc'];
		$result['icm_au_gov_pensions_amnt']=$data['icm_au_gov_pensions_amnt'];
		$result['icm_au_gov_pensions_tx_wthhld']=$data['icm_au_gov_pensions_tx_wthhld'];
		
		$result['icm_au_supr_inc_strm_q']=$data['icm_au_supr_inc_strm_q'];
		$result['icm_au_supr_inc_strm_desc']=$data['icm_au_supr_inc_strm_desc'];
		$result['icm_au_supr_inc_strm_amnt']=$data['icm_au_supr_inc_strm_amnt'];
		$result['icm_au_supr_inc_strm_tx_wthhld']=$data['icm_au_supr_inc_strm_tx_wthhld'];
		//$result['icm_au_supr_inc_strm_docs']=$data['icm_au_supr_inc_strm_docs'];
		
		
		$result['icm_au_supr_lump_paymt_q']=$data['icm_au_supr_lump_paymt_q'];
		$result['icm_au_supr_lump_paymt_abn']=$data['icm_au_supr_lump_paymt_abn'];
		$result['icm_au_supr_lump_paymt_date']=$data['icm_au_supr_lump_paymt_date'];
		$result['icm_au_supr_lump_paymt_tx_cmp']=$data['icm_au_supr_lump_paymt_tx_cmp'];
		$result['icm_au_supr_lump_paymt_untx_cmp']=$data['icm_au_supr_lump_paymt_untx_cmp'];
		$result['icm_au_supr_lump_paymt_tx_wthhld']=$data['icm_au_supr_lump_paymt_tx_wthhld'];
		//$result['icm_au_supr_lump_paymt_docs']=$data['icm_au_supr_lump_paymt_docs'];
		
		$result['icm_compny_trust_q']=$data['icm_compny_trust_q'];
		$result['icm_compny_trust_pyrs_name']=$data['icm_compny_trust_pyrs_name'];		
		$result['icm_compny_trust_pyrs_abn']=$data['icm_compny_trust_pyrs_abn'];		
		$result['icm_compny_trust_gros_amnt']=$data['icm_compny_trust_gros_amnt'];
		$result['icm_compny_trust_tx_wthhld']=$data['icm_compny_trust_tx_wthhld'];		
		//$result['icm_compny_trust_pyrs_docs']=$data['icm_compny_trust_pyrs_docs'];
		
		
		$result['icm_intst_icm_q']=$data['icm_intst_icm_q'];
		$result['icm_intst_icm_bank']=$data['icm_intst_icm_bank'];
		$result['icm_intst_icm_branch']=$data['icm_intst_icm_branch'];
		$result['icm_intst_icm_acc_num']=$data['icm_intst_icm_acc_num'];		
		$result['icm_intst_icm_amnt']=$data['icm_intst_icm_amnt'];
		$result['icm_intst_icm_tfn_amnt']=$data['icm_intst_icm_tfn_amnt'];
		$result['icm_intst_icm_jnt_nmes']=$data['icm_intst_icm_jnt_nmes'];
		
		
		$result['icm_recve_dvdends_q']=$data['icm_recve_dvdends_q'];
		$result['icm_recve_dvdends_comp']=$data['icm_recve_dvdends_comp'];
		$result['icm_recve_dvdends_dte_paid']=$data['icm_recve_dvdends_dte_paid'];
		$result['icm_recve_dvdends_unfranked']=$data['icm_recve_dvdends_unfranked'];
		$result['icm_recve_dvdends_franked']=$data['icm_recve_dvdends_franked'];
		$result['icm_recve_dvdends_Imptn_cdts']=$data['icm_recve_dvdends_Imptn_cdts'];
		
		
		$result['icm_prt_emp_shr_schme_q']=$data['icm_prt_emp_shr_schme_q'];
		//$result['icm_prt_emp_shr_schme_docs']=$data['icm_prt_emp_shr_schme_docs'];
		
		$result['icm_distbtn_prtnshps_trsts_q']=$data['icm_distbtn_prtnshps_trsts_q'];
		//$result['icm_distbtn_prtnshps_trsts_docs']=$data['icm_distbtn_prtnshps_trsts_docs'];
		
		$result['icm_psnl_srv_icm_q']=$data['icm_psnl_srv_icm_q'];
		$result['icm_psnl_srv_icm_bus_acty']=$data['icm_psnl_srv_icm_bus_acty'];
		$result['icm_psnl_srv_icm_bus_abn']=$data['icm_psnl_srv_icm_bus_abn'];		
		$result['icm_psnl_srv_icm_pyr_nme']=$data['icm_psnl_srv_icm_pyr_nme'];
		$result['icm_psnl_srv_icm_pyr_abn']=$data['icm_psnl_srv_icm_pyr_abn'];
		$result['icm_psnl_srv_icm_pyr_amnt']=$data['icm_psnl_srv_icm_pyr_amnt'];
		$result['icm_psnl_srv_icm_pyr_tx_wthhld']=$data['icm_psnl_srv_icm_pyr_tx_wthhld'];
		
		
		//$result['icm_psnl_srv_icm_amnt']=$data['icm_psnl_srv_icm_amnt'];
		//$result['icm_psnl_srv_icm_tax_wthhld']=$data['icm_psnl_srv_icm_tax_wthhld'];
		$result['icm_ded_wrks_comp_insrnce']=$data['icm_ded_wrks_comp_insrnce'];
		$result['icm_ded_bnk_fees_chrgs']=$data['icm_ded_bnk_fees_chrgs'];
		$result['icm_ded_tx_expnc_rtns_bas']=$data['icm_ded_tx_expnc_rtns_bas'];
		$result['icm_ded_reg_lic_fees']=$data['icm_ded_reg_lic_fees'];
		$result['icm_ded_adv_tendng_quoting']=$data['icm_ded_adv_tendng_quoting'];
		$result['icm_ded_deprec_asets']=$data['icm_ded_deprec_asets'];
		$result['icm_ded_ecp_hme_ofce']=$data['icm_ded_ecp_hme_ofce'];
		$result['icm_ded_arms_emplye_slry']=$data['icm_ded_arms_emplye_slry'];
		$result['icm_ded_arms_emplye_supr']=$data['icm_ded_arms_emplye_supr'];
		$result['icm_ded_paid_asote_princ_wrk']=$data['icm_ded_paid_asote_princ_wrk'];
		$result['icm_ded_supr_ret_svngs_acc']=$data['icm_ded_supr_ret_svngs_acc'];
		
		
		$result['icm_busnes_prft_ls_q']=$data['icm_busnes_prft_ls_q'];
		$result['icm_busnes_prft_ls_bus_name']=$data['icm_busnes_prft_ls_bus_name'];
		$result['icm_busnes_prft_ls_bus_abn']=$data['icm_busnes_prft_ls_bus_abn'];
		//$result['icm_busnes_prft_ls_srt_dr_yr_q']=$data['icm_busnes_prft_ls_srt_dr_yr_q'];
		//$result['icm_busnes_prft_ls_fnsh_dr_yr_q']=$data['icm_busnes_prft_ls_fnsh_dr_yr_q'];
		$result['icm_busnes_prft_ls_icm_amnt']=$data['icm_busnes_prft_ls_icm_amnt'];
		$result['icm_busnes_prft_ls_expnces']=$data['icm_busnes_prft_ls_expnces'];
		//$result['icm_busnes_prft_ls_docs']=$data['icm_busnes_prft_ls_docs'];
		
		
		$result['icm_defrd_bus_ls_q']=$data['icm_defrd_bus_ls_q'];
		$result['icm_defrd_bus_ls_yr']=$data['icm_defrd_bus_ls_yr'];
		$result['icm_defrd_bus_ls_amnt']=$data['icm_defrd_bus_ls_amnt'];
		//$result['icm_defrd_bus_ls_docs']=$data['icm_defrd_bus_ls_docs'];
		
		$result['icm_captl_gns_ls_q']=$data['icm_captl_gns_ls_q'];
		$result['icm_captl_gns_ls_desc']=$data['icm_captl_gns_ls_desc'];
		$result['icm_captl_gns_ls_prceds']=$data['icm_captl_gns_ls_prceds'];
		$result['icm_captl_gns_ls_cost']=$data['icm_captl_gns_ls_cost'];
		//$result['icm_captl_gns_ls_docs']=$data['icm_captl_gns_ls_docs'];
		
		$result['icm_forgn_incm_q']=$data['icm_forgn_incm_q'];
		$result['icm_forgn_incm_desc']=$data['icm_forgn_incm_desc'];
		$result['icm_forgn_incm_amnt']=$data['icm_forgn_incm_amnt'];
		$result['icm_forgn_incm_tx_paid']=$data['icm_forgn_incm_tx_paid'];
		$result['icm_forgn_incm_ded']=$data['icm_forgn_incm_ded'];
		//$result['icm_forgn_incm_docs']=$data['icm_forgn_incm_docs'];
		
		$result['icm_invt_prty_rntl_icm_q']=$data['icm_invt_prty_rntl_icm_q'];
		$result['icm_invt_prty_rntl_adrs']=$data['icm_invt_prty_rntl_adrs'];
		$result['icm_invt_prty_rntl_pct_ownr']=$data['icm_invt_prty_rntl_pct_ownr'];
		$result['icm_invt_prty_rntl_wks_avl_rnt']=$data['icm_invt_prty_rntl_wks_avl_rnt'];
		$result['icm_invt_prty_rntl_dt_fst_rntd']=$data['icm_invt_prty_rntl_dt_fst_rntd'];
		//$result['icm_invt_prty_rntl_docs']=$data['icm_invt_prty_rntl_docs'];
		
		$result['icm_invt_prty_rntl_icm_desc']=$data['icm_invt_prty_rntl_icm_desc'];
		$result['icm_invt_prty_rntl_amnt']=$data['icm_invt_prty_rntl_amnt'];
		$result['icm_invt_prty_rntl_advt']=$data['icm_invt_prty_rntl_advt'];
		$result['icm_invt_prty_rntl_adm_lvy']=$data['icm_invt_prty_rntl_adm_lvy'];
		$result['icm_invt_prty_rntl_corp_fes']=$data['icm_invt_prty_rntl_corp_fes'];
		$result['icm_invt_prty_rntl_cncl_rts']=$data['icm_invt_prty_rntl_cncl_rts'];
		$result['icm_invt_prty_rntl_cap_wks_ded']=$data['icm_invt_prty_rntl_cap_wks_ded'];
		$result['icm_invt_prty_rntl_clning']=$data['icm_invt_prty_rntl_clning'];
		$result['icm_invt_prty_rntl_deprctn']=$data['icm_invt_prty_rntl_deprctn'];
		$result['icm_invt_prty_rntl_elect']=$data['icm_invt_prty_rntl_elect'];
		$result['icm_invt_prty_rntl_gst']=$data['icm_invt_prty_rntl_gst'];
		$result['icm_invt_prty_rntl_grdn_mnt']=$data['icm_invt_prty_rntl_grdn_mnt'];
		$result['icm_invt_prty_rntl_isptn_fes']=$data['icm_invt_prty_rntl_isptn_fes'];
		$result['icm_invt_prty_rntl_lese_fes']=$data['icm_invt_prty_rntl_lese_fes'];
		$result['icm_invt_prty_rntl_pst_cntrl']=$data['icm_invt_prty_rntl_pst_cntrl'];
		$result['icm_invt_prty_rntl_reprs_main']=$data['icm_invt_prty_rntl_reprs_main'];
		$result['icm_invt_prty_rntl_prpty_mng_fes']=$data['icm_invt_prty_rntl_prpty_mng_fes'];
		$result['icm_invt_prty_rntl_postge']=$data['icm_invt_prty_rntl_postge'];
		$result['icm_invt_prty_rntl_sundries']=$data['icm_invt_prty_rntl_sundries'];
		$result['icm_invt_prty_rntl_watr_rts']=$data['icm_invt_prty_rntl_watr_rts'];
		$result['icm_invt_prty_rntl_others']=$data['icm_invt_prty_rntl_others'];
		$result['icm_invt_prty_rntl_othr_icm_q']=$data['icm_invt_prty_rntl_othr_icm_q'];
		$result['icm_invt_prty_rntl_othr_desc']=$data['icm_invt_prty_rntl_othr_desc'];
		$result['icm_invt_prty_rntl_othr_dt_frm']=$data['icm_invt_prty_rntl_othr_dt_frm'];
		$result['icm_invt_prty_rntl_othr_amnt']=$data['icm_invt_prty_rntl_othr_amnt'];
		//$result['icm_invt_prty_rntl_othe_docs']=$data['icm_invt_prty_rntl_othe_docs'];
		
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
			'icm_au_supr_inc_strm_docs',
			'icm_au_supr_lump_paymt_docs',
			'icm_compny_trust_pyrs_docs',
			'icm_prt_emp_shr_schme_docs',
			'icm_distbtn_prtnshps_trsts_docs',
			'icm_busnes_prft_ls_docs',
			'icm_captl_gns_ls_docs',				
			'icm_forgn_incm_docs',
			'icm_invt_prty_rntl_docs',
			'icm_invt_prty_rntl_othe_docs'	
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

		

}

$LcpIncome = new LcpIncome($LcpDb);

?>