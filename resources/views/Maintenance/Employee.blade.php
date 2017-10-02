@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-cogs" aria-hidden="true"></i><span> Maintenance</span>
@endsection

@section ('breadParentName')
<i class="fa fa-user" aria-hidden="true"></i><span> Employee</span>
@endsection
@section('maintenanceactive')
<a href="" class="active">
@endsection
@section ('breadactivePage','Employee List')
@section('empactive','active')

@section('employee','active')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        Employee
      </header>
      <div class="panel-body">
        <div class="clearfix">
          <div class="btn-group pull-right">
          
          <a class="btn btn-info" style="margin-left: -40%" href="#addModal" data-toggle="modal" id="addEmpBtn" ><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; New </a>
          </div>
          <table class="table table-bordered table-hover dataTable" id="empTable">
            <thead>
              <tr>
                <th>Image</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Employee Type</th>
                <th>Action</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($emp1 as $emp1)
              <tr>
                <td><img src="/Employee_images/{{ $emp1->emp_pic }}" style="height: 40px;display: block"></td>
                <td>{{ $emp1->emp_lname }}</td>
                <td>{{ $emp1->emp_fname }}</td>
                <td>{{ $emp1->emp_mname }}</td>
                <td>{{ $emp1->role_name }}</td>
                <td>
                @if($emp1->RoleStatus == 1 and $emp1->EmpStatus == 1 and $emp1->LabStatus == 1 or $emp1->RoleStatus == 1 and $emp1->EmpStatus == 1 and $emp1->LabStatus === null)
                  <button class="btn btn-warning btn-xs empupdateModalbtn" data-target="#updateModal" data-id="{{ $emp1->emp_id }}" data-toggle="modal"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</button>
                  <button class="btn btn-info btn-xs empviewModalbtn" data-target="#viewModal"  data-id="{{ $emp1->emp_id }}" data-toggle="modal"><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp; View</button>
                  <button class="btn btn-danger btn-xs empdeleteModalbtn" data-id="{{ $emp1->emp_id }}" ><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</button>
                @else
                  <button class="btn btn-warning btn-xs" disabled><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</button>
                  <button class="btn btn-info btn-xs" disabled ><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp; View</button>
                  <button class="btn btn-danger btn-xs" disabled><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</button>
                @endif
                </td>
                <td>
                @if($emp1->RoleStatus == 1 and $emp1->EmpStatus == 1 and $emp1->LabStatus == 1 or $emp1->RoleStatus == 1 and $emp1->EmpStatus == 1 and $emp1->LabStatus === null)
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
  <div class="modal-dialog" style="width: 60%">
    <div class="modal-content">
      <div class="modal-header btn-warning">
        
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Update</h4>
      </div>
      <form action="/update_employee" method="POST" class="form-horizontal" enctype="multipart/form-data" id="upEmpLicense">
      <input type="hidden" name="update_emp_type" id="update_emp_type">
      <input type="hidden" name="update_emp_id" id = "update_emp_id">
        <div class="modal-body">
          <div class="form-group">
          </div>        
          <fieldset class="geninfoupdate">
          </fieldset>
        </div>
        <div class="modal-footer">
          <button  class="btn btn-warning" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Update</button>
          <button type="button" class="btn pull-left" data-dismiss="modal">Close</button>
        </div>
        {{ csrf_field() }}
      </form>
    </div>  
  </div>
</div>

<div class="modal fade" id = "viewModal">
  <div class="modal-dialog" style="width: 60%">
    <div class="modal-content">
      <div class="modal-header btn-info">
        <h4 class="modal-title"><i class="fa fa-info-circle" aria-hidden="true"></i> View Record</h4>
      </div>
      <form action="/save_employee" method="POST" class="form-horizontal">
        <div class="modal-body">
          <div class="form-group">
          </div>        
          <fieldset class="geninfoview">
          </fieldset>
          <fieldset class="accountinfoview">
        </fieldset> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn  pull-left" data-dismiss="modal">Close</button>
        </div>
        {{ csrf_field() }}
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
      <form method="post" action="/deleteEmployee" id="delform">
      {{ csrf_field()  }}
        <div class="modal-body">
          <h4></h4>
          <input type="text" class="hidden" name="id" id="empid" value="">
          Are you sure you want to delete this record?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</button>
        </div>
      </form>
    </div>  
  </div>
