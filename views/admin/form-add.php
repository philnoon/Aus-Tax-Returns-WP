<div class="wrap lcp-content">
	<h1>Forms</h1>
	<h2>Lead Capture Forms</h2>
	<form action="?page=lcp_admin_form_add" method="post" class="lcp-form">
		<table class="lcp_title table">
			<tbody>
				<tr>
					<td style="width: 24%">Name:</td>
					<td><input type="text" name="name" /></td>
				</tr>
			</tbody>
		</table>
    	<table class="table" id="lcp-form-fields">
			<thead>
				<tr>
	                <td colspan="2" valign="top">
	                    <div class="button-group-vertical lcp-field-buttons" role="group">
	                        <a href="#" class="button button-primary lcp-add-field" data-type="text">Add Text Field</a> <a href="#" class="button button-primary lcp-add-field" data-type="textarea">Add Textarea</a> <a href="#" class="button button-primary lcp-add-field" data-type="select">Add Select</a> <a href="#" class="button button-primary lcp-add-field" data-type="radio">Add Radio Button(s)</a><a href="#" class="button button-primary lcp-add-field" data-type="checkbox">Add Checkbox(es)</a>
	                    </div>
	                </td>
				</tr>			
			</thead>
    		<tbody>
            </tbody>
			<tfoot>
				<tr>
	                <td colspan="2" valign="top">
	                    <div class="button-group-vertical lcp-field-buttons" role="group">
	                        <a href="#" class="button button-primary lcp-add-field" data-type="text">Add Text Field</a> <a href="#" class="button button-primary lcp-add-field" data-type="textarea">Add Textarea</a> <a href="#" class="button button-primary lcp-add-field" data-type="select">Add Select</a> <a href="#" class="button button-primary lcp-add-field" data-type="radio">Add Radio Button(s)</a><a href="#" class="button button-primary lcp-add-field" data-type="checkbox">Add Checkbox(es)</a>
	                    </div>
	                </td>
				</tr>
				<tr>
					<td><a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_forms" class="button button-primary">Back</a>&nbsp;</td>
					<td><input type="submit" class="button button-success pull-right" value="Save"></td>
				</tr>
			</tfoot>
        </table>
	</form>
</div>