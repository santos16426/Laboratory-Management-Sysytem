$('#totalpriceinput').change(function()
{
	alert();
})
var medservice = [];
var seniormodal = document.getElementById('seniormodal');
var pwdmodal = document.getElementById('pwdmodal');
$('#seniormodal').click(function(){
	var origprice = $('#originalprice').val();
	var transactwhere = $('#transactwhere').val();
	var discount = $('#discount').val();
	var total = $('#totalpriceinput').val();
	if(seniormodal.className == "btn btn-primary btn-sm col-md-5")
	{
		$('#disctype').val('Senior Citizen ');
		$('#discount').val(32);
		if(transactwhere == 'here')
		{
			discount = $('#discount').val();
			total = origprice *1;
			total = total - (total * (discount/100));
		}
		else
		{
			discount = $('#discount').val();
			total = origprice *1;
			total = total - (total * (discount/100))+200;
		}
		$('#totalpriceinput').val(total);
		seniormodal.className = "btn btn-success btn-sm col-md-5 active";
		pwdmodal.className = "btn btn-primary btn-sm col-md-5 col-md-offset-2 disabled"
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
		toastr.success("Discount activated!");
	}
	else
	{
		$('#discount').val(0);
		$('#disctype').val("");
		if(transactwhere == 'here')
		{
			$('#totalpriceinput').val($('#originalprice').val());
		}
		else
		{
			$('#totalpriceinput').val(($('#originalprice').val()*1)+200);
		}
		seniormodal.className = "btn btn-primary btn-sm col-md-5";
		pwdmodal.className = "btn btn-primary btn-sm col-md-5 col-md-offset-2"
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
		toastr.warning("Discount removed!");
	}

});
$('#pwdmodal').click(function(){
	var origprice = $('#originalprice').val();
	var transactwhere = $('#transactwhere').val();
	var discount = $('#discount').val();
	var total = $('#totalpriceinput').val();
	if(pwdmodal.className == "btn btn-primary btn-sm col-md-5 col-md-offset-2")
	{
		$('#disctype').val('PWD ');
		$('#discount').val(32);
		if(transactwhere == 'here')
		{
				
			discount = $('#discount').val();
			total = origprice *1;
			total = total - (total * (discount/100));
			
		}
		else
		{
			discount = $('#discount').val();
			total = origprice *1;
			total = total - (total * (discount/100))+200;
		}
		$('#totalpriceinput').val(total);
		pwdmodal.className = "btn btn-success btn-sm col-md-5 col-md-offset-2 active";
		seniormodal.className = "btn btn-primary btn-sm col-md-5 disabled";
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
		toastr.success("Discount activated!");
	}
	else
	{
		$('#disctype').val('');
		$('#discount').val(0);
		if(transactwhere == 'here')
		{
			$('#totalpriceinput').val($('#originalprice').val());
		}
		else
		{
			$('#totalpriceinput').val(($('#originalprice').val()*1)+200);
		}
		pwdmodal.className = "btn btn-primary btn-sm col-md-5 col-md-offset-2";
		seniormodal.className = "btn btn-primary btn-sm col-md-5";
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
		toastr.warning("Discount removed!");
	}
});

var t = $('#medicalRequest').DataTable({
	'paging'      : false,
	'lengthChange': false,
	'searching'   : true,
	'ordering'    : false,
	'info'        : false,
	'autoWidth'   : true,
});

