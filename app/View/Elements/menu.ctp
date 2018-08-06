<?php 
if($user['group_id'] > 0){
	echo $this->element('menu/admin', array('user' => $user));
}
