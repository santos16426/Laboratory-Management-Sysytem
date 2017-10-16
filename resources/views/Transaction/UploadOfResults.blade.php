@extends('AdminLayout.admin')

@if((Session::get('upresult')!= 1))
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
				          <th width="15%">Transaction Date</th>
				          <th width="15%">Patient Last Name</th>
				          <th width="15%">Patient Middle Name</th>
				          <th width="15%">Patient First Name</th>
				          <th width="5%">No. of files</th>
				          <th width="20%">Progress</th>
				          <th width="15%">Action</th>
				        </tr>
				      </thead>

				      <tbody>
				        @foreach($transactions as $transact)
				        <tr>
				          <td>{{  date('F jS, Y',strtotime($transact->trans_date)) }}</td>
				          <td>{{ $transact->patient_lname }}</td>
				          <td>{{ $transact->patient_mname }}</td>
				          <td>{{ $transact->patient_fname }}</td>
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
				          	@foreach($totaltrans as $totals)
				          		@if($totals->result_id == $transact->result_id)
				          			@if(count($donetrans)>0)
					          		@foreach($donetrans as $dones)
					          			@if($dones->result_id == $transact->result_id)
					          				<?php $total = floor(($dones->count_row/$totals->count_row)*100) ?>
								          	<div class="progress progress-striped active progress-md">
				                                  <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: {{ $total }}%">
				                                      <span>{{ $total }}% Complete</span>
				                                  </div>
				                            </div>
				                            <?php $done =1;  ?>
			                            @endif
		                            @endforeach
		                            @if($done == 0)
		                            <div class="progress progress-striped active progress-md">
										<div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
											<span>0% Complete</span>
										</div>
		                            </div>
		                            @endif
		                            <?php $done = 0; ?>
		                            @endif
	                            @endif
                              @endforeach
				          </td>
				          <td>
				            <a class="btn btn-warning btn-xs" href="/Transaction/PatientTransaction?id={{ $transact->trans_id }}"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;  Add Files</a>
				            @if($total == 100)
				            <a class="btn btn-primary btn-xs" href="/uploadFileResuls?id={{ $transact->trans_id }}"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;  Upload Result</a>
				            @endif
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
@if(Session::has('success'))

<script type="text/javascript">
  $( document ).ready(function() 
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
    toastr.success("All files are successfully uploaded");
  }); 
</script>
@endif
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