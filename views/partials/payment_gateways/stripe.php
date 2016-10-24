<?php

	// Set the mode that stripe in is
	$options 	= get_option('lcp');
	$mode 		= $options['stripe']['lcp_stripe_mode'];
	$currency 	= $options['global']['lcp_currency_accepted'];
	$price 		= $options['global']['lcp_lead_price'];

	// Get the Stripe keys based on the mode we are running in
	if ( $mode=='live' ) {
		$secret_key 		= $options['stripe']['lcp_stripe_api_live_secret_key'];
		$publishable_key 	= $options['stripe']['lcp_stripe_api_live_publishable_key'];
	} else {
		$secret_key 		= $options['stripe']['lcp_stripe_api_test_secret_key'];
		$publishable_key 	= $options['stripe']['lcp_stripe_api_test_publishable_key'];
	}

?>

<?php if ($mode=='test') : ?>
<div class="alert alert-danger"><strong>Heads Up!</strong> Stripe is in TEST mode</div>
<div class="payment-errors"></div>
<?php endif; ?>
<form action="" method="POST" id="payment-form">

	<script
		src="https://checkout.stripe.com/checkout.js"
		class="stripe-button"
		data-currency="<?php echo $currency; ?>"
		data-key="<?php echo $publishable_key; ?>"
		data-amount="<?php echo $price; ?>"
		data-name="<?php echo get_bloginfo('name'); ?>"
		data-description="Lead Reference: <?php echo $lead->id; ?>"
	</script>

	<script type="text/javascript">

		Stripe.setPublishableKey("<?php echo $publishable_key; ?>");

		$('#payment-form').submit(function(event) {
			var $form = $(this);

			if (response.error) {
				$form.find('.payment-errors').text(response.error.message);
				$form.find('button').prop('disabled', false);
			} else {
				var token = response.id;
				$form.append($('<input type="hidden" name="stripeToken" />').val(token));
				$form.get(0).submit();
			}

		});

	</script>

</form>