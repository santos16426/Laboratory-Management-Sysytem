@extends('AdminLayout.admin')

@if(Session::get('type') != 0)
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif

@section ('breadrootName')
<i class="fa fa-wrench" aria-hidden="true"></i><span> Utilities</span>
@endsection
@section('breadParentName')
<i class="fa fa-key" aria-hidden="true"></i><span> User Access</span>
@endsection
@section('maintenanceactive')
<a href="" class="">
@endsection
@section('useraccess','active')
@section('utilitiesactive','active')
@section('content')


<style type="text/css">
	th {
		text-align: center;
		font-size: 9px
	}
	.fa-check
	{
		color:green;
	}
</style>

<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<strong>Employee's Access Information</strong>
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<div class="col-md-12">
						<table  style="border-radius: 120px" class="table table-bordered">
						  <tr>
						    <th rowspan="2" colspan="1">Employee Type</th>
						    <th colspan="6">Maintenance</th>
						    <th colspan="4">Transaction</th>
						    <th colspan="5">Reports</th>
						    <th rowspan="2" colspan="1">Action</th>
						  </tr>
						  <tr>
						  	<th>Laboratory</th>
						  	<th>Employee</th>
						  	<th>Rebate</th>
						  	<th>Service</th>
						  	<th>Package</th>
						  	<th>Corporate Accounts</th>
						    <th>Medical Service</th>
						    <th>Corporate Billing</th>
						    <th>Rebate Billing</th>
						    <th>Result</th>
						    <th>Census</th>
						    <th>Transaction</th>
						    <th>Corporate</th>
						    <th>Rebate</th>
						    <th>Anoda</th>
						  </tr>
						  @foreach($admin as $admin)
						  <tr align="center">
						  	<td>Admin</td>
						  	<td>
						  		@if($admin->addlab == 1 || $admin->uplab == 1 || $admin->dellab == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						  	</td>
						  	<td>
						  		@if($admin->addemp == 1 || $admin->upemp == 1 || $admin->delemp == 1 || $admin->addemptype || $admin->upemptype || $admin->delemptype)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						  	</td>
						  	<td>
						  		@if($admin->editpercent == 1 || $admin->addempreb == 1 || $admin->delempreb == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						  	</td>
						  	<td>
						  		@if($admin->addserv == 1 || $admin->upserv == 1 || $admin->delserv == 1 || $admin->addservtype == 1 || $admin->upservtype == 1 || $admin->delservtype == 1 || $admin->addservgrp == 1 || $admin->upservgrp == 1 || $admin->delservgrp == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						  	</td>
						  	<td>
						  		@if($admin->addpack == 1 || $admin->uppack == 1 || $admin->delpack == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						  	</td>
						    <td>
						    	@if($admin->addcorp == 1 || $admin->upcorp == 1 || $admin->delcorp == 1 || $admin->addcorppack == 1 || $admin->upcorppack == 1 || $admin->delcorppack == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						    </td>
						    <td>
						    	@if($admin->addpatient == 1 || $admin->availserv == 1 || $admin->delpatient==1 || $admin->uppatient == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						    </td>
						    <td>
						    	@if($admin->corpbill == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						    </td>
						    <td>
						    	@if($admin->rebatebill == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						    </td>
						    <td>
						    	@if($admin->addresult == 1 || $admin->upresult)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						    </td>
						    <td>
						    	@if($admin->census == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						    </td>
						    <td>
						    	@if($admin->trans == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						    </td>
						    <td>
						    	@if($admin->corprep == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						    </td>
						    <td>
						    	@if($admin->rebaterep == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						    </td>
						    <td></td>
						    <td><a class="btn btn-warning btn-xs  updateModal" href="#updateModal" data-toggle="modal" data-id="0"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
						  </tr>
						  @endforeach
						  @foreach($users as $users)
						  <tr align="center">
						  	<td>{{ $users->role_name }}</td>
						  	<td>
						  		@if($users->addlab == 1 || $users->uplab == 1 || $users->dellab == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						  	</td>
						  	<td>
						  		@if($users->addemp == 1 || $users->upemp == 1 || $users->delemp == 1 || $users->addemptype || $users->upemptype || $users->delemptype)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						  	</td>
						  	<td>
						  		@if($users->editpercent == 1 || $users->addempreb == 1 || $users->delempreb == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						  	</td>
						  	<td>
						  		@if($users->addserv == 1 || $users->upserv == 1 || $users->delserv == 1 || $users->addservtype == 1 || $users->upservtype == 1 || $users->delservtype == 1 || $users->addservgrp == 1 || $users->upservgrp == 1 || $users->delservgrp == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						  	</td>
						  	<td>
						  		@if($users->addpack == 1 || $users->uppack == 1 || $users->delpack == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						  	</td>
						    <td>
						    	@if($users->addcorp == 1 || $users->upcorp == 1 || $users->delcorp == 1 || $users->addcorppack == 1 || $users->upcorppack == 1 || $users->delcorppack == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						    </td>
						    <td>
						    	@if($users->addpatient == 1 || $users->availserv == 1 || $users->delpatient == 1 || $users->uppatient == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						    </td>
						    <td>
						    	@if($users->corpbill == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						    </td>
						    <td>
						    	@if($users->rebatebill == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						    </td>
						    <td>
						    	@if($users->addresult == 1 || $users->upresult)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						    </td>
						    <td>
						    	@if($users->census == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						    </td>
						    <td>
						    	@if($users->trans == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						    </td>
						    <td>
						    	@if($users->corprep == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						    </td>
						    <td>
						    	@if($users->rebaterep == 1)
						  			<i class="fa fa-check" aria-hidden="true"></i> 
						  		@endif
						    </td>
						    <td></td>
						    <td><a class="btn btn-warning btn-xs  updateModal" href="#updateModal" data-toggle="modal" data-id="{{ $users->emp_type_id }}"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
						  </tr>
						  @endforeach
						</table>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<div class="modal fade" id = "updateModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header btn-warning">
        <h4 class="modal-title"><i class="fa fa-user-plus" aria-hidden="true"></i> User Access</h4>
      </div>
        <div class="modal-body" >
        	<form action="/save_userAccess" method="POST" class="form-horizontal" id="useraccessform">
        	<input type="hidden" name="emp_type_id" value="" id="emp_type_id">
    	 	<fieldset>
    	 		<legend>Maintenance</legend>
    	 		<div class="col-md-12">
	    	 		<div class="col-md-4">
	    	 			<div class="form-group">
			            	<div class="col-sm-10 col-md-offset-1">
			                	<div class="input-group">
			                		<label><strong>Laboratory</strong></label><br>
			                  		<div style="padding-left: 20px">
			                    		<input type="checkbox" name="addlab" class="maintenance"  value="1" id="addlab"><label for="addlab">&nbsp;Add Laboratory&nbsp;&nbsp;</label><br>
			                    		<input type="checkbox" name="uplab" class="maintenance"  value="1" id="uplab"><label for="uplab">&nbsp;Update Laboratory&nbsp;&nbsp;</label><br>
			                    		<input type="checkbox" name="dellab" class="maintenance"  value="1" id="dellab"><label for="dellab">&nbsp;Delete Laboratory&nbsp;&nbsp;</label><br>
			                		</div>
			              		</div>
			           		</div>  
			         	</div>
	    	 		</div>

					<div class="col-md-4">
						<div class="form-group">
							<div class="col-sm-10 col-md-offset-1">
								<div class="input-group">
									<label><strong>Employee</strong></label><br>
									<div style="padding-left: 20px">
										<input type="checkbox" name="addemp" class="maintenance" value="1" id="addemp"><label for="addemp">&nbsp;Add Employee&nbsp;&nbsp;</label>
										<br>
										<input type="checkbox" name="upemp" class="maintenance"  id="upemp" value="1"><label for="upemp">&nbsp;Update Employee&nbsp;&nbsp;</label><br>
										<input type="checkbox" name="delemp" class="maintenance"  id="delemp" value="1"><label for="delemp">&nbsp;Delete Employee&nbsp;&nbsp;</label>
									</div>
								</div>  
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<div class="col-sm-10 col-md-offset-1">
								<div class="input-group">
									<label><strong>Employee Type</strong></label><br>
									<div style="padding-left: 20px">
										<input type="checkbox" name="addemptype" class="maintenance"  value="1" id="addemptype"><label for="addemptype">&nbsp;Add Employee type&nbsp;&nbsp;</label>
										<br>
										<input type="checkbox" name="upemptype" class="maintenance"  id="upemptype" value="1"><label for="upemptype">&nbsp;Update Employee type&nbsp;&nbsp;</label><br>
										<input type="checkbox" name="delemptype" class="maintenance"  id="delemptype" value="1"><label for="delemptype">&nbsp;Delete Employee type&nbsp;&nbsp;</label>
									</div>
								</div>
							</div>  
						</div>
					</div>
		    	 	</div>

		    	 	<div class="col-md-12">
	    	 		<div class="col-md-4">
	    	 			<div class="form-group">
			            	<div class="col-sm-10 col-md-offset-1">
			                	<div class="input-group">
			                		<label><strong>Rebate Percentage</strong></label><br>
			                  		<div style="padding-left: 20px">
			                    		<input type="checkbox" name="editpercent" class="maintenance"  value="1" id="editpercent"><label for="editpercent">&nbsp;Edit Percentage&nbsp;&nbsp;</label>
			                		</div>
			              		</div>
			           		</div>  
			         	</div>
	    	 		</div>

					<div class="col-md-4">
						<div class="form-group">
							<div class="col-sm-10 col-md-offset-1">
								<div class="input-group">
									<label><strong>Employee's Rebate</strong></label><br>
									<div style="padding-left: 20px">
										<input type="checkbox" name="addempreb" value="1" id="addempreb" class="maintenance"><label for="addempreb">&nbsp;Add Employee Rebate&nbsp;&nbsp;</label>
										<br>
										<input type="checkbox" name="delempreb" id="delempreb" value="1" class="maintenance"><label for="delempreb">&nbsp;Delete Employee Rebate&nbsp;&nbsp;</label>
										<br>
									</div>
								</div>  
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<div class="col-sm-10 col-md-offset-1">
								<div class="input-group">
									<label><strong>Package</strong></label><br>
									<div style="padding-left: 20px">
										<input type="checkbox" name="addpack" class="maintenance"  value="1" id="addpack"><label for="addpack">&nbsp;Add Package&nbsp;&nbsp;</label>
										<br>
										<input type="checkbox" name="uppack" class="maintenance"  id="uppack" value="1"><label for="uppack">&nbsp;Update Package&nbsp;&nbsp;</label><br>
										<input type="checkbox" name="delpack" class="maintenance"  id="delpack" value="1"><label for="delpack">&nbsp;Delete Package&nbsp;&nbsp;</label>
									</div>
								</div>
							</div>  
						</div>
					</div>
		    	 	</div>	


		    	 	<div class="col-md-12">
	    	 		<div class="col-md-4">
	    	 			<div class="form-group">
			            	<div class="col-sm-10 col-md-offset-1">
			                	<div class="input-group">
			                		<label><strong>Service Group</strong></label><br>
			                  		<div style="padding-left: 20px">
			                    		<input type="checkbox" name="addservgrp" class="maintenance"  value="1" id="addservgrp"><label for="addservgrp">&nbsp;Add Service Group&nbsp;&nbsp;</label>
										<br>
										<input type="checkbox" name="upservgrp" class="maintenance"  id="upservgrp" value="1"><label for="upservgrp	">&nbsp;Update Service Group&nbsp;&nbsp;</label><br>
										<input type="checkbox" name="delservgrp" class="maintenance"  id="delservgrp" value="1"><label for="delservgrp">&nbsp;Delete Service Group&nbsp;&nbsp;</label>
			                		</div>
			              		</div>
			           		</div>  
			         	</div>
	    	 		</div>

					<div class="col-md-4">
						<div class="form-group">
							<div class="col-sm-10 col-md-offset-1">
								<div class="input-group">
									<label><strong>Service Type</strong></label><br>
									<div style="padding-left: 20px">
										<input type="checkbox" name="addservtype" class="maintenance"  value="1" id="addservtype"><label for="addservtype">&nbsp;Add Service Type&nbsp;&nbsp;</label>
										<br>
										<input type="checkbox" name="upservtype" class="maintenance"  id="upservtype" value="1"><label for="upservtype">&nbsp;Update Service Type&nbsp;&nbsp;</label><br>
										<input type="checkbox" name="delservtype" class="maintenance"  id="delservtype" value="1"><label for="delservtype">&nbsp;Delete Service Type&nbsp;&nbsp;</label>
										<br>
									</div>
								</div>  
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<div class="col-sm-10 col-md-offset-1">
								<div class="input-group">
									<label><strong>Service</strong></label><br>
									<div style="padding-left: 20px">
										<input type="checkbox" name="addserv" class="maintenance"  value="1" id="addserv"><label for="addserv">&nbsp;Add Service&nbsp;&nbsp;</label>
										<br>
										<input type="checkbox" name="upserv" class="maintenance"  id="upserv" value="1"><label for="upserv">&nbsp;Update Service&nbsp;&nbsp;</label><br>
										<input type="checkbox" name="delserv" class="maintenance"  id="delserv" value="1"><label for="delserv">&nbsp;Delete Service&nbsp;&nbsp;</label>
									</div>
								</div>
							</div>  
						</div>
					</div>
		    	 	</div>

		    	 	<div class="col-md-12">
	    	 		<div class="col-md-5">
	    	 			<div class="form-group">
			            	<div class="col-sm-10 col-md-offset-6">
			                	<div class="input-group">
			                		<label><strong>Corporate Accounts</strong></label><br>
			                  		<div style="padding-left: 20px">
			                    		<input type="checkbox" name="addcorp" class="maintenance"  value="1" id="addcorp"><label for="addcorp">&nbsp;Add Corporate Accounts&nbsp;&nbsp;</label>
										<br>
										<input type="checkbox" name="upcorp" class="maintenance"  id="upcorp" value="1"><label for="upcorp">&nbsp;Update Corporate Accounts&nbsp;&nbsp;</label><br>
										<input type="checkbox" name="delcorp" class="maintenance"  id="delcorp" value="1"><label for="delcorp">&nbsp;Delete Corporate Accounts&nbsp;&nbsp;</label>
			                		</div>
			              		</div>
			           		</div>  
			         	</div>
	    	 		</div>

					<div class="col-md-5">
	    	 			<div class="form-group">
			            	<div class="col-sm-10 col-md-offset-4">
			                	<div class="input-group">
			                		<label><strong>Corporate Package</strong></label><br>
			                  		<div style="padding-left: 20px">
			                    		<input type="checkbox" name="addcorppack" class="maintenance"  value="1" id="addcorppack"><label for="addcorppack">&nbsp;Add Corporate Package&nbsp;&nbsp;</label>
										<br>
										<input type="checkbox" name="upcorppack" class="maintenance"  id="upcorppack" value="1"><label for="upcorppack ">&nbsp;Update Corporate Package&nbsp;&nbsp;</label><br>
										<input type="checkbox" name="delcorppack"  class="maintenance" id="delcorppack" value="1"><label for="delcorppack">&nbsp;Delete Corporate Package&nbsp;&nbsp;</label>
			                		</div>
			              		</div>
			           		</div>  
			         	</div>
	    	 		</div>

					<div class="col-md-2">
					</div>
		    	 	</div>
    	 	</fieldset>

    	 	<fieldset>
    	 		<legend>Transaction</legend>
    	 		<div class="col-md-12">
	    	 		<div class="col-md-4">
	    	 			<div class="form-group">
			            	<div class="col-sm-10 col-md-offset-1">
			                	<div class="input-group">
			                		<label><strong>Medical Service</strong></label><br>
			                  		<div style="padding-left: 20px">
			                    		<input type="checkbox" name="addpatient" class="transaction" value="1" id="addpatient"><label for="addpatient">&nbsp;Add Patient&nbsp;&nbsp;</label><br>
			                    		<input type="checkbox" name="uppatient" class="transaction" value="1" id="uppatient"><label for="uppatient">&nbsp;Update Patient&nbsp;&nbsp;</label><br>
			                    		<input type="checkbox" name="delpatient" class="transaction" value="1" id="delpatient"><label for="delpatient">&nbsp;Delete Patient&nbsp;&nbsp;</label><br>
			                    		<input type="checkbox" name="availserv" class="transaction" value="1" id="availserv"><label for="availserv">&nbsp;Avail Service&nbsp;&nbsp;</label><br>

			                		</div>
			              		</div>
			           		</div>  
			         	</div>
	    	 		</div>

					<div class="col-md-4">
						<div class="form-group">
							<div class="col-sm-10 col-md-offset-1">
								<div class="input-group">
									<label><strong>Billing</strong></label><br>
									<div style="padding-left: 20px">
										<input type="checkbox" name="corpbill" class="transaction" value="1" id="corpbill"><label for="corpbill">&nbsp;Corporate Billing&nbsp;&nbsp;</label>
										<br>
										<input type="checkbox" name="rebatebill" class="transaction" id="rebatebill" value="1"><label for="rebatebill">&nbsp;Rebate Billing&nbsp;&nbsp;</label>
										<br>
									</div>
								</div>  
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<div class="col-sm-10 col-md-offset-1">
								<div class="input-group">
									<label><strong>Result</strong></label><br>
									<div style="padding-left: 20px">
										<input type="checkbox" name="addresult" class="transaction" id="addresult" value="1"><label for="addresult">&nbsp;Add Result&nbsp;&nbsp;</label>
										<br>
										<input type="checkbox" name="upresult" class="transaction" id="upresult" value="1"><label for="upresult">&nbsp;Upload Result&nbsp;&nbsp;</label>
									</div>
								</div>
							</div>  
						</div>
					</div>
		    	 	</div>	
    	 	</fieldset>

    	 	<fieldset>
    	 		<legend>Reports</legend>
    	 		<div class="col-md-12">
	    	 		<div class="col-md-4">
	    	 			<div class="form-group">
			            	<div class="col-sm-10 col-md-offset-1">
			                	<div class="input-group">
			                  		<div style="">
			                    		<input type="checkbox" name="census" class="report"  value="1" id="census"><label for="census">&nbsp;<strong>Census Report</strong>&nbsp;&nbsp;</label>
			                		</div>
			              		</div>
			           		</div>  
			         	</div>
	    	 		</div>

					<div class="col-md-4">
						<div class="form-group">
							<div class="col-sm-10 col-md-offset-1">
								<div class="input-group">
									<div style="">
										<input type="checkbox" name="trans" class="report"  value="1" id="trans"><label for="trans">&nbsp;<strong>Transaction Report</strong>&nbsp;&nbsp;</label>
										<br>
									</div>
								</div>  
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<div class="col-sm-10 col-md-offset-1">
								<div class="input-group">
									<div style="">
										<input type="checkbox" name="corprep" class="report"  value="1" id="corprep"><label for="corprep">&nbsp;<strong>Corporate Report</strong>&nbsp;&nbsp;</label>
									</div>
								</div>
							</div>  
						</div>
					</div>
		    	 	</div>

		    	 	<div class="col-md-12">
	    	 		<div class="col-md-4">
	    	 			<div class="form-group">
			            	<div class="col-sm-10 col-md-offset-1">
			                	<div class="input-group">
			                  		<div style="">
			                    		<input type="checkbox" name="rebaterep" class="report"  value="1" id="rebaterep"><label for="rebaterep">&nbsp;<strong>Rebate Report</strong>&nbsp;&nbsp;</label>
			                		</div>
			              		</div>
			           		</div>  
			         	</div>
	    	 		</div>

					
					<div class="col-md-4">
					</div>
		    	 	</div>		
    	 	</fieldset>
	    	 	

		        <div class="box-footer">

		          <button type="button" class="btn" data-dismiss="modal">Close</button>
		          <button  type="submit" class="btn btn-success pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>
		        </div>
	        	{{ csrf_field() }}
      		</form>
        </div> 
    </div>  
  </div>
</div>
@endsection
@section('additional')
<script type="text/javascript">
	$('#newbtn').click(function(){
	    $('.rebate')[0].reset();
	    $('.rebate div').removeClass('has-error');
	    $('.rebate div').removeClass('has-success');
	    $('.rebate i').removeClass('glyphicon glyphicon-ok');
	    $('.rebate i').removeClass('glyphicon glyphicon-remove');
	    $('.rebate small').attr('style','display:none');
	  });
	$('#rebateTbl').DataTable({
	  'paging'      : true,
	  'lengthChange': true,
	  'searching'   : true,
	  'ordering'    : false,
	  'info'        : true,
	  'autoWidth'   : true,
	  'bSort'		: false
	});

	$('.updateModal').click(function(){
		$('.maintenance').removeAttr('checked','checked');
		$('.report').removeAttr('checked','checked');
		$('.transaction').removeAttr('checked','checked');
		$.ajax
		({
			url : '/retrieveAccess',
			data : {emp_type_id:$(this).data('id')},
			dataType : 'json',
			type : 'get',
			success:function(response)
			{
				response.forEach(function(data){
					$('#emp_type_id').val(data.emp_type_id);
					if(data.addlab == 1)
					{
						$('#addlab').attr('checked','checked')
					}
					if(data.uplab == 1)
					{
						$('#uplab').attr('checked','checked')
					}
					if(data.dellab == 1)
					{
						$('#dellab').attr('checked','checked')
					}
					if(data.addemp == 1)
					{
						$('#addemp').attr('checked','checked')
					}
					if(data.upemp == 1)
					{
						$('#upemp').attr('checked','checked')
					}
					if(data.delemp == 1)
					{
						$('#delemp').attr('checked','checked')
					}
					if(data.addemptype == 1)
					{
						$('#addemptype').attr('checked','checked')
					}
					if(data.upemptype == 1)
					{
						$('#upemptype').attr('checked','checked')
					}
					if(data.delemptype == 1)
					{
						$('#delemptype').attr('checked','checked')
					}
					if(data.editpercent == 1)
					{
						$('#editpercent').attr('checked','checked')
					}
					if(data.addempreb == 1)
					{
						$('#addempreb').attr('checked','checked')
					}
					if(data.delempreb == 1)
					{
						$('#delempreb').attr('checked','checked')
					}
					if(data.addserv == 1)
					{
						$('#addserv').attr('checked','checked')
					}
					if(data.upserv == 1)
					{
						$('#upserv').attr('checked','checked')
					}
					if(data.delserv == 1)
					{
						$('#delserv').attr('checked','checked')
					}
					if(data.addservtype == 1)
					{
						$('#addservtype').attr('checked','checked')
					}
					if(data.upservtype == 1)
					{
						$('#upservtype').attr('checked','checked')
					}
					if(data.delservtype == 1)
					{
						$('#delservtype').attr('checked','checked')
					}
					if(data.addservgrp == 1)
					{
						$('#addservgrp').attr('checked','checked')
					}
					if(data.upservgrp == 1)
					{
						$('#upservgrp').attr('checked','checked')
					}
					if(data.delservgrp == 1)
					{
						$('#delservgrp').attr('checked','checked')
					}
					if(data.addpack == 1)
					{
						$('#addpack').attr('checked','checked')
					}
					if(data.uppack == 1)
					{
						$('#uppack').attr('checked','checked')
					}
					if(data.delpack == 1)
					{
						$('#delpack').attr('checked','checked')
					}
					if(data.addcorp == 1)
					{
						$('#addcorp').attr('checked','checked')
					}
					if(data.upcorp == 1)
					{
						$('#upcorp').attr('checked','checked')
					}
					if(data.delcorp == 1)
					{
						$('#delcorp').attr('checked','checked')
					}
					if(data.addcorppack == 1)
					{
						$('#addcorppack').attr('checked','checked')
					}
					if(data.upcorppack == 1)
					{
						$('#upcorppack').attr('checked','checked')
					}
					if(data.delcorppack == 1)
					{
						$('#delcorppack').attr('checked','checked')
					}
					if(data.addpatient == 1)
					{
						$('#addpatient').attr('checked','checked')
					}
					if(data.uppatient == 1)
					{
						$('#uppatient').attr('checked','checked')
					}
					if(data.delpatient == 1)
					{
						$('#delpatient').attr('checked','checked')
					}
					if(data.availserv == 1)
					{
						$('#availserv').attr('checked','checked')
					}
					if(data.corpbill == 1)
					{
						$('#corpbill').attr('checked','checked')
					}
					if(data.rebatebill == 1)
					{
						$('#rebatebill').attr('checked','checked')
					}
					if(data.addresult == 1)
					{
						$('#addresult').attr('checked','checked')
					}
					if(data.upresult == 1)
					{
						$('#upresult').attr('checked','checked')
					}
					if(data.census == 1)
					{
						$('#census').attr('checked','checked')
					}
					if(data.trans == 1)
					{
						$('#trans').attr('checked','checked')
					}
					if(data.corprep == 1)
					{
						$('#corprep').attr('checked','checked')
					}
					if(data.rebaterep == 1)
					{
						$('#rebaterep').attr('checked','checked')
					}
					
				})
			}
		});

	});

</script>



@endsection