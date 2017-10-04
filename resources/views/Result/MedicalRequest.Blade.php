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

<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Medical Request
			</header>
			<div class="panel-body">
				<form action="" method="" id="">
			<header>
				Patient Information
			</header><br>
			<div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Name 
			                 </div>
			                <input readonly="" name="companyname" id="companyname" type="text" placeholder="Company Name" class="form-control input-md" required>
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
			                <input  name="contactperson" id type="text" placeholder="Contact Person" class="form-control input-md" required>
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
			                <input readonly=""  name="companyname" id="companyname" type="text" placeholder="Company Name" class="form-control input-md" required>
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
			                <input readonly=""  name="contactperson" id type="text" placeholder="Contact Person" class="form-control input-md" required>
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
			                <input readonly=""  name="companyname" id="companyname" type="text" placeholder="Company Name" class="form-control input-md" required>
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
			                <input readonly=""  name="contactperson" id type="text" placeholder="Contact Person" class="form-control input-md" required>
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
									<span class="input-group-addon">Examining Physicain</span>
									<select class="form-control package_id select2" name="package_id_dropdown" id="package_id" style="width: 100%" >
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
			                <input readonly=""  name="contactperson" id type="text" placeholder="Contact Person" class="form-control input-md" required>
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
									<select class="form-control package_id select2" name="package_id_dropdown" id="package_id" style="width: 100%" >
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
			                <input readonly=""  name="contactperson" id type="text" placeholder="Contact Person" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
		        </div> 
		    </div>  

		    <header>
				History of Present Illness
			</header><br>

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                  
			                <textarea  name="companyname" id="companyname" type="text" placeholder="Company Name" class="form-control input-md" required>
			                </textarea>
			          </div>  
			       </div><br><br><br>
			 	 </div>
			 	 <div class="col-md-6"><br><br>
		        </div> 
		    </div>  

		    <header>
				Past Medical History
			</header><br>

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Date of Diagnosis
			                 </div>
			                <input  name="companyname" id="companyname" type="text" placeholder="Company Name" class="form-control input-md" required>
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
			                <input  name="contactperson" id type="text" placeholder="Contact Person" class="form-control input-md" required>
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
			                <input  name="companyname" id="companyname" type="text" placeholder="Company Name" class="form-control input-md" required>
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
			                <input  name="contactperson" id type="text" placeholder="Contact Person" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
		        </div> 
		    </div> 

		    <header>
				Family History
			</header><br>

		     <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                  
			                <textarea  name="companyname" id="companyname" type="text" placeholder="Company Name" class="form-control input-md" required>
			                </textarea>
			          </div>  
			       </div><br><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                  
			                <textarea  name="companyname" id="companyname" type="text" placeholder="Company Name" class="form-control input-md" required>
			                </textarea>
			          </div>  
			       </div><br><br><br>
		        </div> 
		    </div> 

		    <header>
				Personal and Social History
			</header><br>

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Smoker
			                 </div>
			                <input  name="companyname" id="companyname" type="text" placeholder="Company Name" class="form-control input-md" required>
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
			                <input  name="contactperson" id type="text" placeholder="Contact Person" class="form-control input-md" required>
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
			                <input  name="companyname" id="companyname" type="text" placeholder="Company Name" class="form-control input-md" required>
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
			                <input  name="contactperson" id type="text" placeholder="Contact Person" class="form-control input-md" required>
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
			                   Alcohol Drinker
			                 </div>
			                <input  name="companyname" id="companyname" type="text" placeholder="Company Name" class="form-control input-md" required>
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
			                <input  name="contactperson" id type="text" placeholder="Contact Person" class="form-control input-md" required>
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
			                <input  name="companyname" id="companyname" type="text" placeholder="Company Name" class="form-control input-md" required>
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
			                <input  name="contactperson" id type="text" placeholder="Contact Person" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
		        </div> 
		    </div> 

		    <header>
				Obstetric and Gynecological History (For Female Only)
			</header><br>

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                  
			                <textarea  name="companyname" id="companyname" type="text" placeholder="Company Name" class="form-control input-md" required>
			                </textarea>
			          </div>  
			       </div><br><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                  
			                <textarea  name="companyname" id="companyname" type="text" placeholder="Company Name" class="form-control input-md" required>
			                </textarea>
			          </div>  
			       </div><br><br><br>
		        </div> 
		    </div> 

		    <header>
				Physical Examination
			</header><br>

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                  
			                <textarea  name="companyname" id="companyname" type="text" placeholder="Company Name" class="form-control input-md" required>
			                </textarea>
			          </div>  
			       </div><br><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group"><br><br><br>
		        </div> 
		       </div>
		    </div>

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Compa
			                 </div>
			                <input  name="companyname" id="companyname" type="text" placeholder="Company Name" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Contact
			                 </div>
			                <input  name="contactperson" id type="text" placeholder="Contact Person" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
		        </div> 
		    </div>
		        
	          
	        </div>

	        {{ csrf_field() }}
	      </div>
					
				</form>
			</div>
			<button type="button" class="btn btn-xs pull-right">Close</button>
	          <button  class="btn btn-xs btn-success pull-right" type="submit" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>
		</section>
	</div>
</div>
@endsection