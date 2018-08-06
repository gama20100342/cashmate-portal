
$(document).ready( function() {

		/*--------------------
		| Date Picker
		---------------------*/
		$(".date, .input-with-addon .input-group-addon").datepicker({
			autoclose: true,
			format: "yyyy-mm-dd"
		});

		/*----------------
		| Input maskking
		-------------------*/	
	 	$(".contact").inputmask("99999999999");
	 	$(".date").inputmask("9999-99-99");
	 	$(".numbers_and_letters").inputmask({"regex" : "[a-zA-Z0-9._-\\s]+"});
    	$(".numbers_only").inputmask({"regex" : "[0-9-]+"});
    	$(".letters_only").inputmask({ "regex" : "[a-zA-Z\\s]+" });

		/*-------------------
		| Response modal before form submit
		| Global script
		--------------------*/
		$("#response_modal").on("shown.bs.modal", function(e){
			$("#yes_info_correct").focus();
			$("#yes_info_correct").click( function(){
					var form = $(this).attr("form-id");					 
					$(".response_message").html("<i class='fa fa-spinner fa-spin fa-lg fa-fw'></i> Processing... please wait..").promise().done( function(){
						$("#no_info_correct, #yes_info_correct").hide("fast");						
					    $(form).submit();
					});				
			});
		});
		
		$(".btnsave").click( function(e){
			e.preventDefault();
			var form = $(".btnsave").attr("form-id");
			$("#response_modal").modal("show");		
			$("#response_modal #yes_info_correct").attr("form-id", form);
		});

		$(".comonkeypress").on("keypress change keyup", function(e){
			if(e.keyCode === 13 || e.which === 13 || e.keyCode ==="13" ||  e.which === "13"){
				var form = $(".btnsave").attr("form-id");
				$("#response_modal").modal("show");		
				$("#response_modal #yes_info_correct").attr("form-id", form);
			}

			//e.preventDefault();
		});
		
});