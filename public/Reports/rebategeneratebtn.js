$('#generatebtn').click(function(){
		var report = $('#selectrange').val();
	    var start_date = $('#start_date_date').val();
	    var monthly = $('#monthly_date').val();
	    var yearly = $('#yearly_date').val();
    	var total = 0;
    	var charge = 0;
    	var corpname = [];
    	var charge = [];
		if(report == 'daily')
		{
			if(start_date != '')
			{
				$.ajax
				({
					url: '/dailyRebateReport',
					type: 'get',
					data:  { start_date:start_date},
					dataType : 'json',
					success:function(response){
						
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
					    toastr.success("Done!");
					    document.getElementById('printbtn').className = 'btn btn-success pull-right';
					},
					error:function(){
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
					    toastr.error("Sorry! No data found");
					}
				});
			}
			else
			{
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
			    toastr.warning("Please select a starting date");
			}
		}
		else if(report == 'weekly')
		{
			if(start_date != '')
			{

			    var date = new Date(start_date);
			    var newdate = new Date(date);
			    var sdd = date.getDate();
			    var smm = date.getMonth() + 1;
			    var sy = date.getFullYear();

			    var startdate = sy + '-' + smm + '-' + sdd;
			    newdate.setDate(newdate.getDate() + 6);
			    
			    var dd = newdate.getDate();
			    var mm = newdate.getMonth() + 1;
			    var y = newdate.getFullYear();



			    var enddate =  y + '-' + mm + '-' + dd ;

			    var seconddate = new Date(date);
			    seconddate.setDate(seconddate.getDate()+1);
			    var secdd = seconddate.getDate();
			    var secmm = seconddate.getMonth()+1;
			    var secy = 	seconddate.getFullYear();
			    var secdate = secy + '-' + secmm + '-' + secdd;

			    var thirddate = new Date(date);
			    thirddate.setDate(thirddate.getDate()+2);
			    var thirddd = thirddate.getDate();
			    var thirdmm = thirddate.getMonth()+1;
			    var thirdy = 	thirddate.getFullYear();
			    var thirddate = thirdy + '-' + thirdmm + '-' + thirddd;

			    var fourthdate = new Date(date);
			    fourthdate.setDate(fourthdate.getDate()+3);
			    var fourthdd = fourthdate.getDate();
			    var fourthmm = fourthdate.getMonth()+1;
			    var fourthy = 	fourthdate.getFullYear();
			    var fourthdate = fourthy + '-' + fourthmm + '-' + fourthdd;

			    var fifthdate = new Date(date);
			    fifthdate.setDate(fifthdate.getDate()+4);
			    var fifthdd = fifthdate.getDate();
			    var fifthmm = fifthdate.getMonth()+1;
			    var fifthy = 	fifthdate.getFullYear();
			    var fifthdate = fifthy + '-' + fifthmm + '-' + fifthdd;

			    var sixdate = new Date(date);
			    sixdate.setDate(sixdate.getDate()+5);
			    var sixdd = sixdate.getDate();
			    var sixmm = sixdate.getMonth()+1;
			    var sixy = 	sixdate.getFullYear();
			    var sixdate = sixy + '-' + sixmm + '-' + sixdd;
				$.ajax
				({
					url: '/weeklyRebateReport',
					type: 'get',
					data:  { 
						startdate:startdate,
						secdate:secdate,
						thirddate:thirddate,	
						fourthdate:fourthdate,
						fifthdate:fifthdate,
						sixdate:sixdate,
						enddate:enddate
					},
					dataType : 'json',

					success:function(response){
						
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
					    toastr.success("Done!");
					},
					error:function(){
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
					    toastr.Error("Sorry! No data available");
					}
				});
			}
			else
			{
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
			    toastr.warning("Please select a starting date");
			}
		}
		else if(report == 'monthly')
		{
			if(monthly != 'mm/yyyy')		    
			{
				var date = new Date("01/"+monthly);
			    var newdate = new Date(date);
			    var smm = date.getDate();
			    var sy = date.getFullYear();
				$.ajax
				({
					url: '/monthlyRebateReport',
					type: 'get',
					data:  { 
						month : smm,
						year : sy
					},
					dataType : 'json',
					success:function(response){
						
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
					    toastr.success("Done!");
					},
					error:function()
					{
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
					    toastr.error("Sorry! No data available");
					}
				});
			}
			else
			{
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
			    toastr.warning("Please select a Month/Year");
			}

		}
		else if(report == 'yearly')
		{
			if(yearly != 'yyyy')   
			{
				var date = new Date("01/01/"+yearly);
			    var newdate = new Date(date);
			    var sy = date.getFullYear();
			    t.clear().draw();
				$.ajax
				({
					url: '/yearlyRebateReport',
					type: 'get',
					data:  { 
						month : smm,
						year : sy
					},
					dataType : 'json',
					success:function(response){
						
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
					    toastr.success("Done!");
					},
					error:function()
					{
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
					    toastr.error("Sorry! No data available");
					}
				});
				
			}
			else
			{
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
			    toastr.warning("Please select a Year");
			}
		}

	});