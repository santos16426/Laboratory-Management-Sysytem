@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-dashboard" aria-hidden="true"></i><span> Home</span>
@endsection

@section ('breadParentName')
<i class="fa fa-terminal" aria-hidden="true"></i><span> Queries</span>
@endsection

@section('maintenanceactive')
<a href="" class="">
@endsection

@section('query','active')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<section class="panel">
			<header class="panel-heading">
				Queries
				<span class="tools pull-right">
		          <a class="fa fa-chevron-down" href="javascript:;"></a>
		          
		      	</span>
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<form class="form-horizontal">
						<div class="form-group">
							<div class="col-md-10 col-md-offset-1 input-group">
								<span class="input-group-addon">Select Query<sup>*</sup></span>
								<select class="form-control query" id="search" >
									<option value="Patient" data-id="Patient">Patient with most transactions (Top 5)</option>
									<option value="Employee" data-id="Employee">Employee With most rebate (Top 5)</option>
									<option value="Corporate" data-id="Corporate">Corporate Account with most transaction (Top 5)</option>
									<option value="Service" data-id="Service">Service that is most availed (Top 5)</option>
									<option value="AllServices" data-id="AllServices">See all Medical Services w/ Price</option>
									<option value="Package" data-id="Package">Packages that is most used (Top 5)</option>

								</select>
							</div>
						</div>

						
						<div class="col-md-12">
			          		<div class="col-md-12">
			          			<button type="button" class="btn btn-success btn-block" id="searchbtn">Search</button>
			          		</div>
			          	</div>
        			</form>
				</div>
			</div>
		</section>
	</div>
</div>
<div class="row" id="patienttbl">
	<div class="col-md-12">
		<section class="panel">
			<div class="panel-body">
				<table class="table table-bordered table-hover dataTable" id="ptnttbl">
					<thead>
						<tr>
							<th>Patient Name</th>
							<th>Patient Type</th>
							<th>Address</th>
							<th>Gender</th>
							<th>Birthday</th>
							<th>Age</th>
							<th>Civil Status</th>
							<th>No. of Transactions</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
		</section>
	</div>
</div>

<div class="row hidden" id="employeetbl">
	<div class="col-md-12">
		<section class="panel">
			<div class="panel-body">
				<table class="table table-bordered table-hover dataTable" id="emptbl">
					<thead>
						<tr>
							<th>Employee Name</th>
							<th>Employee Type</th>
							<th>Rebate</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
		</section>
	</div>
</div>
<div class="row hidden" id="corporatetbl">
	<div class="col-md-12">
		<section class="panel">
			<div class="panel-body">
				<table class="table table-bordered table-hover dataTable" id="corptbl">
					<thead>
						<tr>
							<th>Corporate Name</th>
							<th>No. of transactions</th>
							<th>Total Payments</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</section>
	</div>
</div>
<div class="row hidden" id="servicetbl">
	<div class="col-md-12">
		<section class="panel">
			<div class="panel-body">
				<table class="table table-bordered table-hover dataTable" id="servtbl">
					<thead>
						<tr>
							<th>Service Name</th>
							<th>Price</th>
							<th>No. of times availed</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</section>
	</div>
</div>
<div class="row hidden" id="allservicetbl">
	<div class="col-md-12">
		<section class="panel">
			<div class="panel-body">
				<table class="table table-bordered table-hover dataTable" id="allsrvctbl">
					<thead>
						<tr>
							<th>Service Name</th>
							<th>Price</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</section>
	</div>
</div>
<div class="row hidden" id="packagetbl">
	<div class="col-md-12">
		<section class="panel">
			<div class="panel-body">
				<table class="table table-bordered table-hover dataTable" id="packtbl">
					<thead>
						<tr>
							<th>Package Name</th>
							<th>Package Price</th>
							<th>No. of times availed</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</section>
	</div>
</div>
@endsection
@section('additional')
<script type="text/javascript">
	var allsrvctbl = $('#allsrvctbl').DataTable(
		{
			'paging'      : true,
			'lengthChange': true,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
		});
	var ptnttbl = $('#ptnttbl').DataTable(
		{
			'paging'      : true,
			'lengthChange': true,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
		});
	var emptbl= $('#emptbl').DataTable(
		{
			'paging'      : true,
			'lengthChange': true,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
		});
		var corptbl= $('#corptbl').DataTable(
		{
			'paging'      : true,
			'lengthChange': true,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
		});
		var servtbl = $('#servtbl').DataTable(
		{
			'paging'      : true,
			'lengthChange': true,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
		});
		var packtbl = $('#packtbl').DataTable(
		{
			'paging'      : true,
			'lengthChange': true,
			'searching'   : true,
			'ordering'    : false,
			'info'        : true,
			'autoWidth'   : true,
		});
</script>

