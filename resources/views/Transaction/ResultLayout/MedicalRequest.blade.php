@if((Session::get('addresult')!= 1))
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif
<!DOCTYPE html>
<html >
	<head>
		<meta charset="utf-8">
		<title>Physical Exam</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('/plugins/medreq.css') }}">
		<script src="{{ asset('/plugins/index.js') }}" ></script>
	</head>
	<body>
		<header>
			<address rightinfo style="padding-bottom: 20px">
				<p style="padding-bottom: 8px"><strong>Company Name:</strong>< Insert Company Name ></p>
				<p style="padding-bottom: 8px"><strong>Address:</strong>< Insert Company Address ></p>
				<p style="padding-bottom: 8px"><strong>Contact Number:</strong> < Insert Company Tel No. ></p>
				<p style="padding-bottom: 8px"><strong>Email: < Insert Company Email ></strong></p><br>
			</address>
			<span><img alt="" src="/banner.jpg" style="width: 500px; height: 250px float: left"></span>
		</header>
		<article>
			<center>
				<p><strong>Medical Examination Report</strong></p>
			</center>
			<!-- <table class="meta">
				<tr>
					<th><span >Invoice #</span></th>
					<td><span >101138</span></td>
				</tr>
				<tr>
					<th><span >Date</span></th>
					<td><span >January 1, 2012</span></td>
				</tr>
				<tr>
					<th><span >Amount Due</span></th>
					<td><span id="prefix" >$</span><span>600.00</span></td>
				</tr>
			</table> -->
			<table class="meta">
				<tbody>
				@foreach($getPatient as $pt)
					<tr>
						<td>NAME:&nbsp;{{ $pt->patient_fname }} {{ $pt->patient_mname }} {{ $pt->patient_lname }}</td>
						<td>DATE OF EXAMINATION:&nbsp;{{ $pt->trans_date }}</td>
					</tr>
					<tr>
						<td>ADDRESS:&nbsp;{{ $pt->patient_address }}</td>
						<td>CIVIL STATUS:&nbsp;<span >{{ $pt->patient_civilstatus }}</span></td>
					</tr>
					<tr>
						<td>COMPANY:&nbsp;<span >{{ $corp_name }}</span></td>
						<td>BIRTHDATE:&nbsp;{{ $pt->patient_birthdate }}</td>
					</tr>
					<tr>
						@foreach($physicianName as $name)
						<td>EXAMINING PHYSICIAN:&nbsp;<span >{{ $name->emp_fname }} {{ $name->emp_mname }} {{ $name->emp_lname }}</span></td>
						@endforeach
						<td>AGE:&nbsp;{{ $pt->age }}</td>
					</tr>
					<tr>
						@foreach($evalName as $ename)
						<td>EVALUATED BY:&nbsp;<span >{{ $ename->emp_fname }} {{ $ename->emp_mname }} {{ $ename->emp_lname }}</span></td>
						@endforeach
						<td>GENDER:&nbsp;{{ $pt->patient_gender }}</td>
					</tr>
				@endforeach
				</tbody>
			</table><div class="space"></div>
			@foreach($details as $d)
			<center>
				<p><strong>History of Present Illness</strong></p>
			</center>
			<table class="meta2">
				<tbody>
					<tr>
						<td><span >{{ $d->medreq_history }}</span></td>
					</tr>
				</tbody>
			</table><div class="space"></div>

			<center>
				<p><strong>Past Medical History</strong></p>
			</center>
			<table class="meta2">
				<tbody>
					<tr>
						<td>DATE OF DIAGNOSIS</td>
						<td>ILLNESS/OPERATION</td>
						<td>MEDICATION</td>
						<td>REMARK</td>
					</tr>
					<tr>
						<td><span >{{ $d->medreq_datediag }}</span></td>
						<td><span >{{ $d->medreq_illness }}</span></td>
						<td><span >{{ $d->medreq_medication }}</span></td>
						<td><span >{{ $d->medreq_remarks1 }}</span></td>
					</tr>
				</tbody>
			</table><div class="space"></div>

			<center>
				<p><strong>Family History</strong></p>
			</center>
			<table class="meta">
				<tbody>
					<tr>
						<td><span >{{ $d->medreq_famhisto1 }}</span></td>
						<td><span >{{ $d->medreq_famhisto2 }}</span></td>
					</tr>
				</tbody>
			</table><div class="space"></div>

			<center>
				<p><strong>Personal and Social History</strong></p>
			</center>
			<table class="meta">
				<tbody>
					<tr>
						<td>SMOKER:&nbsp;<span >{{ $d->medreq_smoker }}</span></td>
						<td>NO. OF STICKS/DAY:&nbsp;<span >{{ $d->medreq_sticks }}</span></td>
						<td>ALCOHOL DRINKER:&nbsp;<span >{{ $d->medreq_alcohol }}</span></td>
						<td>NO. OF BOTTLES:&nbsp;<span >{{ $d->medreq_bottles }}</span></td>
					</tr>
					<tr>
						<td>REMARKS:&nbsp;<span >{{ $d->medreq_remarks2 }}</span></td>
						<td>PACK YEARS:&nbsp;<span >{{ $d->medreq_packyears }}</span></td>
						<td>REMARKS:&nbsp;<span >{{ $d->medreq_remarks3 }}</span></td>
						<td>NO. OF SHOTS:&nbsp;<span >{{ $d->medreq_shots }}</span></td>
					</tr>
				</tbody>
			</table><div class="space"></div>

			<center>
				<p><strong>OBSTETRIC ANDGYNECOLOGICAL HISTORY (For Female Only)</strong></p>
			</center>
			<table class="meta">
				<tbody>
					<tr>
						<td><span >{{ $d->medreq_obstetric1 }}</span></td>
						<td><span >{{ $d->medreq_obstetric2 }}</span></td>
					</tr>
				</tbody>
			</table><div class="space"></div>

			<center>
				<p><strong>PHYSICAL EXAMINATION</strong></p>
			</center>
			<table class="meta">
				<tbody>
					<tr>
						<td>VISUAL ACTIVITY:&nbsp;<span >{{ $d->medreq_visual }}</span></td>
					</tr>
				</tbody>
			</table>
			<table class="meta">
				<tbody>
					<tr>
						<td>HEIGHT:&nbsp;<span >{{ $d->medreq_height }}</span></td>
						<td>WEIGHT:&nbsp;<span >{{ $d->medreq_weight }}</span></td>
						<td>PULSE RATE:&nbsp;<span >{{ $d->medreq_pulse }}</span></td>
						<td>BLOOD PRESSURE:&nbsp;<span >{{ $d->medreq_bloodpressure }}</span></td>
						<td>TEMPERATURE:&nbsp;<span >{{ $d->medreq_temp }}</span></td>
					</tr>
				</tbody>
			</table>
			<table class="meta">
				<tbody>
					<tr>
						<td>GENERAL APPEARANCE</td>
						<td><span >{{ $d->medreq_genapp }}</span></td>
					</tr>
					<tr>
						<td>EYES</td>
						<td><span >{{ $d->medreq_eyes }}</span></td>
					</tr>
					<tr>
						<td>EAR/NOSE/THROAT</td>
						<td><span >{{ $d->medreq_ear }}</span></td>
					</tr>
					<tr>
						<td>NECK</td>
						<td><span >{{ $d->medreq_neck }}</span></td>
					</tr>
					<tr>
						<td>BREAST</td>
						<td><span >{{ $d->medreq_breast }}</span></td>
					</tr>
					<tr>
						<td>CHEST/LUNGS</td>
						<td><span >{{ $d->medreq_chest }}</span></td>
					</tr>
					<tr>
						<td>HEART</td>
						<td><span >{{ $d->medreq_heart }}</span></td>
					</tr>
					<tr>
						<td>ABDOMEN</td>
						<td><span >{{ $d->medreq_abdomen }}</span></td>
					</tr>
					<tr>
						<td>EXTERNAL ANAL</td>
						<td><span >{{ $d->medreq_exanal }}</span></td>
					</tr>
					<tr>
						<td>EXTERNAL GENITALIA</td>
						<td><span >{{ $d->medreq_exgen }}</span></td>
					</tr>
					<tr>
						<td>EXTREMITIES</td>
						<td><span >{{ $d->medreq_extermities }}</span></td>
					</tr>
				</tbody>
			</table><div class="space"></div>

			<center>
				<p><strong>LABORATORY AND DIAGNOSTIC EXAMINATION</strong></p>
			</center>
			<table class="meta">
				<tbody>
					<tr>
						<td>CBC</td>
						<td><span >{{ $d->medreq_cbc }}</span></td>
					</tr>
					<tr>
						<td>ROUTINE FECALYSIS</td>
						<td><span >{{ $d->medreq_fecalysis }}</span></td>
					</tr>
					<tr>
						<td>ROUTINE URINALYSIS</td>
						<td><span >{{ $d->medreq_urinalysis }}</span></td>
					</tr>
					<tr>
						<td>CHEST X-RAY</td>
						<td><span >{{ $d->medreq_xray }}</span></td>
					</tr>
					<tr>
						<td>DRUG TEST</td>
						<td><span >{{ $d->medreq_drugtest }}</span></td>
					</tr>
				</tbody>
			</table>

			<p>Assesst and recomendation:</p>
			<address ><br>
				<p>{{ $d->medreq_assess }}</p>
			</address>

		</article>
		@endforeach
</body>
</html>
