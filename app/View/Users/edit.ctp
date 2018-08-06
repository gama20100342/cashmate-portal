<?php echo $this->App->commonHeader('Update Access'); ?>
<div class="users form col-md-12">
<?php echo $this->Form->create('User', array('enctype' => 'multipart/form-data', 'class' => 'form-data dropzone', 'id' => 'new_user_data')); ?>
	<fieldset>
	<div class="col-md-6 nopadding-left">
	<?php
			echo $this->Form->input('id');
		
			
			 
			echo $this->App->showForminputs(array(									
					array('input' => 'firstname', 'label' => 'First Name', 'class' => 'letters_only'),
					array('input' => 'middlename', 'label' => 'Middle Name', 'class' => 'letters_only'),
					array('input' => 'lastname', 'label' => 'Last Name', 'class' => 'letters_only'),
					array('input' => 'contact_no', 'placeholder' => '00000000000', 'label' => 'Contact', 'class' => 'numbers_only'),
					array('input' => 'tel_no', 'label' => 'Tel No', 'class' => 'numbers_only'),					
				
				));	
	?>
	</div>
	<div class="col-md-6 nopadding-right">

	<?php
			echo $this->Form->input('group_id', array(                    
                                'div' => 'input-wrap col-md-12 nopadding-left',
                                'label' => 'Select Group',                                                                								
                                'class' => 'noradius noshadow border-bottom text-left form-control comonkeypress input-md '.(isset($input['class']) && !empty(isset($input['class'])) ? $input['class'] : ''),
                                'after' => '<div class="clear"></div>'
                            ));
							
							
			echo $this->App->showForminputs(array(				
					//array('input' => 'group_id', 'label' => 'Select Group', 'type' => 'select', 'options' => $groups, 'selected' => '3'),
					array('input' => 'username', 'label' => 'Username', 'class' => 'letters_only'),					
					//array('input' => 'terminal_id', 'label' => 'Acccess Terminal',  'class' => 'letters_only', 'type' => 'select', 'empty' => false, 'options' => $terminals, 'selected' => '3'),				
				));	
			
			echo $this->Form->input('terminal_id', array(                    
                                'div' => 'input-wrap col-md-12 nopadding-left',
                                'label' => 'Assign Terminal',                                                                								
                                'class' => 'noradius noshadow border-bottom text-left form-control comonkeypress input-md '.(isset($input['class']) && !empty(isset($input['class'])) ? $input['class'] : ''),
                                'after' => '<div class="clear"></div>'
                            ));
							
							
	?>
			
		
	</div>
	<div class="clear"></div>

	</fieldset>
	<?php echo $this->App->formEnd('SAVE CHANGES', '#new_user_data'); ?>
</div>
</div>

