<?php echo $this->App->commonHeader('Manage Access Role'); ?>
<div class="groups index">	
	<div class="col-md-8">
	<?php echo $this->App->tHead(array('Group', 'Roles Assigned', 'Access Assigned', '')); ?>
	<?php foreach ($groups as $key => $group): ?>
		<tr>
			<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>			
			<td><?php echo $group[0]['total_user']; ?>&nbsp;</td>
			<td><?php echo $group[0]['total_setting']; ?>&nbsp;</td>			
			<td class="actions">
				<?php echo $this->App->btnLink('Edit', 'edit', 'groups', 'edit', $group['Group']['id']); ?>			
				<?php echo $this->App->btnLink('View', 'view', 'groups', 'view', $group['Group']['id']); ?>							
				<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $group['Group']['id']), array(), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php echo $this->App->tFoot(); ?>	
</div>
</div>

<?php
	echo $this->Js->Buffer('
		$("#tableid").DataTable({
					destroy: true,					
					"scrollY": "200px",
					"scrollCollapse": false,
					"lengthMenu": [[6, 10, 25, 50, 100, -1], [6, 10, 25, 50, 100, "All"]],
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
