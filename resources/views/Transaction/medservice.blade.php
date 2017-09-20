<!DOCTYPE html>
<html >
	<head>
		<meta charset="utf-8">
		<title>Medical Report</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('/plugins/style.css') }}">
		<script src="{{ asset('/plugins/index.js') }}" ></script>
	</head>
	<body>
		<center>
			<header>
				<img alt="" src="banner.jpg">
			</header>
		</center><br>
		<article>
			<center>
				<p>{{ $servgroup_name }}</p>
			</center><br><br>

		<header>
		@foreach($patientinfo as $ps)
			<address style="float: left">
			<p>Transaction Date:&nbsp;{{ $ps->trans_date }}</p>
			<p>Name:&nbsp;{{ $ps->patient_fname }} {{ $ps->patient_mname }} {{ $ps->patient_lname }} </p>
			<p>Refered Employee:&nbsp;</p>
			</address>
			<address style="float: right;">
			<p>Print Date:&nbsp;{{ $date }}</p>
			<p>Age:&nbsp;{{ $ps->age }}&nbsp;&nbsp;Sex:&nbsp;{{ $ps->patient_gender }}</p>
			<p>Address:&nbsp;{{ $ps->patient_address }}</p>
			<p>Company:&nbsp;{{ $ps->corp_name }}</p>
			</address>
		@endforeach
			<!-- <table class="meta">
				<tr>
					<th><span contenteditable>Invoice #</span></th>
					<td><span contenteditable>101138</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Date</span></th>
					<td><span contenteditable>January 1, 2012</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Amount Due</span></th>
					<td><span id="prefix" contenteditable>$</span><span>600.00</span></td>
				</tr>
			</table> -->

			<table class="meta2" style="padding-top: 20px;">
				<tbody>
					<tr>
						<td>TEST</td>
						<td>RESULT</td>
						
					</tr>
					@foreach($services as $serv)
					<tr>
					
						<td>{{ $serv->service_name }}</td>
						<td><span contenteditable></span></td>
					
					</tr>
					@endforeach
				</tbody>
			</table>
		</header>
		</article>
		<!-- <aside>
			<h1><span contenteditable>Additional Notes</span></h1>
			<div contenteditable>
				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
			</div>
		</aside> -->
		
		<header style="padding-top: 20%">
			<address style="float: left">
			<center>
			<p><span contenteditable>NAME</span></p>
			<p>Medical Technologist<br>License No.:<span contenteditable></span></p>
			</center>
			<br>
				<p>San Juan City</p>
				<p>156 N. Domingo Street, San Juan City</p>
				<p>Tel No. 576-5357</p>
				<p>Email: globalhealth_anonas@yahoo.com</p>
			</address>
			<address style="float: right;">
			<center>
			<p><span contenteditable>NAME</span></p>
			<p>Pathologist<br>License No.:<span contenteditable></span><p></p>
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
