@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-wrench" aria-hidden="true"></i><span> Utilities</span>
@endsection
@section('breadParentName')
<i class="fa fa-recycle" aria-hidden="true"></i><span> Reactivation</span>
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
						  
						  <tr>
						  	<td></td>
						  	<td></td>
						  	<td></td>
						  	<td></td>
						  	<td></td>
						  	<td></td>
						    <td></td>
						    <td></td>
						    <td></td>
						    <td></td>
						    <td></td>
						    <td></td>
						    <td></td>
						    <td></td>
						    <td></td>
						    <td></td>
						    <td><a class="btn btn-warning btn-xs  updateModal" href="#updateModal" data-toggle="modal" data-id=""><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
						  </tr>
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
        	<form action="/save_rebatePercentage" method="POST" class="form-horizontal rebate" id="rebates">
    	 	<fieldset>
    	 		<legend><input type="checkbox" name="mastermaintenance" class="mastermaintenance"  value="1" id="mastermaintenance"><label for="mastermaintenance">&nbsp;Maintenance&nbsp;&nbsp;</label></legend>
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
										<input type="checkbox" name="addempreb" value="1" id="addempreb"><label for="addempreb">&nbsp;Add Employee Rebate&nbsp;&nbsp;</label>
										<br>
										<input type="checkbox" name="delempreb" id="delempreb" value="1"><label for="delempreb">&nbsp;Delete Employee Rebate&nbsp;&nbsp;</label>
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
										<input type="checkbox" name="upcorppack" class="maintenance"  id="upcorppack " value="1"><label for="upcorppack ">&nbsp;Update Corporate Package&nbsp;&nbsp;</label><br>
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
    	 		<legend><input type="checkbox" name="mastertransaction" class="mastertransaction" value="1" id="mastertransaction"><label for="mastertransaction">&nbsp;Transaction&nbsp;&nbsp;</label></legend>
    	 		<div class="col-md-12">
	    	 		<div class="col-md-4">
	    	 			<div class="form-group">
			            	<div class="col-sm-10 col-md-offset-1">
			                	<div class="input-group">
			                		<label><strong>Medical Service</strong></label><br>
			                  		<div style="padding-left: 20px">
			                    		<input type="checkbox" name="addpatient" class="transaction" value="1" id="addpatient"><label for="addpatient">&nbsp;Add Patient&nbsp;&nbsp;</label><br>
			                    		<input type="checkbox" name="availserv" value="1" id="availserv"><label for="availserv">&nbsp;Avail Service&nbsp;&nbsp;</label><br>
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
    	 		<legend><input type="checkbox" name="masterreport" class="masterreport" value="1" id="masterreport"><label for="masterreport">&nbsp;Reports&nbsp;&nbsp;</label></legend>
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
										<input type="checkbox" name="coprrep" class="report"  value="1" id="coprrep"><label for="coprrep">&nbsp;<strong>Corporate Report</strong>&nbsp;&nbsp;</label>
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
						<div class="form-group">
							<div class="col-sm-10 col-md-offset-1">
								<div class="input-group">
									<div style="">
										<input type="checkbox" name="upmedserv1" class="report"  value="1" id="upmedserv1"><label for="upmedserv1">&nbsp;<strong>Wala pa Report</strong>&nbsp;&nbsp;</label>
										<br>
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
</script>
@endsection