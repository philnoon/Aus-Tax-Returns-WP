<?php
	$options = get_option('lcp');
	$lcp_paypal_email_address = $options['paypal']['lcp_paypal_email_address'];
	$mode = $options['paypal']['lcp_paypal_btn_mode'];

	if ( $mode == 'sandbox') {
		$paypal_url = 'https://sandbox.paypal.com';
	} else {
		$paypal_url = 'https://www.paypal.com';
	}

	if ($mode=='sandbox') : ?>
	<div class="alert alert-danger"><strong>Heads Up!</strong> PayPal is in SANDBOX mode</div>
	<?php endif;
	
	//print_r($this->leads->getByHash($ref));
	$leaddet = $this->leads->getByHash($ref);
	//print_r($leaddet);
	//echo 'sdsdf'.$leaddet->hash;

	if (!empty($lcp_paypal_email_address)) : ?>
	<form action="<?php echo $paypal_url; ?>/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_xclick">
		<input type="hidden" name="currency_code" value="<?php echo $currency_accepted; ?>" />
		<input type="hidden" name="amount" value="<?php echo $lead_value; ?>" />
		<input type="hidden" name="ref" value="<?php echo $leaddet->hash; ?>" />
		<input type="hidden" name="return" value="<?php echo admin_url(); ?>admin.php?page=lead_success?>" />
		<input type="hidden" name="notify_url" value="<?php echo admin_url(); ?>admin.php?page=lcp_leads?>" />
		<input type="hidden" name="item_name" value="Simple Solutions Accounting Services - Tax Lodgement" />
		<input type="hidden" name="item_number" value="<?php echo $leaddet->hash; ?>">
		<input type="hidden" name="business" value="<?php echo $paypal_email_address; ?>">
		<input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
		<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
	</form>
	<?php else: ?>
		<div class="alert alert-danger"><strong>Heads Up!</strong> The 'Buy Now' has been deactivated as the PayPal settings haven't been configured.</div>
	<?php endif;?>