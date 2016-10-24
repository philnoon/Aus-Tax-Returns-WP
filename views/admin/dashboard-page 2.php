<div class="wrap lcp-content admin-dashboard">
	<h1>Dashboard</h1>	
	
<!--
	<?php
	/* Personal Progress */
	$profile_array = (array) $profileSubmitted;
	$nulls  = count( array_keys( $profile_array, "" ));   
	$arrayfields  = count( array_keys( $profile_array ));
	$dataentrydone = $nulls;
	$completedperc = 100 - $dataentrydone;
	$barprogress = "";
	
	if ($completedperc <25) {
	    $barprogress = 'progress-bar-danger';
	} elseif ($completedperc >25 &&  $completedperc <61) {
	    $barprogress = 'progress-bar-warning';
	} elseif ($completedperc >61 && $completedperc <81) {
	    $barprogress = 'progress-bar-info';
	} elseif ($completedperc >81) {
		$barprogress = 'progress-bar-success';
	}
	
	/* Income Progress */
	$income_array = (array) $incomeSubmitted;
	$nulls  = count( array_keys( $income_array, "" ));   
	$incArrayFields  = count( array_keys( $income_array ));
	$incDataEntrydone = $nulls;
	$incCompletedPerc = 100 - $incDataEntrydone;
	$incBarProgress = "";
	
	if ($incCompletedPerc <25) {
	    $incBarProgress = 'progress-bar-danger';
	} elseif ($completedperc >25 &&  $incCompletedPerc <61) {
	    $incBarProgress = 'progress-bar-warning';
	} elseif ($incCompletedPerc >61 && $incCompletedPerc <81) {
	    $incBarProgress = 'progress-bar-info';
	} elseif ($incCompletedPerc >81) {
		$incBarProgress = 'progress-bar-success';
	}
	
	/* Deductions Progress */
	$deductions_array = (array) $deductionSubmitted;
	$nulls  = count( array_keys( $deductions_array, "" ));   
	$dedArrayFields  = count( array_keys( $deductions_array ));
	$dedDataEntrydone = $nulls;
	$dedCompletedPerc = 100 - $dedDataEntrydone;
	$dedBarProgress = "";
	
	if ($dedCompletedPerc <25) {
	    $dedBarProgress = 'progress-bar-danger';
	} elseif ($dedCompletedPerc >26 &&  $dedCompletedPerc <61) {
	    $dedBarProgress = 'progress-bar-warning';
	} elseif ($dedCompletedPerc >61 && $dedCompletedPerc <81) {
	    $dedBarProgress = 'progress-bar-info';
	} elseif ($dedCompletedPerc >81) {
		$dedBarProgress = 'progress-bar-success';
	}
	
	/* Otherinfo Progress */
	$otherinfo_array = (array) $otherinfoSubmitted;
	$nulls  = count( array_keys( $otherinfo_array, "" ));   
	$otherArrayFields  = count( array_keys( $otherinfo_array ));
	$otherDataEntrydone = $nulls;
	$otherCompletedPerc = 100 - $otherDataEntrydone;
	$otherBarProgress = "";
	
	if ($otherCompletedPerc <25) {
	    $otherBarProgress = 'progress-bar-danger';
	} elseif ($otherCompletedPerc >26 &&  $otherCompletedPerc <61) {
	    $dedBarProgress = 'progress-bar-warning';
	} elseif ($otherCompletedPerc >61 && $otherCompletedPerc <81) {
	    $otherBarProgress = 'progress-bar-info';
	} elseif ($otherCompletedPerc >81) {
		$otherBarProgress = 'progress-bar-success';
	}
	?>
