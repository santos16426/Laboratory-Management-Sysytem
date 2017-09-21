@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-area-chart" aria-hidden="true"></i><span> Reports</span>
@endsection
@section('breadParentName')
<i class="fa fa-bar-chart-o" aria-hidden="true"></i><span> Transaction Reports</span>
@endsection
@section('maintenanceactive')
<a href="" class="">
@endsection
@section('reportactive','active')
@section('transactionactive','active')
@section('content')
<div class="row">
	<div class="col-lg-6">
		<section class="panel">
			<header class="panel-heading">
				Transaction Report Generate
				<span class="tools pull-right">
		          <a class="fa fa-chevron-down" href="javascript:;"></a>
		          <a class="fa fa-times" href="javascript:;"></a>
		      	</span>
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<form class="form-horizontal">
						<div class="form-group">
							<div class="col-md-10 col-md-offset-1 input-group">
								<span class="input-group-addon">Report<sup>*</sup></span>
								<select class="form-control select2" id="selectrange">
									<option value="daily">Daily</option>
									<option value="weekly">Weekly</option>
									<option value="monthly">Monthly</option>
									<option value="yearly">Yearly</option>
									<option value="range">Select Range</option>
									<option value="all">See all transactions</option>
								</select>
							</div>
						</div>
						
						<div class="form-group" id="startdate">
			              <div class="col-md-10 col-md-offset-1 input-group">
			              	<span class="input-group-addon">Starting Date <sup>*</sup></span>
								<div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="yyyy-mm-dd"  class="input-append date dpYears">
			                  		<input class="form-control form-control-inline input-medium default-date-picker" name="start_date" id="start_date_date"  size="16" type="text" value="" />
			                  	</div>
			              </div>
			          	</div>

			          	<div class="form-group hidden" id="monthly">
			              <div class="col-md-9 col-md-offset-1 input-group">
			              	<span class="input-group-addon">Month/Year <sup>*</sup></span>
			                <div data-date-minviewmode="months" data-date-viewmode="years" data-date-format="mm/yyyy" data-date="102/2012"  class="input-append date dpMonths">
			                  <input type="text" readonly="" value="mm/yyyy" size="16" class="form-control" name="monthly" id="monthly_date">
			                  <span class="input-group-btn add-on">
			                    <button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
			                  </span>
			                </div>
			            	</div>
			          	</div>

			          	<div class="form-group hidden" id="yearly">
			              <div class="col-md-9 col-md-offset-1 input-group">
			              	<span class="input-group-addon">Year <sup>*</sup></span>
			                <div data-date-minviewmode="years" data-date-viewmode="years" data-date-format="yyyy " data-date="2020/"  class="input-append date dpMonths">
			                  <input type="text" readonly="" value="yyyy" size="16" class="form-control" name="yearly" id="yearly_date">
			                  <span class="input-group-btn add-on">
			                    <button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
			                  </span>
			                </div>
			            	</div>
			          	</div>

						<div class="form-group hidden" id="rangepicker">
			              <div class="col-md-10 col-md-offset-1 input-group">
			              	<span class="input-group-addon">Select Range <sup>*</sup></span>
			                  <div class="input-group input-large"  data-date="13/07/2013" data-date-format="mm/dd/yyyy">
			                    <input type="text" class="form-control dpd1" name="rangestart" id="rangestart_date">
			                    <span class="input-group-addon">To</span>
			                    <input type="text" class="form-control dpd2" name="rangeend" id="rangeend_date">
			                  </div>
			              </div>
			          	</div>
			          	<div class="col-md-12">
			          		<div class="col-md-12">
			          			<button type="button" class="btn btn-success btn-block" id="generatebtn">Generate</button>
			          		</div>
			          	</div>
        			</form>
				</div>
			</div>
		</section>
	</div>
</div>	
<div class="row" id="reportdiv">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Transaction Report
				<span class="tools pull-right">
		          <a class="fa fa-chevron-down" href="javascript:;"></a>
		          <a class="fa fa-times" href="javascript:;"></a>
		      	</span>
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<table class="table table-bordered table-hover dataTable" id="transTbl">
						<thead>
							<tr>
								<th>Transaction ID</th>
								<th>Transaction Date</th>
								<th>Total</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div> 
			</div>
			<div class="panel-footer">
				<button type="button" class="btn btn-success pull-right" id="printbtn">Print</button>
			</div>
		</section>
	</div>
