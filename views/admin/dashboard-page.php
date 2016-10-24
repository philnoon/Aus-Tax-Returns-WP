<div class="wrap lcp-content admin-dashboard">
	<h1>Dashboard</h1>	
		
	<div class="row">
	<!-- /.col-sm-4 -->
	<div class="col-sm-4">
	  <div class="panel panel-warning">
	    <div class="panel-heading">
	      <h3 class="panel-title"><i class="fa fa-user"></i> Clients Registered</h3>
	    </div>
	    <div class="panel-body">
	      <p><?php echo $total_companies; ?></p>
	    </div>
	  </div>
	</div>
	<!-- /.col-sm-4 -->
	<div class="col-sm-4">
	  <div class="panel panel-warning">
	    <div class="panel-heading">
	      <h3 class="panel-title"><i class="fa fa-pencil-square-o"></i> Lodgements</h3>
	    </div>
	    <div class="panel-body">
	      <p><?php echo $total_leads; ?></p>
	    </div>
	  </div>
	</div>
	<!-- /.col-sm-4 -->
	<div class="col-sm-4">
	  <div class="panel panel-warning">
	    <div class="panel-heading">
	      <h3 class="panel-title"><i class="fa fa-money"></i> Sales Revenue</h3>
	    </div>
	    <div class="panel-body">
	      <p><?php echo $total_revenue; ?></p>
	    </div>
	  </div>
	</div>
	<!-- /.col-sm-4 -->
	</div>
	
	
	<div class="row">	
	<!-- /.col-sm-6 -->
	<div class="col-sm-12">
	  <div class="panel panel-info">
	    <div class="panel-heading">
	      <h3 class="panel-title"><i class="fa fa-user"></i> New Clients</h3>
	    </div>
	    <div class="panel-body">
	    <!-- -->	    
	    	<?php if(count($company_results)!=0) : ?>
	    	<table class="table">
	    		<thead>
	    		<tr>
	    			<th>#</th>
	    			<th>Title</th>
	    			<th>Name</th>
	    			<th>Company Name</th>
	    			<th>Status</th>
	    			<th>Payments</th>
	    			<th>Date Created</th>
	    			<th></th>
	    		</tr>
	    		</thead>
	    		<tbody>
	    		<?php foreach ($company_results as $company) : ?>
	    		<tr>
	    		<td><?php echo $company->id; ?></td>
	    		<td><?php echo $company->salutation; ?></td>
	    		<td><?php echo $company->first_name .' '. $company->last_name; ?></td>
	    		<td><?php echo $company->company_name; ?></td>
	    		<td><span class="pill pill-<?php echo $company->status; ?>"><?php echo $company->status; ?></span></td>
	    		<td>$$</td>
	    		<td><?php echo $this->convert_date_to_format($company->created_at, 'l dS F @ H:i:s'); ?></td>
	    		<td>
	    		<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_companies&id=<?php echo $company->user_id; ?>" class="btn btn-info">Personal Profile</a>
	    		<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_income_details&id=<?php echo $company->user_id; ?>" class="btn btn-info">Income</a>
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
	    <!-- -->
	    </div>
	  </div>
	</div>
	</div>
	
	
	<!-- /.col-sm-6 -->
	<!-- /.col-sm-6 -->
	<div class="row">
	<div class="col-sm-12">
	  <div class="panel panel-info">
	    <div class="panel-heading">
	      <h3 class="panel-title"><i class="fa fa-pencil-square-o"></i> Lodgements Pending</h3>
	    </div>
	    <div class="panel-body">
	    <!-- -->
	    <?php if(count($results)!=0) : ?>
	    	<?php
	    	foreach( $results as $forms )
	    	{
	    	?>
	    	<table class="table table-striped">
	    		<thead>
	    		<tr>
	    			<th width="6%">#</th>
	    			<th width="20%"><?php echo $forms['sample1'];?></th>
	    			<th width="15%"><?php echo $forms['sample2'];?></th>
	    			<th width="15%">Date Added</th>
	    			<th width="15%"></th>
	    		</tr>
	    		</thead>
	    		<tbody>
	    		<?php foreach ($forms['leads'] as $lead) : ?>
	    			<tr>
	    				<td><?php echo $lead->id; ?></td>
	    				<td><?php echo $lead->sample1; ?></td>
	    				<td><?php echo $lead->sample2; ?></td>
	    				<td><?php echo $this->convert_date_to_format($lead->created_at, 'l dS F @ H:i:s'); ?></td>
	    				<td align="right">
	    					<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_dashboard&ref=<?php echo $lead->hash; ?>&type=lead&reject=1" class="button button-warning"><i class="fa fa-thumbs-o-down"></i></a>&nbsp;
	    					<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_dashboard&ref=<?php echo $lead->hash; ?>&type=lead&approve=1" class="button button-success"><i class="fa fa-thumbs-o-up"></i></a>
	    					<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_leads_edit&ref=<?php echo $lead->hash; ?>" class="button button-default"><i class="fa fa-pencil"></i></a>
	    					<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_leads&ref=<?php echo $lead->hash; ?>" class="button button-primary"><i class="fa fa-eye"></i></a>
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
	    		There are no new lodgements
	    	</div>
	    	<?php endif; ?>
	    <!-- --> 
	    </div>
	  </div>
	</div>	
	<!-- /.col-sm-6 -->
	</div>


</div>