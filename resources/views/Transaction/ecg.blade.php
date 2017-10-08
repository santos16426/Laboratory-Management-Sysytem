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
		<title>Invoice</title>
		<link rel="stylesheet" href="{{ asset('/plugins/ecg.css') }}">
		</head>
			<div class="col-md-12">
				@foreach($patientinfo as $patient)
				<div class="col-md-4">
				
						<address style="float: left;">
							<!-- <p>ID:&nbsp;<span contenteditable></span></p> -->
							<p>ECG No.:&nbsp;<span contenteditable></span></p>
							<p>Name:&nbsp;{{ $patient->patient_fname }} {{ $patient->patient_mname }} {{ $patient->patient_lname }}</p>
							<p>Rate:&nbsp;<span contenteditable></span></p>
							<p>P/PR:&nbsp;<span contenteditable></span></p>
							<p>QRS:&nbsp;<span contenteditable></span></p>
							<p>QT/QTC:&nbsp;<span contenteditable></span></p>
							<p>P/QRS/T:&nbsp;<span contenteditable></span></p>
						</address>
					
				</div>
				<div class="col-md-4">
				
						<address style="padding-left: 35%">
							<p>Sex:&nbsp;{{ $patient->patient_gender }}</p>
							<p>Age:&nbsp;{{ $patient->age }}</p>
							<p>Doctor:&nbsp;<span contenteditable></span></p>
							<p>Minesota Code:&nbsp;<span contenteditable></span></p>
						</address>
					
				</div>
				<div class="col-md-4">
				
						<address style="padding-left: 65%">
							<p>Diagnosis Info:&nbsp;<span contenteditable></span></p>
						</address>
					
				</div>
				@endforeach
			</div>
		<br><br>


		<div id="uploader" onclick="$('#filePhoto').click()">
    		
    		<img src="add.png"/>
		</div>
		<input type="file" name="userprofile_picture"  id="filePhoto" />
	</body>
</div>
	
</html>
  
    <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<script type="text/javascript">
  var imageLoader = document.getElementById('filePhoto');
    imageLoader.addEventListener('change', handleImage, false);

function handleImage(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        $('#uploader img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    
}

var dropbox;
dropbox = document.getElementById("uploader");
dropbox.addEventListener("dragenter", dragenter, false);
dropbox.addEventListener("dragover", dragover, false);
dropbox.addEventListener("drop", drop, false);

function dragenter(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop(e) {
  e.stopPropagation();
  e.preventDefault();
  //you can check e's properties
  //console.log(e);
  var dt = e.dataTransfer;
  var files = dt.files;
  
  //this code line fires your 'handleImage' function (imageLoader change event)
  imageLoader.files = files;
} 
</script>

