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
					<table  style="border-radius: 120px" class="table table-bordered">
					  <tr>
					    <th rowspan="2" colspan="1">Employee Type</th>
					    <th colspan="4">Transaction</th>
					    <th colspan="5">Reports</th>
					    <th rowspan="2" colspan="1">Action</th>
					  </tr>
					  <tr>
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
					    <td><a class="btn btn-warning btn-xs  updateModal" href="#updateModal" data-toggle="modal" data-id=""><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
					  </tr>
					</table>
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
    	 		<legend>Transactions</legend>
    	 		<div class="col-md-12">
	    	 		<div class="col-md-4">
	    	 			<div class="form-group">
			            	<div class="col-sm-10 col-md-offset-1">
			                	<div class="input-group">
			                		<label><strong>Medical Service</strong><sup>*</sup></label><br>
			                  		<div style="padding-left: 20px">
			                    		<input type="checkbox" name="upmedserv1" value="1" id="upmedserv1"><label for="upmedserv1">&nbsp;Add Patient&nbsp;&nbsp;</label><br>
			                    		<input type="checkbox" name="upmedserv2" value="1" id="upmedserv2"><label for="upmedserv2">&nbsp;Avail Service&nbsp;&nbsp;</label><br>
			                		</div>
			              		</div>
			           		</div>  
			         	</div>
	    	 		</div>

					<div class="col-md-4">
						<div class="form-group">
							<div class="col-sm-10 col-md-offset-1">
								<div class="input-group">
									<label><strong>Billing</strong><sup>*</sup></label><br>
									<div style="padding-left: 20px">
										<input type="checkbox" name="upecg" value="1" id="upecg"><label for="upecg">&nbsp;Corporate Billing&nbsp;&nbsp;</label>
										<br>
										<input type="checkbox" name="upxray" id="upxray" value="1"><label for="upxray">&nbsp;Rebate Billing&nbsp;&nbsp;</label>
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
									<label><strong>Result</strong><sup>*</sup></label><br>
									<div style="padding-left: 20px">
										<input type="checkbox" name="upultrasound" id="upultrasound" value="1"><label for="upultrasound">&nbsp;Add Result&nbsp;&nbsp;</label>
										<br>
										<input type="checkbox" name="updrugtest" id="updrugtest" value="1"><label for="updrugtest">&nbsp;Upload Result&nbsp;&nbsp;</label>
									</div>
								</div>
							</div>  
						</div>
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