@extends('AdminLayout.admin')

@if(Session::get('type') != 0)
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif

@section ('breadrootName')
<i class="fa fa-wrench" aria-hidden="true"></i><span> Utilities</span>
@endsection
@section('breadParentName')
<i class="fa fa-recycle" aria-hidden="true"></i><span> Reactivation</span>
@endsection
@section('maintenanceactive')
<a href="" class="">
@endsection
@section('reactivation','active')
@section('utilitiesactive','active')
@section('content')

<div class="col-md-12">
	<section class="panel">
		<header class="panel-heading btn-info ">
      <ul class="nav nav-tabs">
          <li class="active">
              <a data-toggle="tab" href="#labs">Laboratory</a>
          </li>
          <li class="">
              <a data-toggle="tab" href="#emptype">Employee Type</a>
          </li>
          <li class="">
              <a data-toggle="tab" href="#emp">Employee</a>
          </li>
          <li class="">
              <a data-toggle="tab" href="#servgroup">Service Group</a>
          </li>
          <li class="">
              <a data-toggle="tab" href="#servtype">Service Type</a>
          </li>
          <li class="">
              <a data-toggle="tab" href="#serv">Service</a>
          </li>
          <li class="">
              <a data-toggle="tab" href="#pack">Package</a>
          </li>
          <li class="">
              <a data-toggle="tab" href="#corp">Corporate Account</a>
          </li>
          <li class="">
              <a data-toggle="tab" href="#corppack">Corporate Account Package</a>
          </li>

      </ul>
  	</header>
  	<div class="panel-body">
  		<div class="tab-content">
        <div id="labs" class="tab-pane active">
            <table class="table table-bordered table-hover dataTable" id="labTbl">
				      <thead>
				        <tr>
				          <th>Laboratory Name</th>
				          <th>Action</th>
				        </tr>
				      </thead>
				      <tbody>
				        @foreach($lab as $labs)
				        <tr>
				        	<td>{{ $labs->lab_name }}</td>
				        	<td>
				        		<button type="button" class="btn btn-success btn-xs labbtn" data-id="{{ $labs->lab_id }}"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp; Reactivate</button>
				        	</td>
				        </tr>
				        @endforeach
				      </tbody>
				    </table>
        </div>

        <div class="tab-pane" id="emptype">
        	<table class="table table-bordered table-hover dataTable" id="emptypetbl">
			      <thead>
			        <tr>
			          <th>Employee Type Name</th>
			          <th>Action</th>
			        </tr>
			      </thead>
			      <tbody>
			        @foreach($emptype as $emptypes)
			        <tr>
			        	<td>{{ $emptypes->role_name }}</td>
			        	<td>
			        		<button type="button" class="btn btn-success btn-xs emptypebtn" data-id="{{ $emptypes->role_id }}"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp; Reactivate</button>
			        	</td>
			        </tr>
			        @endforeach
			      </tbody>
			    </table>
        </div>

        <div class="tab-pane" id="emp">
        	<table class="table table-bordered table-hover dataTable" id="emptbl">
			      <thead>
			        <tr>
			          <th>Employee Name</th>
			          <th>Action</th>
			        </tr>
			      </thead>
			      <tbody>
			        @foreach($emp as $emps)
			        <tr>
			        	<td>{{ $emps->emp_fname }} {{ $emps->emp_mname }} {{ $emps->emp_lname }}</td>
			        	<td>
			        		<button type="button" class="btn btn-success btn-xs empbtn" data-id="{{ $emps->emp_id }}"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp; Reactivate</button>
			        	</td>
			        </tr>
			        @endforeach
			      </tbody>
			    </table>
        </div>

        <div class="tab-pane" id="servgroup">
        	<table class="table table-bordered table-hover dataTable" id="servgrouptbl">
			      <thead>
			        <tr>
			          <th>Service Group Name</th>
			          <th>Action</th>
			        </tr>
			      </thead>
			      <tbody>
			        @foreach($servgroup as $servgroup)
			        <tr>
			        	<td>{{ $servgroup->servgroup_name }}</td>
			        	<td>
			        		<button type="button" class="btn btn-success btn-xs sergroupbtn" data-id="{{ $servgroup->servgroup_id }}"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp; Reactivate</button>
			        	</td>
			        </tr>
			        @endforeach
			      </tbody>
			    </table>
        </div>

        <div class="tab-pane" id="servtype">
        	<table class="table table-bordered table-hover dataTable" id="servtypetbl">
			      <thead>
			        <tr>
			          <th>Service Type Name</th>
			          <th>Action</th>
			        </tr>
			      </thead>
			      <tbody>
			        @foreach($servtype as $servtype)
			        <tr>
			        	<td>{{ $servtype->service_type_name }}</td>
			        	<td>
			        		<button type="button" class="btn btn-success btn-xs sertypebtn" data-id="{{ $servtype->service_type_id }}"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp; Reactivate</button>
			        	</td>
			        </tr>
			        @endforeach
			      </tbody>
			    </table>
        </div>

        <div class="tab-pane" id="serv">
        	<table class="table table-bordered table-hover dataTable" id="servtbl">
			      <thead>
			        <tr>
			          <th>Service Name</th>
			          <th>Action</th>
			        </tr>
			      </thead>
			      <tbody>
			        @foreach($serv as $serv)
			        <tr>
			        	<td>{{ $serv->service_name }}</td>
			        	<td>
			        		<button type="button" class="btn btn-success btn-xs serbtn" data-id="{{ $serv->service_id }}"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp; Reactivate</button>
			        	</td>
			        </tr>
			        @endforeach
			      </tbody>
			    </table>
        </div>

        <div class="tab-pane" id="pack">
        	<table class="table table-bordered table-hover dataTable" id="packtbl">
			      <thead>
			        <tr>
			          <th>Package Name</th>
			          <th>Action</th>
			        </tr>
			      </thead>
			      <tbody>
			        @foreach($pack as $pack)
			        <tr>
			        	<td>{{ $pack->pack_name }}</td>
			        	<td>
			        		<button type="button" class="btn btn-success btn-xs packbtn" data-id="{{ $pack->pack_id }}"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp; Reactivate</button>
			        	</td>
			        </tr>
			        @endforeach
			      </tbody>
			    </table>
        </div>

        <div class="tab-pane" id="corp">
        	<table class="table table-bordered table-hover dataTable" id="corptbl">
			      <thead>
			        <tr>
			          <th>Corporate Account</th>
			          <th>Action</th>
			        </tr>
			      </thead>
			      <tbody>
			        @foreach($corp as $corp)
			        <tr>
			        	<td>{{ $corp->corp_name }}</td>
			        	<td>
			        		<button type="button" class="btn btn-success btn-xs corpbtn" data-id="{{ $corp->corp_id }}"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp; Reactivate</button>
			        	</td>
			        </tr>
			        @endforeach
			      </tbody>
			    </table>
        </div>

        <div class="tab-pane" id="corppack">
        	<table class="table table-bordered table-hover dataTable" id="corppacktbl">
			      <thead>
			        <tr>
			          <th>Corporate Package Name</th>
			          <th>Corporate Account Name</th>
			          <th>Action</th>
			        </tr>
			      </thead>
			      <tbody>
			        @foreach($corppack as $corppack)
			        <tr>
			        	<td>{{ $corppack->corpPack_name }}</td>
			        	<td>{{ $corppack->corp_name }}</td>
			        	<td>
			        		<button type="button" class="btn btn-success btn-xs corppackbtn" data-id="{{ $corppack->corp_id }}"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp; Reactivate</button>
			        	</td>
			        </tr>
			        @endforeach
			      </tbody>
			    </table>
        </div>
    	</div>
  	</div>
	</section>
