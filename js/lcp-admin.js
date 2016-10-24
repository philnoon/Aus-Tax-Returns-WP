jQuery('document').ready(function(){

	var $ = jQuery;

	if ( $('select[name="lcp_payment_gateway"]') ) {

		var payment_gateway = $('select[name="lcp_payment_gateway"]');

		if ( payment_gateway.val() == 'stripe') {

			$('.stripe-warning').show();

		}

		$('#lcp_payment_gateway').change(function(){

			if ( payment_gateway.val() == 'stripe') {

				$('.stripe-warning').show();

			} else {
				$('.stripe-warning').hide();
			}

		});

	}

	// DataTables
	$('#delete_all').click(function(event) {

		if ( $(this).is(':checked') ){
			$('.delete').prop("checked", true);
		} else {
			$('.delete').prop("checked", false);
		}

	});

	$('.button-delete').click(function() {

		if(!window.confirm('Are you sure?')) {
			return false;
		}

	});

	// FIX - for an odd error on the settings page where a select name is being copied
	// over by another!
	$('#lcp_currency_accepted').attr('name', 'lcp_currency_accepted');
	$('#lcp_on_account_payment_mode').attr('name', 'lcp_on_account_payment_mode');
	$('#status').attr('name', 'status');
	$('#salutation_id').attr('name', 'salutation_id');
	$('#service_range').attr('name', 'service_range');
	$('#receive_leads').attr('name', 'receive_leads');
	$('#lcp_stripe_mode').attr('name', 'lcp_stripe_mode');
	$('#lcp_paypal_btn_mode').attr('name', 'lcp_paypal_btn_mode');


	$('#lcp-form-fields').delegate('input[name^="field_label"]','blur',function(event){

		outer=$(this).closest('.lcp_input');
		content=$(this).val();
		place_holder=content;
		clean=content.toLowerCase().replace( /([^a-z\s])/ig,'' ).replace(/[\s]/g,"_");
		id='lcp_'+clean;
		class_name='lcp_input';

		outer.find('input[name^="placeholder"]').val(place_holder);
		outer.find('input[name^="id"]').val(id);
		outer.find('input[name^="field_name"]').val(clean);
		outer.find('input[name^="class"]').val(class_name);
		outer.parent().find('.tile-body div').text(place_holder);		
	});
	
	$('.lcp-field-buttons').delegate('.lcp-add-field','click',function(event){
		event.preventDefault();
		
		inputType=$(this).data('type');

		html='<div class="tile tile-midnightblue"><div class="tile-body"><div>'+inputType.toProperCase()+'</div></div></div>';
		html+='<input type="hidden" name="field_id['+numberOfFields+']" value="-1" />';
		html+='<table class="table lcp_input widefat">';
		html+='<tr><td class="label">Label</td><td><input type="text" name="field_label['+numberOfFields+']" /></td></tr><tr><td class="label">Name</td><td><input type="text" name="field_name['+numberOfFields+']" /></td></tr><tr><td class="label">ID</td><td><input type="text" name="id['+numberOfFields+']" /></td></tr><tr><td class="label">Class</td><td><input type="text" name="class['+numberOfFields+']" /></td></tr>';

		switch( inputType )
		{
			case 'text' :
			case 'textarea' :
			case 'checkbox' : html+='<tr><td class="label">Placeholder</td><td><input type="text" name="placeholder['+numberOfFields+']" /></td></tr>';
								break;								
			
			case 'select' :
			case 'radio' : html+='<tr><td class="label">Choices<br /><small>Enter each choice on a new line.</small></td><td><textarea name="options['+numberOfFields+']"></textarea></td></tr>';
							break;
		}
		
		html+='<tr><td class="label">Required</td><td><input type="checkbox" name="required['+numberOfFields+']" value="yes" /></td></tr><tr><td class="label">Visible<br /><small>When checked this field will be visible to prospective buyers.</small></td><td><input type="checkbox" name="visible['+numberOfFields+']" value="yes" /></td></tr><tr><td class="label"></td><td><a href="" class="delete-field button button-danger button-delete" data="-1"><i class="fa fa-trash-o"></i> Delete</a></td></tr><input type="hidden" name="field['+numberOfFields+']" value="'+inputType+'"></table>';
		
		$('#lcp-form-fields > tbody').append('<tr><td class="field-outer">'+html+'</td></tr>');
		
		numberOfFields++;
	});

	$('#lcp-form-fields').delegate('.delete-field','click',function(e){
		e.preventDefault();	
		id=$(this).data('id');
		$(this).closest('.field-outer').parent().remove();
		deleted_ids_raw=$('input[name="deletion_ids"]').val();
		deleted_ids=deleted_ids_raw.split(',');
		deleted_ids.push(id);
		$('input[name="deletion_ids"]').val( deleted_ids.join(',') );
	});
	
	var numberOfFields=$('input[name^="field_label"]').length;
	
	console.log( numberOfFields );
	
	
	/* for the hidden fields with radio buttons */
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
	
	//$('.openall').click(function(){
	  $('.panel-collapse:not(".in")').collapse('show');
	//});
	
	
});

String.prototype.toProperCase = function () {
	return this.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
};