@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-cogs" aria-hidden="true"></i><span> Maintenance</span>
@endsection

@section ('breadParentName')
<i class="fa fa-dropbox" aria-hidden="true"></i><span> Package</span>
@endsection

@section('maintenanceactive')
<a href="" class="active">
@endsection
@section('packactive','active')

@section ('breadactivePage','Create Package')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<strong>Package</strong>
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<div class="btn-group pull-right">
					
					<a class="btn btn-info" style="margin-left: -20%" href="#addModal" data-toggle="modal" id="addEmpBtn" ><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; New </a>
					</div>
					<table class="table table-bordered table-hover dataTable" id="empTable">
						<thead>
							<tr>
								<th>Package Name</th>
								<th>Price</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($packages as $packages)
								<tr>
									<td>{{ $packages->pack_name }}</td>
									<td>{{ $packages->pack_price }}</td>
									<td>
									<a class="btn btn-warning btn-xs  updateModal" href="#updateModal" data-toggle="modal" data-id="{{$packages->pack_id}}"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
									<a class="btn btn-info btn-xs  viewModal" href="#viewModal" data-toggle="modal" data-id="{{$packages->pack_id}}"><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp; View</a>
									<a class="btn btn-danger btn-xs delbtn" data-id="{{$packages->pack_id}}"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
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
        <form action="/update_package" method="POST" class="form-horizontal" id="packageedit">
        <input type="hidden" name="packid" id="packid">
        <div class="form-group" style="margin-right:3% ">
          <label class="col-xs-4 control-label">Pakage Name</label>  
              <div class="col-md-6">
                <div class="input-group">
                  <div class="input-group-addon">
                   <i class="fa fa-dropbox"></i>
                </div>
                <input  name="packagename" type="text" id="packname" placeholder="Package Name" class="form-control input-md" required>
              </div>
          </div>  
        </div> 

        <div class="form-group">
          <label class="col-xs-4 control-label">Services Offered</label>
          <div class="col-md-5 input-group">
            <select class="form-control select2 updatepackservice" name="services[]" values="" style="width: 108%" multiple="multiple" required>
            
              @foreach($servicegroup as $s)
              <optgroup label="{{ $s->servgroup_name }}">
                  @foreach($serviceoffer as $serviceoffer2)
                    @if($s->servgroup_id == $serviceoffer2->service_group_id)
                    <option value="{{ $serviceoffer2->service_id }}">{{ $serviceoffer2->service_name }}</option>
                    @endif
                  @endforeach              
                </optgroup>
              @endforeach
              <optgroup label="Others">
              @foreach($serviceoffer as $upnogrp)
                @if($upnogrp->servgroup_id == null)
                  <option value="{{ $upnogrp->service_id }}">{{ $upnogrp->service_name }}</option>
                  @endif
              @endforeach
              </optgroup>
            </select> 
          </div>
        </div>
        <div class="form-group" style="margin-right:3% ">
          <label class="col-xs-4 control-label">Pakage Price</label>  
            <div class="col-md-6">
              <div class="input-group">
                <div class="input-group-addon">
                   <i class="fa fa-rub"></i>
                 </div>
                <input  name="packageprice" type="text" id="packprice" placeholder="Price" class="form-control input-md" required>
             </div>
          </div>  
       </div> 
       <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-xs btn-warning" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Update</button>
        </div>
        {{ csrf_field() }}
      </form>
    </div>  
  </div>
</div>
</div>

<div class="modal fade" id = "viewModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-info">
        
        <h4 class="modal-title"><i class="fa fa-info-circle" aria-hidden="true"></i> View Record</h4>
      </div>
      <form action="#" method="POST">
        <div class="modal-body" id="serviceView">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>  
  </div>
</div>


<div class="modal fade" id = "addModal">
  <div class="modal-dialog" style="width: 70%">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <h4 class="modal-title"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Package</h4>
      </div>
      <div class="modal-body">
        <form action="/save_package" method="POST" class="form-horizontal" id="packageadd">
        <div class="form-group" style="margin-right:3% ">
          <label class="col-xs-4 control-label">Pakage Name</label>  
              <div class="col-md-6">
                <div class="input-group">
                  <div class="input-group-addon">
                   <i class="fa fa-dropbox"></i>
                </div>
                <input  name="packagename" id="packagename" type="text" id="example-text-input" placeholder="Package Name" class="form-control input-md" required>
              </div>
          </div>  
        </div> 

        <div class="form-group">
          <label class="col-xs-4 control-label">Services Offered</label>
          <div class="col-md-5 input-group">
            <select class="form-control select2 packservice" name="services[]" values="" style="width: 108%" multiple="multiple" required>
            @php $serviceoffer2 = $serviceoffer @endphp
              @foreach($servicegroup as $s)
              <optgroup label="{{ $s->servgroup_name }}">
                  @foreach($serviceoffer as $serviceoffer2)
                    @if($s->servgroup_id == $serviceoffer2->service_group_id)
                    <option value="{{ $serviceoffer2->service_id }}">{{ $serviceoffer2->service_name }}</option>
                    @endif
                  @endforeach              
                </optgroup>
              @endforeach
              <optgroup label="Others">
              @foreach($serviceoffer as $nogrp)
                @if($nogrp->servgroup_id == null)
                  <option value="{{ $nogrp->service_id }}">{{ $nogrp->service_name }}</option>
                  @endif
              @endforeach
              </optgroup>
            </select> 
          </div>
        </div>
        <div class="form-group" style="margin-right:3% ">
          <label class="col-xs-4 control-label">Pakage Price</label>  
            <div class="col-md-6">
              <div class="input-group">
                <div class="input-group-addon">
                   <i class="fa fa-rub"></i>
                 </div>
                <input  name="packageprice" type="text" id="example-number-input" placeholder="Price" class="form-control input-md" required>
             </div>
          </div>  
       </div> 
       <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-xs btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>
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
      <form method="post" action="/deletePackage" id="delform">
      {{ csrf_field() }}
        <div class="modal-body">
          <h4></h4>
          <input type="text" class="hidden" name="id" id="pid" value="">
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
	$('#empTable').DataTable({
  'paging'      : true,
  'lengthChange': true,
  'searching'   : true,
  'ordering'    : true,
  'info'        : true,
  'autoWidth'   : true
  
});

$('.select2').select2();
$('.packservice').select2({
  placeholder: 'Services offered'
});
 $('.delbtn').click(function(){
    $('#pid').val($(this).data('id'));
    $('#deleteModal').modal('show');
  });


  $('.updateModal').click(function(){
    $.ajax
    ({
      url: '/updatePackage',
      type: 'get',
      data:  { id:$(this).data('id')},
      dataType : 'json',

      success:function(response){
        response[0].forEach(function(data){
          $('#packid').val(data.pack_id);
          $('#packname').val(data.pack_name);
          $('#packprice').val(data.pack_price);
        })
        var selectedValues = new Array();
        var i = 0;
        response[1].forEach(function(data){
          selectedValues[i] = data.pack_serv_serv_id;
          i++;
        })
        $('.updatepackservice').val(selectedValues).trigger('change');
      }
    });
    return true;
  });
  $('.viewModal').click(function(){
    $('#serviceView').empty();
    var ctr = 1;
    $.ajax
    ({
      url: '/viewServiceinPackage',
      type: 'get',
      data:{id:$(this).data('id')},
      dataType: 'json',
      success:function(response){
        response.forEach(function(data){
          $('#serviceView').append('<center>Service '+ctr+ ':  ' +data.service_name+'</center><br>');
          ctr++;
        })
      }
    });
    return true;
  });
</script>
@endsection