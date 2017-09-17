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
					      	@foreach($corp_id as $key1 => $value1)
						      	@if($key1 == $corporates->corp_id)
						      		@foreach($corpPack_count as $key => $value)
						      			@foreach($corppackage as $corppack)
								      		@if($key == $corppack->corpPack_id)
						      					{{ $balance += $corppack->price * $value }}
								      		@else
								      		@endif
								      	@endforeach
							      	@endforeach
						      	@endif
					      	@endforeach
					      </td>
					      <td></td>
					      <td></td>
					    </tr>
					    @endforeach
					  </tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>

@endsection

@section('additional')
<script type="text/javascript">
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