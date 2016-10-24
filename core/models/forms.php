<?php

class LcpForms {

	function __construct($db)
	{

		$this->db = $db;

	}

	/*
	 *
	 * 	Purpose: Gets all forms
	 * 	Added in Version 1.3.0
	 *
	 */
	function get() {

		$query = "SELECT * FROM ".$this->db->tables['forms']." ORDER BY `id` DESC";
		return $this->db->wpdb->get_results( $query );

	}

	/*
	 *
	 * 	Purpose: Gets a single form
	 * 	Added in Version 1.3.0
	 *
	 */
	function getById($id) {

		$query = "	SELECT * 
					FROM ".$this->db->tables['forms'] .
					" WHERE id = '".$id."' ORDER BY id DESC";

		$results = $this->db->wpdb->get_results( $query );
		return $results[0];

	}

    /*
     *
     * 	Purpose: Gets the form fields for a single form
     * 	Added in Version 1.3.0
     *
     */
    function getFieldsByFormId($form_id) {

        $query =    "	SELECT *
				  	    FROM ".$this->db->tables['form_fields'] .
                     "  WHERE form_id = '".$form_id."' ORDER BY id ASC";

        $results = $this->db->wpdb->get_results( $query );
        return $results;

    }

    /*
     *
     * 	Purpose: Gets the form options for a single form field
     * 	Added in Version 1.3.0
     *
     */
    function getFieldPropertiesByFieldId($field_id) {

        $query =    "	SELECT *
				  	    FROM ".$this->db->tables['form_field_properties'] .
                     "  WHERE form_field_id = '".$field_id."' ORDER BY id ASC";

        $results = $this->db->wpdb->get_results( $query );
        return $results;

    }	
	
    /*
     *
     * 	Purpose: Gets the form options for a single form field
     * 	Added in Version 1.3.0
     *
     */
    function getFieldOptionsByFieldId($field_id) {

        $query =    "	SELECT *
				  	    FROM ".$this->db->tables['form_field_options'] .
                     "  WHERE form_field_id = '".$field_id."' ORDER BY id ASC";

        $results = $this->db->wpdb->get_results( $query );
        return $results;

    }

	function getRequiredFields($form_id)
	{		
		$sql=$this->db->wpdb->prepare( "SELECT field_name 
										FROM `".$this->db->tables['form_fields']."` FF 
										LEFT JOIN `".$this->db->tables['form_field_properties']."` FFP ON FF.id = FFP.form_field_id 
										WHERE `property` = 'required' AND value = 1 AND FF.form_id = %d", $form_id );
										
		$results = $this->db->wpdb->get_results( $sql );
		return $results;		
	}
	
	function getVisibleFields($form_id)
	{		
		$sql=$this->db->wpdb->prepare( "SELECT field_name, field_label FROM `".$this->db->tables['form_fields']."` WHERE field_visible = 1 AND form_id = %d", $form_id );
		$results = $this->db->wpdb->get_results( $sql );
		return $results;		
	}
	
	
	/*
	 *
	 * 	Purpose: Adds a form
	 * 	Added in Version 1.3.0
	 *
	 */
	function insert($data) {

		$result = $this->db->wpdb->insert($this->db->tables['forms'], $data);

		if ($result == 1) {
			return $this->db->wpdb->insert_id;
		}

		return false; 

	}

	/*
	 *
	 * 	Purpose: Adds a form field
	 * 	Added in Version 1.3.0
	 *
	 */
	function insert_field($data) {

		$result = $this->db->wpdb->insert($this->db->tables['form_fields'], $data);

		if ($result == 1) {
			return $this->db->wpdb->insert_id;
		}

		return false; 

	}

	/*
	 *
	 * 	Purpose: Adds a form property
	 * 	Added in Version 1.3.0
	 *
	 */
	function insert_field_property($data) {

		$result = $this->db->wpdb->insert($this->db->tables['form_field_properties'], $data);

		if ($result == 1) {
			return $this->db->wpdb->insert_id;
		}

		return false; 

	}

	/*
	 *
	 * 	Purpose: Adds a form option
	 * 	Added in Version 1.3.0
	 *
	 */
	function insert_field_options($data) {

		$result = $this->db->wpdb->insert($this->db->tables['form_field_options'], $data);

		if ($result == 1) {
			return $this->db->wpdb->insert_id;
		}

		return false; 

	}
	
	/*
	 *
	 * 	Purpose: Deletes a form
	 * 	Added in Version 1.3.0
	 *
	 */
	function delete($form_id)
	{
		// Get the associated field ids
		$field_results = $this->db->wpdb->get_results( "SELECT id FROM ".$this->db->tables['form_fields']." WHERE form_id = '".$form_id."'" );

		foreach( $field_results as $field_result )
		{
			$this->delete_field($field_result->id);
		}
		
		// step 4. delete the form
		$this->db->wpdb->query( " DELETE FROM ".$this->db->tables['forms']." WHERE id = '".$form_id."'");
	}

	function delete_field( $id )
	{
		$this->delete_field_options( $id );

		// step 2. Remove the field properties
		$this->db->wpdb->query( " DELETE FROM ".$this->db->tables['form_field_properties']." WHERE form_field_id = '".$id."'");

		// step 3. delete the field
		$this->db->wpdb->query( " DELETE FROM ".$this->db->tables['form_fields']." WHERE id = '".$id."'");		
	}
	
	function delete_field_options( $id )
	{
		// Step 1. Remove the field options
		$this->db->wpdb->query( "DELETE FROM ".$this->db->tables['form_field_options']." WHERE form_field_id = '".$id."'");		
	}
	
	/*
	 *
	 * 	Purpose: Updates a form
	 * 	Added in Version 1.3.0
	 *
	 */
	function update($data,$form_id)
	{
		$this->db->wpdb->show_errors();
		return $this->db->wpdb->update($this->db->tables['forms'], $data, array('id'=>$form_id));
	}
	
	function update_field($data,$field_id)
	{		
		$this->db->wpdb->show_errors();
		return $this->db->wpdb->update($this->db->tables['form_fields'], $data, array( 'id'=>$field_id ) );
	}
	
	function update_field_property($data)
	{
		$this->db->wpdb->show_errors();
		
		$property				= $data['property'];
		$field_id				= $data['form_field_id'];
		
		$db_data['value']		= $data['value'];
		$db_data['updated_at'] 	= date('Y-m-d H:i:s');

		return $this->db->wpdb->update($this->db->tables['form_field_properties'], $db_data, array( 'property'=>$property, 'form_field_id'=>$field_id ) );
		
	}

}

$LcpForms = new LcpForms($LcpDb, $LcpCompanies, $LcpLeads);
