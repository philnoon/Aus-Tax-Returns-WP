<?php

class LcpUsers {

	function __construct($db, $companies, $leads)
	{

		$this->db = $db;
		$this->companies = $companies;
		$this->leads = $leads;

	}

	/*
	 *
	 * 	Purpose: Deletes a user
	 * 	Added in Version 1.0.5
	 *
	 */
	function destroy($user_id)
	{

		// Get the associated company id
		$company_results = $this->companies->byUserID($user_id, 'approved');
		$company = $company_results;

		// Step 1. Remove the company / leads intersect
		$this->db->wpdb->query( "DELETE FROM ".$this->db->tables['companies_leads']." WHERE company_id = '".$company->id."'");

		// step 2. delete the company
		$this->db->wpdb->query( " DELETE FROM ".$this->db->tables['companies']." WHERE id = '".$company->id."'");

		// step 3. delete the user
		$this->db->wpdb->query( " DELETE FROM ".$this->db->tables['users']." WHERE ID = '".$user_id."'");

	}
	/*
	 *
	 * 	Purpose: Updates a user
	 * 	Added in Version 1.0.5
	 *
	 */
	function update($data, $user_id)
	{
		$this->db->wpdb->show_errors();
		$result['company_name'] 			= $data['company_name'];
		$result['salutation'] 			= $data['salutation'];
		$result['first_name'] 				= $data['first_name'];
		$result['last_name'] 				= $data['last_name'];
		$result['other_name'] 				= $data['other_name'];
		$result['name_changed'] 			= $data['name_changed'];
		$result['previous_name'] 			= $data['previous_name'];
		$result['postal_address_q'] 			= $data['postal_address_q'];
		$result['address1'] 						= $data['address1'];
		$result['address2'] 						= $data['address2'];
		$result['city'] 							= $data['city'];
		$result['state'] 						= $data['state'];
		$result['postal_address'] 					= $data['postal_address'];
		$result['post_code'] 					= $data['post_code'];
		$result['day_phone'] 					= $data['day_phone'];
		$result['mobile_phone'] 			= $data['mobile_phone'];
		$result['email_address'] 			= $data['email_address'];		
		$result['date_of_birth']			= $data['date_of_birth'];		
		$result['tax_file_no'] 				= $data['tax_file_no'];
		$result['whole_yr_tax_resident'] 				= $data['whole_yr_tax_resident'];
		//$result['tax_resident_year'] 				= $data['tax_resident_year'];
		$result['tax_resident_year_ces'] 				= $data['tax_resident_year_ces'];
		//$result['tax_resident_start'] 				= $data['tax_resident_start'];
		$result['tax_resident_stop'] 				= $data['tax_resident_stop'];		
		$result['have_abn_no'] 				= $data['have_abn_no'];
		$result['abn_no'] 						= $data['abn_no'];
		$result['main_occupation']		=	$data['main_occupation'];		
		$result['nature_of_business'] 		= $data['nature_of_business'];
		$result['spouse_last_name'] 		= $data['spouse_last_name'];
		$result['spouse_first_name'] 		= $data['spouse_first_name'];
		$result['spouse_other_name'] 	= $data['spouse_other_name'];		
		$result['spouse_date_birth']		=$data['spouse_date_birth'];		
		$result['spouse_tax_file_no'] 		= $data['spouse_tax_file_no'];
		$result['spouse_tax_income'] 		= $data['spouse_tax_income'];
		$result['spouse_whole_year'] 		= $data['spouse_whole_year'];
		$result['spouse_from_to'] 		= $data['spouse_from_to'];
		$result['married_defacto'] 		= $data['married_defacto'];		
		$result['have_children'] 		= $data['have_children'];
		$result['private_hlth_insurnce_q'] 		= $data['private_hlth_insurnce_q'];	
		//$result['private_hlth_insurnce_docs'] 		= $data['private_hlth_insurnce_docs'];	
		$result['updated_at']= date('Y-m-d H:i:s');
		
		//get multi child fields
		/*
		make array of name and dob
		
		name1, name2, name,3
		age1, age2, age3
		
		$c1name = $data['have_children1'];
		$c1dob = $data['have_children1'];
		$c2name = $data['have_children2'];
		$c2dob = $data['have_children2'];		
		
		$children = array();
		array_push($children,0);
		
		$result['child_name'] 		= $data['child_name_1'];
		$result['child_dob'] 		= $data['child_dob_1'];		
		*/
		
		//unset($result['Update']);
		$this->db->wpdb->update($this->db->tables['companies'], $result, array('user_id'=>$user_id));

	}
	
	function updateFile($files, $user_id, $plugin_dir, $username ) {
		
		$result = array();
			
		$client_docs_user_dir = $plugin_dir . 'client-docs/' . $username;
		
		//Create upload directory for user		
		if ( !file_exists($client_docs_user_dir ) ) {				
			mkdir($client_docs_user_dir, 0777, true);				
		}
		//Create deductions folder
		if ( !file_exists( $client_docs_user_dir . '/personal-profile' ) ) {				
			mkdir($client_docs_user_dir . '/personal-profile', 0777, true);						
		}
		
		$upload_dir = $plugin_dir . 'client-docs/'. $username .'/personal-profile/';
		
		$filenames = array(			
		'private_hlth_insurnce_docs'	
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
			$this->db->wpdb->update($this->db->tables['companies'], $result, array('user_id'=>$user_id));		
		}		
	}
	

}

$LcpUsers = new LcpUsers($LcpDb, $LcpCompanies, $LcpLeads);
