@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-cogs" aria-hidden="true"></i><span> Maintenance</span>
@endsection

@section ('breadParentName')
<i class="fa fa-percent" aria-hidden="true"></i><span> Rebate</span>
@endsection

@section('maintenanceactive')
<a href="" class="active">
@endsection
@section('rebate','active')
@section('rebactive','active')

@section ('breadactivePage','Rebate Percentage')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<strong>Rebate Percentage</strong>
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<div class="btn-group pull-right">
						<a class="btn btn-info" style="margin-left: -20%" href="#addModal" data-toggle="modal" ><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; New </a>
					</div>
					<table class="table table-bordered table-hover dataTable" id="rebateTbl">
					  <thead>
					    <tr>
					      <th>Percentage</th>
					      <th>Date Created</th>
					      
					    </tr>
					  </thead>
					  <tbody>
					   @foreach($rebate as $rebate)
					    <tr>
					      <td>{{ $rebate->percentage }}</td>
					      <td>{{ $rebate->created_at }}</td>
					    </tr>
					  @endforeach
					  </tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>
<div class="modal fade" id = "addModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <h4 class="modal-title"><i class="fa fa-user-plus" aria-hidden="true"></i> Edit Rebate</h4>
      </div>
      <form action="/save_rebatePercentage" method="POST" class="form-horizontal" id="rebate">
        <div class="modal-body" >
        	<div class="form-group" >
	            
	              <div class="col-sm-10 col-md-offset-1">
	                 <div class="input-group">
	                  <div class="input-group-addon">
	                  Percentage <sup style="color: red">*</sup>
	                 </div>
	                <input  name="rebatepercent" type="text"  class="form-control input-md" required>
	              </div>
	            </div>  
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn pull-left" data-dismiss="modal">Close</button>
	          <button  type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>
	        </div>
        </div>
        {{ csrf_field() }}
      </form>
    </div>  
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