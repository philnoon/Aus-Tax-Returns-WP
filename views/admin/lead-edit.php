<div class="wrap lcp-content">
	<h2>Edit Lodgement - Reference: <?php echo $lead->id; ?></h2>

	<?php if ($updated === TRUE) : ?>
	<div class="alert alert-success">
		<strong>Excellent!</strong> The lodgement was updated
	</div>
	<?php endif; ?>

	<form action="?page=lcp_admin_leads_edit&ref=<?php echo $lead->hash; ?>" method="post" class="lcp-form">
		<input type="hidden" name="__lcp_form_id" value="<?php echo $lead->form_id;?>" />
		<table class="table">
<?php
echo $form_elements;
?>		
			<tr>
				<td>Status</td>
				<td>
					<select name="status" id="status">
						<option value="pending" <?php if($lead->status=='pending'){ echo "selected"; } ?>>Pending</option>
						<option value="approved" <?php if($lead->status=='approved'){ echo "selected"; } ?>>Approved</option>
						<option value="rejected" <?php if($lead->status=='rejected'){ echo "selected"; } ?>>Rejected</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_leads" class="button button-primary">Back</a>&nbsp;</td>
				<td>
					<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_dashboard&ref=<?php echo $lead->hash; ?>&type=lead&delete=1" class="button button-danger button-delete"><i class="fa fa-trash-o"></i> Delete</a>&nbsp;
					<input type="submit" name="Submit" class="button button-success" /> <span>(* Denotes required information)</span>
				</td>
			</tr>
		</table>
	</form>
</div>