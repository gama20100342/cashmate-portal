<div class="branches index">
	<h2><?php echo __('Branches'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('branchcode'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('contactno'); ?></th>
			<th><?php echo $this->Paginator->sort('tel_no'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($branches as $branch): ?>
	<tr>
		<td><?php echo h($branch['Branch']['id']); ?>&nbsp;</td>
		<td><?php echo h($branch['Branch']['name']); ?>&nbsp;</td>
		<td><?php echo h($branch['Branch']['branchcode']); ?>&nbsp;</td>
		<td><?php echo h($branch['Branch']['address']); ?>&nbsp;</td>
		<td><?php echo h($branch['Branch']['contactno']); ?>&nbsp;</td>
		<td><?php echo h($branch['Branch']['tel_no']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $branch['Branch']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $branch['Branch']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $branch['Branch']['id']), array(), __('Are you sure you want to delete # %s?', $branch['Branch']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Branch'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Atmstations'), array('controller' => 'atmstations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Atmstation'), array('controller' => 'atmstations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardapplications'), array('controller' => 'cardapplications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardapplication'), array('controller' => 'cardapplications', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Postations'), array('controller' => 'postations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Postation'), array('controller' => 'postations', 'action' => 'add')); ?> </li>
	</ul>
</div>
