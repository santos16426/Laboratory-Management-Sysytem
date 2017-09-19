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

@section('transaction','active')
@section('corporatetrans','active')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Corporate Account Billing
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<table class="table table-bordered table-hover dataTable" id="corpTbl">
					  <thead>
					    <tr>
					      <th>Company Name</th>
					      <th>Contact Person</th>
					      <th>Email</th>
					      <th>Contact Number</th>
					      <th>Balance</th>
					      <th>Action</th>
					      <th>Status</th>
					    </tr>
					  </thead>
					  <tbody>
					    @foreach($corporates as $corporates)
					    <tr>
					      <td>{{ $corporates->corp_name }}</td>
					      <td>{{ $corporates->corp_contactperson }}</td>
					      <td>{{ $corporates->corp_email }}</td>
					      <td>{{ $corporates->corp_contact }}</td>
					      <td>
					      	@foreach($packprice as $getBill)
					      		@if($getBill->corp_id == $corporates->corp_id)
					      		<?php $balance += $getBill->charge ?>
					      		@endif
					      	@endforeach
					      	<?php echo $balance; $balance=0; ?>
					      </td>
					      <td>
					      	@foreach($packprice as $getBill)
					      		@if($getBill->corp_id == $corporates->corp_id)
					      		<?php $balance += $getBill->charge ?>
					      		@endif
					      	@endforeach
					      	@if($balance > 0)
					      	<a class="btn btn-info btn-xs viewTrans" data-id="{{ $corporates->corp_id }}"><i class="fa fa-handshake-o" aria-hidden="true" ></i>&nbsp;View Transactions</a>
					      	<a class="btn btn-success btn-xs payCorp" data-id="{{ $corporates->corp_id }}"><i class="fa fa-rub" aria-hidden="true" ></i>&nbsp; Pay</a>
					      	@else
					      	<a class="btn btn-info btn-xs viewTrans" data-id="{{ $corporates->corp_id }}"><i class="fa fa-handshake-o" aria-hidden="true" ></i>&nbsp;View Transactions</a>
					      	@endif
					      	<?php $balance=0; ?>
					      </td>
					      <td>
					      	@foreach($packprice as $getBill)
					      		@if($getBill->corp_id == $corporates->corp_id)
					      		<?php $balance += $getBill->charge ?>
					      		@endif
					      	@endforeach
					      	@if($balance > 0)
					      	<span class="badge bg-warning">Not yet Paid</span>
					      	@else
					      	<span class="badge bg-success">Cleared</span>
					      	@endif
					      	<?php $balance=0; ?>
					      </td>
					    </tr>

					    
					    @endforeach
					  </tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>
<form action="/Transaction/CorporateBilling/ViewTransactions" method="GET" id="viewTrans">
	{{ csrf_field() }}
	<input type="hidden" name="corp_id" value="" id="corp_id">
</form>
@endsection
@section('additional')

<script type="text/javascript">
$('.viewTrans').click(function(){
	$('#corp_id').val($(this).data('id'));
	$('#viewTrans').submit();
});
$('.select2').select2();
$('#corpTbl').DataTable({
  'paging'      : true,
  'lengthChange': true,
  'searching'   : true,
  'ordering'    : true,
  'info'        : true,
  'autoWidth'   : true
});

</script>
@endsection