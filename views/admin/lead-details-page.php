<div class="wrap lcp-content">
	<h2>Lodgement Details</h2>
	<table class="table">
		<tr>
			<td>Order Reference</td>
			<td><?php echo $lead->id; ?></td>
		</tr>
<?php
foreach( $data as $row )
{
?>
		<tr>
			<td><?php echo $row['label'];?></th>
			<td><?php echo $row['data'];?></td>
		</tr>
<?php	
}
?>
		<tr>
			<td>Date Submitted</td>
			<td><?php echo $this->convert_date_to_format($lead->created_at, 'l dS F @ H:i:s'); ?></td>
		</tr>
		<tr>
			<td>
				<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_leads" class="button button-primary">Back</a>&nbsp;
			</td>
			<td>
				<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_dashboard&ref=<?php echo $lead->hash; ?>&type=lead&delete=1" class="button button-danger button-delete"><i class="fa fa-trash-o"></i> Delete</a>&nbsp;
				<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_dashboard&ref=<?php echo $lead->hash; ?>&type=lead&reject=1" class="button button-warning"><i class="fa fa-thumbs-o-down"></i> Reject</a>&nbsp;
				<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_leads_edit&ref=<?php echo $lead->hash; ?>" class="button button-default"><i class="fa fa-pencil"></i> Edit</a>
				<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_dashboard&ref=<?php echo $lead->hash; ?>&type=lead&approve=1" class="button button-success"><i class="fa fa-thumbs-o-up"></i> Approve</a>
			</td>
		</tr>
	</table>

	<?php if (sizeof($history)>0) : ?>
	<h2>Purchase Details</h2>
	<table class="table">
		<tr>
			<th>Company</th>
			<th>Payment Provider</th>
			<th>Payment Date</th>
			<th>Transaction Reference</th>
		</tr>
		<?php foreach($history as $order) : ?>
		<tr>
			<td><?php echo ucfirst($order->company_name); ?></td>
			<td><?php echo ucfirst($order->payment_provider); ?></td>
			<td><?php echo $this->convert_date_to_format($order->created_at, 'l dS F @ H:i:s'); ?></td>
			<td><?php echo ucfirst($order->transaction_reference); ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
</div>