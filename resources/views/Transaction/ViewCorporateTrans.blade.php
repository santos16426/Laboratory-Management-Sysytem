@if((Session::get('corpbill')!= 1))
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif
@extends('AdminLayout.admin')

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
				Corporate Transactions
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
						      <td>{{ $transact->charge }}</td>
						      <td>
						      	{{ $transact->patient_fname }}  {{ $transact->patient_mname }} {{ $transact->patient_lname }}
						      </td>
						      <td>
						      	<a class="btn btn-primary btn-xs printTrans" data-id="{{ $transact->transCorp_id }}"><i class="fa fa-print" aria-hidden="true" ></i>&nbsp;Print</a>
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
				Corporate Payments
				<span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
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

</script>
@endsection