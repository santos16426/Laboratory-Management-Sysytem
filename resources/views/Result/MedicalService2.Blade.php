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
			<header class="panel-heading">
				Medical Service
			</header>
			<div class="panel-body">
				<form action="" method="" id=""><br>
			<div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Transaction Date
			                 </div>
			                <input name="transdate" id="transdate" type="ecgno" placeholder="Transaction Date" class="form-control input-md" required>
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
			                <input readonly="" name="printdate" id="printdate" placeholder="Print Date" class="form-control input-md" required>
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
			                   Name
			                 </div>
			                <input readonly="" name="name" id="name" type="text" placeholder="Name" class="form-control input-md" required>
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
			                <input readonly="" name="age" id="age" placeholder="Age" class="form-control input-md" required>
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
			                <input readonly="" name="sex" id="sex" type="text" placeholder="Sex" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group" >
									<span class="input-group-addon">Referred Employee</span>
									<select class="form-control package_id select2" name="referred" id="referred" style="width: 100%" >
									</select>
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
			                <input readonly="" name="address" id="address" type="text" placeholder="Address" class="form-control input-md" required>
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
			                <input readonly="" name="company" id="company" placeholder="Company" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
		        </div> 
		    </div>

		    <center><header><strong><big>
				Services
			</big></strong></header></center><br>

		    <div class="col-md-12">
				<table class="inventory" style="">
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
			  <tr>
			    <td><center>Service Name</center></td>
			    <td><input type="text" name="" value=""></td>
			    <td><input type="text" name="" value=""></td>
			    <td><input type="text" name="" value=""></td>
			    <td><input type="text" name="" value=""></td>
			    <td><input type="text" name="" value=""></td>
			    <td><input type="text" name="" value=""></td>
			  </tr>
		</table>
		    </div>
		    <div ></div><br><br><br><br><br><br>
		    <center><header><strong><big>
				System International
			</big></strong></header></center><br>

		    <div class="col-md-12">
				<div class="col-md-4">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Result
			                 </div>
			                <input name="intresult" id="intresult" type="text" placeholder="Result" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-4">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Unit
			                 </div>
			                <input name="intunit" id="intunit" placeholder="Unit" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br><br><br>
		        </div>
		        <div class="col-md-4">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Reference
			                 </div>
			                <input name="intref" id="intref" placeholder="Reference" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br><br><br>
		        </div>  
		    </div>

		    <center><header><strong><big>
				Conventional
			</big></strong></header></center><br>

		    <div class="col-md-12">
				<div class="col-md-4">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Result
			                 </div>
			                <input name="conresult" id="conresult" type="text" placeholder="Result" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-4">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Unit
			                 </div>
			                <input name="conunit" id="conunit" placeholder="Unit" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br><br><br>
		        </div>
		        <div class="col-md-4">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Reference
			                 </div>
			                <input name="conref" id="conref" placeholder="Reference" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br><br><br>
		        </div>  
		    </div>

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group" >
									<span class="input-group-addon">Medical Technologist</span>
									<select class="form-control package_id select2" name="medtech" id="medtech" style="width: 100%" >
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
			        <div class="form-group"> 
			       </div><br><br>
		        </div> 
		    </div>

	        </div>

	        {{ csrf_field() }}
	      </div>
					
				</form>
			</div>
			<center>
				<button type="button" class="btn btn-xs" style="width: 6%">Close</button>
				<button type="button" class="btn btn-xs btn-info" style="width: 6%">View</button>
		        <button class="btn btn-xs btn-success" type="submit" style="width: 6%">Print</button>
		    </center>
		</section>
	</div>
</div>
@endsection