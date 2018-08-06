<div class="transbillspayments index">
	<h2><?php echo __('Transbillspayments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('transactiontype_id'); ?></th>
			<th><?php echo $this->Paginator->sort('transcode'); ?></th>
			<th><?php echo $this->Paginator->sort('card_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cardholder_id'); ?></th>
			<th><?php echo $this->Paginator->sort('accountname'); ?></th>
			<th><?php echo $this->Paginator->sort('partner_id'); ?></th>
			<th><?php echo $this->Paginator->sort('terminal_id'); ?></th>
			<th><?php echo $this->Paginator->sort('postation_id'); ?></th>
			<th><?php echo $this->Paginator->sort('accountnumber'); ?></th>
			<th><?php echo $this->Paginator->sort('transdate'); ?></th>
			<th><?php echo $this->Paginator->sort('remaining_balance'); ?></th>
			<th><?php echo $this->Paginator->sort('amount_due'); ?></th>
			<th><?php echo $this->Paginator->sort('customer_charge'); ?></th>
			<th><?php echo $this->Paginator->sort('partner_charge'); ?></th>
			<th><?php echo $this->Paginator->sort('total_amount'); ?></th>
			<th><?php echo $this->Paginator->sort('status_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($transbillspayments as $transbillspayment): ?>
	<tr>
		<td><?php echo h($transbillspayment['Transbillspayment']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transbillspayment['Transactiontype']['name'], array('controller' => 'transactiontypes', 'action' => 'view', $transbillspayment['Transactiontype']['id'])); ?>
		</td>
		<td><?php echo h($transbillspayment['Transbillspayment']['transcode']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transbillspayment['Card']['id'], array('controller' => 'cards', 'action' => 'view', $transbillspayment['Card']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transbillspayment['Cardholder']['id'], array('controller' => 'cardholders', 'action' => 'view', $transbillspayment['Cardholder']['id'])); ?>
		</td>
		<td><?php echo h($transbillspayment['Transbillspayment']['accountname']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transbillspayment['Partner']['name'], array('controller' => 'partners', 'action' => 'view', $transbillspayment['Partner']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transbillspayment['Terminal']['name'], array('controller' => 'terminals', 'action' => 'view', $transbillspayment['Terminal']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transbillspayment['Postation']['name'], array('controller' => 'postations', 'action' => 'view', $transbillspayment['Postation']['id'])); ?>
		</td>
		<td><?php echo h($transbillspayment['Transbillspayment']['accountnumber']); ?>&nbsp;</td>
		<td><?php echo h($transbillspayment['Transbillspayment']['transdate']); ?>&nbsp;</td>
		<td><?php echo h($transbillspayment['Transbillspayment']['remaining_balance']); ?>&nbsp;</td>
		<td><?php echo h($transbillspayment['Transbillspayment']['amount_due']); ?>&nbsp;</td>
		<td><?php echo h($transbillspayment['Transbillspayment']['customer_charge']); ?>&nbsp;</td>
		<td><?php echo h($transbillspayment['Transbillspayment']['partner_charge']); ?>&nbsp;</td>
		<td><?php echo h($transbillspayment['Transbillspayment']['total_amount']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transbillspayment['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $transbillspayment['Status']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transbillspayment['Transbillspayment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transbillspayment['Transbillspayment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transbillspayment['Transbillspayment']['id']), array(), __('Are you sure you want to delete # %s?', $transbillspayment['Transbillspayment']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Transbillspayment'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Transactiontypes'), array('controller' => 'transactiontypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transactiontype'), array('controller' => 'transactiontypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partners'), array('controller' => 'partners', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partner'), array('controller' => 'partners', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Terminals'), array('controller' => 'terminals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Terminal'), array('controller' => 'terminals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Postations'), array('controller' => 'postations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Postation'), array('controller' => 'postations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