$(document).ready(function() {
	$(window).keydown(function(event)
	{
		if(event.keyCode == 13) 
		{
			event.preventDefault();
			return false;
		}
	});
});
$('#activecorppack').click(function(){
	var payWhere = $('#payWhere').val();
	if(payWhere == null)
	{
		$('#OptionPackModal').modal('show');
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
		toastr.error("Error! Patient can only avail one (1) Corporate Package");
	}
});
$('#procpaymentmodal').click(function(){
var discount = $('#discount').val();
var origprice = $('#originalprice').val();
var payment = $('#paymentinput').val();
var total = $('#totalpriceinput').val();
var payWhere = $('#payWhere').val();
var transactwhere = $('#transactwhere').val();
if(discount == 0)
{
	discount = "N/A";
}
else
{
	discount = discount + "%";
}
total = total *1;
total = parseFloat((total).toFixed(2));
payment = payment *1;
payment = parseFloat((payment).toFixed(2));
change = payment-total;
change = parseFloat((change).toFixed(2));
	if(transactwhere == 'here')
	{
		if(total == 0 && payWhere == undefined)
		{
			total = null;
			payment=null;
			toastr.clear()
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
			toastr.error("Error! You need to add a service");
		}

		if(total > payment && total > 0)
		{
			total = null;
			payment=null;
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
			toastr.warning("Sorry! Insufficient payment");
		}

		if( payment > 0 && payment >= total && total != 0 || payWhere == 1)
		{
			$('#recieptDetails').empty();
			$('#recieptDetails').append('<center>Reciept</center>');
			$('#recieptDetails').append('<div>')
			$('#recieptDetails').append('<hr>Sub-Total: '+origprice+'');
			$('#recieptDetails').append('<hr>Discount: '+discount+'');
			$('#recieptDetails').append('<hr>Grand Total: '+total+'<br>');
			$('#recieptDetails').append('<hr>Payment:'+payment+' ');
			$('#recieptDetails').append('<br>Change : '+change+'');
			$('#recieptDetails').append('</div>');

			$('#myModal').modal('show');
			total = null;
			payment=null;
		}
	}
	else
	{
		if(total == 200 && payWhere == undefined)
		{
			total = 200;
			payment=null;
			toastr.clear()
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
			toastr.error("Error! You need to add a service");
		}

		if(total > payment && total > 200)
		{
			total = 200;
			payment=null;
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
			toastr.warning("Sorry! Insufficient payment");
		}

		if( payment > 200 && payment >= total && total != 200 || payWhere == 1)
		{
			var disctype = $('#disctype').val();
			var disc = $('#discount').val();
			var semitotal = total -200;
			var temp = 0;
			var temporig = 0;
			var totaldiscount = 0;
			$('#recieptDetails').empty();
			$('#recieptDetails').append('<center>Reciept</center><hr>');
			$('#recieptDetails').append('<div>')
			
			if(disctype == 'PWD ')
			{
				temp = origprice * (12/100);
				temporig = origprice - temp;
				totaldiscount = origprice * (20/100);

				totaldiscount = parseFloat(totaldiscount).toFixed(2);
				temp = parseFloat(temp).toFixed(2);
				temporig = parseFloat(temporig).toFixed(2);
				semitotal = parseFloat(semitotal).toFixed(2);
				$('#recieptDetails').append('<hr>Sub-Total : '+temporig+'<hr>');
				$('#recieptDetails').append('<br>PWD Discount(20%): '+totaldiscount);
				$('#recieptDetails').append('<br>VAT(12%): -'+temp+'');
			}
			else if(disctype =='Senior Citizen ')
			{
				temp = origprice * (12/100);
				temporig = origprice - temp;
				totaldiscount = origprice * (20/100);

				totaldiscount = parseFloat(totaldiscount).toFixed(2);
				temp = parseFloat(temp).toFixed(2);
				temporig = parseFloat(temporig).toFixed(2);
				semitotal = parseFloat(semitotal).toFixed(2);
				$('#recieptDetails').append('<hr>Sub-Total : '+temporig+'<hr>');
				$('#recieptDetails').append('<br>Senior Citizen Discount(20%): -'+totaldiscount);
				temp = origprice * (12/100);
				$('#recieptDetails').append('<br>VAT(12%): '+temp+'');
			}
			else
			{
				temp = origprice * (12/100);
				temporig = origprice - temp;
				$('#recieptDetails').append('<hr>Sub-Total : '+temporig+'');
				$('#recieptDetails').append('<br>VAT(12%): '+temp+'');
			}
			$('#recieptDetails').append('<br>Home Service Fee: 200 <br>');
			$('#recieptDetails').append('<hr>Grand Total: '+total+'<br>')
			$('#recieptDetails').append('<hr>Payment:'+payment+' ');
			$('#recieptDetails').append('<br>Change : '+change+'');
			$('#recieptDetails').append('</div>');
			$('#myModal').modal('show');
			total = 200;
			payment=null;
		}
	}
});




