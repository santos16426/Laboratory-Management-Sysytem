@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-cogs" aria-hidden="true"></i><span> Maintenance</span>
@endsection

@section ('breadParentName')
<i class="fa fa-users" aria-hidden="true"></i><span> Corporate Account</span>
@endsection
@section('breadactivePage','Corporate Packages')
@section('maintenanceactive')
<a href="" class="active">
@endsection
@section('corpactive','active')
@section('content')
<div class="modal fade" id = "updateModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header btn-warning">
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Update</h4>
      </div>
      <form action="/update_corpPackage" method="POST" class="form-horizontal" id="corppackedit">
      
        <div class="modal-body">
        {{ csrf_field() }}
        <input type="hidden" name="corpid" value="{{ $corp_id }}">
        <input type="hidden" name="corpPack_id" value="" id="upcorpPack_id">
          <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <div class="input-group">
                <div class="input-group-addon">
                  Package Name <sup>*</sup>
                </div>
                <input  name="uppackname"  id="uppackname" type="text" placeholder="Package Name" class="form-control input-md" required>
              </div>
            </div>  
          </div>
         
          <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <div class="input-group">
                <div class="input-group-addon">
                  Services <sup>*</sup>
                </div>
                <select class="form-control select2 uppackservice" name="upservices[]" values="" style="width: 100%" multiple="multiple" required>
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
             <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <div class="input-group">
                <div class="input-group-addon">
                  Package Price <sup>*</sup>
                </div>
                <input  name="uppackprice" id="uppackprice"  type="text" placeholder="Package Price" class="form-control input-md" required>
              </div>
            </div>  
          </div>
            <div class="form-group" style="margin-right:% ">
              <div class="col-md-10 col-md-offset-3">
                <div class="input-group">
                   <sup>*</sup>Note:<br>&nbsp;Package price should be below/equal to total price.<div id="uptotalprice">&nbsp;Total price: 
                    0 </div>
              </div>
          </div>  
        </div>
            <div class="form-group" style="margin-left:33% ">
              <div class="col-md-12">
                <div class="form-group">
                    <div class="checkbox">
                      <label><input type="checkbox" name="upexam" id="upexam" value="2">Include Physical Exam.</label>
                  </div>
                </div>
              </div>  
            </div> 
            <fieldset>
              <legend>Conditions</legend>
              
            <div class="form-group">
                            <label class="col-lg-1 col-md-offset-1 control-label">Gender:</label>
                            <div class="col-lg-5">
                                <div class="radio">
                                    <label for="upMale">
                                        <input type="radio" id="upMale" name="gender" value="1" /> Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="upFemale">
                                        <input type="radio" id="upFemale" name="gender" value="2" /> Female
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="upBoth">
                                        <input type="radio" id="upBoth" name="gender" value="3" /> Both
                                    </label>
                                </div>
                            </div>
                        </div>

                <div class="form-group">
                            <label class="col-lg-1 col-md-offset-1 control-label">Age:</label>
                            <div class="col-lg-5">
                                <div class="radio">
                                    <label for="upTeen">
                                        <input type="radio" id="upTeen" name="age" value="Teen" /> Teen
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="upAdult">
                                        <input type="radio" id="upAdult" name="age" value="Adult" /> Adult
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="upSenior">
                                        <input type="radio" id="upSenior" name="age" value="Senior" /> Senior
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="upAllAges">
                                        <input type="radio" id="upAllAges" name="age" value="All" /> All Ages
                                    </label>
                                </div>
                            </div>
                        </div>  
            </fieldset>
            <div class="modal-footer">
            <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
            <button  class="btn btn-xs btn-success" type="submit" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>
          </div>
        </div>
      </form>
    </div>  
  </div>
</div>