-->
	
	<div class="row">
	<!-- /.col-sm-4 -->
	<div class="col-sm-4">
	  <div class="panel panel-success">
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
	    	<div class="table-responsive">
	    	<table class="table table-condensed table-hover">
	    		<thead>
	    		<tr>
	    			<th>Name</th>
	    			<th>Company Name</th>
	    			<th>Date Added</th>
	    			<th>Status</th>
	    			<th>Payments</th>
	    			<th></th>
	    			<th>Personal Profile Progress</th>
	    			<th>Income Progress</th>
	    			<th>Deductions Progress</th>
	    			<th>Other Information Progress</th>
	    			<th>Document/Evidence Progress</th>
	    		</tr>
	    		</thead>
	    		<tbody>
	    		<?php foreach ($company_results as $company) : ?>
	    			<tr>
	    				<td><?php echo $company->first_name.' '.$company->last_name; ?></td>
	    				<td><?php echo $company->company_name; ?></td>
	    				<td><?php echo $this->convert_date_to_format($company->created_at, 'l dS F @ H:i:s'); ?></td>
	    				<td>%</td>
	    				<td>$$</td>
	    				<td>
	    				<p><a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_otherinfo_details&id=<?php echo $company->user_id; ?>" class="btn btn-warning"><i class="fa fa-ban"></i> Reject</a></p>
	    				
	    				<p><a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_otherinfo_details&id=<?php echo $company->user_id; ?>" class="btn btn-danger"><i class="fa fa-times"></i> Delete</a></p>
	    				</td>
	    				<td>
	    				<div class="progress">
	    				  <div class="progress-bar <?php echo $barprogress; ?>" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?php echo $completedperc; ?>%;">
	    				    <?php echo $completedperc; ?>% Completed
	    				  </div>
	    				</div>	    				
	    				<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_companies&id=<?php echo $company->user_id; ?>" class="btn btn-info"><i class="fa fa-eye"></i> Personal Profile</a>	    					    				
	    				</td>
	    				<td>
	    				<div class="progress">
	    				  <div class="progress-bar <?php echo $incBarProgress; ?>" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?php echo $incCompletedPerc; ?>%;">
	    				    <?php echo $incCompletedPerc; ?>% Completed
	    				  </div>
	    				</div>
	    				<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_income_details&id=<?php echo $company->user_id; ?>" class="btn btn-info"><i class="fa fa-eye"></i> Income Lodgement</a>
	    				</td>
	    				<td>
	    				<div class="progress">
	    				  <div class="progress-bar <?php echo $dedBarProgress; ?>" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?php echo $dedCompletedPerc; ?>%;">
	    				    <?php echo $dedCompletedPerc; ?>% Completed
	    				  </div>
	    				</div>
	    				<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_deductions_details&id=<?php echo $company->user_id; ?>" class="btn btn-info"><i class="fa fa-eye"></i> Deductions</a>
	    				</td>
	    				<td>
	    				<div class="progress">
	    				  <div class="progress-bar <?php echo $otherBarProgress; ?>" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?php echo $otherCompletedPerc; ?>%;">
	    				    <?php echo $otherCompletedPerc; ?>% Completed
	    				  </div>
	    				</div>
	    				<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_otherinfo_details&id=<?php echo $company->user_id; ?>" class="btn btn-info"><i class="fa fa-eye"></i> Other Income</a>
	    				</td>
	    				<td>
	    				<div class="progress">
	    				  <div class="progress-bar <?php echo $otherBarProgress; ?>" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?php echo $otherCompletedPerc; ?>%;">
	    				    <?php echo $otherCompletedPerc; ?>% Completed
	    				  </div>
	    				</div>
	    				<a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_otherinfo_details&id=<?php echo $company->user_id; ?>" class="btn btn-info"><i class="fa fa-usd"></i> Payment Details</a>
	    				</td>
	    			</tr>	    			
	    		<?php endforeach; ?>
	    		</tbody>
	    	</table>
	    	</div>
	    	<?php else: ?>
	    	<div class="update-nag">
	    		There are no new clients
	    	</div>
	    	<?php endif; ?>
	    <!-- -->
	    </div>
	  </div>
	</div>
	</div>
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