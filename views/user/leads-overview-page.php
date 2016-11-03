<div class="wrap lcp-content">
	
	<h2><?php echo $page_title; ?></h2>
	
	<?php if(count($results)>0) : ?>
		
	<table class="table">
		<thead>
		<tr>
			<th>#</th>
			<th>Company Id</th>				
			<th>Created</th>
			<th>Price</th>
			<th></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($results as $lead) : ?>
			
			<tr>				
				<td><?php echo $lead->id; ?></td>
				<td></td>
				<td><?php echo $lead->created_at; ?></td>									
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
				<td><a href="<?php echo admin_url(); ?>admin.php?page=lcp_leads&ref=<?php echo $lead->hash; ?>" class="button button-primary">Pay Now</a></td>
				
				<td>
				<?php
					include dirname(__FILE__).'/../partials/payment_gateways/'.$options['global']['lcp_payment_gateway'].'.php';
				?>
				</td>
				
			</tr>
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