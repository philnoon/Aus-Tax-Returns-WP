<div class="wrap lcp-content">

<h2><?php echo $page_title; ?></h2>

<?php if (@$message) : ?>
    <p class="text-center alert alert-success" role="alert"><?php echo $message; ?></p>
<?php endif; ?>

<!--
<form class="income" action="" method="post" enctype="multipart/form-data">

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group pull-right">
                <input type="submit" class="btn btn-success update" name="op" value="Save">		
                <a href="#" class="btn btn-default openall">Expand All</a>			
            </div>
        </div>
    </div>
-->
    <?php
	//print_r(@$incomeOther);
	//get user's username
	//$user_data =  get_userdata( $user_ID );	
	//$plugin_dir = plugin_dir_path( __FILE__ );
	//plugin_dir_path( __FILE__ )
	//get_site_url();
	//plugin_dir_url($file)
	//echo plugins_url().'/lead-capture-pro/client-docs/'.$user_data->user_login.'/otherinfo/'.@$incomeOther->icm_payg_summary_docs;
	//$username = $user_data->user_login;
	//echo $username;
    ?>	

    <div class="panel panel-default">		
        <div class="panel-heading">
            <h3 class="panel-title">Income Information</h3>
        </div>

        <div class="panel-body">

            <!-- Did you earn a salary or wage? section -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">

                        <?php
                        $currentyr = date("Y");
                        $finyr = ($currentyr) - 1;
                        ?>

                        <label>Income lodgement tax year <?php echo $finyr . '/' . $currentyr; ?></label> 
                        <label class="radio-inline">
                            <input type="radio" class="has-div-to-show" value="yes" name="othr_current_fin_yr" <?php if (@$incomeOther->othr_current_fin_yr == "yes") {
                            echo "checked";          } ?>> No
                        </label>
                        <label class="radio-inline">							
                            <input type="radio" class="has-div-to-show" value="no" name="othr_current_fin_yr" <?php if (@$incomeOther->othr_current_fin_yr == "no" || @$incomeOther->othr_current_fin_yr == "") {
                            echo "checked";            } ?>> Yes
                        </label>

                        <div class="hidden to-show">
                            <div class="row">
                                <div class="col-sm-3">				
                                    <input type="text" class="form-control" name="othr_current_fin_yr" id="" value="<?php echo @$incomeOther->othr_current_fin_yr; ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>	
            </div>

        </div>
    </div>



    <!-- start -->
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        1. Private health insurance</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">

                    <!-- Did you earn a salary or wage? section -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Did you and your spouse and all your dependents have private health insurance for the whole year?</label> 
                                <label class="radio-inline">
                                    <input type="radio" class="has-div-to-show" name="othr_prvt_hlth_insr_whl_yr_q" value="yes" <?php if (@$incomeOther->othr_prvt_hlth_insr_whl_yr_q == "yes") {
                            echo "checked";           } ?>> Yes								
                                </label>
                                <label class="radio-inline">							
                                    <input type="radio" class="has-div-to-show" name="othr_prvt_hlth_insr_whl_yr_q" value="no" <?php if (@$incomeOther->othr_prvt_hlth_insr_whl_yr_q == "no" || @$incomeOther->othr_prvt_hlth_insr_whl_yr_q == "") {
                            echo "checked";            } ?>> No
                                </label>				

                                <div class="hidden to-show">      				

                                    <div class="row wages">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="text-center">Name of Fund</label><br>
                                                <input type="text"  class="form-control" name="othr_prvt_hlth_insr_nme" id="" value="<?php echo @$incomeOther->othr_prvt_hlth_insr_nme; ?>" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="text-center">Member Number</label><br>
                                                <input type="text"  class="form-control" name="othr_prvt_hlth_insr_mbr_num" id="" value="<?php echo @$incomeOther->othr_prvt_hlth_insr_mbr_num; ?>" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row wages">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="text-center">Premiums Paid</label>
                                                <input type="text"  class="form-control" name="othr_prvt_hlth_insr_prem_pd" id="" value="<?php echo @$incomeOther->othr_prvt_hlth_insr_prem_pd; ?>" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="text-center">Rebate Received</label>
                                                <input type="text"  class="form-control" name="othr_prvt_hlth_insr_rbt_recvd" id="" value="<?php echo @$incomeOther->othr_prvt_hlth_insr_rbt_recvd; ?>" placeholder="">
                                            </div>
                                        </div>      					
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="text-center">Rebate Percentage</label>
                                                <input type="text"  class="form-control" name="othr_prvt_hlth_insr_rbt_pcnt" id="" value="<?php echo @$incomeOther->othr_prvt_hlth_insr_rbt_pcnt; ?>" placeholder="">
                                            </div>
                                        </div>
                                    </div>      					

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="control-label">Attach PAYG Summary File</label>							
                                            <input id="othr_prvt_hlth_insr_docs" type="file" class="file" name="othr_prvt_hlth_insr_docs">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">					
                                         <br />
                                         <p>Uploaded file: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/otherinfo/' . @$incomeOther->othr_prvt_hlth_insr_docs; ?>"> <?php echo @$incomeOther->othr_prvt_hlth_insr_docs; ?></a></p>
                                        </div>				
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>	
                </div>	

            </div>
        </div>
    </div>
    <!-- -->

    <!-- -->
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    2. Superannuation contributions
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Did you make superannuation contributions on behalf of your spouse?</label> 
                            <label class="radio-inline">
                                <input type="radio" class="has-div-to-show" name="othr_spr_cont_spuce_q" value="yes" <?php if (@$incomeOther->othr_spr_cont_spuce_q == "yes") {
                            echo "checked";} ?>> Yes								
                            </label>
                            <label class="radio-inline">							
                                <input type="radio" class="has-div-to-show" name="othr_spr_cont_spuce_q" value="no" <?php if (@$incomeOther->othr_spr_cont_spuce_q == "no" || @$incomeOther->othr_spr_cont_spuce_q == "") {echo "checked";} ?>> No
                            </label>				

                            <div class="hidden to-show">				

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="">Amount</label><br>
                                            <input type="text" name="othr_spr_cont_spuce_amnt" class="form-control" value="<?php echo @$incomeOther->othr_spr_cont_spuce_amnt; ?>">
                                        </div>

                                    </div>
                                </div>									
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- -->

    <!-- -->
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    3. Remote Australia</a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">			
                            <label>Did you live in a remote area of Australia?</label>
                            <label class="radio-inline">
                                <input type="radio" class="has-div-to-show" name="othr_lve_remt_aus_q" value="yes" <?php if (@$incomeOther->othr_lve_remt_aus_q == "yes") {
                            echo "checked";} ?>> Yes								
                            </label>
                            <label class="radio-inline">							
                                <input type="radio" class="has-div-to-show" name="othr_lve_remt_aus_q" value="no" <?php if (@$incomeOther->othr_lve_remt_aus_q == "no" || @$incomeOther->othr_lve_remt_aus_q == "") {echo "checked";} ?>> No
                            </label>							
                            <div class="hidden to-show">      							
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="text-center">Date Received From</label><br>
                                            <div class='input-group date' id='othr_lve_remt_aus_dt_frm'>
                                                <input type='text' class="form-control datepicker" name="othr_lve_remt_aus_dt_frm" value="<?php echo @$incomeOther->othr_lve_remt_aus_dt_frm; ?>"/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>										
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="text-center">Date Received To</label><br>
                                            <div class='input-group date' id='othr_lve_remt_aus_dt_to'>
                                                <input type='text' class="form-control datepicker" name="othr_lve_remt_aus_dt_to" value="<?php echo @$incomeOther->othr_lve_remt_aus_dt_to; ?>"/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>										
                                        </div>
                                    </div>
                                </div>  

                                <div class="row">
                                	<div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-center">Name of the Nearest Post Office</label><br>								
                                        <input type="text" name="othr_lve_remt_aus_pst_ofce" class="form-control" value="<?php echo @$incomeOther->othr_lve_remt_aus_pst_ofce; ?>">								
                                    </div>
                                    </div>
                                </div>
                            </div>			 
                        </div>
                    </div>
                </div>	

            </div>
        </div>
    </div>
    <!-- -->

    <!-- -->
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading4">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
                    4. Medical Expenses</a>
            </h4>
        </div>
        <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
            <div class="panel-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Did you have net medical expenses over $2,120?</label> 
                            <label class="radio-inline">
                                <input type="radio" class="has-div-to-show" name="othr_med_exp_ovr_2120_q" value="yes" <?php if (@$incomeOther->othr_med_exp_ovr_2120_q == "yes") {echo "checked";} ?>> Yes								
                            </label>
                            <label class="radio-inline">							
                                <input type="radio" class="has-div-to-show" name="othr_med_exp_ovr_2120_q" value="no" <?php if (@$incomeOther->othr_med_exp_ovr_2120_q == "no" || @$incomeOther->othr_med_exp_ovr_2120_q == "") {echo "checked";} ?>> No
                            </label>      										

                            <div class="hidden to-show">
                                <div class="row">
									<br />
                                    <label>Did you have a medical expense offset in both 2013 and 2014?</label> 
                                    <label class="radio-inline">
                                        <input type="radio" class="has-div-to-show" name="othr_med_exp_ofst_yr_1314_q" value="yes" <?php if (@$incomeOther->othr_med_exp_ofst_yr_1314_q == "yes") {echo "checked";} ?>> Yes								
                                    </label>
                                    <label class="radio-inline">							
                                        <input type="radio" class="has-div-to-show" name="othr_med_exp_ofst_yr_1314_q" value="no" <?php if (@$incomeOther->othr_med_exp_ofst_yr_1314_q == "no" || @$incomeOther->othr_med_exp_ofst_yr_1314_q == "") {echo "checked";} ?>> No
                                    </label>

                                    <div class="hidden to-show">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="text-center">Medical expenses incurred in 2015</label><br>
                                                <input type="text"  class="form-control" name="othr_med_exp_crnt_yr_amnt" id="" value="<?php echo @$incomeOther->othr_med_exp_crnt_yr_amnt; ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label">Attach Evidence</label>							
                                                <input id="othr_med_exp_crnt_yr_amnt_docs" type="file" class="file" name="othr_med_exp_crnt_yr_amnt_docs">
                                            </div>
                                        </div>
                                    </div>      						
                                </div>
                            </div>

							<br />
                            <label>Are you entitled to the Medicare levy exemption or reduction in 2015?</label> 
                            <label class="radio-inline">
                                <input type="radio" class="has-div-to-show" name="othr_med_ent_medicr_exmt_rd_q" value="yes" <?php if (@$incomeOther->othr_med_ent_medicr_exmt_rd_q == "yes") {echo "checked";} ?>> Yes							
                            </label>
                            <label class="radio-inline">							
                                <input type="radio" class="has-div-to-show" name="othr_med_ent_medicr_exmt_rd_q" value="no" <?php if (@$incomeOther->othr_med_ent_medicr_exmt_rd_q == "no" || @$incomeOther->othr_med_ent_medicr_exmt_rd_q == "") {echo "checked";} ?>> No
                            </label>  

                            <div class="hidden to-show">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="text-center">Specify</label><br>
                                        <input type="text"  class="form-control" name="othr_med_ent_medicr_exmt_rd_amnt" id="" value="<?php echo @$incomeOther->othr_med_ent_medicr_exmt_rd_amnt; ?>">
                                    </div>
                                </div>
                            </div>   				

                        </div>
                    </div>	
                </div>	

            </div>
        </div>
    </div>
    <!-- -->

    <!-- -->
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading5">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                    5. HECS/HELP liability or student loan debt</a>
            </h4>
        </div>
        <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
            <div class="panel-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Do you have a HECS/HELP liability or a student supplement loan debt?</label> 
                            <label class="radio-inline">
                                <input type="radio" class="has-div-to-show" name="othr_hecs_help_std_ln_dept_q" value="yes" <?php if (@$incomeOther->othr_hecs_help_std_ln_dept_q == "yes") {echo "checked";} ?>> Yes								
                            </label>
                            <label class="radio-inline">							
                                <input type="radio" class="has-div-to-show" name="othr_hecs_help_std_ln_dept_q" value="no" <?php if (@$incomeOther->othr_hecs_help_std_ln_dept_q == "no" || @$incomeOther->othr_hecs_help_std_ln_dept_q == "") {echo "checked";} ?>> No
                            </label>							
                            <div class="hidden to-show">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="text-center">Amount of liability owing</label><br>								
                                            <input type="text" name="othr_hecs_help_std_ln_dept_amnt" class="form-control" value="<?php echo @$incomeOther->othr_hecs_help_std_ln_dept_amnt; ?>">								
                                        </div>
                                    </div>      														
                                </div>      					
                            </div>
                        </div>
                    </div>	
                </div>	

            </div>
        </div>
    </div>
    <!-- -->

    <!-- -->
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading6">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
                    6. Family trust distribution tax</a>
            </h4>
        </div>
        <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
            <div class="panel-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Did a trust or company distribute income to you in respect of which family trust distribution tax was paid by the trust or company?</label> 
                            <label class="radio-inline">
                                <input type="radio" class="has-div-to-show" name="othr_icm_trst_paid_q" value="yes" <?php if (@$incomeOther->othr_icm_trst_paid_q == "yes") {echo "checked";} ?>> Yes								
                            </label>
                            <label class="radio-inline">							
                                <input type="radio" class="has-div-to-show" name="othr_icm_trst_paid_q" value="no" <?php if (@$incomeOther->othr_icm_trst_paid_q == "no" || @$incomeOther->othr_icm_trst_paid_q == "") {echo "checked";} ?>> No
                            </label>							
                            <div class="hidden to-show">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="text-center">Amount</label><br>
                                            <input type="text" name="othr_icm_trst_amnt" class="form-control" value="<?php echo @$incomeOther->othr_icm_trst_amnt; ?>">	
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="text-center">Name of Family Trust</label><br>
                                            <input type="text" name="othr_icm_trst_name" class="form-control" value="<?php echo @$incomeOther->othr_icm_trst_name; ?>">	
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="text-center">TFN of Family Trust</label>
                                            <input type="text" name="othr_icm_trst_tfn" class="form-control" value="<?php echo @$incomeOther->othr_icm_trst_tfn; ?>">	
                                        </div>
                                    </div>									
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="control-label">Attach Evidence</label>							
                                        <input id="othr_icm_trst_docs" name="othr_icm_trst_docs" type="file" class="file">
                                    </div>
                                </div> 
                                <div class="row">
                               <div class="col-sm-6">					
                                   <br />
                                    <p>Uploaded file: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/otherinfo/' . @$incomeOther->othr_icm_trst_docs; ?>"> <?php echo @$incomeOther->othr_icm_trst_docs; ?></a></p>
                                   </div>
                               </div>
                                </div>      												
                            </div>
                        </div>
                    </div>	
                </div>

            </div>
        </div>
    <!-- -->

  <!-- end accordians -->
  <!--
  <div class="row">
      <div class="col-sm-12">
          <div class="form-group pull-right">
              <input type="submit" class="btn btn-success update" name="option" value="Save">							
          </div>
      </div>
  </div>
  </form>
  </div>
  <div>
  -->
  <div class="row">
  <div class="col-sm-4">						
  <span>Date Updated: <?php echo $this->convert_date_to_format($company->updated_at, 'l dS F @ H:i:s'); ?></span>
  </div>			
  </div>
  <div class="row">
  <div class="col-sm-4">					
  <a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_companies" class="btn btn-info">Back</a>
  <a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_dashboard&id=<?php echo $company->id; ?>&type=company&approve=1" class="btn btn-success">Approve</a>
  <a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_dashboard&id=<?php echo $company->id; ?>&type=company&reject=1" class="btn btn-danger">Reject</a>	
  </div>
  </div>
 

  </div>