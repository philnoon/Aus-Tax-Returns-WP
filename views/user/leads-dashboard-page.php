<div class="wrap lcp-content">

<?php
/* Personal Progress */
$profile_array = (array) $profileSubmitted;
$arraylength = count($profile_array);
$notNulls  = count( array_keys( $profile_array, !null));  
$completedperc = round(($notNulls)*100/($arraylength));
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
$incArraylength = count($income_array);
$incNotNulls  = count(array_keys( $income_array, !null));  
$incCompletedPerc = round(($incNotNulls-15)*100/($incArraylength),0);
$incBarProgress = "";

if ($incCompletedPerc <25) {
    $incBarProgress = 'progress-bar-danger';
} elseif ($incCompletedPerc >25 &&  $incCompletedPerc <61) {
    $incBarProgress = 'progress-bar-warning';
} elseif ($incCompletedPerc >61 && $incCompletedPerc <81) {
    $incBarProgress = 'progress-bar-info';
} elseif ($incCompletedPerc >81) {
	$incBarProgress = 'progress-bar-success';
}

/* Deductions Progress */
$deductions_array = (array) $deductionSubmitted;
$dedArraylength = count($deductions_array);
$dedNotNulls  = count(array_keys( $deductions_array, !null));  
$dedCompletedPerc = round(($dedNotNulls-14)*100/($dedArraylength),0);
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

?>
        <div class="row">        
        <div class="col-sm-12">
        	<!-- new starter -->        
        	<h3 style="color: #f2705d;"><img src="<?php echo site_url().'/wp-content/uploads/2016/10/ssas-logo-numbersx2.png'; ?>" width="60"/> Simple Solutions Accounting Services</h3>
        </div>
        
        <div class="col-sm-4">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-play"></i> Hi, <?php echo($profileSubmitted->user_nicename) ?>. Get Started Here</h3>
            </div>
            <div class="panel-body">            
            	
            	<h3><a href="<?php echo site_url(); ?>/wp-admin/admin.php?page=lcp_profile" class="btn btn-primary">Step 1: Personal profile <i class="fa fa-arrow-right"></i></a></h3>
            	
            	<h3><a href="<?php echo site_url(); ?>/wp-admin/admin.php?page=lodgement_income" class="btn btn-primary">Step 2: Income <i class="fa fa-arrow-right"></i></a></h3>
            	
            	<h3><a href="<?php echo site_url(); ?>/wp-admin/admin.php?page=lodgement_deductions" class="btn btn-primary">Step 3: Deductions <i class="fa fa-arrow-right"></i></a></h3>
            	
            	<!--<h3><a href="<?php echo site_url(); ?>/wp-admin/admin.php?page=lodgement_other" class="btn btn-primary">Step 4: Other Income Information <i class="fa fa-arrow-right"></i></a></h3> -->
            	
            	<h3><a href="<?php echo site_url(); ?>/wp-admin/admin.php?page=leads_overview" class="btn btn-primary">Step 4: Payment &amp; Submit <i class="fa fa-arrow-right"></i></a></h3>         

              	<p><a href="">Contact Us</a></p>
            </div>
          </div>
        </div>
        <!-- /.col-sm-4 -->
        <div class="col-sm-4">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-pencil-square-o"></i> Your <?php echo date("Y"); ?> Lodgement Progress</h3>
            </div>
            <div class="panel-body">              
              <p>Personal Profile</p>              
              <div class="progress">
                <div class="progress-bar <?php echo $barprogress; ?>" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?php echo $completedperc; ?>%;">
                  <?php echo $completedperc; ?>% Completed
                </div>
              </div>                            
              
              <p>Income</p>
              <div class="progress">
                <div class="progress-bar <?php echo $incBarProgress; ?>" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?php echo $incCompletedPerc; ?>%;">
                  <?php echo $incCompletedPerc; ?>% Completed
                </div>
              </div> 
                           
              <p>Deductions</p>
				<div class="progress">
				  <div class="progress-bar <?php echo $dedBarProgress; ?>" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?php echo $dedCompletedPerc; ?>%;">
				    <?php echo $dedCompletedPerc; ?>% Completed
				  </div>
				</div>                            
              
            </div>
          </div>
        </div>
        <!-- /.col-sm-4 -->
        <div class="col-sm-4">
          <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-money"></i> Returns</h3>
            </div>
            <div class="panel-body">
              <p><?php echo @$total_revenue; ?></p>
            </div>
          </div>
        </div>
        <!-- /.col-sm-4 -->
		</div>
</div>