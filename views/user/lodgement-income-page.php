<div class="wrap lcp-content">

    <h2><?php echo $page_title; ?></h2>

    <?php if (@$message) : ?>
        <p class="text-left alert alert-success" role="alert"><?php echo $message; ?></p>
    <?php endif; ?>

    <form class="income" action="" method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group pull-right">
                    <input type="submit" class="btn btn-success update" name="op" value="Save">
                    <a href="#" class="btn btn-default openall">Expand All</a>
                </div>
            </div>
        </div>

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


	<div class="table-responsive">
	  <table class="table table-bordered">
	  
	  <thead>
	  <tr>	  
	  <th>Did you earn any income from?</th>
	  <th>Yes/No</th>
	  <th>Comment/Notes</th>
	  <th>Attach document</th>
	  </tr>
	  </thead>
	  
	  <tbody>
	  <tr>
	  <td>Salary and Wages</td>
	  <td>gsf</td>
	  <td>gsf</td>
	  <td>gsf</td>
	  </tr>
	  
	  </tbody>
	  </table>
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
	
	                        <!-- Start content section -->
				            <div class="row">		                       
			                       <div class="col-sm-4">                       
			                       		<div class="form-group">
			                               <label>Did you earn a salary or wage?</label> 
			                               <label class="radio-inline">
			                                   <input type="radio" class="has-div-to-show" name="icm_ern_salary_or_wage_q" value="yes" <?php if (@$incomelodgement->icm_ern_salary_or_wage_q == "yes") {echo "checked";} ?>> Yes								
			                               </label>
			                               <label class="radio-inline">							
			                                   <input type="radio" class="has-div-to-show" name="icm_ern_salary_or_wage_q" value="no" <?php if (@$incomelodgement->icm_ern_salary_or_wage_q == "no" || @$incomelodgement->icm_ern_salary_or_wage_q == "") {echo "checked";} ?>> No
			                               </label>				
			                       		</div>                       
			                       </div>		                       
		                       
			                       <div class="col-sm-4">
			                       		<div class="form-group">
			                       		<label>Comment / Notes</label> 
			                       		<textarea class="form-control" rows="3" name="icm_ern_salary_or_wage_c"><?php if (@$incomelodgement->icm_ern_salary_or_wage_c != "") {echo @$incomelodgement->icm_ern_salary_or_wage_c;} ?>
			                       		</textarea>
			                       		</div>
			                       </div>		                       
		                       
			                       <div class="col-sm-4">                       	
                       		            <div class="form-group">
                       		            <label class="control-label">Attach Document</label>							
                       		            <input id="icm_payg_summary_docs" type="file" class="file" name="icm_payg_summary_docs" value="<?php echo @$incomelodgement->icm_payg_summary_docs; ?>">
                       		    				
                       		            <br><p>Current upload(s): <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_payg_summary_docs; ?>"> <?php echo @$incomelodgement->icm_payg_summary_docs; ?></a></p>                      
			                       		</div>
			                       </div>                 
                   		 		</div>
	                        </div>	
	                        <!-- End content section -->
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
					
					<!-- Start content section -->
					<div class="row">		                       
						   <div class="col-sm-4">                       
								<div class="form-group">
								   <label>Did you earn allowances, earnings, tips, directors fees etc?</label> 
									<label class="radio-inline">
										<input type="radio" class="has-div-to-show" name="icm_alwn_erns_tips_q" value="yes" <?php if (@$incomelodgement->icm_alwn_erns_tips_q == "yes") {echo "checked";} ?>> Yes								
									</label>
									<label class="radio-inline">							
										<input type="radio" class="has-div-to-show" name="icm_alwn_erns_tips_q" value="no" <?php if (@$incomelodgement->icm_alwn_erns_tips_q == "no" || @$incomelodgement->icm_alwn_erns_tips_q == "") {echo "checked";} ?>> No
									</label>			
								</div>                       
						   </div>		                       
					   
						   <div class="col-sm-4">
								<div class="form-group">
								<label>Comment / Notes</label> 
								<textarea class="form-control" rows="3" name="icm_alwn_erns_tips_c"><?php if (@$incomelodgement->icm_alwn_erns_tips_c != "") {echo @$incomelodgement->icm_alwn_erns_tips_c;} ?>
								</textarea>
								</div>
						   </div>		                       
					   
						   <div class="col-sm-4">                       	
								<div class="form-group">
								 <label class="control-label">Attach Evidence</label>							
					             <input id="icm_alwn_erns_tips_docs" type="file" class="file" name="icm_alwn_erns_tips_docs" value="<?php echo @$incomelodgement->icm_alwn_erns_tips_docs; ?>">
										
								<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_alwn_erns_tips_docs; ?>"> <?php echo @$incomelodgement->icm_alwn_erns_tips_docs; ?></a></p>                    
								</div>
						   </div>                 
						</div>	
					<!-- End content section -->
                   
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

                    <!-- Start content section -->
                    <div class="row">		                       
                    	   <div class="col-sm-4">                       
                    			<div class="form-group">
                    			   <label>Did you receive any Employer lump sum payments?</label>
                                    <label class="radio-inline">
                                        <input type="radio" class="has-div-to-show lump" name="icm_employr_lump_pymtns_q" value="yes" <?php if (@$incomelodgement->icm_employr_lump_pymtns_q == "yes") {echo "checked";} ?>> Yes								
                                    </label>
                                    <label class="radio-inline">							
                                        <input type="radio" class="has-div-to-show lump" name="icm_employr_lump_pymtns_q" value="no" <?php if (@$incomelodgement->icm_employr_lump_pymtns_q == "no" || @$incomelodgement->icm_employr_lump_pymtns_q == "") {echo "checked";} ?>> No
                                    </label>		
                    			</div>                       
                    	   </div>		                       
                       
                    	   <div class="col-sm-4">
                    			<div class="form-group">
                    			<label>Comment / Notes</label> 
                    			<textarea class="form-control" rows="3" name="icm_employr_lump_pymtns_c"><?php if (@$incomelodgement->icm_employr_lump_pymtns_c != "") {echo @$incomelodgement->icm_employr_lump_pymtns_c;} ?></textarea>
                    			</div>
                    	   </div>		                       
                       
                    	   <div class="col-sm-4">                       	
                    			<div class="form-group">
                    			 <label class="control-label">Attach Evidence</label>							
                                 <input id="icm_employr_lump_pymtns_docs" name="icm_employr_lump_pymtns_docs" type="file" class="file">	
                    					
                    			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_employr_lump_pymtns_docs; ?>"> <?php echo @$incomelodgement->icm_employr_lump_pymtns_docs; ?></a></p>                  
                    			</div>
                    	   </div>                 
                    	</div>
                    <!-- End content section -->
                </div>	

            </div>
        </div>

       <!-- -->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThreeA">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThreeA" aria-expanded="false" aria-controls="collapseThreeA">
                        4. Employer Termination payments</a>
                </h4>
            </div>
            <div id="collapseThreeA" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThreeA">
                <div class="panel-body">

                    <!-- Start content section -->
                    <div class="row">		                       
                    	   <div class="col-sm-4">                       
                    			<div class="form-group">
                    			   <label>Did you receive any employer termination payments?</label>
                                    <label class="radio-inline">
                                        <input type="radio" class="has-div-to-show lump" name="icm_employr_term_pymtns_q" value="yes" <?php if (@$incomelodgement->icm_employr_term_pymtns_q == "yes") {echo "checked";} ?>> Yes								
                                    </label>
                                    <label class="radio-inline">							
                                        <input type="radio" class="has-div-to-show lump" name="icm_employr_term_pymtns_q" value="no" <?php if (@$incomelodgement->icm_employr_term_pymtns_q == "no" || @$incomelodgement->icm_employr_term_pymtns_q == "") {echo "checked";} ?>> No
                                    </label>		
                    			</div>                       
                    	   </div>		                       
                       
                    	   <div class="col-sm-4">
                    			<div class="form-group">
                    			<label>Comment / Notes</label> 
                    			<textarea class="form-control" rows="3" name="icm_employr_term_pymtns_c"><?php if (@$incomelodgement->icm_employr_term_pymtns_c != "") {echo @$incomelodgement->icm_employr_term_pymtns_c;} ?></textarea>
                    			</div>
                    	   </div>		                       
                       
                    	   <div class="col-sm-4">                       	
                    			<div class="form-group">
                    			 <label class="control-label">Attach Evidence</label>							
                                 <input id="icm_employr_term_pymtns_docs" name="icm_employr_term_pymtns_docs" type="file" class="file">	
                    					
                    			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_employr_term_pymtns_docs; ?>"> <?php echo @$incomelodgement->icm_employr_term_pymtns_docs; ?></a></p>                  
                    			</div>
                    	   </div>                 
                    	</div>
                    <!-- End content section -->
                </div>	

            </div>
        </div>
        
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

            <!-- Start content section -->
            <div class="row">		                       
            	   <div class="col-sm-4">                       
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
            			</div>                       
            	   </div>		                       
               
            	   <div class="col-sm-4">
            			<div class="form-group">
            			<label>Comment / Notes</label> 
            			<textarea class="form-control" rows="3" name="icm_au_gov_alwnc_c"><?php if (@$incomelodgement->icm_au_gov_alwnc_c != "") {echo @$incomelodgement->icm_au_gov_alwnc_c;} ?>
            			</textarea>
            			</div>
            	   </div>		                       
               
            	   <div class="col-sm-4">                       	
            			<div class="form-group">
            			 <label class="control-label">Attach Evidence</label>							
                         <input id="icm_au_gov_alwnc_docs" name="icm_au_gov_alwnc_docs" type="file" class="file">	
            					
            			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_au_gov_alwnc_docs; ?>"> <?php echo @$incomelodgement->icm_au_gov_alwnc_docs; ?></a></p>                  
            			</div>
            	   </div>                 
            	</div>
            <!-- End content section -->

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

           <!-- Start content section -->
           <div class="row">		                       
           	   <div class="col-sm-4">                       
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
           			</div>                       
           	   </div>		                       
              
           	   <div class="col-sm-4">
           			<div class="form-group">
           			<label>Comment / Notes</label> 
           			<textarea class="form-control" rows="3" name="icm_au_gov_pensions_c"><?php if (@$incomelodgement->icm_au_gov_pensions_c != "") {echo @$incomelodgement->icm_au_gov_pensions_c;} ?>
           			</textarea>
           			</div>
           	   </div>		                       
              
           	   <div class="col-sm-4">                       	
           			<div class="form-group">
           			 <label class="control-label">Attach Evidence</label>							
                        <input id="icm_au_gov_pensions_docs" name="icm_au_gov_pensions_docs" type="file" class="file">	
           					
           			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_au_gov_pensions_docs; ?>"> <?php echo @$incomelodgement->icm_au_gov_pensions_docs; ?></a></p>                  
           			</div>
           	   </div>                 
           	</div>	
           <!-- End content section -->

        </div>
    </div>
