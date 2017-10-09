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

<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Drug Test
			</header>
			<div class="panel-body">
				<form action="" method="" id=""><br>

			 <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group" style="padding-left: 16px">
			        	<label>Picture</label>
			              <div class="fileupload fileupload-new" data-provides="fileupload"> 
            					<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
            						<img src="{{ asset('/CorporatePayments/default.jpg') }}" alt="" /> 
            					</div> 
            					<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div> 
            					<div>
            						<span class="btn btn-white btn-file"> 
	            						<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
	            						<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
	            						<input type="file" class="default" name="picture_img" required> 
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
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Report ID
			                 </div>
			                <input name="reportid" id="reportid" type="ecgno" placeholder="Report ID" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                  CCF No.
			                 </div>
			                <input name="ccf" id="ccf" placeholder="CCF No." class="form-control input-md" required>
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
			                   Birthday
			                 </div>
			                <input readonly="" name="birthday" id="birthday" placeholder="Birthday" class="form-control input-md" required>
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
			                   Age
			                 </div>
			                <input readonly="" name="age" id="age" type="text" placeholder="Age" class="form-control input-md" required>
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
			                <input readonly="" name="gender" id="gender" placeholder="Gender" class="form-control input-md" required>
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
			                   Transaction Date Time
			                 </div>
			                <input name="trans" id="trans" type="text" placeholder="Transaction Date Time" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Report Date Time
			                 </div>
			                <input name="report" id="report" placeholder="Report Date Time" class="form-control input-md" required>
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
			                   Test Method
			                 </div>
			                <input name="test" id="test" type="text" placeholder="Test Method" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Purpose
			                 </div>
			                <input name="purpose" id="purpose" placeholder="Purpose" class="form-control input-md" required>
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
			                   Requesting Parties
			                 </div>
			                <input name="reqparties" id="reqparties" type="text" placeholder="Requesting Parties" class="form-control input-md" required>
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
				Result
			</big></strong></header></center><br>

		    <div class="col-md-12">
				<div class="col-md-4">
			        <div class="form-group">
			              <div class="col-md-12">
			                <label>Drug/Metabolite</label>
			                <textarea  name="drugmet1" id="drugmet1" type="text" placeholder="" class="form-control input-md" required>
			                </textarea>
			          </div>  
			       </div><br><br><br><br>
			 	 </div>
			 	<div class="col-md-4">
			        <div class="form-group">
			              <div class="col-md-12">
			                <label>Result</label>
			                <textarea  name="result1" id="result1" type="text" placeholder="" class="form-control input-md" required>
			                </textarea>
			          </div>  
			       </div><br><br><br><br>
			 	 </div>
			 	 <div class="col-md-4">
			        <div class="form-group">
			              <div class="col-md-12">
			                <label>Remarks</label>
			                <textarea  name="remarks1" id="remarks1" type="text" placeholder="" class="form-control input-md" required>
			                </textarea>
			          </div>  
			       </div><br><br><br><br>
			 	 </div>
		    </div>
		    <div class="col-md-12">
				<div class="col-md-4">
			        <div class="form-group">
			              <div class="col-md-12">
			                <textarea  name="drugmet2" id="drugmet2" type="text" placeholder="" class="form-control input-md" required>
			                </textarea>
			          </div>  
			       </div><br><br><br><br>
			 	 </div>
			 	<div class="col-md-4">
			        <div class="form-group">
			              <div class="col-md-12">
			                <textarea  name="result2" id="result2" type="text" placeholder="" class="form-control input-md" required>
			                </textarea>
			          </div>  
			       </div><br><br><br><br>
			 	 </div>
			 	 <div class="col-md-4">
			        <div class="form-group">
			              <div class="col-md-12">
			                <textarea  name="remarks2" id="remarks2" type="text" placeholder="" class="form-control input-md" required>
			                </textarea>
			          </div>  
			       </div><br><br><br><br>
			 	 </div>
		    </div>

		    <center><header><strong><big>
				Test Conducted By
			</big></strong></header></center><br>

		    <div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group" >
									<span class="input-group-addon">Analyst</span>
									<select class="form-control package_id select2" name="referred1" id="referred1" style="width: 100%" >
									</select>
								</div>
			          		</div>  
			       </div><br><br>
		        </div>
			 	<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group" >
									<span class="input-group-addon">Analyst</span>
									<select class="form-control package_id select2" name="referred2" id="referred2" style="width: 100%" >
									</select>
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
			<center>
				<button type="button" class="btn btn-xs" style="width: 8%">Back</button>
				<button type="button" class="btn btn-xs btn-info" style="width: 8%">View</button>
		        <button type="submit" class="btn btn-xs btn-success"  style="width: 8%">Save & Print</button>
		    </center>
		</section>
	</div>
</div>
@endsection