<div class="transchangepins index">
	<h2><?php echo __('Transchangepins'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('transactiontype_id'); ?></th>
			<th><?php echo $this->Paginator->sort('transcode'); ?></th>
			<th><?php echo $this->Paginator->sort('card_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cardholder_id'); ?></th>
			<th><?php echo $this->Paginator->sort('accountname'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('terminal_id'); ?></th>
			<th><?php echo $this->Paginator->sort('transdate'); ?></th>
			<th><?php echo $this->Paginator->sort('old_pin'); ?></th>
			<th><?php echo $this->Paginator->sort('new_pin'); ?></th>
			<th><?php echo $this->Paginator->sort('status_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($transchangepins as $transchangepin): ?>
	<tr>
		<td><?php echo h($transchangepin['Transchangepin']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transchangepin['Transactiontype']['name'], array('controller' => 'transactiontypes', 'action' => 'view', $transchangepin['Transactiontype']['id'])); ?>
		</td>
		<td><?php echo h($transchangepin['Transchangepin']['transcode']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transchangepin['Card']['id'], array('controller' => 'cards', 'action' => 'view', $transchangepin['Card']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transchangepin['Cardholder']['id'], array('controller' => 'cardholders', 'action' => 'view', $transchangepin['Cardholder']['id'])); ?>
		</td>
		<td><?php echo h($transchangepin['Transchangepin']['accountname']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transchangepin['User']['id'], array('controller' => 'users', 'action' => 'view', $transchangepin['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transchangepin['Terminal']['name'], array('controller' => 'terminals', 'action' => 'view', $transchangepin['Terminal']['id'])); ?>
		</td>
		<td><?php echo h($transchangepin['Transchangepin']['transdate']); ?>&nbsp;</td>
		<td><?php echo h($transchangepin['Transchangepin']['old_pin']); ?>&nbsp;</td>
		<td><?php echo h($transchangepin['Transchangepin']['new_pin']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transchangepin['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $transchangepin['Status']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transchangepin['Transchangepin']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transchangepin['Transchangepin']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transchangepin['Transchangepin']['id']), array(), __('Are you sure you want to delete # %s?', $transchangepin['Transchangepin']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Transchangepin'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Transactiontypes'), array('controller' => 'transactiontypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transactiontype'), array('controller' => 'transactiontypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Terminals'), array('controller' => 'terminals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Terminal'), array('controller' => 'terminals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
