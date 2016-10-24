<div class="wrap lcp-content">
	<h2>Edit Client</h2>

	<?php if ($updated === TRUE) : ?>
	<div class="alert alert-success">
		<strong>Excellent!</strong> The client was updated
	</div>
	<?php endif; ?>

	<?php if ($validated === FALSE) : ?>
	<div class="alert alert-danger">
		<strong>Oops!</strong> Please complete all the required form fields
	</div>
	<?php endif; ?>

	<form action="?page=lcp_admin_company_edit&id=<?php echo $company->id; ?>" method="post" class="lcp-form">
		<table class="table">
			<tr>
				<td>Title *</td>
				<td>
					<select name="salutation_id" id="salutation_id">
						<option value="null">-- Please Select --</option>
						<option value="1" <?php if($company->salutation_id=='1'){ echo "selected"; } ?>>Mr</option>
						<option value="2" <?php if($company->salutation_id=='2'){ echo "selected"; } ?>>Mrs</option>
						<option value="3" <?php if($company->salutation_id=='3'){ echo "selected"; } ?>>Miss</option>
						<option value="4" <?php if($company->salutation_id=='4'){ echo "selected"; } ?>>Ms</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Firstname *</td>
				<td><input type="text" name="first_name" value="<?php echo $company->first_name; ?>" /></td>
			</tr>
			<tr>
				<td>Surname *</td>
				<td><input type="text" name="lastname" value="<?php echo $company->last_name; ?>" /></td>
			</tr>
			<tr>
				<td>Company *</td>
				<td><input type="text" name="company_name" value="<?php echo $company->company_name; ?>" placeholder="" /></td>
			</tr>
			<tr>
				<td>Company Number</td>
				<td><input type="text" name="company_number" value="<?php echo $company->company_number; ?>" placeholder="" /></td>
			</tr>
			<tr>
				<td>Address *</td>
				<td><input type="text" name="address" value="<?php echo $company->address; ?>" placeholder="" /></td>
			</tr>
			<tr>
				<td>Address Line 2</td>
				<td><input type="text" name="address2" value="<?php echo $company->address2; ?>" placeholder="" /></td>
			</tr>
			<tr>
				<td>Town *</td>
				<td><input type="text" name="town" value="<?php echo $company->town; ?>" placeholder="" /></td
			</tr>	
			<tr>
				<td>County *</td>
				<td><input type="text" name="county" value="<?php echo $company->county; ?>" placeholder="" /></td>
			</tr>
			<tr>
				<td>Postcode *</td>
				<td><input type="text" name="postcode" value="<?php echo $company->postcode; ?>" placeholder="" /></td>
			</tr>
			<tr>
				<td>Company Description *</td>
				<td><textarea name="company_description"><?php echo $company->company_description; ?></textarea></td>
			</tr>
			<?php if ($is_on_account) : ?>
			<tr>
				<td>Credit Limit:</td>
				<td><input type="text" name="credit_limit" value="<?php echo $company->credit_limit; ?>" placeholder="100.00" /></td>
			</tr>
			<?php endif; ?>
			<tr>
				<td>Phone *</td>
				<td><input type="text" name="phone" value="<?php echo $company->phone; ?>" placeholder="" /></td>
			</tr>
			<tr>
				<td>Mobile Phone *</td>
				<td><input type="text" name="alt_phone" value="<?php echo $company->alt_phone; ?>" placeholder="" /></td>
			</tr>
			<tr>
				<td>Website Address *</td>
				<td><input type="text" name="website" value="<?php echo $company->website; ?>" placeholder="" /></td>
			</tr>
			<tr>
				<td>Approximate service range *</td>
				<td>
					<select name="service_range">
						<option value="9" <?php if($company->service_range=='9'){ echo "selected"; } ?>>Less than 10 miles</option>
						<option value="10" <?php if($company->service_range=='10'){ echo "selected"; } ?>>Upto 10 miles</option>
						<option value="25" <?php if($company->service_range=='25'){ echo "selected"; } ?>>Upto 25 miles</option>
						<option value="50" <?php if($company->service_range=='50'){ echo "selected"; } ?>>Upto 50 miles</option>
						<option value="100" <?php if($company->service_range=='100'){ echo "selected"; } ?>>Upto 100 miles</option>
						<option value="101" <?php if($company->service_range=='101'){ echo "selected"; } ?>>Over 100 miles</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Status</td>
				<td>
					<select name="status" id="status">
						<option value="pending" <?php if($company->status=='pending'){ echo "selected"; } ?>>Pending</option>
						<option value="approved" <?php if($company->status=='approved'){ echo "selected"; } ?>>Approved</option>
						<option value="rejected" <?php if($company->status=='rejected'){ echo "selected"; } ?>>Rejected</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_companies" class="button button-primary">Back</a>&nbsp;</td>
				<td>
					<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_dashboard&id=<?php echo $company->id; ?>&type=company&delete=1" class="button button-danger button-delete"><i class="fa fa-trash-o"></i> Delete</a>&nbsp;
					<input type="submit" name="Submit" class="button button-success" /> <span>(* Denotes required information)</span>
				</td>
			</tr>
		</table>
	</form>
</div>