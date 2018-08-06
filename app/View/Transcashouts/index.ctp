<div class="transcashouts index">
	<h2><?php echo __('Transcashouts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('transactiontype_id'); ?></th>
			<th><?php echo $this->Paginator->sort('transcode'); ?></th>
			<th><?php echo $this->Paginator->sort('card_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cardholder_id'); ?></th>
			<th><?php echo $this->Paginator->sort('accountname'); ?></th>
			<th><?php echo $this->Paginator->sort('terminal_id'); ?></th>
			<th><?php echo $this->Paginator->sort('remaining_balance'); ?></th>
			<th><?php echo $this->Paginator->sort('cashout_amount'); ?></th>
			<th><?php echo $this->Paginator->sort('current_balance'); ?></th>
			<th><?php echo $this->Paginator->sort('transdate'); ?></th>
			<th><?php echo $this->Paginator->sort('atmstation_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($transcashouts as $transcashout): ?>
	<tr>
		<td><?php echo h($transcashout['Transcashout']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transcashout['Transactiontype']['name'], array('controller' => 'transactiontypes', 'action' => 'view', $transcashout['Transactiontype']['id'])); ?>
		</td>
		<td><?php echo h($transcashout['Transcashout']['transcode']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transcashout['Card']['id'], array('controller' => 'cards', 'action' => 'view', $transcashout['Card']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transcashout['Cardholder']['id'], array('controller' => 'cardholders', 'action' => 'view', $transcashout['Cardholder']['id'])); ?>
		</td>
		<td><?php echo h($transcashout['Transcashout']['accountname']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transcashout['Terminal']['name'], array('controller' => 'terminals', 'action' => 'view', $transcashout['Terminal']['id'])); ?>
		</td>
		<td><?php echo h($transcashout['Transcashout']['remaining_balance']); ?>&nbsp;</td>
		<td><?php echo h($transcashout['Transcashout']['cashout_amount']); ?>&nbsp;</td>
		<td><?php echo h($transcashout['Transcashout']['current_balance']); ?>&nbsp;</td>
		<td><?php echo h($transcashout['Transcashout']['transdate']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transcashout['Atmstation']['name'], array('controller' => 'atmstations', 'action' => 'view', $transcashout['Atmstation']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transcashout['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $transcashout['Status']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transcashout['Transcashout']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transcashout['Transcashout']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transcashout['Transcashout']['id']), array(), __('Are you sure you want to delete # %s?', $transcashout['Transcashout']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Transcashout'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Transactiontypes'), array('controller' => 'transactiontypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transactiontype'), array('controller' => 'transactiontypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Terminals'), array('controller' => 'terminals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Terminal'), array('controller' => 'terminals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Atmstations'), array('controller' => 'atmstations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Atmstation'), array('controller' => 'atmstations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
