<!DOCTYPE html>
<html >


	<body>

	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="{{ asset('/plugins/ultra.css') }}">
		
	</head>
		<center>
			<header>
				<img alt="" src="banner.jpg">
			</header>
		</center><br><br>
		<article>
		@foreach($patientinfo as $patient)
		<header>
			<address style="float: left">
			<p>Name:&nbsp;{{ $patient->patient_fname }} {{ $patient->patient_mname }} {{ $patient->patient_lname }}</p>
			<p>Age:&nbsp;{{ $patient->age }}</p>
			<p>Gender:&nbsp;{{ $patient->patient_gender }}</p><br><br>
			
			</address>
			<address style="float: right;">
			<p>Laboratory Number:&nbsp;<span contenteditable style="width: 100px"></span></p>
			<p>Date:&nbsp;<span contenteditable style="width: 100px"></span></p>
			</address>
		</header>
		@endforeach
		<header>
			<address style="float: left; width: 500px;">
				<p>Ultrasound:&nbsp;<span contenteditable style="width: 500px;"></span></p><br>
			</address>
			
			<br><br>
		</header>
		<header>
			<p contenteditable style="font-size: 90%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
		</header>
		<header>
			<address style="float: left; width: 500px;">
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
		<footer>
		<header>
			<address style="padding-left: 360px">
			<center>
			<p><span contenteditable style="width: 500px; text-align: center">Name</span></p>
			<p>Radiologist</p>
			</center>
			</address>
		</header><br><br>
		<header> 	
			<address>
				<center>
					<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Report is a medical opinion is based on objective imaging findings and is best correlated with clinical, <br>Laboratory and other ancillary findings by the patient's attending physician. </p>
				</center>
			</address>
		</header>
		<header>
			<address style="">
			<br>
				<p>San Juan City</p>
				<p>156 N. Domingo Street, San Juan City</p>
				<p>Tel No. 576-5357</p>
				<p>Email: globalhealth_anonas@yahoo.com</p>
			</address>
			<address style="padding-left: 230px">
			<br>
				<p>Quezon City</p>
				<p>Deofranz Plaza Bldng #2 Anonas Ext cor. V Luna  </p>
				<p>Road, Quezon City Tel No. 436-2057</p>
				<p>Email: globalhealth_anonas@yahoo.com</p>
			</address>
		</header>
		</footer>
	</body>
</html>
  
  