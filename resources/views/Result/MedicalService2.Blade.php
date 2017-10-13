@if((Session::get('addresult')!= 1))
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif
@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-handshake-o" aria-hidden="true"></i><span> Transaction</span>
@endsection

@section ('breadParentName')
<i class="fa fa-clipboard" aria-hidden="true"></i><span> Results</span>
@endsection
@section('breadactivePage','Encoding of Results')
@section('maintenanceactive')
<a href="">
@endsection

@section('transaction','active')
@section('transresultactive','active')
@section('encodeactive','active')

@section ('content')

<style type="text/css">
	input {
		text-align: center;
	}
</style>

<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<form method="POST" action="/save_Medserv2"  enctype="multipart/form-data">
			<input type="hidden" name="result_id" value="{{ $result_id }}">
			<header class="panel-heading">
				Medical Service
			</header>
			<div class="panel-body">
				
			<div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Transaction Date
			                 </div>
			                <input readonly="" value="{{ $tdate }}" name="transdate" id="transdate" type="text" placeholder="Transaction Date" class="form-control form-control-inline" required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                  Print Date
			                 </div>
			                <input readonly="" name="printdate" id="printdate" value="{{ $datenow }}" placeholder="Print Date" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
		        </div> 
		    </div>  
		    @foreach($patient as $patientinfo)
		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Name
			                 </div>
			                <input readonly="" name="name" id="name" value="{{ $patientinfo->patient_fname }} {{ $patientinfo->patient_mname }} {{ $patientinfo->patient_lname }}"  type="text" placeholder="Name" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Age
			                 </div>
			                <input readonly="" name="age" id="age" value="{{ $patientinfo->age }}" placeholder="Age" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
		        </div> 
		    </div>  

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Sex
			                 </div>
			                <input readonly="" name="sex" id="sex" value="{{ $patientinfo->patient_gender }}" type="text" placeholder="Sex" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group" >
									<span class="input-group-addon">Referred Employee</span>
									<input readonly="" name="empReb" id="empReb" value="{{ $empReb_name }}" type="text" class="form-control input-md" required>
								</div>
			          		</div>  
			       </div><br><br>
		        </div> 
		    </div>

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Address
			                 </div>
			                <input readonly="" name="address" id="address" value="{{ $patientinfo->patient_address }}" type="text" placeholder="Address" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Company
			                 </div>
			                <input readonly="" name="company" id="company" value="{{ $corp_name }}" placeholder="Company" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
		        </div> 
		    </div>
		    @endforeach
		    <center><header><strong><big>
				Services
			</big></strong></header></center><br>

		    <div class="col-md-12">
		    	<div class="form-group">
					<table class="table table-bordered">
						<tr>
						    <th width="10%" rowspan="2" colspan="1"><center>TEST</center></th>
						    <th width="10%" colspan="3"><center>SYSTEM INTERNATIONAL</center></th>
						    <th width="10%" colspan="3"><center>CONVENTIONAL</center></th>
						  </tr>
						  <tr>
						    <th><center>RESULT</center></th>
						    <th><center>UNIT</center></th>
						    <th><center>REFERENCE</center></th>
						    <th><center>RESULT</center></th>
						    <th><center>UNIT</center></th>
						    <th><center>REFERENCE</center></th>
						  </tr>
						  @foreach($services as $serv)
						  <tr>
						  	<input type="hidden" name="service_id[]" value="{{ $serv->service_id }}">
						    <td><center>{{ $serv->service_name}}</center></td>
						    <td><input class="form-control" type="text" name="intresult{{ $serv->service_id }}" id="intresult{{ $serv->service_id }}" value="{{ $serv->Medserv2_intresult }}" pattern="[0-9.>/=\<-]{1,15}$" title="This Field is required. This Field should not exceed 15 characters." required></td>
						    <td><input class="form-control" type="text" name="intunit{{ $serv->service_id }}" id="intunit{{ $serv->service_id }}" value="{{ $serv->Medserv2_intunit }}" pattern="[a-zA-Z0-9.>/=\<-]{1,15}" title="This Field is required. This Field should not exceed 15 characters." required></td>
						    <td><input class="form-control" type="text" name="intref{{ $serv->service_id }}" id="intref{{ $serv->service_id }}" value="{{ $serv->Medserv2_intref }}" pattern="[a-zA-Z0-9.>/=\<-]{1,20}" title="This Field is required. This Field should not exceed 20 characters." required></td>
						    <td><input class="form-control" type="text" name="conresult{{ $serv->service_id }}" id="conresult{{ $serv->service_id }}" value="{{ $serv->Medserv2_conresult }}" pattern="[0-9.>/=\<-]{1,15}$" title="This Field is required. This Field should not exceed 15 characters." required></td>
						    <td><input class="form-control" type="text" name="conunit{{ $serv->service_id }}" id="conunit{{ $serv->service_id }}" value="{{ $serv->Medserv2_conunit }}" pattern="[a-zA-Z0-9.>/=\<-]{1,15}" title="This Field is required. This Field should not exceed 15 characters." required></td>
						    <td><input class="form-control" type="text" name="conref{{ $serv->service_id }}" id="conref{{ $serv->service_id }}" value="{{ $serv->Medserv2_conref }}" pattern="[a-zA-Z0-9.>/=\<-]{1,20}" title="This Field is required. This Field should not exceed 20 characters." required></td>
						  </tr>
						  @endforeach
					</table>
				</div>
		    </div>
		    
		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group" >
									<span class="input-group-addon">Medical Technologist</span>
									<select class="form-control select2 medtech_id " name="medtech" id="medtech" style="width: 100%" >
											<option disabled="" selected="">Select Medical Technologist</option>
											@foreach($medtech as $medtech)
												<option value="{{ $medtech->emp_id }}">{{ $medtech->emp_fname }} {{ $medtech->emp_mname }} {{ $medtech->emp_lname }}</option>
											@endforeach
									</select>
								</div>
			          		</div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			        	<div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   License No.
			                 </div>
			                <input readonly="" name="medlicence" id="medlicence" placeholder="License No." class="form-control input-md" required>
			             </div>
			          </div> 
			       </div><br><br>
		        </div> 
		    </div>

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group" style="padding-left: 16px">
			        	<label>Upload Signature</label>
			              <div class="fileupload fileupload-new" data-provides="fileupload"> 
            					<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
            						<img src="{{ asset('/CorporatePayments/default.jpg') }}" alt="" /> 
            					</div> 
            					<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div> 
            					<div>
            						<span class="btn btn-white btn-file"> 
	            						<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
	            						<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
	            						<input type="file" class="default" name="medtech_img" required> 
            						</span> 
            						<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a> 
            					</div> 
            				</div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group"> 
			       </div><br><br>
		        </div> 
		    </div>

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group" >
									<span class="input-group-addon">Pathologist</span>
									<select class="form-control package_id select2" name="pathologist" id="pathologist" style="width: 100%" >
										<option disabled="" selected="">Select Pathologist</option>
										@foreach($patho as $patho)
											<option value="{{ $patho->emp_id }}">{{ $patho->emp_fname }} {{ $patho->emp_mname }} {{ $patho->emp_lname }}</option>
										@endforeach
									</select>
								</div>
			          		</div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			        	<div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   License No.
			                 </div>
			                <input readonly="" name="pathologistlicense" id="pathologistlicense" placeholder="License No." class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
		        </div> 
		    </div>

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group" style="padding-left: 16px">
			        	<label>Upload Signature</label>
			              <div class="fileupload fileupload-new" data-provides="fileupload"> 
            					<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
            						<img src="{{ asset('/CorporatePayments/default.jpg') }}" alt="" /> 
            					</div> 
            					<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div> 
            					<div>
            						<span class="btn btn-white btn-file"> 
	            						<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
	            						<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
	            						<input type="file" class="default" name="pathologist_img" required> 
            						</span> 
            						<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a> 
            					</div> 
            				</div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			    
		        </div> 
    			</div>
	        		</div>
	      	{{ csrf_field() }}
			<center>
				<button type="button" class="btn btn-xs" style="width: 8%">Back</button>
		        <button type="submit" class="btn btn-xs btn-success"  style="width: 8%">Save & Print</button>
		    </center>
		    </form>
		</section>
	</div>
</div>
@endsection
@section('additional')
<script type="text/javascript">
	
	$('#medtech').click(function(){
		var id =$('#medtech').val();
		$.ajax
		({
			url : '/getLicense',
			data: {id:id},
			dataType : 'json',
			type: 'get',
			success:function(response)
			{
				$('#medlicence').val(response);
			}
		})
	})
	$('#pathologist').click(function(){
		var id =$('#pathologist').val();
		$.ajax
		({
			url : '/getLicense',
			data: {id:id},
			dataType : 'json',
			type: 'get',
			success:function(response)
			{
				$('#pathologistlicense').val(response);
			}
		})
	})
</script>
@endsection