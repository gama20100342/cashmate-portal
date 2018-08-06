<?php echo $this->App->CommonHeader('Register Card Holder', $breadcrumbs, $this->request['controller']); ?>

<div class="cardholders form">
<?php echo $this->Form->create('Cardholder', array('class' => 'data-form', 'id' => 'new_cardholder_form')); ?>
	<fieldset>		
		<div class="col-md-4">
		<h5 class="bold"><?php echo __('Personal Information'); ?></h5>
		<?php		
			echo $this->Form->input('refid', array('type' => 'hidden', 'default' => $refid));			
			echo $this->Form->input('pin', array('type' => 'hidden', 'default' => $pin));			
			echo $this->Form->input('status_id', array('type' => 'hidden', 'default' => '4')); //pending account			
			
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
				array('input' => 'idpresented', 'label' => 'ID Presented', 'type' => 'select', 'options' => $this->Lang->ListofIds()), 
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
			<h5 class="bold bold m-t-20"><?php echo __('Card Information'); ?></h5>
			<?php		
				echo $this->App->showForminputs(array(
					array('input' => 'cardtype', 'label' => 'Card Type', 'type' => 'select', 'empty' => true, 'class' => '_cardtype', 'options' => $cardtypes),				
					//array('input' => 'cardno', 'label' => 'Card No.', 'default' => '', 'class' => 'numbers_and_letters noborder', 'read-only' => true),				
					array('input' => 'pin_clone', 'label' => 'Personal Identification No.( PIN )', 'class' => 'noborder', 'default' => $pin, 'read-only' => true),				
					
				));					
			?>
			<div class="clear"></div>
			<div class="col-md-12 nopadding m-t-20 m-b-5">
						<label class="text-success">CARD NO.</label>
						<br />
						<div class="col-md-4 nopadding">	
							<?php echo $this->App->showForminputs(array(
									array('input' => 'cardno_1s', 'default' => '56142100', 'label' => 'BIN' ,'class' => 'numbers_and_letters noborder', 'read-only' => true))); 
									
									echo $this->Form->hidden('cardno_1', array('default' => '56142100')); 
							?>
									
						</div>
						<div class="col-md-2 nopadding">	
							<?php echo $this->App->showForminputs(array(
									array('input' => 'cardno_2s', 'default' => '0', 'label' => 'Type','class' => '_ptype numbers_and_letters noborder', 'read-only' => true))); 
									echo $this->Form->hidden('cardno_2', array('default' => '0', 'class' => '_ptype')); 
								?>
						</div>
						<div class="col-md-3 nopadding">	
							<?php echo $this->App->showForminputs(array(
									array('input' => 'cardno_3s', 'default' => '000001', 'label' => 'ID', 'class' => 'numbers_and_letters noborder', 'read-only' => true)));
									echo $this->Form->hidden('cardno_3', array('default' => '000001')); 
									?>
						</div>
						<div class="col-md-3 nopadding">	
							<?php echo $this->App->showForminputs(array(
									array('input' => 'cardno_4s', 'label' => 'CHECK', 'default' => '1', 'class' => 'numbers_and_letters noborder', 'read-only' => true))); 
										echo $this->Form->hidden('cardno_4', array('default' => '1')); 
								?>
						</div>
						<div class="clear"></div>
			</div>
			<div class="clear"></div>
			<?php		
				echo $this->App->showForminputs(array(
					array('input' => 'cardstatus_id', 'label' => 'Card Status', 'type' => 'select', 'selected' => 8, 'empty' => true, 'options' => $cardstatuses)				
				));		
			?>
			<div class="clear"></div>
			<?php		
				echo $this->App->showForminputs(array(
					array('input' => 'balance', 'default' => '0.00', 'label' => 'Initial Balance ( PHP )', 'class' => 'numbers_and_letters')				
				));		
			?>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</fieldset>		
	<?php echo $this->App->formEnd('Save Information', '#new_cardholder_form'); ?>
	<div class="clear"></div>
	<div class="p-t-20"></div>
</div>
<div class="clear"></div>

<?php
	
	echo $this->Js->Buffer('
		$(document).ready( function(){
			$("._cardtype").change( function(){
				$("._ptype").val($(this).val());
			});				
		});
	');
?>
