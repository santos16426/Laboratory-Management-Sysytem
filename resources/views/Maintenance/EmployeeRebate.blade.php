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
@section ('breadactivePage',"Employee's Rebate")

@section('rebate','active')
@section('emprebactive','active')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<strong>Employee's Rebate</strong>
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<div class="btn-group pull-right">
						<a class="btn btn-info" style="margin-left: -40%" href="#addModal" data-toggle="modal" id="newbtn" ><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; New</a>
					</div>
					<table class="table table-bordered table-hover dataTable" id="rebateTbl">
						<thead>
						<tr>
							<th>Employee Name</th>
						  	<th>Employee Type</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
							@foreach($emp_rebates as $emp_rebates)
						<tr>
						  <td>{{ $emp_rebates->emp_fname }} {{ $emp_rebates->emp_mname }} {{ $emp_rebates->emp_lname }}</td>
						  <td>{{ $emp_rebates->role_name }}</td>
						  <td><a class="btn btn-danger btn-xs delEtypebtn"  data-toggle="modal" data-id="{{$emp_rebates->emp_id}}"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Remove</a></td>
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
  <div class="modal-dialog" style="width: 50%">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <h4 class="modal-title"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Employee Rebate</h4>
      </div>
      <form action="/save_empRebate" id="EmployeeRebadd" method="POST" class="form-horizontal">
        <div class="modal-body">
        	<div class="form-group" style="padding: 5%">
	            
	            <div class="col-xs-10 col-md-offset-1 input-group">
	                <span class="input-group-addon">Employee <sup style="color: red">*</sup></span>
	                <select class="form-control select2 employeeTypeDropDown" name="emp_id" id="emp_id" style="width: 100%; ">
	                @foreach($emp_worebates as $emp_worebates)
	                  <option value="{{ $emp_worebates->emp_id }}">{{ $emp_worebates->emp_fname }} {{ $emp_worebates->emp_mname }} {{ $emp_worebates->emp_lname }}</option>
	                @endforeach
	                </select>
	            </div>
	          </div> 
	        <div class="modal-footer">
	          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
	          <button  class="btn btn-xs btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>
	        </div>
        </div>
        {{ csrf_field() }}
      </form>
    </div>  
  </div>
</div>

<div class="modal fade" id = "deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-danger">
        
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Delete Record</h4>
      </div>
      <form method="post" action="/deleteRebate" id="delform">
      {{ csrf_field()  }}
        <div class="modal-body">
          <h4></h4>
          <input type="text" class="hidden" name="id" id="emprebateid" value="">
          Are you sure you want to delete this record?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</button>
        </div>
      </form>
    </div>  
  </div>
</div>
@endsection
@section('additional')
<script type="text/javascript">
	$('#newbtn').click(function(){
		$('#EmployeeRebadd').bootstrapValidator('resetForm',true);
		$('#EmployeeRebadd div').removeClass('has-error');
		$('#EmployeeRebadd div').removeClass('has-success');
		$('#EmployeeRebadd i').removeClass('glyphicon glyphicon-ok');
		$('#EmployeeRebadd i').removeClass('glyphicon glyphicon-remove');
		$('#EmployeeRebadd .help-block').remove();
	});
	$('#rebateTbl').DataTable({
	  'paging'      : true,
	  'lengthChange': true,
	  'searching'   : true,
	  'ordering'    : false,
	  'info'        : true,
	  'autoWidth'   : true	  
	});
	$('.delEtypebtn').click(function(){
    	$('#emprebateid').val($(this).data('id'));
    	$('#deleteModal').modal('show');
  	});
  	$('#emp_id').select2();
</script>
@endsection