</div>

<div class="modal fade" id = "addModal">
  <div class="modal-dialog" style="width: 70%">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <h4 class="modal-title"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Employee</h4>
      </div>
      <form action="/save_employee" method="POST" class="form-horizontal" id="EmpLicense"  enctype="multipart/form-data">
        <div class="modal-body">
          
          <div class="form-group">
            
            <div class="col-xs-10 col-md-offset-1 input-group">
                <span class="input-group-addon">Employee Type <sup style="color: red">*</sup></span>
                <select class="form-control select2 employeeTypeDropDown" name="emp_type" id="emp_type" style="width: 100%;">
                <option value="0">Select Employee Type</option>
                @foreach($empTypes as $empTypes)
                  <option value="{{ $empTypes->role_id }}">{{ $empTypes->role_name }}</option>
                @endforeach
                </select>
            </div>
          </div>

          <fieldset class="geninfo">
          </fieldset>
          <fieldset class="accountinfo">
        </fieldset> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-success" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>
        </div>
        {{ csrf_field() }}
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
          var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
          
          sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
          sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
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
<script>
$(function () {
$('.employeeTypeDropDown').select2({
  placeholder: "Select employee type"
});


   

});
</script>
<script type="text/javascript">
  $('#addEmpBtn').click(function(){
    $('.employeeTypeDropDown').val('0').trigger('change');
    $('#EmpLicense div').removeClass('has-error');
    $('#EmpLicense div').removeClass('has-success');
    $('#EmpLicense i').removeClass('glyphicon glyphicon-ok');
    $('#EmpLicense i').removeClass('glyphicon glyphicon-remove');
    $('#EmpLicense small').attr('style','display:none');
  });
  $('.empdeleteModalbtn').click(function(){
    $('#empid').val($(this).data('id'));
    $('#deleteModal').modal('show');
  });

