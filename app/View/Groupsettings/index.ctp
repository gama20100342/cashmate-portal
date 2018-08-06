<?php echo $this->App->commonHeader('Manage Capability'); ?>
<div class="groupsettings index col-md-8">
	<?php echo $this->App->tHead(array('Category', 'Url', 'Allowed Group', 'Action')) ;?>
	
	<?php foreach ($groupsettings as $groupsetting): ?>
	<tr>		
		<td>
			<?php echo $groupsetting['Groupsettingscategory']['name']; ?>
		</td>
		<td><?php echo $groupsetting['Groupsetting']['controller'].'/'.$groupsetting['Groupsetting']['action']; ?>&nbsp;</td>		
		<td>
			<?php echo $groupsetting['Group']['name']; ?>
		</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('<i class="fas fa-eye fa-lg"></i>'), array('action' => 'view', $groupsetting['Groupsetting']['id']), array('escape' => false)); ?>
			<?php echo $this->Html->link(__('<i class="fas fa-edit fa-lg"></i>'), array('action' => 'edit', $groupsetting['Groupsetting']['id']), array('escape' => false)); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $groupsetting['Groupsetting']['id']), array(), __('Are you sure you want to delete # %s?', $groupsetting['Groupsetting']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	<?php echo $this->App->tFoot(); ?>
</div>

<?php
	echo $this->Js->Buffer('
		$("#tableid").DataTable({
					destroy: true,
					//"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]]
					"scrollY": "200px",
					"scrollCollapse": false,
					"lengthMenu": [[5, -1], [5, "All"]],	
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
