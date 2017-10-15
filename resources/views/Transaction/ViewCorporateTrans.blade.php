@extends('AdminLayout.admin')

@if((Session::get('corpbill')!= 1))
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif

@section ('breadrootName')
<i class="fa fa-handshake-o" aria-hidden="true"></i><span> Transaction</span>
@endsection

@section ('breadParentName')
<i class="fa fa-heartbeat" aria-hidden="true"></i><span> Corporate Account Billing</span>
@endsection

@section('maintenanceactive')
<a href="">
@endsection
@section('breadactivePage','View Corporate Transactions')
@section('transaction','active')
@section('corporatetrans','active')

@section('content')
<div class="row">
	<div class="col-lg-4">
		<section class="panel">
			<div class="panel-body">
				@foreach($corporate as $details)
					<label>Corporate Name: &nbsp; {{ $details->corp_name }}</label><br>
					<label>Contact Person: &nbsp; {{ $details->corp_contactperson }}</label><br>
					<label>Contact Number: &nbsp; {{ $details->corp_contact }}</label><br>
					<label>Email Address: &nbsp; {{ $details->corp_email }}</label><br>
				@endforeach
			</div>
		</section>
	</div>
	<div class="col-lg-8">
		<section class="panel">
			<header class="panel-heading">
				Corporate Patient Transactions
				<span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    
                </span>
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<table class="table table-bordered table-hover dataTable" id="corpTrans">
					  <thead>
					    <tr>

					    	
					    	<th>Transaction Date</th>
					    	<th>Transaction Charge</th>
					    	<th>Corporate Patient</th>
					    	<th>Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($transactions as $transact)
					    <tr>
						      
						      <td>{{ date('F jS, Y',strtotime($transact->date)) }}</td>
						      <td>{{ ($transact->charge - ($transact->charge * ($transact->discount/100))) }}</td>
						      <td>
						      	{{ $transact->patient_fname }}  {{ $transact->patient_mname }} {{ $transact->patient_lname }}
						      </td>
						      <td>
						      	<a class="btn btn-primary btn-xs printTrans" data-id="{{ $transact->trans_id }}"><i class="fa fa-print" aria-hidden="true" ></i>&nbsp;Print</a>
						      </td>
					    </tr>
					    @endforeach
					  </tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
	<div class="col-lg-8 col-lg-offset-4">
		<section class="panel">
			<header class="panel-heading">
				Corporate Recieved Payments
				<span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    
                </span>
			</header>
			<div class="panel-body">
				<table class="table table-bordered table-hover dataTable" id="corpPayment">
					<thead>
					    <tr>
					    	<th>Payment Date</th>
					    	<th>Amount</th>
					    	<th>Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($payments as $payments)
					    <tr>
					      <td>{{ date('F jS, Y',strtotime($payments->corpPayment_date)) }}</td>
					      <td>{{ $payments->corpPayment_bill }}</td>
					      <td>
					      	<a class="btn btn-primary btn-xs printPayment" href="{{ URL::to( '/CorporatePayments/'.$payments->corpPayment_img)  }}" target="_blank"><i class="fa fa-print" aria-hidden="true" ></i>&nbsp;Print</a>
					      </td>					   
					    </tr>
					    @endforeach  
					  </tbody>
				</table>
			</div>
		</section>
	</div>
</div>

@endsection

@section('additional')
<script type="text/javascript">
$('.select2').select2();

