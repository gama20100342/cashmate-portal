<?php echo $this->App->CommonHeader('Card Holders', $breadcrumbs, $this->request['controller']); ?>

<div class="cardholders index col-md-12">	
	<?php 
		echo $this->App->tHead(array(
				'Name', 'Contact No.', 'Gender', 'Present Address', 'Status', ''
			)
		);
	?>	
	<?php foreach ($cardholders as $cardholder): ?>
	<tr class="text-default">
		<!--td>			
			<?php
				//echo $cardholder['Cardholder']['gender'];
				/*$img = !empty($cardholder['Cardholder']['gender']) ? $cardholder['Cardholder']['gender'] : 'M';
				echo $this->Html->link($this->html->image($img.'.png', array('class' => 'img-30 img-responsive')), 
						array(
							'controller' => 'cardholders',  
							'action' => 'view', 
							$cardholder['Cardholder']['id'], 
							$cardholder['Cardholder']['firstname'], 
							$cardholder['Cardholder']['lastname'],
							$cardholder['Cardholder']['refid']
						),
						array(
							'escape' => false
						)
					);*/
			?>
		</td-->
		<td class="text-uppercase">			
			<div class="bold"><?php 
				
				echo $this->Html->link(
						$cardholder['Cardholder']['fullname'], 
						array(
							'controller' => 'cardholders',  
							'action' => 'view', 
							$cardholder['Cardholder']['id'], 
							$cardholder['Cardholder']['firstname'], 
							$cardholder['Cardholder']['lastname'],
							$cardholder['Cardholder']['refid']
						),
						array(
							'escape' => false,
							'class' => 'nounderline',							
						)
					);
					
				
			?></div>
			<div class="fs-10"><i class="fas fa-address-card fa-xs"></i> <?php echo h($cardholder['Card']['cardno']); ?></div>
		</td>

		<td class="text-left bold text-success"><?php echo $cardholder['Cardholder']['contact_no'].' / '.$cardholder['Cardholder']['tel_no']; ?></td>		
		<td class="text-left bold text-success"><?php echo $cardholder['Cardholder']['gender']; ?></td>				
		<td class="text-left bold text-success"><?php echo $cardholder['Cardholder']['present_address']; ?></td>		
		<td class="text-left bold text-success"><?php echo $cardholder['Status']['name']; ?></td>		
		
		<td class="actions">
			<?php echo $this->App->btnLink('Edit', 'edit', 'cardholders', 'edit', $cardholder['Cardholder']['id']); ?>
			<?php echo $this->App->btnLink('View', 'view', 'cardholders', 'view', $cardholder['Cardholder']['id']); ?>
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $cardholder['Cardholder']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $cardholder['Cardholder']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cardholder['Cardholder']['id']), array(), __('Are you sure you want to delete # %s?', $cardholder['Cardholder']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	<?php echo $this->App->tFoot(); ?>
</div>
<div class="clear"></div>

<div class="modal fade" id="login_idle_" data-backdrop="static" keyboard="false">
		<div class="modal-dialog modal-sm">
		  <div class="modal-content">       
			<div class="modal-body text-center">
				<p>There are total of (10) pending accounts for approval</p>
				<button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Ok</button>
			</div>
		</div>
	  </div> 
	</div>
	
	
<?php
	echo $this->Js->Buffer('
		$("#tableid").DataTable({
					destroy: true,					
					"scrollY": "250px",
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
				
				 $(document).ready( function(){
					$("#login_idle_").appendTo("body").modal("show");
				});  
				
	');
?>
