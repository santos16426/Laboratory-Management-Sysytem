$('#printbtn').click(function(){
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
					url: '/dailyCorporateReport',
					type: 'get',
					data:  { start_date:start_date},
					dataType : 'json',
					success:function(response){

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
					url: '/weeklyCorporateReport',
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
						response[0].forEach(function(data){
							corpname.push(data.corp_name);
							charge.push(data.charge *1);
						})
						Highcharts.chart('barcharts', {
						    chart: {
						        type: 'column'
						    },
						    title: {
						        text: 'Weekly Corporate Transaction Report'
						    },
						    subtitle:{
						    	text: moment(start_date).format('Do MMMM, YYYY') + ' to '+moment(enddate).format('Do MMMM, YYYY') 
						    },
						    xAxis: {
						        categories:corpname,
						        crosshair: true
						    },
						    yAxis: {
						        min: 0,
						        title: {
						            text: 'Total Payment (pesos)'
						        }
						    },
						    tooltip: {
						        headerFormat: '<span style="font-size:10px">Service Name: <b>{point.key}</b></span><table>',
						        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
						            '<td style="padding:0"><b>{point.y}</b></td></tr>',
						        footerFormat: '</table>',
						        shared: true,
						        useHTML: true
						    },
						    plotOptions: {
						        column: {
						            pointPadding: 0.2,
						            borderWidth: 0
						        }
						    },
						    series: [{
						        name: 'Payment',
						        data: charge

						    }]
						});
						
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
					url: '/monthlyCorporateReport',
					type: 'get',
					data:  { 
						month : smm,
						year : sy
					},
					dataType : 'json',
					success:function(response){
						
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
					url: '/yearlyTransactionReport',
					type: 'get',
					data:  { 
						month : smm,
						year : sy
					},
					dataType : 'json',
					success:function(response){
						
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