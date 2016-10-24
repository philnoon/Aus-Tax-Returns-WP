<div class="wrap lcp-content">
	<h2><?php echo $page_title; ?></h2>	
	
	
	<div class="panel panel-default">		
	    <div class="panel-heading">
	        <h3 class="panel-title">Income Documents</h3>
	    </div>
	    <div class="panel-body">	
	    	<table class="table table-hover table-striped table-bordered table-condensed" id="">
	    	<thead><TR>
	    	<TH>Document Name</TH>
	    	<TH>Date Created</TH>
	    	</TR></thead><tbody>
	    	<?php
	    	
	    	//$user_ID=$_GET['id'];	    	
	    	//$user_ID = get_current_user_id();
	    	$user_data =  get_userdata( $user_ID );
	    	
	    	$iterator = new FilesystemIterator('/Applications/MAMP/htdocs/simple-solutions-acc/ssa/wp-content/plugins/lead-capture-pro/client-docs/'.$user_data->user_login.'/income');		
	    	foreach($iterator as $fileInfo){
	    	print("<TR>");
	    		if($fileInfo->isFile()){
	    			$cTime = new DateTime();
	    			$cTime->setTimestamp($fileInfo->getCTime());
	    			print("<TD>");
	    			print($fileInfo->getFileName());
	    			print("</TD>");							
	    			print("<TD>");
	    			print($cTime->format('Y-m-d h:i:s'));
	    			print("</TD>");
	    		}
	    	print("</TR>");
	    	}?>
	    	</tbody>
	    	</TABLE>	
	    </div>        
	</div>
	
	<div class="panel panel-default">		
	    <div class="panel-heading">
	        <h3 class="panel-title">Deductions Documents</h3>
	    </div>
	    <div class="panel-body">	
	    	<table class="table table-hover table-striped table-bordered table-condensed" id="">
	    	<thead><TR>
	    	<TH>Document Name</TH>
	    	<TH>Date Created</TH>
	    	</TR></thead><tbody>
	    	<?php	    	
	    	$iterator = new FilesystemIterator('/Applications/MAMP/htdocs/simple-solutions-acc/ssa/wp-content/plugins/lead-capture-pro/client-docs/'.$user_data->user_login.'/deductions');		
	    	foreach($iterator as $fileInfo){
	    	print("<TR>");
	    		if($fileInfo->isFile()){
	    			$cTime = new DateTime();
	    			$cTime->setTimestamp($fileInfo->getCTime());
	    			print("<TD>");
	    			print($fileInfo->getFileName());
	    			print("</TD>");							
	    			print("<TD>");
	    			print($cTime->format('Y-m-d h:i:s'));
	    			print("</TD>");
	    		}
	    	print("</TR>");
	    	}?>
	    	</tbody>
	    	</TABLE>	
	    </div>        
	</div>
	
	<div class="panel panel-default">		
	    <div class="panel-heading">
	        <h3 class="panel-title">Other Info Documents</h3>
	    </div>
	    <div class="panel-body">	
	    	<table class="table table-hover table-striped table-bordered table-condensed" id="">
	    	<thead><TR>
	    	<TH>Document Name</TH>
	    	<TH>Date Created</TH>
	    	</TR></thead><tbody>
	    	<?php	    	
	    	$iterator = new FilesystemIterator('/Applications/MAMP/htdocs/simple-solutions-acc/ssa/wp-content/plugins/lead-capture-pro/client-docs/'.$user_data->user_login.'/otherinfo');		
	    	foreach($iterator as $fileInfo){
	    	print("<TR>");
	    		if($fileInfo->isFile()){
	    			$cTime = new DateTime();
	    			$cTime->setTimestamp($fileInfo->getCTime());
	    			print("<TD>");
	    			print($fileInfo->getFileName());
	    			print("</TD>");							
	    			print("<TD>");
	    			print($cTime->format('Y-m-d h:i:s'));
	    			print("</TD>");
	    		}
	    	print("</TR>");
	    	}?>
	    	</tbody>
	    	</TABLE>	
	    </div>        
	</div>
	
</div>