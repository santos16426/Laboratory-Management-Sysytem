$('#printbtn').click(function(){
	var report = $('#selectrange').val();
	var start_date = $('#start_date_date').val();
	var monthly = $('#monthly_date').val();
	var yearly = $('#yearly_date').val();
	if(report == 'daily')
		{
			if(start_date != '')
			{		
				$.ajax
				({
					url: '/dailyTransactionReport',
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
						frameDoc.document.write('<div class="invoice-box"> <table><br> <tr> <td> <img src="/banner.jpg" style="width:100%; max-width:400px;"> </td> <td style="text-align: left;padding-top: 20px; font-size: 10px"> <strong>Company Name:</strong>< Insert Company Name ><br> <strong>Address:</strong>< Insert Company Address ><br><br> <strong>Contact Number:</strong>< Insert Company Tel No. ><br> <strong>Email:</strong>< Insert Company Email ></td> </tr> </table><br><br> ');
						frameDoc.document.write('<span><center><strong>Daily Transaction Report</strong></center><center><small>'+moment(start_date).format('Do of MMMM, YYYY')+'</small></center></span> <br><br> ');
						frameDoc.document.write('<table cellpadding="0" cellspacing="0" border="0" style="text-align: center"> <tr class="heading"> <td width="25%"> Patient Name </td> <td width="25%"> Transaction Date </td> </td> <td width="25%"> Total </td> </tr> ');

						response[1].forEach(function(data){
							frameDoc.document.write('<tr class="item">  <td> '+data.name +' </td> <td> '+moment(data.trans_date).format('Do of MMMM YYYY')+' </td> <td> '+ (((data.trans_total*1) + (data.charge*1)).toFixed(2))+' </td> </tr>');
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
			    var lastdate = new Date(date);
		    lastdate.setDate(lastdate.getDate()+7);
		    var lastdd = lastdate.getDate();
		    var lastmm = lastdate.getMonth()+1;
		    var lasty = 	lastdate.getFullYear();
		    var lastdate = lasty + '-' + lastmm + '-' + lastdd;

				$.ajax
				({
					url: '/weeklyTransactionReport',
					type: 'get',
					data:  { 
						startdate:startdate,
						enddate:enddate,
						lastdate:lastdate
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
						frameDoc.document.write('<span><center><strong>Weekly Transaction Report</strong></center><center><small>'+moment(start_date).format('Do of MMMM, YYYY')+ ' to ' +moment(enddate).format('Do of MMMM, YYYY')+'</small></center></span> <br><br> ');
						frameDoc.document.write('<table cellpadding="0" cellspacing="0" border="0" style="text-align: center"> <tr class="heading"> <td width="25%"> Patient Name </td> <td width="25%"> Transaction Date </td> </td> <td width="25%"> Total </td> </tr> ');

						response[0].forEach(function(data){
							frameDoc.document.write('<tr class="item">  <td> '+data.name +' </td> <td> '+moment(data.trans_date).format('Do of MMMM YYYY')+' </td> <td> '+ (((data.trans_total*1) + (data.charge*1)).toFixed(2))+' </td> </tr>');
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
					url: '/monthlyTransactionReport',
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
						frameDoc.document.write('<span><center><strong>Monthly Transaction Report</strong></center><center><small>'+moment(smm +'/01/'+sy).format('MMMM YYYY')+ ' to ' +moment(enddate).format('Do of MMMM, YYYY')+'</small></center></span> <br><br> ');
						frameDoc.document.write('<table cellpadding="0" cellspacing="0" border="0" style="text-align: center"> <tr class="heading"> <td width="25%"> Patient Name </td> <td width="25%"> Transaction Date </td> </td> <td width="25%"> Total </td> </tr> ');

						response[0].forEach(function(data){
							frameDoc.document.write('<tr class="item">  <td> '+data.name +' </td> <td> '+moment(data.trans_date).format('Do of MMMM YYYY')+' </td> <td> '+ (((data.trans_total*1) + (data.charge*1)).toFixed(2))+' </td> </tr>');
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
					url: '/yearlyTransactionReport',
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
						frameDoc.document.write('<span><center><strong>Yearly Transaction Report</strong></center><center><small>'+sy+ ' to ' +moment(enddate).format('Do of MMMM, YYYY')+'</small></center></span> <br><br> ');
						frameDoc.document.write('<table cellpadding="0" cellspacing="0" border="0" style="text-align: center"> <tr class="heading"> <td width="25%"> Patient Name </td> <td width="25%"> Transaction Date </td> </td> <td width="25%"> Total </td> </tr> ');

						response[0].forEach(function(data){
							frameDoc.document.write('<tr class="item">  <td> '+data.name +' </td> <td> '+moment(data.trans_date).format('Do of MMMM YYYY')+' </td> <td> '+ (((data.trans_total*1) + (data.charge*1)).toFixed(2))+' </td> </tr>');
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