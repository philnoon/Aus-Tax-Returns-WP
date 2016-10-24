jQuery(document).ready( function(){

	var $ = jQuery;
	
	$('.has-div-to-show').change( function() {
		if($(this).val() == 'yes') {
			$(this).parent('label').siblings('.to-show').hide().removeClass('hidden').fadeIn();
		} else {
			$(this).parent('label').siblings('.to-show').fadeOut('fast');
		}			
	});
	
	$('.has-div-to-show[value="yes"]').each( function() {
		if( $(this).is(':checked') ) {
			$(this).parent('label').siblings('.to-show').hide().removeClass('hidden').fadeIn();
		}
	});
	
	
	$('.hidden').each( function() {
	
			//$(this).find('input:text').css( "border", "1px solid red" );
			$(this).find('input:text').val(' ');
	});
	
	
	//Acivate fle input plugin with parameters
	$('input[type="file"]').fileinput({
        showUpload: false,
		showUploadedThumbs: false,
		allowedFileExtensions: ['pdf'],
		maxFileSize: 5000,
		initialPreviewShowDelete: false
	});
	
	
	$('.datepicker').datepicker({
	    format: 'yyyy/mm/dd'
	});
	
	
	//disable button on submit event
	$('form').submit( function() {	
		$(this).find('input[type="submit"]').attr('disabled', 'disabled');		
	});
	
	
	$('.openall').click(function(){
	  $('.panel-collapse:not(".in")').collapse('show');
	});
	
	//footer copyright year
	//jQuery("#year-footer").html(new Date().getFullYear());
	
});