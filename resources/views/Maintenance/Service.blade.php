@if((Session::get('addserv')!=1)&&(Session::get('upserv')!=1)&&(Session::get('delserv')!=1))
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif
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
            @if(Session::get('addserv')==1)
            <a class="btn btn-info" style="margin-left: -40%" href="#addModal" data-toggle="modal" id="newbtn"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; New </a>
            @endif
          </div>
          <table class="table table-bordered table-hover dataTable" id="servicesTbl">
                <thead>
              <tr>
                <th>Service Name</th>
                <th hidden>Service Group</th>
                <th hidden>Service Type</th>
                <th>Medical Request</th>
                <th>Price</th>
                <th>Action</th>
                <th>Status</th>
                <th hidden></th>
              </tr>
                </thead>
            <tbody>
              @foreach($service as $service)
                <tr>
                  <td>{{ $service->service_name }}</td>
                  <td hidden>{{ $service->servgroup_name }}</td>
                  <td hidden>{{ $service->service_type_name }}</td>
                  <td>{{ $service->medical_request }}</td>
                  <td>{{ $service->service_price }}</td>
                  <td>
                  @if($service->LabStatus == 1 and $service->ServGroupStatus == 1 and $service->ServTypeStatus == 1 and $service->ServiceStatus == 1 or $service->LabStatus == null and $service->ServGroupStatus == null and $service->ServTypeStatus == null and $service->ServiceStatus == 1 or $service->LabStatus == 1 and $service->ServGroupStatus == 1 and $service->ServTypeStatus === null and $service->ServiceStatus == 1)
                  @if(Session::get('upserv')==1)
                  <a class="btn btn-warning btn-xs editsrvc" href="#updateModal" data-id="{{ $service->service_id }}" data-toggle="modal"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
                  @endif
                  @if(Session::get('delserv')==1)
                  <a class="btn btn-danger btn-xs delbtn"  data-id="{{$service->service_id}}"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
                  @endif
                  @else
                  @if(Session::get('upserv')==1)
                  <a class="btn btn-warning btn-xs disabled" ><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
                  @endif
                  @if(Session::get('delserv')==1)
                  <a class="btn btn-danger btn-xs disabled"  ><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
                  @endif
                  @endif
                  </td>
                  <td>
                    @if($service->LabStatus == 1 and $service->ServGroupStatus == 1 and $service->ServTypeStatus == 1 and $service->ServiceStatus == 1 or $service->LabStatus == null and $service->ServGroupStatus == null and $service->ServTypeStatus == null and $service->ServiceStatus == 1 or $service->LabStatus == 1 and $service->ServGroupStatus == 1 and $service->ServTypeStatus === null and $service->ServiceStatus == 1)
                    <span class="badge bg-success">Available</span>
                    @else
                    <span class="badge bg-important">Unavailable</span>
                    @endif
                  </td>
                  <td hidden>{{ $service->service_notes }}</td>
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
                  Service Group <sup>*</sup>
                </div>
                  <select class="form-control srvcgrp" name="srvcgrp_id" id="srvcgrpid" disabled="">                    
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
                  Service Type
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
                  Service Price <sup>*</sup>
                </div>
              <input  name="srvc_price" id="srvcprice" type="text" placeholder="Service Price" class="form-control input-md" required>
            </div>
          </div>  
        </div> 
        <div class="form-group" style="margin-left:33% ">
        <div class="col-md-12">
          <div class="form-group">
              <div class="checkbox">
                <label><input type="checkbox" name="med_req" id="med_req" value="Yes">Check if this service needs a medical <br> request upon transaction.</label>
            </div>
          </div>
        </div>  
      </div>  
        <div class="form-group" >
            <div class="col-sm-10 col-md-offset-1">
              <div class="input-group">
                <div class="input-group-addon">
                  Prescription
                </div>
              <textarea class="col-md-12" name="service_notes" id="service_notes">
              </textarea>
            </div>
          </div>  
        </div>  
        <hr>
        <div class="form-group" style="padding-left: 16px">
              <div class="col-sm-10 col-md-offset-1">
                <div class="input-group">
                  <label><strong>Result Layout</strong><sup>*</sup></label><br>
                  <div style="padding-left: 20px">
                    <input type="checkbox" name="upmedserv1" value="1" id="upmedserv1"><label for="upmedserv1">&nbsp;Medical Service 1&nbsp;&nbsp;</label><a class="btn btn-xs btn-success medserv1view">View</a><br>
                    <input type="checkbox" name="upmedserv2" value="1" id="upmedserv2"><label for="upmedserv2">&nbsp;Medical Service 2&nbsp;&nbsp;</label><a class="btn btn-xs btn-success medserv2">View</a><br>
                    <input type="checkbox" name="upecg" value="1" id="upecg"><label for="upecg">&nbsp;ECG&nbsp;&nbsp;</label><a class="btn btn-xs btn-success ecgview">View</a>
                    <br>
                    <input type="checkbox" name="upxray" id="upxray" value="1"><label for="upxray">&nbsp;X-Ray&nbsp;&nbsp;</label><a class="btn btn-xs btn-success xrayview">View</a>
                    <br>
                    <input type="checkbox" name="upultrasound" id="upultrasound" value="1"><label for="upultrasound">&nbsp;Ultrasound&nbsp;&nbsp;</label><a class="btn btn-xs btn-success ultrasoundview">View</a>
                    <br>
                    <input type="checkbox" name="updrugtest" id="updrugtest" value="1"><label for="updrugtest">&nbsp;Drug Test&nbsp;&nbsp;</label><a class="btn btn-xs btn-success drugview">View</a>
                </div>
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
                  Service Group <sup>*</sup>
                </div>
                  <select class="form-control srvcgrp" name="srvcgrp_id" id="servg" style="width: 100%">
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
                  Service Type
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

        <div class="form-group" >
            <div class="col-sm-10 col-md-offset-1">
              <div class="input-group">
                <div class="input-group-addon">
                  Prescription
                </div>
              <textarea class="col-md-12" name="service_notes">
              </textarea>
            </div>
          </div>  
        </div>  
        <hr>
        <div class="form-group" style="padding-left: 16px">
              <div class="col-sm-10 col-md-offset-1">
                <div class="input-group">
                  <label><strong>Result Layout</strong><sup>*</sup></label><br>
                  <div style="padding-left: 20px">
                    <input type="checkbox" name="medserv1" value="1" id="medserv1"><label for="medserv1">&nbsp;Medical Service 1&nbsp;&nbsp;</label><a class="btn btn-xs btn-success medserv1view">View</a><br>
                    <input type="checkbox" name="medserv2" value="1" id="medserv2"><label for="medserv2">&nbsp;Medical Service 2&nbsp;&nbsp;</label><a class="btn btn-xs btn-success medserv2">View</a><br>
                    <input type="checkbox" name="ecg" value="1" id="ecg"><label for="ecg">&nbsp;ECG&nbsp;&nbsp;</label><a class="btn btn-xs btn-success ecgview">View</a>
                    <br>
                    <input type="checkbox" name="xray" id="xray" value="1"><label for="xray">&nbsp;X-Ray&nbsp;&nbsp;</label><a class="btn btn-xs btn-success xrayview">View</a>
                    <br>
                    <input type="checkbox" name="ultrasound" id="ultrasound" value="1"><label for="ultrasound">&nbsp;Ultrasound&nbsp;&nbsp;</label><a class="btn btn-xs btn-success ultrasoundview">View</a>
                    <br>
                    <input type="checkbox" name="drugtest" id="drugtest" value="1"><label for="drugtest">&nbsp;Drug Test&nbsp;&nbsp;</label><a class="btn btn-xs btn-success drugview">View</a>
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