</div>
<!-- -->

<!-- -->
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading7">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
                7. Australian annuities and superannuation income stream</a>
        </h4>
    </div>
    <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
        <div class="panel-body">

            <!-- Start content section -->
            <div class="row">		                       
            	   <div class="col-sm-4">                       
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
            			</div>                       
            	   </div>		                       
               
            	   <div class="col-sm-4">
            			<div class="form-group">
            			<label>Comment / Notes</label> 
            			<textarea class="form-control" rows="3" name="icm_au_supr_inc_strm_c"><?php if (@$incomelodgement->icm_au_supr_inc_strm_c != "") {echo @$incomelodgement->icm_au_supr_inc_strm_c;} ?>
            			</textarea>
            			</div>
            	   </div>		                       
               
            	   <div class="col-sm-4">                       	
            			<div class="form-group">
            			 <label class="control-label">Attach Evidence</label>							
                         <input id="icm_au_supr_inc_strm_docs" name="icm_au_supr_inc_strm_docs" type="file" class="file">	
            					
            			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_au_supr_inc_strm_docs; ?>"> <?php echo @$incomelodgement->icm_au_supr_inc_strm_docs; ?></a></p>                  
            			</div>
            	   </div>                 
            	</div>
            <!-- End content section -->

        </div>
    </div>