$('#payDirect').click(function(){	
	$('#payWhere').val('0');
	var origprice = $('#originalprice').val();
	var transactwhere = $('#transactwhere').val();
	var discount = $('#discount').val();
	var total = $('#totalpriceinput').val();
	var corpPack_id = $('#corppack_id').val();
	var addpackagebtn = document.getElementById('activecorppack');
	var price = 0*1;
	var service_names = [];
	var service_id = [];
	var serv = "";
	var prescriptions = [];
	var servnote = "";
	$.ajax
	({
		url: '/getDataPackage',
		type: 'get',
		data: { id: corpPack_id },
		dataType : 'json',
		success:function(response)
		{
			response[1].forEach(function(data){
				service_names.push(data.service_name);
				prescriptions.push(data.service_notes);
				$("#ServiceOPTION"+data.service_id).attr("disabled","disabled");
			});
			for (var i = prescriptions.length - 1; i >= 0; i--) {
				servnote = prescriptions[i]+"<br>";
			}
			for(var i = 0; i<service_names.length; i++)
			{
				serv+='&emsp;&emsp;'+"-"+service_names[i]+"<br>";
			}
			response[0].forEach(function(data)
			{
				t.row.add([
				data.corpPack_name +"<br>"+serv,
				'',
				data.price,
				servnote + '<input type="hidden" name="prescriptions[]" value="'+servnote+'">',
				'<input type="hidden" id="corppackprice'+data.corpPack_id+'" value='+data.price+' name="corppackprice" /><a class="btn btn-danger btn-xs corpremove_package'+data.corpPack_id+'" data-id="'+data.corpPack_id+'"><i class="fa fa-trash" aria-hidden="true"></i></a><input type="hidden" name="corppackage_id" value="'+data.corpPack_id+'"><input type="hidden" name="payWhere" id="payWhere" value="0"><input type="hidden" name="corp_id" id="corp_id" value='+data.corp_id+'>'
				]).draw(false);
				if(transactwhere == 'here')
				{
					total = origprice *1;
					price = ($('#corppackprice'+data.corpPack_id).val()*1);
					total = total + price;
					total = total - total * (discount/100);
				}
				else
				{
					total = (origprice*1);
					price = ($('#corppackprice'+data.corpPack_id).val()*1);
					total = total + price;
					total = total - total * (discount/100);
					total = total +200;
				}
				origprice = origprice *1;
				origprice = origprice + price;
				$('#originalprice').val(origprice);
				$('#totalpriceinput').val(total);

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
				toastr.success("Success! Corporate Package added!");
				$('.corpremove_package'+data.corpPack_id+'').click(function()
				{
					for(var i = 0; i<service_names.length; i++)
					{
						$("#ServiceOPTION"+service_id[i]).removeAttr("disabled","disabled");
					}	
					
					var remPack_id = $(this).data("id");
					if(transactwhere == 'here')
					{
						origprice = $('#originalprice').val();
						price = (price*1);
						total = origprice *1;
						total = total - price;
						total = total - total *(discount/100);
						origprice = origprice *1;
						origprice = origprice - price;
					}
					else
					{
						origprice = $('#originalprice').val();
						price = ($('#corppackprice'+data.corpPack_id).val()*1);
						total = origprice *1;
						total = total - price;
						total = total - total *(discount/100) + 200;
						origprice = origprice *1;
						origprice = origprice - price;
					}
					$('#originalprice').val(origprice);
					$('#totalpriceinput').val(total);
					t.row($(this).parents('tr')).remove().draw();
					return true;
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
					toastr.success("Success! Corporate Package removed!");
				});
			})
		}
	});
	return true;
});