</div>

<div class="modal fade" id = "labmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-success">
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Reactivate Record</h4>
      </div>
      <form method="post" action="/activateLab" id="activateLab">
      {{ csrf_field()  }}
        <div class="modal-body">
          <h4></h4>
          <input type="text" class="hidden" name="id" id="labid" value="">
          Are you sure you want to restore this record?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-xs btn-success" type="submit"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp;Activate</button>
        </div>
      </form>
    </div>  
  </div>
</div>

<div class="modal fade" id = "emptypemodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-success">
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Reactivate Record</h4>
      </div>
      <form method="post" action="/activateEmpType" id="activateEmpType">
      {{ csrf_field()  }}
        <div class="modal-body">
          <h4></h4>
          <input type="text" class="hidden" name="id" id="emptypeid" value="">
          Are you sure you want to restore this record?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-xs btn-success" type="submit"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp;Activate</button>
        </div>
      </form>
    </div>  
  </div>
</div>

<div class="modal fade" id = "empmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-success">
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Reactivate Record</h4>
      </div>
      <form method="post" action="/activateEmp" id="activateEmp">
      {{ csrf_field()  }}
        <div class="modal-body">
          <h4></h4>
          <input type="text" class="hidden" name="id" id="empid" value="">
          Are you sure you want to restore this record?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-xs btn-success" type="submit"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp;Activate</button>
        </div>
      </form>
    </div>  
  </div>
