@if((Session::get('addresult')!= 1))
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif
<!DOCTYPE html>
<html >
	<head>
		<meta charset="utf-8">
		<title>Medical Report</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('/plugins/style.css') }}">
		<script src="{{ asset('/plugins/index.js') }}" ></script>
	</head>
	<body>
		<header>
			<address contenteditable2><br>
				<p>Quezon City</p>
				<p>156 N. Domingo Street,</p>
				<p>San Juan City</p><br><br>
				<p>Tel No. 576-5357</p>
				<p>Email: globalhealth_anonas@yahoo.com</p>
			</address>
			<address contenteditable2><br>
				<p>Quezon City</p>
				<p>Deofranz Plaza Bldng #2  </p>
				<p>Anonas Ext cor. V Luna  </p>
				<p>Road, Quezon City</p><br>
				<p>Tel No. 436-2057</p>
				<p>Email: globalhealth_anonas@yahoo.com</p>
			</address>
			<span><img alt="" src="/banner.jpg"></span>
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
			</table>

			<center>
				<p><strong>History of Present Illness</strong></p>
			</center>
			<table class="meta2">
				<tbody>
					<tr>
						<td><span >blank</span></td>
					</tr>
				</tbody>
			</table><br><br>

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
						<td><span ></span></td>
						<td><span ></span></td>
						<td><span ></span></td>
						<td><span ></span></td>
					</tr>
				</tbody>
			</table><br><br>

			<center>
				<p><strong>Family History</strong></p>
			</center>
			<table class="meta">
				<tbody>
					<tr>
						<td><span >blank</span></td>
						<td><span >blank</span></td>
					</tr>
				</tbody>
			</table>

			<center>
				<p><strong>Personal and Social History</strong></p>
			</center>
			<table class="meta">
				<tbody>
					<tr>
						<td>SMOKER:&nbsp;<span ></span></td>
						<td>NO. OF STICKS/DAY:&nbsp;<span ></span></td>
						<td>ALCOHOL DRINKER:&nbsp;<span ></span></td>
						<td>NO. OF BOTTLES:&nbsp;<span ></span></td>
					</tr>
					<tr>
						<td>REMARKS:&nbsp;<span ></span></td>
						<td>PACK YEARS:&nbsp;<span ></span></td>
						<td>REMARKS:&nbsp;<span ></span></td>
						<td>NO. OF SHOTS:&nbsp;<span ></span></td>
					</tr>
				</tbody>
			</table>

			<center>
				<p><strong>OBSTETRIC ANDGYNECOLOGICAL HISTORY (For Female Only)</strong></p>
			</center>
			<table class="meta">
				<tbody>
					<tr>
						<td><span >blank</span></td>
						<td><span >blank</span></td>
					</tr>
				</tbody>
			</table>

			<center>
				<p><strong>PHYSICAL EXAMINATION</strong></p>
			</center>
			<table class="meta">
				<tbody>
					<tr>
						<td>VISUAL ACTIVITY:&nbsp;<span ></span></td>
					</tr>
				</tbody>
			</table>
			<table class="meta">
				<tbody>
					<tr>
						<td>HEIGHT:&nbsp;<span ></span></td>
						<td>WEIGHT:&nbsp;<span ></span></td>
						<td>PULSE RATE:&nbsp;<span ></span></td>
						<td>BLOOD PRESSURE:&nbsp;<span ></span></td>
						<td>TEMPERATURE:&nbsp;<span ></span></td>
					</tr>
				</tbody>
			</table>
			<table class="meta">
				<tbody>
					<tr>
						<td>GENERAL APPEARANCE</td>
						<td><span ></span></td>
					</tr>
					<tr>
						<td>EYES</td>
						<td><span ></span></td>
					</tr>
					<tr>
						<td>EAR/NOSE/THROAT</td>
						<td><span ></span></td>
					</tr>
					<tr>
						<td>NECK</td>
						<td><span ></span></td>
					</tr>
					<tr>
						<td>BREAST</td>
						<td><span ></span></td>
					</tr>
					<tr>
						<td>CHEST/LUNGS</td>
						<td><span ></span></td>
					</tr>
					<tr>
						<td>HEART</td>
						<td><span ></span></td>
					</tr>
					<tr>
						<td>ABDOMEN</td>
						<td><span ></span></td>
					</tr>
					<tr>
						<td>EXTERNAL ANAL</td>
						<td><span ></span></td>
					</tr>
					<tr>
						<td>EXTERNAL GENITALIA</td>
						<td><span ></span></td>
					</tr>
					<tr>
						<td>EXTREMITIES</td>
						<td><span ></span></td>
					</tr>
				</tbody>
			</table>

			<center>
				<p><strong>LABORATORY AND DIAGNOSTIC EXAMINATION</strong></p>
			</center>
			<table class="meta">
				<tbody>
					<tr>
						<td>CBC</td>
						<td><span ></span></td>
					</tr>
					<tr>
						<td>ROUTINE FECALYSIS</td>
						<td><span ></span></td>
					</tr>
					<tr>
						<td>ROUTINE URINALYSIS</td>
						<td><span ></span></td>
					</tr>
					<tr>
						<td>CHEST X-RAY</td>
						<td><span ></span></td>
					</tr>
					<tr>
						<td>DRUG TEST</td>
						<td><span ></span></td>
					</tr>
				</tbody>
			</table>

			<p>Assesst and recomendation:</p>
			<address ><br>
				<p>*add here*</p>
			</address>

		</article>
</body>
</html>
