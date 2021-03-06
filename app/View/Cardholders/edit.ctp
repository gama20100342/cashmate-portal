<div class="cardholders form">
<?php echo $this->Form->create('Cardholder', array('class' => 'data-form', 'id' => 'new_cardholder_form')); ?>
	<fieldset>
		<legend><?php echo __('CREATE ACCOUNT'); ?></legend>
		<div class="col-md-4">
		<h5 class="bold"><?php echo __('Personal Information'); ?></h5>
		<?php		
			echo $this->Form->input('id');
			//echo $this->Form->input('pin', array('type' => 'hidden', 'default' => $pin));			
			
			echo $this->App->showForminputs(array(				
				array('input' => 'firstname', 'label' => 'First Name', 'class' => 'letters_only'),
				array('input' => 'middlename', 'label' => 'Middle Name', 'class' => 'letters_only'),
				array('input' => 'lastname', 'label' => 'Last Name', 'class' => 'letters_only'),
				array('input' => 'birthdate', 'label' => '', 'type' => 'text', 'class' => 'date', 'placeholder' => 'yyyy-mm-dd'),
				array('input' => 'placeofbirth', 'label' => '', 'class' => 'numbers_and_letters'),
				array('input' => 'mothermaiden', 'label' => 'Mother Maiden Name', 'class' => 'letters_only'),
				array('input' => 'present_address', 'label' => 'Present Address', 'type' => 'textarea', 'class' => 'numbers_and_letters'),
				array('input' => 'permanent_address', 'label' => 'Permanent Address', 'type' => 'textarea', 'class' => 'numbers_and_letters'),
				array('input' => 'province_address', 'label' => 'Province Address', 'type' => 'textarea', 'class' => 'numbers_and_letters'),			
				array('input' => 'contact_no', 'label' => 'Cellphone No.', 'class' => 'contact', 'class' => 'numbers_only'),
				array('input' => 'tel_no', 'label' => 'Tel No.', 'class' => 'numbers_only'),
				array('input' => 'nationality', 'label' => 'Nationality', 'type' => 'select',  'options' => $this->Lang->showNationality()),
				array('input' => 'civil_status', 'label' => 'Civil Status', 'type' => 'select', 'options' => $this->Lang->showStatus()),
				array('input' => 'idpresented', 'label' => 'ID Presented'), 
				array('input' => 'idp_no', 'label' => 'ID No.', 'class' => 'numbers_and_letters'),
				array('input' => 'idp_expire', 'label' => 'Expiration date', 'type' => 'text', 'class' => 'date', 'placeholder' => 'mm/dd/yyyy'),
				array('input' => 'tin', 'label' => 'TIN', 'class' => 'numbers_only'),
			
			));		
		?>
		</div>
		
		<div class="col-md-4">
			<h5 class="bold m-t-20"><?php echo __('Business / Employeer Information'); ?></h5>
			<?php		
				echo $this->App->showForminputs(array(
					array('input' => 'employeer', 'label' => '','class' => 'numbers_and_letters'),
					array('input' => 'position', 'label' => '', 'class' => 'numbers_and_letters'),
					array('input' => 'business_address', 'label' => 'Business Address', 'type' => 'textarea','class' => 'numbers_and_letters'),
					array('input' => 'office_no', 'label' => 'Office Tel No.', 'class' => 'numbers_only'),
					array('input' => 'business_name', 'label' => 'Business Name', 'class' => 'numbers_and_letters'),
					array('input' => 'annual_income', 'label' => 'Annual Income', 'class' => 'numbers_and_letters')	
				));		
			?>
		</div>
		
		<div class="col-md-4">
		<h5 class="bold"><?php echo __('Card Information'); ?></h5>
		<?php		
			echo $this->App->showForminputs(array(
				array('input' => 'cardtype', 'label' => 'Card Type', 'class' => 'noborder', 'type' => 'select', 'empty' => false, 'options' => $cardtypes, 'read-only' => true),				
				array('input' => 'cardno', 'label' => 'Card No.', 'default' => $this->data['Card']['cardno'], 'class' => 'noborder numbers_and_letters', 'read-only' => true),				
				array('input' => 'pin_clone', 'label' => 'Personal Identification No.( PIN )', 'class' => 'noborder', 'default' => $this->data['Card']['pincode'], 'read-only' => true),				
				
			));		
		?>
		<div class="clear"></div>

		

		</div>
	</fieldset>		
	<?php echo $this->App->formEnd('SAVE', '#new_cardholder_form'); ?>
	<div class="clear"></div>
	<div class="p-t-10"></div>
</div>
<div class="clear"></div>