</div>
<!-- -->

<!-- -->
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading8">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapse8">
                8. Australian superannuation lump sum payment</a>
        </h4>
    </div>
    <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
        <div class="panel-body">

           <!-- Start content section -->
           <div class="row">		                       
           	   <div class="col-sm-4">                       
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
           			</div>                       
           	   </div>		                       
              
           	   <div class="col-sm-4">
           			<div class="form-group">
           			<label>Comment / Notes</label> 
           			<textarea class="form-control" rows="3" name="icm_au_supr_lump_paymt_c"><?php if (@$incomelodgement->icm_au_supr_lump_paymt_c != "") {echo @$incomelodgement->icm_au_supr_lump_paymt_c;} ?>
           			</textarea>
           			</div>
           	   </div>		                       
              
           	   <div class="col-sm-4">                       	
           			<div class="form-group">
           			 <label class="control-label">Attach Evidence</label>							
                        <input id="icm_au_supr_lump_paymt_docs" name="icm_au_supr_lump_paymt_docs" type="file" class="file">	
           					
           			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_au_supr_lump_paymt_docs; ?>"> <?php echo @$incomelodgement->icm_au_supr_lump_paymt_docs; ?></a></p>                  
           			</div>
           	   </div>                 
           	</div>
           <!-- End content section -->

        </div>
    </div>
