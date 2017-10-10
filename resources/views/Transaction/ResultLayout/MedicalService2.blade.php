<!-- @if(Session::get('printResult') != true)
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif -->

<!DOCTYPE html>
<html >
	<head>
		<meta charset="UTF-8">
  		<title>Medical Service 2 Result Layout</title>
      	<link rel="stylesheet" href="{{ asset('/plugins/medserv2style.css') }}">
      	<script src="{{ asset('/plugins/medserv2index.js') }}"></script>
	</head>
	<body>
		<center>
			<header>
				<img alt="" src="banner.jpg">
			</header>
		</center><br><br>
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
				<center>{{ $group_name }}</center>
			<br><br>
		</header>
		<table class="inventory" style="width: 200px">
			<tr>
			    <th width="150pt" rowspan="2" colspan="1">TEST</th>
			    <th width="275pt" colspan="3">SYSTEM INTERNATIONAL</th>
			    <th width="275pt" colspan="3">CONVENTIONAL</th>
			  </tr>
			  <tr>
			    <th>RESULT</th>
			    <th>UNIT</th>
			    <th>REFERENCE</th>
			    <th>RESULT</th>
			    <th>UNIT</th>
			    <th>REFERENCE</th>
			  </tr>
			  @foreach($service_results as $service)
			  <tr>
			    <td>{{ $service->service_name }}</td>
			    <td>{{ $service->Medserv2_intresult }}</td>
			    <td>{{ $service->Medserv2_intunit }}</td>
			    <td>{{ $service->Medserv2_intref }}</td>
			    <td>{{ $service->Medserv2_conresult }}</td>
			    <td>{{ $service->Medserv2_conunit }}</td>
			    <td>{{ $service->Medserv2_conref }}</td>
			  </tr>
			  @endforeach
		</table>
		</article>
		<!-- <aside>
			<h1><span contenteditable>Additional Notes</span></h1>
			<div contenteditable>
				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
			</div>
		</aside> -->
		<footer>
		<header>
			<address style="padding-left: 70px">
			<center>
			<p>Name</p>
			<p>Medical Technologist<br>License No.:</p>
			</center>
			</address>
			<address style="padding-left: 350px">
			<center>
			<p><span contenteditabl></span></p>
			<p>Name</p>
			<p>Pathologist</p>
			</center>
			</address>
		</header><br><br>
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
  