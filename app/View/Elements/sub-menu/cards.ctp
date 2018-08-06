<?php 
		
	$_url[]= explode("/", $this->request->url);
	$controller = $_url[0][0];
	$action 	= $_url[0][1];
	$param1 	= isset($_url[0][2]) && !empty($_url[0][2]) ? $_url[0][2] : '';
	$param2 	= isset($_url[0][3]) && !empty($_url[0][3]) ? $_url[0][3] : '';
	$param3 	= isset($_url[0][4]) && !empty($_url[0][4]) ? $_url[0][4] : '';
	
	//$card_id = trim(str_replace($this->params['controller'], "", str_replace("/", "", str_replace($action, "", $this->request->url))));
	//$cardno  = str_replace($card_id, "", str_replace($this->params['controller'], "", str_replace("/", "", str_replace($action, "", $this->request->url))));
	
	if(in_array($action, array("view"))){
		echo $this->App->Showbutton(
			'Load Card', 
			'btn-violet pull-left fs-10 loadcard', 
			"cards", 
			'loadCard/'.$param1.'/'.$param2,
			'money-bill'
		);
		echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'De-activate', 
			'btn-violet pull-left fs-10', 
			"cardholders", 
			'add', 
			'eye-slash'
		);
		echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'Block', 
			'btn-violet pull-left fs-10', 
			"cardholders", 
			'add', 
			'lock'
		);
		echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'Activate', 
			'btn-violet pull-left fs-10', 
			"cardholders", 
			'add', 
			'eye'
		);
		echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'Search Transaction', 
			'btn-violet pull-left fs-10', 
			"cardholders", 
			'add', 
			'user-tag'
		);
	}
	
	
	if(!in_array($action, array("add", "edit", "dashboard", "view", "loadCard"))){
	//if($action!=="add"){
		echo $this->App->Showbutton(
			'Enroll New Account', 
			'btn-violet pull-left fs-10', 
			"cardholders", 
			'add', 
			'pen-alt'
		);	
	}
	
	if(in_array($action, array("loadCard"))){
		 echo $this->App->Showbutton(
			'Back', 
			'btn-violet pull-right fs-10', 
			$controller, 
			'view/'.$param1.'/'.$param2		
		);
	}
	
	
	if(in_array($action, array("add", "edit", "view"))){
	 echo $this->App->Showbutton(
			'Back', 
			'btn-violet pull-right fs-10', 
			$controller, 
			'index'
		);
	}
	
	
?>