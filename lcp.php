<?php
/*
Plugin Name: Simple Solutions Accounting
Plugin URI: http://scruffydogstudio.com.au
Description: Accounting lodgement application
Author: Phil Noon
Version: 1.1
Author URI: http://scruffydogstudio.com.au
License: GPL
Copyright: Phil Noon
*/
if (!class_exists("lead_capture_pro")) {
	class lead_capture_pro
	{
		function __construct()
		{
			// Setup the plugins defaults when activated.
			$this->settings = array(
					'version'			=>	'1.1',
					'path'				=>	plugin_dir_path(__FILE__),
					'url'				=>	plugins_url() . '/lead-capture-pro',
					'plugin_name' 		=> 'lead-capture-pro',
					'update_version' 	=> 100
			);
				
				
			include_once plugin_dir_path( __DIR__ ) . $this->settings['plugin_name'] . '/core/db.php';
			$this->db = $LcpDb;
			
			include_once plugin_dir_path( __DIR__ ) . $this->settings['plugin_name'] . '/core/models/leads.php';
			$this->leads = $LcpLeads;
			
			include_once plugin_dir_path( __DIR__ ) . $this->settings['plugin_name'] . '/core/models/companies.php';
			$this->companies = $LcpCompanies;			
			
			include_once plugin_dir_path( __DIR__ ) . $this->settings['plugin_name'] . '/core/models/income.php';
			$this->income = $LcpIncome;			
			
			include_once plugin_dir_path( __DIR__ ) . $this->settings['plugin_name'] . '/core/models/deductions.php';
			$this->deductions = $LcpDeductions;
			
			include_once plugin_dir_path( __DIR__ ) . $this->settings['plugin_name'] . '/core/models/otherinfo.php';
			$this->otherinfo = $LcpOtherinfo;
			
			include_once plugin_dir_path( __DIR__ ) . $this->settings['plugin_name'] . '/core/models/users.php';
			$this->users = $LcpUsers;
			
			include_once plugin_dir_path( __DIR__ ) . $this->settings['plugin_name'] . '/core/models/options.php';
			$this->options = $LcpOptions;
			
			include_once plugin_dir_path( __DIR__ ) . $this->settings['plugin_name'] . '/core/models/forms.php';
			$this->forms = $LcpForms;
			
			include_once plugin_dir_path( __DIR__ ) . $this->settings['plugin_name'] . '/core/broadcast.php';
			include_once plugin_dir_path( __DIR__ ) . $this->settings['plugin_name'] . '/core/statistics.php';
			// Payment Gateways
			include_once plugin_dir_path( __DIR__ ) . $this->settings['plugin_name'] . '/core/payment_gateways/stripe/stripe.php';
			include_once plugin_dir_path( __DIR__ ) . $this->settings['plugin_name'] . '/core/payment_gateways/paypal/paypal.php';
			include_once plugin_dir_path( __DIR__ ) . $this->settings['plugin_name'] . '/core/payment_gateways/on_account/on_account.php';
			// Form Builder
			include_once plugin_dir_path( __DIR__ ) . $this->settings['plugin_name'] . '/core/form_builder/form_builder.php';
			$this->form_builder = $LcpFormBuilder;
			// Register the install and uninstall hooks
			register_activation_hook(__FILE__, array($this->db,'install') );
			register_activation_hook(__FILE__, array($this,'add_roles_on_plugin_activation') );
			// Actions
			add_action('init', array($this,'init'), 1);
			add_action('init', array($this,'register_shortcodes'));
			add_action('admin_init', array($this,'lcp_option_tabs'));
			add_action('admin_notices', array($this,'show_options_notifications'));
			// Get the language file
			load_plugin_textdomain( 'lead-capture-pro', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}
		function check_valid_user() {
			if ( is_admin() && current_user_can('lcp_member') && isset($_GET['page'])) {
				$company = $this->companies->byUserID( get_current_user_id(), 'approved' );
				if ( sizeof($company) == 0) { 
					echo "Your company has not yet been approved, please try again later.<br>Return home <a href='/'>here</a>.";
					wp_set_current_user(0);
				}
			}
			
		}
		/*
 		 *
		 *	Registers the plugins settings tabs
		 *	Added in version 1.0.5
		 *
		*/
		function lcp_option_tabs()
		{
			$this->register_plugin_settings();
			$this->register_stripe_payments_settings();
			$this->register_paypal_payments_settings();
			$this->register_on_account_payments_settings();
		}
		/*
		 *
		 * 	Purpose: Registers the CSS for the Admin or Public pages
		 * 	Added in version 1.0.5
		 *
		 */
		function register_css($type='admin')
		{
			if($type=='admin')
			{
				wp_register_style( 'lcp-admin-styles', $this->settings['url'] .'/css/lead-capture-pro-admin.css' );
				
				wp_register_style( 'lcp-admin-fontawesome', $this->settings['url'] .'/css/font-awesome.min.css' );
				
                wp_register_style( 'lcp-admin-bootstrapmin', $this->settings['url'] .'/css/bootstrap.min.css' );
                //wp_register_style( 'lcp-admin-bootstrap', $this->settings['url'] .'/css/bootstrap.css' ); 
                wp_register_style( 'bootstrap-datetimepicker-styles', $this->settings['url'] .'/css/datepicker.css' ); 
                wp_register_style( 'file-input-styles', $this->settings['url'] .'/css/fileinput.min.css' ); 
                wp_enqueue_style('file-input-styles'); 	                             
                
                //wp_enqueue_style('lcp-admin-styles'); 
                wp_enqueue_style('lcp-admin-fontawesome'); 
                wp_enqueue_style('lcp-admin-bootstrapmin'); 
                wp_enqueue_style('bootstrap-datetimepicker-styles');
                //wp_enqueue_style('lcp-admin-bootstrap');                               
                                
			}
			else if($type=='public'){
				wp_register_style( 'lcp-public-styles', $this->settings['url'] .'/css/lead-capture-pro.css' );
                //wp_register_style( 'lcp-public-styles', $this->settings['url'] .'/css/bootstrap-responsive.css' );
               // wp_register_style( 'bootstrap', $this->settings['url'] .'/css/bootstrap.css' );                                
                wp_enqueue_style( 'bootstrap', site_url() . '/wp-content/bootstrap-2.3.2/assets/css/bootstrap.css',false,'2.3.2','all');
                //wp_enqueue_style( 'bootstrap1', site_url() . '/wp-content/bootstrap-2.3.2/assets/css/bootstrap-responsive.css',false,'2.3.2','all');
				wp_enqueue_style('bootstrap'); 
				wp_enqueue_style('lcp-public-styles');    
		
			} else if($type=='lcp_member'){
				//{
				wp_register_style( 'lcp-public-styles', $this->settings['url'] .'/css/lead-capture-pro.css' );
				//wp_register_style( 'lcp-public-styles', $this->settings['url'] .'/css/lead-capture-pro.css' );
				wp_register_style( 'file-input-styles', $this->settings['url'] .'/css/fileinput.min.css' );						
				
				wp_register_style( 'bootstrap-datetimepicker-styles', $this->settings['url'] .'/css/datepicker.css' );
				//wp_register_style( 'bootstrap-datetimepicker-styles', $this->settings['url'] .'/css/bootstrap-datetimepicker.min.css' );
				
				//wp_enqueue_style( 'bootstrap', site_url() . '/wp-content/bootstrap-2.3.2/assets/css/bootstrap.css',false,'2.3.2','all');
                //wp_register_style( 'lcp-public-styles', $this->settings['url'] .'/css/bootstrap-responsive.css' );
                //wp_register_style( 'lcp-public-styles', $this->settings['url'] .'/css/bootstrap-responsive.css' );
                //wp_register_style( 'lcp-public-styles', $this->settings['url'] .'/css/bootstrap.css' );
                //wp_register_style( 'bootstrap', $this->settings['url'] .'/css/bootstrap.css' ); 
                             		                             
				wp_enqueue_style('lcp-public-styles');
				//wp_enqueue_style('lcp-public-styles');                                
				wp_enqueue_style('file-input-styles'); 		                                
				wp_enqueue_style('bootstrap-datetimepicker-styles');
                //wp_enqueue_style( 'bootstrap', site_url() . '/wp-content/bootstrap-2.3.2/assets/css/bootstrap.css',false,'2.3.2','all');		
                //wp_enqueue_style( 'bootstrap1', site_url() . '/wp-content/bootstrap-2.3.2/assets/css/bootstrap-responsive.css',false,'2.3.2','all');
                //wp_enqueue_style( 'bootstrap1', site_url() . '/wp-content/bootstrap-2.3.2/assets/css/bootstrap-responsive.css',false,'2.3.2','all');
				}
		}
		/*
		 *
		 * 	Purpose: Registers the JavaScript for the Admin or Public pages
		 * 	Added in version 1.1
		 *
		 */
		function register_js($type='admin')
		{
			if($type=='admin'){				
				//wp_enqueue_script( 'lcp-admin', $this->settings['url'] .'/js/lcp-admin.js' );
				//wp_enqueue_script( 'lcp-member', $this->settings['url'] . '/js/lcp-admin.js', array(), '1.0.0', true );				
				wp_register_script( 'bootstrap-script', $this->settings['url'] . '/js/bootstrap.min.js' , '', '', true );	
				wp_register_script( 'lcp-admin', $this->settings['url'] . '/js/lcp-admin.js' , '', '', true );
				wp_enqueue_script( 'lcp-admin' );
				wp_enqueue_script( 'bootstrap-script' );
			}
			
			else if($type=='lcp_member') {
	            //wp_enqueue_script( 'lcp-member', $this->settings['url'] .'/js/lcp-member.js' );                
	            //wp_enqueue_script( 'lcp-member', $this->settings['url'] . '/js/lcp-member.js', array(), '1.0.0', true );
	            
	            wp_register_script( 'lcp-member', $this->settings['url'] . '/js/lcp-member.js' , '', '', true );
	            wp_register_script( 'canvas-to-blob-script', $this->settings['url'] . '/js/plugins/canvas-to-blob.min.js' , '', '', true );
				wp_register_script( 'purify-script', $this->settings['url'] . '/js/plugins/purify.min.js' , '', '', true );
				wp_register_script( 'sortable-script', $this->settings['url'] . '/js/plugins/sortable.min.js' , '', '', true );
				wp_register_script( 'file-input-script', $this->settings['url'] . '/js/fileinput.min.js' , '', '', true );				
				wp_register_script( 'moment-script', 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js');
				wp_register_script( 'bootstrap-datetimepicker-script', $this->settings['url'] . '/js/bootstrap/bootstrap-datepicker.js' , '', '', true );				
				wp_register_script( 'bootstrap-script', $this->settings['url'] . '/js/bootstrap.min.js' , '', '', true );			
				   			
				wp_enqueue_script( 'lcp-member' );	
				wp_enqueue_script( 'canvas-to-blob-script' );
				wp_enqueue_script( 'purify-script' );
				wp_enqueue_script( 'sortable-script' );
				wp_enqueue_script( 'file-input-script' );
				wp_enqueue_script( 'moment-script' );
				wp_enqueue_script( 'bootstrap-datetimepicker-script' );	
				wp_enqueue_script( 'bootstrap-script' );	
					
						}
				}
		function form_updated_notice()
		{
			echo	'<div class="updated">
						<p>The form has been updated.</p>
					</div>';
		}
		
		/*
		 *
		 * 	Purpose: Displays the success / failure messages on the options page
		 * 	Added in version 1.0
		 *
		 */
		function show_options_notifications()
		{
			$errors = FALSE;
			$options = $this->options->get();
			$payment_gateway = '';
			if(is_array($options)){
				foreach ($options as $options_key => $options_value) {
					if(is_array($options_value)){
						foreach ($options_value as $sections_key => $sections_value) {
							
							if ($sections_key == 'lcp_payment_gateway') {
								$payment_gateway = $sections_value;
							}
							if ( $payment_gateway == '' && strlen($sections_value) == 0  ) {
								$errors = TRUE;
							}
							if ( $options_key == $payment_gateway && strlen($sections_value) == 0 ) {
								$errors = TRUE;
							}
						}
					}
				}
			}
			if ($errors == TRUE) {
				$nag_type = 'error';
				$nag_message = 'There are configuration options in the <strong>Simple Solutions Accounting</strong> plugin that need setting. Please update them now by <a href="'.admin_url().'options-general.php?page=lcp.php">clicking here</a>.';
				include_once $this->settings['path'].'/views/partials/nag.php';
			}
		}
		/*
		 *
		 *	Registers the plugins setting in the options table
		 *	Added in version 1.0
		 *
		*/
		function register_plugin_settings()
		{
			$setting_option_group 	= 'lcp_options_group';
			$all_settings 			= get_option('lcp');
			$settings 				= $all_settings['global'];
			add_settings_section ('stock_level_section', '', array($this, 'stock_level_section_callback'), 'lcp_general_settings');
			// Register the settings
			foreach ($settings as $setting_key => $setting_value) {
				register_setting($setting_option_group, $setting_key);
				$setting = str_replace('lcp_', '', $setting_key);
				add_settings_field($setting, ucwords(str_replace('_', ' ', $setting)), array($this, $setting.'_field_callback'), 'lcp_general_settings', 'stock_level_section');
			}
		}
		/*
		 *
		 *	Registers the plugins stripe payments settings in the options table
		 *	Added in version 1.0.5
		 *
		*/
		function register_stripe_payments_settings()
		{
			$setting_option_group 	= 'lcp_stripe_payments_group';
			$setting_option_section	= 'lcp_stripe_payments_section';
			$all_settings 			= get_option('lcp');
			$settings 				= $all_settings['stripe'];
			add_settings_section($setting_option_section, '', array($this, 'stripe_payments_section_callback'), 'lcp_stripe_settings');
			// Register the settings
			foreach ($settings as $setting_key => $setting_value) {
				register_setting($setting_option_group, $setting_key);
				$setting = str_replace('lcp_', '', $setting_key);
				add_settings_field($setting, ucwords(str_replace('_', ' ', $setting)), array($this, $setting.'_field_callback'), 'lcp_stripe_settings', $setting_option_section);
			}
		}
		/*
		 *
		 *	Registers the plugins paypal settings in the options table
		 *	Added in version 1.0.5
		 *
		*/
		function register_paypal_payments_settings()
		{
			$setting_suffix 		= 'lcp_';
			$setting_option_group 	= 'lcp_paypal_payments_group';
			$setting_option_section	= 'lcp_paypal_payments_section';
			$all_settings 			= get_option('lcp');
			$settings 				= $all_settings['paypal'];
			add_settings_section($setting_option_section, '', array($this, 'paypal_payments_section_callback'), 'lcp_paypal_settings');
			// Register the settings
			foreach ($settings as $setting_key => $setting_value) {
				register_setting($setting_option_group, $setting_key);
				$setting = str_replace('lcp_', '', $setting_key);
				add_settings_field($setting, ucwords(str_replace('_', ' ', $setting)), array($this, $setting.'_field_callback'), 'lcp_paypal_settings', $setting_option_section);
			}
		}
		/*
		 *
		 *	Registers the plugins on-account settings in the options table
		 *	Added in version 1.2
		 *
		*/
		function register_on_account_payments_settings()
		{
			$setting_suffix 		= 'lcp_';
			$setting_option_group 	= 'lcp_on_account_payments_group';
			$setting_option_section	= 'lcp_on_account_payments_section';
			$all_settings 			= get_option('lcp');
			$settings 				= $all_settings['on_account'];
			add_settings_section($setting_option_section, '', array($this, 'on_account_section_callback'), 'lcp_on_account_settings');
			// Register the settings
			foreach ($settings as $setting_key => $setting_value) {
				register_setting($setting_option_group, $setting_key);
				$setting = str_replace('lcp_', '', $setting_key);
				add_settings_field($setting, ucwords(str_replace('_', ' ', $setting)), array($this, $setting.'_field_callback'), 'lcp_on_account_settings', $setting_option_section);
			}
		}
		/*
		 *
		 * 	Purpose: Processes the on-account callback for the options form
		 * 	Added in Version 1.2
		 *
		 */
		function on_account_section_callback()
		{
			// Ssshh
		}
		/*
		 *
		 * 	Purpose: Processes the paypal callback for the options form
		 * 	Added in Version 1.0
		 *
		 */
		function paypal_payments_section_callback()
		{
			// Ssshh
		}
		/*
		 *
		 * 	Purpose: Processes the section callback for the options form
		 * 	Added in Version 1.0
		 *
		 */
		function stripe_payments_section_callback()
		{
			// Ssshh
			echo "<p>Your Stripe key setting can be found in your Stripe admin dashboard.</p>";
		}
		/*
		 *
		 * 	Purpose: Processes the section callback for the options form
		 * 	Added in Version 1.0
		 *
		 */
		function stock_level_section_callback()
		{
			// Ssshh
		}
		/*
		 *
		 * 	Purpose: Callback to add the credit limit field to the options form
		 * 	Added in Version 1.2
		 *
		 */
		function on_account_credit_limit_field_callback() {
			$options = get_option('lcp');
			$setting = esc_attr( $options['on_account']['lcp_on_account_credit_limit'] );
			echo "	<input type='text' name='lcp_on_account_credit_limit' value='$setting' placeholder='100.00' />";
		}
		/*
		 *
		 * 	Purpose: Callback to add the on-account mode dropdown to the options form
		 * 	Added in Version 1.2
		 *
		 */
		function on_account_payment_mode_field_callback() {
			$options = get_option('lcp');
			$setting = esc_attr( $options['on_account']['lcp_on_account_payment_mode'] );
			$selection_options = array('test','live');
			$select = "	<select name='lcp_on_account_payment_mode' id='lcp_on_account_payment_mode'>";
			foreach($selection_options as $option){
				$selected = ($option == $setting)? "selected" : false;
				$select .= "<option value='$option' $selected>".$option."</option>";
			}
			$select .= "</select>";
			echo $select;
		}
		/*
		 *
		 * 	Purpose: Callback to add the currency field to the options form
		 * 	Added in Version 1.0
		 *
		 */
		function currency_accepted_field_callback() {
			$options = get_option('lcp');
			$setting = esc_attr( $options['global']['lcp_currency_accepted'] );
			$currencies = array('AUD'=>'Australian Dollar');
			$currencies_select = "<select name='lcp_currency_accepted' id='lcp_currency_accepted'>";
			
			foreach ($currencies as $code => $currency) {
				
				$selected = ($code == $setting) ? ' selected': false;
				$currencies_select .= '<option value="'.$code.'" '.$selected.'>'.$currency.'</option>';
			}
			$currencies_select .= '</select>';
			echo $currencies_select;
		}
		/*
		 *
		 * 	Purpose: Callback to add the payment gateway dropdown to the options form
		 * 	Added in Version 1.0.5
		 *
		 */
		function payment_gateway_field_callback() {
			$options = get_option('lcp');
			$setting = esc_attr( $options['global']['lcp_payment_gateway'] );
			$selection_options = array('stripe' => 'Stripe', 'paypal_html' => 'PayPal HTML Buttons', 'on_account'=>'On Account');
			$select = "	<select name='lcp_payment_gateway' id='lcp_payment_gateway'>";
			foreach($selection_options as $option =>$option_value){
				$selected = ($option == $setting)? "selected" : false;
				$select .= "<option value='$option' $selected>".$option_value."</option>";
			}
			$select .= "</select>";
			echo $select;
		}
		/*
		 *
		 * 	Purpose: Callback to add the stripe mode dropdown to the options form
		 * 	Added in Version 1.0.5
		 *
		 */
		function stripe_mode_field_callback() {
			$options = get_option('lcp');
			$setting = esc_attr( $options['stripe']['lcp_stripe_mode'] );
			$selection_options = array('test','live');
			$select = "	<select name='lcp_stripe_mode' id='lcp_stripe_mode'>";
			foreach($selection_options as $option){
				$selected = ($option == $setting)? "selected" : false;
				$select .= "<option value='$option' $selected>".$option."</option>";
			}
			$select .= "</select>";
			echo $select;
		}
		/*
		 *
		 * 	Purpose: Callback to add the stripe test publishable key field to the options form
		 * 	Added in Version 1.0.5
		 *
		 */
		function stripe_api_test_publishable_key_field_callback() {
			$options = get_option('lcp');
			$setting = esc_attr( $options['stripe']['lcp_stripe_api_test_publishable_key'] );
			echo "	<input type='text' name='lcp_stripe_api_test_publishable_key' value='$setting' placeholder='' />";
		}
		/*
		 *
		 * 	Purpose: Callback to add the stripe test secret key field to the options form
		 * 	Added in Version 1.0.5
		 *
		 */
		function stripe_api_test_secret_key_field_callback() {
			$options = get_option('lcp');
			$setting = esc_attr( $options['stripe']['lcp_stripe_api_test_secret_key'] );
			echo "	<input type='text' name='lcp_stripe_api_test_secret_key' value='$setting' placeholder='' />";
		}
		/*
		 *
		 * 	Purpose: Callback to add the stripe live publishable key field to the options form
		 * 	Added in Version 1.0.5
		 *
		 */
		function stripe_api_live_publishable_key_field_callback() {
			$options = get_option('lcp');
			$setting = esc_attr( $options['stripe']['lcp_stripe_api_live_publishable_key'] );
			echo "	<input type='text' name='lcp_stripe_api_live_publishable_key' value='$setting' placeholder='' />";
		}
		/*
		 *
		 * 	Purpose: Callback to add the stripe live secret key field to the options form
		 * 	Added in Version 1.0.5
		 *
		 */
		function stripe_api_live_secret_key_field_callback() {
			$options = get_option('lcp');
			$setting = esc_attr( $options['stripe']['lcp_stripe_api_live_secret_key'] );
			echo "	<input type='text' name='lcp_stripe_api_live_secret_key' value='$setting' placeholder='' />";
		}
		/*
		 *
		 * 	Purpose: Callback to add the lead price field to the options form
		 * 	Added in Version 1.0
		 *
		 */
		function lead_price_field_callback() {
			$options = get_option('lcp');
			$setting = esc_attr( $options['global']['lcp_lead_price'] );
			echo "	<input type='text' name='lcp_lead_price' value='$setting' placeholder='9.99' />
					<p>How much you would like people to pay for the lead.</p>
					<div class=\"alert alert-danger stripe-warning\" style=\"display:none;\"><strong>Heads Up!</strong> Stripe does NOT require the decimal place, so 9.99 would be 999.</div>";
		}
		/*
		 *
		 * 	Purpose: Callback to add the lead stock level field to the options form
		 * 	Added in Version 1.0
		 *
		 */
		function lead_stock_level_field_callback() {
			$options = get_option('lcp');
			$setting = esc_attr( $options['global']['lcp_lead_stock_level'] );
			echo "	<input type='text' name='lcp_lead_stock_level' value='$setting' placeholder='3' />
					<p>Number of times a lead can be sold.</p>";
		}
		/*
		 *
		 * 	Purpose: Callback to add the admin email address field to the options form
		 * 	Added in Version 1.0
		 *
		 */
		function admin_email_address_field_callback() {
			$options = get_option('lcp');
			$setting = esc_attr( $options['global']['lcp_admin_email_address'] );
			echo "	<input type='text' name='lcp_admin_email_address' value='$setting' />
					<p>Email Address to receive notifications from plugin.</p>";
		}
		/*
		 *
		 * 	Purpose: Callback to add the paypal button mode field to the options form
		 * 	Added in Version 1.0
		 *
		 */
		function paypal_btn_mode_field_callback() {
			$options = get_option('lcp');
			$setting = esc_attr( $options['paypal']['lcp_paypal_btn_mode'] );
			$selection_modes = array('sandbox','live');
			$selection =  "	<select name='lcp_paypal_btn_mode' id='lcp_paypal_btn_mode'>";
			foreach($selection_modes as $mode){
				$selected = ($mode == $setting)? "selected" : false;
				$selection .= "<option value='$mode' $selected>".ucfirst($mode)."</option>";
			}
			$selection .= "</select>";
			echo $selection;
		}
		/*
 		 *
		 * 	Purpose: Callback to add the paypal email address to the options form
		 * 	Added in Version 1.0
		 *
		 */
		function paypal_email_address_field_callback() {
			$options = get_option('lcp');
			$setting = esc_attr( $options['paypal']['lcp_paypal_email_address'] );
			echo "	<input type='text' name='lcp_paypal_email_address' value='$setting' />
					<p>Email address for your PayPal account.</p>";
		}
		/*
		 *
		 * 	Purpose: Display and process the options form
		 * 	Added in Version 1.0
		 *
		 */
		function load_settings_page ()
		{
						
			$this->register_css();
			$this->register_js();
			$update = false;
			if ( isset($_POST['option_page']) && $_POST['option_page']=='lcp_options_group') {
				$update = true;
				if (isset($_POST['lcp_admin_email_address'])) {
					$options['global']['lcp_admin_email_address'] = $_POST['lcp_admin_email_address'];
				}
				if (isset($_POST['lcp_lead_stock_level'])) {
					$options['global']['lcp_lead_stock_level'] = $_POST['lcp_lead_stock_level'];
				}
				if (isset($_POST['lcp_lead_price'])) {
					$options['global']['lcp_lead_price'] = $_POST['lcp_lead_price'];
				}
				if (isset($_POST['lcp_currency_accepted'])) {
					$options['global']['lcp_currency_accepted'] = $_POST['lcp_currency_accepted'];
				}
				if (isset($_POST['lcp_payment_gateway'])) {
					$options['global']['lcp_payment_gateway'] = $_POST['lcp_payment_gateway'];
				}
			}
			if ( isset($_POST['option_page']) && $_POST['option_page']=='lcp_stripe_payments_group') {
				$update = true;
				if (isset($_POST['lcp_stripe_mode'])) {
					$options['stripe']['lcp_stripe_mode'] = $_POST['lcp_stripe_mode'];
				}
				if (isset($_POST['lcp_stripe_api_test_secret_key'])) {
					$options['stripe']['lcp_stripe_api_test_secret_key'] = $_POST['lcp_stripe_api_test_secret_key'];
				}
				if (isset($_POST['lcp_stripe_api_test_publishable_key'])) {
					$options['stripe']['lcp_stripe_api_test_publishable_key'] = $_POST['lcp_stripe_api_test_publishable_key'];
				}
				if (isset($_POST['lcp_stripe_api_live_secret_key'])) {
					$options['stripe']['lcp_stripe_api_live_secret_key'] = $_POST['lcp_stripe_api_live_secret_key'];
				}
				if (isset($_POST['lcp_stripe_api_live_publishable_key'])) {
					$options['stripe']['lcp_stripe_api_live_publishable_key'] = $_POST['lcp_stripe_api_live_publishable_key'];
				}
			}
			if ( isset($_POST['option_page']) && $_POST['option_page']=='lcp_paypal_payments_group') {
				$update = true;
				if (isset($_POST['lcp_paypal_btn_mode'])) {
					$options['paypal']['lcp_paypal_btn_mode'] = $_POST['lcp_paypal_btn_mode'];
				}
				if (isset($_POST['lcp_paypal_email_address'])) {
					$options['paypal']['lcp_paypal_email_address'] = $_POST['lcp_paypal_email_address'];
				}
			}
			if ( isset($_POST['option_page']) && $_POST['option_page']=='lcp_on_account_group') {
				$update = true;
				if (isset($_POST['lcp_on_account_payment_mode'])) {
					$options['on_account']['lcp_on_account_payment_mode'] = $_POST['lcp_on_account_payment_mode'];
				}
				if (isset($_POST['lcp_on_account_credit_limit'])) {
					$options['on_account']['lcp_on_account_credit_limit'] = $_POST['lcp_on_account_credit_limit'];
				}
			}
			if($update == true) {
				foreach($options as $option_key => $option_value) {
					foreach ($option_value as $setting_key => $setting_value) {
						$key[$option_key][$setting_key] = $setting_value;
					}
				}
				$current_options = get_option('lcp');
				$modified_options = array_merge($current_options, $key);			
				update_option('lcp', $modified_options);
			}
			// Include the admin page view
			include_once $this->settings['path'].'/views/settings-page.php';
		}
		/*
		 *
		 * 	Purpose: to edit a companies details
		 * 	Added in Version 1.1
		 *
		 */
		function lcp_admin_edit_company()
		{
			$validated = null;
			if ( count($_POST)>0) {
				$p = $_POST;
				array_pop($p);
				unset($p['company_number']);
				unset($p['address2']);
				$validated = true;
				foreach ($p as $key => $value) {
					if( strlen($value) == 0 || $value == 'null' ){
						$validated = false;
						break;
					}
				}
				if (true == $validated) {
					$data = array();
					$data['company_name'] 			= $_POST['company_name'];
					$data['salutation_id'] 			= $_POST['salutation_id'];
					$data['first_name'] 			= $_POST['first_name'];
					$data['lastname'] 				= $_POST['lastname'];
					$data['company_number'] 		= $_POST['company_number'];
					$data['address'] 				= $_POST['address'];
					$data['address2'] 				= $_POST['address2'];
					$data['town'] 					= $_POST['town'];
					$data['county'] 				= $_POST['county'];
					$data['postcode'] 				= $_POST['postcode'];
					$data['company_description'] 	= $_POST['company_description'];
					$data['phone'] 					= $_POST['phone'];
					$data['alt_phone'] 				= $_POST['alt_phone'];
					$data['website'] 				= $_POST['website'];
					$data['credit_limit'] 			= $_POST['credit_limit'];
					$data['service_range'] 			= $_POST['service_range'];
					$data['receive_leads'] 			= $_POST['receive_leads'];
					$data['status']					= $_POST['status'];
					if ( $this->companies->update($data, array('id'=>$_GET['id'])) !== FALSE ) {
						$updated = TRUE;
					}
				}
			}
			$company = $this->companies->byCompanyID($_GET['id']);
			// Are companies paying on account
			$is_on_account = ($this->options->get('global','lcp_payment_gateway') == 'on_account') ? true : false;
			// Include the edit lead page view
			$this->register_js();
			$this->register_css();
			include_once $this->settings['path'].'/views/admin/company-edit.php';
		}
		/*
		 *
		 * 	Purpose: to edit a leads details
		 * 	Added in Version 1.1
		 *
		 */
		function lcp_admin_edit_lead()
		{
			$validated = null;
			$updated = FALSE;
			if (count($_POST)>0) {
				if ( !isset( $_POST['__lcp_form_id'] ) || preg_replace( "/(\D)/", "", $_POST['__lcp_form_id'] )=='' ) return false;
				$form_id=preg_replace( "/(\D)/", "", $_POST['__lcp_form_id'] );
				
				$required_fields = $this->forms->getRequiredFields( $form_id );
				
				$required=Array();
				
				if ( $required_fields )
				{
					foreach( $required_fields as $key=>$value )
					{
						$required[]=$value->field_name;
					}
				}
				
				$visible_fields =  $this->forms->getVisibleFields( $form_id );
				
				$visible=Array();
				
				if ( $visible_fields )
				{
					foreach( $visible_fields as $key=>$value )
					{
						$visible[]=$value->field_name;
					}
				}				
				// remove both submit and the form id
				array_pop($_POST);
				$old_form=array_shift($_POST);		
				
				$validated = true;
				if ( sizeof( $required ) > 0 )
				{
					// Check to make sure all required fields have some data in them
					foreach ($required as $key) {
						if(!in_array($key, array_keys($_POST))){
							$validated = false;
							break;
						}
					}
				}
				if (true == $validated) {
					foreach ($_POST as $key => $value) {
						if( in_array($key, $required) && (strlen($value) == 0 || $value == 'null') ){
							$validated = false;
							break;
						}
					}
				}
				if (true == $validated) {
					// Send a broadcast
					$data = array();
					
					$status=array_slice($_POST, 0, -1);
					
					$data['hash']			= $_GET['ref'];					
					$data['status']			= array_pop($_POST);
					$data['data']			= serialize( $_POST );
					$data['submitter']		= $data[$visible[0]];
					// Prep data for insertion into db
					$db_data = array_slice($data, 0, -1);
					if ( $this->leads->update($db_data) !== FALSE ) {
						$updated = TRUE;
					}
				}
			}
			// Get the lead from the reference
			$lead = $this->leads->getByHash($_GET['ref']);
			if ( isset( $_POST['__lcp_form_id'] ) )
			{
				$data=$_POST;
			}
			elseif( isset( $lead ) )
			{
				$data=unserialize( $lead->data );
			}			
			
			// Include the edit lead page view
			$this->register_js();
			$this->register_css();
			
			$builder = $this->form_builder;			
			$builder->mode='table';
			$form_elements = $builder->render( $lead->form_id, $data, false, false );
			
			include_once $this->settings['path'].'/views/admin/lead-edit.php';
		}
		/*
		 *
		 * 	Purpose: to return the stock level of a lead
		 * 	Added in Version 1.0
		 *
		 */
		function availability($lead_id)
		{
			$leads = $this->leads->stockLevel($lead_id);
			$options = get_option('lcp');
			$max_stock_level = $options['global']['lcp_lead_stock_level'];
			return $max_stock_level - count($leads);
		}
		/*
		 *
		 * 	Purpose: Display and process the My Account page
		 * 	Added in Version 1.0
		 *
		 */
		function my_account()
		{
			$user_ID = get_current_user_id();
			
			//get user's username
			$user_data =  get_userdata( $user_ID );	
			$plugin_dir = plugin_dir_path( __FILE__ );
			
			//print_r($user_data);				
			$username = $user_data->user_login;
			
			// We are deleting the account
			if(@$_GET['delete']==1) {
				// Remove from the database
				$this->users->destroy($user_ID);
				// Get companies details
				$company = $this->companies->byUserID($user_ID, 'approved');
				// Send a broadcast
				$email_data = array( 'site_name' =>	get_bloginfo('name') );
				$broadcast = new LcpBroadcast($this->options);
				$broadcast->send('company-deleted', $email_data, $company->user_email, 'Your company has been deleted');
				// Log them out
				wp_logout();
				wp_redirect( home_url() );
				exit();
			}
			if(count($_POST)>0){
				$this->users->update($_POST, $user_ID);	
				$this->users->updateFile($_FILES, $user_ID, $plugin_dir, $username);
				
				
				/*echo "<pre>";
				print_r($_FILES);
				echo "</pre>";*/					
						
				$message = "You have successfully updated your profile!";				
				//var_dump($_POST);				
				
				//var_dump($_POST[have_children]);
				//var_dump($_POST[child_name]);
				//var_dump($_POST[child_dob]);
				//$result['have_children'] 		= $data['have_children'];
			}
			$company = $this->companies->byUserID($user_ID, 'approved');
			$this->register_css();
			$this->register_js('lcp_member');
			include_once dirname ( __FILE__ ).'/views/user/my-account-page.php';
		}
		/*
		 *
		 * 	Purpose: Removes the admin bar for lcp users
		 * 	Added in Version 1.0
		 *
		 */
		function remove_admin_bar_links()
		{
			global $user_ID;
			
			if(current_user_can('lcp_member'))
			{
				global $wp_admin_bar;
				$wp_admin_bar->remove_menu('my-account');
				$wp_admin_bar->remove_menu('updates');
				$wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
				$wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
				$wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
				$wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
				$wp_admin_bar->remove_menu('support-forums');
			}
                }
                
		/*
		 *
		 * 	Purpose: Removes core update notifications form lcp users
		 * 	Added in Version 1.0
		 *
		 */
		function remove_core_updates(){
			if(current_user_can('lcp_member'))
			{
				add_filter('pre_option_update_core','__return_null');
				add_filter('pre_site_transient_update_core','__return_null');
				
			}
		}
		/*
		 *
		 * 	Purpose: Displays and processes the lcp admin dashboard
		 * 	Added in Version 1.0
		 *
		 */
		function admin_dashboard()
		{
			// Leads
			if ( $_GET['type'] == 'lead' && $_GET['approve'] == 1) {
				$this->leads->approve($_GET['ref']);
				$results = $this->leads->getByHash($_GET['ref']);
				$email_data = array(	'site_name'	=>	get_bloginfo('name'),
										'submitter'	=> 	$results->first_name);
				// Send a broadcast
				$broadcast = new LcpBroadcast($this->options);
				$broadcast->send('lead-approved', $email_data, $results->email, 'Your lead has been approved');
				// Send out emails to all companies
				$this->broadcast_new_lead($results);
			}
			if ( $_GET['type'] == 'lead' && $_GET['reject'] == 1) {
				$this->leads->reject($_GET['ref']);
				$results = $this->leads->getByHash($_GET['ref']);
				// Send a broadcast
				$email_data = array('site_name'	=>get_bloginfo('name'),'submitter'=>$results->first_name);
				$broadcast = new LcpBroadcast($this->options);
				$broadcast->send('lead-rejected', $email_data, $results->email, 'Sorry but your lead has been rejected');
			}
			if ( $_GET['type'] == 'lead' && $_GET['delete'] == 1) {
				$this->leads->delete($_GET['ref']);
			}
			// Companies
			if ( $_GET['type'] == 'company' && $_GET['approve'] == 1) {
				
				$this->companies->approve($_GET['id']);
				$results = $this->companies->byCompanyID($_GET['id']);
				// Send a broadcast
				$email_data = array('site_name'=>get_bloginfo('name'),'submitter'=>$results->first_name,'admin_url'=>admin_url());
				$broadcast = new LcpBroadcast($this->options);
				$broadcast->send('company-approved', $email_data, $results->email, 'Your company has been approved');
				
				//make directory for member
				//dir name
			}
			if ( $_GET['type'] == 'company' && $_GET['reject'] == 1) {
				$this->companies->reject($_GET['id']);
				$results = $this->companies->byCompanyID($_GET['id']);
				// Send a broadcast
				$email_data = array(	'site_name'	=>	get_bloginfo('name'),
										'submitter'	=> 	$results->company_name);
				$broadcast = new LcpBroadcast($this->options);
				$broadcast->send('company-rejected', $email_data, $results->email, 'Your company has been rejected');
			}
			if ( $_GET['type'] == 'company' && $_GET['delete'] == 1) {
				$this->companies->delete($_GET['id']);
			}
			$statistics 		= new LcpStatistics($this->db, $this->leads, $this->companies, $this->users);
			$total_companies	= $statistics->totalCompanies();
			$total_leads		= $statistics->totalLeads();
			$total_revenue		= $statistics->totalRevenue();			
			
			
			///echo $this->companies->getLastId();
			
			//pull user data for progress
			// query all compnies get the id and 
			/*	
			$profileSubmitted = $this->companies->byUserID($user_ID, 'approved');
			$incomeSubmitted = $this->income->byUserID($user_ID, 'approved');			
			$deductionSubmitted = $this->deductions->byUserID($user_ID, 'approved');
			$otherinfoSubmitted = $this->otherinfo->byUserID($user_ID, 'approved');	
			*/
			$results 			= $this->leads_to_visible_fields( $this->leads->get('pending') );
			$company_results 	= $this->companies->get('approved');
			
			//$results = $this->companies->get();
			//print_r($results);
			
			// Include the admin page view
			$this->register_css();
			$this->register_js();
			include_once dirname ( __FILE__ ).'/views/admin/dashboard-page.php';
		}
		/*
		 *
		 * 	Purpose: Displays the orders history page
		 * 	Added in Version 1.0
		 *
		 */
		function lodgement_history()
		{
			$company = $this->get_company_from_user_id();
			$results = $this->leads->getByCompanyID( $company->id );			
			$results = $this->leads_to_visible_fields( $results );
			
			$page_title = "Your Lodgements";
			$this->register_css();
			$this->register_js();
			include_once dirname ( __FILE__ ).'/views/user/orders-history-page.php';
		}
		/*
		 *
		 * 	Purpose: Displays the admin leads overview page
		 * 	Added in Version 1.0
		 *
		 */
		 
		 /*
		function lcp_admin_leads()
		{
			if($_GET['ref']){
				$this->lcp_admin_lead_details($_GET['ref']);
				return;
			}
			$results = $this->leads_to_visible_fields( $this->leads->get() );
			$this->register_css();
			$this->register_js();
			include_once dirname ( __FILE__ ).'/views/admin/leads-overview-page.php';
		}*/
		
		
		function lcp_admin_leads()
			{
		
				if($_GET['ref']){
		
					$this->lcp_admin_lead_details($_GET['ref']);
					return;
		
				}
		
				//$results = $this->leads_overview->getasc();
				$results = $this->leads_overview;
		
				$this->register_css();
				include_once dirname ( __FILE__ ).'/views/admin/leads-overview-page.php';
		
			}
		
		/*
		 *
		 * 	Purpose: Displays the admin companies page
		 * 	Added in Version 1.0
		 *
		 */
		function lcp_admin_companies()
		{
			$this->register_css();
			$this->register_js();
			if($_GET['id']){
				$this->lcp_admin_company_details($_GET['id']);
				return;
			}
			$results = $this->companies->get();
			include_once dirname ( __FILE__ ).'/views/admin/companies-overview-page.php';
		}
                
		/*
		 *
		 * 	Purpose: Displays the admin lead details page
		 * 	Added in Version 1.0
		 *
		 */
		function lcp_admin_lead_details($hash)
		{
			$lead = $this->leads->getByHash($hash);
			$history = $this->leads->purchaseHistory($lead->id);
			
			$form_data = unserialize( $lead->data );
			
			$data=$this->lcp_lead_data_to_array( $form_data, $lead->form_id );
		
			$this->register_js();
			$this->register_css();
			include_once dirname ( __FILE__ ).'/views/admin/lead-details-page.php';
		}
		
		
		function lcp_lead_data_to_array($form_data,$form_id)
		{
			$data=Array();
			
			$form_fields = $this->forms->getFieldsByFormId($form_id);
			
			if ( $form_fields )
			{
				foreach( $form_fields as $field )
				{		
					$output=Array();
				
					if ( $field->field_type == 'select' || $field->field_type == 'radio' )
					{
						$options=$this->forms->getFieldOptionsByFieldId( $field->id );
						
						$output['data']='';
						
						foreach( $options as $option )
						{						
							$output['data']=$option->id==$form_data[$field->field_name] ? $option->option_value : $output['data'];
						}
					}
					elseif ( $field->field_type == 'checkbox' )
					{
						$output['data']=$form_data[$field->field_name]==1 ? 'yes' : 'no';
					}
					else
					{
						$output['data']=strpos( $form_data[$field->field_name], '@' )!==false ? preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a href=\"mailto:$2@$3\">$2@$3</a>", $form_data[$field->field_name]) : $form_data[$field->field_name];
					}
					$output['label']=$field->field_label;
					
					$data[]=$output;
				}
			}
			
			return $data;
		}
		
		/*
		 *
		 * 	Purpose: Displays the admin company details page
		 * 	Added in Version 1.0
		 *
		 */
		function lcp_admin_company_details($user_ID)
		{		
			
			if($_GET['id']){
				$user_ID=$_GET['id'];			
				//print_r($id);
				$page_title = "Client Personal Details";
			}else {
				$page_title = "No Client Available";
			}
			$company = $this->companies->byUserID($user_ID, 'approved');
			$this->register_css();
			$this->register_js();
			// Are companies paying on account
			$is_on_account = ($this->options->get('global','lcp_payment_gateway') == 'on_account') ? true : false;
			include_once dirname ( __FILE__ ).'/views/admin/company-detail-page.php';
		}
		
		/*
		 *
		 * 	Purpose: Displays the admin company details page
		 * 	Added in Version 1.0
		 *
		 */
		function lcp_admin_income_details($user_ID)
		{		
			
			if($_GET['id']){
				$user_ID=$_GET['id'];			
				//print_r($id);
				$page_title = "Client Income Lodgement";
			}else {
				$page_title = "No Client Available";
			}				
		
			$incomelodgement = $this->income->byUserID($user_ID, 'approved');		
			
			$this->register_css();
			$this->register_js();
			// Are companies paying on account
			$is_on_account = ($this->options->get('global','lcp_payment_gateway') == 'on_account') ? true : false;
			include_once dirname ( __FILE__ ).'/views/admin/income-detail-page.php';
		}
		
		/*
		 *
		 * 	Purpose: Displays the admin company details page
		 * 	Added in Version 1.0
		 *
		 */
		function lcp_admin_deductions_details($user_ID)
		{		
			
			if($_GET['id']){
				$user_ID=$_GET['id'];			
				//print_r($id);
				$page_title = "Client Deductions Lodgement";
			}else {
				$page_title = "No Client Available";
			}				
		
			$incomeDeduction = $this->deductions->byUserID($user_ID, 'approved');		
			
			$this->register_css();
			$this->register_js();
			// Are companies paying on account
			$is_on_account = ($this->options->get('global','lcp_payment_gateway') == 'on_account') ? true : false;
			include_once dirname ( __FILE__ ).'/views/admin/deductions-detail-page.php';
		}
		
		/*
		 *
		 * 	Purpose: Displays the admin company details page
		 * 	Added in Version 1.0
		 *
		 */
		function lcp_admin_otherinfo_details($user_ID)
		{		
			
			if($_GET['id']){
				$user_ID=$_GET['id'];			
				//print_r($id);
				$page_title = "Client Other Information";
			}else {
				$page_title = "No Client Available";
			}				
		
			$incomeOther = $this->otherinfo->byUserID($user_ID, 'approved');		
			
			$this->register_css();
			$this->register_js();
			// Are companies paying on account
			$is_on_account = ($this->options->get('global','lcp_payment_gateway') == 'on_account') ? true : false;
			include_once dirname ( __FILE__ ).'/views/admin/otherinfo-detail-page.php';
		}
		
		/*
		 *
		 * 	Purpose: Displays the admin company details page
		 * 	Added in Version 1.0
		 *
		 */
		function lcp_admin_document_details($user_ID)
		{		
			
			if($_GET['id']){
				$user_ID=$_GET['id'];			
				//print_r($id);
				$page_title = "Client Documents";
			}else {
				$page_title = "No Client Available";
			}				
			
			$incomeOther = $this->otherinfo->byUserID($user_ID, 'approved');		
			
			$this->register_css();
			$this->register_js();
			// Are companies paying on account
			$is_on_account = ($this->options->get('global','lcp_payment_gateway') == 'on_account') ? true : false;
			include_once dirname ( __FILE__ ).'/views/admin/documents-details-page.php';
		}		
		
                
        /*
		 *
		 * 	Purpose: Displays the user dashboard page
		 * 	Added in Version 1.0
		 *
		 */
		function leads_dashboard()
		{
            if (isset($_GET['ref'])) {
				$this->lead_details($_GET['ref']);
				return;
			}
			$page_title = "Dashboard";
			$user_ID = get_current_user_id();
					
			//pull user data
			$profileSubmitted = $this->companies->byUserID($user_ID, 'approved');
			$incomeSubmitted = $this->income->byUserID($user_ID, 'approved');			
			$deductionSubmitted = $this->deductions->byUserID($user_ID, 'approved');
			$otherinfoSubmitted = $this->otherinfo->byUserID($user_ID, 'approved');			
			
			//print_r($profileSubmitted->user_nicename);
			
			
			$this->register_css();
			$this->register_js();
			include_once dirname ( __FILE__ ).'/views/user/leads-dashboard-page.php';
		}
		/*
		 *
		 * 	Purpose: Displays the income lodgement page
		 * 	Added in Version 1.0
		 *
		 */
		function leads_overview()
		{
			if (isset($_GET['ref'])) {
				$this->lead_details($_GET['ref']);
				return;
			}
			$page_title = "Tax Lodgements";
			// Get the logged in users purchased leads
			
			$company = $this->get_company_from_user_id();
			$results = $this->leads->getByCompanyID( $company->id );			
			//$results = $this->leads_to_visible_fields( $results1 );			
			//print_r($results);
			
			//$company 	= $this->get_company_from_user_id();
			//$leads 		= $this->get_leads_from_company_id($company->id);
			//$leads_as_string = $this->array_ids_to_comma_seperated_string($leads);			
			//$results = $this->leads_to_visible_fields( $this->leads->get('approved') );
			
			//print_r($leads);
			
			/*
			if (strlen($leads_as_string)>0) {
				$results = $this->leads_to_visible_fields( $this->leads->available($leads_as_string) );
			} else {
				$results = $this->leads_to_visible_fields( $this->leads->get('approved') );
			}
			*/
			
			$this->register_css();
			$this->register_js();
			include_once dirname ( __FILE__ ).'/views/user/leads-overview-page.php';
		}
		
		/*
		 *
		 * 	Purpose: Displays the income lod-page
		 * 	Added in Version 1.0
		 *
		 */
		function lodgement_income()
		{
			
			$user_ID = get_current_user_id();
			$page_title = "Financial Year Income";	
			if(count($_POST)>0){
				
				//get user's username
				$user_data =  get_userdata( $user_ID );	
				$plugin_dir = plugin_dir_path( __FILE__ );
				
				//print_r($user_data);				
				$username = $user_data->user_login;
				
				$this->income->update($_POST, $user_ID);				
				$this->income->updateFile($_FILES, $user_ID, $plugin_dir, $username);
				
				
				///echo "<pre>";
				///print_r($_POST);
				//echo "</pre>";				
				
				/*echo "<pre>";
				print_r($_FILES);
				echo "</pre>";*/				
				
				//var_dump($_POST[have_children]);
				//var_dump($_POST[child_name]);
				//var_dump($_POST[child_dob]);						
				$message = "You have successfully updated your income.";
			}
			
			//pull the data from income by user_id
			$incomelodgement = $this->income->byUserID($user_ID, 'approved');			
			//$incomelodgementfiles = $this->income->byUserID($user_ID, 'approved');			
			
			//var_dump($user_ID);		
			//var_dump($incomelodgement);		
						
			$this->register_css();
			$this->register_js('lcp_member');
			include_once dirname ( __FILE__ ).'/views/user/lodgement-income-page.php';
		}		
		
		
		/*
		 *
		 * 	Purpose: Displays the income lodgement page
		 * 	Added in Version 1.0
		 *
		 */
		function income_overview()
		{
			if (isset($_GET['ref'])) {
				$this->lead_details($_GET['ref']);
				return;
			}
			$page_title = "Income";
			// Get the logged in users purchased leads
			$company 	= $this->get_company_from_user_id();
			//$leads 		= $this->get_leads_from_company_id($company->id);
			//$leads_as_string = $this->array_ids_to_comma_seperated_string($leads);
			if (strlen($leads_as_string)>0) {
				$results = $this->leads_to_visible_fields( $this->leads->available($leads_as_string) );
			} else {
				$results = $this->leads_to_visible_fields( $this->leads->get('approved') );
			}
			$this->register_css();
			$this->register_js('lcp_member');
			include_once dirname ( __FILE__ ).'/views/user/leads-income-page.php';
		}
		
		/*
		 *
		 * 	Purpose: Displays the income deduction page
		 * 	Added in Version 1.0
		 *
		 */
		function lodgement_deductions()
		{
			
			$user_ID = get_current_user_id();
			$page_title = "Income Deductions";
			
			if(count($_POST)>0){
				
				//get user's username
				$user_data =  get_userdata( $user_ID );	
				$plugin_dir = plugin_dir_path( __FILE__ );
							
				$username = $user_data->user_login;				
				$this->deductions->update($_POST, $user_ID);				
				$this->deductions->updateFile($_FILES, $user_ID, $plugin_dir, $username);
				
				//echo "<pre>";
				//print_r($_POST);
				//echo "</pre>";
				
				//echo "<pre>";
				//print_r($_FILES);
				//echo "</pre>";			
						
				$message = "You have successfully updated your income deduction.";
			}
			
			//pull the data from income by user_id
			$incomeDeduction = $this->deductions->byUserID($user_ID, 'approved');	
			//var_dump($incomeDeduction);	
			$this->register_css();
			$this->register_js('lcp_member');
			include_once dirname ( __FILE__ ).'/views/user/lodgement-deductions-page.php';
		}
		/*
		 *
		 * 	Purpose: Displays the other income page
		 * 	Added in Version 1.0
		 *
		 */
		function lodgement_other()
		{
			
			$user_ID = get_current_user_id();
			$page_title = "Other Income Information";
			
			if(count($_POST)>0){
				
				//get user's username
				$user_data =  get_userdata( $user_ID );	
				$plugin_dir = plugin_dir_path( __FILE__ );
							
				$username = $user_data->user_login;
				//print_r($user_data);	
				
				$this->otherinfo->update($_POST, $user_ID);				
				$this->otherinfo->updateFile($_FILES, $user_ID, $plugin_dir, $username);
				//$this->deductions->updateFile($_FILES, $user_ID, $plugin_dir, $username);
				
				//echo "<pre>";
				//print_r($_POST);
				//echo "</pre>";
				
				//echo "<pre>";
				//print_r($_FILES);
				//echo "</pre>";			
						
				$message = "You have successfully updated your other income information.";
			}
			
			//pull the data from income by user_id
			$incomeOther = $this->otherinfo->byUserID($user_ID, 'approved');
			//print_r($incomeOther);				
			//$incomelodgementfiles = $this->income->byUserID($user_ID, 'approved');
			
			$this->register_css();
			$this->register_js('lcp_member');
			include_once dirname ( __FILE__ ).'/views/user/lodgement-other-page.php';
		}
		
		/*
			 *
			 * 	Purpose: Displays the lodgement documents
			 * 	Added in Version 1.0
			 *
			 */
			function lodgement_docs()
			{
			
			
				$user_ID = get_current_user_id();
	
				if(count($_POST)>0){
	
					$this->income->update($_POST, $user_ID);				
					$message = "You have successfully updated your income.";
					//var_dump($_POST);
				}
				
				//pull the data from income by user_id
				$lodgementDocs = $this->income->byUserID($user_ID, 'approved');
				//var_dump($user_ID);		
				//var_dump($lodgementDocs);	
	
				$page_title = "Lodgement Documents";
					
				$this->register_css();
				$this->register_js('lcp_member');
				include_once dirname ( __FILE__ ).'/views/user/lodgement-docs-page.php';
	
			}
		
		/*
		 *
		 * Purpose: From approved leads get "visible" fields
		 *
		 */
		function leads_to_visible_fields($leads)
		{
			
			$return_array=Array();
			
			$form_id=-1;
			
			if ( $leads )
			{
				foreach( $leads as $lead )
				{				
				
					$row = new stdClass();
					$row->id=$lead->id;
					$row->form_id=$lead->form_id;
					$row->sample1='';
					$row->sample2='';
					$row->sample3='';
					$row->status=$lead->status;
					$row->hash=$lead->hash;
					$row->created_at=$lead->created_at;
				
					$data=unserialize( $lead->data );
					// only build a new list of visible fields if we have to
					if ( $lead->form_id!=$form_id )
					{
						$form_id=$lead->form_id;
						$fields=$this->forms->getVisibleFields( $form_id );
					}
					$i=1;
					foreach( $fields as $field )
					{
						$sample_field='sample'.$i;
						$row->{$sample_field}=$data[$field->field_name];
						$i++;
						$return_array[$form_id][$sample_field]=$field->field_label;						
					}
					$return_array[$form_id]['leads'][]=$row;
				}
			}
			return $return_array;
		}
		 
		/*
		 *
		 * 	Purpose: Convert an array to comma separated string
		 * 	Added in Version 1.0
		 *
		 */
		function array_ids_to_comma_seperated_string($leads)
		{
			$comma_seperated_string = '';
			foreach ($leads as $lead) {
				$comma_seperated_string .= $lead->id .',';
			}
			return rtrim($comma_seperated_string,',');
		}
		/*
		 *
		 * 	Purpose: Gets all leads associated to a company based on its id
		 * 	Added in Version 1.0
		 *
		 */
		function get_leads_from_company_id($company_id)
		{
			return $this->leads->getByCompanyID($company_id);
		}
		/*
		 *
		 * 	Purpose: Gets the company based on the users id
		 * 	Added in Version 1.0
		 *
		 */
		function get_company_from_user_id()
		{
			return $this->companies->byUserID(get_current_user_id(), 'approved');
		}
		/*
		 *
		 * 	Purpose: Converts a lead hash to a leads id
		 * 	Added in Version 1.0
		 *
		 */
		function lead_id_from_hash($hash)
		{
			return $this->leads->getByHash($hash)->id;
		}
		/*
		 *
		 * 	Purpose: Displays the lead details page
		 * 	Added in Version 1.0
		 *
		 */
		public function lead_details($ref)
		{
			$options = get_option('lcp');
			$payment_gateway = $options['global']['lcp_payment_gateway'];
			$purchased = false;
			
			$company = $this->get_company_from_user_id();
			$results = $this->leads->getByCompanyID( $company->id );
			
			//print_r($this->leads->getByHash($ref));
			echo "<script>console.log( 'just started' );</script>";
			
			if ($payment_gateway == 'stripe' && isset($_POST['stripeToken'])) {
				$cashier = new LcpStripePayment($options, $this->db);
				$purchased = $cashier->charge(	$_POST['stripeToken'], 
												$this->leads->getByHash($ref), 
												$this->companies->byUserID(get_current_user_id(), 'approved'));
			
			} else if ( $payment_gateway == 'paypal_html' && isset($_POST['auth'])) { //&& isset($_POST['auth'])
				
				echo "<script>console.log( 'paypal registered' );</script>";
				
				$cashier = new LcpPaypalPayment($options, $this->db);
				$purchased = $cashier->charge(	$_POST['auth'], 
												$this->leads->getByHash($ref), 
												$this->companies->byUserID(get_current_user_id(), 'approved'));			
			
			} else if ( $payment_gateway == 'on_account' && isset($_POST['item_name']) ) {
				$cashier = new LcpOnAccountPayment($options, $this->db);
				$purchased = $cashier->charge(	$_POST['item_name'], 
												$this->leads->getByHash($ref), 
												$this->companies->byUserID(get_current_user_id(), 'approved'));
				
				// Deduct purchase from credit limit
				$company_to_charge = $this->companies->byUserID(get_current_user_id(), 'approved');
				$this->companies->reduceCreditLimit($company_to_charge->id);
			}			
			
			if ($purchased == true) {
				
				$outputx = "<script>console.log( 'purchased == true' );</script>";
				echo $outputx;
				
				// Get the users details - this is good
				$user = $this->get_company_from_user_id();				
				
				// Purchase the lead/lodgement - add an order id to the companies leads table
				// this completed - added a new row with insert
				$this->leads->purchase($user->id, $this->lead_id_from_hash($_GET['ref']), $this->lead_id_from_hash($_GET['ref']));
				
				
				// Get all the lead details
				$results = $this->leads->getByHash($_GET['ref']);
				$data = $this->lcp_lead_data_to_array( unserialize( $results->data ), $results->form_id );
				
				// Broadcast email to purchaser -- this needs to change to just an alert.
				// The email was sent out
				$email_data = array( 	'submitter' 		=>	$user->company_name,
										'site_name' 		=>	get_bloginfo('name'),
										'lead_reference' 	=>	$this->lead_id_from_hash($_GET['ref'] ), 
										'data'				=>  $data,
										'created_at' 		=> 	$results->created_at );
				$broadcast = new LcpBroadcast($this->options);
				$broadcast->send('lead-purchased', $email_data, $user->user_email, 'Thank you for submitting your tax lodgement');
				
				
			}
			
			$paypal_btn_mode = $options['paypal']['lcp_paypal_btn_mode'];
			$paypal_btn_mode = ($paypal_btn_mode=='live') ? 'https://www.paypal.com': 'https://www.sandbox.paypal.com';
			$lead_value 	 		= $options['global']['lcp_lead_price'];
			$paypal_email_address 	= $options['paypal']['lcp_paypal_email_address'];
			$currency_accepted 		= $options['global']['lcp_currency_accepted'];
			
			// dont think we need this			
			//$lead = $this->leads->getByHash($ref);
			//$visible_data = $this->leads_to_visible_fields( Array( $lead ) );
			//$data = $this->lcp_lead_data_to_array( unserialize( $lead->data ), $lead->form_id );
			
			// Has the logged in user already purchased this lead?
			// If so, show them the full details and remove the buy button.
			// Get the company's details
			$company = $this->companies->byUserID(get_current_user_id(), 'approved');
			// Get the companies credit limit (for on_account payments)
			$credit_limit = $this->companies->creditLimit($company->id);
			
			// Want to remove the button when the lead is purchased
			//$payment_results = $this->leads->hasPurchased($company->id, $lead->id);
			$payment_results = $this->leads->hasPurchased($company->id);
			print_r($payment_results);
			
			$this->register_css();
			$this->register_js();
			
			//$output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
			//echo $output;
			
			include_once dirname ( __FILE__ ).'/views/user/lead-details.php';
		}
		
		
		function lcp_admin_forms_dashboard($form_created = false) {
			if ( $_GET['type'] == 'form' && $_GET['delete'] == 1) {
				$this->forms->delete($_GET['ref']);
			}		
		
			$forms = $this->forms->get();
			$this->register_css();
			$this->register_js();
			include_once dirname ( __FILE__ ).'/views/admin/forms-overview.php';
		}
		
		function lcp_admin_form_add() {
			if ( isset($_POST['name']) && strlen($_POST['name']) > 2) {
				// We are storing the input
				$db_data = array();
				$db_data['name']		= $_POST['name'];
				$db_data['created_at']	= date('Y-m-d H:i:s');
				$db_data['updated_at']	= date('Y-m-d H:i:s');
				$form = $this->forms->insert($db_data);
				
				if ($form !== false) {
					if ( isset( $_POST['field_label'] ) )
					{
				
						foreach( $_POST['field_label'] as $key=>$value )
						{
							
							$field_data = array();
							$field_data['field_label']	 	= $_POST['field_label'][$key];
							$field_data['field_type'] 		= $_POST['field'][$key];
							$field_data['field_name'] 		= $_POST['field_name'][$key];
							$field_data['field_visible'] 	= isset( $_POST['visible'][$key] ) ? 1 : 0;
							$field_data['form_id']			= $form;
							$field_data['created_at']		= $db_data['created_at'];
							$field_data['updated_at']		= $db_data['created_at'];
							$form_field = $this->forms->insert_field($field_data);
							if ($form_field !== false) {
								$field_properties = array();
								$field_properties[] = array('property'=>'id','value'=>$_POST['id'][$key],'form_field_id'=>$form_field, 'created_at'=>$db_data['created_at']);
								$field_properties[] = array('property'=>'class','value'=>$_POST['class'][$key],'form_field_id'=>$form_field, 'created_at'=>$db_data['created_at']);
								
								if( isset( $_POST['placeholder'][$key] ) ) $field_properties[] = array('property'=>'placeholder','value'=>$_POST['placeholder'][$key],'form_field_id'=>$form_field, 'created_at'=>$db_data['created_at']);
								
								$required=( isset( $_POST['required'][$key] ) && $_POST['required'][$key]=='yes' ) ? 1 : 0;
								
								$field_properties[]=array('property'=>'required','value'=>$required,'form_field_id'=>$form_field, 'created_at'=>$db_data['created_at']);
								
								foreach ($field_properties as $field_key => $field_value) {
									$this->forms->insert_field_property($field_value);
								}
								if ( in_array( $field_data['field_type'], Array('select','radio') ) )
								{		
							
									$options=explode( "\r\n", $_POST['options'][$key] );
									
									if ( sizeof( $options ) > 0 )
									{		
								
										$field_options=array();
										foreach( $options as $option )
										{
											$field_options=array('option_value'=>$option,'form_field_id'=>$form_field, 'created_at'=>$db_data['created_at']);;
											$this->forms->insert_field_options($field_options);
										}	
										
									}
									
								}
								
							}						
							
						}
					
					}
					$form_created=TRUE;					
					
				}
				$this->lcp_admin_forms_dashboard($form_created);
				
			}
			else
			{
				$this->register_css();
				$this->register_js();
				include_once dirname ( __FILE__ ).'/views/admin/form-add.php';
			
			}
		}
		function lcp_admin_form_view() {
            $form = $this->forms->getById($_GET['ref']);
            $this->register_css();
            $this->register_js();
            include_once dirname ( __FILE__ ).'/views/admin/form-show.php';
		}
		function lcp_admin_form_edit() {
			// this is a post, update the form
			if ( isset($_POST['name']) && strlen($_POST['name']) > 2) {
				$id=preg_replace( "/(\D)/", '', $_GET['ref'] );
				if ( $id=='' ) return false;
				// delete any fields that appear in this list				
				if ( isset( $_POST['deletion_ids'] ) && strlen( $_POST['deletion_ids'] )>0 )
				{
					$ids=explode(',',$_POST['deletion_ids']);
					
					if ( sizeof( $ids )> 0 )
					{
						foreach( $ids as $delete_id )
						{
							if ( $delete_id!='' )
							{
								$this->forms->delete_field($delete_id);
							}
						}
					}					
				}
				
				// update the fields
				$db_data['name']		= $_POST['name'];
				$db_data['updated_at']	= date('Y-m-d H:i:s');
				if ( !$this->forms->update($db_data,$id) ) return false;
				foreach( $_POST['field_label'] as $key=>$value )
				{
					$field_data = array();
					
					$field_id=$_POST['field_id'][$key];
					
					$field_data['field_label']	 	= $_POST['field_label'][$key];
					$field_data['field_type'] 		= $_POST['field'][$key];
					$field_data['field_name'] 		= $_POST['field_name'][$key];
					$field_data['field_visible'] 	= isset( $_POST['visible'][$key] ) ? 1 : 0;
					$field_data['form_id']			= $id;
					$field_data['updated_at']		= date('Y-m-d H:i:s');
					
					$form_field=false;
					
					if ( $field_id==-1 )
					{					
						$field_data['created_at']	= date('Y-m-d H:i:s');
						$form_field = $this->forms->insert_field($field_data);
					}
					else
					{
						if ( $this->forms->update_field($field_data,$field_id) ) $form_field = $field_id;
					}
					if ($form_field !== false) {
						$field_properties = array();
						$field_properties[] = array('property'=>'id','value'=>$_POST['id'][$key],'form_field_id'=>$form_field, 'created_at'=>$db_data['created_at']);
						$field_properties[] = array('property'=>'class','value'=>$_POST['class'][$key],'form_field_id'=>$form_field, 'created_at'=>$db_data['created_at']);
						
						if( isset( $_POST['placeholder'][$key] ) ) $field_properties[] = array('property'=>'placeholder','value'=>$_POST['placeholder'][$key],'form_field_id'=>$form_field, 'created_at'=>$db_data['created_at']);
						
						$required=( isset( $_POST['required'][$key] ) && $_POST['required'][$key]=='yes' ) ? 1 : 0;
						
						$field_properties[]=array('property'=>'required','value'=>$required,'form_field_id'=>$form_field, 'created_at'=>$db_data['created_at']);
						
						if ( $field_id==-1 )
						{						
							foreach ($field_properties as $field_key => $field_value) {							
								$this->forms->insert_field_property($field_value);
							}
						}
						else
						{
							foreach ($field_properties as $field_key => $field_value) {							
								$this->forms->update_field_property($field_value);
							}
						}
						if ( in_array( $field_data['field_type'], Array('select','radio') ) )
						{		
					
							$options=explode( "\r\n", $_POST['options'][$key] );
							
							if ( sizeof( $options ) > 0 )
							{		
						
								if ( $field_id!=-1 )
								{
									$this->forms->delete_field_options( $field_id );
								}
						
								$field_options=array();
								foreach( $options as $option )
								{
									$field_options=array('option_value'=>$option,'form_field_id'=>$form_field, 'created_at'=>$db_data['created_at']);;
									$this->forms->insert_field_options($field_options);
								}	
								
							}
							
						}
						
					}
					$updated=TRUE;					
				}
				
			}
		
			// load the 
            $form = $this->forms->getById($_GET['ref']);
			$fields=$this->forms->getFieldsByFormId($form->id);
			if ( $fields!=null )
			{
				$field_data = array();
		
				foreach( $fields as $field )
				{			
					$data = array();
				
					$data['field_label'] 	= $field->field_label;
					$data['field_type'] 	= $field->field_type;
					$data['field_name']		= $field->field_name;
					$data['field_visible'] 	= $field->field_visible;
					$data['field_id']	 	= $field->id;
			
					$properties=$this->forms->getFieldPropertiesByFieldId($field->id);
			
					foreach( $properties as $property )
					{
						$data[$property->property]=$property->value;						
					}
					
					$options=$this->forms->getFieldOptionsByFieldId($field->id);
					
					if ( $options!=null )
					{					
						$raw_options=Array();
					
						foreach( $options as $option )
						{
							$raw_options[]=$option->option_value;
						}					
						
						$data['options']=implode("\r\n",$raw_options);
					}
			
					$field_data[]=$data;
			
				}
				
			}			
			
            $this->register_css();
			$this->register_js();
            include_once dirname ( __FILE__ ).'/views/admin/form-edit.php';
		}
		/*
		 *
		 * 	Purpose: Creates a hash
		 * 	Added in Version 1.0
		 *
		 */
		function create_hash()
		{
			return md5(uniqid("", true));
		}
		/*
		 *
		 * 	Purpose: Builds lead request form from its shortcode
		 * 	Added in Version 1.0
		 *
		 */
		function lead_request_form_shortcode ($atts = array(), $content = null, $tag){
			// We need to loop over the form and output the fields
			// here
			$validated = null;
			if (count($_POST)>0) {
				if ( !isset( $_POST['__lcp_form_id'] ) || preg_replace( "/(\D)/", "", $_POST['__lcp_form_id'] )=='' ) return false;
				$form_id=preg_replace( "/(\D)/", "", $_POST['__lcp_form_id'] );
				
				$required_fields = $this->forms->getRequiredFields( $form_id );
				$required=Array();
				
				if ( $required_fields )
				{
					foreach( $required_fields as $key=>$value )
					{
						$required[]=$value->field_name;
					}
				}
				
				$visible_fields =  $this->forms->getVisibleFields( $form_id );
				
				$visible=Array();
				
				if ( $visible_fields )
				{
					foreach( $visible_fields as $key=>$value )
					{
						$visible[]=$value->field_name;
					}
				}				
				// remove both submit and the form id
				array_pop($_POST);
				//$old_form=array_shift($_POST);
				$validated = true;
				// Check to make sure all required fields have some data in them
				foreach ($required as $key) {
					if(!in_array($key, array_keys($_POST))){
						$validated = false;
						error_log( $key );
						error_log( print_r( $_POST, true ) );
						break;
					}
				}
				if (true == $validated) {
					foreach ($_POST as $key => $value) {
						if( in_array($key, $required) && (strlen($value) == 0 || $value == 'null') ){
							$validated = false;
							break;
						}
					}
				}
				if (true == $validated) {
					// Send a broadcast
					$email_data = array();
					$email_hash["hash"] = $this->create_hash();
					
					foreach( $_POST as $key=>$value )
					{
						$lead_data[$key]			= $value;
					}
					
					$general_data['form_id'] 		= $form_id;
					
					$general_data['status']			= 'pending';
					$general_data['created_at']		= date('Y-m-d H:i:s');
					$general_data['updated_at']		= date('Y-m-d H:i:s');
					$lead_data['site_name']		= get_bloginfo('name');
					$lead_data['submitter']		= isset( $visible[0] ) ? $visible[0] : 'Website';
					$email_data=array_merge( $email_hash, Array( 'data'=>$lead_data ), $general_data );
										
					$broadcast = new LcpBroadcast($this->options);
					//$broadcast->send('lead-thanks', $email_data, $_POST['email'], 'Thank you for submitting a new lead');
					$lead['data']=serialize( $lead_data );
					$db_data=array_merge( $email_hash, $lead, $general_data );					
					// Prep data for insertion into db
					//$db_data = array_slice($db_data, 0, -2);
					$this->leads->insert($db_data);
				}
			}
			$this->register_css('public');			
			include_once dirname ( __FILE__ ).'/views/public/lead-request-form.php';
			
			// Which form are we loading up?
			shortcode_atts( array('id' => '1'), $atts, 'lead_request_form' );
			
			if ( isset( $_POST ) ) $data=$_POST;
			$this->form_builder->render($atts['id'],$data);			
		}
		/*
		 *
		 * 	Purpose: Emails companies when a new lead is approved
		 * 	Added in Version 1.0
		 *
		 */
		function broadcast_new_lead($lead)
		{
			// Get all approved companies from db
			$companies = $this->companies->get('approved', array('receive_leads'=>'yes'));
			if (count($companies)>0) {
				// Broadcast email to each one
				foreach ($companies as $company) {
					unset($email_data);
					// Broadcast email to purchaser
					$email_data = array( 	'submitter' => $data['first_name'],
											'site_name' => get_bloginfo('name'),
											'admin_url'	=> admin_url(),
											'firstname'	=> $company->first_name);
					$broadcast = new LcpBroadcast($this->options);
					$broadcast->send('new-lead-available', $email_data, $company->user_email, 'New leads are available!');
				}
			}
		}
		/*
		 *
		 * 	Purpose: Builds the company sign-up form from its shortcode
		 * 	Added in Version 1.0
		 *
		 */
		function lead_signup_form_shortcode (){
			$validated = null;
                        
			if ( count($_POST)>0) {
				$p = $_POST;
				array_pop($p);
				unset($p['company_number']);
				unset($p['address2']);                                
                unset($p['company_name']);
                unset($p['title']);
                unset($p['lastname']);
                unset($p['town']);
                unset($p['county']);
                unset($p['postcode']);
                unset($p['company_description']);
                unset($p['phone']);
                unset($p['alt_phone']);
                unset($p['website']);
                unset($p['service_range']);
                unset($p['receive_leads']);
				$validated = true;
				foreach ($p as $key => $value) {
					if( strlen($value) == 0 || $value == 'null' ){
						$validated = false;
						break;
					}
				}
				if (true == $validated) {
					$company_data = array();
					$company_income_data = array();
					$company_deductions_data = array();
					
                    $company_data['first_name'] = $_POST['first_name'];
                    $_passie = $this->create_hash();
                                        
					$userdata = array(
						'user_login'	=>	$_POST['first_name'],
						'user_pass'		=>	$_passie,
						'role'			=>	'lcp_member',
						'user_email'	=>	$_POST['email'],
						'user_url'	=>	$_POST['email']
					);
					$user_id = wp_insert_user( $userdata );
                                        
					if(! is_wp_error($user_id)){
						$company_data['user_id'] = $user_id;
						$company_data['status'] = 'approved';
						$company_data['created_at']	= date('Y-m-d H:i:s');
						$company_data['updated_at']	= date('Y-m-d H:i:s');
						$new_company = $this->companies->insert($company_data);
						
						//get the last company id
						$lastCompanyId = $this->companies->getLastId();
						
						
						/* -- this is now working
						insert user_id in the tables
						wp_lcp_income
						wp_lcp_deductions
						*/
						
						$company_income_data['user_id'] = $user_id;
						$company_income_data['status'] = 'approved';
						$company_income_data['hash'] = $this->create_hash();
						$company_income_data['created_at']	= date('Y-m-d H:i:s');						
						$company_income_data['company_id'] = $lastCompanyId;
						
						//$company_income_data['updated_at']	= date('Y-m-d H:i:s');			
						$new_income_lodgement = $this->income->insert($company_income_data);
								
						
						$company_deductions_data['user_id'] = $user_id;
						$company_deductions_data['status'] = 'approved';
						$company_deductions_data['hash'] = $this->create_hash();
						$company_deductions_data['created_at']	= date('Y-m-d H:i:s');
						$company_deductions_data['company_id'] = $lastCompanyId;
						//$company_deductions_data['updated_at']	= date('Y-m-d H:i:s');				
						$new_deductions_data = $this->deductions->insert($company_deductions_data);
						
						
						$company_other_data['user_id'] = $user_id;
						$company_other_data['status'] = 'approved';
						$company_other_data['hash'] = $this->create_hash();
						$company_other_data['created_at']	= date('Y-m-d H:i:s');
						$company_other_data['company_id'] = $lastCompanyId;
						//$company_other_data['updated_at']	= date('Y-m-d H:i:s');				
						$new_other_data = $this->otherinfo->insert($company_other_data);
						
						/* -- */
						
						/* -- create folders 
						-- parent folder client-docs
						- sub folders: income, deductions, other
						*/
						
						//mkdir(path,mode,recursive,context)
						
						
						$email_data = array();
						$email_data['submitter']		= $_POST['first_name'];
						$email_data['first_name']		= $_POST['first_name'];
						$email_data['username']			= $_POST['first_name'];
						$email_data['email']			= $_POST['email'];
						$email_data['created_at']		= date('Y-m-d H:i:s');
						$broadcast = new LcpBroadcast($this->options);
						$broadcast->send('company-thanks', $email_data, $_POST['email'], 'Thanks for sigining-up');
                                                
                        $approvecompany = $this->companies->approvebyuid($user_id);                                                  
                        $results = $this->companies->byCompanyUserID($user_id); 
                        
                        // Send a broadcast
                        //$email_data = array('site_name'=>get_bloginfo('name'),'submitter'=>$results->first_name,'admin_url'=>admin_url());
                        $broadcast = new LcpBroadcast($this->options);
                        $broadcast->send('company-approved', $email_data, $_POST['email'], 'Your registration has been approved');
                        $validated = true;
                        
                       	//notify admin by email
                        
                                                
					} else {
						//$validated = null;
						is_wp_error($user_id);
						$errors = $user_id->get_error_message();
					}
				}
			}                                               
                        
			$this->register_css('public');
            //echo "<h1>Lead-signup-form</h1>";
			//include_once dirname ( __FILE__ ).'/views/public/lead-demo.php';
            //include dirname ( __FILE__ ).'/views/public/lead-demo.php';
            include dirname ( __FILE__ ).'/views/public/lead-signup-form.php';
		}
		/*
		 *
		 * 	Purpose: Initialises the plugin
		 * 	Added in Version 1.0
		 *
		 */
		function init()
		{
			$this->check_valid_user();
			add_action('admin_menu', array($this,'admin_menu'));
			if(! is_admin()) {
				add_action('wp_before_admin_bar_render', array($this,'remove_admin_bar_links') );
				add_action('after_setup_theme',array($this,'remove_core_updates'));
			}
			// - user login redirect
			function lcp_login_redirect($redirect_to, $request, $user)
			{
				if (is_object($user)) {
					if( isset($user->id) ) {
						if (user_can($user, 'lcp_member')) {
                                                    //return admin_url() . 'admin.php?page=lcp_leads';
                                                    return admin_url() . 'admin.php?page=lcp_dashboard';
						} else if (user_can($user, 'lcp_admin')) {
							return admin_url() . 'admin.php?page=lcp_admin_dashboard';
						} else {
							return admin_url();
						}
					} else {
						return admin_url();
					}
				}
				
			}
			add_filter( 'login_redirect', 'lcp_login_redirect', 10, 3);
		}
		/*
		 *
		 * 	Purpose: Builds the admin and usermenu
		 * 	Added in Version 1.0
		 *	Note: Member is a company
		 *
		 */
		function admin_menu()
		{
		if ( is_admin() && ! current_user_can('lcp_member')  && ! current_user_can('lcp_admin') )
		{
			add_options_page('SS Accounting', 'SS Accounting', 9, basename(__FILE__), array($this, 'load_settings_page'));
			add_menu_page('SS Accounting', 'SS Accounting', 'manage_options', 'lcp_admin_dashboard', array($this,'admin_dashboard'), 'dashicons-chart-area',31);
			add_submenu_page( 'lcp_admin_dashboard', 'Dashboard', 'Dashboard', 'manage_options', 'lcp_admin_dashboard', array($this,'admin_dashboard') ,31);
			add_submenu_page( 'lcp_admin_dashboard', 'Lodgements', 'Lodgements', 'manage_options', 'lcp_admin_leads', array($this,'lcp_admin_leads') ,31);
			add_submenu_page( 'lcp_admin_dashboard', 'Clients', 'Clients', 'manage_options', 'lcp_admin_companies', array($this,'lcp_admin_companies') ,31);
			//add_submenu_page( 'lcp_admin_dashboard', 'Forms', 'Forms', 'manage_options', 'lcp_admin_forms', array($this,'lcp_admin_forms_dashboard') ,31);
			
			add_submenu_page( null, 'income_details', 'income_details', 'manage_options', 'lcp_admin_income_details', array($this,'lcp_admin_income_details') ,31);
			add_submenu_page( null, 'deductions_details', 'deductions_details', 'manage_options', 'lcp_admin_deductions_details', array($this,'lcp_admin_deductions_details') ,31);
			
			add_submenu_page( null, 'otherinfo_details', 'otherinfo_details', 'manage_options', 'lcp_admin_otherinfo_details', array($this,'lcp_admin_otherinfo_details') ,31);
			
			add_submenu_page( null, 'document_details', 'document_details', 'manage_options', 'lcp_admin_document_details', array($this,'lcp_admin_document_details') ,31);
			
			add_submenu_page( null, 'View Form', 'view_form', 'edit_lcp_form', 'lcp_admin_form_edit', array($this,'lcp_admin_form_edit') ,31);
			add_submenu_page( null, 'Edit Form', 'edit_form', 'edit_lcp_form', 'lcp_admin_form_view', array($this,'lcp_admin_form_view') ,31);
			add_submenu_page( null, 'Add Form', 'add_form', 'edit_lcp_form', 'lcp_admin_form_add', array($this,'lcp_admin_form_add') ,31);
			add_submenu_page( null, 'Edit Lead', 'edit_lead', 'manage_options', 'lcp_admin_leads_edit', array($this,'lcp_admin_edit_lead') ,31);
			add_submenu_page( null, 'Edit Company', 'edit_company', 'manage_options', 'lcp_admin_company_edit', array($this,'lcp_admin_edit_company') ,31);
		
		} else if (is_admin() && current_user_can('lcp_member') ) {
			//add_menu_page('lcp_leads', 'Lodgements', 'lcp_member', 'lcp_leads', array($this,'leads_overview'), 'dashicons-chart-area',30);
        add_menu_page('lcp_dashboard', 'Dashboard', 'lcp_member', 'lcp_dashboard', array($this,'leads_dashboard'), 'dashicons-dashboard',30);                                        
        add_menu_page('lcp_leads', 'Lodgements', 'lcp_member', 'lcp_leads', array($this,'leads_overview'), 'dashicons-chart-area',30);        
        add_menu_page('lcp_profile', 'Personal Profile', 'lcp_member', 'lcp_profile', array($this,'my_account'), 'dashicons-admin-users',30);                
		add_submenu_page( 'lcp_leads', 'Lodgement History', 'Lodgement History', 'lcp_member', 'lcp_lodgement_history', array($this,'lodgement_history') ,30);
		add_submenu_page( 'lcp_leads', 'Income', 'Income', 'lcp_member', 'lodgement_income', array($this,'lodgement_income') ,30);
		add_submenu_page( 'lcp_leads', 'Deductions', 'Deductions', 'lcp_member', 'lodgement_deductions', array($this,'lodgement_deductions') ,30);
		//add_submenu_page( 'lcp_leads', 'Other', 'Other', 'lcp_member', 'lodgement_other', array($this,'lodgement_other') ,30);
		//add_submenu_page( 'lcp_leads', 'Documents', 'Documents', 'lcp_member', 'lodgement_docs', array($this,'lodgement_docs') ,30);		
		add_submenu_page('lcp_leads', 'Cart', 'Cart', 'lcp_member', 'leads_overview', array($this,'leads_overview'),30);
		
		//add_submenu_page( 'lcp_leads', 'Personal Profile', 'Personal Profile', 'lcp_member', 'my_account', array($this,'my_account') ,30);
               
				add_action( 'admin_bar_menu', 'modify_admin_bar' );
				function modify_admin_bar($wp_admin_bar)    
				{
					global $wp_admin_bar;
					$wp_admin_bar->remove_menu('updates');
					$wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
					$wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
					$wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
					$wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
					$wp_admin_bar->remove_menu('support-forums');	// Remove the WordPress support forum link
					$wp_admin_bar->remove_menu('my-account');
					if ( is_user_logged_in() ) {
						$wp_admin_bar->add_menu(
							array(
								'id'     => 'my-log-out',
								'parent' => 'top-secondary',
								'title'  => __( 'Log out' ),
								'href'   => wp_logout_url(),
							)
						);
					}
				}
				remove_menu_page('profile.php');
				remove_menu_page('index.php');
			} else if ( is_admin() && current_user_can('lcp_admin') ) {
				add_menu_page('Lead Capture Pro', 'Lead Capture Pro', 'lcp_admin', 'lcp_admin_dashboard', array($this,'admin_dashboard'), 'dashicons-chart-area',31);
				add_submenu_page( 'lcp_admin_dashboard', 'Dashboard', 'Dashboard', 'lcp_admin', 'lcp_admin_dashboard', array($this,'admin_dashboard') ,31);
				add_submenu_page( 'lcp_admin_dashboard', 'Leads', 'Leads', 'lcp_admin', 'lcp_admin_leads', array($this,'lcp_admin_leads') ,31);
				add_submenu_page( 'lcp_admin_dashboard', 'Companies', 'Companies', 'lcp_admin', 'lcp_admin_companies', array($this,'lcp_admin_companies') ,31);
				//add_submenu_page( 'lcp_admin_dashboard', 'Forms', 'Forms', 'lcp_admin', 'lcp_admin_forms', array($this,'lcp_admin_forms_dashboard') ,31);
				add_submenu_page( null, 'View Form', 'view_form', 'edit_lcp_form', 'lcp_admin_form_edit', array($this,'lcp_admin_form_edit') ,31);
				add_submenu_page( null, 'Edit Form', 'edit_form', 'edit_lcp_form', 'lcp_admin_form_view', array($this,'lcp_admin_form_view') ,31);
				add_submenu_page( null, 'Add Form', 'add_form', 'edit_lcp_form', 'lcp_admin_form_add', array($this,'lcp_admin_form_add') ,31);
				add_submenu_page( null, 'Edit Lead', 'edit_lead', 'edit_lcp_form', 'lcp_admin_leads_edit', array($this,'lcp_admin_edit_lead') ,31);
				add_submenu_page( null, 'Edit Company', 'edit_company', 'edit_lcp_form', 'lcp_admin_company_edit', array($this,'lcp_admin_edit_company') ,31);
				
				add_action( 'admin_bar_menu', 'modify_admin_bar' );
				function modify_admin_bar($wp_admin_bar)
				{
					global $wp_admin_bar;
					$wp_admin_bar->remove_menu('updates');
					$wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
					$wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
					$wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
					$wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
					$wp_admin_bar->remove_menu('support-forums');	// Remove the WordPress support forum link
					$wp_admin_bar->remove_menu('my-account');
					if ( is_user_logged_in() ) {
						$wp_admin_bar->add_menu(
							array(
								'id'     => 'my-log-out',
								'parent' => 'top-secondary',
								'title'  => __( 'Log out' ),
								'href'   => wp_logout_url(),
							)
						);
					}
				}
				remove_menu_page('profile.php');
				remove_menu_page('index.php');
			}
		}
		/*
		 *
		 * 	Purpose: Adds the new member type to the database
		 * 	Added in Version 1.0
		 *
		 */
		function add_roles_on_plugin_activation() {
			add_role( 'lcp_member', 'LCP Member', 	array( 'read' => true, 'level_0' => true ) );
			add_role( 'lcp_admin', 'LCP Admin', 	array( 'read' => true, 'edit_lcp_form' => true, 'level_9' => true ) );
			
			$role=get_role('lcp_admin');
			$role->add_cap('edit_lcp_form');
			
			$role=get_role('administrator');
			$role->add_cap('edit_lcp_form');
		}
		/*
		 *
		 * 	Purpose: Registers the shortcodes
		 * 	Added in Version 1.0
		 *
		 */
		function register_shortcodes() {
			add_shortcode( 'lead_request_form', array($this,'lead_request_form_shortcode') );
			add_shortcode( 'lcp_signup_form', array($this,'lead_signup_form_shortcode') );
		}
		/*
		 *
		 * 	Purpose: Converts date to new format
		 * 	Added in Version 1.0
		 *
		 */
		function convert_date_to_format($date, $new_format)
		{
			return date($new_format, strtotime($date));
		}
	}
	$lcp = new lead_capture_pro();
}
?>