</div>

<div class="modal fade" id = "servgroupmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-success">
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Reactivate Record</h4>
      </div>
      <form method="post" action="/activateServGroup" id="activateServGroup">
      {{ csrf_field()  }}
        <div class="modal-body">
          <h4></h4>
          <input type="text" class="hidden" name="id" id="servgroupid" value="">
          Are you sure you want to restore this record?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-xs btn-success" type="submit"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp;Activate</button>
        </div>
      </form>
    </div>  
  </div>
</div>

<div class="modal fade" id = "servtypemodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-success">
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Reactivate Record</h4>
      </div>
      <form method="post" action="/activateServtype" id="activateServtype">
      {{ csrf_field()  }}
        <div class="modal-body">
          <h4></h4>
          <input type="text" class="hidden" name="id" id="servtypeid" value="">
          Are you sure you want to restore this record?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-xs btn-success" type="submit"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp;Activate</button>
        </div>
      </form>
    </div>  
  </div>
</div>

<div class="modal fade" id = "servmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-success">
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Reactivate Record</h4>
      </div>
      <form method="post" action="/activateServ" id="activateServ">
      {{ csrf_field()  }}
        <div class="modal-body">
          <h4></h4>
          <input type="text" class="hidden" name="id" id="servid" value="">
          Are you sure you want to restore this record?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-xs btn-success" type="submit"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp;Activate</button>
        </div>
      </form>
    </div>  
  </div>
</div>

<div class="modal fade" id = "packmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-success">
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Reactivate Record</h4>
      </div>
      <form method="post" action="/activatePack" id="activatePack">
      {{ csrf_field()  }}
        <div class="modal-body">
          <h4></h4>
          <input type="text" class="hidden" name="id" id="packid" value="">
          Are you sure you want to restore this record?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-xs btn-success" type="submit"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp;Activate</button>
        </div>
      </form>
    </div>  
  </div>
</div>

<div class="modal fade" id = "corpmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-success">
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Reactivate Record</h4>
      </div>
      <form method="post" action="/activatecorp" id="activatecorp">
      {{ csrf_field()  }}
        <div class="modal-body">
          <h4></h4>
          <input type="text" class="hidden" name="id" id="corpid" value="">
          Are you sure you want to restore this record?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-xs btn-success" type="submit"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp;Activate</button>
        </div>
      </form>
    </div>  
  </div>
</div>

