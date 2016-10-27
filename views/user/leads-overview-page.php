<div class="wrap lcp-content">
	
	<h2><?php echo $page_title; ?></h2>
	
	<?php if(count($results)>0) : ?>
	<?php
	/*foreach( $results as $forms )
	{
	print_r($forms);*/
	
	?>		
	<table class="table">
		<thead>
		<tr>
			<th>#</th>
			<th>Company Id</th>				
			<th>Income Id</th>
			<th>Deduction Id</th>
			<th>Order Id</th>
			<th>Price (<?php echo $this->options->get('global', 'lcp_currency_accepted') ?>)</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($results as $lead) : ?>
			<?php if($this->availability($lead->id) > 0 ) : ?>
			
			<tr>				
				<td><?php echo $lead->id; ?></td>
				<td><?php echo $lead->company_id; ?></td>				
				<td><?php echo $lead->income_id; ?></td>
				<td><?php echo $lead->deductions_id; ?></td>				
				<td><?php //echo $this->availability($lead->id); ?></td>
				<?php 
					if ($this->options->get('global', 'lcp_payment_gateway') == 'stripe'){
						$price = sprintf('%.2f', $this->options->get('global', 'lcp_lead_price') / 100);
					} else {
						$price = $this->options->get('global', 'lcp_companies');
					}
				?>
				<td><?php echo $price ?></td>
				<td><a href="<?php echo admin_url(); ?>admin.php?page=lcp_leads&ref=<?php echo $lead->hash; ?>" class="button button-primary">Pay Now</a></td>
			</tr>
			<?php endif; ?>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php
	//}
	?>
	<?php else: ?>
		<div class="update-nag">
			There are no lodgements submitted
		</div> 
	<?php endif; ?>
	
	<!-- start
	<h4>This will display the current lodged tax return</h4>
	<p>The status of it</p>
	<p>Notice/message from the admin</p>
	<p>Summary of the main tax lodgement</p>
	-->
	<!-- end -->
	
</div>