<div class="wrap lcp-content">
    <h2>Lead Detail</h2>
    <table class="table">
        <tr>
            <td>Form Reference</td>
            <td><?php echo $form->id; ?></td>
        </tr>
        <tr>
            <td>Name</th>
            <td><?php echo $form->name; ?></td>
        </tr>
        <tr>
            <td>Shortcode</td>
            <td>[lead_request_form id="<?php echo $form->id; ?>"]</td>
        </tr>
        <tr>
            <td>
                <a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_forms" class="button button-primary">Back</a>&nbsp;
            </td>
            <td>
                <a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_forms&ref=<?php echo $lead->hash; ?>&type=form&delete=1" class="button button-danger button-delete"><i class="fa fa-trash-o"></i> Delete</a>&nbsp;
                <a href="<?php echo admin_url(); ?>admin.php?page=lcp_admin_forms&ref=<?php echo $lead->hash; ?>&type=form&save=1" class="button button-success"><i class="fa fa-floppy-o"></i> Save</a>
            </td>
        </tr>
    </table>
</div>