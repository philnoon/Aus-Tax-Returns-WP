<div>
<center>
<div>    
   
    <?php if($validated1 == 'allgood'/*$validated === true*/ ) : ?>
        
        <script type="text/javascript">
        jQuery(document).ready(function($) {
            jQuery('#myModal').modal('show');
        });
        </script>
    
    <?php endif; ?>
    
    <?php if($validated1 == 'false' /*$validated === false*/ ) : ?>
    <div class="message message-error" style="text-align:center;border:none;color: #f00;">
            <!-- <p>Your name and email address are required.</p> -->
    </div>
    <?php endif; ?>
    
    <?php if($validated1 == 'false' && isset($errors)) : ?>
    <div class="message message-error" style="text-align:center;border:none;color: #f00;">
            <p><?php echo $errors; ?></p>
    </div>
    <?php endif; ?>
    
    <form action="" name="signupform" method="post" class="lcp-form" id="signup-form" onsubmit="return checkForm(this);">
	<div class="lcp-form-control">
    <input type="text" name="first_name" value="" placeholder="Name" style="padding: 10px; border: 1px solid #000; background: #ffffff; width: 200px; height: 45px; border-radius: 0;" maxlength="40" autocomplete="off" required/>                
    <input type="email" name="email" value="" placeholder="Email Address" style="padding: 10px; border: 1px solid #000; background: #ffffff; width: 200px; height: 45px;border-radius: 0;" maxlength="45" autocomplete="off" required/>
	</div>        
            
        <span id="form-msg-fn" class="message"></span><br />
        <span id="form-msg-em" class="message"></span>

	<div class="lcp-form-control">
	<input type="submit" name="submit" value="Signup"/>
	<!-- <input type='button' id="jqButton" value='Submit form'/> -->
	</div>
    </form>
<div>
</center>

<!--
end wrapper div
-->
</div>


<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Sign-up Successful</h3>
  </div>
  <div class="modal-body">
    <p>Thanks for signing-up. You will have login details send to you by email.</p>
    <p>Check you junk mail or spam folder if you have not received a registration email.</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>

<script type="text/javascript">
  function checkForm()
  {
    var fn = document.forms["signupform"]["first_name"].value;
    if (fn === null || fn === "") {
        //alert("Name must be filled out");
        document.getElementById("form-msg-fn").innerHTML = "Your name is required.";
        //document.forms["signupform"].Submit.value = "Please wait...";
        return false;
    } 
    
    // Regular Expression For Email
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    //(em.match(re)) ||
    
    var em = document.forms["signupform"]["email"].value;
    if ( em === null || em === "") {
        document.getElementById("form-msg-em").innerHTML = "A valid email is required.";
        return false;
    }
    
    //alert("validated");
    //document.forms["signupform"].Submit.disabled = true;
    return true;
  }
</script>