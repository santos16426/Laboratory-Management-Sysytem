@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-cogs" aria-hidden="true"></i><span> Maintenance</span>
@endsection

@section ('breadParentName')
<i class="fa fa-heartbeat" aria-hidden="true"></i><span> Service</span>
@endsection

@section('maintenanceactive')
<a href="" class="active">
@endsection
@section('service','active')
@section('servicegroupactive','active')

@section ('breadactivePage','Service Group')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Service Group
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<div class="btn-group pull-right">
						<a class="btn btn-info" style="margin-left: -20%" href="#addModal" data-toggle="modal" ><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; New </a>
					</div>
					<table class="table table-bordered table-hover dataTable" id="servGroup">
				      <thead>
				        <tr>
				          <th>Service Group</th>
                  <th>Laboratory Name</th>
				          <th>Action</th>
                  <th>Status</th>
				        </tr>
				      </thead>
				      <tbody>
				        @foreach($serviceGroups as $serviceGroups)
				        <tr>
				          <td>{{ $serviceGroups->servgroup_name }}</td>
                  <td>{{ $serviceGroups->lab_name }}</td>
				          <td>
                  @if($serviceGroups->ServGroupStatus == 1 and $serviceGroups->LabStatus == 1)
				            <a class="btn btn-warning btn-xs servgroupupbtn" href="#updateModal" data-toggle="modal" data-id="{{ $serviceGroups->servgroup_id }}"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
				            <a class="btn btn-danger btn-xs delbtn" data-id="{{ $serviceGroups->servgroup_id }}" ><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
                  @endif
                  @if($serviceGroups->ServGroupStatus == 0 or $serviceGroups->LabStatus == 0)
                    <a class="btn btn-warning btn-xs" disabled><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
                    <a class="btn btn-danger btn-xs" disabled><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
                  @endif
				          </td>
                  <td>
                  @if($serviceGroups->ServGroupStatus == 1 and $serviceGroups->LabStatus == 1)
                    <span class="badge bg-success">Available</span>
                  @endif
                  @if($serviceGroups->ServGroupStatus == 0 or $serviceGroups->LabStatus == 0)
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
        <form action="/update_servGroup" method="POST" class="form-horizontal" id="servgrpedit">
          <div class="form-group">
                <div class="col-md-10 col-md-offset-1">
                   <div class="input-group">
                    <div class="input-group-addon">
                     Service Group <sup style="color:red">*</sup>
                   </div>
                   <input name="upservice_id" type="hidden" id="upservice_id">
                  <input  name="upservicegroup" type="text" id="upservicegroup" placeholder="Service Group Name" class="form-control input-md" required>
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
        <h4 class="modal-title"><i class="fa fa-plus" aria-hidden="true"></i> Add Service Group</h4>
      </div>
      <div class="modal-body">
        <form action="/save_servGroup" method="POST" class="form-horizontal" id="servgrpadd">

          <div class="form-group" >
            <div class="col-sm-10 col-md-offset-1">
              <div class="input-group">
                <div class="input-group-addon">
                  Laboratory Name <sup style="color: red">*</sup>
                </div>
                <select class="form-control select2" name="lab_id" id="dropLABID" style="width: 100%">
                  @foreach($labs as $gd) 
                  <option value="{{$gd->lab_id}}">{{$gd->lab_name}}</option>
                  @endforeach
                </select>
              </div>
            </div>  
          </div> 

          <div class="form-group" >
             <div class="col-md-10 col-md-offset-1">
                   <div class="input-group">
                    <div class="input-group-addon">
                     Service Group <sup style="color: red">*</sup>
                   </div>
                  <input  name="servicegroup" id="servicegroup" type="text" placeholder="Service Group Name" class="form-control input-md" required>
               </div>
            </div>  
         </div>
         
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-xs btn-success" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>
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
      <form method="post" action="/deleteServiceGroup" id="delform">
      {{ csrf_field()  }}
        <div class="modal-body">
          <h4></h4>
          <input type="text" class="hidden" name="id" id="sgid" value="">
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
  $('#dropLABID').select2();
	$('#servGroup').DataTable({
		'paging'      : true,
		'lengthChange': true,
		'searching'   : true,
		'ordering'    : true,
		'info'        : true,
		'autoWidth'   : true
	});
	$('.delbtn').click(function(){
    $('#sgid').val($(this).data('id'));
    $('#deleteModal').modal('show');
	});
	$('.servgroupupbtn').click(function(){
    $.ajax
    ({
      url: '/updateServGroup',
      type: 'get',
      data: { id:$(this).data('id') }, 
      dataType : 'json',
      success:function(response) {
        response.forEach(function(data) { 
          $('#upservice_id').val(data.servgroup_id);
          $('#upservicegroup').val(data.servgroup_name);
        })
      }
    });
    return true;
  });
</script>
@endsection