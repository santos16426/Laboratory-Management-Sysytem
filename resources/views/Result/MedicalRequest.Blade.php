@extends('AdminLayout.admin')

@if((Session::get('addresult')!= 1))
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif

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

<div class="row">
	<div class="col-lg-12">
		<section class="panel">
		<form method="POST" action="/save_medreq">
				@foreach($corppack_id as $corpid)
					<input type="hidden" name="corppack_id" value="{{ $corpid->corppack_id }}">
				@endforeach
					<input type="hidden" name="result_id" value="{{ $result_id }}">
			<header class="panel-heading">
				Medical Request
			</header>
			<div class="panel-body">
			<center><header><strong><big>
				Patient Information
			</big></strong></header></center><br>
			<div class="col-md-12">
				@foreach($patient as $patientinfo)
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
			                  Date of Examination
			                 </div>
			                <input readonly="" value="{{ $tdate }}" name="transdate" id="transdate" type="text" placeholder="Transaction Date" class="form-control form-control-inline" required>
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
			                   Civil Status
			                 </div>
			                <input readonly=""  name="civilstatus" id="civilstatus" value="{{ $patientinfo->patient_civilstatus }}" placeholder="Civil Status" class="form-control input-md" required>
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
			                   Company
			                 </div>
			                <input readonly="" name="company" id="company" value="{{ $corp_name }}" placeholder="Company" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Birthdate
			                 </div>
			                <input readonly=""  name="birthdate" id="birthdate" value="{{ date('F jS, Y',strtotime($patientinfo->patient_birthdate)) }}" placeholder="Birthdate" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
		        </div> 
		    </div>  

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
							<div class="col-md-12" >
								<div class="input-group" >
									<span class="input-group-addon">Examining Physician</span>
									<select class="form-control emp_id select2" name="examphysician" id="examphysician" style="width: 100%" >
										@foreach($doctor as $doc)
											<option value="{{ $doc->emp_id }}">{{ $doc->emp_fname }} {{ $doc->emp_mname }} {{ $doc->emp_lname }}</option>
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
							<div class="col-md-12" >
								<div class="input-group" >
									<span class="input-group-addon">Evaluated By</span>
									<select class="form-control eval select2" name="eval" id="eval" style="width: 100%" >
									@foreach($doctor as $doc1)
										<option value="{{ $doc1->emp_id }}">{{ $doc1->emp_fname }} {{ $doc1->emp_mname }} {{ $doc1->emp_lname }}</option>
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
			                   Gender 
			                 </div>
			                <input readonly="" name="sex" id="sex" value="{{ $patientinfo->patient_gender }}" type="text" placeholder="Sex" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
		        </div> 
		        @endforeach
		    </div>  

		    <center><header><strong><big>
				History of Present Illness
			</big></strong></header></center><br>

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                <textarea  name="history" id="history" type="text" placeholder="" class="form-control input-md" pattern=".{1,200}" title="This Field is required. This Field should not exceed 200 characters."  title="This Field is required. This Field should not exceed 200 characters." required></textarea>
			          </div>  
			       </div><br><br><br>
			 	 </div>
			 	 <div class="col-md-6"><br><br>
		        </div> 
		    </div>  

		    <center><header><strong><big>
				Past Medical History
			</big></strong></header></center><br>

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Date of Diagnosis
			                 </div>
			                <input  name="datediag" id="datediag" type="text" placeholder="Date of Diagnosis" class="form-control input-md default-date-picker" required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Illness/Operation
			                 </div>
			                <input  name="illness" id="illness" placeholder="Illness/Operation" class="form-control input-md" pattern=".{1,200}" title="This Field is required. This Field should not exceed 200 characters."   title="This Field is required. This Field should not exceed 200 characters." required>
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
			                   Medication
			                 </div>
			                <input  name="medication" id="medication" type="text" placeholder="Medication" class="form-control input-md" pattern=".{1,200}" title="This Field is required. This Field should not exceed 200 characters."  title="This Field is required. This Field should not exceed 200 characters." required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Remark
			                 </div>
			                <input  name="remark1" id="remark1" placeholder="Remark" class="form-control input-md" pattern=".{1,200}" title="This Field is required. This Field should not exceed 200 characters."  required>
			             </div>
			          </div>  
			       </div><br><br>
		        </div> 
		    </div> 

		    <center><header><strong><big>
				Family History
			</big></strong></header></center><br>

		     <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                <textarea  name="famhisto1" id="" type="text" placeholder="" class="form-control input-md" pattern=".{1,200}" title="This Field is required. This Field should not exceed 200 characters."  required></textarea>
			          </div>  
			       </div><br><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			            <div class="col-md-12">
			                <textarea  name="famhisto2" id="" type="text" placeholder="" class="form-control input-md" pattern=".{1,200}" title="This Field is required. This Field should not exceed 200 characters."  required></textarea>
			          	</div>  
			       </div><br><br><br>
		        </div> 
		    </div> 

		    <center><header><strong><big>
				Personal and Social History
			</big></strong></header></center><br>

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Smoker
			                 </div>
			                <input  name="smoker" id="smoker" placeholder="Smoker" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
			             </div>
			          </div>  
			       </div><br><br>
		        </div> 
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   No. of Sticks/Day
			                 </div>
			                <input  name="sticks" type="" id="sticks" placeholder="No. of Sticks/Day" class="form-control input-md" pattern="[0-9]{1,10}" title="Numbers Only." required>
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
			                   Remarks
			                 </div>
			                <input  name="remarks2" id="remarks2" type="text" placeholder="Remarks" class="form-control input-md" pattern=".{1,200}" title="This Field is required. This Field should not exceed 200 characters."  required>
			             </div>
			          </div>  
			       </div><br><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Pack Years
			                 </div>
			                <input  name="packyears" id="packyears" placeholder="Pack Years" class="form-control input-md" pattern="[0-9]{1,10}" title="Numbers Only." required>
			             </div>
			          </div>  
			       </div><br><br><br>
		        </div> 
		    </div> 

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Alcohol
			                 </div>
			                <input  name="alcohol" id="alcohol" placeholder="Alcohol" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
			             </div>
			          </div>  
			       </div><br><br>
		        </div> 
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   No. of Bottles
			                 </div>
			                <input  name="bottles" id="bottles" placeholder="No. of Bottles" class="form-control input-md" pattern="[0-9]{1,10}" title="Numbers Only." required>
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
			                   Remarks
			                 </div>
			                <input  name="remarks3" id="remarks3" type="text" placeholder="Remarks" class="form-control input-md" pattern=".{1,200}" title="This Field is required. This Field should not exceed 200 characters."  required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   No. of Shots
			                 </div>
			                <input  name="shots" id="shots" placeholder="No. of Shots" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
		        </div> 
		    </div> 

		    <center><header><strong><big>
				Obstetric and Gynecological History (For Female Only)
			</big></strong></header></center><br>

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
		              	<div class="col-md-12">
			                <textarea  name="obstetric1" id="obstetric1" type="text" placeholder="" class="form-control input-md" pattern=".{1,200}" title="This Field is required. This Field should not exceed 200 characters."  required></textarea>
			          	</div>  
			       </div><br><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
		              	<div class="col-md-12">
			                <textarea  name="obstetric2" id="obstetric2" type="text" placeholder="" class="form-control input-md" pattern=".{1,200}" title="This Field is required. This Field should not exceed 200 characters."  required></textarea>
			          	</div>  
			       </div><br><br><br>
		        </div> 
		    </div> 

		    <center><header><strong><big>
				Physical Examination
			</big></strong></header></center><br>

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Visual Acuity
			                 </div>
			                <input  name="visual" id="visual" type="text" placeholder="Visual Activity" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Temperature
			                 </div>
			                <input  name="temp" id="temp" type="text" placeholder="Temperature" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
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
			                   Height
			                 </div>
			                <input  name="height" id="height" type="text" placeholder="Height" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Weight
			                 </div>
			                <input  name="weight" id="weight" placeholder="Weight" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
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
			                   Pulse Rate
			                 </div>
			                <input  name="pulse" id="pulse" type="text" placeholder="Pulse Rate" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
			             </div>
			          </div>  
			       </div><br><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Blood Pressure
			                 </div>
			                <input  name="bloodpressure" id="bloodpressure" placeholder="Blood Pressure" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
			             </div>
			          </div>  
			       </div><br><br><br>
		        </div> 
		    </div>


		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   General Appearance
			                 </div>
			                <input  name="genapp" id="genapp" type="text" placeholder="General Appearance" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Eyes
			                 </div>
			                <input  name="eyes" id="eyes" placeholder="Eyes" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
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
			                   Ear/Nose/Throat
			                 </div>
			                <input  name="ear" id="ear" type="text" placeholder="Ear/Nose/Throat" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Neck
			                 </div>
			                <input  name="neck" id="neck" placeholder="Neck" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
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
			                   Breast
			                 </div>
			                <input  name="breast" id="breast" type="text" placeholder="Breast" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Chest/Lungs
			                 </div>
			                <input  name="chest" id="chest" placeholder="Chest/Lungs" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
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
			                   Heart
			                 </div>
			                <input  name="heart" id="heart" type="text" placeholder="Heart" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Abdomen
			                 </div>
			                <input  name="abdomen" id="abdomen" placeholder="Abdomen" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
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
			                   External Anal
			                 </div>
			                <input  name="exanal" id="exanal" type="text" placeholder="External Anal" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   External Genitalia
			                 </div>
			                <input  name="exgen" id="exgen" placeholder="External Genitalia" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
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
			                   Extermities
			                 </div>
			                <input  name="extermities" id="extermities" type="text" placeholder="Extermities" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			       </div><br><br>
		        </div> 
		    </div>

		    <center><header><strong><big>
				Laboratory and Diagnostic Examination
			</big></strong></header></center><br>

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   CBC
			                 </div>
			                <input  name="cbc" id="cbc" type="text" placeholder="CBC" class="form-control input-md" pattern=".{1,200}" title="This Field is required. This Field should not exceed 200 characters."  required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Routine Fecalysis
			                 </div>
			                <input  name="fecalysis" id="fecalysis" placeholder="Routine Fecalysis" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
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
			                   Routine Urinalysis
			                 </div>
			                <input  name="urinalysis" id="urinalysis" type="text" placeholder="Routine Urinalysis" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Chest X-Ray
			                 </div>
			                <input  name="xray" id="xray" placeholder="Chest X-Ray" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
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
			                   Drug Test
			                 </div>
			                <input  name="drugtest" id="drugtest" type="text" placeholder="Drug Test" class="form-control input-md" pattern="[a-zA-Z0-9.>/=\<-]{1,50}" title="This Field is required. This Field should not exceed 50 characters." required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group"> 
			       </div><br><br>
		        </div> 
		    </div>

		    <center><header><strong><big>
		    	Assesst and Recommendation
		    </big></strong></header></center>

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
		              	<div class="col-md-12">
			                <textarea  name="assess" id="assess" type="text" placeholder="" class="form-control input-md" pattern=".{1,200}" title="This Field is required. This Field should not exceed 200 characters."  required></textarea>
			          	</div> 
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">  
			       </div><br><br>
		        </div> 
		    </div>
		        
	          
	        </div>
	        {{ csrf_field() }}
	      	</div>
			</div>
			<center>
				<button type="button" class="btn btn-xs" style="width: 8%">Back</button>
		        <button type="submit" class="btn btn-xs btn-success"  style="width: 8%">Save & Print</button>
		    </center>
		</form>
	  </section>
	</div>
</div>
@endsection