</div>
<!-- -->


<!-- -->
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading9">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="false" aria-controls="collapse9">
                9. Attributed personal services income</a>
        </h4>
    </div>
    <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading9">
        <div class="panel-body">

           <!-- Start content section -->
           <div class="row">		                       
           	   <div class="col-sm-4">                       
           			<div class="form-group">
           			 <label>Have you received income from a company or a trust for which you performed personal service for, and received attributed personal services income from?</label> 
                       <label class="radio-inline">
                           <input type="radio" class="has-div-to-show" name="icm_attr_ser_inc_q" value="yes" <?php if (@$incomelodgement->icm_attr_ser_inc_q == "yes") {
                               echo "checked";
                           } ?>> Yes								
                       </label>
                       <label class="radio-inline">							
                           <input type="radio" class="has-div-to-show" name="icm_attr_ser_inc_q" value="no" <?php if (@$incomelodgement->icm_attr_ser_inc_q == "no" || @$incomelodgement->icm_attr_ser_inc_q == "") {
                               echo "checked";
                           } ?>> No
                       </label>
           			</div>                       
           	   </div>		                       
              
           	   <div class="col-sm-4">
           			<div class="form-group">
           			<label>Comment / Notes</label> 
           			<textarea class="form-control" rows="3" name="icm_attr_ser_inc_c"><?php if (@$incomelodgement->icm_attr_ser_inc_c != "") {echo @$incomelodgement->icm_attr_ser_inc_c;} ?>
           			</textarea>
           			</div>
           	   </div>		                       
              
           	   <div class="col-sm-4">                       	
           			<div class="form-group">
           			 <label class="control-label">Attach Evidence</label>							
                        <input id="icm_attr_ser_inc_docs" name="icm_attr_ser_inc_docs" type="file" class="file">	
           					
           			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_attr_ser_inc_docs; ?>"> <?php echo @$incomelodgement->icm_attr_ser_inc_docs; ?></a></p>                  
           			</div>
           	   </div>                 
           	</div>
           <!-- End content section -->
           
        </div>
    </div>
</div>
<!-- -->


