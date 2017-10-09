@if((Session::get('addpack')!=1)&&(Session::get('uppack')!=1)&&(Session::get('delpack')!=1))
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif
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
					@if(Session::get('addpack')==1)
					<a class="btn btn-info" style="margin-left: -40%" href="#addModal" data-toggle="modal" id="newbtn" ><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; New </a>
          @endif
					</div>
					<table class="table table-bordered table-hover dataTable" id="empTable">
						<thead>
							<tr>
								<th>Package Name</th>
								<th>Price</th>
								<th>Action</th>
                <th hidden>Services</th>
                <th>Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($packages as $packages)
								<tr>
									<td>{{ $packages->pack_name }}</td>
									<td>{{ $packages->pack_price }}</td>
									<td>
                  @if($packages->PackStatus == 1)
                  @if(Session::get('uppack')==1)
									<a class="btn btn-warning btn-xs  updateModal" href="#updateModal" data-toggle="modal" data-id="{{$packages->pack_id}}"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
                  @endif
                  @if(Session::get('delpack')==1)
									<a class="btn btn-danger btn-xs delbtn" data-id="{{$packages->pack_id}}"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
                  @endif
                  @else
                  @if(Session::get('uppack')==1)
                  <a class="btn btn-warning btn-xs  disabled"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
                  @endif
                  @if(Session::get('delpack')==1)
                  <a class="btn btn-danger btn-xs disabled"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
                  @endif
                  @endif
									</td>
                  <td hidden>
                    @foreach($services as $packserv)
                      @if($packages->pack_id == $packserv->pack_serv_package_id)
                        {{ $packserv->service_name }},
                      @endif
                    @endforeach
                  </td>
                  <td>
                    @if($packages->PackStatus == 1)
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
        <form action="/update_package" method="POST" class="form-horizontal" id="packageedit">
        <input type="hidden" name="packid" id="packid">
        <div class="form-group" style="margin-right:3% ">
              <div class="col-md-10 col-md-offset-1">
                <div class="input-group">
                  <div class="input-group-addon">
                   Package Name <sup>*</sup>
                </div>
                <input  name="packagename" type="text" id="packname" placeholder="Package Name" class="form-control input-md" required>
              </div>
          </div>  
        </div> 


        <div class="form-group" style="margin-right:3% ">
            <div class="col-md-10 col-md-offset-1">
              <div class="input-group">
                <span class="input-group-addon">Service Offered <sup>*</sup></span>

                <select class="form-control select2 updatepackservice" name="services[]" values="" style="width: 100%" multiple="multiple" required>
            
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
        </div>
                
        
        <div class="form-group" style="margin-right:3% "> 
            <div class="col-md-10 col-md-offset-1">
              <div class="input-group">
                <div class="input-group-addon">
                   Package Price <sup>*</sup>
                 </div>
                <input  name="packageprice" type="text" id="packprice" placeholder="Price" class="form-control input-md" required>
             </div>
          </div>  
       </div> 
       <div class="form-group" style="margin-right:% ">
              <div class="col-md-10 col-md-offset-3">
                <div class="input-group">
                   <small><sup>*</sup>Note:<br>&nbsp;Package price should be below/equal to total price.<div id="uptotalprice">&nbsp;Total price: 
                    0 </div></small>
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



<div class="modal fade" id = "addModal">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <h4 class="modal-title"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Package</h4>
      </div>
      <div class="modal-body">
        <form action="/save_package" method="POST" class="form-horizontal" id="packageadd">
        <div class="form-group" style="margin-right:3% ">
              <div class="col-md-10 col-md-offset-1">
                <div class="input-group">
                  <div class="input-group-addon">
                   Package Name <sup>*</sup>
                </div>
                <input  name="packagename" id="packagename" type="text" id="example-text-input" placeholder="Package Name" class="form-control input-md" required>
              </div>
          </div>  
        </div> 


        <div class="form-group" style="margin-right:3% ">
            <div class="col-md-10 col-md-offset-1">
              <div class="input-group">
                <span class="input-group-addon">Service Offered <sup>*</sup></span>
                  <select class="form-control select2 packservice" name="services[]" values="" style="width: 100%" multiple="multiple" required>
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
        </div>
          
        <div class="form-group" style="margin-right:3% "> 
            <div class="col-md-10 col-md-offset-1">
              <div class="input-group">
                <div class="input-group-addon">
                   Package Price <sup>*</sup>
                 </div>
                <input  name="packageprice" type="text" id="example-number-input" placeholder="Price" class="form-control input-md" required>
             </div>
          </div>  
       </div> 
        <div class="form-group">
              <div class="col-md-10 col-md-offset-3">
                <div class="input-group">
                   <sup>*</sup>Note:<br>&nbsp;Package price should be below/equal to total price.<div id="totalprice">&nbsp;Total price: 
                    0 </div>
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
      /* Formating function for row details */
      
      function fnFormatDetails ( oTable, nTr )
      {
          var aData = oTable.fnGetData( nTr );
          var service =[];
          service = aData[4];
          var servs = service.split(',');

          var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
          sOut += '<tr><td>Package Name: '+aData[1]+'</td></tr>';
          sOut += '<tr><td>Price: '+aData[2]+'</td></tr>';
          sOut += '<tr><td>Services: '+servs+'</td></tr>';
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

          $('#empTable thead tr').each( function () {
              this.insertBefore( nCloneTh, this.childNodes[0] );
          } );

          $('#empTable tbody tr').each( function () {
              this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
          } );

          /*
           * Initialse DataTables, with no sorting on the 'details' column
           */
          var oTable = $('#empTable').dataTable( {
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
          $('#empTable tbody td img').live('click', function () {
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

<script type="text/javascript">
  $('#newbtn').click(function(){
    $('#packageadd').bootstrapValidator('resetForm',true);
    $('#packageadd div').removeClass('has-error');
    $('#packageadd div').removeClass('has-success');
    $('#packageadd i').removeClass('glyphicon glyphicon-ok');
    $('#packageadd i').removeClass('glyphicon glyphicon-remove');
    $('#packageadd small').attr('style','display:none');
    $('.packservice').val('').trigger('change');
    $('#totalprice').empty();
    $('#totalprice').append('Total price: 0');
  });
$('.packservice').change(function(){
  var service_id = $('.packservice').val();
  if(service_id == null || service_id == '')
  {
    $('#totalprice').empty();
    $('#totalprice').append('Total price: 0');
  }
  else
  {
    $.ajax
    ({
      url: '/getTotalPrice',
      type: 'get',
      data:{id:service_id},
      dataType: 'json',
      success:function(response)
      {
        response.forEach(function(data){
          $('#totalprice').empty();
          $('#totalprice').append('Total price: '+data.total+'');
        })
      }
    });
  }
});
$('.updatepackservice').change(function(){
  var service_id = $('.updatepackservice').val();
  if(service_id == null || service_id == '')
  {
    $('#uptotalprice').empty();
    $('#uptotalprice').append('Total price: 0');
  }
  else
  {
    $.ajax
    ({
      url: '/getTotalPrice',
      type: 'get',
      data:{id:service_id},
      dataType: 'json',
      success:function(response)
      {
        response.forEach(function(data){
          $('#uptotalprice').empty();
          $('#uptotalprice').append('Total price: '+data.total+'');
        })
      }
    });
  }
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