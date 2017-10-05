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
<style type="text/css">
	#linechart {
	min-width: 310px;
	max-width: 800px;
	height: 400px;
	margin: 0 auto
}
</style>
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
					<header class="panel-heading btn-info ">
						<ul class="nav nav-tabs">
				          	<li class="active">
				              	<a data-toggle="tab" href="#tables">Tables</a>
				          	</li>
				          	<li>
				              	<a data-toggle="tab" href="#charts">Chart</a>
				          	</li>
				      	</ul>
			      	</header>
					<div class="tab-content">
						<div class="tab-pane active" id="tables">
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
						<div class="tab-pane" id="charts">
							<br>
							<div class="row">
								<div class="col-md-6">
									<section class="panel">
										<header class="panel-heading btn-info">
											Bar Chart											
										</header>
										<div class="panel-body bg-info">
											<div id="barcharts">Not Available</div>
										</div>
									</section>
								</div>

								<div class="col-md-6">
									<section class="panel">
										<header class="panel-heading btn-info">
											Pie Chart											
										</header>
										<div class="panel-body bg-info">
											<div id="piecharts">Not Available</div>
										</div>
									</section>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<section class="panel">
										<header class="panel-heading btn-info">
											Line Chart											
										</header>
										<div class="panel-body bg-info">
											<div id="linecharts">Not Available</div>
										</div>
									</section>
								</div>
							</div>
						</div>
					</div>
					</div>
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
<script type="text/javascript" src="{{ asset('/Reports/transprintbtn.js') }}"></script>
<script type="text/javascript" src="{{ asset('/Reports/transgeneratebtn.js') }}"></script>
<script type="text/javascript" src="{{ asset('/Reports/corpselectrange.js') }}"></script>
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
	
	

</script>
@endsection