$('.employeeTypeDropDown').on('change',function(){ 
      $('#EmpLicense').bootstrapValidator('destroy',true);
      var address = ""; 
      var username = ""; 
      var formChanges = ""; 
      var password = ""; 
      var rank = ""; 
      var license = ""; 
      var contact = ""; 
      var name = "";

      $.ajax
      ({
        url: '/getFields',
        type: 'get',
        data: {ID:$(this).val()},
        dataType : 'json',
        success:function(response) { 

          response.forEach(function(data) { 
            address += data.address;
            username  += data.username;
            password  += data.password;
            rank  += data.rank;
            license += data.license;
            contact += data.contact;
            name += data.name;
          })
          $('.geninfo').empty(); 
          $('.accountinfo').empty();
          if(rank==1){
            $('.geninfo').append('<div class="form-group" id="medtechrank"><div class="col-md-10 col-md-offset-1"> <div class="input-group"> <div class="input-group-addon">Position <sup>*</sup></div> <select class="form-control select2" name="rank_id" style="width: 100%;"> @php $ranks1 = $ranks @endphp  @foreach($ranks1 as $ranks1) <option value="{{ $ranks1->rank_id }}">{{ $ranks1->rank_name }}</option> @endforeach </select> </div> </div> </div>'); 
          }
          if(name==1){

            $('.geninfo').append('<legend>General Information</legend><div class="form-group"> <div class="col-md-10 col-md-offset-1"> <div class="input-group"> <div class="input-group-addon">First Name <sup style="color:red">*</sup></div> <input type="text" class="form-control ff2" name="firstname" placeholder="e.g. Juan" required> </div> </div> </div> <div class="form-group"> <div class="col-md-10 col-md-offset-1"> <div class="input-group"> <div class="input-group-addon">Middle Name </div> <input type="text" class="form-control mm2" name="middlename" placeholder="e.g. Martinez"> </div> </div> </div> <div class="form-group"> <div class="col-md-10 col-md-offset-1"> <div class="input-group"> <div class="input-group-addon">Last Name <sup style="color:red">*</sup></div> <input type="text" class="form-control ll2" name="lastname" placeholder="e.g. Dela Cruz"> </div> </div> </div>');

          }
          if(address==1){
            $('.geninfo').append('<div class="form-group"> <div class="col-md-10 col-md-offset-1"> <div class="input-group"> <div class="input-group-addon">Address <sup style="color:red">*</sup></div> <input type="text" class="form-control" name="address" placeholder="e.g. 173 L. Pascual Street, Q.C."> </div> </div> </div>');
          }
          if(contact==1){
            $('.geninfo').append('<div class="form-group"><div class="col-md-10 col-md-offset-1"> <div class="input-group"> <div class="input-group-addon">Contact Number <sup style="color:red">*</sup></div> <input type="text" class="form-control" name="contact" placeholder="e.g. (63) 926 189 1291"> </div> </div> </div>');
          }
          if(license==1){
            $('.geninfo').append(' <div class="form-group"> <div class="col-md-10 col-md-offset-1"> <div class="input-group"> <div class="input-group-addon">License Number <sup>*</sup></div> <input type="text" class="form-control" name="license" placeholder="e.g. HH-DH-8876"> </div> </div> </div>');
          }

          
          if((username==1)&&(password==1)){
          $('.accountinfo').append(' <legend>Account Information</legend><div class="form-group"><div class="col-md-10 col-md-offset-1"> <div class="input-group"> <div class="input-group-addon">Username <sup style="color:red">*</sup></div><input type="text" class="form-control" name="username" placeholder="Username"></div></div></div><div class="form-group"><div class="col-md-10 col-md-offset-1"> <div class="input-group"> <div class="input-group-addon">Password <sup style="color:red">*</sup></div><input type="password" class="form-control" name="password" placeholder="Password"></div></div></div><div class="form-group"><div class="col-md-10 col-md-offset-1"> <div class="input-group"> <div class="input-group-addon">Confirm Password <sup style="color:red">*</sup></div><input type="password" class="form-control" name="confirmpass" placeholder="Confirm Password"></div></div></div>');
          }
          if(name == 1)
          {
            $('.accountinfo').append('<label class="control-label col-md-3 col-md-offset-1">Image Upload</label> <div class="col-md-8"> <div class="fileupload fileupload-new" data-provides="fileupload"> <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"> <img src="{{ asset("/Employee_images/default.jpg") }}" alt="" /> </div> <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div> <div> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" name="emp_pic"> </span> <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a> </div> </div> </div>')
          }
         if(rank == 1 &&  license == 1 && address == 1 && contact == 1 && username == 1)
            {
    
              document.getElementById('EmpLicense').className = "form-horizontal 11111";  
// 11111
            $('.11111').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              contact: {
                validators: {
                  regexp: {
                    regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                    message: 'Invalid input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
        
              
            }

             if(rank == 0 &&  license == 0 && address == 0 && contact == 0 && username == 0)
            {
              document.getElementById('EmpLicense').className = "form-horizontal 00000";

              $('.00000').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                           
            }
          });

            }

             if(rank == 0 &&  license == 1 && address == 1 && contact == 1 && username == 1)
            {
              document.getElementById('EmpLicense').className = "form-horizontal 01111";
              $('.01111').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              contact: {
                validators: {
                  regexp: {
                    regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                    message: 'Invalid input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

             if(rank == 1 &&  license == 0 && address == 1 && contact == 1 && username == 1)
            {
              document.getElementById('EmpLicense').className = "form-horizontal 10111";
              $('.10111').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              contact: {
                validators: {
                  regexp: {
                    regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                    message: 'Invalid input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                            
            }
          });

            }

             if(rank == 1 &&  license == 1 && address == 0 && contact == 1 && username == 1)
            {
              document.getElementById('EmpLicense').className = "form-horizontal 11011";
              $('.11011').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              contact: {
                validators: {
                  regexp: {
                    regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                    message: 'Invalid input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });

            }

             if(rank == 1 &&  license == 1 && address == 1 && contact == 0 && username == 1)
            {
              document.getElementById('EmpLicense').className = "form-horizontal 11101";
              $('.11101').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

             if(rank == 1 &&  license == 1 && address == 1 && contact == 1 && username == 0)
            {
              document.getElementById('EmpLicense').className = "form-horizontal 11110";
              $('.11110').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              contact: {
                validators: {
                  regexp: {
                    regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                    message: 'Invalid input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

             if(rank == 0 &&  license == 0 && address == 1 && contact == 1 && username == 1)
            {
              document.getElementById('EmpLicense').className = "form-horizontal 00111";
              $('.00111').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              contact: {
                validators: {
                  regexp: {
                    regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                    message: 'Invalid input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                       
            }
          });
            }

             if(rank == 1 &&  license == 0 && address == 0 && contact == 1 && username == 1)
            {
              document.getElementById('EmpLicense').className = "form-horizontal 10011";
              $('.10011').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              contact: {
                validators: {
                  regexp: {
                    regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                    message: 'Invalid input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },  
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                        
            }
          });
            }

             if(rank == 1 &&  license == 1 && address == 0 && contact == 0 && username == 1)
            {
              document.getElementById('EmpLicense').className = "form-horizontal 11001";
              $('.11001').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

             if(rank == 1 &&  license == 1 && address == 1 && contact == 0 && username == 0)
            {
              document.getElementById('EmpLicense').className = "form-horizontal 11100";
              $('.11100').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

             if(rank == 0 &&  license == 0 && address == 0 && contact == 1 && username == 1)
            {
              document.getElementById('EmpLicense').className = "form-horizontal 00011";
              $('.00011').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

             if(rank == 1 &&  license == 0 && address == 0 && contact == 0 && username == 1)
            {
              document.getElementById('EmpLicense').className = "form-horizontal 10001";
              $('.10001').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                          
            }
          });
            }

             if(rank == 1 &&  license == 1 && address == 0 && contact == 0 && username == 0)
            {
              document.getElementById('EmpLicense').className = "form-horizontal 11000";
              $('.11000').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

             if(rank == 1 &&  license == 0 && address == 0 && contact == 0 && username == 0)
            {
              document.getElementById('EmpLicense').className = "form-horizontal 10000";
              $('.10000').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                               
            }
          });
            }

             if(rank == 0 &&  license == 1 && address == 0 && contact == 0 && username == 0)
            {
              document.getElementById('EmpLicense').className = "form-horizontal 01000";
              $('.01000').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

             if(rank == 0 &&  license == 0 && address == 1 && contact == 0 && username == 0)
            {
              document.getElementById('emp_address').className = "form-horizontal 00100";
              $('.00100').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                      
            }
          });
            }

             if(rank == 0 &&  license == 0 && address == 0 && contact == 1 && username == 0)
            {
              document.getElementById('EmpLicense').className = "form-horizontal 00010";
              $('.00010').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              contact: {
                validators: {
                  regexp: {
                    regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                    message: 'Invalid input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

             if(rank == 0 &&  license == 0 && address == 0 && contact == 0 && username == 1)
            {
              document.getElementById('EmpLicense').className = "form-horizontal 00001";
              $('.00001').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },  
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

             if(rank == 1 &&  license == 0 && address == 1 && contact == 0 && username == 1)
            {
              document.getElementById('EmpLicense').className = "form-horizontal 10101";
              $('.10101').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },  
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                          
            }
          });
            }

             if(rank == 0 &&  license == 1 && address == 0 && contact == 1 && username == 0)
            {
              document.getElementById('EmpLicense').className = "form-horizontal 01010";
              $('.01010').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              contact: {
                validators: {
                  regexp: {
                    regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                    message: 'Invalid input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }



        }
      });
    });


$('.empviewModalbtn').click(function(){
  var address     =     ""; 
  var username    =     ""; 
  var formChanges =     ""; 
  var password    =     ""; 
  var rank        =     ""; 
  var license     =     ""; 
  var contact     =     ""; 
  var name        =     "";
  var rank_name   =     "";
  var emp_fname   =     "";
  var emp_mname   =     "";
  var emp_lname   =     "";
  var emp_address =     "";
  var emp_contact =     "";
  var license_no  =     "";
  $.ajax
  ({
    url: '/viewEmpDetails',
    type: 'get',
    data:  { id:$(this).data('id')},
    dataType : 'json',

    success:function(response){

        response.forEach(function(data){
        address += data.address;
        username  += data.username;
        password  += data.password;
        rank  += data.rank;
        license += data.license;
        contact += data.contact;
        name += data.name;
        rank_name += data.rank_name;
        emp_fname +=  data.emp_fname;
        emp_mname +=  data.emp_mname;
        emp_lname +=  data.emp_lname;
        emp_address += data.emp_address;
        emp_contact += data.emp_contact;
        license_no  += data.license_no;
      })

      $('.geninfoview').empty(); 
          if(name==1){

            

            $('.geninfoview').append('<legend>General Information</legend><div class="form-group"> <label class="col-xs-3 control-label">First Name</label> <div class="col-md-7"> <div class="input-group"> <div class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i></div> <input disabled value="'+emp_fname+'" type="text" class="form-control ff2" name="firstname"> </div> </div> </div> <div class="form-group"> <label class="col-xs-3 control-label">Middle Name</label> <div class="col-md-7"> <div class="input-group"> <div class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i></div> <input type="text" class="form-control mm2" disabled value="'+emp_mname+'"> </div> </div> </div> <div class="form-group"> <label class="col-xs-3 control-label">Last Name</label> <div class="col-md-7"> <div class="input-group"> <div class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i></div> <input type="text" class="form-control ll2" disabled value="'+emp_lname+'"> </div> </div> </div>');
          }

          if(rank==1){

            $('.geninfoview').append('<div class="form-group" id="medtechrank"> <label class="col-xs-3 control-label">Position</label> <div class="col-md-7"> <div class="input-group"> <div class="input-group-addon"><i class="fa fa-id-badge" aria-hidden="true"></i></div>  <input type="text" class="form-control rankNameView" value="'+rank_name+'" disabled> </div> </div> </div>'); 

          }
          

          
          if(address==1){
            $('.geninfoview').append('<div class="form-group"> <label class="col-xs-3 control-label">Address</label> <div class="col-md-7"> <div class="input-group"> <div class="input-group-addon"><i class="fa fa-address-card-o" aria-hidden="true"></i></div> <input type="text" class="form-control" disabled value="'+emp_address+'"> </div> </div> </div>');
          }
          if(contact==1){
            $('.geninfoview').append('<div class="form-group"> <label class="col-xs-3 control-label">Contact Number</label> <div class="col-md-7"> <div class="input-group"> <div class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></div> <input type="text" class="form-control" disabled value="'+emp_contact+'"> </div> </div> </div>');
          }
          if(license==1){
            $('.geninfoview').append(' <div class="form-group"> <label class="col-xs-3 control-label">License Number</label> <div class="col-md-7"> <div class="input-group"> <div class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></div> <input type="text" class="form-control" disabled value="'+license_no+'"> </div> </div> </div>');
          }


    }

  });
  return true;
});



$('.empupdateModalbtn').click(function(){
  var address     =     ""; 
  var username    =     ""; 
  var formChanges =     ""; 
  var password    =     ""; 
  var rank        =     ""; 
  var license     =     ""; 
  var contact     =     ""; 
  var name        =     "";
  var rank_name   =     "";
  var rank_id     =     "";
  var emp_fname   =     "";
  var emp_mname   =     "";
  var emp_lname   =     "";
  var emp_address =     "";
  var emp_contact =     "";
  var license_no  =     "";
  var emp_id      =     "";
  var emp_type_id =     "";
  var emp_pic = "";
  $('#upEmpLicense').bootstrapValidator('destroy',true);
  $.ajax
  ({
    url: '/updateEmpDetails',
    type: 'get',
    data:  { id:$(this).data('id')},
    
    dataType : 'json',

    success:function(response){
        response.forEach(function(data){
        address += data.address;
        username  += data.username;
        password  += data.password;
        rank  += data.rank;
        license += data.license;
        contact += data.contact;
        name += data.name;
        rank_name += data.rank_name;
        rank_id += data.emp_medtech_rank_id;
        emp_fname +=  data.emp_fname;
        emp_mname +=  data.emp_mname;
        emp_lname +=  data.emp_lname;
        emp_address += data.emp_address;
        emp_contact += data.emp_contact;
        license_no  += data.license_no;
        emp_id += data.emp_id;
        emp_type_id += data.emp_type_id;
        emp_pic +=data.emp_pic;
        $('#update_emp_id').val(emp_id);
        $('#update_emp_type').val(emp_type_id);
      })
      $('.geninfoupdate').empty(); 
          if(rank==1){
            $('.geninfoupdate').append('<div class="form-group" id="medtechrank">  <div class="col-md-10 col-md-offset-1"> <div class="input-group"> <div class="input-group-addon">Position <sup>*</sup></div> <select class="form-control" id="selranks" name="rank_id" style="width: 100%;"> @php $ranks2 = $ranks @endphp @foreach($ranks2 as $ranks) <option value="{{ $ranks->rank_id }}" >{{ $ranks->rank_name }}</option> @endforeach </select> </div> </div> </div>'); 
            $('#selranks').val(rank_id);
            
          }
          if(name==1){
            $('.geninfoupdate').append('<legend>General Information</legend><div class="form-group"> <div class="col-md-10 col-md-offset-1"> <div class="input-group"> <div class="input-group-addon">First Name <sup>*</sup></div> <input  value="'+emp_fname+'" type="text" class="form-control ff2" name="firstname"> </div> </div> </div> <div class="form-group"> <div class="col-md-10 col-md-offset-1"> <div class="input-group"> <div class="input-group-addon">Middle Name</div> <input type="text" class="form-control mm2"  value="'+emp_mname+'" name="middlename"> </div> </div> </div> <div class="form-group"> <div class="col-md-10 col-md-offset-1"> <div class="input-group"> <div class="input-group-addon">Last Name <sup>*</sup></div> <input type="text" class="form-control ll2"  value="'+emp_lname+'" name="lastname"> </div> </div> </div>');
          }
          if(address==1){
            $('.geninfoupdate').append('<div class="form-group"> <div class="col-md-10 col-md-offset-1"> <div class="input-group"> <div class="input-group-addon">Address <sup>*</sup></div> <input type="text" class="form-control"  value="'+emp_address+'" name="address"> </div> </div> </div>');
          }
          if(contact==1){
            $('.geninfoupdate').append('<div class="form-group"> <div class="col-md-10 col-md-offset-1"> <div class="input-group"> <div class="input-group-addon">Contact Number <sup>*</sup></div> <input type="text" class="form-control"  value="'+emp_contact+'" name="contact"> </div> </div> </div>');
          }
          if(license==1){
            $('.geninfoupdate').append(' <div class="form-group"> <div class="col-md-10 col-md-offset-1"> <div class="input-group"> <div class="input-group-addon">License No. <sup>*</sup></div> <input type="text" class="form-control"  value="'+license_no+'" name="license"> </div> </div> </div>');
          }
          if(name == 1){
          $('.geninfoupdate').append('<label class="control-label col-md-3 col-md-offset-1">Image Upload</label> <div class="col-md-8"> <div class="fileupload fileupload-new" data-provides="fileupload"> <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"> <img src="/Employee_images/'+emp_pic+'" alt="" /> </div> <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div> <div> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" name="emp_pic" value="'+emp_pic+'"> </span> <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a> </div> </div> </div>')
          $('.geninfoupdate').append('<input type="hidden" value="'+emp_pic+'" name="defaultemp">')
          }
          if(rank == 1 &&  license == 1 && address == 1 && contact == 1 && username == 1)
            {
    
              document.getElementById('upEmpLicense').className = "form-horizontal 11111";  
// 11111
            $('.11111').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              contact: {
                validators: {
                  regexp: {
                    regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                    message: 'Invalid input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
        
              
            }

             if(rank == 0 &&  license == 0 && address == 0 && contact == 0 && username == 0)
            {
              document.getElementById('upEmpLicense').className = "form-horizontal 00000";

              $('.00000').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                           
            }
          });

            }

             if(rank == 0 &&  license == 1 && address == 1 && contact == 1 && username == 1)
            {
              document.getElementById('upEmpLicense').className = "form-horizontal 01111";
              $('.01111').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              contact: {
                validators: {
                  regexp: {
                    regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                    message: 'Invalid input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

             if(rank == 1 &&  license == 0 && address == 1 && contact == 1 && username == 1)
            {
              document.getElementById('upEmpLicense').className = "form-horizontal 10111";
              $('.10111').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              contact: {
                validators: {
                  regexp: {
                    regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                    message: 'Invalid input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                            
            }
          });

            }

             if(rank == 1 &&  license == 1 && address == 0 && contact == 1 && username == 1)
            {
              document.getElementById('upEmpLicense').className = "form-horizontal 11011";
              $('.11011').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              contact: {
                validators: {
                  regexp: {
                    regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                    message: 'Invalid input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });

            }

             if(rank == 1 &&  license == 1 && address == 1 && contact == 0 && username == 1)
            {
              document.getElementById('upEmpLicense').className = "form-horizontal 11101";
              $('.11101').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

             if(rank == 1 &&  license == 1 && address == 1 && contact == 1 && username == 0)
            {
              document.getElementById('upEmpLicense').className = "form-horizontal 11110";
              $('.11110').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              contact: {
                validators: {
                  regexp: {
                    regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                    message: 'Invalid input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

             if(rank == 0 &&  license == 0 && address == 1 && contact == 1 && username == 1)
            {
              document.getElementById('upEmpLicense').className = "form-horizontal 00111";
              $('.00111').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              contact: {
                validators: {
                  regexp: {
                    regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                    message: 'Invalid input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                       
            }
          });
            }

             if(rank == 1 &&  license == 0 && address == 0 && contact == 1 && username == 1)
            {
              document.getElementById('upEmpLicense').className = "form-horizontal 10011";
              $('.10011').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              contact: {
                validators: {
                  regexp: {
                    regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                    message: 'Invalid input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },  
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                        
            }
          });
            }

             if(rank == 1 &&  license == 1 && address == 0 && contact == 0 && username == 1)
            {
              document.getElementById('upEmpLicense').className = "form-horizontal 11001";
              $('.11001').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

             if(rank == 1 &&  license == 1 && address == 1 && contact == 0 && username == 0)
            {
              document.getElementById('upEmpLicense').className = "form-horizontal 11100";
              $('.11100').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

             if(rank == 0 &&  license == 0 && address == 0 && contact == 1 && username == 1)
            {
              document.getElementById('upEmpLicense').className = "form-horizontal 00011";
              $('.00011').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

             if(rank == 1 &&  license == 0 && address == 0 && contact == 0 && username == 1)
            {
              document.getElementById('upEmpLicense').className = "form-horizontal 10001";
              $('.10001').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                          
            }
          });
            }

             if(rank == 1 &&  license == 1 && address == 0 && contact == 0 && username == 0)
            {
              document.getElementById('upEmpLicense').className = "form-horizontal 11000";
              $('.11000').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

             if(rank == 1 &&  license == 0 && address == 0 && contact == 0 && username == 0)
            {
              document.getElementById('upEmpLicense').className = "form-horizontal 10000";
              $('.10000').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                               
            }
          });
            }

             if(rank == 0 &&  license == 1 && address == 0 && contact == 0 && username == 0)
            {
              document.getElementById('upEmpLicense').className = "form-horizontal 01000";
              $('.01000').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

             if(rank == 0 &&  license == 0 && address == 1 && contact == 0 && username == 0)
            {
              document.getElementById('emp_address').className = "form-horizontal 00100";
              $('.00100').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                      
            }
          });
            }

             if(rank == 0 &&  license == 0 && address == 0 && contact == 1 && username == 0)
            {
              document.getElementById('upEmpLicense').className = "form-horizontal 00010";
              $('.00010').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              contact: {
                validators: {
                  regexp: {
                    regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                    message: 'Invalid input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

             if(rank == 0 &&  license == 0 && address == 0 && contact == 0 && username == 1)
            {
              document.getElementById('upEmpLicense').className = "form-horizontal 00001";
              $('.00001').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },  
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

             if(rank == 1 &&  license == 0 && address == 1 && contact == 0 && username == 1)
            {
              document.getElementById('upEmpLicense').className = "form-horizontal 10101";
              $('.10101').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              rank_id: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
                    message: 'Special characters are not allowed.'
                  },
                }
              }, 
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },  
              username: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Please enter at least 2 characters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },     
              password: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              },      
              confirmpass: {
                validators: {
                  stringLength: {
                    min: 6,
                    max: 30,
                    message:'Password must be atleast 6 charaters.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                          
            }
          });
            }

             if(rank == 0 &&  license == 1 && address == 0 && contact == 1 && username == 0)
            {
              document.getElementById('upEmpLicense').className = "form-horizontal 01010";
              $('.01010').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              firstname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              middlename: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              lastname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              contact: {
                validators: {
                  regexp: {
                    regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                    message: 'Invalid input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              license: {
                validators: {
                  regexp: {
                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
                    message: 'Invalid License Number Format.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },                                             
            }
          });
            }

    }

  });
  return true;
});


</script>

 
@endsection