$('#selectrange').change(function(){
		var report = $(this).val();
		var startdate = document.getElementById('startdate');
		var monthly = document.getElementById('monthly');
		var yearly = document.getElementById('yearly');
		
		if(report == 'daily')
		{
			$('#barcharts').empty();
			$('#barcharts').append('No available data')
			$('#piecharts').empty();
			$('#piecharts').append('No available data')
			startdate.className = "form-group";
			monthly.className = "form-group hidden";
			yearly.className = "form-group hidden";
			

		}
		else if(report == 'weekly')
		{
			$('#barcharts').empty();
			$('#barcharts').append('No available data');
			$('#piecharts').empty();
			$('#piecharts').append('No available data')
			startdate.className = "form-group";
			monthly.className = "form-group hidden";
			yearly.className = "form-group hidden";
			
		}
		else if(report == 'monthly')
		{
			$('#barcharts').empty();
			$('#barcharts').append('No available data');
			$('#piecharts').empty();
			$('#piecharts').append('No available data')
			startdate.className = "form-group hidden";
			monthly.className = "form-group ";
			yearly.className = "form-group hidden";
			
		}
		else if(report == 'yearly')
		{
			$('#barcharts').empty();
			$('#barcharts').append('No available data');
			$('#piecharts').empty();
			$('#piecharts').append('No available data')
			startdate.className = "form-group hidden";
			monthly.className = "form-group hidden";
			yearly.className = "form-group ";
			
		}
		
	});