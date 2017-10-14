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
					url: '/dailyRebateReport',
					type: 'get',
					data:  { start_date:start_date},
					dataType : 'json',
					success:function(response){
						var frame1 = $('<iframe />');
						frame1[0].name = "frame1";
						frame1.css({ "position": "absolute", "top": "-1000000px" });
						$("body").append(frame1);
						var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
						frameDoc.document.open();
						frameDoc.document.write('<html><head>');
						frameDoc.document.write('</head><body>');
						frameDoc.document.write('<style>@page { margin: 2; } .invoice-box{ max-width:800px; margin:auto; padding:30px; font-size:16px; line-height:24px; font-family:"Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; color:#555; } .invoice-box table{ width:100%; line-height:inherit; text-align:left; } .invoice-box table td{ padding:5px; vertical-align:top; } .invoice-box table tr.top table td{ padding-bottom:20px; } .invoice-box table tr.top table td.title{ font-size:45px; line-height:45px; color:#333; } .invoice-box table tr.information table td{ padding-bottom:40px; } .invoice-box table tr.heading td{ background:#eee; border-bottom:1px solid #ddd; font-weight:bold; } .invoice-box table tr.details td{ padding-bottom:20px; } .invoice-box table tr.item td{ border-bottom:1px solid #eee; } .invoice-box table tr.item.last td{ border-bottom:none; } .invoice-box table tr.total td:nth-child(2){ border-top:2px solid #eee; font-weight:bold; } @media only screen and (max-width: 600px) { .invoice-box table tr.top 						table td{ width:100%; display:block; text-align:center; } .invoice-box table tr.information table td{ width:100%; display:block; text-align:center; } }</style>');
						frameDoc.document.write('<html><body>');
						frameDoc.document.write('<div class="invoice-box"> <table><br> <tr> <td> <img src="/banner.jpg" style="width:100%; max-width:400px;"> </td> <td style="text-align: left;padding-top: 20px; font-size: 10px"> <strong>Company Name:</strong>Globalhealth Diagnostic Center Inc<br> <strong>Address:</strong>156 N. Domingo Street, San Juan City, <br>Metro Manila<br> <strong>Contact Number:</strong>722-4544/576-5357<br> <strong>Email:</strong>globalhealth_sj@yahoo.com </td> </tr> </table><br><br> ');
						frameDoc.document.write('<span><center><strong>Daily Employee Rebate Report</strong></center><center><small>'+moment(start_date).format('Do of MMMM, YYYY')+'</small></center></span> <br><br> ');
						frameDoc.document.write('<table cellpadding="0" cellspacing="0" border="0" style="text-align: center"> <tr class="heading"> <td width="35%"> Employee Name </td> <td width="50%"> Total </td> </tr> ');
						response[0].forEach(function(data){
							frameDoc.document.write('<tr class="item"><td> '+data.name+' </td> <td> '+((data.percentage*1).toFixed(2))+' </td>');
						})
						frameDoc.document.write(' </table> </div>');
						frameDoc.document.write('</div></body></html>');
						frameDoc.document.close();
						setTimeout(function () {
						window.frames["frame1"].focus();
						window.frames["frame1"].print();
						frame1.remove();
						}, 500);
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
						
						var frame1 = $('<iframe />');
						frame1[0].name = "frame1";
						frame1.css({ "position": "absolute", "top": "-1000000px" });
						$("body").append(frame1);
						var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
						frameDoc.document.open();
						frameDoc.document.write('<html><head>');
						frameDoc.document.write('</head><body>');
						frameDoc.document.write('<style>@page { margin: 2; } .invoice-box{ max-width:800px; margin:auto; padding:30px; font-size:16px; line-height:24px; font-family:"Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; color:#555; } .invoice-box table{ width:100%; line-height:inherit; text-align:left; } .invoice-box table td{ padding:5px; vertical-align:top; } .invoice-box table tr.top table td{ padding-bottom:20px; } .invoice-box table tr.top table td.title{ font-size:45px; line-height:45px; color:#333; } .invoice-box table tr.information table td{ padding-bottom:40px; } .invoice-box table tr.heading td{ background:#eee; border-bottom:1px solid #ddd; font-weight:bold; } .invoice-box table tr.details td{ padding-bottom:20px; } .invoice-box table tr.item td{ border-bottom:1px solid #eee; } .invoice-box table tr.item.last td{ border-bottom:none; } .invoice-box table tr.total td:nth-child(2){ border-top:2px solid #eee; font-weight:bold; } @media only screen and (max-width: 600px) { .invoice-box table tr.top 						table td{ width:100%; display:block; text-align:center; } .invoice-box table tr.information table td{ width:100%; display:block; text-align:center; } }</style>');
						frameDoc.document.write('<html><body>');
						frameDoc.document.write('<div class="invoice-box"> <table><br> <tr> <td> <img src="/banner.jpg" style="width:100%; max-width:400px;"> </td> <td style="text-align: left;padding-top: 20px; font-size: 10px"> <strong>Company Name:</strong>Globalhealth Diagnostic Center Inc<br> <strong>Address:</strong>156 N. Domingo Street, San Juan City, <br>Metro Manila<br> <strong>Contact Number:</strong>722-4544/576-5357<br> <strong>Email:</strong>globalhealth_sj@yahoo.com </td> </tr> </table><br><br> ');
						frameDoc.document.write('<span><center><strong>Weekly Employee Rebate Report</strong></center><center><small>'+moment(start_date).format('Do of MMMM, YYYY') + ' To ' +moment(enddate).format('Do of MMMM, YYYY')+'</small></center></span> <br><br> ');
						frameDoc.document.write('<table cellpadding="0" cellspacing="0" border="0" style="text-align: center"> <tr class="heading"> <td width="35%"> Employee Name </td> <td width="50%"> Total </td> </tr> ');
						response[0].forEach(function(data){
							frameDoc.document.write('<tr class="item"><td> '+data.name+' </td> <td> '+((data.percentage*1).toFixed(2))+' </td>');
						})
						frameDoc.document.write(' </table> </div>');
						frameDoc.document.write('</div></body></html>');
						frameDoc.document.close();
						setTimeout(function () {
						window.frames["frame1"].focus();
						window.frames["frame1"].print();
						frame1.remove();
						}, 500);
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
						
						var frame1 = $('<iframe />');
						frame1[0].name = "frame1";
						frame1.css({ "position": "absolute", "top": "-1000000px" });
						$("body").append(frame1);
						var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
						frameDoc.document.open();
						frameDoc.document.write('<html><head>');
						frameDoc.document.write('</head><body>');
						frameDoc.document.write('<style>@page { margin: 2; } .invoice-box{ max-width:800px; margin:auto; padding:30px; font-size:16px; line-height:24px; font-family:"Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; color:#555; } .invoice-box table{ width:100%; line-height:inherit; text-align:left; } .invoice-box table td{ padding:5px; vertical-align:top; } .invoice-box table tr.top table td{ padding-bottom:20px; } .invoice-box table tr.top table td.title{ font-size:45px; line-height:45px; color:#333; } .invoice-box table tr.information table td{ padding-bottom:40px; } .invoice-box table tr.heading td{ background:#eee; border-bottom:1px solid #ddd; font-weight:bold; } .invoice-box table tr.details td{ padding-bottom:20px; } .invoice-box table tr.item td{ border-bottom:1px solid #eee; } .invoice-box table tr.item.last td{ border-bottom:none; } .invoice-box table tr.total td:nth-child(2){ border-top:2px solid #eee; font-weight:bold; } @media only screen and (max-width: 600px) { .invoice-box table tr.top 						table td{ width:100%; display:block; text-align:center; } .invoice-box table tr.information table td{ width:100%; display:block; text-align:center; } }</style>');
						frameDoc.document.write('<html><body>');
						frameDoc.document.write('<div class="invoice-box"> <table><br> <tr> <td> <img src="/banner.jpg" style="width:100%; max-width:400px;"> </td> <td style="text-align: left;padding-top: 20px; font-size: 10px"> <strong>Company Name:</strong>Globalhealth Diagnostic Center Inc<br> <strong>Address:</strong>156 N. Domingo Street, San Juan City, <br>Metro Manila<br> <strong>Contact Number:</strong>722-4544/576-5357<br> <strong>Email:</strong>globalhealth_sj@yahoo.com </td> </tr> </table><br><br> ');
						frameDoc.document.write('<span><center><strong>Monthly Employee Rebate Report</strong></center><center><small>'+moment(smm+'/01/'+sy).format('MMMM, YYYY')+'</small></center></span> <br><br> ');
						frameDoc.document.write('<table cellpadding="0" cellspacing="0" border="0" style="text-align: center"> <tr class="heading"> <td width="35%"> Employee Name </td> <td width="50%"> Total </td> </tr> ');
						response[0].forEach(function(data){
							frameDoc.document.write('<tr class="item"><td> '+data.name+' </td> <td> '+((data.percentage*1).toFixed(2))+' </td>');
						})
						frameDoc.document.write(' </table> </div>');
						frameDoc.document.write('</div></body></html>');
						frameDoc.document.close();
						setTimeout(function () {
						window.frames["frame1"].focus();
						window.frames["frame1"].print();
						frame1.remove();
						}, 500);
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
						var frame1 = $('<iframe />');
						frame1[0].name = "frame1";
						frame1.css({ "position": "absolute", "top": "-1000000px" });
						$("body").append(frame1);
						var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
						frameDoc.document.open();
						frameDoc.document.write('<html><head>');
						frameDoc.document.write('</head><body>');
						frameDoc.document.write('<style>@page { margin: 2; } .invoice-box{ max-width:800px; margin:auto; padding:30px; font-size:16px; line-height:24px; font-family:"Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; color:#555; } .invoice-box table{ width:100%; line-height:inherit; text-align:left; } .invoice-box table td{ padding:5px; vertical-align:top; } .invoice-box table tr.top table td{ padding-bottom:20px; } .invoice-box table tr.top table td.title{ font-size:45px; line-height:45px; color:#333; } .invoice-box table tr.information table td{ padding-bottom:40px; } .invoice-box table tr.heading td{ background:#eee; border-bottom:1px solid #ddd; font-weight:bold; } .invoice-box table tr.details td{ padding-bottom:20px; } .invoice-box table tr.item td{ border-bottom:1px solid #eee; } .invoice-box table tr.item.last td{ border-bottom:none; } .invoice-box table tr.total td:nth-child(2){ border-top:2px solid #eee; font-weight:bold; } @media only screen and (max-width: 600px) { .invoice-box table tr.top 						table td{ width:100%; display:block; text-align:center; } .invoice-box table tr.information table td{ width:100%; display:block; text-align:center; } }</style>');
						frameDoc.document.write('<html><body>');
						frameDoc.document.write('<div class="invoice-box"> <table><br> <tr> <td> <img src="/banner.jpg" style="width:100%; max-width:400px;"> </td> <td style="text-align: left;padding-top: 20px; font-size: 10px"> <strong>Company Name:</strong>Globalhealth Diagnostic Center Inc<br> <strong>Address:</strong>156 N. Domingo Street, San Juan City, <br>Metro Manila<br> <strong>Contact Number:</strong>722-4544/576-5357<br> <strong>Email:</strong>globalhealth_sj@yahoo.com </td> </tr> </table><br><br> ');
						frameDoc.document.write('<span><center><strong>Yearly Employee Rebate Report</strong></center><center><small>'+sy+'</small></center></span> <br><br> ');
						frameDoc.document.write('<table cellpadding="0" cellspacing="0" border="0" style="text-align: center"> <tr class="heading"> <td width="35%"> Employee Name </td> <td width="50%"> Total </td> </tr> ');
						response[0].forEach(function(data){
							frameDoc.document.write('<tr class="item"><td> '+data.name+' </td> <td> '+((data.percentage*1).toFixed(2))+' </td>');
						})
						frameDoc.document.write(' </table> </div>');
						frameDoc.document.write('</div></body></html>');
						frameDoc.document.close();
						setTimeout(function () {
						window.frames["frame1"].focus();
						window.frames["frame1"].print();
						frame1.remove();
						}, 500);
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