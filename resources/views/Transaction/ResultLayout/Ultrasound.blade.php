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
			<header>
				<address rightinfo style="padding-bottom: 20px">
					<p style="padding-bottom: 8px"><strong>Company Name:</strong>< Insert Company Name ></p>
				<p style="padding-bottom: 8px"><strong>Address:</strong>< Insert Company Address ></p>
				<p style="padding-bottom: 8px"><strong>Contact Number:</strong> < Insert Company Tel No. ></p>
				<p style="padding-bottom: 8px"><strong>Email: < Insert Company Email ></strong></p><br>
				</address>
				<span><img alt="" src="/banner.jpg" style="width: 450px; height: 250px; float: left; max-height: 112px; max-width: 300px;"></span>
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
				<p>Laboratory Number:&nbsp;{{ $lab_id }}</p>
				<p>Date:&nbsp;{{ date('F jS, Y',strtotime($date)) }}</p>
				</address>
			</header>
			@endforeach


			<table>
				<tr>
					<td>
					<header style="font-size: 15px">
					@foreach($service as $serv)
					<address style="float: left; width: 500px; text-align: left;">
						<p>{{ $serv->ultra_title }}</p><br>
					</address>
					<br><br>
					</header>
					</td>
				</tr>
				<tr>
					<td style="height: 370px">
					<header style="font-size: 15px">
					<address style="float: left; width: 500px;">
					
					</header>
					<header style="font-size: 14px">
					<p style="font-size: 80%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $serv->ultra_impression }}</p>
					</header>
					</td>
				</tr>
				<tr>
					<td>
					<header style="font-size: 13px; padding-right: 50px">
					<address style="float: right;">
					<center>
					<img alt="" src="/Employee_signatures/{{ $serv->ultra_sonologist_img }}" style="width: 150px; height: 90px;float: left; max-height: 90px; max-width: 150px;">
					<p style="width: 150px">{{ $serv->emp_fname }} {{ $serv->emp_mname }} {{ $serv->emp_lname }}</p>
					<p>Sonologist</p>
					</center>
					</address><br><br><br><br><br><br>
					</header><br>
					@endforeach
					<header style="font-size: 20px">
					<center>
					<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Report is a medical opinion is based on objective imaging findings and is best correlated with clinical, <br>Laboratory and other ancillary findings by the patient's attending physician. </p>
					</center>
					</header><br><br><br>
					<header style="font-size: 13px">
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
					</td>
				</tr>
			</table>
	</body>
</html>
  
  