<div class="modal fade" id = "addModal">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header btn-primary">
          <h4 class="modal-title"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Package</h4>
      </div>
      <form action="/save_corpPackage" method="POST" class="form-horizontal" id="corppackadd">
        <div class="modal-body">
        {{ csrf_field() }}
        <input type="hidden" name="corp_id" value="{{ $corp_id }}">
          <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <div class="input-group">
                <div class="input-group-addon">
                  Package Name <sup>*</sup>
                </div>
                <input  name="packname"  type="text" placeholder="Package Name" class="form-control input-md" required>
              </div>
            </div>  
          </div>
          
          <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <div class="input-group">
                <div class="input-group-addon">
                  Services <sup>*</sup>
                </div>
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
            <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <div class="input-group">
                <div class="input-group-addon">
                  Package Price <sup>*</sup>
                </div>
                <input  name="packprice"  type="text" placeholder="Package Price" class="form-control input-md" required>
              </div>
            </div>  
          </div>
            <div class="form-group" style="margin-right:% ">
              <div class="col-md-10 col-md-offset-3">
                <div class="input-group">
                  <sup>*</sup>Note:<br>&nbsp;Package price should be below/equal to total price.<div id="totalprice">&nbsp;Total price: 
                    0 </div>
              </div>
          </div>  
        </div>
            <div class="form-group" style="margin-left:33% ">
              <div class="col-md-12">
                <div class="form-group">
                    <div class="checkbox">
                      <label><input type="checkbox" name="exam" id="exam" value="2">Include Physical Exam.</label>
                  </div>
                </div>
              </div>  
            </div>  
            <fieldset>
              <legend>Conditions</legend>
              
              <div class="form-group">
                            <label class="col-lg-1 col-md-offset-1 control-label">Gender:</label>
                            <div class="col-lg-5">
                                <div class="radio">
                                    <label for="Male">
                                        <input type="radio" id="Male" name="gender" value="1" /> Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="Female">
                                        <input type="radio" id="Female" name="gender" value="2" /> Female
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="Both">
                                        <input type="radio" id="Both" name="gender" value="3" /> Both
                                    </label>
                                </div>
                            </div>
                        </div>

                <div class="form-group">
                            <label class="col-lg-1 col-md-offset-1 control-label">Age:</label>
                            <div class="col-lg-5">
                                <div class="radio">
                                    <label for="Teen">
                                        <input type="radio" id="Teen" name="age" value="Teen" /> Teen
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="Adult">
                                        <input type="radio" id="Adult" name="age" value="Adult" /> Adult
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="Senior">
                                        <input type="radio" id="Senior" name="age" value="Senior" /> Senior
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="All Ages">
                                        <input type="radio" id="All Ages" name="age" value="All Ages" /> All Ages
                                    </label>
                                </div>
                            </div>
                        </div> 
            </fieldset>
            <div class="modal-footer">
            <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
            <button  class="btn btn-xs btn-success" type="submit" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>
          </div>
        </div>
      </form>
    </div>  
  </div>
</div>