$('#payCorp').click(function(){
	var total = $('#totalpriceinput').val();
	var origprice = $('#originalprice').val();
	var transactwhere = $('#transactwhere').val();
	var discount = $('#discount').val();
	var addpackagebtn = document.getElementById('activecorppack');
	$('#payWhere').val('1');
	var corpPack_id = $('#corppack_id').val();
	var price = 0*1;
	var service_names = [];
	var service_id = [];
	var serv = "";
	var prescriptions = [];
	var servnote = "";
	$.ajax
	({
		url: '/getDataPackage',
		type: 'get',
		data: { id: corpPack_id },
		dataType : 'json',
		success:function(response){
			response[1].forEach(function(data){
				service_names.push(data.service_name);
				prescriptions.push(data.service_notes);
				$("#ServiceOPTION"+data.service_id).attr("disabled","disabled");
			});
			for (var i = prescriptions.length - 1; i >= 0; i--) {
				servnote = prescriptions[i]+"<br>";
			}
			for(var i = 0; i<service_names.length; i++)
			{
				serv+='&emsp;&emsp;'+"-"+service_names[i]+"<br>";
			}
			response[0].forEach(function(data){
				t.row.add([
				data.corpPack_name +"<br>"+serv,
				'',
				data.price + " (c/o "+data.corp_name+")",
				servnote + '<input type="hidden" name="prescriptions[]" value="'+servnote+'">',
				'<input type="hidden" id="corppackprice'+data.corpPack_id+'" value='+data.price+' name="corppackprice" /><a class="btn btn-danger btn-xs corpremove_package'+data.corpPack_id+'" data-id="'+data.corpPack_id+'"><i class="fa fa-trash" aria-hidden="true"></i></a><input type="hidden" name="corppackage_id" value="'+data.corpPack_id+'"><input type="hidden" name="payWhere" id="payWhere" value="1"><input type="hidden" name="corp_id" id="corp_id" value='+data.corp_id+'>'
				]).draw(false);
				if(transactwhere == 'here')
				{
					total = origprice *1;
					price = 0;
					total = total + price;
					total = total - total * (discount/100);
				}
				else
				{
					total = (origprice*1);
					price = 0;
					total = total + price;
					total = total - total * (discount/100);
					total = total +200;
				}
				origprice = origprice *1;
				origprice = origprice + price;
				$('#originalprice').val(origprice);
				$('#totalpriceinput').val(total);
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
			    toastr.success(data.corpPack_name + " is successfully added");
				$('.corpremove_package'+data.corpPack_id+'').click(function(){
					for(var i = 0; i<service_names.length; i++)
					{
						$("#ServiceOPTION"+service_id[i]).removeAttr("disabled","disabled");
					}
					var remPack_id = $(this).data("id");
					if(transactwhere == 'here')
					{
						origprice = $('#originalprice').val();	
						price = (price*1);
						total = origprice *1;
						total = total - price;
						total = total - total *(discount/100);
						origprice = origprice *1;
						origprice = origprice - price;
					}
					else
					{
						origprice = $('#originalprice').val();
						price = ($('#serviceprice'+service_id+'').val()*1);
						total = origprice *1;
						total = total - price;
						total = total - total *(discount/100) + 200;
						origprice = origprice *1;
						origprice = origprice - price;
					}
					$('#originalprice').val(origprice);
					$('#totalpriceinput').val(total);
					console.log("Remove Service ID:" + remPack_id);
					t.row($(this).parents('tr')).remove().draw();
					return true;
				});
			})
		}
	});
	return true;
});

