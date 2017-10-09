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
				ECG
			</header>
			<div class="panel-body">
				<form action="" method="" id=""><br>
			<div class="col-md-12">
				<div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   ECG No. 
			                 </div>
			                <input name="ecgno" id="ecgno" type="ecgno" placeholder="ECG No." class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                  Name
			                 </div>
			                <input readonly="" name="name" id="name" placeholder="Name" class="form-control input-md" required>
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
			                   Rate
			                 </div>
			                <input name="rate" id="rate" type="text" placeholder="Rate" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   P/PR
			                 </div>
			                <input name="ppr" id="ppr" placeholder="P/PR" class="form-control input-md" required>
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
			                   QRS
			                 </div>
			                <input name="qrs" id="qrs" type="text" placeholder="QRS" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   QT/QTC
			                 </div>
			                <input name="qtqtc" id="qtqtc" placeholder="QT/QTC" class="form-control input-md" required>
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
									<span class="input-group-addon">Doctor</span>
									<select class="form-control package_id select2" name="doctor" id="doctor" style="width: 100%" >
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
			                   P/QRS/T
			                 </div>
			                <input name="pqrst" id="pqrst" placeholder="P/QRS/T" class="form-control input-md" required>
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
			                   Minesota Code
			                 </div>
			                <input name="minesota" id="minesota" placeholder="Minesota Code" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
			 	 </div>
			 	 <div class="col-md-6">
			        <div class="form-group">
			             <div class="col-md-12">
			                 <div class="input-group">
			                  <div class="input-group-addon">
			                   Diagnosis Info
			                 </div>
			                <input name="diagnosis" id="diagnosis" type="text" placeholder="Diagnosis Info" class="form-control input-md" required>
			             </div>
			          </div>  
			       </div><br><br>
		        </div> 
		    </div>

		    <center><header><strong><big>
				Image
			</big></strong></header></center><br>

		    <div class="col-md-12">
				<div class="col-md-12">
					<center>
			        <div class="form-group">
			              <div class="col-md-12">
			                 <div class="fileupload fileupload-new" data-provides="fileupload"> 
            					<div class="fileupload-new thumbnail" style="width: 550px; height: 350px;">
            						<img src="{{ asset('/CorporatePayments/default.jpg') }}" alt="" /> 
            					</div> 
            					<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div> 
            					<div>
            						<span class="btn btn-white btn-file"> 
	            						<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
	            						<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
	            						<input type="file" class="default" name="ecg_image" required> 
            						</span> 
            						<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a> 
            					</div> 
            				</div>
			          </div>  
			       </div><br><br></center>
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