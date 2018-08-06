<?php echo $this->App->CommonHeader('Manage Cards'); ?>
<div class="cards index col-md-12">
	<?php echo $this->App->tHead(array('Card Holder', 'Card No', 'Registered', 'Activation Date', 'Last Transaction', 'Balance ( PHP )', 'Status', '')); ?>	
	<?php foreach ($cards as $card): ?>
	<tr>
		<td><?php echo h($card['Cardholder']['fullname']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['cardno']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['last_transaction']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['last_transaction']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['last_transaction']); ?>&nbsp;</td>
		<!--td><?php //echo $card['Currency']['code'].' '.h($card['Card']['balance']); ?>&nbsp;</td-->
		<td class="text-right"><?php echo number_format($card['Card']['balance'], 2, ".", ","); ?>&nbsp;</td>
		<td class="bold" ><?php echo $card['Cardstatus']['name']; ?></td>	
		<td class="actions">
			<?php //echo $this->App->btnLink('Edit', 'edit', 'cards', 'edit', $card['Card']['id']); ?>
			<?php echo $this->App->btnLink('View', 'view', 'cards', 'view', $card['Card']['id'], $card['Card']['cardno']); ?>
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $card['Card']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $card['Card']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $card['Card']['id']), array(), __('Are you sure you want to delete # %s?', $card['Card']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	<?php echo $this->App->tFoot(); ?>
</div>
<div class="clear"></div>
<?php
	echo $this->Js->Buffer('
		$("#tableid").DataTable({
					destroy: true,					
					"scrollY": "200px",
					"scrollCollapse": false,
					"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
					"bStateSave": false, 
					"pagingType": "full_numbers",
					"fnPreDrawCallback": function(){					
						var info =  $(this).DataTable().page.info();
						$("#table_page_Info_search").html(
							"Page " +(info.page+1)+ " of " +info.pages+" Pages"
						);
						return true;
					}
				});
	');
?>