$('#addpackageBtn').click(function(){
	var total = $('#totalpriceinput').val();
	var origprice = $('#originalprice').val();
	var transactwhere = $('#transactwhere').val();
	var discount = $('#discount').val();
	var package_id = $('#package_id').val();
	var total = $('#totalpriceinput').val();
	var price = 0*1;
	var service_names = [];
	var service_id = [];
	var serv= "";
	var prescriptions = [];
	var servnote = "";
	$.ajax
	({
		url: '/getCompanyPackage',
		type: 'get',
		data: { id: package_id },
		dataType : 'json',
		success:function(response){
			response[1].forEach(function(data){
				service_names.push(data.service_name);
				prescriptions.push(data.service_notes);
				$("#ServiceOPTION"+data.service_id).attr("disabled","disabled");
			});
			for (var i = prescriptions.length - 1; i >= 0; i--) {
				servnote = prescriptions[i]+"<br>";
			}
			for(var i = 0; i<service_names.length; i++)
			{
				serv+='&emsp;&emsp;'+"-"+service_names[i]+"<br>";
			}
			response[0].forEach(function(data){
				t.row.add([
				data.pack_name + " (Package)<br>"+serv
				,
				'',
				data.pack_price,
				servnote + '<input type="hidden" name="prescriptions[]" value="'+servnote+'">',
				'<a class="btn btn-danger btn-xs remove_package'+package_id+'" data-id="'+package_id+'"><i class="fa fa-trash" aria-hidden="true"></i></a><input type="hidden" name="package_id[]" value="'+package_id+'"><input type="hidden" name="packprice" id="packprice'+package_id+' value ='+data.pack_price+' ">'
				]).draw(false);
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
			    toastr.success(data.pack_name + " is successfully added");
				$("#PackageID"+package_id).attr("disabled","disabled");
				
				if(transactwhere == 'here')
				{
					total = origprice *1;
					price = data.pack_price;
					total = total + price;
					total = total - total * (discount/100);
				}
				else
				{
					total = (origprice*1);
					price = data.pack_price*1;
					total = total + price;
					total = total - total * (discount/100);
					total = total +200;
				}
				origprice = origprice *1;
				origprice = origprice + price;
				$('#originalprice').val(origprice);
				$('#totalpriceinput').val(total);

				$('.remove_package'+package_id+'').click(function(){
					for(var i = 0; i<service_names.length; i++)
					{
						$("#ServiceOPTION"+service_id[i]).removeAttr("disabled","disabled");
					}
					var remPack_id = $(this).data("id");
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
				    toastr.success(data.pack_name + " is successfully removed");
					if(transactwhere == 'here')
					{
						origprice = $('#originalprice').val();
						total = origprice *1;
						total = total - price;
						total = total - total *(discount/100);
						origprice = origprice *1;
						origprice = origprice - price;
					}
					else
					{
						origprice = $('#originalprice').val();
						total = origprice *1;
						total = total - price;
						total = total - total *(discount/100) + 200;
						origprice = origprice *1;
						origprice = origprice - price;
					}
					$('#originalprice').val(origprice);
					$('#totalpriceinput').val(total);
					$("#PackageID"+package_id).removeAttr("disabled","disabled");
					t.row($(this).parents('tr')).remove().draw();
					return true;
				});
			})
		}
	});
	return true;
});

