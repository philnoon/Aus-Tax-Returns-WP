<div class="wrap lcp-content">

    <h2><?php echo $page_title; ?></h2>

    <?php if (@$message) : ?>
        <p class="text-left alert alert-success" role="alert"><?php echo $message; ?></p>
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
//get user's username
        $user_data = get_userdata($user_ID);
        $plugin_dir = plugin_dir_path(__FILE__);

//plugin_dir_path( __FILE__ )
//get_site_url();
//plugin_dir_url($file)
//echo plugins_url().'/lead-capture-pro/client-docs/'.$user_data->user_login.'/income/'.@$incomelodgement->icm_payg_summary_docs;
//print_r($user_data);				
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
                                <input type="radio" class="has-div-to-show" value="yes" name="icm_current_fin_yr" <?php if (@$incomelodgement->icm_current_fin_yr == "yes") {
                                echo "checked";
                            } ?>> No
                            </label>
                            <label class="radio-inline">							
                                <input type="radio" class="has-div-to-show" value="no" name="icm_current_fin_yr" <?php if (@$incomelodgement->icm_current_fin_yr == "no" || @$incomelodgement->icm_current_fin_yr == "") {
                                echo "checked";
                            } ?>> Yes
                            </label>

                            <div class="hidden to-show">
                                <div class="row">
                                    <div class="col-sm-3">				
                                        <input type="text" class="form-control" name="icm_fin_yr" id="" value="<?php echo @$incomelodgement->icm_fin_yr; ?>" placeholder="">
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
                            1. Salary or wage income</a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">

                        <!-- Did you earn a salary or wage? section -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Did you earn a salary or wage?</label> 
                                    <label class="radio-inline">
                                        <input type="radio" class="has-div-to-show" name="icm_ern_salary_or_wage_q" value="yes" <?php if (@$incomelodgement->icm_ern_salary_or_wage_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                                    </label>
                                    <label class="radio-inline">							
                                        <input type="radio" class="has-div-to-show" name="icm_ern_salary_or_wage_q" value="no" <?php if (@$incomelodgement->icm_ern_salary_or_wage_q == "no" || @$incomelodgement->icm_ern_salary_or_wage_q == "") {
                                echo "checked";
                            } ?>> No
                                    </label>				

                                    <div class="hidden to-show">

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="control-label">Attach PAYG Summary File</label>							
                                                <input id="icm_payg_summary_docs" type="file" class="file" name="icm_payg_summary_docs" value="<?php echo @$incomelodgement->icm_payg_summary_docs; ?>">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">					
                                                <br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_payg_summary_docs; ?>"> <?php echo @$incomelodgement->icm_payg_summary_docs; ?></a></p>
                                            </div>				
                                        </div>

                                        <div class="row wages">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="text-left">Gross</label><br>
                                                    <input type="text"  class="form-control" name="icm_ern_gross" id="" value="<?php echo @$incomelodgement->icm_ern_gross; ?>" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="text-left">Tax</label><br>
                                                    <input type="text"  class="form-control" name="icm_ern_tax" id="" value="<?php echo @$incomelodgement->icm_ern_tax; ?>" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="text-left">Reportable Fringe Benefits</label>
                                                    <input type="text"  class="form-control" name="icm_ern_fnge_befts" id="" value="<?php echo @$incomelodgement->icm_ern_fnge_befts; ?>" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="text-left">Reportable Employer Super Contributions</label>
                                                    <input type="text"  class="form-control" name="icm_ern_emlyr_spr_cont" id="" value="<?php echo @$incomelodgement->icm_ern_emlyr_spr_cont; ?>" placeholder="">
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
        </div>  
        <!-- -->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        2. Allowances, earnings, tips, directors fees etc
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Did you earn allowances, earnings, tips, directors fees etc?</label> 
                                <label class="radio-inline">
                                    <input type="radio" class="has-div-to-show" name="icm_alwn_erns_tips_q" value="yes" <?php if (@$incomelodgement->icm_alwn_erns_tips_q == "yes") {echo "checked";} ?>> Yes								
                                </label>
                                <label class="radio-inline">							
                                    <input type="radio" class="has-div-to-show" name="icm_alwn_erns_tips_q" value="no" <?php if (@$incomelodgement->icm_alwn_erns_tips_q == "no" || @$incomelodgement->icm_alwn_erns_tips_q == "") {echo "checked";} ?>> No
                                </label>				

                                <div class="hidden to-show">      			
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="">Nature</label><br>
                                                <input type="text" name="icm_alwn_erns_tips_desc" class="form-control" value="<?php echo @$incomelodgement->icm_alwn_erns_tips_desc; ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="">Amount</label><br>
                                                <input type="text" name="icm_alwn_erns_tips_amnt" class="form-control" value="<?php echo @$incomelodgement->icm_alwn_erns_tips_amnt; ?>">  
                                            </div>
                                        </div>									
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="control-label">Attach Evidence</label>							
                                            <input id="icm_alwn_erns_tips_docs" type="file" class="file" name="icm_alwn_erns_tips_docs" value="<?php echo @$incomelodgement->icm_alwn_erns_tips_docs; ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">					
                                            <br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_alwn_erns_tips_docs; ?>"> <?php echo @$incomelodgement->icm_alwn_erns_tips_docs; ?></a></p>
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
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        3. Employer lump sum payments</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">			
                                <label>Did you receive any Employer lump sum payments?</label>
                                <label class="radio-inline">
                                    <input type="radio" class="has-div-to-show lump" name="icm_employr_lump_pymtns_q" value="yes" <?php if (@$incomelodgement->icm_employr_lump_pymtns_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                                </label>
                                <label class="radio-inline">							
                                    <input type="radio" class="has-div-to-show lump" name="icm_employr_lump_pymtns_q" value="no" <?php if (@$incomelodgement->icm_employr_lump_pymtns_q == "no" || @$incomelodgement->icm_employr_lump_pymtns_q == "") {
                                echo "checked";
                            } ?>> No
                                </label>							
                                <div class="hidden to-show">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="control-label">Attach PAYG Summary File</label>							
                                            <input id="icm_employr_lump_pymtns_docs" name="icm_employr_lump_pymtns_docs" type="file" class="file">								
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">					
                                            <br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_employr_lump_pymtns_docs; ?>"> <?php echo @$incomelodgement->icm_employr_lump_pymtns_docs; ?></a></p>
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

<!-- 
<div class="panel panel-default">
  <div class="panel-heading" role="tab" id="heading4">
    <h4 class="panel-title">
      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
        4. Employer termination payments</a>
    </h4>
  </div>
  <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
      <div class="panel-body">
      
      <div class="row">
              <div class="col-sm-12">
                      <div class="form-group">
                              <label>Did you receive any Employer termination payments?</label> 
                              <label class="radio-inline">
                                      <input type="radio" class="has-div-to-show term" name="icm_employr_term_pymtns_q" value="yes" <?php if (@$incomelodgement->icm_employr_term_pymtns_q == "Yes") {
                                echo "checked";
                            } ?>> Yes								
                              </label>
                              <label class="radio-inline">							
                                      <input type="radio" class="has-div-to-show term" name="icm_employr_term_pymtns_q" value="no" <?php if (@$incomelodgement->icm_employr_term_pymtns_q == "No" || @$incomelodgement->icm_employr_term_pymtns_q == "") {
                                echo "checked";
                            } ?>> No
                                      </label>							
                                      <div class="hidden to-show">
                                              <div class="row">
                                                      <div class="col-sm-12">
                                                              <label class="control-label">Attach Employer Termination Payments</label>							
                                                              <input id="icm_employr_term_pymtns_docs" name="icm_employr_term_pymtns_docs" type="file" class="file">								
                                                      </div>
                                              </div>
                                              <div class="row">
                                                      <div class="col-sm-6">					
                                                              <br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_employr_term_pymtns_docs; ?>"> <?php echo @$incomelodgement->icm_employr_term_pymtns_docs; ?></a></p>
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
                5. Australian Government allowances and payments</a>
        </h4>
    </div>
    <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Did you receive any Australian Government allowances and payments like newstart, youth allowance, sickness allowance, parenting payment and Austudy payment?</label> 
                        <label class="radio-inline">
                            <input type="radio" class="has-div-to-show" name="icm_au_gov_alwnc_q" value="yes" <?php if (@$incomelodgement->icm_au_gov_alwnc_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                        </label>
                        <label class="radio-inline">							
                            <input type="radio" class="has-div-to-show" name="AG_allowance_payments" value="no" <?php if (@$incomelodgement->icm_au_gov_alwnc_q == "no" || @$incomelodgement->icm_au_gov_alwnc_q == "") {
                                echo "checked";
                            } ?>> No
                        </label>							
                        <div class="hidden to-show">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="text-left">Allowance Received</label><br>								
                                        <input type="text" name="icm_au_gov_alwnc_recieved" class="form-control" value="<?php echo @$incomelodgement->icm_au_gov_alwnc_recieved; ?>">								
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="text-left">Amount</label><br>								
                                        <input type="text" name="icm_au_gov_alwnc_amnt" class="form-control" value="<?php echo @$incomelodgement->icm_au_gov_alwnc_amnt; ?>">

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="text-left">Tax With held</label>								
                                        <input type="text" name="icm_au_gov_alwnc_tx_wthhld" class="form-control" value="<?php echo @$incomelodgement->icm_au_gov_alwnc_tx_wthhld; ?>">

                                    </div>
                                </div>									
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-left">Date Received From</label><br>
                                        <div class='input-group date' id='date_received_from'>
                                            <input type='text' class="form-control datepicker" name="icm_au_gov_alwnc_date_frm" value="<?php echo @$incomelodgement->icm_au_gov_alwnc_date_frm; ?>"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>										
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-left">Date Received To</label><br>
                                        <div class='input-group date' id='date_received_to'>
                                            <input type='text' class="form-control datepicker" name="icm_au_gov_alwnc_date_to" value="<?php echo @$incomelodgement->icm_au_gov_alwnc_date_to; ?>"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
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
</div>
<!-- -->

<!-- -->
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading6">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
                6. Australian Government pensions and allowances</a>
        </h4>
    </div>
    <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Did you receive any Australian Government pensions and allowances?</label> 
                        <label class="radio-inline">
                            <input type="radio" class="has-div-to-show" name="icm_au_gov_pensions_q" value="yes" <?php if (@$incomelodgement->icm_au_gov_pensions_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                        </label>
                        <label class="radio-inline">							
                            <input type="radio" class="has-div-to-show" name="icm_au_gov_pensions_q" value="no" <?php if (@$incomelodgement->icm_au_gov_pensions_q == "no" || @$incomelodgement->icm_au_gov_pensions_q == "") {
                                echo "checked";
                            } ?>> No
                        </label>							
                        <div class="hidden to-show">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="text-left">Description</label><br>
                                        <input type="text" name="icm_au_gov_pensions_desc" class="form-control" value="<?php echo @$incomelodgement->icm_au_gov_pensions_desc; ?>">	
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="text-left">Amount</label><br>
                                        <input type="text" name="icm_au_gov_pensions_amnt" class="form-control" value="<?php echo @$incomelodgement->icm_au_gov_pensions_amnt; ?>">	
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="text-left">Tax Withheld</label>
                                        <input type="text" name="icm_au_gov_pensions_tx_wthhld" class="form-control" value="<?php echo @$incomelodgement->icm_au_gov_pensions_tx_wthhld; ?>">	
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
    <div class="panel-heading" role="tab" id="heading7">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
                7. Australian annuities and superannuation income</a>
        </h4>
    </div>
    <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Did you receive any Australian annuities and superannuation income stream?</label>
                        <label class="radio-inline">
                            <input type="radio" class="has-div-to-show" name="icm_au_supr_inc_strm_q" value="yes" <?php if (@$incomelodgement->icm_au_supr_inc_strm_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                        </label>
                        <label class="radio-inline">							
                            <input type="radio" class="has-div-to-show" name="icm_au_supr_inc_strm_q" value="no" <?php if (@$incomelodgement->icm_au_supr_inc_strm_q == "no" || @$incomelodgement->icm_au_supr_inc_strm_q == "") {
                                echo "checked";
                            } ?>> No
                        </label>							
                        <div class="hidden to-show">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="text-left">Description</label><br>
                                        <input type="text" name="icm_au_supr_inc_strm_desc" class="form-control" value="<?php echo @$incomelodgement->icm_au_supr_inc_strm_desc; ?>">	
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="text-left">Amount</label><br>
                                        <input type="text" name="icm_au_supr_inc_strm_amnt" class="form-control" value="<?php echo @$incomelodgement->icm_au_supr_inc_strm_amnt; ?>">	
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="text-left">Tax Withheld</label><br>
                                        <input type="text" name="icm_au_supr_inc_strm_tx_wthhld" class="form-control" value="<?php echo @$incomelodgement->icm_au_supr_inc_strm_tx_wthhld; ?>">
                                    </div>
                                </div>																
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">										
                                        <label class="control-label">Attach Document</label>							
                                        <input id="icm_au_supr_inc_strm_docs" name="icm_au_supr_inc_strm_docs" type="file" class="file">
                                    </div>
                                </div>
                                <div class="col-sm-12">					
                                    <br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_au_supr_inc_strm_docs; ?>"> <?php echo @$incomelodgement->icm_au_supr_inc_strm_docs; ?></a></p>
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
    <div class="panel-heading" role="tab" id="heading8">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapse8">
                8. Australian superannuation</a>
        </h4>
    </div>
    <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Did you receive any Australian superannuation lump sum payments?</label>
                        <label class="radio-inline">
                            <input type="radio" class="has-div-to-show" name="icm_au_supr_lump_paymt_q" value="yes" <?php if (@$incomelodgement->icm_au_supr_lump_paymt_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                        </label>
                        <label class="radio-inline">							
                            <input type="radio" class="has-div-to-show" name="icm_au_supr_lump_paymt_q" value="no" <?php if (@$incomelodgement->icm_au_supr_lump_paymt_q == "no" || @$incomelodgement->icm_au_supr_lump_paymt_q == "") {
                                echo "checked";
                            } ?>> No
                        </label>							
                        <div class="hidden to-show">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-left">Payers ABN</label><br>
                                        <input type="text" name="icm_au_supr_lump_paymt_abn" class="form-control" value="<?php echo @$incomelodgement->icm_au_supr_lump_paymt_abn; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-left">Date of Payment</label><br>									
                                        <div class='input-group date' id='date_received_to'>
                                            <input type='text' class="form-control datepicker" name="icm_au_supr_lump_paymt_date" value="<?php echo @$incomelodgement->icm_au_supr_lump_paymt_date; ?>">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>																	
                            </div>					

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="text-left">Taxed Taxable Component</label><br>
                                        <input type="text" name="icm_au_supr_lump_paymt_tx_cmp" class="form-control" value="<?php echo @$incomelodgement->icm_au_supr_lump_paymt_tx_cmp; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="control-label">Untaxed Taxable Component</label>							
                                        <input type="text" name="icm_au_supr_lump_paymt_untx_cmp" class="form-control" value="<?php echo @$incomelodgement->icm_au_supr_lump_paymt_untx_cmp; ?>">
                                    </div>
                                </div>	
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="control-label">Tax Withheld</label>							
                                        <input type="text" name="icm_au_supr_lump_paymt_tx_wthhld" class="form-control" value="<?php echo @$incomelodgement->icm_au_supr_lump_paymt_tx_wthhld; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">									
                                <div class="col-sm-12">
                                    <div class="form-group">										
                                        <label class="control-label">Attach Document</label>							
                                        <input id="icm_au_supr_lump_paymt_docs" name="icm_au_supr_lump_paymt_docs" type="file" class="file">
                                    </div>
                                </div>																
                            </div>
                            <div class="row">
                                <div class="col-sm-6">					
                                    <br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_au_supr_lump_paymt_docs; ?>"> <?php echo @$incomelodgement->icm_au_supr_lump_paymt_docs; ?></a></p>
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
    <div class="panel-heading" role="tab" id="heading9">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="false" aria-controls="collapse9">
                9. Income from a company or a trust</a>
        </h4>
    </div>
    <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading9">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Have you received income from a company or a trust for which you performed personal service for, and received attributed personal services income from?</label> 
                        <label class="radio-inline">
                            <input type="radio" class="has-div-to-show" name="icm_compny_trust_q" value="yes" <?php if (@$incomelodgement->icm_compny_trust_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                        </label>
                        <label class="radio-inline">							
                            <input type="radio" class="has-div-to-show" name="icm_compny_trust_q" value="no" <?php if (@$incomelodgement->icm_compny_trust_q == "no" || @$incomelodgement->icm_compny_trust_q == "") {
                                echo "checked";
                            } ?>> No
                        </label>								

                        <div class="hidden to-show">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-left">Payer's Name</label><br>
                                        <input type="text" name="icm_compny_trust_pyrs_name" class="form-control" value="<?php echo @$incomelodgement->icm_compny_trust_pyrs_name; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-left">Payer's ABN</label><br>											
                                        <input type="text" name="icm_compny_trust_pyrs_abn" class="form-control" value="<?php echo @$incomelodgement->icm_compny_trust_pyrs_abn; ?>">											
                                    </div>
                                </div>																	
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-left">Gross Amount</label><br>
                                        <input type="text" name="icm_compny_trust_gros_amnt" class="form-control" value="<?php echo @$incomelodgement->icm_compny_trust_gros_amnt; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">										
                                        <label class="control-label">Tax Withheld</label>							
                                        <input type="text" name="icm_compny_trust_tx_wthhld" class="form-control" value="<?php echo @$incomelodgement->icm_compny_trust_tx_wthhld; ?>">
                                    </div>
                                </div>									
                            </div>

                            <div class="row">									
                                <div class="col-sm-12">
                                    <div class="form-group">										
                                        <label class="control-label">Attach Evidence</label>							
                                        <input id="icm_compny_trust_pyrs_docs" name="icm_compny_trust_pyrs_docs" type="file" class="file">
                                    </div>
                                </div>																
                            </div>
                            <div class="row">
                                <div class="col-sm-6">					
                                    <br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_compny_trust_pyrs_docs; ?>"> <?php echo @$incomelodgement->icm_compny_trust_pyrs_docs; ?></a></p>
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
    <div class="panel-heading" role="tab" id="heading10">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="false" aria-controls="collapse10">
                10. Interest income</a>
        </h4>
    </div>
    <div id="collapse10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading10">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Did you receive interest income?</label> 
                        <label class="radio-inline">
                            <input type="radio" class="has-div-to-show" name="icm_intst_icm_q" value="yes" <?php if (@$incomelodgement->icm_intst_icm_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                        </label>
                        <label class="radio-inline">							
                            <input type="radio" class="has-div-to-show" name="icm_intst_icm_q" value="no" <?php if (@$incomelodgement->icm_intst_icm_q == "no" || @$incomelodgement->icm_intst_icm_q == "") {
                                echo "checked";
                            } ?>> No
                        </label>								

                        <div class="hidden to-show">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="text-left">Bank</label><br>
                                        <input type="text" name="icm_intst_icm_bank" class="form-control" value="<?php echo @$incomelodgement->icm_intst_icm_bank; ?>">
                                    </div>
                                </div>						
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="text-left">Branch</label><br>
                                        <input type="text" name="icm_intst_icm_branch" class="form-control" value="<?php echo @$incomelodgement->icm_intst_icm_branch; ?>">
                                    </div>
                                </div>						
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="text-left">Account Number</label><br>
                                        <input type="text" name="icm_intst_icm_acc_num" class="form-control" value="<?php echo @$incomelodgement->icm_intst_icm_acc_num; ?>">
                                    </div>
                                </div>						
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="text-left">Amount</label><br>
                                        <input type="text" name="icm_intst_icm_amnt" class="form-control" value="<?php echo @$incomelodgement->icm_intst_icm_amnt; ?>">
                                    </div>
                                </div>						
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="text-left">TFN Amount</label><br>
                                        <input type="text" name="icm_intst_icm_tfn_amnt" class="form-control" value="<?php echo @$incomelodgement->icm_intst_icm_tfn_amnt; ?>">
                                    </div>
                                </div>						
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="text-left">Joint Names</label><br>
                                        <input type="text" name="icm_intst_icm_jnt_nmes" class="form-control" value="<?php echo @$incomelodgement->icm_intst_icm_jnt_nmes; ?>">
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
    <div class="panel-heading" role="tab" id="heading11">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="false" aria-controls="collapse11">
                11. Dividends</a>
        </h4>
    </div>
    <div id="collapse11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading11">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Did you receive dividends?</label> 
                        <label class="radio-inline">
                            <input type="radio" class="has-div-to-show" name="icm_recve_dvdends_q" value="yes" <?php if (@$incomelodgement->icm_recve_dvdends_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                        </label>
                        <label class="radio-inline">							
                            <input type="radio" class="has-div-to-show" name="icm_recve_dvdends_q" value="no" <?php if (@$incomelodgement->icm_recve_dvdends_q == "no" || @$incomelodgement->icm_recve_dvdends_q == "") {
                                echo "checked";
                            } ?>> No
                        </label>								

                        <div class="hidden to-show">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="text-left">Company</label><br>
                                        <input type="text" name="icm_recve_dvdends_comp" class="form-control" value="<?php echo @$incomelodgement->icm_recve_dvdends_comp; ?>">
                                    </div>
                                </div>						
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="text-left">Date Paid</label><br>

                                        <div class='input-group date' id='date_received_to'>
                                            <input type='text' class="form-control datepicker" name="icm_recve_dvdends_dte_paid" value="<?php echo @$incomelodgement->icm_recve_dvdends_dte_paid; ?>">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>							
                                    </div>
                                </div>						
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="text-left">Unfranked dividends($)</label><br>
                                        <input type="text" name="icm_recve_dvdends_unfranked" class="form-control" value="<?php echo @$incomelodgement->icm_recve_dvdends_unfranked; ?>">
                                    </div>
                                </div>						
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="text-left">Franked dividends ($)</label><br>
                                        <input type="text" name="icm_recve_dvdends_franked" class="form-control" value="<?php echo @$incomelodgement->icm_recve_dvdends_franked; ?>">
                                    </div>
                                </div>						
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="text-left">Imputation credits ($)</label><br>
                                        <input type="text" name="icm_recve_dvdends_Imptn_cdts" class="form-control" value="<?php echo @$incomelodgement->icm_recve_dvdends_Imptn_cdts; ?>">
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
    <div class="panel-heading" role="tab" id="heading12">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse12" aria-expanded="false" aria-controls="collapse12">
                12. Employee share scheme</a>
        </h4>
    </div>
    <div id="collapse12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading12">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Did you participate in any employee share scheme?</label> 
                        <label class="radio-inline">
                            <input type="radio" class="has-div-to-show" name="icm_prt_emp_shr_schme_q" value="yes" <?php if (@$incomelodgement->icm_prt_emp_shr_schme_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                        </label>
                        <label class="radio-inline">							
                            <input type="radio" class="has-div-to-show" name="icm_prt_emp_shr_schme_q" value="no" <?php if (@$incomelodgement->icm_prt_emp_shr_schme_q == "no" || @$incomelodgement->icm_prt_emp_shr_schme_q == "") {
                                echo "checked";
                            } ?>> No
                        </label>								

                        <div class="hidden to-show">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">										
                                        <label class="control-label">Attach Evidence</label>							
                                        <input id="icm_prt_emp_shr_schme_docs" name="icm_prt_emp_shr_schme_docs" type="file" class="file" name="icm_prt_emp_shr_schme_docs">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">					
                                    <br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_prt_emp_shr_schme_docs; ?>"> <?php echo @$incomelodgement->icm_prt_emp_shr_schme_docs; ?></a></p>
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
    <div class="panel-heading" role="tab" id="heading13">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse13" aria-expanded="false" aria-controls="collapse13">
                13. Partnerships and/or trust distributions</a>
        </h4>
    </div>
    <div id="collapse13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading13">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Did you receive any distributions from partnerships and/or trusts?</label> 
                        <label class="radio-inline">
                            <input type="radio" class="has-div-to-show" name="icm_distbtn_prtnshps_trsts_q" value="yes" <?php if (@$incomelodgement->icm_distbtn_prtnshps_trsts_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                        </label>
                        <label class="radio-inline">							
                            <input type="radio" class="has-div-to-show" name="icm_distbtn_prtnshps_trsts_q" value="no" <?php if (@$incomelodgement->icm_distbtn_prtnshps_trsts_q == "no" || @$incomelodgement->icm_distbtn_prtnshps_trsts_q == "") {
                                echo "checked";
                            } ?>> No
                        </label>								

                        <div class="hidden to-show">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">										
                                        <label class="control-label">Attach Evidence</label>
                                        <span class="">Note: You can attach more than one distribution statement</span>							
                                        <input id="icm_distbtn_prtnshps_trsts_docs" name="icm_distbtn_prtnshps_trsts_docs" type="file" class="file">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">					
                                    <br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_distbtn_prtnshps_trsts_docs; ?>"> <?php echo @$incomelodgement->icm_distbtn_prtnshps_trsts_docs; ?></a></p>
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
    <div class="panel-heading" role="tab" id="heading14">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse14" aria-expanded="false" aria-controls="collapse14">
                14. Personal Services Income</a>
        </h4>
    </div>
    <div id="collapse14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading14">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Did you receive any Personal Services Income (PSI)?</label> 
                        <label class="radio-inline">
                            <input type="radio" class="has-div-to-show" name="icm_psnl_srv_icm_q" value="yes" <?php if (@$incomelodgement->icm_psnl_srv_icm_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                        </label>
                        <label class="radio-inline">							
                            <input type="radio" class="has-div-to-show" name="icm_psnl_srv_icm_q" value="no" <?php if (@$incomelodgement->icm_psnl_srv_icm_q == "no" || @$incomelodgement->icm_psnl_srv_icm_q == "") {
                                echo "checked";
                            } ?>> No
                        </label>								

                        <div class="hidden to-show">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">										
                                        <label class="text-left">Description of main business activity</label><br>
                                        <input type="text" name="icm_psnl_srv_icm_bus_acty" class="form-control" value="<?php echo @$incomelodgement->icm_psnl_srv_icm_bus_acty; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">										
                                        <label class="text-left">ABN</label><br>
                                        <input type="text" name="icm_psnl_srv_icm_bus_abn" class="form-control" value="<?php echo @$incomelodgement->icm_psnl_srv_icm_bus_abn; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">										
                                        <label class="text-left">Payers Name</label><br>
                                        <input type="text" name="icm_psnl_srv_icm_pyr_nme" class="form-control" value="<?php echo @$incomelodgement->icm_psnl_srv_icm_pyr_nme; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">										
                                        <label class="text-left">ABN</label><br>
                                        <input type="text" name="icm_psnl_srv_icm_pyr_abn" class="form-control" value="<?php echo @$incomelodgement->icm_psnl_srv_icm_pyr_abn; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">										
                                        <label class="text-left">Amount</label><br>
                                        <input type="text" name="icm_psnl_srv_icm_pyr_amnt" class="form-control" value="<?php echo @$incomelodgement->icm_psnl_srv_icm_pyr_amnt; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">										
                                        <label class="text-left">Tax Withheld</label><br>
                                        <input type="text" name="icm_psnl_srv_icm_pyr_tx_wthhld" class="form-control" value="<?php echo @$incomelodgement->icm_psnl_srv_icm_pyr_tx_wthhld; ?>">
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
    <div class="panel-heading" role="tab" id="heading15">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse15" aria-expanded="false" aria-controls="collapse15">
                15. Deductions</a>
        </h4>
    </div>
    <div id="collapse15" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading15">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <!-- <label>15. Deductions</label> -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">										
                                    <label class="text-left">Premiums For Worker’s Compensation, Public Liability and Professional Indemnity Insurance</label><br>
                                    <input type="text" name="icm_ded_wrks_comp_insrnce" class="form-control" value="<?php echo @$incomelodgement->icm_ded_wrks_comp_insrnce; ?>" placeholder="amount">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">										
                                    <label class="text-left">Bank and Other Account-Keeping Fees and Charges</label><br>
                                    <input type="text" name="icm_ded_bnk_fees_chrgs" class="form-control" value="<?php echo @$incomelodgement->icm_ded_bnk_fees_chrgs; ?>" placeholder="amount">
                                </div>
                            </div>
                        </div>
                        <div class="row">					
                            <div class="col-sm-6">
                                <div class="form-group">										
                                    <label class="text-left">Tax-Related Expenses such as the Cost of Preparing and Lodging Tax Returns or Business Activity Statement (BAS)</label><br>
                                    <input type="text" name="icm_ded_tx_expnc_rtns_bas" class="form-control" value="<?php echo @$incomelodgement->icm_ded_tx_expnc_rtns_bas; ?>" placeholder="amount">
                                </div>
                            </div>
                        </div>
                        <div class="row">					
                            <div class="col-sm-6">
                                <div class="form-group">										
                                    <label class="text-left">Registration or Licensing Fees</label><br>
                                    <input type="text" name="icm_ded_reg_lic_fees" class="form-control" value="<?php echo @$incomelodgement->icm_ded_reg_lic_fees; ?>" placeholder="amount">
                                </div>
                            </div>
                        </div>
                        <div class="row">					
                            <div class="col-sm-6">
                                <div class="form-group">										
                                    <label class="text-left">Expenses for Advertising, Tendering and Quoting for Work</label><br>
                                    <input type="text" name="icm_ded_adv_tendng_quoting" class="form-control" value="<?php echo @$incomelodgement->icm_ded_adv_tendng_quoting; ?>" placeholder="amount">
                                </div>
                            </div>
                        </div>
                        <div class="row">					
                            <div class="col-sm-6">
                                <div class="form-group">										
                                    <label class="text-left">Deduction for Decline in Value of Depreciating Assets</label><br>
                                    <input type="text" name="icm_ded_deprec_asets" class="form-control" value="<?php echo @$incomelodgement->icm_ded_deprec_asets; ?>" placeholder="amount">
                                </div>
                            </div>
                        </div>
                        <div class="row">					
                            <div class="col-sm-6">
                                <div class="form-group">										
                                    <label class="text-left">Running Expenses for a Home Office Such as Heating and Lighting for Using a Room in the Taxpayer's House</label><br>
                                    <input type="text" name="icm_ded_ecp_hme_ofce" class="form-control" value="<?php echo @$incomelodgement->icm_ded_ecp_hme_ofce; ?>" placeholder="amount">
                                </div>
                            </div>
                        </div>
                        <div class="row">					
                            <div class="col-sm-6">
                                <div class="form-group">										
                                    <label class="text-left">Salary and Wages for an Arm’s Length Employee (not an Associate)</label><br>
                                    <input type="text" name="icm_ded_arms_emplye_slry" class="form-control" value="<?php echo @$incomelodgement->icm_ded_arms_emplye_slry; ?>" placeholder="amount">
                                </div>
                            </div>
                        </div>
                        <div class="row">					
                            <div class="col-sm-6">
                                <div class="form-group">										
                                    <label class="text-left">Contributions to a Complying Superannuation Fund on Behalf of an Arm’s Length Employee (not an Associate)</label><br>
                                    <input type="text" name="icm_ded_arms_emplye_supr" class="form-control" value="<?php echo @$incomelodgement->icm_ded_arms_emplye_supr; ?>" placeholder="amount">
                                </div>
                            </div>
                        </div>
                        <div class="row">					
                            <div class="col-sm-6">
                                <div class="form-group">										
                                    <label class="text-left">Reasonable Amounts Paid to an Associate for Principal Work</label><br>
                                    <input type="text" name="icm_ded_paid_asote_princ_wrk" class="form-control" value="<?php echo @$incomelodgement->icm_ded_paid_asote_princ_wrk; ?>" placeholder="amount">
                                </div>
                            </div>
                        </div>
                        <div class="row">					
                            <div class="col-sm-6">
                                <div class="form-group">										
                                    <label class="text-left">Contributions to a Complying Superannuation fund or a Retirement Savings Account up to the Superannuation Guarantee
                                        Contributions to a Complying Superannuation fund or a Retirement Savings Account up to the Superannuation Guarantee 
                                        3454
                                    </label><br>
                                    <input type="text" name="icm_ded_supr_ret_svngs_acc" class="form-control" value="<?php echo @$incomelodgement->icm_ded_supr_ret_svngs_acc; ?>" placeholder="amount">
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
    <div class="panel-heading" role="tab" id="heading16">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse16" aria-expanded="false" aria-controls="collapse16">
                16. Business income or loss</a>
        </h4>
    </div>
    <div id="collapse16" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading16">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Did you receive any income or make a loss from a business you conduct?</label> 
                        <label class="radio-inline">
                            <input type="radio" class="has-div-to-show" name="icm_busnes_prft_ls_q" value="yes" <?php if (@$incomelodgement->icm_busnes_prft_ls_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                        </label>
                        <label class="radio-inline">							
                            <input type="radio" class="has-div-to-show" name="icm_busnes_prft_ls_q" value="no" <?php if (@$incomelodgement->icm_busnes_prft_ls_q == "no" || @$incomelodgement->icm_busnes_prft_ls_q == "") {
                                echo "checked";
                            } ?>> No
                        </label>								

                        <div class="hidden to-show">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">										
                                        <label class="text-left">Business Name</label><br>
                                        <input type="text" name="icm_busnes_prft_ls_bus_name" class="form-control" value="<?php echo @$incomelodgement->icm_busnes_prft_ls_bus_name; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">										
                                        <label class="text-left">ABN</label><br>
                                        <input type="text" name="icm_busnes_prft_ls_bus_abn" class="form-control" value="<?php echo @$incomelodgement->icm_busnes_prft_ls_bus_abn; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">										
                                        <label class="text-left">Commenced business during year?</label><br>					

                                        <label class="radio-inline">
                                            <input type="radio" class="" name="icm_busnes_prft_ls_srt_dr_yr_q" value="yes" <?php if (@$incomelodgement->icm_busnes_prft_ls_srt_dr_yr_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                                        </label>
                                        <label class="radio-inline">							
                                            <input type="radio" class="" name="icm_busnes_prft_ls_srt_dr_yr_q" value="no" <?php if (@$incomelodgement->icm_busnes_prft_ls_srt_dr_yr_q == "no" || @$incomelodgement->icm_busnes_prft_ls_srt_dr_yr_q == "") {
                                echo "checked";
                            } ?>> No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">										
                                        <label class="text-left">Ceased business during the year? </label><br>

                                        <label class="radio-inline">
                                            <input type="radio" class="" name="icm_busnes_prft_ls_fnsh_dr_yr_q" value="yes" <?php if (@$incomelodgement->icm_busnes_prft_ls_fnsh_dr_yr_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                                        </label>
                                        <label class="radio-inline">							
                                            <input type="radio" class="" name="icm_busnes_prft_ls_fnsh_dr_yr_q" value="no" <?php if (@$incomelodgement->icm_busnes_prft_ls_fnsh_dr_yr_q == "no" || @$incomelodgement->icm_busnes_prft_ls_fnsh_dr_yr_q == "") {
                                echo "checked";
                            } ?>> No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">										
                                        <label class="text-left">Income</label><br>
                                        <input type="text" name="icm_busnes_prft_ls_icm_amnt" class="form-control" value="<?php echo @$incomelodgement->icm_busnes_prft_ls_icm_amnt; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">										
                                        <label class="text-left">Expenses</label><br>
                                        <input type="text" name="icm_busnes_prft_ls_expnces" class="form-control" value="<?php echo @$incomelodgement->icm_busnes_prft_ls_expnces; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">										
                                        <label class="text-left">Attach Evidence</label><br>
                                        <input id="icm_busnes_prft_ls_docs" name="icm_busnes_prft_ls_docs" type="file" class="file">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">					
                                    <br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_busnes_prft_ls_docs; ?>"> <?php echo @$incomelodgement->icm_busnes_prft_ls_docs; ?></a></p>
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
    <div class="panel-heading" role="tab" id="heading17">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse17" aria-expanded="false" aria-controls="collapse17">
                17. Deferred non-commercial business losses</a>
        </h4>
    </div>
    <div id="collapse17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading17">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Do you have any Deferred non-commercial business losses?</label> 
                        <label class="radio-inline">
                            <input type="radio" class="has-div-to-show" name="icm_defrd_bus_ls_q" value="yes" <?php if (@$incomelodgement->icm_defrd_bus_ls_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                        </label>
                        <label class="radio-inline">							
                            <input type="radio" class="has-div-to-show" name="icm_defrd_bus_ls_q" value="no" <?php if (@$incomelodgement->icm_defrd_bus_ls_q == "no" || @$incomelodgement->icm_defrd_bus_ls_q == "") {
                                echo "checked";
                            } ?>> No
                        </label>								

                        <div class="hidden to-show">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">										
                                        <label class="text-left">Year Loss Incured</label><br>
                                        <input type="text" name="icm_defrd_bus_ls_yr" class="form-control" value="<?php echo @$incomelodgement->icm_defrd_bus_ls_yr; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">										
                                        <label class="text-left">	Amount of Loss</label><br>
                                        <input type="text" name="icm_defrd_bus_ls_amnt" class="form-control" value="<?php echo @$incomelodgement->icm_defrd_bus_ls_amnt; ?>">
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
    <div class="panel-heading" role="tab" id="heading18">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse18" aria-expanded="false" aria-controls="collapse18">
                18. Capital gains or loss</a>
        </h4>
    </div>
    <div id="collapse18" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading18">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">		
                        <label>Did you have any capital gains or loss?</label> 
                        <label class="radio-inline">
                            <input type="radio" class="has-div-to-show" name="icm_captl_gns_ls_q" value="yes" <?php if (@$incomelodgement->icm_captl_gns_ls_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                        </label>
                        <label class="radio-inline">							
                            <input type="radio" class="has-div-to-show" name="icm_captl_gns_ls_q" value="no" <?php if (@$incomelodgement->icm_captl_gns_ls_q == "no" || @$incomelodgement->icm_captl_gns_ls_q == "") {
                                echo "checked";
                            } ?>> No
                        </label>								
                        <div class="hidden to-show">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">Description</label><br>
                                        <input type="text" name="icm_captl_gns_ls_desc" class="form-control" value="<?php echo @$incomelodgement->icm_captl_gns_ls_desc; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">Proceeds</label><br>
                                        <input type="text" name="icm_captl_gns_ls_prceds" class="form-control" value="<?php echo @$incomelodgement->icm_captl_gns_ls_prceds; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">Cost</label><br>
                                        <input type="text" name="icm_captl_gns_ls_cost" class="form-control" value="<?php echo @$incomelodgement->icm_captl_gns_ls_cost; ?>">
                                    </div>
                                </div>
                            </div>				
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">										
                                        <label class="text-left">Attach Evidence</label><br>					
                                        <input id="icm_captl_gns_ls_docs" name="icm_captl_gns_ls_docs" type="file" class="file">
                                    </div>
                                </div>								
                            </div>
                            <div class="row">
                                <div class="col-sm-6">					
                                    <br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_captl_gns_ls_docs; ?>"> <?php echo @$incomelodgement->icm_captl_gns_ls_docs; ?></a></p>
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
    <div class="panel-heading" role="tab" id="heading19">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse19" aria-expanded="false" aria-controls="collapse19">
                19. Foreign income</a>
        </h4>
    </div>
    <div id="collapse19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading19">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">				
                        <label>Did you earn any foreign sourced income?</label> 
                        <label class="radio-inline">
                            <input type="radio" class="has-div-to-show" name="icm_forgn_incm_q" value="yes" <?php if (@$incomelodgement->icm_forgn_incm_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                        </label>
                        <label class="radio-inline">							
                            <input type="radio" class="has-div-to-show" name="icm_forgn_incm_q" value="no" <?php if (@$incomelodgement->icm_forgn_incm_q == "no" || @$incomelodgement->icm_forgn_incm_q == "") {
                                echo "checked";
                            } ?>> No
                        </label>								
                        <div class="hidden to-show">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">										
                                        <label class="text-left">Description</label><br>
                                        <input type="text" name="icm_forgn_incm_desc" class="form-control" value="<?php echo @$incomelodgement->icm_forgn_incm_desc; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">										
                                        <label class="text-left">Amount</label><br>
                                        <input type="text" name="icm_forgn_incm_amnt" class="form-control" value="<?php echo @$incomelodgement->icm_forgn_incm_amnt; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">										
                                        <label class="text-left">Foreign Tax Paid</label><br>
                                        <input type="text" name="icm_forgn_incm_tx_paid" class="form-control" value="<?php echo @$incomelodgement->icm_forgn_incm_tx_paid; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">										
                                        <label class="text-left">Deductions</label><br>
                                        <input type="text" name="icm_forgn_incm_ded" class="form-control" value="<?php echo @$incomelodgement->icm_forgn_incm_ded; ?>">
                                    </div>
                                </div>
                            </div>				
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">										
                                        <label class="text-left">Deductions</label><br>					
                                        <input id="icm_forgn_incm_docs" name="icm_forgn_incm_docs" type="file" class="file">
                                    </div>
                                </div>				
                            </div>
                            <div class="row">
                                <div class="col-sm-6">					
                                    <br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_forgn_incm_docs; ?>"> <?php echo @$incomelodgement->icm_forgn_incm_docs; ?></a></p>
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
    <div class="panel-heading" role="tab" id="heading20">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse20" aria-expanded="false" aria-controls="collapse20">
                20. Investment property income</a>
        </h4>
    </div>
    <div id="collapse20" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading20">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">					
                        <label>Do you own an investment property that you earn rental income? </label> 
                        <label class="radio-inline">
                            <input type="radio" class="has-div-to-show" name="icm_invt_prty_rntl_icm_q" value="yes" <?php if (@$incomelodgement->icm_invt_prty_rntl_icm_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                        </label>
                        <label class="radio-inline">							
                            <input type="radio" class="has-div-to-show" name="icm_invt_prty_rntl_icm_q" value="no" <?php if (@$incomelodgement->icm_invt_prty_rntl_icm_q == "no" || @$incomelodgement->icm_invt_prty_rntl_icm_q == "") {
                                echo "checked";
                            } ?>> No
                        </label>								
                        <div class="hidden to-show">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">										
                                        <label class="text-left">Address of rental property</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_adrs" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_adrs; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">										
                                        <label class="text-left">Percentage of Ownership</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_pct_ownr" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_pct_ownr; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">										
                                        <label class="text-left">Number of weeks available for rent</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_wks_avl_rnt" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_wks_avl_rnt; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">										
                                        <label class="text-left">Date First Rented</label><br>					
                                        <div class='input-group date' id='date_received_from'>
                                            <input type='text' class="form-control datepicker" name="icm_invt_prty_rntl_dt_fst_rntd" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_dt_fst_rntd; ?>"/>
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
                                        <label class="text-left">Attach Rental Statement</label><br>
                                        <input id="icm_invt_prty_rntl_docs" name="icm_invt_prty_rntl_docs" type="file" class="file">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">					
                                    <br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_invt_prty_rntl_docs; ?>"> <?php echo @$incomelodgement->icm_invt_prty_rntl_docs; ?></a></p>
                                </div>				
                            </div>				

                            <div class="row">				
                                <div class="col-sm-12">
                                    <h4>Income</h4>
                                </div>
                            </div>

                            <div class="row">				
                                <div class="col-sm-6">
                                    <div class="form-group">										
                                        <label class="text-left">Description</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_icm_desc" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_icm_desc; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">										
                                        <label class="text-left">Amount</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_amnt" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_amnt; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">&nbsp;</div>
                            </div>

                            <div class="row">				
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">Advertising</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_advt" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_advt; ?>" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">Admin Levy</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_adm_lvy" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_adm_lvy; ?>" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">Body Corporate Fees</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_corp_fes" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_corp_fes; ?>" placeholder="Amount">
                                    </div>
                                </div>
                            </div>

                            <div class="row">				
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">Council Rates</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_cncl_rts" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_cncl_rts; ?>" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">Capital Works Deduction</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_cap_wks_ded" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_cap_wks_ded; ?>" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">Cleaning</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_clning" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_clning; ?>" placeholder="Amount">
                                    </div>
                                </div>
                            </div>

                            <div class="row">				
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">Depreciation</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_deprctn" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_deprctn; ?>" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">Electricity</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_elect" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_elect; ?>" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">GST</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_gst" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_gst; ?>" placeholder="Amount">
                                    </div>
                                </div>
                            </div>

                            <div class="row">				
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">Garden Maintenance</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_grdn_mnt" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_grdn_mnt; ?>" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">Inspection Fees</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_isptn_fes" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_isptn_fes; ?>" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">Leasing Fees</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_lese_fes" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_lese_fes; ?>" placeholder="Amount">
                                    </div>
                                </div>
                            </div>

                            <div class="row">				
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">Pest Control</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_pst_cntrl" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_pst_cntrl; ?>" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">Repairs and Maintenance</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_reprs_main" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_reprs_main; ?>" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">Property Management Fees</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_prpty_mng_fes" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_prpty_mng_fes; ?>" placeholder="Amount">
                                    </div>
                                </div>
                            </div>

                            <div class="row">				
                                <div class="col-sm-3">
                                    <div class="form-group">										
                                        <label class="text-left">Postage</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_postge" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_postge; ?>" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">										
                                        <label class="text-left">Sundries</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_sundries" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_sundries; ?>" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">										
                                        <label class="text-left">Water Rates and Charges</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_watr_rts" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_watr_rts; ?>" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">										
                                        <label class="text-left">Others</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_others" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_others; ?>" placeholder="Amount">
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
    <div class="panel-heading" role="tab" id="heading21">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse21" aria-expanded="false" aria-controls="collapse21">
                21. Other income</a>
        </h4>
    </div>
    <div id="collapse21" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading21">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">					
                        <label>Did you earn any other income? </label> 
                        <label class="radio-inline">
                            <input type="radio" class="has-div-to-show" name="icm_invt_prty_rntl_othr_icm_q" value="yes" <?php if (@$incomelodgement->icm_invt_prty_rntl_othr_icm_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                        </label>
                        <label class="radio-inline">							
                            <input type="radio" class="has-div-to-show" name="icm_invt_prty_rntl_icm_q" value="no" <?php if (@$incomelodgement->icm_invt_prty_rntl_icm_q == "no" || @$incomelodgement->icm_invt_prty_rntl_icm_q == "") {
                                echo "checked";
                            } ?>> No
                        </label>								
                        <div class="hidden to-show">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">Description</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_othr_desc" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_othr_desc; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">Received From</label><br>					
                                        <div class='input-group date' id='date_received_from'>
                                            <input type='text' class="form-control datepicker" name="icm_invt_prty_rntl_othr_dt_frm" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_othr_dt_frm; ?>"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>					
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">										
                                        <label class="text-left">Amount</label><br>
                                        <input type="text" name="icm_invt_prty_rntl_othr_amnt" class="form-control" value="<?php echo @$incomelodgement->icm_invt_prty_rntl_othr_amnt; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">					
                                    <div class="form-group">										
                                        <label class="text-left">Attach Evidence</label><br>					
                                        <input id="icm_invt_prty_rntl_othe_docs" name="icm_invt_prty_rntl_othe_docs" type="file" class="file">
                                    </div>	
                                </div>				
                            </div>
                            <div class="row">
                                <div class="col-sm-6">					
                                    <br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_invt_prty_rntl_othe_docs; ?>"> <?php echo @$incomelodgement->icm_invt_prty_rntl_othe_docs; ?></a></p>
                                </div>				
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- -->   

    </div>
</div>
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

<div>
</div>