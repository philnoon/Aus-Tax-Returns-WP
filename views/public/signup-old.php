<?php if( $validated === true ) : ?>
<div class="message message-success">
	<p>Your companys details have been submitted and are now with our team.</p>
</div>
<?php endif; ?>
<?php if( $validated === false ) : ?>
<div class="message message-error">
	<p>Please complete the required fields.</p>
</div>
<?php endif; ?>
<?php if(isset($errors)) : ?>
<div class="message message-error">
	<p><?php echo $errors; ?></p>
</div>
<?php endif; ?>

<div class="container">
<div class="row">
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details »</a></p>
        </div>
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details »</a></p>
       </div>
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn" href="#">View details »</a></p>
        </div>
      </div>
</div>



<div class="container">
<div class="row">
    <div class="span6">
        <h3>Heading</h3>
    </div>
    <div class="span6">  
        
        <form action="" method="post" class="lcp-form">
	<div class="lcp-form-control">
		<label>Title *</label>
		<select name="title">
			<option value="null">-- Please Select --</option>
			<option value="1" <?php if($_POST['title']=='1'){ echo "selected"; } ?>>Mr</option>
			<option value="2" <?php if($_POST['title']=='2'){ echo "selected"; } ?>>Mrs</option>
			<option value="3" <?php if($_POST['title']=='3'){ echo "selected"; } ?>>Miss</option>
			<option value="4" <?php if($_POST['title']=='4'){ echo "selected"; } ?>>Ms</option>
		</select>
	</div>
	<div class="lcp-form-control">
		<label>Firstname *</label>
		<input type="text" name="first_name" value="<?php echo $_POST['first_name']; ?>" placeholder="" /><br>
	</div>
	<div class="lcp-form-control">
		<label>Lastname *</label>
		<input type="text" name="lastname" value="<?php echo $_POST['lastname']; ?>" placeholder="" /><br>
	</div>
	<br>
	<div class="lcp-form-control">
		<label>Company *</label>
		<input type="text" name="company_name" value="<?php echo $_POST['company_name']; ?>" placeholder="" /><br>
	</div>
	<div class="lcp-form-control">
		<label>Company Number</label>
		<input type="text" name="company_number" value="<?php echo $_POST['company_number']; ?>" placeholder="" /><br>
	</div>
	<div class="lcp-form-control">
		<label>Address *</label>
		<input type="text" name="address" value="<?php echo $_POST['address']; ?>" placeholder="" /><br>
	</div>
	<div class="lcp-form-control">
		<label>Address Line 2</label>
		<input type="text" name="address2" value="<?php echo $_POST['address2']; ?>" placeholder="" /><br>
	</div>
	<div class="lcp-form-control">
		<label>Town *</label>
		<input type="text" name="town" value="<?php echo $_POST['town']; ?>" placeholder="" /><br>
	</div>
	<div class="lcp-form-control">
		<label>County *</label>
		<input type="text" name="county" value="<?php echo $_POST['county']; ?>" placeholder="" /><br>
	</div>
	<div class="lcp-form-control">
		<label>Postcode *</label>
		<input type="text" name="postcode" value="<?php echo $_POST['postcode']; ?>" placeholder="" /><br>
	</div>
	<div class="lcp-form-control">
		<label>Company Description *</label>
		<textarea name="company_description"><?php echo $_POST['company_description']; ?></textarea>
	</div>
	<br>
	<div class="lcp-form-control">
		<label>Phone *</label>
		<input type="text" name="phone" value="<?php echo $_POST['phone']; ?>" placeholder="" /><br>
	</div>
	<div class="lcp-form-control">
		<label>Mobile Phone *</label>
		<input type="text" name="alt_phone" value="<?php echo $_POST['alt_phone']; ?>" placeholder="" /><br>
	</div>
	<div class="lcp-form-control">
		<label>Website Address *</label>
		<input type="text" name="website" value="<?php echo $_POST['website']; ?>" placeholder="" /><br>
	</div>
	<div class="lcp-form-control">
		<label>Email *</label>
		<input type="text" name="email" value="<?php echo $_POST['email']; ?>" placeholder="" /><br>
	</div>
	<br>
	<div class="lcp-form-control">
		<label>Your approximate service range</label>
		<select name="service_range">
			<option value="9" <?php if($_POST['service_range']=='9'){ echo "selected"; } ?>>Less than 10 miles</option>
			<option value="10" <?php if($_POST['service_range']=='10'){ echo "selected"; } ?>>Upto 10 miles</option>
			<option value="25" <?php if($_POST['service_range']=='25'){ echo "selected"; } ?>>Upto 25 miles</option>
			<option value="50" <?php if($_POST['service_range']=='50'){ echo "selected"; } ?>>Upto 50 miles</option>
			<option value="100" <?php if($_POST['service_range']=='100'){ echo "selected"; } ?>>Upto 100 miles</option>
			<option value="101" <?php if($_POST['service_range']=='101'){ echo "selected"; } ?>>Over 100 miles</option>
		</select>
	</div>
	<div class="lcp-form-control">
		<label>Getting Leads</label>
		<select name="receive_leads">
			<option value="yes" <?php if($_POST['receive_leads']=='yes'){ echo "selected"; } ?>>Yes</option>
			<option value="no" <?php if($_POST['receive_leads']=='no'){ echo "selected"; } ?>>No</option>
		</select>
	</div>
	<br>
	<div class="lcp-form-control">
		<label>Username *</label>
		<input type="text" name="username" value="<?php echo $_POST['username']; ?>" placeholder="Username" /><br>
	</div>
	<div class="lcp-form-control">
		<label>Password *</label>
		<input type="password" name="password" value="" placeholder="Password" /><br>
	</div>
	<div class="lcp-form-control">
		<input type="submit" name="Submit" />
	</div>
    </form>
        
        </div>
    </div>
</div>