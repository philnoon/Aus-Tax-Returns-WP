<div class="wrap lcp-content">

    <h2><?php echo $page_title; ?></h2>

    <?php if (@$message) : ?>
        <p class="text-center alert alert-success" role="alert"><?php echo $message; ?></p>
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
//echo plugins_url().'/lead-capture-pro/client-docs/'.$user_data->user_login.'/deductions/'.@$incomeDeduction->icm_payg_summary_docs;
//print_r($user_data);				
//$username = $user_data->user_login;
//echo $username;
        ?>	

        <!-- start -->
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            1. Vehicle deductions</a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">      
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Do you use your vehicle for work related purposes / business travel?</label> 
                                    <label class="radio-inline">
                                        <input type="radio" class="has-div-to-show" name="ded_veh_wk_purposes_q" value="yes" <?php if (@$incomeDeduction->ded_veh_wk_purposes_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                                    </label>
                                    <label class="radio-inline">							
                                        <input type="radio" class="has-div-to-show" name="ded_veh_wk_purposes_q" value="no" <?php if (@$incomeDeduction->ded_veh_wk_purposes_q == "no" || @$incomeDeduction->ded_veh_wk_purposes_q == "") {
                                echo "checked";
                            } ?>> No
                                    </label>				

                                    <div class="hidden to-show">

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="text-center">Make</label><br>
                                                    <input type="text"  class="form-control" name="ded_veh_wk_make" id="" value="<?php echo @$incomeDeduction->ded_veh_wk_make; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="text-center">Model</label><br>
                                                    <input type="text"  class="form-control" name="ded_veh_wk_model" id="" value="<?php echo @$incomeDeduction->ded_veh_wk_model; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="text-center">Engine Size</label>
                                                    <input type="text"  class="form-control" name="ded_veh_wk_engine_size" id="" value="<?php echo @$incomeDeduction->ded_veh_wk_engine_size; ?>" placeholder="">
                                                </div>
                                            </div>      					
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="text-center">Opening Mileage</label><br>
                                                    <input type="text"  class="form-control" name="ded_veh_wk_opening_mileage" id="" value="<?php echo @$incomeDeduction->ded_veh_wk_opening_mileage; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="text-center">Closing Mileage</label><br>
                                                    <input type="text"  class="form-control" name="ded_veh_wk_closing_mileage" id="" value="<?php echo @$incomeDeduction->ded_veh_wk_closing_mileage; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="text-center">Purchase Price</label>
                                                    <input type="text"  class="form-control" name="ded_veh_wk_purchase_price" id="" value="<?php echo @$incomeDeduction->ded_veh_wk_purchase_price; ?>">
                                                </div>
                                            </div>      					
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">     									
                                                    <label class="text-center">Purchased Date</label><br>
                                                    <div class='input-group date' id='date_received_from'>
                                                        <input type='text' class="form-control datepicker" name="ded_veh_wk_purchased_date" value="<?php echo @$incomeDeduction->ded_veh_wk_purchased_date; ?>"/>
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>      									
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="text-center">Business Kilometres Driven</label><br>
                                                    <input type="text"  class="form-control" name="ded_veh_wk_kilo_driven" id="" value="<?php echo @$incomeDeduction->ded_veh_wk_kilo_driven; ?>">
                                                </div>
                                            </div>      					
                                        </div>

                                        <div class="row">     
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="text-center">Expense</label><br>
                                                    <input type="text"  class="form-control" name="ded_veh_expense" id="" value="<?php echo @$incomeDeduction->ded_veh_expense; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="text-center">Lease Payment / Interest Paid on Purchase</label><br>
                                                    <input type="text"  class="form-control" name="ded_veh_lease_interest" id="" value="<?php echo @$incomeDeduction->ded_veh_lease_interest; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="text-center">Rego</label><br>
                                                    <input type="text"  class="form-control" name="ded_veh_rego" id="" value="<?php echo @$incomeDeduction->ded_veh_rego; ?>">
                                                </div>
                                            </div> 
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="text-center">Insurance</label><br>
                                                    <input type="text"  class="form-control" name="ded_veh_insurance" id="" value="<?php echo @$incomeDeduction->ded_veh_insurance; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="text-center">Services</label><br>
                                                    <input type="text"  class="form-control" name="ded_veh_services" id="" value="<?php echo @$incomeDeduction->ded_veh_services; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="text-center">Tyres / Batteries</label><br>
                                                    <input type="text"  class="form-control" name="ded_veh_tyres_batteries" id="" value="<?php echo @$incomeDeduction->ded_veh_tyres_batteries; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="text-center">Repairs and Maintenance</label><br>
                                                    <input type="text"  class="form-control" name="ded_veh_repairs_maint" id="" value="<?php echo @$incomeDeduction->ded_veh_repairs_maint; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="text-center">Car Washes</label><br>
                                                    <input type="text"  class="form-control" name="ded_veh_car_washes" id="" value="<?php echo @$incomeDeduction->ded_veh_car_washes; ?>">
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

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">2. Car parking</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body"> 
                     
                    <!-- Start content section -->
                    <div class="row">		                       
                    	   <div class="col-sm-4">                       
                    			<div class="form-group">
                    			<label>Did you pay for parking other then at your normal place of work?</label> 
                                    <label class="radio-inline">
                                        <input type="radio" class="has-div-to-show" name="ded_veh_parking_other_q" value="yes" <?php if (@$incomeDeduction->ded_veh_parking_other_q == "yes") {
                                    echo "checked";
                                } ?>> Yes
                                    </label>
                                    <label class="radio-inline">							
                                        <input type="radio" class="has-div-to-show" name="ded_veh_parking_other_q" value="no" <?php if (@$incomeDeduction->ded_veh_parking_other_q == "no" || @$incomeDeduction->ded_veh_parking_other_q == "") {
                                    echo "checked";
                                } ?>> No
                                    </label>
                    			</div>                       
                    	   </div>		                       
                       
                    	   <div class="col-sm-4">
                    			<div class="form-group">
                    			<label>Comment / Notes</label> 
                    			<textarea class="form-control" rows="3" name="ded_veh_parking_other_c"><?php if (@$incomeDeduction->ded_veh_parking_other_c != "") {echo @$incomeDeduction->ded_veh_parking_other_c;} ?>
                    			</textarea>
                    			</div>
                    	   </div>		                       
                       
                    	   <div class="col-sm-4">                       	
                    			<div class="form-group">
                    			 <label class="control-label">Attach Evidence</label>							
                                 <input id="ded_veh_parking_other_docs" name="ded_veh_parking_other_docs" type="file" class="file">	
                    					
                    			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/deductions/' . @$incomeDeduction->ded_veh_parking_other_docs; ?>"> <?php echo @$incomeDeduction->ded_veh_parking_other_docs; ?></a></p>
                                  
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
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">3. Taxi fares</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">      	
                   
                    <!-- Start content section -->
                    <div class="row">		                       
                    	   <div class="col-sm-4">                       
                    			<div class="form-group">
                    			<label>Did you incur taxi fares?</label>
                                <label class="radio-inline">
                                    <input type="radio" class="has-div-to-show" name="ded_veh_taxi_fares_q" value="yes" <?php if (@$incomeDeduction->ded_veh_taxi_fares_q == "yes") {
                                echo "checked";} ?>> Yes								
                                </label>
                                <label class="radio-inline">							
                                    <input type="radio" class="has-div-to-show" name="ded_veh_taxi_fares_q" value="no" <?php if (@$incomeDeduction->ded_veh_taxi_fares_q == "no" || @$incomeDeduction->ded_veh_taxi_fares_q == "") {echo "checked";} ?>> No
                                </label>
                    			</div>                       
                    	   </div>		                       
                       
                    	   <div class="col-sm-4">
                    			<div class="form-group">
                    			<label>Comment / Notes</label> 
                    			<textarea class="form-control" rows="3" name="ded_veh_taxi_fares_c"><?php if (@$incomeDeduction->ded_veh_taxi_fares_c != "") {echo @$incomeDeduction->ded_veh_taxi_fares_c;} ?>
                    			</textarea>
                    			</div>
                    	   </div>		                       
                       
                    	   <div class="col-sm-4">                       	
                    			<div class="form-group">
                    			 <label class="control-label">Attach Evidence</label>							
                                 <input id="ded_veh_taxi_fares_docs" name="ded_veh_taxi_fares_docs" type="file" class="file">
                    					
                    			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/deductions/' . @$incomeDeduction->ded_veh_taxi_fares_docs; ?>"> <?php echo @$incomeDeduction->ded_veh_taxi_fares_docs; ?></a></p>
                                  
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
            <div class="panel-heading" role="tab" id="heading4">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">4. Travel: Flights, Accommodation and Meals</a></h4>
            </div>
            <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">               
                <div class="panel-body">                      	
                  
                   <!-- Start content section -->
                   <div class="row">		                       
                   	   <div class="col-sm-4">                       
                   			<label>Did you travel for work purposes?</label> 
                                   <label class="radio-inline">
                                       <input type="radio" class="has-div-to-show" name="ded_veh_travel_for_work_q" value="yes" <?php if (@$incomeDeduction->ded_veh_travel_for_work_q == "yes") {
                                   echo "checked";
                               } ?>> Yes								
                                   </label>
                                   <label class="radio-inline">							
                                       <input type="radio" class="has-div-to-show" name="ded_veh_travel_for_work_q" value="no" <?php if (@$incomeDeduction->ded_veh_travel_for_work_q == "no" || @$incomeDeduction->ded_veh_travel_for_work_q == "") {
                                   echo "checked";
                               } ?>> No
                                   </label>
                   			</div>             
                      
                   	   <div class="col-sm-4">
                   			<div class="form-group">
                   			<label>Comment / Notes</label> 
                   			<textarea class="form-control" rows="3" name="ded_veh_travel_for_work_c"><?php if (@$incomeDeduction->ded_veh_travel_for_work_c != "") {echo @$incomeDeduction->ded_veh_travel_for_work_c;} ?>
                   			</textarea>
                   			</div>
                   	   </div>		                       
                      
                   	   <div class="col-sm-4">                       	
                   			<div class="form-group">
                   			 <label class="control-label">Attach Evidence</label>							
                                <input id="icm_othr_icm_docs" name="ded_veh_travel_for_work_docs" type="file" class="file">	
                   					
                   			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/deductions/' . @$incomeDeduction->ded_veh_travel_for_work_docs; ?>"> <?php echo @$incomeDeduction->ded_veh_travel_for_work_docs; ?></a></p>
                                 
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
            <div class="panel-heading" role="tab" id="heading5">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">5. Uniform or PPE</a></h4>
            </div>
            <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
                <div class="panel-body">

                 <!-- Start content section -->
                 <div class="row">		                       
                 	   <div class="col-sm-4">                       
                             <label>Do you wear a uniform or protective clothing for work?</label> 
                             <label class="radio-inline">
                                 <input type="radio" class="has-div-to-show" name="ded_veh_ppe_q" value="yes" <?php if (@$incomeDeduction->ded_veh_ppe_q == "yes") {
                                         echo "checked";
                                     } ?>> Yes								
                             </label>
                             <label class="radio-inline">							
                                 <input type="radio" class="has-div-to-show" name="ded_veh_ppe_q" value="no" <?php if (@$incomeDeduction->ded_veh_ppe_q == "no" || @$incomeDeduction->ded_veh_ppe_q == "") {
                                         echo "checked";
                                     } ?>> No
                            </label>
                 			</div>                       		                       
                    
                 	   <div class="col-sm-4">
                 			<div class="form-group">
                 			<label>Comment / Notes</label> 
                 			<textarea class="form-control" rows="3" name="ded_veh_ppe_c"><?php if (@$incomeDeduction->ded_veh_ppe_c != "") {echo @$incomeDeduction->ded_veh_ppe_c;} ?>
                 			</textarea>
                 			</div>
                 	   </div>		                       
                    
                 	   <div class="col-sm-4">                       	
                 			<div class="form-group">
                 			 <label class="control-label">Attach Evidence</label>							
                              <input id="icm_othr_icm_docs" name="ded_veh_ppe_docs" type="file" class="file">	
                 					
                 			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/deductions/' . @$incomeDeduction->ded_veh_ppe_docs; ?>"> <?php echo @$incomeDeduction->ded_veh_ppe_docs; ?></a></p>
                               
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
                        6. Self-education</a>
                </h4>
            </div>
            <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
                <div class="panel-body">
				
				<!-- Start content section -->
				<div class="row">		                       
					   <div class="col-sm-4">                       
	                   <label>Did you pay for work related self-education expenses?</label> 
	                    <label class="radio-inline">
	                        <input type="radio" class="has-div-to-show" name="ded_slf_ed_q" value="yes" <?php if (@$incomeDeduction->ded_slf_ed_q == "yes") {
	                                echo "checked";
	                            } ?>> Yes								
	                    </label>
	                    <label class="radio-inline">							
	                        <input type="radio" class="has-div-to-show" name="ded_slf_ed_q" value="no" <?php if (@$incomeDeduction->ded_slf_ed_q == "no" || @$incomeDeduction->ded_slf_ed_q == "") {
	                                echo "checked";
	                            } ?>> No
	                    </label>
					  </div>                       
				
					   <div class="col-sm-4">
							<div class="form-group">
							<label>Comment / Notes</label> 
							<textarea class="form-control" rows="3" name="ded_slf_ed_c"><?php if (@$incomeDeduction->ded_slf_ed_c != "") {echo @$incomeDeduction->ded_slf_ed_c;} ?>
							</textarea>
							</div>
					   </div>		                       
				   
					   <div class="col-sm-4">                       	
							<div class="form-group">
							 <label class="control-label">Attach Evidence</label>							
				             <input id="ded_slf_ed_docs" name="ded_slf_ed_docs" type="file" class="file">	
									
							<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/deductions/' . @$incomeDeduction->ded_slf_ed_docs; ?>"> <?php echo @$incomeDeduction->ded_slf_ed_docs; ?></a></p>
				              
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
                        7. Other work related expenses</a>
                </h4>
            </div>
            <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
                <div class="panel-body">

                    <!-- Start content section -->
                    <div class="row">		                       
                    	   <div class="col-sm-4">                       
                           <label>Did you incur other work related expenses?</label> 
                            <label class="radio-inline">
                                <input type="radio" class="has-div-to-show" name="ded_othr_wk_exp_q" value="yes" <?php if (@$incomeDeduction->ded_othr_wk_exp_q == "yes") {
                                        echo "checked";
                                    } ?>> Yes								
                            </label>
                            <label class="radio-inline">							
                                <input type="radio" class="has-div-to-show" name="ded_othr_wk_exp_q" value="no" <?php if (@$incomeDeduction->ded_othr_wk_exp_q == "no" || @$incomeDeduction->ded_othr_wk_exp_q == "") {
                                        echo "checked";
                                    } ?>> No
                            </label>
                    	  </div>                       
                    
                    	   <div class="col-sm-4">
                    			<div class="form-group">
                    			<label>Comment / Notes</label> 
                    			<textarea class="form-control" rows="3" name="ded_othr_wk_exp_c"><?php if (@$incomeDeduction->ded_othr_wk_exp_c != "") {echo @$incomeDeduction->ded_othr_wk_exp_c;} ?>
                    			</textarea>
                    			</div>
                    	   </div>		                       
                       
                    	   <div class="col-sm-4">                       	
                    			<div class="form-group">
                    			 <label class="control-label">Attach Evidence</label>							
                                 <input id="ded_othr_wk_exp_docs" name="ded_othr_wk_exp_docs" type="file" class="file">	
                    					
                    			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/deductions/' . @$incomeDeduction->ded_othr_wk_exp_docs; ?>"> <?php echo @$incomeDeduction->ded_slf_ed_docs; ?></a></p>
                                  
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
                        8. Low value pool</a>
                </h4>
            </div>
            <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
                <div class="panel-body">
					
					<!-- Start content section -->
					<div class="row">		                       
						   <div class="col-sm-4">                       
		                   <label>Did you have a low value pool in previous year? </label> 
		                    <label class="radio-inline">
		                        <input type="radio" class="has-div-to-show" name="ded_low_val_pool_prv_yr_q" value="yes" <?php if (@$incomeDeduction->ded_low_val_pool_prv_yr_q == "yes") {
		                                echo "checked";
		                            } ?>> Yes								
		                    </label>
		                    <label class="radio-inline">							
		                        <input type="radio" class="has-div-to-show" name="ded_low_val_pool_prv_yr_q" value="no" <?php if (@$incomeDeduction->ded_low_val_pool_prv_yr_q == "no" || @$incomeDeduction->ded_low_val_pool_prv_yr_q == "") {
		                                echo "checked";
		                            } ?>> No
		                    </label>
						  </div>                       
					
						   <div class="col-sm-4">
								<div class="form-group">
								<label>Comment / Notes</label> 
								<textarea class="form-control" rows="3" name="ded_low_val_pool_prv_yr_c"><?php if (@$incomeDeduction->ded_low_val_pool_prv_yr_c != "") {echo @$incomeDeduction->ded_low_val_pool_prv_yr_c;} ?>
								</textarea>
								</div>
						   </div>		                       
					   
						   <div class="col-sm-4">                       	
								<div class="form-group">
								 <label class="control-label">Attach Evidence</label>							
					             <input id="ded_low_val_pool_prv_yr_docs" name="ded_low_val_pool_prv_yr_docs" type="file" class="file">	
										
								<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/deductions/' . @$incomeDeduction->ded_low_val_pool_prv_yr_docs; ?>"> <?php echo @$incomeDeduction->ded_slf_ed_docs; ?></a></p>
					              
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
                        9. Expenses in order to earn interest or dividends</a>
                </h4>
            </div>
            <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading9">
                <div class="panel-body">
					
					<!-- Start content section -->
					<div class="row">		                       
						   <div class="col-sm-4">                       
		                   <label>Did you incur any expenses in order to earn interest or dividends?</label> 
		                    <label class="radio-inline">
		                        <input type="radio" class="has-div-to-show" name="ded_exp_ern_int_or_divd_q" value="yes" <?php if (@$incomeDeduction->ded_exp_ern_int_or_divd_q == "yes") {
		                                echo "checked";
		                            } ?>> Yes								
		                    </label>
		                    <label class="radio-inline">							
		                        <input type="radio" class="has-div-to-show" name="ded_exp_ern_int_or_divd_q" value="no" <?php if (@$incomeDeduction->ded_exp_ern_int_or_divd_q == "no" || @$incomeDeduction->ded_exp_ern_int_or_divd_q == "") {
		                                echo "checked";
		                            } ?>> No
		                    </label>
						  </div>                       
					
						   <div class="col-sm-4">
								<div class="form-group">
								<label>Comment / Notes</label> 
								<textarea class="form-control" rows="3" name="ded_exp_ern_int_or_divd_c"><?php if (@$incomeDeduction->ded_exp_ern_int_or_divd_c != "") {echo @$incomeDeduction->ded_exp_ern_int_or_divd_c;} ?>
								</textarea>
								</div>
						   </div>		                       
					   
						   <div class="col-sm-4">                       	
								<div class="form-group">
								 <label class="control-label">Attach Evidence</label>							
					             <input id="ded_exp_ern_int_or_divd_docs" name="ded_exp_ern_int_or_divd_docs" type="file" class="file">	
										
								<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/deductions/' . @$incomeDeduction->ded_exp_ern_int_or_divd_docs; ?>"> <?php echo @$incomeDeduction->ded_exp_ern_int_or_divd_docs; ?></a></p>
					              
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
                        10. Charitable Gifts or donations</a>
                </h4>
            </div>
            <div id="collapse10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading10">
                <div class="panel-body">

                    <!-- Start content section -->
                    <div class="row">		                       
                    	   <div class="col-sm-4">                       
                          <label>Did you make any charitable Gifts or donations?</label> 
                            <label class="radio-inline">
                                <input type="radio" class="has-div-to-show" name="ded_chrty_gfts_donat_q" value="yes" <?php if (@$incomeDeduction->ded_chrty_gfts_donat_q == "yes") {
                                        echo "checked";
                                    } ?>> Yes								
                            </label>
                            <label class="radio-inline">							
                                <input type="radio" class="has-div-to-show" name="ded_chrty_gfts_donat_q" value="no" <?php if (@$incomeDeduction->ded_chrty_gfts_donat_q == "no" || @$incomeDeduction->ded_chrty_gfts_donat_q == "") {
                                        echo "checked";
                                    } ?>> No
                            </label>
                    	  </div>                       
                    
                    	   <div class="col-sm-4">
                    			<div class="form-group">
                    			<label>Comment / Notes</label> 
                    			<textarea class="form-control" rows="3" name="ded_chrty_gfts_donat_c"><?php if (@$incomeDeduction->ded_chrty_gfts_donat_c != "") {echo @$incomeDeduction->ded_chrty_gfts_donat_c;} ?>
                    			</textarea>
                    			</div>
                    	   </div>		                       
                       
                    	   <div class="col-sm-4">                       	
                    			<div class="form-group">
                    			 <label class="control-label">Attach Evidence</label>							
                                 <input id="ded_chrty_gfts_donat_docs" name="ded_chrty_gfts_donat_docs" type="file" class="file">	
                    					
                    			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/deductions/' . @$incomeDeduction->ded_chrty_gfts_donat_docs; ?>"> <?php echo @$incomeDeduction->ded_exp_ern_int_or_divd_docs; ?></a></p>
                                  
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
                        11. Last tax return</a>
                </h4>
            </div>
            <div id="collapse11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading11">
                <div class="panel-body">

                    <!-- Start content section -->
                    <div class="row">		                       
                    	   <div class="col-sm-4">                       
                         <label>Was last year’s return prepared by a registered tax agent?</label> 
                            <label class="radio-inline">
                                <input type="radio" class="has-div-to-show" name="ded_lst_yr_rt_tx_agt_q" value="yes" <?php if (@$incomeDeduction->ded_lst_yr_rt_tx_agt_q == "yes") {
                                        echo "checked";
                                    } ?>> Yes								
                            </label>
                            <label class="radio-inline">							
                                <input type="radio" class="has-div-to-show" name="ded_lst_yr_rt_tx_agt_q" value="no" <?php if (@$incomeDeduction->ded_lst_yr_rt_tx_agt_q == "no" || @$incomeDeduction->ded_lst_yr_rt_tx_agt_q == "") {
                                        echo "checked";
                                    } ?>> No
                            </label>
                    	  </div>                       
                    
                    	   <div class="col-sm-4">
                    			<div class="form-group">
                    			<label>Comment / Notes</label> 
                    			<textarea class="form-control" rows="3" name="ded_lst_yr_rt_tx_agt_c"><?php if (@$incomeDeduction->ded_lst_yr_rt_tx_agt_c != "") {echo @$incomeDeduction->ded_lst_yr_rt_tx_agt_c;} ?>
                    			</textarea>
                    			</div>
                    	   </div>		                       
                       
                    	   <div class="col-sm-4">                       	
                    			<div class="form-group">
                    			 <label class="control-label">Attach Evidence</label>							
                                 <input id="ded_lst_yr_rt_tx_agt_docs" name="ded_lst_yr_rt_tx_agt_docs" type="file" class="file">	
                    					
                    			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/deductions/' . @$incomeDeduction->ded_lst_yr_rt_tx_agt_docs; ?>"> <?php echo @$incomeDeduction->ded_lst_yr_rt_tx_agt_docs; ?></a></p>
                                  
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
                        12. Personal superannuation contributions</a>
                </h4>
            </div>
            <div id="collapse12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading12">
                <div class="panel-body">
                   
                    <!-- Start content section -->
                    <div class="row">		                       
                    	   <div class="col-sm-4">                       
                        <label>Did you make any personal superannuation contributions?</label> 
                            <label class="radio-inline">
                                <input type="radio" class="has-div-to-show" name="ded_prsn_spr_cont_q" value="yes" <?php if (@$incomeDeduction->ded_prsn_spr_cont_q == "yes") {
                                        echo "checked";
                                    } ?>> Yes								
                            </label>
                            <label class="radio-inline">							
                                <input type="radio" class="has-div-to-show" name="ded_prsn_spr_cont_q" value="no" <?php if (@$incomeDeduction->ded_prsn_spr_cont_q == "no" || @$incomeDeduction->ded_prsn_spr_cont_q == "") {
                                        echo "checked";
                                    } ?>> No
                            </label>
                    	  </div>                       
                    
                    	   <div class="col-sm-4">
                    			<div class="form-group">
                    			<label>Comment / Notes</label> 
                    			<textarea class="form-control" rows="3" name="ded_prsn_spr_cont_c"><?php if (@$incomeDeduction->ded_prsn_spr_cont_c != "") {echo @$incomeDeduction->ded_prsn_spr_cont_c;} ?>
                    			</textarea>
                    			</div>
                    	   </div>		                       
                       
                    	   <div class="col-sm-4">                       	
                    			<div class="form-group">
                    			 <label class="control-label">Attach Evidence</label>							
                                 <input id="ded_prsn_spr_cont_docs" name="ded_prsn_spr_cont_docs" type="file" class="file">	
                    					
                    			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/deductions/' . @$incomeDeduction->ded_prsn_spr_cont_docs; ?>"> <?php echo @$incomeDeduction->ded_prsn_spr_cont_docs; ?></a></p>
                                  
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
                        13. Other deductions</a>
                </h4>
            </div>
            <div id="collapse13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading13">
                <div class="panel-body">
                   
                   <!-- Start content section -->
                   <div class="row">		                       
                   	   <div class="col-sm-4">                       
                      <label>Any Other Deductions?</label> 
                           <label class="radio-inline">
                               <input type="radio" class="has-div-to-show" name="ded_prsn_othr_ded_q" value="yes" <?php if (@$incomeDeduction->ded_prsn_othr_ded_q == "yes") {
                                       echo "checked";
                                   } ?>> Yes								
                           </label>
                           <label class="radio-inline">							
                               <input type="radio" class="has-div-to-show" name="ded_prsn_othr_ded_q" value="no" <?php if (@$incomeDeduction->ded_prsn_othr_ded_q == "no" || @$incomeDeduction->ded_prsn_othr_ded_q == "") {
                                       echo "checked";
                                   } ?>> No
                           </label>
                   	  </div>                       
                   
                   	   <div class="col-sm-4">
                   			<div class="form-group">
                   			<label>Comment / Notes</label> 
                   			<textarea class="form-control" rows="3" name="ded_prsn_othr_ded_c"><?php if (@$incomeDeduction->ded_prsn_othr_ded_c != "") {echo @$incomeDeduction->ded_prsn_othr_ded_c;} ?>
                   			</textarea>
                   			</div>
                   	   </div>		                       
                      
                   	   <div class="col-sm-4">                       	
                   			<div class="form-group">
                   			 <label class="control-label">Attach Evidence</label>							
                                <input id="ded_prsn_othr_ded_docs" name="ded_prsn_othr_ded_docs" type="file" class="file">	
                   					
                   			<br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/deductions/' . @$incomeDeduction->ded_prsn_othr_ded_docs; ?>"> <?php echo @$incomeDeduction->ded_prsn_othr_ded_docs; ?></a></p>
                                 
                   			</div>
                   	   </div>                 
                   </div>	
                   <!-- End content section -->
                   
                </div>
            </div>
            <!-- -->

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
</div>
<div>

<?php
//echo '<pre>';
//print_r(@$incomeDeduction);
//convert ojbect to array
//$income_array = (array) $incomeDeduction;
//var_dump($income_array);
//echo '</pre>';
?>