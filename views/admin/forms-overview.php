<div class="wrap lcp-content">
	<h1>Forms</h1>
	
	<?php if ( isset( $form_created ) && $form_created === TRUE ) : ?>
	<div class="alert alert-success">
		<strong>Excellent!</strong> The form was added
	</div>
	<?php endif; ?>	
	
	<h2>Lead Capture Forms</h2>
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Form Name</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach( $forms as $form ) : ?>
			<tr>
				<td><?php echo $form->id; ?></td>
				<td><?php echo $form->name; ?></td>
				<td align="right">
					<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_form_edit&ref=<?php echo $form->id; ?>" class="button button-default"><i class="fa fa-pencil"></i> Edit</a>
					<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_form_view&ref=<?php echo $form->id; ?>" class="button button-primary"><i class="fa fa-eye"></i> View</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="3"><a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_form_add" class="button button-success pull-right">Add New</a></td>
			</tr>
		</tfoot>
	</table>
</div>