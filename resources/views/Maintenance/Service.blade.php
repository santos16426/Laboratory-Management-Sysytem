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
@section('serviceactive','active')

@section ('breadactivePage','Service List')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<strong>Service List</strong>
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<div class="btn-group pull-right">
						<a class="btn btn-info" style="margin-left: -20%" href="#addModal" data-toggle="modal" ><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; New </a>
					</div>
					<table class="table table-bordered table-hover dataTable" id="servicesTbl">
				      	<thead>
							<tr>
								<th>Service Name</th>
								<th>Service Group</th>
								<th>Service Type</th>
								<th>Medical Request</th>
								<th>Price</th>
								<th>Action</th>
                <th>Status</th>
							</tr>
				      	</thead>
						<tbody>
							@foreach($service as $service)
								<tr>
									<td>{{ $service->service_name }}</td>
									<td>{{ $service->servgroup_name }}</td>
									<td>{{ $service->service_type_name }}</td>
									<td>{{ $service->medical_request }}</td>
									<td>{{ $service->service_price }}</td>
									<td>
                  @if($service->LabStatus == 1 and $service->ServGroupStatus == 1 and $service->ServTypeStatus == 1 and $service->ServiceStatus == 1 or $service->LabStatus == null and $service->ServGroupStatus == null and $service->ServTypeStatus == null and $service->ServiceStatus == 1 or $service->LabStatus == 1 and $service->ServGroupStatus == 1 and $service->ServTypeStatus === null and $service->ServiceStatus == 1)
									<a class="btn btn-warning btn-xs editsrvc" href="#updateModal" data-id="{{ $service->service_id }}" data-toggle="modal"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
									<a class="btn btn-danger btn-xs delbtn"  data-id="{{$service->service_id}}"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
                  @else
                  <a class="btn btn-warning btn-xs disabled" ><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
                  <a class="btn btn-danger btn-xs disabled"  ><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
                  @endif
									</td>
                  <td>
                    @if($service->LabStatus == 1 and $service->ServGroupStatus == 1 and $service->ServTypeStatus == 1 and $service->ServiceStatus == 1 or $service->LabStatus == null and $service->ServGroupStatus == null and $service->ServTypeStatus == null and $service->ServiceStatus == 1 or $service->LabStatus == 1 and $service->ServGroupStatus == 1 and $service->ServTypeStatus === null and $service->ServiceStatus == 1)
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
        <h4 class="modal-title"><i class="fa fa-user-plus" aria-hidden="true"></i> Update Service</h4>
      </div>
      <div class="modal-body">
        <form action="/update_Service" method="POST" class="form-horizontal" id="servedit" >
        <input type="hidden" name="srvcid" id="srvcid">
         {{ csrf_field() }}
          <div class="form-group">
              <div class="col-sm-10 col-md-offset-1">
                 <div class="input-group">
                  <div class="input-group-addon">
                  Service Name <sup>*</sup>
                 </div>
                <input  name="srvcname" id="srvcname" type="text" placeholder="Service Name" class="form-control input-md" required>
              </div>
            </div>  
         </div>
         <div class="form-group">
            <div class="col-sm-10 col-md-offset-1">
              <div class="input-group">
                <div class="input-group-addon">
                  Service Group <sup>*</sup>
                </div>
                  <select class="form-control srvcgrp" name="srvcgrp_id" id="srvcgrpid" disabled="">
                    <option value = "0">Service Group(Optional)</option> <!-- dito ididisplay lahat ng service group -->
                    @foreach($groupdropdown as $gd) 
                    <option value="{{$gd->servgroup_id}}">{{$gd->servgroup_name}}</option>
                    @endforeach
                  </select>
            </div>
          </div>  
        </div> 
         <div class="form-group">
            <div class="col-sm-10 col-md-offset-1">
              <div class="input-group">
                <div class="input-group-addon">
                  Service Type <sup>*</sup>
                </div>
                  <select class="form-control" id="typesel" name="srvctyp_id" disabled=""> <!-- dito magaad ng service type everytime na mag onchange ung sa group -->
                    <option value = "0">Service Type(Optional)</option>
                  </select>
            </div>
          </div>  
        </div> 
         <div class="form-group">
            <div class="col-sm-10 col-md-offset-1">
              <div class="input-group">
                <div class="input-group-addon">
                  Service Price <sup>*</sup>
                </div>
              <input  name="srvc_price" id="srvcprice" type="text" placeholder="Service Price" class="form-control input-md" required>
            </div>
          </div>  
        </div> 
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button class="btn btn-xs btn-success" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Update</button>
        </div>

        </form>
      </div>
    </div>  
  </div>
