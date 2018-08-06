<div class="cardapplications index">
	<h2><?php echo __('Cardapplications'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('refid'); ?></th>
			<th><?php echo $this->Paginator->sort('cardstatus_id'); ?></th>
			<th><?php echo $this->Paginator->sort('registered'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('branch_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($cardapplications as $cardapplication): ?>
	<tr>
		<td><?php echo h($cardapplication['Cardapplication']['id']); ?>&nbsp;</td>
		<td><?php echo h($cardapplication['Cardapplication']['refid']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cardapplication['Cardstatus']['name'], array('controller' => 'cardstatuses', 'action' => 'view', $cardapplication['Cardstatus']['id'])); ?>
		</td>
		<td><?php echo h($cardapplication['Cardapplication']['registered']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cardapplication['User']['id'], array('controller' => 'users', 'action' => 'view', $cardapplication['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cardapplication['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $cardapplication['Branch']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cardapplication['Cardapplication']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cardapplication['Cardapplication']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cardapplication['Cardapplication']['id']), array(), __('Are you sure you want to delete # %s?', $cardapplication['Cardapplication']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Cardapplication'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cardstatuses'), array('controller' => 'cardstatuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardstatus'), array('controller' => 'cardstatuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
	</ul>
</div>
