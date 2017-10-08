@if((Session::get('upresult')!= 1))
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif
@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-handshake-o" aria-hidden="true"></i><span> Transaction</span>
@endsection

@section ('breadParentName')
<i class="fa fa-clipboard" aria-hidden="true"></i><span> Results</span>
@endsection
@section('breadactivePage','Uploading of Results')
@section('maintenanceactive')
<a href="">
@endsection

@section('transaction','active')
@section('transresultactive','active')
@section('uploadactive','active')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<strong>Upload Result</strong>
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<div class="btn-group pull-right">
					</div>
					<table class="table table-bordered table-hover dataTable" id="rebateTbl">
				      <thead>
				        <tr>
				          
				          
				          <th>Transaction Date</th>
				          <th>Patient Last Name</th>
				          <th>Patient Middle Name</th>
				          <th>Patient First Name</th>
				          <th>Action</th>
				        </tr>
				      </thead>

				      <tbody>
				        @foreach($transactions as $transact)
				        <tr>
				          <td>{{ $transact->trans_date }}</td>
				          <td>{{ $transact->patient_lname }}</td>
				          <td>{{ $transact->patient_mname }}</td>
				          <td>{{ $transact->patient_fname }}</td>
				          <td>
				            <a class="btn btn-warning btn-xs" href="/Transaction/PatientTransaction?id={{ $transact->trans_id }}"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;  Add Files</a>
				            <a class="btn btn-primary btn-xs" href="/uploadFileResuls?id={{ $transact->trans_id }}"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;  Upload Result</a>
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
@endsection
@section('additional')
<script type="text/javascript">
	$('#rebateTbl').DataTable({
	  'paging'      : true,
	  'lengthChange': true,
	  'searching'   : true,
	  'ordering'    : false,
	  'info'        : true,
	  'autoWidth'   : true,
	  'bSort'		: false
	});
</script>
@endsection