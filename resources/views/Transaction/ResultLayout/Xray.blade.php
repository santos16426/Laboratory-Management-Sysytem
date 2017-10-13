@if((Session::get('addresult')!= 1))
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif
<!DOCTYPE html>
<html >


	<body>

	<head>
		<meta charset="utf-8">
		<title>X-Ray</title>
		<link rel="stylesheet" href="{{ asset('/plugins/xray.css') }}">
		
	</head>
		<header>
			<address rightinfo style="padding-bottom: 20px">
				<p style="padding-bottom: 8px"><strong>Company Name:</strong>Globalhealth Diagnostics Center,Inc.</p>
				<p style="padding-bottom: 8px"><strong>Address:</strong>156 N. Domingo Street, San Juan City, Metro Manila</p>
				<p style="padding-bottom: 8px"><strong>Contact Number:</strong> 722-4544/436-2057</p>
				<p style="padding-bottom: 8px"><strong>Email: globalhealth_sj@yahoo.com</strong></p><br>
			</address>
			<span><img alt="" src="/banner.jpg" style="width: 500px; height: 250px float: left; max-height: 112px; max-width: 330px;"></span>
		</header><br><br>
		<article>
		@foreach($patientinfo as $patient)
		<header>
			<address style="float: left">
			<p>Name:&nbsp;{{ $patient->patient_fname }} {{ $patient->patient_mname }} {{ $patient->patient_lname }}</p>
			<p>Age:&nbsp;{{ $patient->age }}</p>
			<p>Gender:&nbsp;{{ $patient->patient_gender }}</p><br><br>
			
			</address>
			<address style="float: right;">
			<p>Laboratory Number:&nbsp;{{ $lab_id}}</p>
			<p>Date:&nbsp;{{ date('F jS, Y',strtotime($date)) }}</p>
			</address>
			@endforeach
		</header>
		@foreach($service as $serv)
		<header>
			<address style="float: left; width: 500px;">
				<p>X-Ray:&nbsp;{{ $serv->xray_title }}</p><br>
			</address>
			
			<br><br>
		</header>
		<header>
		<address style="float: left; width: 500px;">
			<p>Findings:&nbsp;<br><span style="margin-left: 1in">{{ $serv->xray_findings }}</span></p><br>
		</header>
		
		</article>

		<header style="padding-top: 350px; font-size: 20px">
			<address style="float: left; padding-left: 40px">
			<center>
			<img alt="" src="/Employee_signatures/{{ $serv->xray_radiologic_img }}" style="width: 250px; height: 90px; float: left; max-height: 90px; max-width: 350px;">
			@foreach($emp as $radic)
				@if($radic->emp_id == $serv->xray_radiologic)
					<p><span style="text-decoration: underline;">{{ $radic->name }}</span></p>
					<p>Radiologic Technologist<br>License No.:{{ $radic->license_no }}</p>
				@endif
			@endforeach
			</center>
			</address>

			<address style="float: right; padding-right: 40px">
			<center>
			<img alt="" src="/Employee_signatures/{{ $serv->xray_radiologist_img }}" style="width: 200px; height: 90px; float: left; max-height: 90px; max-width: 200px;">
			@foreach($emp as $radic)
				@if($radic->emp_id == $serv->xray_radiologist)
					<p><span style="text-decoration: underline;">{{ $radic->name }}</span></p>
					<p>Radiologist</p>
				@endif
			@endforeach
			
			</center>
			</address><br><br><br><br><br><br>
		</header>
		@endforeach
		<header style="font-size: 20px;padding-top: 25px">
			<center>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Report is a medical opinion is based on objective imaging findings and is best correlated with clinical, <br>Laboratory and other ancillary findings by the patient's attending physician. </p>
			</center>
		</header><br><br><br>

		<header style="font-size: 20px">
			<address style="float: left">
				<p>San Juan City</p>
				<p>156 N. Domingo Street, San Juan City</p>
				<p>Tel No. 576-5357</p>
				<p>Email: globalhealth_anonas@yahoo.com</p>
			</address>
			
		</header>
	</body>
</html>
  
   
