$('#printbtn').click(function(){
		var check = $('.trans_id').val();
		if(check == null){
			toastr.options = {
		      "closeButton": true,
		      "debug": false,
		      "positionClass": "toast-top-right",
		      "onclick": null,
		      "showDuration": "3000",
		      "hideDuration": "100",
		      "timeOut": "3000",
		      "extendedTimeOut": "0",
		      "showEasing": "swing",
		      "hideEasing": "swing",
		      "showMethod": "show",
		      "hideMethod": "hide"
		    }
		    toastr.error("No reports to be print");
		}
		else{
			
		}
	});