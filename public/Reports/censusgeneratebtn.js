$('#generatebtn').click(function(){
		var report = $('#selectrange').val();
	    var start_date = $('#start_date_date').val();
	    var monthly = $('#monthly_date').val();
	    var yearly = $('#yearly_date').val();
	    var rangestart = $('#rangestart_date').val();
    	var rangeend = $('#rangeend_date').val();
    	var total = 0;
    	var charge = 0;
    	var service= [];
    	var servicecount = [];
		if(report == 'daily')
		{
			if(start_date != '')
			{
				
				$.ajax
				({
					url: '/dailyCensusReport',
					type: 'get',
					data:  { start_date:start_date},
					dataType : 'json',
					success:function(response){
						response[0].forEach(function(data){
							service.push(data.service_name);
							servicecount.push(data.row_count);
						})
						Highcharts.chart('barcharts', {
						    chart: {
						        type: 'column'
						    },
						    title: {
						        text: 'No. service availed as of '+moment(start_date).format('Do of MMMM, YYYY')
						    },
						    
						    xAxis: {
						        categories:service,
						        crosshair: true
						    },
						    yAxis: {
						        min: 0,
						        title: {
						            text: 'No. times service is availed'
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
						        name: 'Count',
						        data: servicecount

						    }]
						});
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
					    toastr.error("Error! Please try again later");
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

			    
				$.ajax
				({
					url: '/weeklyCensusReports',
					type: 'get',
					data:  { 
						startdate:startdate,
						enddate:enddate
					},
					dataType : 'json',

					success:function(response){
						response[0].forEach(function(data){
							service.push(data.service_name);
							servicecount.push(data.row_count);
						})
						Highcharts.chart('barcharts', {
						    chart: {
						        type: 'column'
						    },
						    title: {
						        text: 'No. service availed as of '+start_date
						    },
						    
						    xAxis: {
						        categories:service,
						        crosshair: true
						    },
						    yAxis: {
						        min: 0,
						        title: {
						            text: 'No. times service is availed'
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
						        name: 'Count',
						        data: servicecount

						    }]
						});
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
					    toastr.error("Error! Please try again later");
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
					url: '/monthlyCensusReport',
					type: 'get',
					data:  { 
						month : smm,
						year : sy
					},
					dataType : 'json',
					success:function(response){
						response[0].forEach(function(data){
							service.push(data.service_name);
							servicecount.push(data.row_count);
						})
						Highcharts.chart('barcharts', {
						    chart: {
						        type: 'column'
						    },
						    title: {
						        text: 'No. service availed as of '+start_date
						    },
						    
						    xAxis: {
						        categories:service,
						        crosshair: true
						    },
						    yAxis: {
						        min: 0,
						        title: {
						            text: 'No. times service is availed'
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
						        name: 'Count',
						        data: servicecount

						    }]
						});
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
					    toastr.error("Error! Please try again later");
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
				$.ajax
				({
					url: '/yearlyCensusReport',
					type: 'get',
					data:  { 
						month : smm,
						year : sy
					},
					dataType : 'json',
					success:function(response){
						response[0].forEach(function(data){
							service.push(data.service_name);
							servicecount.push(data.row_count);
						})
						Highcharts.chart('barcharts', {
						    chart: {
						        type: 'column'
						    },
						    title: {
						        text: 'No. service availed as of '+start_date
						    },
						    
						    xAxis: {
						        categories:service,
						        crosshair: true
						    },
						    yAxis: {
						        min: 0,
						        title: {
						            text: 'No. times service is availed'
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
						        name: 'Count',
						        data: servicecount

						    }]
						});
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
					    toastr.error("Error! Please try again later");
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