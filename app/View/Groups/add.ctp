<?php echo $this->App->commonHeader('Access Role'); ?>
<div class="groups form">
<?php echo $this->Form->create('Group', array('class' => 'data-form', 'id' => 'new_group_form')); ?>
	<fieldset>	
		<div class="col-md-6">
	<?php
		echo $this->App->showForminputs(array(				
			array('input' => 'name', 'label' => 'Name of the Group', 'placeholder' => 'e.g. Branch Staff', 'class' => 'numbers_and_letters comonkeypress')			
		));
		
	?>
	</div>
	<div class="col-md-6">
	
	<?php
		echo $this->App->showForminputs(array(							
			array('input' => 'description', 'type' => 'textarea', 'label' => 'Short Description', 'class' => 'numbers_and_letters comonkeypress')
		));
		
	?>
	
		</div>
		<div class="clear"></div>
		<div class="m-t-20"></div>	
		<?php echo $this->App->formEnd('Save', '#new_group_form'); ?>
	</fieldset>
</div>
