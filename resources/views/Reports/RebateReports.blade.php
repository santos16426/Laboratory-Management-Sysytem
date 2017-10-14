@extends('AdminLayout.admin')

@if((Session::get('corprep')!=1))
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif

@section ('breadrootName')
<i class="fa fa-area-chart" aria-hidden="true"></i><span> Reports</span>
@endsection
@section('breadParentName')
<i class="fa fa-line-chart" aria-hidden="true"></i><span> Rebate Reports</span>
@endsection
@section('maintenanceactive')
<a href="" class="">
@endsection
@section('reportactive','active')
@section('rebaterepactive','active')
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
				Rebate Report Generate
				<span class="tools pull-right">
		          <a class="fa fa-chevron-down" href="javascript:;"></a>
		          
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
								</select>
							</div>
						</div>
						
						<div class="form-group" id="startdate">
			              <div class="col-md-10 col-md-offset-1 input-group">
			              	<span class="input-group-addon">Starting Date <sup>*</sup></span>
								<div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="yyyy-mm-dd"  class="input-append date dpYears">
			                  		<input class="form-control dpd2 form-control-inline input-medium default-date-picker" name="start_date" id="start_date_date"  size="16" type="text" value="" />
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
				Rebate Report
				<span class="tools pull-right">
		          <a class="fa fa-chevron-down" href="javascript:;"></a>
		          
		      	</span>
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<br>
					<div class="row">
						<div class="col-md-12">
							<section class="panel">
								<header class="panel-heading btn-info">
									Chart											
								</header>
								<div class="panel-body bg-info">
									<div id="barcharts">Not Available</div>
								</div>
							</section>
						</div>

					</div>
				</div> 
			</div>
			<div class="panel-footer">
				<button type="button" class="btn btn-success pull-right disabled" id="printbtn">Print</button>
			</div>
		</section>
	</div>
</div>			
@endsection
@section('additional')

<script type="text/javascript" src="{{ asset('/Reports/corpselectrange.js') }}"></script>
<script type="text/javascript" src="{{ asset('/Reports/rebategeneratebtn.js') }}"></script>
<script type="text/javascript" src="{{ asset('/Reports/rebateprintbtn.js') }}"></script>
@endsection