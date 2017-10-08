@if((Session::get('rebatebill')!= 1))
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif
@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-handshake-o" aria-hidden="true"></i><span> Transaction</span>
@endsection

@section ('breadParentName')
<i class="fa fa-percent" aria-hidden="true"></i><span> Rebate Employee Billing</span>
@endsection

@section('maintenanceactive')
<a href="">
@endsection
@section('breadactivePage',"View Employee Referrals")
@section('transaction','active')
@section('rebatetrans','active')

@section('content')
<div class="row">
	<div class="col-lg-4">
		<section class="panel">
			<div class="panel-body">
				@foreach($empdetails as $emp)
					<label>Employee Type:&nbsp; {{ $emp->role_name }}</label><br>
					<label>Name:&nbsp; {{ $emp->emp_fname }} {{ $emp->emp_mname }} {{ $emp->emp_lname }}</label><br>
					@if($emp->address)
						<label>Address:&nbsp; {{ $emp->emp_address }}</label><br>
					@endif
					@if($emp->contact)
						<label>Contact Number:&nbsp; {{ $emp->emp_contact }}</label><br>
					@endif
					@if($emp->rank)
						<label>Rank:&nbsp; {{ $emp->rank_name }}</label><br>
					@endif
					@if($emp->license)
						<label>License Number:&nbsp; {{ $emp->license_no }}</label><br>
					@endif
					
				@endforeach
			</div>
		</section>
	</div>
	<div class="col-lg-8">
		<section class="panel">
			<header class="panel-heading">
				Employee Referrals
				<span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                </span>
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<table class="table table-bordered table-hover dataTable" id="corpTrans">
					  <thead>
					    <tr>
					    	<th>Transaction ID</th>
					    	<th>Transaction Date</th>
					    	<th>Transaction Total</th>
					    	<th>Patient</th>
					    	<th>Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($transactions as $trans)
					    <tr>
						      <td>{{ $trans->trans_id }}</td>
						      <td>{{ $trans->date }}</td>
						      <td>{{ $trans->trans_total }}</td>
						      <td>{{ $trans->patient_fname }} {{ $trans->patient_mname }} {{ $trans->patient_lname }}</td>
						      <td>
						      	<a class="btn btn-primary btn-xs printTrans" data-id=""><i class="fa fa-print" aria-hidden="true" ></i>&nbsp;Print</a>
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
				Company Payments
				<span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                </span>
			</header>
			<div class="panel-body">
				<table class="table table-bordered table-hover dataTable" id="corpPayment">
					<thead>
					    <tr>
					    	<th>Payment ID</th>
					    	<th>Payment Date</th>
					    	<th>Amount</th>
					    	<th>Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($payments as $pay)
					    <tr>
					      <td>{{ $pay->transRebPay_id }}</td>
					      <td>{{ $pay->transRebPay_date }}</td>
					      <td>{{ $pay->transRebPay_amount }}</td>
					      <td>
					      	<a class="btn btn-primary btn-xs printPayment" href="{{ URL::to( '/Rebate_payments/'.$pay->transRebPay_img)  }}" target="_blank" data-id=""><i class="fa fa-print" aria-hidden="true" ></i>&nbsp;Print</a>
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

</script>
@endsection