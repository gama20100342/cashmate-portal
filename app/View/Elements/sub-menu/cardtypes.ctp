<?php 
	
	if(!in_array($action, array("add", "edit", "dashboard"))){
	//if($action!=="add"){
		echo $this->App->Showbutton(
			'Register', 
			'btn-violet pull-left fs-10', 
			$controller, 
			'add', 
			'pen-alt'
		);	
	}
	
	if(in_array($action, array("add", "edit"))){
	 echo $this->App->Showbutton(
			'Back', 
			'btn-violet pull-right fs-10', 
			$controller, 
			'index'
		);
	}
	
?>