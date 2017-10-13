@extends('AdminLayout.admin')

@if((Session::get('addservtype')!=1)&&(Session::get('upservtype')!=1)&&(Session::get('delservtype')!=1))
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif

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
@section('servicetypeactive','active')

@section ('breadactivePage','Service Type')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<strong>Service Type</strong>
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<div class="btn-group pull-right">
            @if(Session::get('addservtype')==1)
						<a class="btn btn-info" style="margin-left: -40%" href="#addModal" data-toggle="modal" id="newbtn"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; New </a>
            @endif
					</div>
					<table class="table table-bordered table-hover dataTable" id="servtypetbl">
            <thead>
              <tr>
                <th>Service Type</th>
                <th>Service Group</th>
                <th>Action</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($serviceType as $serviceType)
              <tr>
                <td>{{ $serviceType->service_type_name }}</td>
                <td>{{ $serviceType->servgroup_name }}</td>
                <td>
                @if($serviceType->LabStatus == 1 and $serviceType->ServTypeStatus == 1 and $serviceType->ServGroupStatus == 1)
                  @if(Session::get('upservtype')==1)
                  <a class="btn btn-warning btn-xs upservtype" href="#updateModal"  data-toggle="modal" data-id="{{ $serviceType->service_type_id }}"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
                  @endif
                  @if(Session::get('delservtype')==1)
                  <a class="btn btn-danger btn-xs delbtn" data-id="{{ $serviceType->service_type_id }}"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
                  @endif
                </td>
                @else
                @if(Session::get('upservtype')==1)
                  <a class="btn btn-warning btn-xs disabled" ><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
                  @endif
                  @if(Session::get('delservtype')==1)
                  <a class="btn btn-danger btn-xs disabled"  ><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
                  @endif
                @endif
                <td>
                  @if($serviceType->LabStatus == 1 and $serviceType->ServTypeStatus == 1 and $serviceType->ServGroupStatus == 1)
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
        <form action="/update_servType" method="POST" class="form-horizontal servtypeedit" id="servtypeedit">
          <div class="form-group">
              <div class="col-md-10 col-md-offset-1">
                 <div class="input-group">
                  <div class="input-group-addon">
                   Service Type <sup>*</sup>
                 </div>
                 <input name="upservTypeId" type="hidden" id="upservTypeId">
                <input  name="upservTypeName"  id="upservTypeName" type="text" placeholder="Service Type Name" class="form-control input-md" required>
              </div>
            </div>  
         </div> 
        {{ @csrf_field() }}
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-xs btn-warning"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Update</button>
        </div>
        </form>
      </div> 
    </div>  
  </div>
</div>


<div class="modal fade" id = "addModal">
  <div class="modal-dialog" style="width: 50%">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <h4 class="modal-title"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Service Type</h4>
      </div>
      <div class="modal-body">
        <form action="/save_servType" method="POST" class="form-horizontal" id="servtypeadd">
          <div class="form-group" style="margin-right:5% ">
            <div class="col-md-10 col-md-offset-1">
              <div class="input-group">
                <span class="input-group-addon">Service Group <sup>*</sup></span>
                <select class="form-control select2" name="servGroup_id" id="emp_type" style="width: 105%;">
                @foreach($serviceGroup as $serviceGroup)
                  <option value="{{ $serviceGroup->servgroup_id }}">{{ $serviceGroup->servgroup_name }}</option>
                @endforeach
                </select>
             </div>
            </div>
          </div>

          <div class="form-group" style="margin-right:2% ">
              <div class="col-md-10 col-md-offset-1">
                <div class="input-group">
                  <div class="input-group-addon">
                   Service Type Name <sup>*</sup>
                </div>
                <input  name="servTypeName" id="servTypeName" type="text" placeholder="Service Type Name" class="form-control input-md" required>
              </div>
          </div>  
        </div>
          
        {{ @csrf_field() }}
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-xs btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>
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
      <form method="post" action="/deleteServiceType" id="delform">
      {{ csrf_field()  }}
        <div class="modal-body">
          <h4></h4>
          <input type="text" class="hidden" name="id" id="stid" value="">
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
      $('#servtypeadd').bootstrapValidator('resetForm',true);
      $('#servtypeadd div').removeClass('has-error');
      $('#servtypeadd div').removeClass('has-success');
      $('#servtypeadd i').removeClass('glyphicon glyphicon-ok');
      $('#servtypeadd i').removeClass('glyphicon glyphicon-remove');
      $('#servtypeadd small').attr('style','display:none');
    });
  $(document).ready(function()
  {
    $('#servtypetbl').dataTable({
    'paging'      : true,
    'lengthChange': true,
    'searching'   : true,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : true
  });
  })
  $('.delbtn').click(function(){
    $('#stid').val($(this).data('id'));
    $('#deleteModal').modal('show');
  });
  $('.upservtype').click(function(){
    $('#servtypeedit').bootstrapValidator('resetForm',true);
      $('#servtypeedit div').removeClass('has-error');
      $('#servtypeedit div').removeClass('has-success');
      $('#servtypeedit i').removeClass('glyphicon glyphicon-ok');
      $('#servtypeedit i').removeClass('glyphicon glyphicon-remove');
      $('#servtypeedit small').attr('style','display:none');
    $.ajax
    ({
      url: '/updateServType',
      type: 'get',
      data: { id:$(this).data('id') }, 
      dataType : 'json',
      success:function(response) {
        response.forEach(function(data) { 
          $('#upservTypeId').val(data.service_type_id);
          $('#upservTypeName').val(data.service_type_name);
        })
      }
    });
    return true;
  });
</script>
@endsection