<script type="text/javascript">

	$('.select2').select2(
		{
			placeholder:'Choose filter'
		});
	$('#search').select2();
	
	var allservicetbl = document.getElementById('allservicetbl');
	var patienttbl = document.getElementById('patienttbl');
	var employeetbl = document.getElementById('employeetbl');
	var corporatetbl = document.getElementById('corporatetbl');
	var servicetbl = document.getElementById('servicetbl');
	var packagetbl = document.getElementById('packagetbl');
	$('#searchbtn').click(function(){
		var search = $('#search').val();	
		if(search == 'Patient')
		{
			ptnttbl.clear().draw();
			$.ajax
			({
				url : '/QueryPatient',
				dataType : 'json',
				type : 'get',
				success:function(response){
					response.forEach(function(data){
						ptnttbl.row.add([
						data.name,
						data.ptype_name,
						data.patient_address,
						data.patient_gender,
						moment(data.patient_birthdate).format('MMMM Do YYYY'),
						data.age,
						data.patient_civilstatus,
						data.row_count
					]).draw(false)
					})
					toastr.options = {
				      "closeButton": true,
				      "debug": false,
				      "positionClass": "toast-top-right",
				      "onclick": null,
				      "showDuration": "3000",
				      "hideDuration": "100",
				      "timeOut": "3000",
				      "extendedTimeOut": "0",
				      "showEasing": "swing",
				      "hideEasing": "swing",
				      "showMethod": "show",
				      "hideMethod": "hide"
				    }
				    toastr.success("Done!");

				},
				error:function(){
					toastr.options = {
				      "closeButton": true,
				      "debug": false,
				      "positionClass": "toast-top-right",
				      "onclick": null,
				      "showDuration": "3000",
				      "hideDuration": "100",
				      "timeOut": "3000",
				      "extendedTimeOut": "0",
				      "showEasing": "swing",
				      "hideEasing": "swing",
				      "showMethod": "show",
				      "hideMethod": "hide"
				    }
				    toastr.error("Sorry! No data available");
				}
			})
		}
		
		if(search == 'Employee')
		{
			emptbl.clear().draw();
			$.ajax
			({
				url : '/QueryEmployee',
				dataType : 'json',
				type : 'get',
				success:function(response){
					response.forEach(function(data){
						emptbl.row.add([
						data.name,
						'',
						data.percentage
					]).draw(false)
					})
					toastr.options = {
				      "closeButton": true,
				      "debug": false,
				      "positionClass": "toast-top-right",
				      "onclick": null,
				      "showDuration": "3000",
				      "hideDuration": "100",
				      "timeOut": "3000",
				      "extendedTimeOut": "0",
				      "showEasing": "swing",
				      "hideEasing": "swing",
				      "showMethod": "show",
				      "hideMethod": "hide"
				    }
				    toastr.success("Done!");

				},
				error:function(){
					toastr.options = {
				      "closeButton": true,
				      "debug": false,
				      "positionClass": "toast-top-right",
				      "onclick": null,
				      "showDuration": "3000",
				      "hideDuration": "100",
				      "timeOut": "3000",
				      "extendedTimeOut": "0",
				      "showEasing": "swing",
				      "hideEasing": "swing",
				      "showMethod": "show",
				      "hideMethod": "hide"
				    }
				    toastr.error("Sorry! No data available");
				}
			})
		}
		if(search == 'Corporate')
		{
			corptbl.clear().draw();
			$.ajax
			({
				url : '/QueryCorp',
				dataType : 'json',
				type : 'get',
				success:function(response){
					response.forEach(function(data){
						corptbl.row.add([
						data.corp_name,
						data.row_count,
						data.charge
					]).draw(false)
					})
					toastr.options = {
				      "closeButton": true,
				      "debug": false,
				      "positionClass": "toast-top-right",
				      "onclick": null,
				      "showDuration": "3000",
				      "hideDuration": "100",
				      "timeOut": "3000",
				      "extendedTimeOut": "0",
				      "showEasing": "swing",
				      "hideEasing": "swing",
				      "showMethod": "show",
				      "hideMethod": "hide"
				    }
				    toastr.success("Done!");

				},
				error:function(){
					toastr.options = {
				      "closeButton": true,
				      "debug": false,
				      "positionClass": "toast-top-right",
				      "onclick": null,
				      "showDuration": "3000",
				      "hideDuration": "100",
				      "timeOut": "3000",
				      "extendedTimeOut": "0",
				      "showEasing": "swing",
				      "hideEasing": "swing",
				      "showMethod": "show",
				      "hideMethod": "hide"
				    }
				    toastr.error("Sorry! No data available");
				}
			})
		}
		if(search == 'AllServices')
		{
			allsrvctbl.clear().draw();
			$.ajax
			({
				url : '/QueryAllService',
				dataType : 'json',
				type : 'get',
				success:function(response){
					response.forEach(function(data){
						allsrvctbl.row.add([
						data.service_name,
						data.service_price,
					]).draw(false)
					})
					toastr.options = {
				      "closeButton": true,
				      "debug": false,
				      "positionClass": "toast-top-right",
				      "onclick": null,
				      "showDuration": "3000",
				      "hideDuration": "100",
				      "timeOut": "3000",
				      "extendedTimeOut": "0",
				      "showEasing": "swing",
				      "hideEasing": "swing",
				      "showMethod": "show",
				      "hideMethod": "hide"
				    }
				    toastr.success("Done!");

				},
				error:function(){
					toastr.options = {
				      "closeButton": true,
				      "debug": false,
				      "positionClass": "toast-top-right",
				      "onclick": null,
				      "showDuration": "3000",
				      "hideDuration": "100",
				      "timeOut": "3000",
				      "extendedTimeOut": "0",
				      "showEasing": "swing",
				      "hideEasing": "swing",
				      "showMethod": "show",
				      "hideMethod": "hide"
				    }
				    toastr.error("Sorry! No data available");
				}
			})
		}
		if(search == 'Service')
		{
			servtbl.clear().draw();
			$.ajax
			({
				url : '/QueryService',
				dataType : 'json',
				type : 'get',
				success:function(response){
					response.forEach(function(data){
						servtbl.row.add([
						data.service_name,
						data.service_price,
						data.row_count
					]).draw(false)
					})
					toastr.options = {
				      "closeButton": true,
				      "debug": false,
				      "positionClass": "toast-top-right",
				      "onclick": null,
				      "showDuration": "3000",
				      "hideDuration": "100",
				      "timeOut": "3000",
				      "extendedTimeOut": "0",
				      "showEasing": "swing",
				      "hideEasing": "swing",
				      "showMethod": "show",
				      "hideMethod": "hide"
				    }
				    toastr.success("Done!");

				},
				error:function(){
					toastr.options = {
				      "closeButton": true,
				      "debug": false,
				      "positionClass": "toast-top-right",
				      "onclick": null,
				      "showDuration": "3000",
				      "hideDuration": "100",
				      "timeOut": "3000",
				      "extendedTimeOut": "0",
				      "showEasing": "swing",
				      "hideEasing": "swing",
				      "showMethod": "show",
				      "hideMethod": "hide"
				    }
				    toastr.error("Sorry! No data available");
				}
			})
		}
		if(search == 'Package')
		{
			packtbl.clear().draw();
			$.ajax
			({
				url : '/QueryPackage',
				dataType : 'json',
				type : 'get',
				success:function(response){
					response.forEach(function(data){
						packtbl.row.add([
						data.pack_name,
						data.pack_price,
						data.row_count
					]).draw(false)
					})
					toastr.options = {
				      "closeButton": true,
				      "debug": false,
				      "positionClass": "toast-top-right",
				      "onclick": null,
				      "showDuration": "3000",
				      "hideDuration": "100",
				      "timeOut": "3000",
				      "extendedTimeOut": "0",
				      "showEasing": "swing",
				      "hideEasing": "swing",
				      "showMethod": "show",
				      "hideMethod": "hide"
				    }
				    toastr.success("Done!");

				},
				error:function(){
					toastr.options = {
				      "closeButton": true,
				      "debug": false,
				      "positionClass": "toast-top-right",
				      "onclick": null,
				      "showDuration": "3000",
				      "hideDuration": "100",
				      "timeOut": "3000",
				      "extendedTimeOut": "0",
				      "showEasing": "swing",
				      "hideEasing": "swing",
				      "showMethod": "show",
				      "hideMethod": "hide"
				    }
				    toastr.error("Sorry! No data available");
				}
			})
		}
	})

	$('#search').change(function(){
		var search = $('#search').val();	

		if(search == 'Patient')
		{
			allservicetbl.className = "row hidden"
			patienttbl.className = "row"
			employeetbl.className = "row hidden"
			corporatetbl.className = "row hidden"
			servicetbl.className = "row hidden"
			packagetbl.className = "row hidden"
		}
		if(search == 'Employee')
		{
			allservicetbl.className = "row hidden"
			patienttbl.className = "row hidden"
			employeetbl.className = "row"
			corporatetbl.className = "row hidden"
			servicetbl.className = "row hidden"
			packagetbl.className = "row hidden"
		}
		if(search == 'Corporate')
		{
			allservicetbl.className = "row hidden"
			patienttbl.className = "row hidden"
			employeetbl.className = "row hidden"
			corporatetbl.className = "row"
			servicetbl.className = "row hidden"
			packagetbl.className = "row hidden"
		}
		if(search == 'AllServices')
		{
			allservicetbl.className = "row"
			patienttbl.className = "row hidden"
			employeetbl.className = "row hidden"
			corporatetbl.className = "row hidden"
			servicetbl.className = "row hidden"
			packagetbl.className = "row hidden"
		}
		if(search == 'Service')
		{
			allservicetbl.className = "row hidden"
			patienttbl.className = "row hidden"
			employeetbl.className = "row hidden"
			corporatetbl.className = "row hidden"
			servicetbl.className = "row"
			packagetbl.className = "row hidden"
		}
		if(search == 'Package')
		{
			allservicetbl.className = "row hidden"
			patienttbl.className = "row hidden"
			employeetbl.className = "row hidden"
			corporatetbl.className = "row hidden"
			servicetbl.className = "row hidden"
			packagetbl.className = "row"
		}
	})
</script>
@endsection