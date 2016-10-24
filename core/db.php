<?php

class LcpDb {

var $tables = array();
var $wpdb;


	public function __construct($settings)
	{
		$this->settings = $settings;
		$this->init();
	}

	private function init()
	{

		global $wpdb;
		$this->wpdb = $wpdb;

		// Set the names of the database tables
		$this->tables = array(		'options'			=> $this->wpdb->prefix . 'options',
									'users'				=> $this->wpdb->prefix . 'users',
									'companies'			=> $this->wpdb->prefix . 'lcp_companies',
									'leads'				=> $this->wpdb->prefix . 'lcp_leads',
									'orders'			=> $this->wpdb->prefix . 'lcp_orders',
									'companies_leads'	=> $this->wpdb->prefix . 'lcp_companies_leads',
									'forms'				=> $this->wpdb->prefix . 'lcp_forms',
									'form_fields'		=> $this->wpdb->prefix . 'lcp_form_fields',
									'form_field_properties'	=> $this->wpdb->prefix . 'lcp_form_field_properties',
									'form_field_options'	=> $this->wpdb->prefix . 'lcp_form_field_options',
									'income'	=> $this->wpdb->prefix . 'lcp_income',
									'deductions'	=> $this->wpdb->prefix . 'lcp_deductions',
									'otherinfo'	=> $this->wpdb->prefix . 'lcp_otherinfo'								
									);

	}

	/*
	 *
	 * 	Purpose: Install the plugin
	 * 	Added in Version 1.0.5
	 *
	 */
	public function install()
	{

		$options = get_option('lcp');
		$plugin_update_version = $options['update_version'];

		if ( $plugin_update_version < $this->settings['update_version'] ) {

			// Upgrade to current version
			$update_function = '_update_'.$this->settings['update_version'];
			$this->$update_function();

		}
	
	}

	/*
	 *
	 * 	Purpose: Update to 1.3.0
	 * 	Added in Version 1.3.0
	 *
	 */
	private function _update_130() {
	
		global $wpdb;	
	
		// Build the db structure
		$this->_update_120();

		$sql = "ALTER TABLE `".$this->tables['leads']."` ADD `data` TEXT NOT NULL AFTER `description`, ADD `form_id` INT(11) UNSIGNED NOT NULL AFTER `data`";
		
		$wpdb->query( $sql );		
		
		$sql = "CREATE TABLE ".$this->tables['forms']." (
				id int(11) NOT NULL AUTO_INCREMENT,
				name VARCHAR( 255 ) DEFAULT NULL,
				created_at DATETIME,
				updated_at DATETIME,
				UNIQUE KEY id (id)
			);";

		dbDelta( $sql );

