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
					
					<a class="btn btn-info" style="margin-left: -20%" href="#addModal" data-toggle="modal" id="addEmpBtn" ><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; New </a>
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
                <td><img src="/Employee_images/{{ $emp1->emp_pic }}" style="height: 20px;display: block"></td>
			          <td>{{ $emp1->emp_lname }}</td>
			          <td>{{ $emp1->emp_fname }}</td>
			          <td>{{ $emp1->emp_mname }}</td>
			          <td>{{ $emp1->role_name }}</td>
			          <td>
                @if($emp1->RoleStatus == 1 and $emp1->EmpStatus == 1 and $emp1->LabStatus == 1)
			            <button class="btn btn-warning btn-xs empupdateModalbtn" data-target="#updateModal" data-id="{{ $emp1->emp_id }}" data-toggle="modal"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</button>
			            <button class="btn btn-info btn-xs empviewModalbtn" data-target="#viewModal"  data-id="{{ $emp1->emp_id }}" data-toggle="modal"><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp; View</button>
			            <button class="btn btn-danger btn-xs empdeleteModalbtn" data-id="{{ $emp1->emp_id }}" ><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</button>
                @endif
                @if($emp1->RoleStatus == 0 or $emp1->EmpStatus == 0 or $emp1->LabStatus == 0)
                  <button class="btn btn-warning btn-xs" disabled><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</button>
                  <button class="btn btn-info btn-xs" disabled ><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp; View</button>
                  <button class="btn btn-danger btn-xs" disabled><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</button>
                @endif
			          </td>
                <td>
                @if($emp1->RoleStatus == 1 and $emp1->EmpStatus == 1 and $emp1->LabStatus == 1)
                <span class="badge bg-success">Available</span>
                @endif
                @if($emp1->RoleStatus == 0 or $emp1->EmpStatus == 0 or $emp1->LabStatus == 0)
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
      <form action="/update_employee" method="POST" class="form-horizontal">
      <input type="hidden" name="update_emp_type" id="update_emp_type">
      <input type="hidden" name="update_emp_id" id = "update_emp_id">
        <div class="modal-body">
          <div class="form-group">
          </div>        
          <fieldset class="geninfoupdate">
          </fieldset>
        </div>
        <div class="modal-footer">
          <button  class="btn btn-warning"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Update</button>
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
          <button  class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>
        </div>
        {{ csrf_field() }}
      </form>
    </div>  
  </div>
</div>

@endsection
@section('additional')

<script>
$(function () {
$('#empTable').DataTable({
  'paging'      : true,
  'lengthChange': true,
  'searching'   : true,
  'ordering'    : true,
  'info'        : true,
  'autoWidth'   : true
});
$('.employeeTypeDropDown').select2({
  placeholder: "Select employee type"
});


   

});
</script>
<script type="text/javascript">
  $('.empdeleteModalbtn').click(function(){
    $('#empid').val($(this).data('id'));
    $('#deleteModal').modal('show');
  });
$('.employeeTypeDropDown').on('change',function(){ 
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

          $('.accountinfo').empty();
          if((username==1)&&(password==1)){
          $('.accountinfo').append(' <legend>Account Information</legend><div class="form-group"><div class="col-md-10 col-md-offset-1"> <div class="input-group"> <div class="input-group-addon">Username <sup style="color:red">*</sup></div><input type="text" class="form-control" name="username" placeholder="Username"></div></div></div><div class="form-group"><div class="col-md-10 col-md-offset-1"> <div class="input-group"> <div class="input-group-addon">Password <sup style="color:red">*</sup></div><input type="password" class="form-control" name="password" placeholder="Password"></div></div></div><div class="form-group"><div class="col-md-10 col-md-offset-1"> <div class="input-group"> <div class="input-group-addon">Confirm Password <sup style="color:red">*</sup></div><input type="password" class="form-control" name="confirmpass" placeholder="Confirm Password"></div></div></div>');
          }
          $('.accountinfo').append('<label class="control-label col-md-3 col-md-offset-1">Image Upload</label> <div class="col-md-8"> <div class="fileupload fileupload-new" data-provides="fileupload"> <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"> <img src="{{ asset("/Employee_images/default.jpg") }}" alt="" /> </div> <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div> <div> <span class="btn btn-white btn-file"> <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> <input type="file" class="default" name="emp_pic" capture="camera" accept="image/*"> </span> <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a> </div> </div> </div>')
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

            // var firstdiv = document.createElement('div');
            // firstdiv.setAttribute('class','form-group firstdiv');
            // $('.geninfoview').append(firstdiv);

            // var labelfname = document.createElement('label');
            // labelfname.setAttribute('class','col-xs-3 control-label fnamelabel');
            // $('.firstdiv').append(labelfname);

            

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
        emp_type_id += data.emp_type_id
        $('#update_emp_id').val(emp_id);
        $('#update_emp_type').val(emp_type_id);
      })
      $('.geninfoupdate').empty(); 
          if(rank==1){
            $('.geninfoupdate').append('<div class="form-group" id="medtechrank"> <label class="col-xs-3 control-label">Position</label> <div class="col-md-7"> <div class="input-group"> <div class="input-group-addon"><i class="fa fa-id-badge" aria-hidden="true"></i></div> <select class="form-control" id="selranks" name="rank_id" style="width: 100%;"> @php $ranks2 = $ranks @endphp @foreach($ranks2 as $ranks) <option value="{{ $ranks->rank_id }}" >{{ $ranks->rank_name }}</option> @endforeach </select> </div> </div> </div>'); 
            $('#selranks').val(rank_id);
            
          }
          

          if(name==1){
            $('.geninfoupdate').append('<legend>General Information</legend><div class="form-group"> <label class="col-xs-3 control-label">First Name</label> <div class="col-md-7"> <div class="input-group"> <div class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i></div> <input  value="'+emp_fname+'" type="text" class="form-control ff2" name="firstname"> </div> </div> </div> <div class="form-group"> <label class="col-xs-3 control-label">Middle Name</label> <div class="col-md-7"> <div class="input-group"> <div class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i></div> <input type="text" class="form-control mm2"  value="'+emp_mname+'" name="middlename"> </div> </div> </div> <div class="form-group"> <label class="col-xs-3 control-label">Last Name</label> <div class="col-md-7"> <div class="input-group"> <div class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i></div> <input type="text" class="form-control ll2"  value="'+emp_lname+'" name="lastname"> </div> </div> </div>');
          }
          if(address==1){
            $('.geninfoupdate').append('<div class="form-group"> <label class="col-xs-3 control-label">Address</label> <div class="col-md-7"> <div class="input-group"> <div class="input-group-addon"><i class="fa fa-address-card-o" aria-hidden="true"></i></div> <input type="text" class="form-control"  value="'+emp_address+'" name="address"> </div> </div> </div>');
          }
          if(contact==1){
            $('.geninfoupdate').append('<div class="form-group"> <label class="col-xs-3 control-label">Contact Number</label> <div class="col-md-7"> <div class="input-group"> <div class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></div> <input type="text" class="form-control"  value="'+emp_contact+'" name="contact"> </div> </div> </div>');
          }
          if(license==1){
            $('.geninfoupdate').append(' <div class="form-group"> <label class="col-xs-3 control-label">License Number</label> <div class="col-md-7"> <div class="input-group"> <div class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></div> <input type="text" class="form-control"  value="'+license_no+'" name="license"> </div> </div> </div>');
          }


    }

  });
  return true;
});


</script>
@endsection