<!-- -->
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading10">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="false" aria-controls="collapse10">
                10. Gross Interest</a>
        </h4>
    </div>
    <div id="collapse10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading10">
        <div class="panel-body">

           <!-- Start content section -->
           <div class="row">		                       
           	   <div class="col-sm-4">                       
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
           			</div>                       
           	   </div>		                       
              
           	   <div class="col-sm-4">
           			<div class="form-group">
           			<label>Comment / Notes</label> 
           			<textarea class="form-control" rows="3" name="icm_intst_icm_c"><?php if (@$incomelodgement->icm_intst_icm_c != "") {echo @$incomelodgement->icm_intst_icm_c;} ?>
           			</textarea>
           			</div>
           	   </div>		                       
              
           	   <div class="col-sm-4">                       	
           			<div class="form-group">
           			 <label class="control-label">Attach Evidence</label>							
                        <input id="icm_intst_icm_docs" name="icm_intst_icm_docs" type="file" class="file">	
           					
           			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_intst_icm_docs; ?>"> <?php echo @$incomelodgement->icm_intst_icm_docs; ?></a></p>                  
           			</div>
           	   </div>                 
           	</div>
           <!-- End content section --> 

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

            <!-- Start content section -->
            <div class="row">		                       
            	   <div class="col-sm-4">                       
            			<div class="form-group">
    			           <label>Did you receive dividends?</label> 
                            <label class="radio-inline">
                                <input type="radio" class="has-div-to-show" name="icm_recve_dvdends_q" value="yes" <?php if (@$incomelodgement->icm_recve_dvdends_q == "yes") {echo "checked";} ?>> Yes								
                            </label>
                            <label class="radio-inline">							
                                <input type="radio" class="has-div-to-show" name="icm_recve_dvdends_q" value="no" <?php if (@$incomelodgement->icm_recve_dvdends_q == "no" || @$incomelodgement->icm_recve_dvdends_q == "") {
                                    echo "checked";} ?>> No
                            </label>
            			</div>                       
            	   </div>		                       
               
            	   <div class="col-sm-4">
            			<div class="form-group">
            			<label>Comment / Notes</label> 
            			<textarea class="form-control" rows="3" name="icm_recve_dvdends_c"><?php if (@$incomelodgement->icm_recve_dvdends_c != "") {echo @$incomelodgement->icm_recve_dvdends_c;} ?>
            			</textarea>
            			</div>
            	   </div>		                       
               
            	   <div class="col-sm-4">                       	
            			<div class="form-group">
            			 <label class="control-label">Attach Evidence</label>							
                         <input id="icm_recve_dvdends_docs" name="icm_recve_dvdends_docs" type="file" class="file">	
            					
            			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_recve_dvdends_docs; ?>"> <?php echo @$incomelodgement->icm_recve_dvdends_docs; ?></a></p>                  
            			</div>
            	   </div>                 
            	</div>
            <!-- End content section -->    

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

            <!-- Start content section -->
            <div class="row">		                       
            	   <div class="col-sm-4">                       
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
            			</div>                       
            	   </div>		                       
               
            	   <div class="col-sm-4">
            			<div class="form-group">
            			<label>Comment / Notes</label> 
            			<textarea class="form-control" rows="3" name="icm_intst_icm_c"><?php if (@$incomelodgement->icm_prt_emp_shr_schme_c != "") {echo @$incomelodgement->icm_prt_emp_shr_schme_c;} ?>
            			</textarea>
            			</div>
            	   </div>		                       
               
            	   <div class="col-sm-4">                       	
            			<div class="form-group">
            			 <label class="control-label">Attach Evidence</label>							
                         <input id="icm_prt_emp_shr_schme_docs" name="icm_prt_emp_shr_schme_docs" type="file" class="file">	
            					
            			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_prt_emp_shr_schme_docs; ?>"> <?php echo @$incomelodgement->icm_prt_emp_shr_schme_docs; ?></a></p>                  
            			</div>
            	   </div>                 
            	</div>
            <!-- End content section -->
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

           <!-- Start content section -->
           <div class="row">		                       
           	   <div class="col-sm-4">                       
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
           			</div>                       
           	   </div>		                       
              
           	   <div class="col-sm-4">
           			<div class="form-group">
           			<label>Comment / Notes</label> 
           			<textarea class="form-control" rows="3" name="icm_distbtn_prtnshps_trsts_c"><?php if (@$incomelodgement->icm_distbtn_prtnshps_trsts_c != "") {echo @$incomelodgement->icm_distbtn_prtnshps_trsts_c;} ?>
           			</textarea>
           			</div>
           	   </div>		                       
              
           	   <div class="col-sm-4">                       	
           			<div class="form-group">
           			 <label class="control-label">Attach Evidence</label>							
                        <input id="icm_distbtn_prtnshps_trsts_docs" name="icm_distbtn_prtnshps_trsts_docs" type="file" class="file">	
           					
           			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_distbtn_prtnshps_trsts_docs; ?>"> <?php echo @$incomelodgement->icm_distbtn_prtnshps_trsts_docs; ?></a></p>                  
           			</div>
           	   </div>                 
           	</div>
           <!-- End content section -->

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

           <!-- Start content section -->
           <div class="row">		                       
           	   <div class="col-sm-4">                       
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
           			</div>                       
           	   </div>		                       
              
           	   <div class="col-sm-4">
           			<div class="form-group">
           			<label>Comment / Notes</label> 
           			<textarea class="form-control" rows="3" name="icm_psnl_srv_icm_c"><?php if (@$incomelodgement->icm_psnl_srv_icm_c != "") {echo @$incomelodgement->icm_psnl_srv_icm_c;} ?>
           			</textarea>
           			</div>
           	   </div>		                       
              
           	   <div class="col-sm-4">                       	
           			<div class="form-group">
           			 <label class="control-label">Attach Evidence</label>							
                        <input id="icm_psnl_srv_icm_docs" name="icm_psnl_srv_icm_docs" type="file" class="file">	
           					
           			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_psnl_srv_icm_docs; ?>"> <?php echo @$incomelodgement->icm_psnl_srv_icm_docs; ?></a></p>                  
           			</div>
           	   </div>                 
           	</div>
           <!-- End content section -->
        </div>
    </div>
