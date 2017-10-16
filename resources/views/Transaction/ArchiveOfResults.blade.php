@extends('AdminLayout.admin')

@if((Session::get('arcresult')!= 1))
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif

@section ('breadrootName')
<i class="fa fa-handshake-o" aria-hidden="true"></i><span> Transaction</span>
@endsection

@section ('breadParentName')
<i class="fa fa-clipboard" aria-hidden="true"></i><span> Results</span>
@endsection
@section('breadactivePage')
<i class="fa fa-archive" aria-hidden="true"></i><span> Archive of Results</span>
@endsection
@section('maintenanceactive')
<a href="">
@endsection

@section('transaction','active')
@section('transresultactive','active')
@section('archiveactive','active')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<strong>Archive of Result</strong>
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<table class="table table-bordered table-hover dataTable" id="transTbl">
				      <thead>
				        <tr>
				          <th width="15%">Transaction Date</th>
				          <th width="15%">Patient Name</th>
				          <th width="5%">No. of files</th>
				          <th width="15%">Action</th>
				        </tr>
				      </thead>

				      <tbody>
				        @foreach($transactions as $transact)
				        <tr>
				          <td>{{  date('F jS, Y',strtotime($transact->trans_date)) }}</td>
				          <td>{{ $transact->patient_fname }} {{ $transact->patient_mname }} {{ $transact->patient_lname }}</td>
				          <td>
				          	@if(count($nooffiles)>0)
				          		@foreach($nooffiles as $nof)
					          		@if($nof->result_id == $transact->result_id)
					          		{{ $nof->count_row }}
					          		<?php  $done = $nof->count_row; ?>
					          		@endif
				          		@endforeach

				          		@if($done == 0)
				          		0
				          		@endif
								<?php $done = 0; ?>
				          	@else
				          		0
				          	@endif

				          </td>
				          		
				          <td>
				          	<form action="/Transaction/ResultFile" method="GET">
				          		<input type="hidden" name="id" value="{{ $transact->trans_id }}">
				          		{{ csrf_field() }}
				            <button class="btn btn-info btn-xs" type="submit"><i class="fa fa-files-o" aria-hidden="true"></i>&nbsp;  View Files</button>
				            </form>
				          </td>
				        </tr>
				        <?php $total=0; ?>
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
	$('#transTbl').DataTable({
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