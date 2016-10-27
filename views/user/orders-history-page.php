<div class="wrap lcp-content">
	<h2><?php echo $page_title; ?></h2>
	<?php if ( count($results) > 0 ) : ?>
	<?php	
	
	foreach( $results as $forms )
	{
	?>	
	<table class="table">
		<thead>
		<tr>
			<th>#</th>
			<th>Date Added</th>
			<th></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($forms['leads'] as $lead) : ?>
			<tr>
				<td><?php echo $lead->id; ?></td>
				<td><?php echo $this->convert_date_to_format($lead->created_at, 'l dS F @ H:i:s'); ?></td>
				<td align="right"><a href="<?php echo admin_url(); ?>admin.php?page=lcp_leads&ref=<?php echo $lead->hash; ?>" class="button button-primary"><i class="fa fa-eye"></i> View</a></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php
	}
	?>
	<?php else: ?>
		<div class="update-nag">
			You have no orders in your history
		</div>
	<?php endif; ?>
</div>