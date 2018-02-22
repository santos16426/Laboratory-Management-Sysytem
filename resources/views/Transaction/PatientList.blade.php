@if((Session::get('addpatient')!= 1)&&(Session::get('availserv')!= 1)&&(Session::get('delpatient')== 1 )&&(Session::get('uppatient')==1))
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif
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
				Patient List
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<div class="btn-group pull-right">
						@if(Session::get('addpatient')==1)
						<a class="btn btn-info" style="margin-left: -40%" href="#addModal" data-toggle="modal" ><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; New </a>
						@endif
					</div>
					<table class="table table-bordered table-hover dataTable" id="patientTbl">
			      <thead>
			        <tr>
			          <th>Last Name</th>
			          <th>First Name</th>
			          <th>Middle Name</th>
			          <th>Patient Type</th>
			          <th>Address</th>
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
			          <td>{{ $table->ptype_name }}
			          	@if($table->ptype_name == 'Corporate')
			          	({{ $table->corp_name }})
			          	@endif
			          </td>
			          <td>{{ $table->patient_address }}</td>
			          <td>{{ $table->age }}</td>
			          <td>{{ $table->patient_contact }}</td>
			          <td>{{ $table->patient_civilstatus }}</td>
			          <td>{{ $table->patient_gender }}</td>
			          <td>
			           <!--  <a class="btn btn-info btn-xs upservtype" onclick="availserv({{ $table->patient_id }})" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> Avail Service </a> -->
			           @if(Session::get('availserv')==1)
			            <a class="btn btn-info btn-xs availservice" data-patientid="{{ $table->patient_id }}"  ><i class="fa fa-shopping-cart" aria-hidden="true"></i> Avail Service </a>
			            @endif
			           	@if(Session::get('uppatient')==1)
			           	<a class="btn btn-warning btn-xs uppatientbtn" data-toggle="modal" href="#updatePatientModal" data-id="{{ $table->patient_id }}"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
			           	@endif
			           	@if(Session::get('delpatient')==1)
			           	<button type="button" class="btn btn-danger btn-xs delpatientbtn" data-id="{{ $table->patient_id }}"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</button>
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
<div class="modal fade" id="updatePatientModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header btn-warning">
				<h4 class="modal-title"><i class="fa fa-user"></i> Edit Patient</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="updatepatientinfo" method="POST" action="/update_patient">
					{{ csrf_field() }}
					<input type="hidden" name="uppatient_id" id="uppatient_id" value="">
					<div class="form-group" style="margin-right: 39%">
						<div class="col-md-10 col-md-offset-2 input-group">
							<span class="input-group-addon">Patient Type <sup>*</sup></span>
							<select class="form-control select2" onchange="upshowCorpadd();" id="uppatienttype" name="uppatienttype" style="width: 179%">
								@foreach($patienttype as $uppatienttype)
									<option value="{{ $uppatienttype->ptype_id }}">{{ $uppatienttype->ptype_name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group hidden" id="upcorp" style="margin-right: 39%">
						<div class="col-md-10 col-md-offset-2 input-group">
							<span class="input-group-addon">Corporate Name <sup>*</sup></span>
							<select class="form-control select2" name="upcorpid" id="upcorpid" style="width: 186%">
								@foreach($corps as $upcorps)
									<option value="{{ $upcorps->corp_id }}">{{ $upcorps->corp_name }}</option>
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
								<input  name="uppatient_fname" id="uppatient_fname" type="text" placeholder="First Name" class="form-control input-md" required>
							</div>
						</div>  
					</div>      

					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<div class="input-group">
								<div class="input-group-addon">
									Middle Name
								</div>
								<input  name="uppatient_mname" id="uppatient_mname" type="text" placeholder="Middle Name" class="form-control input-md">
							</div>
						</div>  
					</div> 

					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<div class="input-group">
								<div class="input-group-addon">
									Last Name <sup>*</sup>
								</div>
								<input  name="uppatient_lname" id="uppatient_lname" type="text" placeholder="Last Name" class="form-control input-md" required>
							</div>
						</div>  
					</div> 

					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<div class="input-group">
								<div class="input-group-addon">
									Address <sup>*</sup>
								</div>
								<input  name="uppatient_address" id="uppatient_address" type="text" placeholder="Address" class="form-control input-md" required>
							</div>
						</div>  
					</div> 

					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<div class="input-group">
								<div class="input-group-addon">
									Contact Number <sup>*</sup>
								</div>
								<input  name="uppatient_contact" id="uppatient_contact" type="text" placeholder="Contact Number" class="form-control input-md" required>
							</div>
						</div>  
					</div>

					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<div class="input-group">
								<div class="input-group-addon">
									Email Address
								</div>
								<input  name="uppatient_email" id="uppatient_email" type="text" placeholder="Email Address" class="form-control input-md">
							</div>
						</div>  
					</div>
					<div class="form-group" style="margin-right: 14%">
					<div class="col-md-12">
					<div class="col-md-6 col-md-offset-1">
						<div class="form-group">
							<div class="col-md-11 col-md-offet-1">
								<div class="input-group">
									<div class="input-group-addon">
										Birthday <sup>*</sup>
									</div>
									<div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="12-02-2012"  class="input-append date dpYears">
										<input class="form-control form-control-inline input-medium default-date-picker" onblur="upgetage()" name="upbirthday" id="upbirthday" size="16" type="text" required>
									</div>
								</div>
							</div>  
						</div>
					</div>
				
					
					 
					
					<div class="col-md-5">
						<div class="form-group">
							<div class="col-md-7 col-md-offset-1">
								<div class="input-group">
									<div class="input-group-addon">
										Age <sup>*</sup>
									</div>
									<input  name="upage" id="upage" type="text"  class="form-control" readonly="">
								</div>
							</div>  
						</div>
					</div>
					</div>
					
					</div>
					 <div class="form-group">
                            <label class="col-lg-1 col-md-offset-1 control-label">Gender:</label>
                            <div class="col-lg-5">
                                <div class="radio">
                                    <label for="upupMale">
                                        <input type="radio" id="upupMale" name="upgender" value="Male" /> Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="upupFemale">
                                        <input type="radio" id="upupFemale" name="upgender" value="Female" /> Female
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-1 col-md-offset-1 control-label">Civil Status:</label>
                            <div class="col-lg-5">
                                <div class="radio">
                                    <label for="upupSingle">
                                        <input type="radio" id="upupSingle" name="upcivil_status" value="Single" /> Single
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="upupMarried">
                                        <input type="radio" id="upupMarried" name="upcivil_status" value="Married" /> Married
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="upupDivorced">
                                        <input type="radio" id="upupDivorced" name="upcivil_status" value="Divorced" /> Divorced
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="upupWidowed">
                                        <input type="radio" id="upupWidowed" name="upcivil_status" value="Widowed" /> Widowed
                                    </label>
                                </div>
                            </div>
                        </div>	
                        <div class="modal-footer">
				          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
				          <button type="submit" class="btn btn-xs btn-warning"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Update</button>
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
      <form method="post" action="/deletePatient" id="delform">
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
<div class="modal fade" id = "addModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <h4 class="modal-title"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Patient</h4>
      </div>
      <div class="modal-body">
        <form action="/save_patient" method="POST" class="form-horizontal age" id="patientinfo">
        {{ csrf_field() }}
					<div class="form-group" style="margin-right: 39%">
						<div class="col-md-10 col-md-offset-2 input-group">
							<span class="input-group-addon">Patient Type <sup>*</sup></span>
							<select class="form-control select2" onchange="showCorpadd();" id="addpatienttype" name="patienttype" style="width: 179%">
								@foreach($patienttype as $patienttype)
									<option value="{{ $patienttype->ptype_id }}">{{ $patienttype->ptype_name }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group hidden" id="addcorp" style="margin-right: 39%">
						<div class="col-md-10 col-md-offset-2 input-group">
							<span class="input-group-addon">Corporate Name <sup>*</sup></span>
							<select class="form-control select2" name="addcorpid" id="addcorpid" style="width: 186%">
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
								<input  name="patient_email" type="text" placeholder="Email Address" class="form-control input-md">
							</div>
						</div>  
					</div>
					<div class="form-group" style="margin-right: 14%">
					<div class="col-md-12">
					<div class="col-md-6 col-md-offset-1">
						<div class="form-group">
							<div class="col-md-11 col-md-offet-1">
								<div class="input-group">
									<div class="input-group-addon">
										Birthday <sup>*</sup>
									</div>
									<div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="12-02-2012"  class="input-append date dpYears">
										<input class="form-control form-control-inline input-medium default-date-picker" onblur="getage()" name="birthday" id="birthday" size="16" type="text" required>
									</div>
								</div>
							</div>  
						</div>
					</div>
				
					
					 
					
					<div class="col-md-5">
						<div class="form-group">
							<div class="col-md-7 col-md-offset-1">
								<div class="input-group">
									<div class="input-group-addon">
										Age <sup>*</sup>
									</div>
									<input  name="age" id="age" type="text"  class="form-control" readonly="">
								</div>
							</div>  
						</div>
					</div>
					</div>
					
					</div>
					 <div class="form-group">
                            <label class="col-lg-1 col-md-offset-1 control-label">Gender:</label>
                            <div class="col-lg-5">
                                <div class="radio">
                                    <label for="upMale">
                                        <input type="radio" id="upMale" name="gender" value="Male" /> Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="upFemale">
                                        <input type="radio" id="upFemale" name="gender" value="Female" /> Female
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-1 col-md-offset-1 control-label">Civil Status:</label>
                            <div class="col-lg-5">
                                <div class="radio">
                                    <label for="upSingle">
                                        <input type="radio" id="upSingle" name="civil_status" value="Single" /> Single
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="upMarried">
                                        <input type="radio" id="upMarried" name="civil_status" value="Married" /> Married
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="upDivorced">
                                        <input type="radio" id="upDivorced" name="civil_status" value="Divorced" /> Divorced
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="upWidowed">
                                        <input type="radio" id="upWidowed" name="civil_status" value="Widowed" /> Widowed
                                    </label>
                                </div>
                            </div>
                        </div>	


        
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-xs btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>
        </div>
        </form>
      </div>
    </div>  
  </div>
</div>
<form action="/Transaction/AvailService" method="GET" id="proceedtoService">
	{{ csrf_field() }}
	<input type="hidden" name="patient_id" value="" id="patient_id">
	{{ csrf_field() }}
	<input type="hidden" name="transactwhere" value="" id="transactwhere">
	{{ csrf_field() }}
</form>

<div class="modal fade" id="homeservModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <h4><center>Avail Where?</center></h4>
      <div class="modal-footer">
      	<input type="hidden" name="transpatient_id" id="transpatient_id">
        <button type="button" class="btn pull-left" data-dismiss="modal" style="width: 48%" id="transacthere"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: 100px"></i><br><h3>Globalhealth</h3></button>
        <button type="button" class="btn pull-right " data-dismiss="modal" style="width: 48%" id="transacthome"><i class="fa fa-home" aria-hidden="true" style="font-size: 100px"></i><br><h3>Home Service</h3></button>
      </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="{{ asset('/Transaction/addpatient.js') }}"></script>
@endsection

@section('additional')
<script type="text/javascript">
$('.delpatientbtn').click(function(){
	$('#pid').val($(this).data('id'));
	$('#deleteModal').modal('show');
})
$('.availservice').click(function(){
	$('#transpatient_id').val($(this).data('patientid'));
	$('#homeservModal').modal('show');
});
$('#transacthere').click(function(){
	var pid = $('#transpatient_id').val();
	$('#patient_id').val(pid);
	$('#transactwhere').val('here');
	$('#proceedtoService').submit();
});
$('#transacthome').click(function(){
	var pid = $('#transpatient_id').val();
	$('#patient_id').val(pid);
	$('#transactwhere').val('home');
	$('#proceedtoService').submit();
});
$('.select2').select2();
$(document).ready(function(){
$('#patientTbl').DataTable({
  'paging'      : true,
  'lengthChange': true,
  'searching'   : true,
  'ordering'    : true,
  'info'        : true,
  'autoWidth'   : true
});	

})
$('.uppatientbtn').click(function(){
	
	$.ajax
	({
		url : '/retrievePatient',
		data : {id:$(this).data('id')},
		dataType : 'json',
		type : 'GET',
		success:function(reponse)
		{
			reponse.forEach(function(data){
				$('#uppatient_id').val(data.patient_id);
				$('#uppatienttype').val(data.patient_type_id).trigger('change');
				$('#upcorpid').val(data.patient_corp_id).trigger('change');
				$('#uppatient_fname').val(data.patient_fname);
				$('#uppatient_mname').val(data.patient_mname);
				$('#uppatient_lname').val(data.patient_lname);
				$('#uppatient_address').val(data.patient_address);
				$('#uppatient_contact').val(data.patient_contact);
				$('#uppatient_email').val(data.patient_email);
				$('#upbirthday').val(data.patient_birthdate);
				$('#upage').val(data.age);
				if(data.patient_gender == 'Male')
				{
					$('#upupMale').prop('checked',true);
				}
				else
				{
					$('#upupFemale').prop('checked',true);
				}
				if(data.patient_civilstatus == 'Single')
				{
					$('#upupSingle').prop('checked',true);
				}
				else if(data.patient_civilstatus == 'Married')
				{
					$('#upupMarried').prop('checked',true);
				}
				else if(data.patient_civilstatus == 'Divorced')
				{
					$('#upupDivorced').prop('checked',true);
				}
				else if(data.patient_civilstatus == 'Widowed')
				{
					$('#upupWidowed').prop('checked',true);
				}
			})			
		}
	});
})

</script>


@endsection