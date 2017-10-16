@extends('AdminLayout.admin')

@if((Session::get('addlab')!=1)&&(Session::get('uplab')!=1)&&(Session::get('dellab')!=1))
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif

@section ('breadrootName')
<i class="fa fa-cogs" aria-hidden="true"></i><span> Maintenance</span>
@endsection

@section ('breadParentName')
<i class="fa fa-building" aria-hidden="true"></i><span> Department</span>
@endsection

@section('maintenanceactive')
<a href="" class="active">
@endsection
@section('laboratoryactive','active')


@section('content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<strong>Department</strong>
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<div class="btn-group pull-right">
            @if(Session::get('addlab')==1)
						<a class="btn btn-info" style="margin-left: -40%" href="#addModal" data-toggle="modal" id="newbtn"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; New </a>
            @endif
					</div>
					<table class="table table-bordered table-hover dataTable" id="labTbl">
				      <thead>
				        <tr>
				          <th>Department ID</th>
				          <th>Department Name</th>
				          <th>Action</th>
                  <th>Status</th>
				        </tr>
				      </thead>
				      <tbody>
				        @foreach($table as $t)
				        <tr>
				          <td>{{ $t->lab_id }}</td>
				          <td>{{ $t->lab_name }}</td>
				          <td>
                    @if($t->LabStatus == 1)
                      @if(Session::get('uplab')==1)
                      <a class="btn btn-warning btn-xs uplabbtn" href="#updateModal" data-toggle="modal" data-id="{{ $t->lab_id }}"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
                      @endif
                      @if(Session::get('dellab')==1)
                      <a class="btn btn-danger btn-xs delbtn" data-id="{{ $t->lab_id }}" ><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
                      @endif
                    @endif
                    @if($t->LabStatus == 0)
                      @if(Session::get('uplab')==1)
                      <a class="btn btn-warning btn-xs disabled" ><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
                      @endif
                      @if(Session::get('dellab')==1)
                      <a class="btn btn-danger btn-xs disabled"  ><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
                      @endif
                    @endif
				          </td>
                  <td>
                  @if($t->LabStatus == 1)
                    <span class="badge bg-success">Available</span>
                  @endif
                  @if($t->LabStatus == 0)
                    <span class="badge bg-important">Unavailable</span>
                  @endif
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

<div class="modal fade" id = "updateModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-warning">
        
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Update</h4>
      </div>
      <div class="modal-body">
        <form action="/update_laboratory" method="POST" class="form-horizontal" id="labedit">
          <div class="form-group" style="margin-right:3% ">
             
                <div class="col-md-10 col-md-offset-1">
                   <div class="input-group">
                    <div class="input-group-addon">
                    Department Name<sup style="color: red">*</sup>
                   </div>
                  <input name="uplab_id" type="hidden" id="uplab_id">
                  <input  name="uplab_name" type="text" id="uplab_name" placeholder="Department Name" class="form-control input-md" required>
               </div>
            </div>  
         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-xs btn-warning" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Update</button>
        </div>
        {{ @csrf_field() }}
        </form>
      </div>
    </div>  
  </div>
</div>

<!-- add modal -->
<div class="modal fade" id = "addModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <h4 class="modal-title"><i class="fa fa-plus" aria-hidden="true"></i> New Department</h4>
      </div>
      <div class="modal-body">
        <form action="/save_Lab" method="POST" class="form-horizontal" id="save_lab">
					<div class="form-group" style="margin-right:3% ">
						<div class="col-md-10 col-md-offset-1">
							<div class="input-group">
								<div class="input-group-addon">
									Department Name<sup style="color: red">*</sup>
								</div>
								<input  name="labname" id="labname" type="text" placeholder="Department Name" class="form-control input-md" required>
							</div>
						</div>  
					</div>
        <div class="modal-footer">
          <button type="button" class="btn pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-success" id="addemptype" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>
        </div>
        {{ @csrf_field() }}
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
      <form method="post" action="/deleteLaboratory" id="delform">
      {{ csrf_field()  }}
        <div class="modal-body">
          <h4></h4>
          <input type="text" class="hidden" name="id" id="labid" value="">
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
  $('#save_lab').bootstrapValidator('resetForm',true);
  $('#save_lab div').removeClass('has-error');
  $('#save_lab div').removeClass('has-success');
  $('#save_lab i').removeClass('glyphicon glyphicon-ok');
  $('#save_lab i').removeClass('glyphicon glyphicon-remove');
  $('#save_lab small').attr('style','display:none');
 });
</script>
<script type="text/javascript">
	
  $(document).ready(function(){
    $('#labTbl').dataTable({
    'paging'      : true,
    'lengthChange': true,
    'searching'   : true,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : true,
  });
  });
	$('.delbtn').click(function(){
    $('#labid').val($(this).data('id'));
    $('#deleteModal').modal('show');
	});

	$('.uplabbtn').click(function(){
    $('#labedit').bootstrapValidator('resetForm',true);
    $('#labedit div').removeClass('has-error');
    $('#labedit div').removeClass('has-success');
    $('#labedit i').removeClass('glyphicon glyphicon-ok');
    $('#labedit i').removeClass('glyphicon glyphicon-remove');
    $('#labedit small').attr('style','display:none');
    $.ajax
    ({
      url: '/updateLab',
      type: 'get',
      data: { id:$(this).data('id') }, 
      dataType : 'json',
      success:function(response) {
        response.forEach(function(data) { 
          $('#uplab_id').val(data.lab_id);
          $('#uplab_name').val(data.lab_name);
        })
      }
    });
    return true;
  });
</script>
@endsection