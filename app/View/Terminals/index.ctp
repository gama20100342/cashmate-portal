<div class="terminals index">
	<h2><?php echo __('Terminals'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('alias'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($terminals as $terminal): ?>
	<tr>
		<td><?php echo h($terminal['Terminal']['id']); ?>&nbsp;</td>
		<td><?php echo h($terminal['Terminal']['name']); ?>&nbsp;</td>
		<td><?php echo h($terminal['Terminal']['alias']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $terminal['Terminal']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $terminal['Terminal']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $terminal['Terminal']['id']), array(), __('Are you sure you want to delete # %s?', $terminal['Terminal']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Terminal'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Transbalanceinquiries'), array('controller' => 'transbalanceinquiries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transbalanceinquiry'), array('controller' => 'transbalanceinquiries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transbillspayments'), array('controller' => 'transbillspayments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transbillspayment'), array('controller' => 'transbillspayments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transcashouts'), array('controller' => 'transcashouts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transcashout'), array('controller' => 'transcashouts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transchangepins'), array('controller' => 'transchangepins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transchangepin'), array('controller' => 'transchangepins', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transloadcashes'), array('controller' => 'transloadcashes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transloadcash'), array('controller' => 'transloadcashes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transpurchases'), array('controller' => 'transpurchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transpurchase'), array('controller' => 'transpurchases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Withdrawals'), array('controller' => 'withdrawals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Withdrawal'), array('controller' => 'withdrawals', 'action' => 'add')); ?> </li>
	</ul>
</div>
