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

        <div class="panel panel-default">		
            <div class="panel-heading">
                <h3 class="panel-title">Income Deduction Information</h3>
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

                            <label>Income deduction lodgement tax year <?php echo $finyr . '/' . $currentyr; ?></label> 
                            <label class="radio-inline">
                                <input type="radio" class="has-div-to-show" value="yes" name="icm_current_fin_yr" <?php if (@$incomeDeduction->icm_current_fin_yr == "yes") {
                                echo "checked";
                            } ?>> No
                            </label>
                            <label class="radio-inline">							
                                <input type="radio" class="has-div-to-show" value="no" name="icm_current_fin_yr" <?php if (@$incomeDeduction->icm_current_fin_yr == "no" || @$incomeDeduction->icm_current_fin_yr == "") {
                                echo "checked";
                            } ?>> Yes
                            </label>

                            <div class="hidden to-show">
                                <div class="row">
                                    <div class="col-sm-3">				
                                        <input type="text" class="form-control" name="icm_fin_yr" id="" value="<?php echo @$incomeDeduction->icm_fin_yr; ?>" placeholder="">
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
                            1. Vehicle deductions</a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">      
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Do you use your vehicle for work related purposes?</label> 
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
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        2. Car parking</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">      
                    <div class="row">
                        <div class="col-sm-12">
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

                                <div class="hidden to-show">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="control-label">Attach Evidence</label>							
                                            <input id="ded_veh_parking_other_docs" type="file" class="file" name="ded_veh_parking_other_docs">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">					
                                            <br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/deductions/' . @$incomeDeduction->ded_veh_parking_other_docs; ?>"> <?php echo @$incomeDeduction->ded_veh_parking_other_docs; ?></a></p>
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
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">         3. Taxi fares</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">      	
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">			
                                <label>Did you incur taxi fares?</label>
                                <label class="radio-inline">
                                    <input type="radio" class="has-div-to-show" name="ded_veh_taxi_fares_q" value="yes" <?php if (@$incomeDeduction->ded_veh_taxi_fares_q == "yes") {
                                echo "checked";} ?>> Yes								
                                </label>
                                <label class="radio-inline">							
                                    <input type="radio" class="has-div-to-show" name="ded_veh_taxi_fares_q" value="no" <?php if (@$incomeDeduction->ded_veh_taxi_fares_q == "no" || @$incomeDeduction->ded_veh_taxi_fares_q == "") {echo "checked";} ?>> No
                                </label>							
                                <div class="hidden to-show">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="control-label">Attach Evidence</label>							
                                            <input id="ded_veh_taxi_fares_docs" name="ded_veh_taxi_fares_docs" type="file" class="file">								
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">					
                                            <br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/deductions/' . @$incomeDeduction->ded_veh_taxi_fares_docs; ?>"> <?php echo @$incomeDeduction->ded_veh_taxi_fares_docs; ?></a></p>
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
                        4. Travel</a>
                </h4>
            </div>
            <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                <div class="panel-body">      	
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
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

                                <div class="hidden to-show">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Did you receive a travel allowance for the travel?</label> 
                                            <label class="radio-inline">
                                                <input type="radio" class="has-div-to-show" name="ded_veh_travel_allowance_q" value="yes" <?php if (@$incomeDeduction->ded_veh_travel_allowance_q == "yes") {
                                echo "checked";
                            } ?>> Yes								
                                            </label>
                                            <label class="radio-inline">							
                                                <input type="radio" class="has-div-to-show" name="ded_veh_travel_allowance_q" value="no" <?php if (@$incomeDeduction->ded_veh_travel_allowance_q == "no" || @$incomeDeduction->ded_veh_travel_allowance_q == "") {
                                echo "checked";
                            } ?>> No
                                            </label>      							

                                            <div class="hidden to-show">

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="text-center">Gross</label><br>
                                                        <input type="text"  class="form-control" name="ded_veh_travel_allowance_gross" id="" value="<?php echo @$incomeDeduction->ded_veh_travel_allowance_gross; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="text-center">Tax</label><br>
                                                        <input type="text"  class="form-control" name="ded_veh_travel_allowance_tax" id="" value="<?php echo @$incomeDeduction->ded_veh_travel_allowance_tax; ?>">
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
        </div>
        <!-- -->

        <!-- -->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading5">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                        5. Uniform or PPE</a>
                </h4>
            </div>
            <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
                <div class="panel-body">

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

                    <div class="hidden to-show">

                        <div class="row">				
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-center">Description</label><br>
                                    <input type="text"  class="form-control" name="ded_veh_ppe_desc" id="" value="<?php echo @$incomeDeduction->ded_veh_ppe_desc; ?>">
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="text-center">Amount</label><br>
                                    <input type="text"  class="form-control" name="ded_veh_ppe_amount" id="" value="<?php echo @$incomeDeduction->ded_veh_ppe_amount; ?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label class="control-label">Attach Evidence</label>							
                                <input id="ded_veh_ppe_docs" name="ded_veh_ppe_docs" type="file" class="file">								
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">					
                                <br><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/deductions/' . @$incomeDeduction->ded_veh_ppe_docs; ?>"> <?php echo @$incomeDeduction->ded_veh_ppe_docs; ?></a></p>
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
                        6. Self-education</a>
                </h4>
            </div>
            <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
                <div class="panel-body">

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

                    <div class="hidden to-show">

                        <div class="row">				
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="text-center">Name of Course Taken at Educational Institution</label><br>
                                    <input type="text"  class="form-control" name="ded_slf_ed_course_name" id="" value="<?php echo @$incomeDeduction->ded_slf_ed_course_name; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">	
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-center">Union Fees</label><br>
                                    <input type="text"  class="form-control" name="ded_slf_ed_union_fees" id="" value="<?php echo @$incomeDeduction->ded_slf_ed_union_fees; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-center">Course Fees</label><br>
                                    <input type="text"  class="form-control" name="ded_slf_ed_course_fees" id="" value="<?php echo @$incomeDeduction->ded_slf_ed_course_fees; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-center">Books, Stationery</label><br>
                                    <input type="text"  class="form-control" name="ded_slf_ed_books_stat" id="" value="<?php echo @$incomeDeduction->ded_slf_ed_books_stat; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">	
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-center">Depreciation</label><br>
                                    <input type="text"  class="form-control" name="ded_slf_ed_depreciation" id="" value="<?php echo @$incomeDeduction->ded_slf_ed_depreciation; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-center">Seminars</label><br>
                                    <input type="text"  class="form-control" name="ded_slf_ed_seminars" id="" value="<?php echo @$incomeDeduction->ded_slf_ed_seminars; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-center">Travel</label><br>
                                    <input type="text"  class="form-control" name="ded_slf_ed_travel" id="" value="<?php echo @$incomeDeduction->ded_slf_ed_travel; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="text-center">Others (please specify)</label><br>
                                    <input type="text"  class="form-control" name="ded_slf_ed_other_desc" id="" value="<?php echo @$incomeDeduction->ded_slf_ed_other_desc; ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="text-center">Amount</label><br>
                                    <input type="text"  class="form-control" name="ded_slf_ed_other_amount" id="" value="<?php echo @$incomeDeduction->ded_slf_ed_other_amount; ?>">
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
                        7. Other work related expenses</a>
                </h4>
            </div>
            <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
                <div class="panel-body">

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

                    <div class="hidden to-show">

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="text-center">Home Office Expenses</label><br>
                                    <input type="text"  class="form-control" name="ded_othr_wk_exp_home_office" id="" value="<?php echo @$incomeDeduction->ded_othr_wk_exp_home_office; ?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="text-center">Computer and Software Expenses</label><br>
                                    <input type="text"  class="form-control" name="ded_othr_wk_exp_comp_softwre" id="" value="<?php echo @$incomeDeduction->ded_othr_wk_exp_comp_softwre; ?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="text-center">Telephone/Mobile Phone</label><br>
                                    <input type="text"  class="form-control" name="ded_othr_wk_exp_phone_mobile" id="" value="<?php echo @$incomeDeduction->ded_othr_wk_exp_phone_mobile; ?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="text-center">Tools and Equipment</label><br>
                                    <input type="text"  class="form-control" name="ded_othr_wk_exp_tools_equip" id="" value="<?php echo @$incomeDeduction->ded_othr_wk_exp_tools_equip; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">					
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="text-center">Subscriptions and Union Fees</label><br>
                                    <input type="text"  class="form-control" name="ded_othr_wk_exp_subscrip_union" id="" value="<?php echo @$incomeDeduction->ded_othr_wk_exp_subscrip_union; ?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="text-center">Journals/Periodicals</label><br>
                                    <input type="text"  class="form-control" name="ded_othr_wk_exp_journals_magz" id="" value="<?php echo @$incomeDeduction->ded_othr_wk_exp_journals_magz; ?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="text-center">Depreciation</label><br>
                                    <input type="text"  class="form-control" name="ded_othr_wk_exp_depreciation" id="" value="<?php echo @$incomeDeduction->ded_othr_wk_exp_depreciation; ?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="text-center">Sun Protection Products (i.e., sunscreen and sunglasses)</label><br>
                                    <input type="text"  class="form-control" name="ded_othr_wk_exp_sun_protect" id="" value="<?php echo @$incomeDeduction->ded_othr_wk_exp_sun_protect; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <h4>Seminars and courses not at an educational institution</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="text-center">Course Fees</label><br>
                                    <input type="text"  class="form-control" name="ded_othr_wk_exp_crs_fees" id="" value="<?php echo @$incomeDeduction->ded_othr_wk_exp_crs_fees; ?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="text-center">Travel Fees</label><br>
                                    <input type="text"  class="form-control" name="ded_othr_wk_exp_crs_trvl_fees" id="" value="<?php echo @$incomeDeduction->ded_othr_wk_exp_crs_trvl_fees; ?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="text-center">Others (Please specify)</label><br>
                                    <input type="text"  class="form-control" name="ded_othr_wk_exp_crs_othr_desc" id="" value="<?php echo @$incomeDeduction->ded_othr_wk_exp_crs_othr_desc; ?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="text-center">Amount</label><br>
                                    <input type="text"  class="form-control" name="ded_othr_wk_exp_crs_othr_amnt" id="" value="<?php echo @$incomeDeduction->ded_othr_wk_exp_crs_othr_amnt; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-center">Any other work related deductions (please specify)</label><br>
                                    <input type="text"  class="form-control" name="ded_othr_wk_exp_othr_desc" id="" value="<?php echo @$incomeDeduction->ded_othr_wk_exp_othr_desc; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-center">Amount</label><br>
                                    <input type="text"  class="form-control" name="ded_othr_wk_exp_othr_amount" id="" value="<?php echo @$incomeDeduction->ded_othr_wk_exp_othr_amount; ?>">
                                </div>
                            </div>                            
                        </div>

						 <div class="row">
						 <div class="col-sm-12">							
						     <div class="form-group">										
						         <label class="control-label">Attach Evidence</label>							
						         <input id="ded_othr_wk_exp_othr_docs" name="ded_othr_wk_exp_othr_docs" type="file" class="file">
						     </div>													
						 </div>
						 </div>						 
						 <div class="row">
						     <div class="col-sm-12">					
						         <br /><p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/deductions/' . @$incomeDeduction->ded_othr_wk_exp_othr_docs; ?>"> <?php echo @$incomeDeduction->ded_othr_wk_exp_othr_docs; ?></a></p>
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
                        8. Low value pool</a>
                </h4>
            </div>
            <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
                <div class="panel-body">

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

                    <div class="hidden to-show">
                        <div class="row">				
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-center">Balance</label><br>
                                    <input type="text"  class="form-control" name="ded_low_val_pool_prv_yr_balce" id="" value="<?php echo @$incomeDeduction->ded_low_val_pool_prv_yr_balce; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-center">Assets purchased in current tax year</label><br>
                                    <input type="text"  class="form-control" name="ded_low_val_pool_prv_yr_assets" id="" value="<?php echo @$incomeDeduction->ded_low_val_pool_prv_yr_assets; ?>">
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
                        9. Expenses in order to earn interest or dividends</a>
                </h4>
            </div>
            <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading9">
                <div class="panel-body">

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

                    <div class="hidden to-show">
                        <div class="row">				
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-center">Description</label><br>
                                    <input type="text"  class="form-control" name="ded_exp_ern_int_or_divd_desc" id="" value="<?php echo @$incomeDeduction->ded_exp_ern_int_or_divd_desc; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-center">Interest Paid</label><br>
                                    <input type="text"  class="form-control" name="ded_exp_ern_int_paid" id="" value="<?php echo @$incomeDeduction->ded_exp_ern_int_paid; ?>">
                                </div>
                            </div>	
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-center">Management Fees Paid</label><br>
                                    <input type="text"  class="form-control" name="ded_exp_ern_mngt_fes" id="" value="<?php echo @$incomeDeduction->ded_exp_ern_mngt_fes; ?>">
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
                        10. Charitable Gifts or donations</a>
                </h4>
            </div>
            <div id="collapse10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading10">
                <div class="panel-body">

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

                    <div class="hidden to-show">
                        <div class="row">				
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-center">Charity Names</label><br>
                                    <input type="text"  class="form-control" name="ded_chrty_name" id="" value="<?php echo @$incomeDeduction->ded_chrty_name; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-center">Amounts</label><br>
                                    <input type="text"  class="form-control" name="ded_chrty_amount" id="" value="<?php echo @$incomeDeduction->ded_chrty_amount; ?>">
                                </div>
                            </div>	
                        </div>
                        
                        <div class="row">                        
                        <div class="col-sm-12">      			
                            <label class="control-label">Attach Evidence</label>							
                            <input id="ded_chrty_docs" name="ded_chrty_docs" type="file" class="file">
                            </div>                        
                        </div>
                        <div class="row">                        
                        <div class="col-sm-12">      										
                            <br />
                            <p>Current upload: <a target="_blank" href="<?php echo plugins_url() . '/lead-capture-pro/client-docs/' . $user_data->user_login . '/deductions/' . @$incomeDeduction->ded_chrty_docs; ?>"> <?php echo @$incomeDeduction->ded_chrty_docs; ?></a></p>
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
                        11. Last tax return</a>
                </h4>
            </div>
            <div id="collapse11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading11">
                <div class="panel-body">

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

                    <div class="hidden to-show">
                        <div class="row">				
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="text-center">Tax Agent Name</label><br>
                                    <input type="text"  class="form-control" name="ded_lst_yr_tx_agt_name" id="" value="<?php echo @$incomeDeduction->ded_lst_yr_tx_agt_name; ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="text-center">Address</label><br>
                                    <input type="text"  class="form-control" name="ded_lst_yr_tx_agt_address" id="" value="<?php echo @$incomeDeduction->ded_lst_yr_tx_agt_address; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-center">Amount Paid</label><br>
                                    <input type="text"  class="form-control" name="ded_lst_yr_tx_agt_paid" id="" value="<?php echo @$incomeDeduction->ded_lst_yr_tx_agt_paid; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-center">Distance Travelled</label><br>
                                    <input type="text"  class="form-control" name="ded_lst_yr_tx_agt_dist_trvl" id="" value="<?php echo @$incomeDeduction->ded_lst_yr_tx_agt_dist_trvl; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-center">Any interest paid to ATO on previous assessment</label><br>
                                    <input type="text"  class="form-control" name="ded_lst_yr_tx_int_paid_ato" id="" value="<?php echo @$incomeDeduction->ded_lst_yr_tx_int_paid_ato; ?>">
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
                        12. Personal superannuation contributions</a>
                </h4>
            </div>
            <div id="collapse12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading12">
                <div class="panel-body">
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

                    <div class="hidden to-show">
                        <div class="row">				
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="text-center">Full name of Fund</label><br>
                                    <input type="text"  class="form-control" name="ded_prsn_spr_fund_name" id="" value="<?php echo @$incomeDeduction->ded_prsn_spr_fund_name; ?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="text-center">Account Number</label><br>
                                    <input type="text"  class="form-control" name="ded_prsn_spr_acc_num" id="" value="<?php echo @$incomeDeduction->ded_prsn_spr_acc_num; ?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="text-center">Fund ABN</label><br>
                                    <input type="text"  class="form-control" name="ded_prsn_spr_fund_abn" id="" value="<?php echo @$incomeDeduction->ded_prsn_spr_fund_abn; ?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="text-center">Fund TFN</label><br>
                                    <input type="text"  class="form-control" name="ded_prsn_spr_fund_tfn" id="" value="<?php echo @$incomeDeduction->ded_prsn_spr_fund_tfn; ?>">
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
                        13. Other deductions</a>
                </h4>
            </div>
            <div id="collapse13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading13">
                <div class="panel-body">
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

                    <div class="hidden to-show">
                        <div class="row">				
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="text-center">Name / Description</label><br>
                                    <input type="text"  class="form-control" name="ded_prsn_othr_ded_desc" id="" value="<?php echo @$incomeDeduction->ded_prsn_othr_ded_desc; ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="text-center">Amount ($)</label><br>
                                    <input type="text"  class="form-control" name="ded_prsn_othr_ded_amnt" id="" value="<?php echo @$incomeDeduction->ded_prsn_othr_ded_amnt; ?>">
                                </div>
                            </div>			
                        </div>				
                    </div>	
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