@if(Session::get('addresult')!= 1)
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif
<!DOCTYPE html>
<html >
	<head>
		<meta charset="utf-8">
		<title>Medical Report</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('/plugins/medserv1.css') }}">
		<script src="{{ asset('/plugins/index.js') }}" ></script>
	</head>
	<body>
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

		<header>
			<address style="float: left">
			@foreach($getPatient as $patient)
			<p>Name:&nbsp;{{ $patient->patient_fname }} {{ $patient->patient_mname }} {{ $patient->patient_lname }}</p>
			<p>Age:&nbsp;{{ $patient->age }}</p>
			<p>Gender:&nbsp;{{ $patient->patient_gender }}</p><br><br>
			@endforeach
			</address>
			<address style="float: right;">
			<p>Company:&nbsp;{{ $corp_name }}</p>
			<p>Date:&nbsp;{{ $trans_date }}</p>
			</address>
		</header>
		<header>			
				<center><p>{{ $group_name }}</p></center>
			<br><br>
		</header>
		<header>
		<table class="inventory" style="width: 725px">
			<tr>
			    <th style="text-align: center;">Service</th>
			    <th style="text-align: center;">Result</th>
			  </tr>
			  @foreach($service_results as $service)
			  <tr>
			    <td style="text-align: center;">{{ $service->service_name }}</td>
			    <td style="text-align: center;">{{ $service->medserv1_result }}</td>
			  </tr>
			  @endforeach
		</table>
		</header>
		</article>
		<!-- <aside>
			<h1><span>Additional Notes</span></h1>
			<div>
				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
			</div>
		</aside> -->
		
		<header style="padding-top: 385px; font-size: 20px">
			<address style="float: left">
			<center>
			<img alt="" src="/banner.jpg" style="width: 150px; height: 90px float: left; max-height: 90px; max-width: 150px;">
			<p><span>NAME</span></p>
			<p>Medical Technologist<br>License No.:<span></span></p>
			</center>
			<br>
				<p>San Juan City</p>
				<p>156 N. Domingo Street, San Juan City</p>
				<p>Tel No. 576-5357</p>
				<p>Email: globalhealth_anonas@yahoo.com</p>
			</address>
			<address style="float: right;">
			<center>
			<img alt="" src="/banner.jpg" style="width: 150px; height: 90px float: left; max-height: 90px; max-width: 150px;">
			<p><span>NAME</span></p>
			<p>Pathologist<br>License No.:<span></span><p></p>
			</center>
			<br>
				<p>Quezon City</p>
				<p>Deofranz Plaza Bldng #2 Anonas Ext cor. V Luna  </p>
				<p>Road, Quezon City Tel No. 436-2057</p>
				<p>Email: globalhealth_anonas@yahoo.com</p>
			</address>

			<!-- <address style="float: left"><br>
				<p>San Juan City</p>
				<p>156 N. Domingo Street, San Juan City</p>
				<p>Tel No. 576-5357</p>
				<p>Email: globalhealth_anonas@yahoo.com</p>
			</address>
			<address style="float: right;"><br>
				<p>Quezon City</p>
				<p>Deofranz Plaza Bldng #2 Anonas Ext cor. V Luna  </p>
				<p>Road, Quezon City Tel No. 436-2057</p>
				<p>Email: globalhealth_anonas@yahoo.com</p>
			</address> -->
		</header>
		
	</body>
</html>
