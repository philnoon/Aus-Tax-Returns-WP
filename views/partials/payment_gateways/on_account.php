<?php
	$options = get_option('lcp');
	$mode = $options['on_account']['lcp_on_account_payment_mode'];

	if ( $mode == 'sandbox') {
		$paypal_url = 'https://sandbox.paypal.com';
	} else {
		$paypal_url = 'https://www.paypal.com';
	}

	if ($mode=='sandbox') : ?>
	<div class="alert alert-danger"><strong>Heads Up!</strong> On Account Payments is in SANDBOX mode</div>
	<?php endif;

	if ($credit_limit > $options['global']['lcp_lead_price']) : ?>
	<form action="<?php echo admin_url(); ?>admin.php?page=lcp_leads&ref=<?php echo $lead->hash; ?>" method="post" target="_top">
		<input type="hidden" name="currency_code" value="<?php echo $currency_accepted; ?>" />
		<input type="hidden" name="amount" value="<?php echo $lead_value; ?>" />
		<input type="hidden" name="ref" value="<?php echo $lead->hash; ?>" />
		<input type="hidden" name="item_name" value="Lead Reference Number: <?php echo $lead->id;?>" />
		<input type="submit" value="Buy Now" class="button button-success">
	</form>
	<?php else: ?>
		<div class="alert alert-danger"><strong>Heads Up!</strong> You don't have enough credit available to purchase this lead.</div>
	<?php endif;?>