<div class="modal fade" id = "LayoutModal">
  <div class="modal-dialog">
    <div class="modal-content" id="pic">
    </div>  
  </div>
</div>  
@endsection
@section('additional')
<script type="text/javascript">
  $('.medserv1view').click(function(){
    $('#pic').empty();
    $('#pic').append('<img src="/ResultImage/medservicesample.jpg">')
    $('#LayoutModal').modal('show');
  });
  $('.medserv2').click(function(){
    $('#pic').empty();
    $('#pic').append('<img src="/ResultImage/medserv2.png">');
    $('#LayoutModal').modal('show');  
  });
  $('.ecgview').click(function(){
    $('#pic').empty();
    $('#pic').append('<img src="/ResultImage/ecgsample.jpg">');
    $('#LayoutModal').modal('show');  
  });
  $('.xrayview').click(function(){
    $('#pic').empty();
    $('#pic').append('<img src="/ResultImage/xraysample.jpg">');
    $('#LayoutModal').modal('show');  
  });
  $('.ultrasoundview').click(function(){
    $('#pic').empty();
    $('#pic').append('<img src="/ResultImage/ultrasoundsample.jpg">');
    $('#LayoutModal').modal('show');  
  });
  $('.drugview').click(function(){
    $('#pic').empty();
    $('#pic').append('<img src="/ResultImage/drugtest.png">');
    $('#LayoutModal').modal('show');  
  });
