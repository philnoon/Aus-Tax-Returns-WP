<div class="wrap lcp-content">

<h2><?php echo $page_title; ?></h2>

<div class="row">
<div class="col-md-12">		
<div class="panel panel-default">
<div class="panel-heading">
	<h3 class="panel-title">Income Documents</h3>
</div>				

<div class="panel-body">	
	<table class="table table-hover table-striped table-bordered table-condensed" id="order-pdfs-tble">
	<thead><TR>
	<TH>File</TH>
	<TH>Date Created</TH>
	</TR></thead><tbody>
	<?php					
	//remote
	$iterator = new FilesystemIterator('/home3/scruffyd/public_html/dev1/wp-content/plugins/lead-capture-pro/client-docs/'.$lodgementDocs->user_login.'/income/');
	
	foreach($iterator as $fileInfo){
	print("<TR>");
	if($fileInfo->isFile()){
	$cTime = new DateTime();
	$cTime->setTimestamp($fileInfo->getCTime());
	
	//remote
	//http://scruffydogstudio.com.au/dev1/wp-content/plugins/lead-capture-pro/client-docs/Johno/income/test-doc-2.pdf
	print("<TD>");
	print("<a href='http://scruffydogstudio.com.au/dev1/wp-content/plugins/lead-capture-pro/client-docs/".$lodgementDocs->user_login."/income/".$fileInfo->getFileName()."' target='_blank'>".$fileInfo->getFileName()."</a>");
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
</div>

<div class="row">
<div class="col-md-12">		
<div class="panel panel-default">
<div class="panel-heading">
	<h3 class="panel-title">Deductions Documents</h3>
</div>				

<div class="panel-body">	
	<table class="table table-hover table-striped table-bordered table-condensed" id="order-pdfs-tble">
	<thead><TR>
	<TH>File</TH>
	<TH>Date Created</TH>
	</TR></thead><tbody>
	<?php					
	//remote
	$iterator = new FilesystemIterator('/home3/scruffyd/public_html/dev1/wp-content/plugins/lead-capture-pro/client-docs/'.$lodgementDocs->user_login.'/deductions/');
	
	foreach($iterator as $fileInfo){
	print("<TR>");
	if($fileInfo->isFile()){
	$cTime = new DateTime();
	$cTime->setTimestamp($fileInfo->getCTime());
	
	//remote
	//http://scruffydogstudio.com.au/dev1/wp-content/plugins/lead-capture-pro/client-docs/Johno/income/test-doc-2.pdf
	print("<TD>");
	print("<a href='http://scruffydogstudio.com.au/dev1/wp-content/plugins/lead-capture-pro/client-docs/".$lodgementDocs->user_login."/deductions/".$fileInfo->getFileName()."' target='_blank'>".$fileInfo->getFileName()."</a>");
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
</div>

<div class="row">
<div class="col-md-12">		
<div class="panel panel-default">
<div class="panel-heading">
	<h3 class="panel-title">Other Info Documents</h3>
</div>				

<div class="panel-body">	
	<table class="table table-hover table-striped table-bordered table-condensed" id="order-pdfs-tble">
	<thead><TR>
	<TH>File</TH>
	<TH>Date Created</TH>
	</TR></thead><tbody>
	<?php					
	//remote
	$iterator = new FilesystemIterator('/home3/scruffyd/public_html/dev1/wp-content/plugins/lead-capture-pro/client-docs/'.$lodgementDocs->user_login.'/otherinfo/');
	
	foreach($iterator as $fileInfo){
	print("<TR>");
	if($fileInfo->isFile()){
	$cTime = new DateTime();
	$cTime->setTimestamp($fileInfo->getCTime());
	
	//remote
	//http://scruffydogstudio.com.au/dev1/wp-content/plugins/lead-capture-pro/client-docs/Johno/income/test-doc-2.pdf
	print("<TD>");
	print("<a href='http://scruffydogstudio.com.au/dev1/wp-content/plugins/lead-capture-pro/client-docs/".$lodgementDocs->user_login."/otherinfo/".$fileInfo->getFileName()."' target='_blank'>".$fileInfo->getFileName()."</a>");
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
</div>