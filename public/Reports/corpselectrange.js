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