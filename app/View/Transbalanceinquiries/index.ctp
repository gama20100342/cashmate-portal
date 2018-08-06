<div class="transbalanceinquiries index">
	<h2><?php echo __('Transbalanceinquiries'); ?></h2>
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
			<th><?php echo $this->Paginator->sort('transdate'); ?></th>
			<th><?php echo $this->Paginator->sort('postation_id'); ?></th>
			<th><?php echo $this->Paginator->sort('atmstation_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($transbalanceinquiries as $transbalanceinquiry): ?>
	<tr>
		<td><?php echo h($transbalanceinquiry['Transbalanceinquiry']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transbalanceinquiry['Transactiontype']['name'], array('controller' => 'transactiontypes', 'action' => 'view', $transbalanceinquiry['Transactiontype']['id'])); ?>
		</td>
		<td><?php echo h($transbalanceinquiry['Transbalanceinquiry']['transcode']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transbalanceinquiry['Card']['id'], array('controller' => 'cards', 'action' => 'view', $transbalanceinquiry['Card']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transbalanceinquiry['Cardholder']['id'], array('controller' => 'cardholders', 'action' => 'view', $transbalanceinquiry['Cardholder']['id'])); ?>
		</td>
		<td><?php echo h($transbalanceinquiry['Transbalanceinquiry']['accountname']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transbalanceinquiry['Terminal']['name'], array('controller' => 'terminals', 'action' => 'view', $transbalanceinquiry['Terminal']['id'])); ?>
		</td>
		<td><?php echo h($transbalanceinquiry['Transbalanceinquiry']['transdate']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transbalanceinquiry['Postation']['name'], array('controller' => 'postations', 'action' => 'view', $transbalanceinquiry['Postation']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transbalanceinquiry['Atmstation']['name'], array('controller' => 'atmstations', 'action' => 'view', $transbalanceinquiry['Atmstation']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transbalanceinquiry['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $transbalanceinquiry['Status']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transbalanceinquiry['Transbalanceinquiry']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transbalanceinquiry['Transbalanceinquiry']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transbalanceinquiry['Transbalanceinquiry']['id']), array(), __('Are you sure you want to delete # %s?', $transbalanceinquiry['Transbalanceinquiry']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Transbalanceinquiry'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Transactiontypes'), array('controller' => 'transactiontypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transactiontype'), array('controller' => 'transactiontypes', 'action' => 'add')); ?> </li>
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
