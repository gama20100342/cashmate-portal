<!DOCTYPE html>
<html>
<head>
	
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cash Card</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
 
 <?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array(
        'theme-style',
        'skin.min',
        'all',
        'bootstrap.min',
        'animate.min',
        'bootstrap-dropdownhover.min',
        'jquery.dataTables',
        'uploadfile', 
		'datepicker3',
		'spectrumColorpicker',
        'custom',        
        'util'
    ));	
        
    echo $this->Html->script(array(
        'jQuery-2.2.0.min'
    ));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('js');
	
	?>
</head>

<body class="hold-transition skin-green layout-top-nav fixed">
    <header class="main-header">
      <?php echo $this->element('navigation', array('user' => $this->Session->read('Auth.User'))); ?>
    </header>   
    <div class="content-wrapper col-md-10 col-lg-10 nopadding">
      <section class="content-menu m-t-73 m-l-27">    
        <?php echo $this->Session->flash(); ?>            
        <?php echo $this->element('page-menu'); ?>
      </section>
      <section class="content nopadding m-t-2 m-l-27">         
          <?php echo $this->fetch('content'); ?> 
      </section>
    </div>   
    <div class="clear"></div>
    <footer class="brb-footer">
        <?php echo $this->element('footer'); ?>
    </footer>
    <?php echo $this->Js->writeBuffer(); ?>

    
    <div class="modal" id="response_modal" data-backdrop="static" keyboard="false">
        <div class="modal-dialog modal-sm">
			<div class="modal-content">       
				<div class="modal-body text-center">
					<p class="response_message text-success fs-12">Are all information correct?</p>
					<?php echo $this->Html->link('Yes', '#', array('form-id' =>'', 'class' => 'btn btn-success btn-sm', 'id' => 'yes_info_correct')); ?>
					<?php echo $this->Html->link('Cancel', '#', array('data-dismiss' => 'modal', 'class' => 'btn btn-danger btn-sm', 'id' => 'no_info_correct')); ?>
				</div>
			</div>
		</div> 
    </div>
	
	<div class="modal" id="load_modal" data-backdrop="static" keyboard="false">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">       
            <div class="modal-body text-center">
               <input type="text" class="form-control input-lg" />			   
            </div>
        </div>
    </div> 
   </div>
   
	<div class="modal fade" id="login_idle" data-backdrop="static" keyboard="false">
		<div class="modal-dialog modal-sm">
		  <div class="modal-content">       
			<div class="modal-body text-center">
				<p>Your session has been idle over it's time limit. Please login again</p>
				<?php echo $this->Html->link('Ok', array('controller' => 'users', 'action' => 'logout'), array('class' => 'btn btn-success btn-sm')); ?>
			</div>
		</div>
	  </div> 
	</div>
	
	
	<div class="modal" id="_loading_modal" data-backdrop="static" keyboard="false">
        <div class="modal-dialog modal-xs m-t-180">        
            <div class="text-center text-success fs-12 _loading_spin">
				<i class="fa fa-sync fa-spin fa-lg fa-fw"></i> Processing Request. Please wait...				
            </div>
        </div>
    </div> 
   </div>
   
   <div class="modal" id="_error_modal" data-backdrop="static" keyboard="false">
        <div class="modal-dialog modal-xs m-t-180">        
            <div class="text-center text-danger fs-12 _error_spin">
				<i class="fa fa-exclamation-triangle fa-lg fa-fw"></i> 
				<div class="bold">Error While Processing your Request</div>
				<div class="_mem text-warning"></div>
				<div class="m-t-10">
					<button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Ok</button>
				</div>
            </div>
        </div>
    </div> 
   </div>
   
   
	
	


</body>
</html>


<?php
	echo $this->Html->script(array(
    'bootstrap.min',
    'inputmask/inputmask',
    'inputmask/inputmask.extensions',
    'inputmask/inputmask.numeric.extensions',
    'inputmask/inputmask.date.extensions',
    'inputmask/inputmask.phone.extensions',
    'inputmask/jquery.inputmask',
    'bootstrap-datepicker',  
    'bootstrap-dropdownhover.min',  
    'jquery.dataTables.min',     
	'jquery.canvasjs.min',
	'jquery.idledetection.min',
    'cookies',    
    'custom',
    //'idle'
));	

echo $this->fetch('script');

?>
<script type="text/javascript">

	function _loading_message(type){
		$("#_loading_modal").modal(type);
	}

	function _error_message(type, msg){
		$("._mem").html(msg);
		$("#_error_modal").modal(type);
	}
	
	$("#login_idle").on("shown.bs.modal", function(){
		$.get("/cashmate/users/idle_warning", function(data, status){
			if(status!=="success"){
				 $("#login_idle").modal("hide");	 
			}
		});	
	});


	$(document).idleDetection({
	  onIdle: function() {
		 $("#login_idle").modal("show");	     
	  },
	  onHide: function() {
		//$("#login_idle").modal("show");	     
		//alert("Window/tab is not active anymore, do something else!");
	  },
	  onActive: function() {
		 //alert("User is active again. Hello user!");
	  },
	  onShow: function() {
		  //alert("Window is active again. Hey there window!");
	  },
	  idleCheckPeriod: 900000 //15 mins
	});
/*
idleCheckPeriod: 1800000 //30 mins
idleCheckPeriod: 300000 //5 mins
idleCheckPeriod: 1000 //30 mins
*/
  
</script>