</div>
<div class="modal fade" id = "addModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <h4 class="modal-title"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Service</h4>
      </div>
      <div class="modal-body">
        <form action="/save_Service" method="POST" class="form-horizontal" id="servadd">
         {{ csrf_field() }}
          <div class="form-group" >
              <div class="col-sm-10 col-md-offset-1">
                 <div class="input-group">
                  <div class="input-group-addon">
                  Service Name <sup>*</sup>
                 </div>
                <input  name="srvcname" id="srvcname" type="text" placeholder="Service Name" class="form-control input-md" required>
              </div>
            </div>  
         </div>
         <div class="form-group" >
            <div class="col-sm-10 col-md-offset-1">
              <div class="input-group">
                <div class="input-group-addon">
                  Service Group <sup>*</sup>
                </div>
                  <select class="form-control srvcgrp" name="srvcgrp_id" id="servg" style="width: 100%">
                    <option value = "0">Service Group(Optional)</option> <!-- dito ididisplay lahat ng service group -->
                    @foreach($groupdropdown as $gd) 
                    <option value="{{$gd->servgroup_id}}">{{$gd->servgroup_name}}</option>
                    @endforeach
                  </select>
            </div>
          </div>  
        </div> 
         <div class="form-group" >
            <div class="col-sm-10 col-md-offset-1">
              <div class="input-group">
                <div class="input-group-addon">
                  Service Type <sup>*</sup>
                </div>
                  <select class="form-control"  name="srvctyp_id" id="servt" style="width: 100%"> <!-- dito magaad ng service type everytime na mag onchange ung sa group -->
                    <option value = "0">Service Type(Optional)</option>
                  </select>
            </div>
          </div>  
        </div> 
         <div class="form-group" >
            <div class="col-sm-10 col-md-offset-1">
              <div class="input-group">
                <div class="input-group-addon">
                  Service Price <sup>*</sup>
                </div>
              <input  name="srvc_price" type="text" placeholder="Service Price" class="form-control input-md" required>
            </div>
          </div>  
        </div> 
      <div class="form-group" style="margin-left:33% ">
       <div class="col-md-12">
          <div class="form-group">
              <div class="checkbox">
                <label><input type="checkbox" name="med_req" value="Yes">Check if this service needs a medical <br> request upon transaction.</label>
            </div>
          </div>
        </div>  
        </div>   

        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button class="btn btn-xs btn-success" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>
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
      <form method="post" action="/deleteService" id="delform">
      {{ csrf_field()  }}
        <div class="modal-body">
          <h4></h4>
          <input type="text" class="hidden" name="id" id="sid" value="">
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
  function fnFormatDetails ( oTable, nTr )
      {
          servicename = [];
          names = "";
          aData = oTable.fnGetData( nTr );
          sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
          sOut += '<tr><td>Package Name: '+ aData[1]+ '</td></tr>'
          sOut += '<tr><td>Package Price: '+ aData[2]+ '</td></tr>'
          sOut += '<tr><td>Services under this package :</td></tr>';
        
          sOut += '<tr><td></td></tr>';
          sOut += '</table>';

          return sOut;
      }

      $(document).ready(function() {
          /*
           * Insert a 'details' column to the table
           */
          var nCloneTh = document.createElement( 'th' );
          var nCloneTd = document.createElement( 'td' );
          nCloneTd.innerHTML = '<img src="/plugins/assets/advanced-datatable/examples/examples_support/details_open.png">';
          nCloneTd.className = "center";

          $('#servicesTbl thead tr').each( function () {
              this.insertBefore( nCloneTh, this.childNodes[0] );
          } );

          $('#servicesTbl tbody tr').each( function () {
              this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
          } );

          /*
           * Initialse DataTables, with no sorting on the 'details' column
           */
          var oTable = $('#servicesTbl').dataTable( {
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
              "aoColumnDefs": [
                  { "bSortable": false, "aTargets": [ 0 ] }
              ],
              "aaSorting": [[1, 'asc']]
          });

          /* Add event listener for opening and closing details
           * Note that the indicator for showing which row is open is not controlled by DataTables,
           * rather it is done here
           */
          $('#servicesTbl tbody td img').live('click', function () {
              var nTr = $(this).parents('tr')[0];
              if ( oTable.fnIsOpen(nTr) )
              {
                  /* This row is already open - close it */
                  this.src = "/plugins/assets/advanced-datatable/examples/examples_support/details_open.png";
                  oTable.fnClose( nTr );
              }
              else
              {
                  /* Open this row */
                  this.src = "/plugins/assets/advanced-datatable/examples/examples_support/details_close.png";
                  oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
              }
          } );
      } );
