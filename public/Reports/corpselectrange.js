$('#selectrange').change(function(){
		var report = $(this).val();
		var startdate = document.getElementById('startdate');
		var monthly = document.getElementById('monthly');
		var yearly = document.getElementById('yearly');
		var rangepicker = document.getElementById('rangepicker');
		if(report == 'daily')
		{
			$('#barcharts').empty();
			$('#barcharts').append('No available')
			startdate.className = "form-group";
			monthly.className = "form-group hidden";
			yearly.className = "form-group hidden";
			rangepicker.className = "form-group hidden";

		}
		else if(report == 'weekly')
		{
			$('#barcharts').empty();
			$('#barcharts').append('No data');
			startdate.className = "form-group";
			monthly.className = "form-group hidden";
			yearly.className = "form-group hidden";
			rangepicker.className = "form-group hidden";
		}
		else if(report == 'monthly')
		{
			$('#barcharts').empty();
			$('#barcharts').append('No available');
			startdate.className = "form-group hidden";
			monthly.className = "form-group ";
			yearly.className = "form-group hidden";
			rangepicker.className = "form-group hidden";
		}
		else if(report == 'yearly')
		{
			$('#barcharts').empty();
			$('#barcharts').append('No available');
			startdate.className = "form-group hidden";
			monthly.className = "form-group hidden";
			yearly.className = "form-group ";
			rangepicker.className = "form-group hidden";
		}
		else if(report == 'range')
		{
			$('#barcharts').empty();
			$('#barcharts').append('No available');
			startdate.className = "form-group hidden";
			monthly.className = "form-group hidden";
			yearly.className = "form-group hidden";
			rangepicker.className = "form-group ";
		}
		else if(report == 'all')
		{
			$('#barcharts').empty();
			$('#barcharts').append('No available');
			startdate.className = "form-group hidden";
			monthly.className = "form-group hidden";
			yearly.className = "form-group hidden";
			rangepicker.className = "form-group hidden";
		}
	});