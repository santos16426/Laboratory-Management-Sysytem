@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-handshake-o" aria-hidden="true"></i><span> Transaction</span>
@endsection

@section ('breadParentName')
<i class="fa fa-heartbeat" aria-hidden="true"></i><span> Medical Services</span>
@endsection

@section('maintenanceactive')
<a href="">
@endsection

@section('transaction','active')
@section('medicalservice','active')
@section ('breadactivePage','Patient List')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Rebate Percentage
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<div class="btn-group pull-right">
						<a class="btn btn-info" style="margin-left: -20%" href="#addModal" data-toggle="modal" ><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; New </a>
					</div>
					<table class="table table-bordered table-hover dataTable" id="patientTbl">
			      <thead>
			        <tr>
			          <th>Last Name</th>
			          <th>First Name</th>
			          <th>Middle Name</th>
			          <th>Patient Type</th>
			          <th>Address</th>
			          <th>Birthdate</th>
			          <th>Age</th>
			          <th>Contact</th>
			          <th>Civil Status</th>
			          <th>Gender</th>
			          <th>Action</th>
			        </tr>
			      </thead>
			      <tbody>
			        @foreach($table as $table)
			        <tr>
			          <td>{{ $table->patient_lname }}</td>
			          <td>{{ $table->patient_fname }}</td>
			          <td>{{ $table->patient_mname }}</td>
			          <td>{{ $table->ptype_name }}</td>
			          <td>{{ $table->patient_address }}</td>
			          <td>{{ $table->patient_birthdate }}</td>
			          <td>{{ $table->age }}</td>
			          <td>{{ $table->patient_contact }}</td>
			          <td>{{ $table->patient_civilstatus }}</td>
			          <td>{{ $table->patient_gender }}</td>
			          <td>
			            <a class="btn btn-warning btn-xs upservtype" href="/processMedicalService?id={{ $table->patient_id }}"><i class="fa fa-wrench" aria-hidden="true"></i></a>
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
<div class="modal fade" id = "addModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <h4 class="modal-title"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Patient</h4>
      </div>
      <div class="modal-body">
        <form action="/save_patient" method="POST" class="form-horizontal">
        {{ csrf_field() }}
					<div class="form-group">
						<div class="col-md-10 col-md-offset-1 input-group">
							<span class="input-group-addon">Patient Type <sup>*</sup></span>
							<select class="form-control select2" onchange="showCorpadd();" id="addpatienttype" name="patienttype" style="width: 100%">
								@foreach($patienttype as $patienttype)
									<option value="{{ $patienttype->ptype_id }}">{{ $patienttype->ptype_name }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group hidden" id="addcorp">
						<div class="col-md-10 col-md-offset-1 input-group">
							<span class="input-group-addon">Corporate Name <sup>*</sup></span>
							<select class="form-control select2" name="addcorpid" id="addcorpid" style="width: 100%">
								@foreach($corps as $corps)
									<option value="{{ $corps->corp_id }}">{{ $corps->corp_name }}</option>
								@endforeach
							</select>
						</div>
					</div>

	        <div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<div class="input-group">
								<div class="input-group-addon">
									First Name <sup>*</sup>
								</div>
								<input  name="patient_fname" type="text" placeholder="First Name" class="form-control input-md" required>
							</div>
						</div>  
					</div>      

					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<div class="input-group">
								<div class="input-group-addon">
									Middle Name
								</div>
								<input  name="patient_mname" type="text" placeholder="Middle Name" class="form-control input-md">
							</div>
						</div>  
					</div> 

					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<div class="input-group">
								<div class="input-group-addon">
									Last Name <sup>*</sup>
								</div>
								<input  name="patient_lname" type="text" placeholder="Last Name" class="form-control input-md" required>
							</div>
						</div>  
					</div> 

					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<div class="input-group">
								<div class="input-group-addon">
									Address <sup>*</sup>
								</div>
								<input  name="patient_address" type="text" placeholder="Address" class="form-control input-md" required>
							</div>
						</div>  
					</div> 

					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<div class="input-group">
								<div class="input-group-addon">
									Contact Number <sup>*</sup>
								</div>
								<input  name="patient_contact" type="text" placeholder="Contact Number" class="form-control input-md" required>
							</div>
						</div>  
					</div>

					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<div class="input-group">
								<div class="input-group-addon">
									Email Address
								</div>
								<input  name="patient_email" type="text" placeholder="Email Address" class="form-control input-md" required>
							</div>
						</div>  
					</div>
					<div class="col-md-5 col-md-offset-2">
						<div class="form-group">
							<div class="col-md-5 col-md-offet-4">
								<div class="input-group">
									<div class="input-group-addon">
										Birthday <sup>*</sup>
									</div>
									<input  name="birthday" type="date" id="birthday" class="form-control" required onblur="getage()">
								</div>
							</div>  
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<div class="col-md-6 col-md-offset-1">
								<div class="input-group">
									<div class="input-group-addon">
										Age <sup>*</sup>
									</div>
									<input  name="age" id="age" type="text"  class="form-control" required readonly="">
								</div>
							</div>  
						</div>
					</div>
					<div class="col-md-5 col-md-offet-1">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Gender <sup>*</sup></span>
							<select class="form-control select2" name = "gender" style="width: 100%">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
					</div>
					</div>
					<div class="col-md-5 col-md-offset-1">
					<div class="form-group">
						<div class="input-group">
						<span class="input-group-addon">Civil Status <sup>*</sup></span>
						<select class="form-control select2" name = "civil_status" style="width: 100%">
						<option value="Single">Single</option>
						<option value="Married">Married</option>
						<option value="Widowed">Widowed</option>
						<option value="Divorced">Divorced</option>
						</select>
						</div>
						</div>
					</div>
        
        
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-xs btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>
        </div>
        </form>
      </div>
    </div>  
  </div>
</div>
@endsection

@section('additional')
<script type="text/javascript">

$(function() {
$('.select2').select2();
$('#patientTbl').DataTable({
  'paging'      : true,
  'lengthChange': true,
  'searching'   : true,
  'ordering'    : true,
  'info'        : true,
  'autoWidth'   : true

});

});
</script>
<script type="text/javascript">
	function getage(){
      var dnow
      var bday
          var a 
          var checker
          var temp
          var yr
          var dt
          var gbday = document.getElementById("birthday").value

          bday = new Date(gbday)
          dnow = new Date()
          a = dnow.getFullYear() - bday.getFullYear()
          yr = bday.getFullYear() + a
          dt = (dnow.getMonth() + 1) + "/" + dnow.getDate() + "/" + dnow.getFullYear()
          checker = (bday.getMonth() + 1) + "/" + bday.getDate() + "/" + yr
         
          if(Date.parse(dt) < Date.parse(checker)){
       a = a - 1
          }
         if(a<0){
          a=0
         }

          document.getElementById("age").value=a;
  }
  function getage2(id){
      var dnow
      var bday
          var a 
          var checker
          var temp
          var yr
          var dt
          var gbday = document.getElementById("birthday"+id).value

          bday = new Date(gbday)
          dnow = new Date()
          a = dnow.getFullYear() - bday.getFullYear()
          yr = bday.getFullYear() + a
          dt = (dnow.getMonth() + 1) + "/" + dnow.getDate() + "/" + dnow.getFullYear()
          checker = (bday.getMonth() + 1) + "/" + bday.getDate() + "/" + yr
         
          if(Date.parse(dt) < Date.parse(checker)){
       a = a - 1
          }
         if(a<0){
          a=0
         }

          document.getElementById("age"+id).value=a;
  }
  function showCorpadd(){
  	var selectBox = document.getElementById('addpatienttype')
    var userInput = selectBox.options[selectBox.selectedIndex].value

    if(userInput == '2')
    {
      
      document.getElementById('addcorp').className = ('form-group')
      
    }
    else if(userInput == '1')
    {
     document.getElementById('addcorp').className = ('form-group hidden')
     
    }
  }
</script>

@endsection