<div class="modal fade" id = "corppackmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-success">
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Reactivate Record</h4>
      </div>
      <form method="post" action="/activatecorppack" id="activatecorppack">
      {{ csrf_field()  }}
        <div class="modal-body">
          <h4></h4>
          <input type="text" class="hidden" name="id" id="corppackid" value="">
          Are you sure you want to restore this record?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-xs btn-success" type="submit"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp;Activate</button>
        </div>
      </form>
    </div>  
  </div>
</div>
@endsection
@section('additional')
<script type="text/javascript">
	$(document).ready(function(){
		$('.labbtn').click(function(){
			var id = $(this).data('id');
			$('#labid').val(id);
			$('#labmodal').modal('show');
		});
		$('.emptypebtn').click(function(){
			var id = $(this).data('id');
			$('#emptypeid').val(id);
			$('#emptypemodal').modal('show');
		});
		$('.empbtn').click(function(){
			var id = $(this).data('id');
			$('#empid').val(id);
			$('#empmodal').modal('show');
		});
		$('.sergroupbtn').click(function(){
			var id = $(this).data('id');
			$('#servgroupid').val(id);
			$('#servgroupmodal').modal('show');
		});
		$('.sertypebtn').click(function(){
			var id = $(this).data('id');
			$('#servtypeid').val(id);
			$('#servtypemodal').modal('show');
		});
		$('.serbtn').click(function(){
			var id = $(this).data('id');
			$('#servid').val(id);
			$('#servmodal').modal('show');
		});
		$('.packbtn').click(function(){
			var id = $(this).data('id');
			$('#packid').val(id);
			$('#packmodal').modal('show');
		});
		$('.corpbtn').click(function(){
			var id = $(this).data('id');
			$('#corpid').val(id);
			$('#corpmodal').modal('show');

		});
		$('.corppackbtn').click(function(){
			var id = $(this).data('id');
			$('#corppackid').val(id);
			$('#corppackmodal').modal('show');
		});
  	$('#labTbl').dataTable({
	    'paging'      : true,
	    'lengthChange': true,
	    'searching'   : true,
	    'ordering'    : true,
	    'info'        : true,
	    'autoWidth'   : true,
  	});
  	$('#emptypetbl').dataTable({
	    'paging'      : true,
	    'lengthChange': true,
	    'searching'   : true,
	    'ordering'    : true,
	    'info'        : true,
	    'autoWidth'   : true,
	  });
	  $('#emptbl').dataTable({
	    'paging'      : true,
	    'lengthChange': true,
	    'searching'   : true,
	    'ordering'    : true,
	    'info'        : true,
	    'autoWidth'   : true,
	  });
	  $('#servgrouptbl').dataTable({
	    'paging'      : true,
	    'lengthChange': true,
	    'searching'   : true,
	    'ordering'    : true,
	    'info'        : true,
	    'autoWidth'   : true,
	  });
	  $('#servtypetbl').dataTable({
	    'paging'      : true,
	    'lengthChange': true,
	    'searching'   : true,
	    'ordering'    : true,
	    'info'        : true,
	    'autoWidth'   : true,
	  });
	  $('#servtbl').dataTable({
	    'paging'      : true,
	    'lengthChange': true,
	    'searching'   : true,
	    'ordering'    : true,
	    'info'        : true,
	    'autoWidth'   : true,
	  });
	  $('#packtbl').dataTable({
	    'paging'      : true,
	    'lengthChange': true,
	    'searching'   : true,
	    'ordering'    : true,
	    'info'        : true,
	    'autoWidth'   : true,
	  });
	  $('#corptbl').dataTable({
	    'paging'      : true,
	    'lengthChange': true,
	    'searching'   : true,
	    'ordering'    : true,
	    'info'        : true,
	    'autoWidth'   : true,
	  });
	  $('#corppacktbl').dataTable({
	    'paging'      : true,
	    'lengthChange': true,
	    'searching'   : true,
	    'ordering'    : true,
	    'info'        : true,
	    'autoWidth'   : true,
	  });
  });
</script>



@endsection
