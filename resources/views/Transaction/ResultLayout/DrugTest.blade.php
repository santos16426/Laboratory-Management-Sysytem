<!DOCTYPE html>
<html >
	<head>
	  	<meta charset="UTF-8">
	  	<title>Drug Test</title>
      	<link rel="stylesheet" href="{{ asset('/plugins/drugstyle.css') }}">
      	<script src="{{ asset('/plugins/drugindex.js') }}"></script>
		<meta charset="utf-8">
		<title>Invoice</title>
	</head>
	<body>
		@foreach($service as $serv)
		<header>
		<p style="width: 15px">TT</p>
		</header>
		<header>
			<div>
    		<img src="/DrugTest_img/{{ $serv->Drug_picture_img }}" style="width: 1000px; height: 1000px float: left; max-height: 150px; max-width: 150px;"/>
		</div>

		</header>
		<address style="padding-left: 800px">
		<p>Report ID:&nbsp;<span style="width: 50px">{{ $serv->Drug_reportid }}</span></p>
		</address>
		<small><p style="font-size: 11px;padding-left: 170px; padding-top: 110px;position: absolute"><span>QL091492</span><br><span>64</span></p></small>
		<article>
			<address style="padding-left: 100px">
			<CENTER>	
				<p>DEPARTMENT OF HEALTH</p>
				<p>< Insert Company Name ></p>
				<p>< Insert Company Address ></p><br>
				
				<small><p style="font-size: 11px">< Insert Company Tel No. ></p></small><br>
				<p>DRUG TEST REPORT</p>
			</CENTER>
			</address><br><br><br><br><br><br><br><br><br><br><br>
			<header >
			<table style="z-index: 99999;">
						<address style="float: left; padding-left: 15px ">
							<p style="margin: 0 0 0.5em;">CCF No.:&nbsp;<span style="width: 100px">{{ $serv->Drug_ccf }}</span></p>
							@foreach($patientinfo as $patient)
							<p style="margin: 0 0 0.3em;">Name:&nbsp;<span style="width: 100px">{{ $patient->patient_fname }} {{ $patient->patient_mname }} {{ $patient->patient_lname }}</span></p>

							<p style="margin: 0 0 0.5em;">Birthday:&nbsp;<span style="width: 100px">{{ date('F jS, Y',strtotime($patient->patient_birthdate)) }}</span>
							Age:&nbsp;<span style="width: 50px">{{ $patient->age }}</span>&nbsp;&nbsp;&nbsp;
							Gender:&nbsp;<span style="width: 50px">{{ $patient->patient_gender }}</span>&nbsp;&nbsp;&nbsp;</p>
							@endforeach
							<p style="margin: 0 0 0.5em;">Test Method:&nbsp;<span style="width: 100px">{{ $serv->Drug_test }}</span>&nbsp;&nbsp;&nbsp;</p>
							<p>Purpose:&nbsp;{{ $serv->Drug_purpose }}<br>&nbsp;&nbsp;&nbsp;&nbsp;</p>
						</address>
						<address style="float: right; padding-right: 180px">
							<p style="margin: 0 0 0.3em;">Transaction Date Time:&nbsp;<span style="width: 150px">{{ $trans_date }}</span></p>
							<p>Report Date Time:&nbsp;<span style="width: 150px">{{ $datenow }}</span></p><br><br>
							<p>Requesting Parties:&nbsp;{{ $serv->Drug_reqparties }}<br>&nbsp;&nbsp;&nbsp;&nbsp;<span style="width: 100px"></span></p>
						</address>
			</table>
			</header>
			<p style="margin: 0 0 0.3em; padding-left: 10px">Result:&nbsp;<span></span></p>
			<table border="2" class="inventory" style="padding-top: -100px;  ; width: 955px">
				<tbody>
					<tr>
						<td>Drug/Metabolite&nbsp;<span></span></td>
						<td>Result&nbsp;<span></span></td>
						<td>Remarks&nbsp;<span></span></td>

					</tr>
					<tr>
						<td><span style="width: 100px">{{ $serv->Drug_drugmet1 }}</span></td>
						<td><span style="width: 100px">{{ $serv->Drug_result1 }}</span></td>
						<td><span style="width: 100px">{{ $serv->Drug_remarks1 }}</span></td>
					</tr>
					<tr>
						<td><span style="width: 100px">{{ $serv->Drug_drugmet2 }}</span></td>
						<td><span style="width: 100px">{{ $serv->Drug_result2 }}</span></td>
						<td><span style="width: 100px">{{ $serv->Drug_remarks2 }}</span></td>
					</tr>
				</tbody>
			</table>

			<header>
				<address>
					<center>
					<p>Test Conducted By</p><br><br>
					@foreach($empname as $emp)
						@if($emp->emp_id == $serv->Drug_referred1)
						{{ $emp->name }}
						@endif
					@endforeach
					<p><span style="width: 450px; float:left;text-decoration: underline;"></span></p>
					<p>Analyst</p>
					</center>
				</address>
				<address>
					<center>
					<p>Test Conducted By</p><br><br>
					@foreach($empname as $emp2)
						@if($emp2->emp_id == $serv->Drug_referred2)
						{{ $emp2->name }}
						@endif
					@endforeach
					<p><span style="width: 450px;float:right;text-decoration: underline;"></span></p>
					<p>Analyst</p>
					</center>
				</address>

				<address style="padding-left: 80px">
					<p style="margin: 0 0 0.5em;">Valid Within 12 Month/s from Transaction Date</p>
					<p style="padding-left: 305px">This is a DOH-DDB IDTOMIS generated report</p>
				</address><br>
			</header>
		@endforeach
	</body>
</html>
  
    