</div>
<!-- -->


<!-- -->
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading15">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse15" aria-expanded="false" aria-controls="collapse15">
                15. Business income</a>
        </h4>
    </div>
    <div id="collapse15" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading15">
        <div class="panel-body">

            <!-- Start content section -->
            <div class="row">		                       
            	   <div class="col-sm-4">                       
            			<div class="form-group">
            			<label>Did you receive any business income?</label> 
                    <label class="radio-inline">
                        <input type="radio" class="has-div-to-show" name="icm_business_inc_q" value="yes" <?php if (@$incomelodgement->icm_business_inc_q == "yes") {
                            echo "checked";
                        } ?>> Yes								
                    </label>
                    <label class="radio-inline">							
                        <input type="radio" class="has-div-to-show" name="icm_business_inc_q" value="no" <?php if (@$incomelodgement->icm_business_inc_q == "no" || @$incomelodgement->icm_business_inc_q == "") {
                            echo "checked";
                        } ?>> No
                    </label>          			
        			
        				<div class="hidden to-show">
        			        <div class="row">
        			        <div class="col-sm-12">
        			            <div class="form-group">										
        			                <label class="text-left">ABN</label><br>
        			                <input type="text" name="icm_business_inc_abn" class="form-control" value="<?php echo @$incomelodgement->icm_business_inc_abn; ?>">
        			            </div>
        			        </div>
        			        <div class="col-sm-12">
        			        	<div class="form-group">										
        			                <label class="text-left">Business Name</label><br>
        			                <input type="text" name="icm_business_inc_name" class="form-control" value="<?php echo @$incomelodgement->icm_business_inc_name; ?>">
        			            </div>
        			        </div>
        			        <div class="col-sm-12">
        			            <div class="form-group">										
        			                <label class="text-left">Business Address</label><br>
        			                <input type="text" name="icm_business_inc_address" class="form-control" value="<?php echo @$incomelodgement->icm_business_inc_address; ?>">
        			            </div>
        			        </div>
        			    </div>               
            	   		</div>	
        			
        			</div>                   
               	</div>
               		
               		
            	   <div class="col-sm-4">
            			<div class="form-group">
            			<label>Comment / Notes</label> 
            			<textarea class="form-control" rows="3" name="icm_business_inc_c"><?php if (@$incomelodgement->icm_business_inc_c != "") {echo @$incomelodgement->v;} ?>
            			</textarea>
            			</div>
            	   </div>		                       
               
            	   <div class="col-sm-4">                       	
            			<div class="form-group">
            			 <label class="control-label">Attach Evidence</label>							
                         <input id="icm_psnl_srv_icm_docs" name="icm_business_inc_docs" type="file" class="file">	
            					
            			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_business_inc_docs; ?>"> <?php echo @$incomelodgement->icm_business_inc_docs; ?></a></p>                  
            			</div>
            	   </div>                 
            	</div>
            <!-- End content section -->	

        </div>
    </div>
</div>
<!-- -->

<!-- -->
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading18">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse18" aria-expanded="false" aria-controls="collapse18">
                16. Capital gains or loss</a>
        </h4>
    </div>
    <div id="collapse18" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading18">
        <div class="panel-body">

            <!-- Start content section -->
            <div class="row">		                       
            	   <div class="col-sm-4">                       
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
            			</div>                       
            	   </div>		                       
               
            	   <div class="col-sm-4">
            			<div class="form-group">
            			<label>Comment / Notes</label> 
            			<textarea class="form-control" rows="3" name="icm_captl_gns_ls_c"><?php if (@$incomelodgement->icm_captl_gns_ls_c != "") {echo @$incomelodgement->icm_captl_gns_ls_c;} ?>
            			</textarea>
            			</div>
            	   </div>		                       
               
            	   <div class="col-sm-4">                       	
            			<div class="form-group">
            			 <label class="control-label">Attach Evidence</label>							
                         <input id="icm_captl_gns_ls_docs" name="icm_captl_gns_ls_docs" type="file" class="file">	
            					
            			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_captl_gns_ls_docs; ?>"> <?php echo @$incomelodgement->icm_captl_gns_ls_docs; ?></a></p>                  
            			</div>
            	   </div>                 
            	</div>
            <!-- End content section -->

        </div>
    </div>
