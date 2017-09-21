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
								</select>
							</div>
						</div>
						
						<div class="form-group" id="startdate">
              <div class="col-md-10 col-md-offset-1 input-group">
              	<span class="input-group-addon">Starting Date</span>
                  <input class="form-control form-control-inline input-medium default-date-picker" name="start_date" id="start_date_date"  size="16" type="text" value="" />
              </div>
          	</div>

          	<div class="form-group hidden" id="monthly">
              <div class="col-md-9 col-md-offset-1 input-group">
              	<span class="input-group-addon">Month/Year</span>
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
              	<span class="input-group-addon">Year</span>
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
              	<span class="input-group-addon">Select Range</span>
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
	
</div>			
@endsection
@section('additional')
<script type="text/javascript">
	$('#generatebtn').click(function(){
		var report = $('#selectrange').val();
    var start_date = $('#start_date_date').val();
    var monthly = $('#monthly_date').val();
    var yearly = $('#yearly_date').val();
    var rangestart = $('#rangestart_date').val();
    var rangeend = $('#rangeend_date').val();
		
		if(report == 'daily')
		{
			alert(start_date);
			$.ajax
			({
				url: '/dailyTransactionReport',
	      type: 'get',
	      data:  { start_date:start_date},
	      dataType : 'json',
	      success:function(response){
	        response[0].forEach(function(data){
	          
	        })
	        
	      }
			});
		}
		else if(report == 'weekly')
		{
			alert(start_date);
		}
		else if(report == 'monthly')
		{
			alert(monthly);
		}
		else if(report == 'yearly')
		{
			alert(yearly);
		}
		else if(report == 'range')
		{
			alert(rangestart);
			alert(rangeend);
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
	});
</script>
@endsection