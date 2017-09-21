`@extends('AdminLayout.admin')

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
@section ('breadactivePage','Avail Medical Services')

@section('content')
<form action="/proceed_Payment" method="POST" enctype="multipart/form-data">
<div class="modal fade" id = "myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Confirmation</h4>
      </div>
        <div class="modal-body">
					<pre id = "recieptDetails"></pre>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn pull-left" data-dismiss="modal">Not yet</button>
          <button  class="btn btn-primary" id="yesPrintBtn"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Yes, Print Receipt</button>
        </div>
    </div>  
  </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel-body">
			<div class="clearfix">
				<div class="col-md-6">
					<div class="panel">
						<header class="panel-heading">
							<strong>Patient Information</strong>
						</header>
						<div class="panel-body">
							<table style="font-size: 13px;">
								@foreach($patientinfo as $patientinfo)
								<tr>
									<input type="hidden" id="corporate_id" name="corp_id" value="{{ $patientinfo->patient_corp_id }}">
									<input type="hidden" name="patient_id" value="{{ $patientinfo->patient_id }}">
									<input type="hidden" name="patient_type_id" value="{{ $patientinfo->patient_type_id }}">
									<td>First Name:&nbsp;</td>
									<td><b>{{ $patientinfo->patient_fname }} {{ $patientinfo->patient_mname }} {{ $patientinfo->patient_lname }}</b></td>
									</tr>
									<tr>
									<td>Patient Type: &nbsp;</td>
									<td><b>{{ $patientinfo->ptype_name }}</b></td>
								</tr>
								@if($patientinfo->patient_type_id == 2)
									@foreach($corp as $c)
										@if($c->corp_id == $patientinfo->patient_corp_id)
											<tr>
												<td>Company: &nbsp;</td>
												<td><b>{{ $c->corp_name }}</b></td>
											</tr>
										@endif
									@endforeach
								@endif
								<tr>
									<td>Contact Number: &nbsp;</td>
									<td><b>{{ $patientinfo->patient_contact }}</b></td>
								</tr>
								<tr>
									<td>Patient Address: &nbsp;</td>
									<td><b>{{ $patientinfo->patient_address }}</b></td>
								</tr>
								<tr>
									<td>Patient Birthday: &nbsp;</td>
									<td><b>{{ $patientinfo->patient_birthdate }}</b></td>
								</tr>
								<tr>
									<td>Age: &nbsp;</td>
									<td><b>{{ $patientinfo->age }}</b></td>
								</tr>
								<tr>
									<td>Gender: &nbsp;</td>
									<td><b>{{ $patientinfo->patient_gender }}</b></td>
								</tr>
								@endforeach
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel">
						<header class="panel-heading">
							<strong>Service</strong>
						</header>
						<div class="panel-body">
							<div class="form-group">
								@if($ptype_id == 2)
									<div class="col-md-12">
										<div class="form-group" style="padding-top: 2%">
											<div class="col-md-12">
												<div class="col-md-12" >
													<div class="input-group" >
														<select class="form-control corppack_id select2" name="corppack_id" id="corppack_id" style="width: 100%" >
															@foreach($corppackage as $corppack)
															@if($corppack->age == 'All' and $corppack->gender==3)
																<option id="Corppack_id{{ $corppack->corpPack_id }}" value="{{ $corppack->corpPack_id }}">{{ $corppack->corpPack_name }}</option>
															@elseif($corppack->age == 'Teen' and $patient_age > 11 and $patient_age < 19)
																@if($corppack->gender == 3)
																<option id="Corppack_id{{ $corppack->corpPack_id }}" value="{{ $corppack->corpPack_id }}">{{ $corppack->corpPack_name }}</option>
																@elseif($corppack->gender == 2 and $patient_gender == "Female")
																<option id="Corppack_id{{ $corppack->corpPack_id }}" value="{{ $corppack->corpPack_id }}">{{ $corppack->corpPack_name }}</option>
																@elseif($corppack->gender == 1 and $patient_gender == "Male")
																<option id="Corppack_id{{ $corppack->corpPack_id }}" value="{{ $corppack->corpPack_id }}">{{ $corppack->corpPack_name }}</option>
																@endif
															@elseif($corppack->age == 'Adult' and $patient_age > 18 and $patient_age < 60 )
																@if($corppack->gender == 3)
																<option id="Corppack_id{{ $corppack->corpPack_id }}" value="{{ $corppack->corpPack_id }}">{{ $corppack->corpPack_name }}</option>
																@elseif($corppack->gender == 2 and $patient_gender == "Female")
																<option id="Corppack_id{{ $corppack->corpPack_id }}" value="{{ $corppack->corpPack_id }}">{{ $corppack->corpPack_name }}</option>
																@elseif($corppack->gender == 1 and $patient_gender == "Male")
																<option id="Corppack_id{{ $corppack->corpPack_id }}" value="{{ $corppack->corpPack_id }}">{{ $corppack->corpPack_name }}</option>
																@endif
															@elseif($corppack->age == 'Senior' and $patient_age > 60)
																@if($corppack->gender == 3)
																<option id="Corppack_id{{ $corppack->corpPack_id }}" value="{{ $corppack->corpPack_id }}">{{ $corppack->corpPack_name }}</option>
																@elseif($corppack->gender == 2 and $patient_gender == "Female")
																<option id="Corppack_id{{ $corppack->corpPack_id }}" value="{{ $corppack->corpPack_id }}">{{ $corppack->corpPack_name }}</option>
																@elseif($corppack->gender == 1 and $patient_gender == "Male")
																<option id="Corppack_id{{ $corppack->corpPack_id }}" value="{{ $corppack->corpPack_id }}">{{ $corppack->corpPack_name }}</option>
																@endif
															@endif

															@endforeach
														</select>
														<div class="input-group-btn">
															<a  id="activecorppack" class="btn btn-default btn-sm" style="border-radius: 10%">Add<i  aria-hidden="true"></i></a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endif
								<div class="col-md-12">
									<div class="form-group" style="padding-top: 2%">
										<div class="col-md-12">
											<div class="col-md-12" >
												<div class="input-group" >
													<select class="form-control package_id select2" name="package_id_dropdown" id="package_id" style="width: 100%" >
														@foreach($package as $pcknm)
															<option id="PackageID{{ $pcknm->pack_id }}" value="{{ $pcknm->pack_id }}">{{ $pcknm->pack_name }}</option>
														@endforeach
													</select>
													<div class="input-group-btn">
														<a id="addpackageBtn" class="btn btn-default addpackageBtn btn-sm " style="border-radius: 10%">Add</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group" style="padding-top: 2%">
										<div class="col-md-12">
											<div class="col-md-12" >
												<div class="input-group" >
													<select class="form-control srvc_id select2" name="srvc_id" id="srvc_id" style="width: 100%">
														@foreach($servicegroup as $s)
															<optgroup label="{{ $s->servgroup_name }}">
																@foreach($service as $serviceoffer2)
																	@if($s->servgroup_id == $serviceoffer2->service_group_id)
																		<option id="ServiceOPTION{{ $serviceoffer2->service_id }}" value="{{ $serviceoffer2->service_id }}">{{ $serviceoffer2->service_name }}</option>
																	@endif
																@endforeach              
															</optgroup>
														@endforeach
														<optgroup label="Others">
															@foreach($service as $servnogrp)
																@if($servnogrp->service_group_id == null)
																	<option id="ServiceOPTION{{ $servnogrp->service_id }}" value="{{ $servnogrp->service_id }}">{{ $servnogrp->service_name }}</option>
																@endif
															@endforeach
														</optgroup>
													</select>
													<div class="input-group-btn">
														<a class="btn btn-default addservice btn-sm" id="addservice" style="border-radius: 10%">Add</a>
													</div>
												</div><!-- /input-group -->
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group" style="padding-top: 2%">
										<div class="col-md-12">
											<div class="col-md-12">
												<select class="form-control emp_id select2" name="emp_id" id="emp_id" style="width: 100%" >
													<option value="null">Referred by (Optional)</option>
													@foreach($emp_rebates as $emp_rebates)
														<option value="{{$emp_rebates->emp_id}}">{{ $emp_rebates->emp_fname }} {{ $emp_rebates->emp_mname }} {{ $emp_rebates->emp_lname }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12">
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
						<strong>Reciept</strong>
					</header>
					<div class="panel-body">
						<div class="col-md-12">
							<table class="table table-hover table-condensed dataTable" id="medicalRequest">
								<thead>
									<tr>
										<th style="width:40%">Service</th>
										<th style="width:30%">Service Group</th>
										<th style="width:20%">Price</th>
										<th style="width:10%">Action</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
							<div class="col-md-12">
								<hr>
								<label><sup>*</sup>Note:</label>
								<div id="service_notes">
									
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>

	
<div class="col-md-12">
		<div class="col-md-6 pull-left">
			<section class="panel">
				<header class="panel-heading">
					<strong>Medical Certificate</strong>
				</header>
				<div class="panel-body">
					<section id="main-content col-md-12"> 
			          		<div class="fileupload fileupload-new" data-provides="fileupload"> 
			          			<div class="fileupload-new thumbnail col-md-12"> <img src='{{ asset("/Medical_services/default.jpg") }}' alt="" /> </div> 
			          			<div class="fileupload-preview fileupload-exists thumbnail" style="width: 500px; height: 200px;"></div> 
			          			<div> <span class="btn btn-white btn-file"> 
			          				<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span> 
			          				<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> 
			          				<input type="file" class="default" name="medical_certificate" value='{{ asset("/Medical_services/default.jpg") }}'> </span> <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a> 
			          		</div> 
			          	</div> 
			      </section>
				</div>
			</section>
		</div>

		<div class="col-md-4 pull-right">
			<section class="panel">
				<header class="panel-heading">
					<strong>Bill</strong>
				</header>
				<div class="panel-body">
				 <div class="form-group">
	          <label >Total</label><input type="text" class="form-control" id="totalpriceinput"  name="totalpriceinput" value ="0"  readonly="">
	        </div>
	        <div class="form-group">
	          <label  >Payment</label><input type="text" class="form-control" id="paymentinput"  name="paymentinput">
	        </div>
					<a  class="btn btn-primary btn-sm col-md-12" id="procpaymentmodal">Proceed to payment <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
				</div>
			</section>
		</div>
	</div>
{{ csrf_field() }}
</form>


<div class="modal fade" id="OptionPackModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
      	<h4><center>Pay Where?</center></h4>
      <div class="modal-footer">
      	<button type="button" class="btn pull-left" data-dismiss="modal" style="width: 48%" id="payDirect"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: 100px"></i><br><h3>Pay Here</h3></button>
        <button type="button" class="btn pull-right " data-dismiss="modal" style="width: 48%" id="payCorp"><i class="fa fa-building-o" aria-hidden="true" style="font-size: 100px"></i><br><h3>Bill to Company</h3></button>
      </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('additional')

<script type="text/javascript">
	$('.select2').select2();
	$('#srvc_id').select2({
		placeholder: "Select a service"
	});
</script>
<script type="text/javascript"  src="{{ asset('/Transaction/medicalservice.js') }}"></script>
@endsection