		$sql = "CREATE TABLE ".$this->tables['form_fields']." (
				id int(11) NOT NULL AUTO_INCREMENT,
				form_id INT,
				field_label VARCHAR( 255 ) DEFAULT NULL,
				field_type VARCHAR( 255 ) DEFAULT NULL,
				field_name VARCHAR( 255 ) DEFAULT NULL,
				field_visible TINYINT( 1 ) NOT NULL,
				created_at DATETIME,
				updated_at DATETIME,
				UNIQUE KEY id (id)
			);";

		dbDelta( $sql );

		$sql = "CREATE TABLE ".$this->tables['form_field_properties']." (
				id int(11) NOT NULL AUTO_INCREMENT,
				form_field_id INT,
				property VARCHAR( 255 ) DEFAULT NULL,
				value VARCHAR( 255 ) DEFAULT NULL,
				created_at DATETIME,
				updated_at DATETIME,
				UNIQUE KEY id (id)
			);";

		dbDelta( $sql );

		$sql = "CREATE TABLE ".$this->tables['form_field_options']." (
				id int(11) NOT NULL AUTO_INCREMENT,
				form_field_id INT,
				option_value VARCHAR( 255 ) DEFAULT NULL,
				created_at DATETIME,
				updated_at DATETIME,
				UNIQUE KEY id (id)
			);";

		dbDelta( $sql );

		// create default tables
		$sql = "INSERT INTO ".$this->tables['forms']." (id, name, created_at, updated_at ) VALUES ( NULL, 'default', NOW(), NOW() );";

		$wpdb->query( $sql );

		$sql = "INSERT INTO ".$this->tables['form_fields']." ( id, form_id, field_label, field_type, field_name, field_visible, created_at, updated_at ) 
													VALUES   ( NULL, 1, 'Title', 'select', 'salutation_id', 0, NOW(), NOW() ),
															 ( NULL, 1, 'Firstname', 'text', 'first_name' , 0, NOW(), NOW() ),
															 ( NULL, 1, 'Surname', 'text', 'lastname' , 1, NOW(), NOW() ),
															 ( NULL, 1, 'Email', 'text', 'email' , 0, NOW(), NOW() ),
															 ( NULL, 1, 'Address', 'text', 'address' , 0, NOW(), NOW() ),
															 ( NULL, 1, 'Address2', 'text', 'address2' , 0, NOW(), NOW() ),
															 ( NULL, 1, 'Town', 'text', 'town' , 1, NOW(), NOW() ),
															 ( NULL, 1, 'County', 'text', 'county' , 1, NOW(), NOW() ),
															 ( NULL, 1, 'Postcode', 'text', 'postcode' , 0, NOW(), NOW() ),
															 ( NULL, 1, 'Phone', 'text', 'phone' , 0, NOW(), NOW() ),
															 ( NULL, 1, 'Alternative Phone', 'text', 'alt_phone' , 0, NOW(), NOW() ),
															 ( NULL, 1, 'Description', 'textarea', 'description' , 0, NOW(), NOW() )";

		$wpdb->query( $sql );

		$sql = "INSERT INTO ".$this->tables['form_field_properties']." ( id, form_field_id, property, value, created_at, updated_at )
															VALUES     ( NULL, 1, 'id', 'lcp_title', NOW(), NOW() ),
																	   ( NULL, 1, 'class', 'lcp_input', NOW(), NOW() ),
																	   ( NULL, 1, 'required', '1', NOW(), NOW() ),																	   
																	   ( NULL, 2, 'id', 'lcp_first_name', NOW(), NOW() ),
																	   ( NULL, 2, 'class', 'lcp_input', NOW(), NOW() ),
																	   ( NULL, 2, 'required', '1', NOW(), NOW() ),
																	   ( NULL, 2, 'placeholder', '', NOW(), NOW() ),
																	   ( NULL, 3, 'id', 'lcp_lastname', NOW(), NOW() ),
																	   ( NULL, 3, 'class', 'lcp_input', NOW(), NOW() ),
																	   ( NULL, 3, 'required', '1', NOW(), NOW() ),
																	   ( NULL, 3, 'placeholder', '', NOW(), NOW() ),
																	   ( NULL, 4, 'id', 'lcp_email', NOW(), NOW() ),
																	   ( NULL, 4, 'class', 'lcp_input', NOW(), NOW() ),
																	   ( NULL, 4, 'required', '1', NOW(), NOW() ),
																	   ( NULL, 4, 'placeholder', 'you@domain.co.uk', NOW(), NOW() ),
																	   ( NULL, 5, 'id', 'lcp_address', NOW(), NOW() ),
																	   ( NULL, 5, 'class', 'lcp_input', NOW(), NOW() ),
																	   ( NULL, 5, 'required', '1', NOW(), NOW() ),
																	   ( NULL, 5, 'placeholder', '', NOW(), NOW() ),
																	   ( NULL, 6, 'id', 'lcp_address2', NOW(), NOW() ),
																	   ( NULL, 6, 'class', 'lcp_input', NOW(), NOW() ),
																	   ( NULL, 6, 'required', '0', NOW(), NOW() ),
																	   ( NULL, 6, 'placeholder', '', NOW(), NOW() ),
																	   ( NULL, 7, 'id', 'lcp_town', NOW(), NOW() ),
																	   ( NULL, 7, 'class', 'lcp_input', NOW(), NOW() ),
																	   ( NULL, 7, 'required', '1', NOW(), NOW() ),
																	   ( NULL, 7, 'placeholder', '', NOW(), NOW() ),
																	   ( NULL, 8, 'id', 'lcp_county', NOW(), NOW() ),
																	   ( NULL, 8, 'class', 'lcp_input', NOW(), NOW() ),
																	   ( NULL, 8, 'required', '1', NOW(), NOW() ),
																	   ( NULL, 8, 'placeholder', '', NOW(), NOW() ),
																	   ( NULL, 9, 'id', 'lcp_postcode', NOW(), NOW() ),
																	   ( NULL, 9, 'class', 'lcp_input', NOW(), NOW() ),
																	   ( NULL, 9, 'required', '1', NOW(), NOW() ),
																	   ( NULL, 9, 'placeholder', '', NOW(), NOW() ),
																	   ( NULL, 10, 'id', 'lcp_phone', NOW(), NOW() ),
																	   ( NULL, 10, 'class', 'lcp_input', NOW(), NOW() ),
																	   ( NULL, 10, 'required', '1', NOW(), NOW() ),
																	   ( NULL, 10, 'placeholder', '', NOW(), NOW() ),
																	   ( NULL, 11, 'id', 'lcp_alt_phone', NOW(), NOW() ),
																	   ( NULL, 11, 'class', 'lcp_input', NOW(), NOW() ),
																	   ( NULL, 11, 'required', '0', NOW(), NOW() ),
																	   ( NULL, 11, 'placeholder', '', NOW(), NOW() ),
																	   ( NULL, 12, 'id', 'lcp_description', NOW(), NOW() ),
																	   ( NULL, 12, 'class', 'lcp_input', NOW(), NOW() ),
																	   ( NULL, 12, 'required', '1', NOW(), NOW() ),
																	   ( NULL, 12, 'placeholder', 'Please tell us about your specific requirements...', NOW(), NOW() )";

		$wpdb->query( $sql );

		$sql = "INSERT INTO ".$this->tables['form_field_options']." ( id, form_field_id, option_value, created_at, updated_at )
															VALUES  ( NULL, 1, 'Mr', NOW(), NOW() ),
																	( NULL, 1, 'Mrs', NOW(), NOW() ),
																	( NULL, 1, 'Miss', NOW(), NOW() )";
																	
		$wpdb->query( $sql );
		
		// migrate existing data to the new structure.
		$query=$wpdb->get_results( "SELECT * FROM ".$this->tables['leads'] );
		
		if ( sizeof( $query ) > 0 )
		{
			foreach( $query as $row )
			{
				$data=Array();
				
				$data['salutation_id']=$row->salutation_id;
				$data['first_name']=$row->first_name;
				$data['lastname']=$row->lastname;
				$data['email']=$row->email;
				$data['address']=$row->address;
				$data['address2']=$row->address2;
				$data['town']=$row->town;
				$data['county']=$row->county;
				$data['postcode']=$row->postcode;
				$data['phone']=$row->phone;
				$data['alt_phone']=$row->alt_phone;
				$data['description']=$row->description;

				$db_data['data']=serialize( $data );
				$db_data['form_id']=1;
				
				$wpdb->update( $this->tables['leads'], $db_data, Array( 'id'=>$row->id ) );
			}
		}
		
		
		// Update the update version in options
		$options = get_option('lcp');
		$options['update_version'] = '130';
		update_option('lcp', $options, "", "", "yes");

	}

	/*
	 *
	 * 	Purpose: Update to 1.2.0
	 * 	Added in Version 1.2.0
	 *
	 */
	private function _update_120() {

		// Build the db structure
		$this->_update_110();

		$sql = "ALTER TABLE `".$this->tables['companies']."` ADD credit_limit VARCHAR (100) AFTER `website`";
		$this->wpdb->query($sql);
		//this->wpdb->last_error;

		// Update the options
		$options = get_option('lcp');
		
		$options['on_account']['lcp_on_account_payment_mode'] = 'test';
		$options['on_account']['lcp_on_account_credit_limit'] = '0.00';
		update_option('lcp', $options, "", "", "yes");

		// Add the update version to options
		$options['update_version'] = '120';
		update_option('lcp', $options, "", "", "yes");

	}

	/*
	 *
	 * 	Purpose: Update to 1.1.0
	 * 	Added in Version 1.1.0
	 *
	 */
	private function _update_110() {

		// Build the db structure
		$this->_update_107();

		$sql = "CREATE TABLE ".$this->tables['orders']." (
				id int(11) NOT NULL AUTO_INCREMENT,
				lead_id INT,
				company_id INT,
				payment_provider VARCHAR (100) DEFAULT NULL,
				transaction_reference VARCHAR( 200 ) DEFAULT NULL,
				created_at DATETIME,
				updated_at DATETIME,
				UNIQUE KEY id (id)
			);";

		dbDelta( $sql );

	}

	/*
	 *
	 * 	Purpose: Update to 1.0.7
	 * 	Added in Version 1.0.7
	 *
	 */
	private function _update_107() {

		// Build the initial db structure
		$this->_update_100();

		// Replace all of the individual option rows and replace with one serialized version
		$options = array(	'global' => array(	'lcp_admin_email_address'=>'', 
												'lcp_lead_stock_level'=>'', 
												'lcp_lead_price'=>'', 
												'lcp_currency_accepted'=>'', 
												'lcp_payment_gateway'=>''), 
							'stripe'=> array(	'lcp_stripe_mode'=>'', 
												'lcp_stripe_api_test_secret_key'=>'', 
												'lcp_stripe_api_test_publishable_key'=>'', 
												'lcp_stripe_api_live_secret_key'=>'', 
												'lcp_stripe_api_live_publishable_key'=>''), 
							'paypal'=> array(	'lcp_paypal_btn_mode'=>'', 
												'lcp_paypal_email_address'=>''));

		$replacement_options = array();

		foreach ($options as $option_key => $option_value) {

			foreach ($option_value as $setting_key => $setting_value) {
				$replacement_options[$option_key][$setting_key] = get_option($setting_key);
				delete_option($setting_key);
			}

		}

		add_option('lcp', $replacement_options, "", "", "yes");

	}

	/*
	 *
	 * 	Purpose: Initial db structure
	 * 	Added in Version 1.0.7
	 *
	 */
	private function _update_100()
	{

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		$sql = "CREATE TABLE ".$this->tables['leads']." (
				id int(11) NOT NULL AUTO_INCREMENT,
				hash VARCHAR (100) DEFAULT NULL,
				salutation_id INT,
				first_name VARCHAR (100) DEFAULT NULL,
				lastname VARCHAR (100) DEFAULT NULL,
				email VARCHAR (100) DEFAULT NULL,
				address VARCHAR (100) DEFAULT NULL,
				address2 VARCHAR (100) DEFAULT NULL,
				town VARCHAR (100) DEFAULT NULL,
				county VARCHAR (100) DEFAULT NULL,
				postcode VARCHAR (20) DEFAULT NULL,
				phone VARCHAR (50) DEFAULT NULL,
				alt_phone VARCHAR (50) DEFAULT NULL,
				description TEXT DEFAULT NULL,
				status ENUM('pending','approved','rejected'),
				created_at DATETIME,
				updated_at DATETIME,
				UNIQUE KEY id (id)
			);";

		dbDelta( $sql );

		// Add the companies table

		$sql = "CREATE TABLE ".$this->tables['companies']." (
					id int(11) NOT NULL AUTO_INCREMENT,
					company_name VARCHAR (100) DEFAULT NULL,
					salutation_id INT(11),
					first_name VARCHAR (100),
					lastname VARCHAR (100),
					company_number VARCHAR (100),
					address VARCHAR (100),
					address2 VARCHAR (100),
					town VARCHAR (100),
					county VARCHAR (100),
					postcode VARCHAR (20),
					company_description TEXT,
					phone VARCHAR (50),
					alt_phone VARCHAR (50),
					website VARCHAR (100),
					service_range VARCHAR (3),
					receive_leads VARCHAR (3),
					status ENUM('pending','approved','rejected'),
					user_id int(11),
					created_at DATETIME,
			  		updated_at DATETIME,
					UNIQUE KEY id (id)
			);";

		dbDelta( $sql );

		// Add a pivot table between the companies and leads

		$sql = "CREATE TABLE ".$this->tables['companies_leads']." (
			  id int(11) NOT NULL AUTO_INCREMENT,
			  company_id int(11),
			  lead_id int(11),
			  UNIQUE KEY id (id)
			);";

		dbDelta( $sql );

	}

}

$LcpDb = new LcpDb($this->settings);

?>
