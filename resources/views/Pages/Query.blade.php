@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-dashboard" aria-hidden="true"></i><span> Home</span>
@endsection

@section ('breadParentName')
<i class="fa fa-terminal" aria-hidden="true"></i><span> Queries</span>
@endsection

@section('maintenanceactive')
<a href="" class="">
@endsection

@section('query','active')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<section class="panel">
			<header class="panel-heading">
				Queries
				<span class="tools pull-right">
		          <a class="fa fa-chevron-down" href="javascript:;"></a>
		          
		      	</span>
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<form class="form-horizontal">
						<div class="form-group">
							<div class="col-md-10 col-md-offset-1 input-group">
								<span class="input-group-addon">Select Query<sup>*</sup></span>
								<select class="form-control select2" id="search">
									<option value="Patient" data-id="Patient">Patient</option>
									<option value="Employee" data-id="Employee">Employee</option>
									<option value="Corporate" data-id="Corporate">Corporate Account</option>
									<option value="Service" data-id="Service">Service</option>
									<option value="Package" data-id="Package">Package</option>
								</select>
							</div>
						</div>

						<div class="form-group" id="patient">
							<div class="col-md-10 col-md-offset-1 input-group">
								<span class="input-group-addon">Filter<sup>*</sup></span>
								<select class="form-control select2" multiple="" id="patientselect" style="width:100%">
									<optgroup label="Patient Type">
										<option value="Where patient_type_id = 1">Individual Patient</option>
										<option value="Where patient_type_id = 2">Corporate Patient</option>
									</optgroup>
									<optgroup label="Gender">
										<option value="Where patient_gender= 'Male'">Male</option>
										<option value="Where patient_gender= 'Female'">Female</option>
									</optgroup>
									<optgroup label = "Age">
										<option value="Where age >=0 and age <=12">Child (0-12)</option>
										<option value="Where age >=13 and age >=19 ">Teen (13-19)</option>
										<option value="Where age >=20 and age >= 59">Adult (20-59)</option>
										<option value="Where age >= 60">Senior Citizen (60 above)</option>
									</optgroup>
								</select>
							</div>
						</div>

						<div class="form-group hidden" id="employee">
							<div class="col-md-10 col-md-offset-1 input-group">
								<span class="input-group-addon">Filter<sup>*</sup></span>
								<select class="form-control select2" multiple="" id="employeeselect" style="width:100%">
									<optgroup label="Employee Type">
										@foreach($emptype as $type)
										<option value="Where role_id = {{ $type->role_id }}">{{ $type->role_name }}</option>
										@endforeach
									</optgroup>
									<optgroup label="Gender">
										<option value="Where patient_gender= 'Male'">Male</option>
										<option value="Where patient_gender= 'Female'">Female</option>
									</optgroup>
									<optgroup label = "Age">
										<option value="Where age >=0 and age <=12">Child (0-12)</option>
										<option value="Where age >=13 and age >=19 ">Teen (13-19)</option>
										<option value="Where age >=20 and age >= 59">Adult (20-59)</option>
										<option value="Where age >= 60">Senior Citizen (60 above)</option>
									</optgroup>
								</select>
							</div>
						</div>

						<div class="form-group hidden" id="corporate">
							<div class="col-md-10 col-md-offset-1 input-group">
								<span class="input-group-addon">Filter<sup>*</sup></span>
								<select class="form-control select2" multiple="" id="corporateselect"  style="width:100%">
									<optgroup label="Patient Type">
										<option value="Where patient_type_id = 1">Individual Patient</option>
										<option value="Where patient_type_id = 2">Corporate Patient</option>
									</optgroup>
									<optgroup label="Gender">
										<option value="Where patient_gender= 'Male'">Male</option>
										<option value="Where patient_gender= 'Female'">Female</option>
									</optgroup>
									<optgroup label = "Age">
										<option value="Where age >=0 and age <=12">Child (0-12)</option>
										<option value="Where age >=13 and age >=19 ">Teen (13-19)</option>
										<option value="Where age >=20 and age >= 59">Adult (20-59)</option>
										<option value="Where age >= 60">Senior Citizen (60 above)</option>
									</optgroup>
								</select>
							</div>
						</div>

						<div class="form-group hidden" id="service">
							<div class="col-md-10 col-md-offset-1 input-group">
								<span class="input-group-addon">Filter<sup>*</sup></span>
								<select class="form-control select2" multiple="" id="serviceselect" style="width:100%">
									<optgroup label="Patient Type">
										<option value="Where patient_type_id = 1">Individual Patient</option>
										<option value="Where patient_type_id = 2">Corporate Patient</option>
									</optgroup>
									<optgroup label="Gender">
										<option value="Where patient_gender= 'Male'">Male</option>
										<option value="Where patient_gender= 'Female'">Female</option>
									</optgroup>
									<optgroup label = "Age">
										<option value="Where age >=0 and age <=12">Child (0-12)</option>
										<option value="Where age >=13 and age >=19 ">Teen (13-19)</option>
										<option value="Where age >=20 and age >= 59">Adult (20-59)</option>
										<option value="Where age >= 60">Senior Citizen (60 above)</option>
									</optgroup>
								</select>
							</div>
						</div>

						<div class="form-group hidden" id="package">
							<div class="col-md-10 col-md-offset-1 input-group">
								<span class="input-group-addon">Filter<sup>*</sup></span>
								<select class="form-control select2" multiple="" id="packageselect" style="width:100%">
									<optgroup label="Patient Type">
										<option value="Where patient_type_id = 1">Individual Patient</option>
										<option value="Where patient_type_id = 2">Corporate Patient</option>
									</optgroup>
									<optgroup label="Gender">
										<option value="Where patient_gender= 'Male'">Male</option>
										<option value="Where patient_gender= 'Female'">Female</option>
									</optgroup>
									<optgroup label = "Age">
										<option value="Where age >=0 and age <=12">Child (0-12)</option>
										<option value="Where age >=13 and age >=19 ">Teen (13-19)</option>
										<option value="Where age >=20 and age >= 59">Adult (20-59)</option>
										<option value="Where age >= 60">Senior Citizen (60 above)</option>
									</optgroup>
								</select>
							</div>
						</div>

						<div class="col-md-12">
			          		<div class="col-md-12">
			          			<button type="button" class="btn btn-success btn-block" id="generatebtn">Search</button>
			          		</div>
			          	</div>
        			</form>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection
