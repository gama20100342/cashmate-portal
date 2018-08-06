<?php echo $this->App->commonHeader('New Access'); ?>
<div class="users form col-md-12">
<?php echo $this->Form->create('User', array('enctype' => 'multipart/form-data', 'class' => 'form-data dropzone', 'id' => 'new_user_data')); ?>
	<fieldset>
	<div class="col-md-6 nopadding-left">
	<?php
			echo $this->Form->input('refid', array('type' => 'hidden', 'default' => $refid));
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
			echo $this->App->showForminputs(array(				
					array('input' => 'group_id', 'label' => 'Select Group', 'type' => 'select', 'options' => $groups),
					array('input' => 'username', 'label' => 'Username', 'class' => 'letters_only'),
					array('input' => 'password', 'label' => 'Password', 'class' => 'letters_only'),										
					array('input' => 'terminal_id', 'label' => 'Acccess Terminal',  'class' => 'letters_only', 'type' => 'select', 'options' => $terminals),
				
				));	
	?>
			
		
	</div>
	<div class="clear"></div>

	</fieldset>
	<?php echo $this->App->formEnd('NEXT', '#new_user_data'); ?>
</div>
</div>

