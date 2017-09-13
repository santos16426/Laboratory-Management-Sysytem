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

$('#procpaymentmodal').click(function(){
var payment = $('#paymentinput').val();
var total = $('#totalpriceinput').val();
var payWhere = $('#payWhere').val();
total = total *1;
payment = payment *1;

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
		$('#recieptDetails').append('<center>Sales</center>');
		$('#recieptDetails').append('Total : '+total+'<br>Payment:'+payment+' <br>Change : '+(payment-total)+'')
		$('#myModal').modal('show');
		total = null;
		payment=null;
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

$('#payDirect').click(function(){	
	$('#payWhere').val('0');
	var total = $('#totalpriceinput').val();
	var corp_id = $('#corporate_id').val();
	var addpackagebtn = document.getElementById('activecorppack');
	var price = 0*1;
	$.ajax
	({
		url: '/getDataPackage',
		type: 'get',
		data: { id: corp_id },
		dataType : 'json',
		success:function(response)
		{
			response.forEach(function(data)
			{
				t.row.add([
				data.corp_name + ' Package',
				'',
				data.price,
				'<button class="btn btn-danger btn-xs corpremove_package'+data.corpPack_id+'" data-id="'+data.corpPack_id+'"><i class="fa fa-trash" aria-hidden="true"></i></button><input type="hidden" name="corppackage_id" value="'+data.corpPack_id+'"><input type="hidden" name="payWhere" id="payWhere" value="0"><input type="hidden" name="corppackprice" id="corppackprice'+data.corpPack_id+'" value='+data.price+'>'
				]).draw(false);
				addpackagebtn.className = "btn btn-info disabled";
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
					addpackagebtn.className = "btn btn-info";
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
var corp_id = $('#corporate_id').val();
var price = 0*1;
$.ajax
({
url: '/getDataPackage',
type: 'get',
data: { id: corp_id },
dataType : 'json',

success:function(response){
response.forEach(function(data){
t.row.add([
data.corp_name + ' Package',
'',
data.price + " (c/o "+data.corp_name+")",
'<button class="btn btn-danger btn-xs corpremove_package'+data.corpPack_id+'" data-id="'+data.corpPack_id+'"><i class="fa fa-trash" aria-hidden="true"></i></button><input type="hidden" name="corppackage_id" value="'+data.corpPack_id+'"><input type="hidden" name="payWhere" id="payWhere" value="1"><input type="hidden" name="corppackprice" id="corppackprice'+data.corpPack_id+'" value="0">'
]).draw(false);
addpackagebtn.className = "btn btn-info disabled";
total = total*1;
price = $('#corppackprice'+data.corpPack_id).val()*1;
total = total + price;
$('#totalpriceinput').val(total);
$('.corpremove_package'+data.corpPack_id+'').click(function(){
var remPack_id = $(this).data("id");
addpackagebtn.className = "btn btn-info";
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
'<button class="btn btn-danger btn-xs remove_package'+package_id+'" data-id="'+package_id+'"><i class="fa fa-trash" aria-hidden="true"></i></button><input type="hidden" name="package_id[]" value="'+package_id+'"><input type="hidden" name="packprice" id="packprice'+package_id+' value ='+data.pack_price+' ">'
]).draw(false);
$("#PackageID"+package_id).attr("disabled","disabled");
total = total *1;
price = data.pack_price;
total = total + price;
$('#totalpriceinput').val(total);
$('.remove_package'+package_id+'').click(function(){
var remPack_id = $(this).data("id");
console.log("Remove Package ID:" + remPack_id);
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
// var option = 'ServiceOPTION'service_id;
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
if(med_req == "No")
{
t.row.add([
data.service_name ,
data.servgroup_name,
data.service_price,
'<button class="btn btn-danger btn-xs remove_service'+service_id+'" data-id="'+service_id+'"><i class="fa fa-trash" aria-hidden="true"></i></button><input type="hidden" name="medservice_id[]" value="'+service_id+'"><input type="hidden" name="serviceprice" value='+data.service_price+' id="serviceprice'+service_id+'">'

]).draw(false);
$("#ServiceOPTION"+service_id).attr("disabled","disabled");
total = total *1;
price = ($('#serviceprice'+service_id+'').val()*1);
total = total + price;
$('#totalpriceinput').val(total);
$('.remove_service'+service_id+'').click(function(){
var remServ_id = $(this).data("id");
$('#totalpriceinput').val($('#totalpriceinput').val() - price);
console.log("Remove Service ID:" + remServ_id);
$("#ServiceOPTION"+remServ_id).removeAttr("disabled","disabled");
t.row($(this).parents('tr')).remove().draw();
return true;
});
}
else
{
swal({
title: "Verification",
text: "",
type: "warning",
showCancelButton: true,
confirmButtonColor: "#00a65a",
confirmButtonText: "Yes",
cancelButtonText: "None",
closeOnConfirm: false,
closeOnCancel:false
},
function(isConfirm){
if (isConfirm) {
t.row.add([
data.service_name ,
data.servgroup_name,
data.service_price,
'<button class="btn btn-danger btn-xs remove_service'+service_id+'" data-id="'+service_id+'"><i class="fa fa-trash" aria-hidden="true"></i></button><input type="hidden" name="medservice_id[]" value="'+service_id+'"><input type="hidden" name="serviceprice" value='+data.service_price+' id="serviceprice'+service_id+'">'

]).draw(false);
$("#ServiceOPTION"+service_id).attr("disabled","disabled");
total = total *1;
price = ($('#serviceprice'+service_id+'').val()*1);
total = total + price;
$('#totalpriceinput').val(total);
$('.remove_service'+service_id+'').click(function(){
var remServ_id = $(this).data("id");
$('#totalpriceinput').val($('#totalpriceinput').val() - price);
console.log("Remove Service ID:" + remServ_id);
$("#ServiceOPTION"+remServ_id).removeAttr("disabled","disabled");
t.row($(this).parents('tr')).remove().draw();
return true;
});
swal({
title: "Success",
text: data.service_name+" is successfully added!",
type: "success",
closeOnConfirm: true,
timer: 2000


});
} else {


swal({
title: "Sorry",
text: "Requires a medical request for this service",
type: "error",
closeOnConfirm: true,
timer: 2000


});
}
});
}

})
console.log("Service ID :"+service_id);


}
});

return true;
});