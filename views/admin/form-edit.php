<div class="wrap lcp-content">
    <h2>Form Details</h2>
	
	<?php if ($updated === TRUE) : ?>
	<div class="alert alert-success">
		<strong>Excellent!</strong> The form was updated
	</div>
	<?php endif; ?>

	<?php if ($validated === FALSE) : ?>
	<div class="alert alert-danger">
		<strong>Oops!</strong> Please complete all the required form fields
	</div>
	<?php endif; ?>	
	
    <form method="post" action="<?php echo admin_url(); ?>admin.php?page=lcp_admin_form_edit&ref=<?php echo $form->id; ?>&action=save">
		<input type="hidden" name="deletion_ids" value="" />
        <table class="table">
            <tr>
                <td>Form Reference</td>
                <td><?php echo $form->id; ?></td>
            </tr>
            <tr>
                <td>Name</th>
                <td><input name="name" value="<?php echo $form->name; ?>" /></td>
            </tr>
            <tr>
                <td>Shortcode</td>
                <td>[lead_request_form id="<?php echo $form->id; ?>"]</td>
            </tr>
            <tr>
                <td>
                    <a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_forms" class="button button-primary">Back</a>&nbsp;
                </td>
                <td></td>
            </tr>
        </table>
        <hr>
    	<table class="table" id="lcp-form-fields">
			<thead>
				<tr>
	                <td colspan="2" valign="top">
	                    <div class="button-group-vertical lcp-field-buttons" role="group">
	                        <a href="#" class="button button-primary lcp-add-field" data-type="text">Add Text Field</a> <a href="#" class="button button-primary lcp-add-field" data-type="textarea">Add Textarea</a> <a href="#" class="button button-primary lcp-add-field" data-type="select">Add Select</a> <a href="#" class="button button-primary lcp-add-field" data-type="radio">Add Radio Button(s)</a> <a href="#" class="button button-primary lcp-add-field" data-type="checkbox">Add Checkbox(es)</a>
	                    </div>
	                </td>
				</tr>			
			</thead>		
    		<tbody>
<?php
$number_of_fields=0;

if ( sizeof( $field_data ) > 0 )
{

	foreach( $field_data as $data )
	{
?>
				<tr>
					<td class="field-outer">
						<div class="tile tile-midnightblue">
							<div class="tile-body">
								<div><?php echo $data['field_label']?></div>
							</div>
						</div>
						<input type="hidden" name="field_id[<?php echo $number_of_fields;?>]" value="<?php echo $data['field_id'];?>" />
						<table class="table lcp_input widefat">
							<tr>
								<td class="label">Label</td>
								<td><input type="text" name="field_label[<?php echo $number_of_fields;?>]" value="<?php echo $data['field_label']?>" /></td>
							</tr>
							<tr>
								<td class="label">Name</td>
								<td><input type="text" name="field_name[<?php echo $number_of_fields;?>]" value="<?php echo $data['field_name']?>" /></td>
							</tr>
							<tr>
								<td class="label">ID</td>
								<td><input type="text" name="id[<?php echo $number_of_fields;?>]" value="<?php echo $data['id']?>" /></td>
							</tr>
							<tr>
								<td class="label">Class</td>
								<td><input type="text" name="class[<?php echo $number_of_fields;?>]" value="<?php echo $data['class']?>" /></td>
							</tr>
<?php
		if ( in_array( $data['field_type'], Array('text','textarea','checkbox') ) )
		{
?>
							<tr>
								<td class="label">Placeholder</td>
								<td><input type="text" name="placeholder[<?php echo $number_of_fields;?>]" value="<?php echo $data['placeholder']?>" /></td>
							</tr>
<?php
		}
		elseif ( in_array( $data['field_type'], Array('select','radio') ) )
		{
?>
							<tr>
								<td class="label">Choices<br /><small>Enter each choice on a new line.</small></td>
								<td><textarea name="options[<?php echo $number_of_fields;?>]"><?php echo $data['options']?></textarea></td>
							</tr>
<?php			
		}
?>
							<tr>
								<td class="label">Required</td>
								<td><input type="checkbox" name="required[<?php echo $number_of_fields;?>]" value="yes" <?php echo $data['required']==1 ? 'checked="checked"' : '';?> /></td>
							</tr>
							<tr>
								<td class="label">Visible<br /><small>When checked this field will be visible to prospective buyers.</small></td>
								<td><input type="checkbox" name="visible[<?php echo $number_of_fields;?>]" value="yes" <?php echo $data['field_visible']==1 ? 'checked="checked"' : '';?> /></td>
							</tr>
							<tr>
								<td class="label"></td>
								<td><a href="" class="delete-field button button-danger button-delete" data-id="<?php echo $data['field_id'];?>"><i class="fa fa-trash-o"></i> Delete</a></td>
							</tr>
							<input type="hidden" name="field[<?php echo $number_of_fields;?>]" value="<?php echo $data['field_type'];?>" />
						</table>
					</td>
				</tr>
<?php	
	$number_of_fields++;

	}

}
?>			
            </tbody>
			<tfoot>
				<tr>
	                <td width="20%" valign="top">
	                    <div class="button-group-vertical lcp-field-buttons" role="group">
	                        <a href="#" class="button button-primary lcp-add-field" data-type="text">Add Text Field</a> <a href="#" class="button button-primary lcp-add-field" data-type="textarea">Add Textarea</a> <a href="#" class="button button-primary lcp-add-field" data-type="select">Add Select</a> <a href="#" class="button button-primary lcp-add-field" data-type="radio">Add Radio Button(s)</a> <a href="#" class="button button-primary lcp-add-field" data-type="checkbox">Add Checkbox(es)</a>
	                    </div>
	                </td>
					<td></td>
				</tr>
				<tr>
					<td><a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_forms" class="button button-primary">Back</a>&nbsp;</td>
					<td><a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_forms&ref=<?php echo $form->id; ?>&type=form&delete=1" class="button button-danger button-delete"><i class="fa fa-trash-o"></i> Delete</a>&nbsp;<input type="submit" class="button button-success pull-right" value="Save"></td>
				</tr>
			</tfoot>
        </table>
    </form>
</div>