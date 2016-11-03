<?php
	$options = get_option('lcp');
?>
<div class="wrap lcp-content">
	<h2><?php echo $page_title; ?></h2>	
	<!--
	*
	** This is a lodgement Payment change
	** Second Change
	*
	-->
	
	<?php if (isset($lead_paid_for)) : ?>
	<div class="updated">
		<p>Thank you, the lead has been purchased.</p>
	</div>
	<?php endif; ?>
	
	
	
	<?php if(!is_null($payment_results->transaction_reference)) : ?>
	
	<h2>Payment Details</h2>
	<table class="table">
		<tr>
			<td>Payment Provider</td>
			<td><?php echo ucfirst($payment_results->payment_provider); ?></td>
		</tr>
		<tr>
			<td valign="top">Payment Date</td>
			<td><?php echo $this->convert_date_to_format($payment_results->created_at, 'l dS F @ H:i:s'); ?></td>
		</tr>
		<tr>
			<td>Transaction Reference</td>
			<td><?php echo $payment_results->transaction_reference; ?></td>
		</tr>
		
	</table>
	<?php endif; ?>
	
	
	
	<?php
	if (!empty($_REQUEST)) {
	$product_transaction = $_REQUEST['tx']; // Paypal transaction ID
	$product_price = $_REQUEST['amt']; // Paypal received amount value
	$product_status = $_REQUEST['st']; // Paypal product status
	$execution->setPayerId($_GET['PayerID']);
	
	print_r('$product_transaction'.$product_transaction);
	print_r('$product_price'.$product_price);
	print_r('$product_status'.$product_status);
	print_r('$execution'.$execution);
	}
	
	
</div>