$('#addservice').click(function(){
	var total = $('#totalpriceinput').val();
	var origprice = $('#originalprice').val();
	var transactwhere = $('#transactwhere').val();
	var discount = $('#discount').val();
	var service_name = "";
	var service_price="";
	var service_id = $('#srvc_id').val();
	var med_req;
	var price = 0*1;
	$.ajax
	({
		url: '/getDataService',
		type: 'get',
		data: { id: service_id }, 
		dataType : 'json',
		success:function(response) {
			response.forEach(function(data) { 

				med_req = data.medical_request;
				if(med_req == "No"){
					t.row.add([
					data.service_name ,
					data.servgroup_name,
					data.service_price,
					data.service_notes+'<input type="hidden" name="prescriptions[]" value="'+data.service_notes+'">',
					'<a class="btn btn-danger btn-xs remove_service'+service_id+'" data-id="'+service_id+'"><i class="fa fa-trash" aria-hidden="true"></i></a><input type="hidden" name="medservice_id[]" value="'+service_id+'" class="medservice"><input type="hidden" name="serviceprice" value='+data.service_price+' id="serviceprice'+service_id+'">'
					]).draw(false);
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
					toastr.success(data.service_name + " is successfully added");
					
					$("#ServiceOPTION"+service_id).attr("disabled","disabled");
					
					if(transactwhere == 'here')
					{
						total = origprice *1;
						price = ($('#serviceprice'+service_id+'').val()*1);
						total = total + price;
						total = total - total * (discount/100);
					}
					else
					{
						total = (origprice*1);
						price = $('#serviceprice'+service_id+'').val()*1;
						total = total + price;
						total = total - total * (discount/100);
						total = total +200;
					}

					origprice = origprice *1;
					origprice = origprice + price;
					$('#originalprice').val(origprice);
					$('#totalpriceinput').val(total);

					$('.remove_service'+service_id+'').click(function(){
						if(transactwhere == 'here')
						{
							origprice = $('#originalprice').val();
							price = ($('#serviceprice'+service_id+'').val()*1);
							total = origprice *1;
							total = total - price;
							total = total - total *(discount/100);
							origprice = origprice *1;
							origprice = origprice - price;
							
						}
						else
						{
							origprice = $('#originalprice').val();
							price = ($('#serviceprice'+service_id+'').val()*1);
							total = origprice *1;
							total = total - price;
							total = total - total *(discount/100) + 200;
							origprice = origprice *1;
							origprice = origprice - price;
						}
						$('#originalprice').val(origprice);
						$('#totalpriceinput').val(total);
						if(data.service_notes != null)
						{
							var str = $('#service_notes').text().replace(data.service_notes + "<br>", ' ');
							len = str.length;
							$('#service_notes').text(str.substring(len));
						}
						var remServ_id = $(this).data("id");
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
						toastr.success(data.service_name + " is successfully removed");
						$("#ServiceOPTION"+remServ_id).removeAttr("disabled","disabled");
						t.row($(this).parents('tr')).remove().draw();
						return true;
					});
				}
				else{
					swal({
						title: "Verification",
						text: "This service requires a medical certificate",
						type: "warning",
						showCancelButton: true,
						confirmButtonColor: "#00a65a",
						confirmButtonText: "It is included",
						cancelButtonText: "None",
						closeOnConfirm: true,
						closeOnCancel:true
					},
					function(isConfirm){
						if (isConfirm) {
							t.row.add([
							data.service_name ,
							data.servgroup_name,
							data.service_price,
							data.service_notes + '<input type="hidden" name="prescriptions[]" value="'+data.service_notes+'">',
							'<a class="btn btn-danger btn-xs remove_service'+service_id+'" data-id="'+service_id+'"><i class="fa fa-trash" aria-hidden="true"></i></a><input type="hidden" name="medservice_id[]" value="'+service_id+'"><input type="hidden" name="serviceprice" value='+data.service_price+' id="serviceprice'+service_id+'">'
							]).draw(false);

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
						    toastr.success(data.service_name + " is successfully added");
						   
							$("#ServiceOPTION"+service_id).attr("disabled","disabled");
							if(transactwhere == 'here')
							{
								total = origprice *1;
								price = ($('#serviceprice'+service_id+'').val()*1);
								total = total + price;
								total = total - total * (discount/100);
							}
							else
							{
								total = (origprice*1);
								price = $('#serviceprice'+service_id+'').val()*1;
								total = total + price;
								total = total - total * (discount/100);
								total = total +200;
							}
							origprice = origprice *1;
							origprice = origprice + price;
							$('#originalprice').val(origprice);
							$('#totalpriceinput').val(total);
							$('.remove_service'+service_id).click(function(){
								
								
								if(transactwhere == 'here')
								{
									origprice = $('#originalprice').val();
									price = ($('#serviceprice'+service_id+'').val()*1);
									total = origprice *1;
									total = total - price;
									total = total - total *(discount/100);
									origprice = origprice *1;
									origprice = origprice - price;
									
								}
								else
								{
									origprice = $('#originalprice').val();
									price = ($('#serviceprice'+service_id+'').val()*1);
									total = origprice *1;
									total = total - price;
									total = total - total *(discount/100) + 200;
									origprice = origprice *1;
									origprice = origprice - price;
								}
								$('#originalprice').val(origprice);
								$('#totalpriceinput').val(total);
								var remServ_id = $(this).data("id");
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
							    toastr.success(data.service_name + " is successfully removed");
								$("#ServiceOPTION"+remServ_id).removeAttr("disabled","disabled");
								t.row($(this).parents('tr')).remove().draw();
								return true;
							});
						} 
						else {
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
							toastr.error("Sorry! This service requires a medical service");
						}
					});
				}
			})
			console.log("Service ID :"+service_id);
		}
	});

	return true;
});