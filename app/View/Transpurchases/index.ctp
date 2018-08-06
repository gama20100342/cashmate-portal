<div class="transpurchases index">
	<h2><?php echo __('Transpurchases'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('transactiontype_id'); ?></th>
			<th><?php echo $this->Paginator->sort('transcode'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('card_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cardholder_id'); ?></th>
			<th><?php echo $this->Paginator->sort('accountname'); ?></th>
			<th><?php echo $this->Paginator->sort('terminal_id'); ?></th>
			<th><?php echo $this->Paginator->sort('transdate'); ?></th>
			<th><?php echo $this->Paginator->sort('remaining_balance'); ?></th>
			<th><?php echo $this->Paginator->sort('total_amount'); ?></th>
			<th><?php echo $this->Paginator->sort('current_balance'); ?></th>
			<th><?php echo $this->Paginator->sort('postation_id'); ?></th>
			<th><?php echo $this->Paginator->sort('atmstation_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status_id'); ?></th>
			<th><?php echo $this->Paginator->sort('soa'); ?></th>
			<th><?php echo $this->Paginator->sort('ornumber'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($transpurchases as $transpurchase): ?>
	<tr>
		<td><?php echo h($transpurchase['Transpurchase']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transpurchase['Transactiontype']['name'], array('controller' => 'transactiontypes', 'action' => 'view', $transpurchase['Transactiontype']['id'])); ?>
		</td>
		<td><?php echo h($transpurchase['Transpurchase']['transcode']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transpurchase['User']['id'], array('controller' => 'users', 'action' => 'view', $transpurchase['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transpurchase['Card']['id'], array('controller' => 'cards', 'action' => 'view', $transpurchase['Card']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transpurchase['Cardholder']['id'], array('controller' => 'cardholders', 'action' => 'view', $transpurchase['Cardholder']['id'])); ?>
		</td>
		<td><?php echo h($transpurchase['Transpurchase']['accountname']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transpurchase['Terminal']['name'], array('controller' => 'terminals', 'action' => 'view', $transpurchase['Terminal']['id'])); ?>
		</td>
		<td><?php echo h($transpurchase['Transpurchase']['transdate']); ?>&nbsp;</td>
		<td><?php echo h($transpurchase['Transpurchase']['remaining_balance']); ?>&nbsp;</td>
		<td><?php echo h($transpurchase['Transpurchase']['total_amount']); ?>&nbsp;</td>
		<td><?php echo h($transpurchase['Transpurchase']['current_balance']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transpurchase['Postation']['name'], array('controller' => 'postations', 'action' => 'view', $transpurchase['Postation']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transpurchase['Atmstation']['name'], array('controller' => 'atmstations', 'action' => 'view', $transpurchase['Atmstation']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transpurchase['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $transpurchase['Status']['id'])); ?>
		</td>
		<td><?php echo h($transpurchase['Transpurchase']['soa']); ?>&nbsp;</td>
		<td><?php echo h($transpurchase['Transpurchase']['ornumber']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transpurchase['Transpurchase']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transpurchase['Transpurchase']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transpurchase['Transpurchase']['id']), array(), __('Are you sure you want to delete # %s?', $transpurchase['Transpurchase']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Transpurchase'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Transactiontypes'), array('controller' => 'transactiontypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transactiontype'), array('controller' => 'transactiontypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Terminals'), array('controller' => 'terminals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Terminal'), array('controller' => 'terminals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Postations'), array('controller' => 'postations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Postation'), array('controller' => 'postations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Atmstations'), array('controller' => 'atmstations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Atmstation'), array('controller' => 'atmstations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
