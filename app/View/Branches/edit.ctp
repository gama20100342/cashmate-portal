<div class="branches form">
<?php echo $this->Form->create('Branch'); ?>
	<fieldset>
		<legend><?php echo __('Edit Branch'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('branchcode');
		echo $this->Form->input('address');
		echo $this->Form->input('contactno');
		echo $this->Form->input('tel_no');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Branch.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Branch.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Branches'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Atmstations'), array('controller' => 'atmstations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Atmstation'), array('controller' => 'atmstations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardapplications'), array('controller' => 'cardapplications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardapplication'), array('controller' => 'cardapplications', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Postations'), array('controller' => 'postations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Postation'), array('controller' => 'postations', 'action' => 'add')); ?> </li>
	</ul>
</div>
