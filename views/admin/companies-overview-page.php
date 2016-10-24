<div class="wrap lcp-content">
	<h2>Clients - Admin</h2>
	<?php if(count($results)!=0) : ?>
	<table class="table">
		<thead>
		<tr>
			<th>#</th>
			<th>Title</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Company Name</th>
			<!-- <th>User</th> -->
			<th>Status</th>
			<th>Date Created</th>
			<th></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($results as $company) : ?>
		<tr>
		<td><?php echo $company->id; ?></td>
		<td><?php echo $company->salutation; ?></td>
		<td><?php echo $company->first_name; ?></td>
		<td><?php echo $company->last_name; ?></td>
		<td><?php echo $company->company_name; ?></td>
		<td><span class="pill pill-<?php echo $company->status; ?>"><?php echo $company->status; ?></span></td>
		<td><?php echo $this->convert_date_to_format($company->created_at, 'l dS F @ H:i:s'); ?></td>
		<td>
		<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_companies&id=<?php echo $company->user_id; ?>" class="btn btn-info">Personal Profile</a>
		<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_income_details&id=<?php echo $company->user_id; ?>" class="btn btn-info">Income Lodgement</a>
		<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_deductions_details&id=<?php echo $company->user_id; ?>" class="btn btn-info">Deductions</a>
		<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_otherinfo_details&id=<?php echo $company->user_id; ?>" class="btn btn-info">Other Income</a>
		<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_document_details&id=<?php echo $company->user_id; ?>" class="btn btn-info">Documents</a>
		</td>
		</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php else: ?>
	<div class="update-nag">
		There are no new companies
	</div>
	<?php endif; ?>
</div>