</script>
<script type="text/javascript">
  function fnFormatDetails ( oTable, nTr )
      {
          servicename = [];
          names = "";
          aData = oTable.fnGetData( nTr );
          sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
          sOut += '<tr><td>Price: '+ aData[5]+ '</td></tr>'
          if(aData[2] == '' || aData[2]==null )
          {
            sOut += '<tr><td>Service Group: N/A</td></tr>';
          }
          else
          {
            sOut += '<tr><td>Service Group: '+aData[2]+'</td></tr>';
          }
          if(aData[3] == '' || aData[3]==null )
          {
            sOut += '<tr><td>Service Type: N/A</td></tr>';
          }
          else
          {
            sOut += '<tr><td>Service Type: '+aData[3]+'</td></tr>';
          }
          sOut += '<tr><td>Service Name: <u><b>'+ aData[1]+ '</b></u></td></tr>'
          sOut += '<tr><td>Medical Request: '+aData[4]+'</td></tr>';


          if(aData[8] == ''|| aData[8]==null)
          {
            sOut += '<tr><td>Prescription: N/A</td></tr>';
          }
          else
          {
            sOut += '<tr><td>Prescription: '+aData[8]+'</td></tr>';
          }
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
  $('#newbtn').click(function(){
      $('#servadd').bootstrapValidator('resetForm',true);
      $('#servadd div').removeClass('has-error');
      $('#servadd div').removeClass('has-success');
      $('#servadd i').removeClass('glyphicon glyphicon-ok');
      $('#servadd i').removeClass('glyphicon glyphicon-remove');
      $('#servadd small').attr('style','display:none');
    });
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
    $('#servedit').bootstrapValidator('resetForm',true);
      $('#servedit div').removeClass('has-error');
      $('#servedit div').removeClass('has-success');
      $('#servedit i').removeClass('glyphicon glyphicon-ok');
      $('#servedit i').removeClass('glyphicon glyphicon-remove');
      $('#servedit small').attr('style','display:none');
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
            if(data.medical_request == "Yes")
            {
              $('#med_req').attr('checked',true);
            }
            if(data.result_medserv1 == 1)
            {
              $('#upmedserv1').attr('checked',true);
            }
            if(data.result_medserv2 == 1)
            {
              $('#upmedserv2').attr('checked',true);
            }
            if(data.result_ecg == 1)
            {
              $('#upecg').attr('checked',true);
            }
            if(data.result_xray == 1)
            {
              $('#upxray').attr('checked',true);
            }
            if(data.result_ultra == 1)
            {
              $('#upultrasound').attr('checked',true);
            }
            if(data.result_drug == 1)
            {
              $('#updrugtest').attr('checked',true);
            }
            $('#service_notes').empty();
            $('#service_notes').append(data.service_notes);
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