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
	

	<table class="table">
		<tr>
			<td>Order Reference</td>
			<td><?php echo $payment_results->lead_id; ?></td>
		</tr>
		<tr>
			<td>Price (<?php echo $options['global']['lcp_currency_accepted']; ?>)</td>
			<td>
			<?php
				if ($this->options->get('global','lcp_payment_gateway') == 'stripe'){
					$price = sprintf('%.2f', $this->options->get('global','lcp_lead_price') / 100);
				} else {
					$price = $this->options->get('global','lcp_lead_price');
				}

				echo $price;
			?>
			</td>
		</tr>
		<tr>
			<td>Date Submitted</td>
			<td><?php echo $this->convert_date_to_format($lead->created_at, 'l dS F @ H:i:s'); ?></td>
		</tr>
		
		<?php if(is_null($payment_results)) : ?>
		<tr>
			<td>
				<a href="<?php echo admin_url(); ?>admin.php?page=lcp_leads" class="button button-primary">Back</a>
			</td>
			<td>
				<?php
					include dirname(__FILE__).'/../partials/payment_gateways/'.$options['global']['lcp_payment_gateway'].'.php';
				?>
			</td>			
		</tr>
		
		<tr>
		<td>				
			<form action="" method="post" target="_top">
			 <input type="submit" value="Submit">
			</form>
		</td>
		</tr>		
		<?php endif; ?>
	</table>
	
	
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
		<tr>
			<td>
				<a href="<?php echo admin_url(); ?>admin.php?page=lcp_leads" class="button button-primary">Back</a>
			</td>
		</tr>
	</table>
	<?php endif; ?>
</div>