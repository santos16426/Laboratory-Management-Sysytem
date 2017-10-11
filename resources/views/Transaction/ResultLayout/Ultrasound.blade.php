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
		<title>Ultrasound</title>
		<link rel="stylesheet" href="{{ asset('/plugins/ultra.css') }}">
		
	</head>
		<center>
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
			<address style="float: left; text-align: left;">
			<p>Name:&nbsp;{{ $patient->patient_fname }} {{ $patient->patient_mname }} {{ $patient->patient_lname }}</p>
			<p>Age:&nbsp;{{ $patient->age }}</p>
			<p>Gender:&nbsp;{{ $patient->patient_gender }}</p><br><br>
			
			</address>
			<address style="float: right; text-align: left;">
			<p>Laboratory Number:&nbsp;<span contenteditable style="width: 100px"></span></p>
			<p>Date:&nbsp;<span contenteditable style="width: 100px"></span></p>
			</address>
		</header>
		@endforeach
		<header>
			<address style="float: left; width: 500px; text-align: left;">
				<p>Ultrasound:&nbsp;<span contenteditable style="width: 500px;"></span></p><br>
			</address>
			
			<br><br>
		</header>
		<header>
			<p contenteditable style="font-size: 90%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
		</header>
		<header>
			<address style="float: left; width: 500px; text-align: left;">
				<p>Impression:&nbsp;<br><span contenteditable style="width: 500px;"></span></p><br>
			</address>
			
			<br><br>
		</header>
		</article>
		<!-- <aside>
			<h1><span contenteditable>Additional Notes</span></h1>
			<div contenteditable>
				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
			</div>
		</aside> -->
		<header style="padding-top: 245px; font-size: 20px; padding-right: 50px">
			<address style="float: right;">
			<center>
			<img alt="" src="/banner.jpg" style="width: 150px; height: 90px float: left; max-height: 90px; max-width: 150px;">
			<p><span>NAME</span></p>
			<p>Radiologist</p>
			</center>
			</address><br><br><br><br><br><br>
		</header>

		<header style="font-size: 20px">
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
			<address style="float: right;">
				<p>Quezon City</p>
				<p>Deofranz Plaza Bldng #2 Anonas Ext cor. V Luna  </p>
				<p>Road, Quezon City Tel No. 436-2057</p>
				<p>Email: globalhealth_anonas@yahoo.com</p>
			</address>
		</header>
	</body>
</html>
  
  