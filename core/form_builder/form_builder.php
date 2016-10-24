<?php

class LcpFormBuilder {

	var $mode='div';
	var $form_method='post';
	var $form_class='lcp-form';
	var $form_action='';

	public function __construct($forms_model)
	{
		$this->forms_model = $forms_model;
	}

	public function render( $form_id, $form_data, $output=true, $add_form=true ) {

		$form_html='';

		$form_structure = $this->forms_model->getById($form_id);
		$form_field_data = $this->forms_model->getFieldsByFormId($form_structure->id);
	
		foreach ($form_field_data as $field) {
			
			$form_element='';

			$properties = $this->forms_model->getFieldPropertiesByFieldId($field->id);

			foreach( $properties as $property )
			{
				$field_property[$property->property]=$property->value;
			}

			$required=$field_property['required']==1 ? ' *' : '';
			$class=$field_property['class'];
			$field_id=$field_property['id'];
			$placeholder=isset( $field_property['placeholder'] ) ? $field_property['placeholder'] : '';
			
			$form_element .= $this->_addColumn( $this->_addLabel( $field_id, $field->field_label.$required ) );
		
			if ( $field->field_type == 'text') {

				$form_value=isset( $form_data[$field->field_name] ) ? $form_data[$field->field_name] : '';
			
                $form_element .= $this->_addColumn( '<input type="'.$field->field_type.'" name="'.$field->field_name.'" id="'.$field_id.'" placeholder="'.$placeholder.'" class="'.$class.'" value="'.$form_value.'" />' );

            }

            if ( $field->field_type == 'textarea') {

				$form_value=isset( $form_data[$field->field_name] ) ? $form_data[$field->field_name] : '';
			
                $form_element .= $this->_addColumn( '<textarea name="'.$field->field_name.'" id="'.$field_id.'" placeholder="'.$placeholder.'" class="'.$class.'">'.$form_value.'</textarea>' );

            }

            if ( $field->field_type == 'select') {

                $options = $this->forms_model->getFieldOptionsByFieldId($field->id);
				
				$form_sub_element='';

                $form_sub_element .= '<select name="'.$field->field_name.'" id="'.$field_id.'" class="'.$class.'">';

                foreach($options as $option){
					
					$selected=( isset( $form_data[$field->field_name] ) && $option->id==$form_data[$field->field_name] ) ? ' selected="selected"' : '';
					
                    $form_sub_element .= '<option value="'.$option->id.'"'.$selected.'>'.$option->option_value.'</option>';
                }

                $form_sub_element .= '</select>';
				
				$form_element .= $this->_addColumn( $form_sub_element );

            }
			
            if ( $field->field_type == 'radio') {

				$form_element .= $this->_addColumn( '' );
			
                $options = $this->forms_model->getFieldOptionsByFieldId($field->id);

                foreach($options as $option){									
				
					$selected=( isset( $form_data[$field->field_name] ) && $option->id==$form_data[$field->field_name] ) ? ' checked="checked"' : '';
					$form_element .=  $this->_addColumn( '<label for="option'.$option->option_id.'">'.$option->option_value.'</label><input type="radio" name="'.$field->field_name.'" id="option'.$option->option_id.'" value="'.$option->id.'" class="'.$class.'"'.$selected.'>' );
					
                }

            }			
			
			if ( $field->field_type == 'checkbox') {

				$selected=isset( $form_data[$field->field_name] ) ? ' checked="checked"' : '';
			
                $form_element .= $this->_addColumn( '<input type="'.$field->field_type.'" name="'.$field->field_name.'" id="'.$field_id.'" class="'.$class.'" '.$selected.' />' );

            }			

			$form_html .= $this->_addRow( $form_element );

		}

		if ( $add_form )
		{
			$form_html .= '<input type="hidden" name="__lcp_form_id" value="'.$form_id.'" />';
			$form_html .= $this->_addRow( $this->_addColumn( '<input type="submit" name="Submit" /> <span>(* Denotes required information)</span>').$this->_addColumn('') ) ;			
			$form_html = $this->_addForm( $this->form_action, $this->form_method, $this->form_class, $form_html );
		}

		if ( $output )
		{
			echo $form_html;
		}
		else
		{
			return $form_html;
		}

	}
	
	private function _addColumn( $data )
	{
		$column='';
	
		if ( $this->mode=='div' )
		{
			$column.=$data;
		}
		else
		{
			$column.="<td>".$data."</td>";
		}
		
		return $column;
	}
	
	private function _addRow( $column )
	{
		$row='';
	
		if ( $this->mode=='div' )
		{
			$row.='<div class="lcp-form-control">';
			$row.=$column;
			$row.='</div>';
		}
		else
		{
			$row.='<tr>';
			$row.=$column;
			$row.='</tr>';			
		}
		
		return $row;		
	}
	
	private function _addForm( $action, $method, $class, $data )
	{		
		$form='<form method="'.$method.'" action="'.$action.'" class="'.$class.'">';
		$form.=$data;
		$form.='</form>';
		
		return $form;		
	}
	
	private function _addLabel( $for, $label )
	{
		$form_label='';

		if ( $this->mode=='div' )
		{
			$form_label.='<label for="'.$for.'">';
			$form_label.=$label;
			$form_label.='</label>';
		}
		else
		{
			$form_label.=$label;		
		}	

		return $form_label;
	}	
	
}

$LcpFormBuilder = new LcpFormBuilder($LcpForms);

?>
