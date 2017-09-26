var t = $('#medicalRequest').DataTable({
	'paging'      : false,
	'lengthChange': false,
	'searching'   : true,
	'ordering'    : false,
	'info'        : false,
	'autoWidth'   : true,
});
$('#seniormodal').click(function(){
	
	t.fnDeleteRow(t.$('#idniyato')[0]);
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
var payment = $('#paymentinput').val();
var total = $('#totalpriceinput').val();
var payWhere = $('#payWhere').val();
var transactwhere = $('#transactwhere').val();

total = total *1;
payment = payment *1;

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
			$('#recieptDetails').append('<div class="pull-right" style="text-align:right""><hr>Grand Total: '+total+'<br><hr>Payment:'+payment+' <br>Change : '+(payment-total)+'</div>')
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
			var semitotal = total -200;
			$('#recieptDetails').empty();
			$('#recieptDetails').append('<center>Reciept</center><hr>');
			$('#recieptDetails').append('Services sana dito');
			$('#recieptDetails').append('<div class="pull-right" style="text-align:right""><hr>Sub-Total : '+semitotal+'<br>Home Service Fee: 200 <br><hr>Grand Total: '+total+'<br><hr>Payment:'+payment+' <br>Change : '+(payment-total)+'</div>')
			$('#myModal').modal('show');
			total = 200;
			payment=null;
		}
	}
});




$('#payDirect').click(function(){	
	$('#payWhere').val('0');
	var total = $('#totalpriceinput').val();
	var corpPack_id = $('#corppack_id').val();
	var addpackagebtn = document.getElementById('activecorppack');
	var price = 0*1;
	$.ajax
	({
		url: '/getDataPackage',
		type: 'get',
		data: { id: corpPack_id },
		dataType : 'json',
		success:function(response)
		{
			response.forEach(function(data)
			{
				t.row.add([
				data.corpPack_name,
				'',
				data.price,
				'<input type="hidden" id="corppackprice'+data.corpPack_id+'" value='+data.price+' name="corppackprice" /><a class="btn btn-danger btn-xs corpremove_package'+data.corpPack_id+'" data-id="'+data.corpPack_id+'"><i class="fa fa-trash" aria-hidden="true"></i></a><input type="hidden" name="corppackage_id" value="'+data.corpPack_id+'"><input type="hidden" name="payWhere" id="payWhere" value="0"><input type="hidden" name="corp_id" id="corp_id" value='+data.corp_id+'>'
				]).draw(false);
				total = total * 1;
				price = ($('#corppackprice'+data.corpPack_id).val()*1);
				total = total + price;

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
					var remPack_id = $(this).data("id");
					$('#totalpriceinput').val($('#totalpriceinput').val() - price);
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
	var addpackagebtn = document.getElementById('activecorppack');
	$('#payWhere').val('1');
	var corpPack_id = $('#corppack_id').val();
	var price = 0*1;
	$.ajax
	({
		url: '/getDataPackage',
		type: 'get',
		data: { id: corpPack_id },
		dataType : 'json',
		success:function(response){
			response.forEach(function(data){
				t.row.add([
				data.corpPack_name,
				'',
				data.price + " (c/o "+data.corp_name+")",
				'<input type="hidden" id="corppackprice'+data.corpPack_id+'" value='+data.price+' name="corppackprice" /><a class="btn btn-danger btn-xs corpremove_package'+data.corpPack_id+'" data-id="'+data.corpPack_id+'"><i class="fa fa-trash" aria-hidden="true"></i></a><input type="hidden" name="corppackage_id" value="'+data.corpPack_id+'"><input type="hidden" name="payWhere" id="payWhere" value="1"><input type="hidden" name="corp_id" id="corp_id" value='+data.corp_id+'>'
				]).draw(false);
				total = total*1;
				price = 0;
				total = total + price;
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
					var remPack_id = $(this).data("id");
					
					$('#totalpriceinput').val($('#totalpriceinput').val() - price);
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
	var package_id = $('#package_id').val();
	var total = $('#totalpriceinput').val();
	var price = 0*1;
	$.ajax
	({
		url: '/getCompanyPackage',
		type: 'get',
		data: { id: package_id },
		dataType : 'json',
		success:function(response){
			response.forEach(function(data){
				t.row.add([
				data.pack_name + " (Package)" ,
				'',
				data.pack_price,
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
				total = total *1;
				price = data.pack_price;
				total = total + price;
				$('#totalpriceinput').val(total);
				$('.remove_package'+package_id+'').click(function(){
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
					$('#totalpriceinput').val($('#totalpriceinput').val() - price);
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
					if(data.service_notes != null)
					{
						$('#service_notes').append(data.service_notes + "<br>");
					}
					$("#ServiceOPTION"+service_id).attr("disabled","disabled");
					total = total *1;
					price = ($('#serviceprice'+service_id+'').val()*1);
					total = total + price;
					$('#totalpriceinput').val(total);
					$('.remove_service'+service_id+'').click(function(){

					if(data.service_notes != null)
					{
						var str = $('#service_notes').text().replace(data.service_notes + "<br>", ' ');
						len = str.length;
						$('#service_notes').text(str.substring(len));
					}

					var remServ_id = $(this).data("id");
					$('#totalpriceinput').val($('#totalpriceinput').val() - price);
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
						    if(data.service_notes != null)
							{
								$('#service_notes').append(data.service_notes + "<br>");
							}
							
							$("#ServiceOPTION"+service_id).attr("disabled","disabled");
							total = total *1;
							price = ($('#serviceprice'+service_id+'').val()*1);
							total = total + price;
							$('#totalpriceinput').val(total);
							$('.remove_service'+service_id).click(function(){
								if(data.service_notes != null)
								{
									var str = $('#service_notes').text().replace(data.service_notes + "<br>", ' ');
									len = str.length;
									$('#service_notes').text(str.substring(len));
								}

								var remServ_id = $(this).data("id");
								$('#totalpriceinput').val($('#totalpriceinput').val() - price);
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