$('#corpTrans').DataTable({
  'paging'      : true,
  'lengthChange': true,
  'searching'   : true,
  'ordering'    : true,
  'info'        : true,
  'autoWidth'   : true
});
$('#corpPayment').DataTable({
  'paging'      : true,
  'lengthChange': true,
  'searching'   : true,
  'ordering'    : true,
  'info'        : true,
  'autoWidth'   : true
});
$('.printTrans').click(function(){
	
	var date="";
	var total="";
	var payment="";
	var change="";
	var trans_id = $(this).data('id');
	var emp_name = "";
	var patient_name ="";
	var claimcode = '';
	var ref_name = "";
	var prescriptions = '';
	$.ajax
	({
	url: '/retrieveReciept', 
	type: 'get',
	data: {ID:trans_id}, 
	dataType : 'json',
	success:function(response) { 
	response[0].forEach(function(data){
	date = data.trans_date;
	date = new Date(date);
	date = date.toDateString();
	total = data.trans_total;
	payment = data.trans_payment;
	change = data.trans_change;
	prescriptions = data.prescriptions;
	total = parseFloat(total).toFixed(2);
	payment= parseFloat(payment).toFixed(2);
	change =parseFloat(change).toFixed(2);

	})
	response[1].forEach(function(data) { 
	emp_name = data.Name;
	})
	response[2].forEach(function(data){
	patient_name = data.Name;
	})
	response[3].forEach(function(data){
	claimcode = data.claimCode;
	})
	response[4].forEach(function(data){
	ref_name=data.Name;
	})
	var contents = $("#formdeposit").html();
	var custtype =$("#typeDr").html();
	var frame1 = $('<iframe />');
	frame1[0].name = "frame1";
	frame1.css({ "position": "absolute", "top": "-1000000px" });
	$("body").append(frame1);
	var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
	frameDoc.document.open();
	frameDoc.document.write('<html><head>');
	frameDoc.document.write('</head><body>');
	frameDoc.document.write('<style>@page { margin: 2; } .invoice-box{ max-width:800px; margin:auto; padding:30px; font-size:16px; line-height:24px; font-family:Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; color:#555; } .invoice-box table{ width:100%; line-height:inherit; text-align:left; } .invoice-box table td{ padding:5px; vertical-align:top; } .invoice-box table tr td:nth-child(2){ text-align:right; } .invoice-box table tr td:nth-child(3){ text-align:left; padding-left:200px; } .invoice-box table tr.top table td{ padding-bottom:20px; } .invoice-box table tr.top table td.title{ font-size:45px; line-height:45px; color:#333; } .invoice-box table tr.information table td{ padding-bottom:40px; } .invoice-box table tr.heading td{ background:#eee; border-bottom:1px solid #ddd; font-weight:bold; } .invoice-box table tr.details td{ padding-bottom:20px; } .invoice-box table tr.item td{ border-bottom:1px solid #eee; } .invoice-box table tr.item.last td{ border-bottom:none; } .invoice-box table tr.total td:nth-child(2){ border-top:2px solid #eee; font-weight:bold; } @media only screen and (max-width: 600px) { .invoice-box table tr.top table td{ width:100%; display:block; text-align:center; } .invoice-box table tr.information table td{ width:100%; display:block; text-align:center; } } </style>');
	frameDoc.document.write('<html><body> <div class="invoice-box"> <table cellpadding="0" cellspacing="0"> <tr class="top"> <td colspan="2">   ');
	frameDoc.document.write('<table>');
	frameDoc.document.write('<tr> <td> <img src="/banner.jpg" style="width:100%; max-width: 350px; padding 0"> </td> <td style="text-align: left; padding-top: 25px; padding: 0; font-size: 10px"> <strong>Company Name:</strong>Globalhealth Diagnostic Center Inc<br> <strong>Address:</strong>156 N. Domingo Street, San Juan City, <br>Metro Manila<br> <strong>Contact Number:</strong>722-4544/576-5357<br> <strong>Email:</strong>globalhealth_sj@yahoo.com </td> </tr>');
	frameDoc.document.write('</table>');
	frameDoc.document.write('<tr class="information"> <td colspan="2"> <table> <tr><td></td></tr>');
	response[6].forEach(function(data){


	frameDoc.document.write('<tr> <td> <strong>Patient Name:</strong>'+patient_name+'<br> <strong> Company Name:</strong> '+data.corp_name+'<br>  <strong>Date:</strong> '+moment(date).format('MMMM Do YYYY')+'  </td> <td> </td> <td style="padding-left: 33px"> <strong>Receptionist:</strong>'+emp_name+'<br> <strong>Reffering Employee:</strong>'+ref_name+' </td></tr>');
	})
	frameDoc.document.write('</table>');

	frameDoc.document.write('<tr class="heading"> <td> Service </td> <td> Fee </td></tr>');


	response[6].forEach(function(data){
	var charge = data.charge;
	if(charge == 0)
	{
	  price = data.price
	  price = parseFloat(price).toFixed(2);
	  frameDoc.document.write('<tr class="item"><td>'+data.corpPack_name+' (Corporate Package)</td><td>Php '+price+'</td></tr>');
	}
	if(charge != 0)
	{
	  frameDoc.document.write('<tr><td>'+data.corpPack_name+' (Corporate Package)</td><td>(c/o '+data.corp_name+') Php '+data.price+'</td></tr>'); 
	}
	response[7].forEach(function(data){
	  frameDoc.document.write('<tr><td>&emsp;&emsp;&emsp; -'+data.service_name+'</td><td></td></tr>');
	})
	})
	response[6].forEach(function(data){
	var discount = 0; 
	response[0].forEach(function(data){
		discount = data.discount;
	})
	if(discount > 0)	
	{
		frameDoc.document.write('<tr class="item" > <td></td> <td>Sub Total: '+data.price+'</td></tr>');	
		frameDoc.document.write('<tr> <td></td> <td> Discount:(PWD/Senior Citizen) 32% </td></tr>');
		frameDoc.document.write('<tr class="item last total"> <td></td> <td>Grand Total: '+(data.price - (data.price *(32/100)))+'</td></tr>');	
	}
	else
	{
		frameDoc.document.write('<tr class="item last total"> <td></td> <td>Grand Total: '+data.price+'</td></tr>');	
	}
	
	})
	
	
	frameDoc.document.write('</div></body></html>');
	frameDoc.document.close();
	setTimeout(function () {
	window.frames["frame1"].focus();
	window.frames["frame1"].print();
	frame1.remove();
	}, 500);
	}
	});
})
</script>
@endsection