@section('additional')

<script type="text/javascript">
	$('.select2').select2();

	var patientdiv = document.getElementById('patient');
	var employeediv = document.getElementById('employee');
	var corporatediv = document.getElementById('corporate');
	var servicediv = document.getElementById('service');
	var packagediv = document.getElementById('package');
	var search = $('#search').val($(this).data('id'));
	$('#search').change(function(){
		
		if(search = 'Patient')
		{
			patientdiv.className = "form-group"
			employeediv.className = "form-group hidden"
			corporatediv.className = "form-group hidden"
			servicediv.className = "form-group hidden"
			packagediv.className = "form-group hidden"
		}
		alert(search);
		if(search = 'Employee')
		{
			patientdiv.className = "form-group hidden"
			employeediv.className = "form-group"
			corporatediv.className = "form-group hidden"
			servicediv.className = "form-group hidden"
			packagediv.className = "form-group hidden"
		}
		if(search = 'Corporate')
		{
			patientdiv.className = "form-group hidden"
			employeediv.className = "form-group hidden"
			corporatediv.className = "form-group hidden"
			servicediv.className = "form-group"
			packagediv.className = "form-group hidden"
		}
		if(search = 'Service')
		{
			patientdiv.className = "form-group hidden"
			employeediv.className = "form-group hidden"
			corporatediv.className = "form-group hidden"
			servicediv.className = "form-group"
			packagediv.className = "form-group hidden"
		}
		if(search = 'Package')
		{
			patientdiv.className = "form-group hidden"
			employeediv.className = "form-group hidden"
			corporatediv.className = "form-group hidden"
			servicediv.className = "form-group hidden"
			packagediv.className = "form-group"
		}
	})
</script>
@endsection