</script>
<script>
$(function () {



  $('#servg').select2();
  $('#servt').select2();


    $('.srvcgrp').on('change',function(){ // onchange function ng service group dropdown
      var optionSrvc = ""; 
      $.ajax
      ({
        url: '/getServiceType', //eto ung route para makuha ung mga service type na may parehong service type id
        type: 'get',
        data: {ID:$(this).val()}, // value ng selected sa dropdown ng service group
        dataType : 'json',
        success:function(response) { //eto ung response na galing sa controller na kinquery
          response.forEach(function(data) { 
            optionSrvc += '<option value="'+data.service_type_id+'">'+data.service_type_name+'</option>'; // then inistore sa isang variable 
          })
          $('#typesel').empty(); // inempty ung dropdown ng service type
          $('#typesel').append('<option value = "0">Service Type(Optional)</option>'); // default value
          $('#typesel').append(optionSrvc);  //inappend sa service type dropdown ung laman ng optionsrvc        
        }
      });
    });

    $('#servg').on('change',function(){ // onchange function ng service group dropdown
      var optionSrvc = ""; 
      $.ajax
      ({
        url: '/getServiceType', //eto ung route para makuha ung mga service type na may parehong service type id
        type: 'get',
        data: {ID:$(this).val()}, // value ng selected sa dropdown ng service group
        dataType : 'json',
        success:function(response) { //eto ung response na galing sa controller na kinquery
          response.forEach(function(data) { 
            optionSrvc += '<option value="'+data.service_type_id+'">'+data.service_type_name+'</option>'; // then inistore sa isang variable 
          })
          $('#servt').empty(); // inempty ung dropdown ng service type
          $('#servt').append('<option value = "0">Service Type(Optional)</option>'); // default value
          $('#servt').append(optionSrvc);  //inappend sa service type dropdown ung laman ng optionsrvc        
        }
      });
    });
    
});

</script>
<script type="text/javascript">
$('.delbtn').click(function(){
    $('#sid').val($(this).data('id'));
    $('#deleteModal').modal('show');
  });
$('.editsrvc').on('click',function(){
  
      $.ajax
      ({
        url: '/getService', //eto ung route para makuha ung mga service type na may parehong service type id
        type: 'get',
        data: {ID:$(this).data('id')}, // value ng selected sa dropdown ng service group
        dataType : 'json',
        success:function(response) { //eto ung response na galing sa controller na kinquery
          response.forEach(function(data) {
            $('#srvcid').val(data.service_id);
            $('#srvcname').val(data.service_name);
            $('#srvcprice').val(data.service_price);
            $('#srvcgrpid').val(data.service_group_id);
            $('#typesel').val(data.service_type_id);

          })      
        }
      });
    });
  $('#servicesTbl').on("click",".editsrvc",function(){
  $('.editsrvc').on('click',function(){
 
      $.ajax
      ({
        url: '/getService', //eto ung route para makuha ung mga service type na may parehong service type id
        type: 'get',
        data: {ID:$(this).data('id')}, // value ng selected sa dropdown ng service group
        dataType : 'json',
        success:function(response) { //eto ung response na galing sa controller na kinquery
          response.forEach(function(data) {
            $('#srvcid').val(data.service_id);
            $('#srvcname').val(data.service_name);
            $('#srvcprice').val(data.service_price);
            $('#srvcgrpid').val(data.service_group_id);
            $('#typesel').val(data.service_type_id);

          })      
        }
      });
    });
});
  
</script>
@endsection