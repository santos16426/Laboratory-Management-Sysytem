@if((Session::get('addemptype')!=1)&&(Session::get('upemptype')!=1)&&(Session::get('delemptype')!=1))
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif
@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-cogs" aria-hidden="true"></i><span> Maintenance</span>
@endsection

@section ('breadParentName')
<i class="fa fa-user" aria-hidden="true"></i><span> Employee</span>
@endsection
@section('maintenanceactive')
<a href="" class="active">
@endsection
@section ('breadactivePage','Employee Type')
@section('employee','active')
@section('emptypeactive','active')


@section('content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Employee Type
			</header>
  			<div class="panel-body">
          <div class="clearfix">
            <div class="btn-group pull-right">
            	@if(Session::get('addemptype')==1)
                <a class="btn btn-info" style="margin-left: -40%" href="#addEmpType" data-toggle="modal" id="newbtn"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; New </a>
                @endif
            </div>
        </div>
				<table class="table table-bordered table-hover" id="emptype">
		      		<thead>
		      			<tr>
		      				<th>Employee Types</th>
		      				<th>Laboratory Name</th>
		      				<th>Action</th>
		      				<th>Status</th>
		      			</tr>
		      		</thead>
		      		<tbody>
		      			@foreach($emptype as $emptype)
		      			<tr>
		      				<td>{{ $emptype->role_name }}</td>
		      				<td>{{ $emptype->lab_name }}</td>
		      				<td>
		      			@if($emptype->RoleStatus == 1 and $emptype->LabStatus == 1 or $emptype->RoleStatus == 1 and $emptype->LabStatus == null)
		      				@if(Session::get('upemptype')==1)
							<a class="btn btn-warning btn-xs upEtypebtn" data-toggle="modal" href="#EmployeeTypeedit" data-id="{{ $emptype->role_id }}"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
							@endif
							@if(Session::get('delemptype')==1)
							<button type="button" class="btn btn-danger btn-xs delEtypebtn" data-id="{{ $emptype->role_id }}"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</button>
							@endif
		                @else
		                	@if(Session::get('updateemptype')==1)
							<a class="btn btn-warning btn-xs" disabled><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
							@endif
							@if(Session::get('delemptype')==1)
							<button type="button" class="btn btn-danger btn-xs" disabled><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</button>
							@endif
		                @endif
		      				</td>
		      				<td>
		      					@if($emptype->RoleStatus == 1 and $emptype->LabStatus == 1 or $emptype->RoleStatus == 1 and $emptype->LabStatus == null)
		      						<span class="badge bg-success">Available</span>
								@else
									<span class="badge bg-important">Unavailable</span>
								@endif
		      				</td>
		      			</tr>

		      			@endforeach
		      		</tbody>
		      	</table>
			</div>
		</section>
	</div>
</div>
<div class="modal fade" id="addEmpType">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title">Add Employee Type</h4>
      		</div>
      		<div class="modal-body">
         		<form class="form-horizontal" id="EmployeeTypeadd" method="POST" action="/save_empType">
          			<div class="box-body">
            			<div class="form-group"  >
										<div class="col-md-10 col-md-offset-1">
											<div class="input-group">
												<div class="input-group-addon">
													Employee Type<sup style="color: red">*</sup>
												</div>
												<input type="text" class="form-control disabled" id="emptype" name="emptype" >
											</div>
										</div>  
									</div> 
            			<div class="form-group">
										<div class="col-md-10 col-md-offset-1">
											<div class="input-group">
												<div class="input-group-addon">
													Laboratory Name
												</div>
												<select class="form-control select2" name="lab_id" id="dropLABID" style="width: 100%">
													<option value=Null>Select a laboratory</option>
													@foreach($labs as $gd) 
														<option value="{{$gd->lab_id}}">{{$gd->lab_name}}</option>
													@endforeach
												</select>
											</div>
										</div>  
									</div> 
            			<hr>
            			<h4>Attributes needed:</h4>
            			<div class="col-md-12">
            				<div class="col-md-4">
            					<div class="form-group">
		              				<div class="checkbox">
		              					<label class="" for="number">
		              						<input type="checkbox" id="number" name="number" value="1"> Contact Number
		              					</label>
		            				</div>
            					</div>
		            			<div class="form-group">
			              			<div class="checkbox">
			              				<label class="" for="account">
			              					<input type="checkbox" id="account" name="account" value="2"> Account
			              				</label>
			            			</div>
		            			</div>
            				</div>
	            			<div class="col-md-4">
	            				<div class="form-group">
			              			<div class="checkbox">
			              				<label class="" for="license">
			              					<input type="checkbox" id="license" name="license" value="3"> License Number
			              				</label>
			            			</div>
	            				</div>
		            			<div class="form-group">
			              			<div class="checkbox">
			              				<label class="" for="rank">
			              					<input type="checkbox" id="rank" name="rank" value="4"> Position/Rank
			              				</label>
			            			</div>
		            			</div>
	            			</div>
	            			<div class="col-md-4">
		            			<div class="form-group">
			              			<div class="checkbox">
			              				<label class="" for="address">
			              					<input type="checkbox" id="address" name="address" value="5"> Address
			              				</label>
			            			</div>
		            			</div>
	            			</div>
							<div class="col-md-4">
								<div class="form-group">
								    <div class="checkbox">
								      <label class="" for="rebate">
								      	<input type="checkbox" id="rebate" name="rebate" value="6"> Rebate
								      </label>
								  </div>
								</div>
							</div>
            			</div>
          			</div>
					<div class="box-footer">
						<button  data-dismiss="modal" class="btn btn-default">Cancel</button>
						<button type="submit" class="btn btn-primary pull-right">Save</button>
					</div>
					{{ csrf_field() }}
        		</form>
      		</div>
    	</div>
  	</div>
</div>

<div class="modal fade" id = "deleteModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header btn-danger">
			<h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Delete Record</h4>
			</div>
			<form method="post" action="/deleteEmployeeType" id="delform">
				{{ csrf_field()  }}
				<div class="modal-body">
					<input type="text" class="hidden" name="id" id="emptypeid" value="">
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

<div class="modal fade" id = "EmployeeTypeedit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header btn-warning">
				<h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Update employee type</h4>
			</div>
				<div class="modal-body">
					<form class="form-horizontal" id="EmployeeType2" method="POST" action="/update_empType">
						<div class="box-body">
							<div class="form-group"  >
							<div class="col-md-10 col-md-offset-1">
								<div class="input-group">
									<div class="input-group-addon">
										Employee Type<sup style="color: red">*</sup>
									</div>
									<input type="hidden" name="upemptype_id" value="" id="typefield_id">
								<input type="text" class="form-control" name="updateemptype" value = "" id="typefield_name">
								</div>
							</div>  
						</div>
				
						{{ csrf_field() }}
						</div>
						<hr>
						<div class="box-footer">
							<button  data-dismiss="modal" class="btn btn-default">Cancel</button>
							<button type="submit" class="btn btn-warning pull-right">Update</button>
						</div>
				</form>
			</div>
		</div>  
	</div>
</div>
@endsection
@section('additional')
<script type="text/javascript">
	$('#newbtn').click(function(){
		$('#EmployeeTypeadd').bootstrapValidator('resetForm',true);
		$('#EmployeeTypeadd div').removeClass('has-error');
		$('#EmployeeTypeadd div').removeClass('has-success');
		$('#EmployeeTypeadd i').removeClass('glyphicon glyphicon-ok');
		$('#EmployeeTypeadd i').removeClass('glyphicon glyphicon-remove');
		$('#EmployeeTypeadd small').attr('style','display:none');
	});
	$(document).ready(function(){
	$('#emptype').dataTable( {
		'paging'      : true,
		'lengthChange': true,
		'searching'   : true,
		'ordering'    : true,
		'info'        : true,
		'autoWidth'   : true
	});
	});
	$('#dropLABID').select2();
	$('.delEtypebtn').click(function(){
		$('#emptypeid').val($(this).data('id'));
		$('#deleteModal').modal('show');
	});

	$('.upEtypebtn').click(function(){
		$.ajax
		({
			url: '/updateEmployeeType',
			type: 'get',
			data: { id:$(this).data('id') }, 
			dataType : 'json',
			success:function(response) {
				response.forEach(function(data) { 
					$('#typefield_id').val(data.role_id);
					$('#typefield_name').val(data.role_name);
				})
			}
		});
		return true;
	});
</script>
@endsection