<legend><?php echo __('Manage User Access'); ?></legend>
<div class="users index col-md-12">
	<?php echo $this->App->tHead(array('', 'Username', 'Access Role', 'Access Name', 'Last Login', 'Status', 'Terminal', '')); ?>
	<?php foreach ($users as $user): ?>
	<tr>
		<td>

			<?php 

				if(empty($user['Useravatar']['user_id'])){
					echo $this->Html->link($this->html->image('avatar.png', array('class' => 'img-30 img-responsive')), 
						array(
							'controller' => 'useravatars',  
							'action' => 'add', 
							$user['User']['refid'], $user['User']['firstname'], $user['User']['lastname']
						),
						array(
							'escape' => false
						)
					);
					
					//echo $this->App->btnLink('Edit', 'edit', 'useravatars', 'add/'.$user['User']['refid'].'/'.$user['User']['firstname'].'/'.$user['User']['lastname']);
				}else{
					echo $this->Html->link($this->html->image($user['Useravatar']['image_file'], array('class' => 'img-30 img-responsive')), 
						array(
							'controller' => 'useravatars',  
							'action' => 'add', 
							$user['User']['refid'], $user['User']['firstname'], $user['User']['lastname']
						),
						array(
							'escape' => false
						)
					);
					//echo $this->App->btnLink('Edit', 'edit', 'useravatars', 'edit_avatar/'.$user['User']['refid'].'/'.$user['User']['id']);
				}
			
			?>

		</td>		
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['Group']['name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['name']); ?>&nbsp;</td>		
		<td><?php echo date('d M Y h:i A', strtotime($user['User']['last_login'])); ?>&nbsp;</td>
		<td><?php echo h($user['Status']['name']); ?>&nbsp;</td>
		<td><?php echo h($user['Terminal']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->App->btnLink('Edit', 'edit', 'users', 'edit', $user['User']['id']); ?>				
			<?php echo $this->App->btnLink('View', 'view', 'users', 'view', $user['User']['id']); ?>				
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
					"lengthMenu": [[4, 10, 25, 50, 100, -1], [4, 10, 25, 50, 100, "All"]],
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
