@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-cogs" aria-hidden="true"></i><span> Maintenance</span>
@endsection

@section ('breadParentName')
<i class="fa fa-user" aria-hidden="true"></i><span> Employee</span>
@endsection

@section ('breadactivePage','Employee Type')

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
                <a class="btn btn-info" style="margin-left: -20%" href="#addEmpType" data-toggle="modal" ><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; New </a>
            </div>
        </div>
				<table class="table table-bordered table-hover" id="emptype">
		      		<thead>
		      			<tr>
		      				<th>Employee Types</th>
		      				<th>Action</th>
		      			</tr>
		      		</thead>
		      		<tbody>
		      			@foreach($emptype as $emptype)
		      			<tr>
		      				<td>{{ $emptype->role_name }}</td>
		      				<td>
		                  <input type="text" name="" value="" class="hidden">
		                  <a class="btn btn-warning btn-xs upEtypebtn" data-toggle="modal" href="#EmployeeTypeedit" data-id="{{ $emptype->role_id }}"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
		                  <button type="button" class="btn btn-danger btn-xs delEtypebtn" data-id="{{ $emptype->role_id }}"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</button>
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
         		{{ csrf_field() }}
          			<div class="box-body">
            			<div class="form-group">
		             		<label  class="col-sm-3 control-label">Employee Type<sup style="color: red">*</sup></label>
              				<div class="col-sm-8">
	                			<input type="text" class="form-control" id="emptype" name="emptype" >
              				</div>
            			</div>
            			<hr>
            			<h4>Attributes needed:</h4>
            			<div class="col-md-12">
            				<div class="col-md-4">
            					<div class="form-group">
		              				<div class="checkbox">
		              					<label class="label_check" for="number">
		              						<input type="checkbox" id="number" name="number" value="1"> Contact Number
		              					</label>
		            				</div>
            					</div>
		            			<div class="form-group">
			              			<div class="checkbox">
			              				<label class="label_check" for="account">
			              					<input type="checkbox" id="account" name="account" value="2"> Account
			              				</label>
			            			</div>
		            			</div>
            				</div>
	            			<div class="col-md-4">
	            				<div class="form-group">
			              			<div class="checkbox">
			              				<label class="label_check" for="license">
			              					<input type="checkbox" id="license" name="license" value="3"> License Number
			              				</label>
			            			</div>
	            				</div>
		            			<div class="form-group">
			              			<div class="checkbox">
			              				<label class="label_check" for="rank">
			              					<input type="checkbox" id="rank" name="rank" value="4"> Position/Rank
			              				</label>
			            			</div>
		            			</div>
	            			</div>
	            			<div class="col-md-4">
		            			<div class="form-group">
			              			<div class="checkbox">
			              				<label class="label_check" for="address">
			              					<input type="checkbox" id="address" name="address" value="5"> Address
			              				</label>
			            			</div>
		            			</div>
	            			</div>
							<div class="col-md-4">
								<div class="form-group">
								    <div class="checkbox">
								      <label class="label_check" for="rebate">
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
			<form class="form-horizontal" id="EmployeeType2" method="POST" action="/update_empType">
				<div class="modal-body">
					<div class="form-group">
						<label  class="col-sm-3 control-label">Employee Type<sup style="color: red">*</sup></label>
						<div class="col-sm-8">
							<input type="hidden" name="upemptype_id" value="" id="typefield_id">
							<input type="text" class="form-control" name="updateemptype" value = "" id="typefield_name">
						</div>
					</div>
				{{ csrf_field() }}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-xs btn-warning"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Update</button>
				</div>
			</form>
		</div>  
	</div>
</div>
@endsection
@section('additional')
<script type="text/javascript">
	$('#emptype').dataTable( {
		'paging'      : true,
		'lengthChange': true,
		'searching'   : true,
		'ordering'    : true,
		'info'        : true,
		'autoWidth'   : true
	});

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