<!DOCTYPE html>
<html >
	<head>
	  	<meta charset="UTF-8">
	  	<title>HTML invoice</title>
      	<link rel="stylesheet" href="{{ asset('/plugins/drugstyle.css') }}">
      	<script src="{{ asset('/plugins/drugindex.js') }}"></script>
		<meta charset="utf-8">
		<title>Invoice</title>
	</head>
	<body>
		<header>
		<p style="width: 15px">TT</p>
		</header>
		<header>
			<div id="uploader" onclick="$('#filePhoto').click()">
    		
    		<img src="sample.png"/>
		</div>
		<input type="file" name="userprofile_picture"  id="filePhoto" />

		</header>
		<address style="padding-left: 800px">
		<p>Report ID:&nbsp;<span style="width: 50px"></span></p>
		</address>
		<small><p style="font-size: 11px;padding-left: 170px; padding-top: 110px;position: absolute"><span>QL091492</span><br><span>64</span></p></small>
		<article>
			<h1>Recipient</h1>
			<address style="padding-left: 100px">
			<CENTER>	
				<p>DEPARTMENT OF HEALTH</p>
				<p>GLOBALHEALTH DIAGNOSTICS CENTER, INC.</p>
				<p>156 UNIT-A G/F, N. DOMINGO ST., PEDRO CRUZ, SAN JUAN CITY</p><br>
				
				<small><p style="font-size: 11px">Phone Number: 7224544</p></small><br>
				<p>DRUG TEST REPORT</p>
			</CENTER>
			</address><br><br><br><br><br><br><br><br><br><br><br>
			<header >
			<table style="z-index: 99999;">
						<address style="float: left; padding-left: 15px ">
							<p style="margin: 0 0 0.5em;">CCF No.:&nbsp;<span style="width: 100px"></span>&nbsp;&nbsp;&nbsp;<span></span></p>
							<p style="margin: 0 0 0.3em;">Name:&nbsp;<span style="width: 100px"></span>&nbsp;&nbsp;&nbsp;</span></p>
							<p style="margin: 0 0 0.5em;">Birthday:&nbsp;<span style="width: 100px"></span>&nbsp;&nbsp;&nbsp;</span>Age:&nbsp;<span style="width: 50px"></span>&nbsp;&nbsp;&nbsp;</span>Gender:&nbsp;<span style="width: 50px"></span>&nbsp;&nbsp;&nbsp;</span></p>
							<p style="margin: 0 0 0.5em;">Test Method&nbsp;<span style="width: 100px"></span>&nbsp;&nbsp;&nbsp;</span></p>
							<p>Purpose&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;<span style="width: 120px"></span></p>
						</address>
						<address style="float: right; padding-right: 180px">
							<p style="margin: 0 0 0.3em;">Transaction Date Time:&nbsp;<span style="width: 150px"></span></p>
							<p>Report Date Time:&nbsp;<span style="width: 150px"></span></p><br><br>
							<p>Requesting Parties&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;<span style="width: 100px"></span></p>
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
						<td><span style="width: 100px"></span></td>
						<td><span style="width: 100px"></span></td>
						<td><span style="width: 100px"></span></td>
					</tr>
					<tr>
						<td><span style="width: 100px"></span></td>
						<td><span style="width: 100px"></span></td>
						<td><span style="width: 100px"></span></td>
					</tr>
				</tbody>
			</table>

			<header>
				<address>
					<center>
					<p>Test Conducted By</p><br><br><br>
					<p><span style="width: 450px; text-decoration: underline;"></span></p>
					<p>Analyst</p>
					</center>
				</address>
				<address>
					<center>
					<p>Test Conducted By</p><br><br><br>
					<p><span style="width: 450px;text-decoration: underline;"></span></p>
					<p>Analyst</p>
					</center>
				</address>

				<address style="padding-left: 80px">
					<p style="margin: 0 0 0.5em;">Valid Within 12 Month/s from Transaction Date</p>
					<p style="padding-left: 305px">This is a DOH-DDB IDTOMIS generated report</p>
				</address><br>
			</header>
	</body>
</html>
  
    