</div>
<!-- -->

<!-- -->
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading19">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse19" aria-expanded="false" aria-controls="collapse19">
                17. Foreign income</a>
        </h4>
    </div>
    <div id="collapse19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading19">
        <div class="panel-body">

          <!-- Start content section -->
          <div class="row">		                       
          	   <div class="col-sm-4">                       
          			<div class="form-group">
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
          			</div>                       
          	   </div>		                       
             
          	   <div class="col-sm-4">
          			<div class="form-group">
          			<label>Comment / Notes</label> 
          			<textarea class="form-control" rows="3" name="icm_forgn_incm_c"><?php if (@$incomelodgement->icm_forgn_incm_c != "") {echo @$incomelodgement->icm_forgn_incm_c;} ?>
          			</textarea>
          			</div>
          	   </div>		                       
             
          	   <div class="col-sm-4">                       	
          			<div class="form-group">
          			 <label class="control-label">Attach Evidence</label>							
                       <input id="icm_forgn_incm_docs" name="icm_forgn_incm_docs" type="file" class="file">	
          					
          			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_forgn_incm_docs; ?>"> <?php echo @$incomelodgement->icm_forgn_incm_docs; ?></a></p>                  
          			</div>
          	   </div>                 
          	</div>	
          <!-- End content section -->

        </div>
    </div>
</div>
<!-- -->

<!-- -->
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading21">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse21" aria-expanded="false" aria-controls="collapse21">
                18. Other income</a>
        </h4>
    </div>
    <div id="collapse21" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading21">
        <div class="panel-body">

            <!-- Start content section -->
            <div class="row">		                       
            	   <div class="col-sm-4">                       
            			<div class="form-group">
            			<label>Did you earn any other income? </label> 
                            <label class="radio-inline">
                                <input type="radio" class="has-div-to-show" name="icm_othr_icm_q" value="yes" <?php if (@$incomelodgement->icm_othr_icm_q == "yes") {
                                    echo "checked";
                                } ?>> Yes								
                            </label>
                            <label class="radio-inline">							
                                <input type="radio" class="has-div-to-show" name="icm_othr_icm_q" value="no" <?php if (@$incomelodgement->icm_othr_icm_q == "no" || @$incomelodgement->icm_othr_icm_q == "") {
                                    echo "checked";
                                } ?>> No
                            </label>
            			</div>                       
            	   </div>		                       
               
            	   <div class="col-sm-4">
            			<div class="form-group">
            			<label>Comment / Notes</label> 
            			<textarea class="form-control" rows="3" name="icm_othr_icm_c"><?php if (@$incomelodgement->icm_othr_icm_c != "") {echo @$incomelodgement->icm_othr_icm_c;} ?>
            			</textarea>
            			</div>
            	   </div>		                       
               
            	   <div class="col-sm-4">                       	
            			<div class="form-group">
            			 <label class="control-label">Attach Evidence</label>							
                         <input id="icm_othr_icm_docs" name="icm_othr_icm_docs" type="file" class="file">	
            					
            			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/income/' . @$incomelodgement->icm_othr_icm_docs; ?>"> <?php echo @$incomelodgement->icm_othr_icm_docs; ?></a></p>                  
            			</div>
            	   </div>                 
            	</div>
            <!-- End content section -->
        </div>
        <!-- -->   

    </div>
</div>
<!-- end accordians -->

<div class="row">
    <div class="col-sm-12">
        <div class="form-group pull-right">
            <input type="submit" class="btn btn-success update" name="option" value="Save">							
        </div>
    </div>
</div>
</form>

<div>
<?php
//echo '<pre>';
//print_r(@$incomelodgement);
//convert ojbect to array
//$income_array = (array) $incomelodgement;
//var_dump($income_array);
//echo '</pre>';
?>
</div>