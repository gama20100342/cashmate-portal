<nav class="navbar navbar-static-top">
      <div class="container" style="width: 100%">
        <div class="navbar-header">
			    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <?php echo $this->element('menu', array('user' => $user)); ?>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle user-image-menu" data-toggle="dropdown">                                                      
                  <div class="hidden-xs pull-right m-l-3 text-upper m-t-5"><?php echo $user['firstname'] ?></div>
                  <?php 
					if(empty($user['Useravatar']['user_id'])){
						$image = 'avatar.png';
					}else{
						$image = $user['Useravatar']['image_file'];
					}
					
					echo $this->App->showUserPicture($image, '30', 'pull-right'); 
                  
				  ?>
				  <div class="clear"></div>
              </a>
              <ul class="dropdown-menu nopadding">
                <li class="user-header text-left">                                                  
                    <?php echo $this->App->showUserPicture($image, '80', 'pull-left'); ?>
                    <p class="text-center"><?php echo $user['firstname'] . '<br />' . $user['lastname']; ?></p>
                </li>
                <li class="user-footer">
                  <div class="pull-left">				
                  </div>
                  <div class="pull-right">
				              	<?php echo $this->Html->link('Sign Out', array('controller' => 'users', 'action' => 'logout'), array('class' => 'btn btn-default btn-flat')); ?>
                  </div>
                </li>
              </ul>

            </li>
          </ul>
        </div>
      </div>
      	<div class="clear"></div>
    </nav>