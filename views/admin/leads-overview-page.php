<div class="wrap lcp-content">
	<h2>Lodgements - Admin</h2>
	<?php if(count($results)>0) : ?>
	<?php
	foreach( $results as $forms )
	{
	?>
	<table class="table">
		<thead>
		<tr>
			<th>#</th>
			<th><?php echo $forms['sample1'];?></th>
			<th><?php echo $forms['sample2'];?></th>
			<th>Status</th>
			<th>Date Added</th>
			<th></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($forms['leads'] as $lead) : ?>

			<tr>
				<td><?php echo $lead->id; ?></td>
				<td><?php echo $lead->sample1; ?></td>
				<td><?php echo $lead->sample2; ?></td>
				<td><span class="pill pill-<?php echo $lead->status; ?>"><?php echo $lead->status; ?></span></td>
				<td><?php echo $this->convert_date_to_format($lead->created_at, 'l dS F @ H:i:s'); ?></td>
				<td align="right">
					<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_leads_edit&ref=<?php echo $lead->hash; ?>" class="button button-default"><i class="fa fa-pencil"></i> Edit</a>
					<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_leads&ref=<?php echo $lead->hash; ?>" class="button button-primary"><i class="fa fa-eye"></i> View</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php
	}
	?>
	<?php else: ?>
	<div class="update-nag">
		There are no lodgements in the system
	</div>
	<?php endif; ?>
</div>