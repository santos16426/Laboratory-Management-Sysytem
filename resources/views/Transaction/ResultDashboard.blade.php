@extends('AdminLayout.admin')

@if((Session::get('addresult')!= 1))
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
@section('breadactivePage','Encoding of Results')
@section('maintenanceactive')
<a href="">
@endsection

@section('transaction','active')
@section('transresultactive','active')
@section('encodeactive','active')

@section ('content')

<section class="panel">
 @if(count($servgroup)>0)
	<header class="panel-heading btn-primary ">
	  	<ul class="nav nav-tabs">
			@foreach($servgroup as $sg)
				<li><a href="#{{ $sg->servgroup_id }}" class="tabs" data-id="{{ $sg->servgroup_id }}" data-toggle="tab">{{ $sg->servgroup_name }}</a></li>
			@endforeach
			
		</ul>
	</header>
  @endif
  @if(count($servgroup)>0)
  <div class="tab-content">
    	@foreach($servgroup as $servegroup_id)
	    	<div class="tab-pane" id="{{ $servegroup_id->servgroup_id }}">
	    		<div class="box box-primary">
				    <div class="box-body">
				      <h3><center>{{ $servegroup_id->servgroup_name }}</center></h3>
				      <table class="table table-bordered table-hover dataTable" id="result_tbl{{ $servegroup_id->servgroup_id }}">
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
					      </tbody>
					    </table>
				    </div>
				</div>
	    	</div>
    	@endforeach
  	</div>
  	@else
  	<div class="panel-body">
		<center><h1>No Service Group Assigned to this Employee Type</h1></center>
		<center><h3 style="color:blue"><u>Ask admin for help</u></h3></center>
	</div>
	@endif      	
</section>
@endsection
@section('additional')
<script type="text/javascript">
	
	$.fn.dataTable.ext.errMode = 'none';
	$('.tabs').click(function(){
		var servgroup_id = $(this).data('id');
		var t = $('#result_tbl'+servgroup_id).DataTable({
			'paging'      : false,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : false,
			'info'        : false,
			'autoWidth'   : true,
			});
		t.clear();
		$.ajax
		({
			url: '/getTransactionperGroup',
			type: 'get',
			data: {id:servgroup_id},
			dataType: 'json',
			success:function(response){
				response.forEach(function(data){
					
					t.row.add([
						data.trans_date,
						data.patient_lname,
						data.patient_mname,
						data.patient_fname,
						'<a class="btn btn-warning btn-xs" href="/AddLayout?trans_id='+data.trans_id+'&group_id='+servgroup_id+'"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Result</a>'
					]).draw(false);
				})
			}
		});
	});
</script>
@endsection
