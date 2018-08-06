<div class="settings form">
<?php echo $this->Form->create('Setting'); ?>
	<fieldset>
		<legend><?php echo __('Add Setting'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('address1');
		echo $this->Form->input('address2');
		echo $this->Form->input('bin');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Settings'), array('action' => 'index')); ?></li>
	</ul>
</div>