<div class="modal fade" id = "deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-danger">
        
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Delete Record</h4>
      </div>
      <form method="post" action="/deleteCorporatePackage" id="delform">
      {{ csrf_field() }}
        <div class="modal-body">
          <h4></h4>
          <input type="text" class="hidden" name="id" id="cid" value="">
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
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        <strong>{{ $corp_name }} Packages </strong>
      </header>
      <div class="panel-body">
        <div class="clearfix">
          <div class="btn-group pull-right">
          
          <a class="btn btn-info" style="margin-left: -40%" href="#addModal" data-toggle="modal" id="addEmpBtn" ><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; New </a>
          </div>
          <table class="table table-bordered table-hover dataTable" id="corpPacktbl">
            <thead>
              <tr>
                <th>Package Name</th>
                <th>Package Price</th>
                <th>Action</th>
                <th>Status</th>
                <th hidden></th>
                <th hidden></th>
                <th hidden></th>
                <th hidden></th>
              </tr>
            </thead>
            <tbody>
              @foreach($table as $packages)
              <tr>
                <td>{{ $packages->corpPack_name }}</td>
                <td>{{ $packages->price }}</td>
                <td>
                  @if($packages->CorpPackStatus == 1)
                  <a class="btn btn-warning btn-xs updateModal" data-id="{{$packages->corpPack_id}}" href="#updateModal" data-toggle="modal"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
                  <a class="btn btn-danger btn-xs delbtn" data-id="{{$packages->corpPack_id}}"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
                  
                 @else
                 <a class="btn btn-warning btn-xs"  disabled><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
                  <a class="btn btn-danger btn-xs" disabled><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
                 @endif
                </td>
                <td>
                  @if($packages->CorpPackStatus == 1)
                  <span class="badge bg-success">Available</span>
                  @else
                  <span class="badge bg-important">Unavailable</span>
                  @endif
                </td>
                <td hidden>
                  @foreach($services as $corpserv)
                    @if($packages->corpPack_id == $corpserv->corpPack_id)
                      {{ $corpserv->service_name }},
                    @endif
                  @endforeach
                </td>
                <td hidden>
                  @if($packages->physical_exam == 2)
                  Yes
                  @else
                  No
                  @endif
                </td>
                <td hidden>
                  @if($packages->age == 'All')
                  Available for all ages
                  @elseif($packages->age == 'Senior')
                  Available for Senior Citizen Only (Ages 60 above)
                  @elseif($packages->age == 'Adult')
                  Available for Adults Only (Ages 19-59)
                  @elseif($packages->age == 'Teen')
                  Available for Teens Only (Ages 12-18)
                  @endif
                </td>
                <td hidden>
                  @if($packages->gender == 1)
                  Available for Male Employee only
                  @elseif($packages->gender == 2)
                  Available for Female Employee only
                  @elseif($packages->gender == 3)
                  Available for both male and female
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
@endsection
@section('additional')
<script type="text/javascript">

      function fnFormatDetails ( oTable, nTr )
      {
          var aData = oTable.fnGetData( nTr );
          var service =[];
          service = aData[5];
          var servs = service.split(',');

          var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
          sOut += '<tr><td>Package Name: '+aData[1]+'</td></tr>';
          sOut += '<tr><td>Price: '+aData[2]+'</td></tr>';
          sOut += '<tr><td>Services: '+servs+'</td></tr>';
          sOut += '<tr><td>Physical Exam: '+aData[6]+'</td></tr>';
          sOut += '<tr><td>Conditions:</td></tr>';
          sOut += '<tr><td>&emsp;-'+aData[7]+'</td></tr>';
          sOut += '<tr><td>&emsp;-'+aData[8]+'</td></tr>';
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

          $('#corpPacktbl thead tr').each( function () {
              this.insertBefore( nCloneTh, this.childNodes[0] );
          } );

          $('#corpPacktbl tbody tr').each( function () {
              this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
          } );

          /*
           * Initialse DataTables, with no sorting on the 'details' column
           */
          var oTable = $('#corpPacktbl').dataTable( {
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
          $('#corpPacktbl tbody td img').live('click', function () {
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
  $('#addEmpBtn').click(function(){
    $('#corppackadd').bootstrapValidator('resetForm',true);
    $('#corppackadd div').removeClass('has-error');
    $('#corppackadd div').removeClass('has-success');
    $('#corppackadd i').removeClass('glyphicon glyphicon-ok');
    $('#corppackadd i').removeClass('glyphicon glyphicon-remove');
    $('#corppackadd small').attr('style','display:none');
    $('.packservice').val('').trigger('change');
    $('#totalprice').empty();
    $('#totalprice').append('Total price: 0');
  });
  $('.uppackservice').change(function(){
    var service_id = $('.uppackservice').val();
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
 
  $('.delbtn').click(function(){
$('#cid').val($(this).data('id'));
$('#deleteModal').modal('show');
});
$('.packservice').select2();
$('.uppackservice').select2();
$('.updateModal').click(function(){
  $.ajax
    ({
      url: '/updateCorporatePackage',
      type: 'get',
      data:  { id:$(this).data('id')},
      dataType : 'json', 

      success:function(response){
        response.forEach(function(data){
        $('#uppackname').val(data.corpPack_name);
        $('#uppackprice').val(data.price);
        $('#upcorpPack_id').val(data.corpPack_id);
        var selectedValues = new Array();
        var i = 0;
        response.forEach(function(data){
        selectedValues[i] = data.service_id;
        i++;
        })
        $('.uppackservice').val(selectedValues).trigger('change');
        if(data.gender == 3)
        {
          $('#upBoth').prop('checked',true);
        }
        else if(data.gender == 2)
        {
          $('#upFemale').prop('checked',true);
        }
        else if(data.gender == 1)
        {
          $('#upMale').prop('checked',true);
        }
        if(data.age == 'Teen')
        {
          $('#upTeen').prop('checked',true);
        }
        else if(data.age == 'Adult')
        {
          $('#upAdult').prop('checked',true);
        }
        else if(data.age == 'Senior')
        {
          $('#upSenior').prop('checked',true);
        }
        else if(data.age == 'All')
        {
          $('#upAllAges').prop('checked',true);
        }
        if(data.physical_exam == 2)
        {
          $('#upexam').prop('checked',true);
        }  
         })
        
        
        },
      error:function(){
      }
    });
});
</script>
@endsection