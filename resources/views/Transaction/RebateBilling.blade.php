@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-handshake-o" aria-hidden="true"></i><span> Transaction</span>
@endsection

@section ('breadParentName')
<i class="fa fa-percent" aria-hidden="true"></i><span> Rebate</span>
@endsection
@section('breadactivePage','Rebate Billing')
@section('maintenanceactive')
<a href="">
@endsection

@section('transaction','active')
@section('rebatetrans','active')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Employee's Rebate Billing
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<table class="table table-bordered table-hover dataTable" id="corpTbl">
						<thead>
							<th>Employee Name</th>
							<th>Total Rebates</th>
							<th>Action</th>
							<th>Status</th>
						</thead>
						<tbody>
						@foreach($emp_rebate as $empreb)
							<tr>
								<td>{{ $empreb->emp_fname }} {{ $empreb->emp_mname }} {{ $empreb->emp_lname }}</td>
								<td>
									@foreach($rebates as $rebate)
										@if($empreb->emp_id == $rebate->emp_id)
										<?php  $total += $rebate->percentage; ?>
										@endif
									@endforeach
									{{ $total }}
									<?php $total=0; ?>
								</td>
								<td>
									@foreach($rebates as $rebate)
										@if($empreb->emp_id == $rebate->emp_id)
										<?php  $total += $rebate->percentage; ?>
										@endif
									@endforeach
									@if($total > 0)
									
									@else

									@endif
									<?php $total=0; ?>
								</td>
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