</div>			
@endsection
@section('additional')

<script type="text/javascript">
	var t = $('#transTbl').DataTable({
	  'paging'      : true,
	  'lengthChange': true,
	  'searching'   : true,
	  'ordering'    : false,
	  'info'        : true,
	  'autoWidth'   : true,
	  'bSort'		: false
	});
	$('#printbtn').click(function(){
		var check = $('.trans_id').val();
		if(check == null){
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
		    toastr.error("No reports to be print");
		}
		else{
			
		}
	});
	$('#generatebtn').click(function(){
		var report = $('#selectrange').val();
	    var start_date = $('#start_date_date').val();
	    var monthly = $('#monthly_date').val();
	    var yearly = $('#yearly_date').val();
	    var rangestart = $('#rangestart_date').val();
    	var rangeend = $('#rangeend_date').val();

		if(report == 'daily')
		{
			if(start_date != '')
			{
				t.clear().draw();
				$.ajax
				({
					url: '/dailyTransactionReport',
					type: 'get',
					data:  { start_date:start_date},
					dataType : 'json',
					success:function(response){
						response.forEach(function(data){
							t.row.add([
								data.trans_id,
								data.trans_date,
								data.trans_total + data.charge,
								'<a class="btn btn-primary btn-xs printTrans" data-id="'+data.trans_id+'"><i class="fa fa-print" aria-hidden="true" ></i>&nbsp;Print</a><input type="hidden" value='+data.trans_id+' class="trans_id">'
							]).draw(false);
						})
					}
				});
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
			}
			else
			{
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
			    toastr.warning("Please select a starting date");
			}
		}
		else if(report == 'weekly')
		{
			if(start_date != '')
			{

			    var date = new Date(start_date);
			    var newdate = new Date(date);
			    var sdd = date.getDate();
			    var smm = date.getMonth() + 1;
			    var sy = date.getFullYear();

			    var startdate = sy + '-' + smm + '-' + sdd;
			    newdate.setDate(newdate.getDate() + 7);
			    
			    var dd = newdate.getDate();
			    var mm = newdate.getMonth() + 1;
			    var y = newdate.getFullYear();



			    var enddate =  y + '-' + mm + '-' + dd ;
				t.clear().draw();
				$.ajax
				({
					url: '/weeklyTransactionReport',
					type: 'get',
					data:  { 
						startdate:startdate,
						enddate:enddate
					},
					dataType : 'json',
					success:function(response){
						response.forEach(function(data){
							t.row.add([
								data.trans_id,
								data.trans_date,
								data.trans_total + data.charge,
								'<a class="btn btn-primary btn-xs printTrans" data-id="'+data.trans_id+'"><i class="fa fa-print" aria-hidden="true" ></i>&nbsp;Print</a><input type="hidden" value='+data.trans_id+' class="trans_id">'
							]).draw(false);
						})
					}
				});
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
			}
			else
			{
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
			    toastr.warning("Please select a starting date");
			}
		}
		else if(report == 'monthly')
		{
			if(monthly != 'mm/yyyy')		    
			{
				var date = new Date("01/"+monthly);
			    var newdate = new Date(date);
			    var smm = date.getDate();
			    var sy = date.getFullYear();
			    t.clear().draw();
				$.ajax
				({
					url: '/monthlyTransactionReport',
					type: 'get',
					data:  { 
						month : smm,
						year : sy
					},
					dataType : 'json',
					success:function(response){
						response.forEach(function(data){
							t.row.add([
								data.trans_id,
								data.trans_date,
								data.trans_total + data.charge,
								'<a class="btn btn-primary btn-xs printTrans" data-id="'+data.trans_id+'"><i class="fa fa-print" aria-hidden="true" ></i>&nbsp;Print</a><input type="hidden" value='+data.trans_id+' class="trans_id">'
							]).draw(false);
						})
					}
				});
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
			}
			else
			{
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
			    toastr.warning("Please select a Month/Year");
			}

		}
		else if(report == 'yearly')
		{
			if(yearly != 'yyyy')   
			{
				var date = new Date("01/01/"+yearly);
			    var newdate = new Date(date);
			    var sy = date.getFullYear();
			    t.clear().draw();
				$.ajax
				({
					url: '/yearlyTransactionReport',
					type: 'get',
					data:  { 
						month : smm,
						year : sy
					},
					dataType : 'json',
					success:function(response){
						response.forEach(function(data){
							t.row.add([
								data.trans_id,
								data.trans_date,
								data.trans_total + data.charge,
								'<a class="btn btn-primary btn-xs printTrans" data-id="'+data.trans_id+'"><i class="fa fa-print" aria-hidden="true" ></i>&nbsp;Print</a><input type="hidden" value='+data.trans_id+' class="trans_id">'
							]).draw(false);
						})
					}
				});
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
			}
			else
			{
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
			    toastr.warning("Please select a Year");
			}
		}
		else if(report == 'range')
		{
			var startdate = new Date(rangestart);
		    var enddate = new Date(rangeend);
		    var edd = enddate.getDate();
		    var emm = enddate.getMonth() + 1;
		    var ey = enddate.getFullYear();

		    var sdd = startdate.getDate();
		    var smm = startdate.getMonth() + 1;
		    var sy = startdate.getFullYear();

		    var end_date =  ey + '-' + emm + '-' + edd ;
		    var start_date =  sy + '-' + smm + '-' + sdd ;
		    if(startdate != 'Invalid Date' && enddate != 'Invalid Date')   
			{
			    t.clear().draw();
				$.ajax
				({
					url: '/rangeTransactionReport',
					type: 'get',
					data:  { 
						enddate : end_date,
						startdate : start_date
					},
					dataType : 'json',
					success:function(response){
						response.forEach(function(data){
							t.row.add([
								data.trans_id,
								data.trans_date,
								data.trans_total + data.charge,
								'<a class="btn btn-primary btn-xs printTrans" data-id="'+data.trans_id+'"><i class="fa fa-print" aria-hidden="true" ></i>&nbsp;Print</a><input type="hidden" value='+data.trans_id+' class="trans_id">'
							]).draw(false);
						})
					}
				});
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
			}
			else
			{
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
			    toastr.warning("Please select a date range");
			}
		}
		else if(report == 'all')
		{
			$.ajax
				({
					url: '/allTransactionReport',
					type: 'get',
					dataType : 'json',
					success:function(response){
						response.forEach(function(data){
							t.row.add([
								data.trans_id,
								data.trans_date,
								data.trans_total + data.charge,
								'<a class="btn btn-primary btn-xs printTrans" data-id="'+data.trans_id+'"><i class="fa fa-print" aria-hidden="true" ></i>&nbsp;Print</a><input type="hidden" value='+data.trans_id+' class="trans_id">'
							]).draw(false);
						})
					}
				});
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
		}
	});
	$('#selectrange').change(function(){
		var report = $(this).val();
		var startdate = document.getElementById('startdate');
		var monthly = document.getElementById('monthly');
		var yearly = document.getElementById('yearly');
		var rangepicker = document.getElementById('rangepicker');
		if(report == 'daily')
		{
			startdate.className = "form-group";
			monthly.className = "form-group hidden";
			yearly.className = "form-group hidden";
			rangepicker.className = "form-group hidden";

		}
		else if(report == 'weekly')
		{
			startdate.className = "form-group";
			monthly.className = "form-group hidden";
			yearly.className = "form-group hidden";
			rangepicker.className = "form-group hidden";
		}
		else if(report == 'monthly')
		{
			startdate.className = "form-group hidden";
			monthly.className = "form-group ";
			yearly.className = "form-group hidden";
			rangepicker.className = "form-group hidden";
		}
		else if(report == 'yearly')
		{
			startdate.className = "form-group hidden";
			monthly.className = "form-group hidden";
			yearly.className = "form-group ";
			rangepicker.className = "form-group hidden";
		}
		else if(report == 'range')
		{
			startdate.className = "form-group hidden";
			monthly.className = "form-group hidden";
			yearly.className = "form-group hidden";
			rangepicker.className = "form-group ";
		}
		else if(report == 'all')
		{
			startdate.className = "form-group hidden";
			monthly.className = "form-group hidden";
			yearly.className = "form-group hidden";
			rangepicker.className = "form-group hidden";
		}
	});
</script>
@endsection