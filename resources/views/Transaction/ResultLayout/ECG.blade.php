@if(Session::get('addresult')!= 1)
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif
<!DOCTYPE html>
<html >
<body>
	<head>
		<meta charset="utf-8">
		<title>ECG</title>
		<link rel="stylesheet" href="{{ asset('/plugins/ecg.css') }}">
	</head>
	@foreach($service as $serv)
			<div class="col-md-12">
				@foreach($patientinfo as $patient)
				
				<div class="col-md-4">
					<address style="float: left;">
						<p>ECG No.:&nbsp;{{ $serv->Ecg_ecgno }}</p>
						<p>Name:&nbsp;{{ $patient->patient_fname }} {{ $patient->patient_mname }} {{ $patient->patient_lname }}</p>
						<p>Rate:&nbsp;{{ $serv->Ecg_rate }}</p>
						<p>P/PR:&nbsp;{{ $serv->Ecg_ppr }}</p>
						<p>QRS:&nbsp;{{ $serv->Ecg_qrs }}</p>
						<p>QT/QTC:&nbsp;{{ $serv->Ecg_qtqtc }}</p>
						<p>P/QRS/T:&nbsp;{{ $serv->Ecg_pqrs }}</p>
					</address>
				</div>
				<div class="col-md-4">
					<address style="padding-left: 35%">
						<p>Sex:&nbsp;{{ $patient->patient_gender }}</p>
						<p>Age:&nbsp;{{ $patient->age }}</p>
						<p>Doctor:&nbsp;{{ $serv->emp_fname }} {{ $serv->emp_mname }} {{ $serv->emp_lname }}</p>
						<p>Minesota Code:&nbsp;{{ $serv->Ecg_minesota }}</p>
					</address>
				</div>
				<div class="col-md-4">
					<address style="padding-left: 65%">
						<p>Diagnosis Info:<br><br>&nbsp;{{ $serv->Ecg_diagnosis }}</p>
					</address>
				</div>
				@endforeach
				
			</div>
		<br><br><br><br><br>
		<div>
    		<img src="/Result_ECG/{{ $serv->Ecg_ecg_image }}" style="height: 600px; width: 970px; max-height: 590px; max-width: 960px;">
		</div>
		@endforeach
	</body>
</html>
  

