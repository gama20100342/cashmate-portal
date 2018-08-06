
<div class="collapse navbar-collapse pull-left" id="navbar-collapse bold">
	<ul class="nav navbar-nav dropdown">
			<li><?php echo $this->App->pageLink('DASHBOARD', 'cards', 'dashboard'); ?></li>			
			<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-address-card fa-lg"></i> Cards <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">									
						<!--li><?php echo $this->App->pageLink('Enroll New Card', 'cardholders', 'index'); ?></li-->
						<li><?php echo $this->App->pageLink('Manage', 'cards', 'index'); ?></li>						
						<li><?php echo $this->App->pageLink('Card Types', 'cardtypes', 'index'); ?></li>						
						<li><?php echo $this->App->pageLink('Card Status', 'cardstatuses', 'index'); ?></li>						
						<li><?php echo $this->App->pageLink('Transactions', 'transactiontypes', 'index'); ?></li>						
						<!--li class="dropdown">
								<a href="#">Settings<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius">
									<li><?php echo $this->App->pageLink('New Card Type', 'cardtypes', 'add'); ?></li>
									<li><?php echo $this->App->pageLink('Card Types', 'cardtypes', 'index'); ?></li>									
									<li><?php echo $this->App->pageLink('New Status', 'cardstatuses', 'add'); ?></li>
									<li><?php echo $this->App->pageLink('Status', 'cardstatuses', 'index'); ?></li>
								</ul>
						</li-->						
					</ul>
			</li>
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-address-book fa-lg"></i> Client Accounts <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">
						<li><?php echo $this->App->pageLink('Enroll New Account', 'cardholders', 'add'); ?></li>
						<li><?php echo $this->App->pageLink('Manage', 'cardholders', 'index'); ?></li>										
						<li><?php echo $this->App->pageLink('Upload', 'cardholders', 'index'); ?></li>										
					</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn fadeInRight fadeInLeft"><i class="fas fa-calculator fa-lg"></i> Transactions  <span class="caret"></span></a>
					<ul class="dropdown-menu noborder noradius" role="menu">
						<li class="dropdown">
								<a href="#">Approved<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius">
									<li><?php echo $this->App->pageLink('Acquirer Terminal', 'cardholders', 'add'); ?></li>
									<li><?php echo $this->App->pageLink('Issuer Branch', 'cardholders', 'add'); ?></li>
								</ul>
						</li>						
						<li><?php echo $this->App->pageLink('POS', 'cardholders', 'add'); ?></li>						
						<li class="dropdown">
								<a href="#">Rejected<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius">
									<li><?php echo $this->App->pageLink('Acquirer', 'cardholders', 'add'); ?></li>
									<li><?php echo $this->App->pageLink('Issuer', 'cardholders', 'add'); ?></li>
									<li><?php echo $this->App->pageLink('OnUs Terminal Wise', 'cardholders', 'add'); ?></li>
									<li><?php echo $this->App->pageLink('OnUs Branch Wise', 'cardholders', 'add'); ?></li>
								</ul>
						</li>				
						<li><?php echo $this->App->pageLink('Total Amount OnUs POS', 'cardholders', 'add'); ?></li>						
						<li class="dropdown">
								<a href="#">Terminals<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius">
									<li><?php echo $this->App->pageLink('Add New Termnial', 'terminals', 'add'); ?></li>
									<li><?php echo $this->App->pageLink('Manage', 'terminals', 'index'); ?></li>
								</ul>
						</li>	
					</ul>
			</li>
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-address-book fa-lg"></i> Partners <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">
						<li><?php echo $this->App->pageLink('Register New Partner', 'partners', 'add'); ?></li>						
						<li><?php echo $this->App->pageLink('Manage', 'partners', 'index'); ?></li>					

					</ul>
			</li>
			
		<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-tasks fa-lg"></i> Reports <span class="caret"></span></a>
					<ul class="dropdown-menu noborder noradius noshadow" role="menu">
						<li class="dropdown">
								<a href="#">Intrabank<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius">
									<li><?php echo $this->App->pageLink('Fund Transfer ( SA-CA )', 'cardholders', 'add'); ?></li>									
								</ul>
						</li>												
						<li class="dropdown">
								<a href="#">Applications<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius">
									<li><?php echo $this->App->pageLink('Exception', 'cardholders', 'add'); ?></li>
									<li><?php echo $this->App->pageLink('Manual Application', 'cardholders', 'add'); ?></li>
									<li><?php echo $this->App->pageLink('Manual Application Re-Issue', 'cardholders', 'add'); ?></li>									
								</ul>
						</li>
						<li class="dropdown">
								<a href="#">Bills Payment<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius">
									<li><?php echo $this->App->pageLink('Summary', 'cardholders', 'add'); ?></li>
									<li><?php echo $this->App->pageLink('DPS', 'cardholders', 'add'); ?></li>
									<li><?php echo $this->App->pageLink('Monthend', 'cardholders', 'add'); ?></li>									
								</ul>
						</li>	
						<li class="dropdown">
								<a href="#">Cards<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius noshadow">
									<li><?php echo $this->App->pageLink('Delivery', 'cardholders', 'add'); ?></li>
									<li><?php echo $this->App->pageLink('Detail', 'cardholders', 'add'); ?></li>
									<li><?php echo $this->App->pageLink('Generated', 'cardholders', 'add'); ?></li>									
									<li><?php echo $this->App->pageLink('Debit Card', 'cardholders', 'add'); ?></li>									
									<li><?php echo $this->App->pageLink('Deleted', 'cardholders', 'add'); ?></li>									
									<li><?php echo $this->App->pageLink('Activated', 'cardholders', 'add'); ?></li>									
									<li><?php echo $this->App->pageLink('Hostlisted', 'cardholders', 'add'); ?></li>									
									<li><?php echo $this->App->pageLink('Renewal', 'cardholders', 'add'); ?></li>									
									<li><?php echo $this->App->pageLink('Active', 'cardholders', 'add'); ?></li>									
									<li><?php echo $this->App->pageLink('Inactive', 'cardholders', 'add'); ?></li>									
									<li><?php echo $this->App->pageLink('Expired', 'cardholders', 'add'); ?></li>									
									<li><?php echo $this->App->pageLink('Total Issued Cards', 'cardholders', 'add'); ?></li>									
								</ul>
						</li>											
					</ul>
			</li>

			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-key fa-lg"></i> User Access <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">
						<li><?php echo $this->App->pageLink('Register New Access', 'users', 'add'); ?></li>
						<li><?php echo $this->App->pageLink('Manage', 'users', 'index'); ?></li>												
						<li><?php echo $this->App->pageLink('Settings', 'groups', 'index'); ?></li>												
						<!--li class="dropdown">
								<a href="#">Access Role<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius noshadow">
									<li><?php echo $this->App->pageLink('Add New Role', 'groups', 'add'); ?></li>
									<li><?php echo $this->App->pageLink('Manage', 'groups', 'index'); ?></li>																										
								</ul>
						</li>	
						<li class="dropdown">
								<a href="#">Role Capabilities<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius noshadow">
									<li><?php echo $this->App->pageLink('Add New Capabilities', 'groupsettings', 'add'); ?></li>
									<li><?php echo $this->App->pageLink('Manage', 'groupsettings', 'index'); ?></li>																								
								</ul>
						</li>				
						<li class="dropdown">
								<a href="#">Access Categories<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius noshadow">
									<li><?php echo $this->App->pageLink('Add New Category', 'groupsettingscategories', 'add'); ?></li>															
									<li><?php echo $this->App->pageLink('Manage', 'groupsettingscategories', 'index'); ?></li>															
								</ul>
						</li-->	
					</ul>
			</li>
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-cog fa-lg"></i> System <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">
										
						<li><?php echo $this->App->pageLink('Settings', 'groups', 'index'); ?></li>												
						
					</ul>
			</li>
			
			
			<?php 
			/*
			echo $this->Form->create('Card', array('url' => array('controller' => 'cards', 'action' => 'search'), 'class' => 'navbar-form navbar-left'));
				echo '<div class="input-group">';
					echo '<input type="text" name="data[Card][keyword]" class="form-control" placeholder="Search...">';
							echo '<span class="input-group-btn">';
							echo '<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>';
						echo '</span>';
					echo '</div>';
			echo $this->Form->end();*/
			?>

		
	</ul>

</div>