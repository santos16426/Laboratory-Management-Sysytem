@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-handshake-o" aria-hidden="true"></i><span> Transaction</span>
@endsection

@section ('breadParentName')
<i class="fa fa-clipboard" aria-hidden="true"></i><span> Results</span>
@endsection
@section('breadactivePage','Encoding of Results')
@section('maintenanceactive')
<a href="">
@endsection

@section('transaction','active')
@section('transresultactive','active')
@section('encodeactive','active')

@section ('content')
<style type="text/css">
  img{

  }
</style>
<section class="content">
	
<div class="col-md-12">
          <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-square" src="medicalrequest.jpg" alt="User profile picture" style="height: 120px;">

              <h3 class="profile-username text-center">Medical Exam Report</h3>

              <p class="text-muted text-center">For physical examination report</p>

              <div>
                <a href="#" id="medicalrequestbtn" class="btn btn-primary btn-xs pull-left" style="width: 40%"><b>Preview</b></a>
                <a href="/medicalReport?id={{ $id }}" class="btn btn-primary btn-xs pull-right" style="width: 40%"><b>Use</b></a>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          </div>

          <div class="col-md-3" >
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-square" src="ecgsample.jpg" alt="User profile picture" style="padding-bottom: 23%;height: 120px;">
             
              <h3 class="profile-username text-center">ECG Result</h3>

              <p class="text-muted text-center">For ECG result</p>

              <div>
                <a href="#" id="ecgbtn" class="btn btn-primary btn-xs pull-left" style="width: 40%"><b>Preview</b></a>
                  <a href="/ecg?id={{ $id }}" class="btn btn-primary btn-xs pull-right" style="width: 40%"><b>Use</b></a>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          </div>

          <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-square" src="ultrasoundsample.jpg" alt="User profile picture" style="height: 120px;">

              <h3 class="profile-username text-center">Ultrasound Report</h3>

              <p class="text-muted text-center">For ultrasound reading</p>

              <div>
                <a href="#" id="ultrasound" class="btn btn-primary btn-xs pull-left" style="width: 40%"><b>Preview</b></a>
                  <a href="/ultra?id={{ $id }}" class="btn btn-primary btn-xs pull-right" style="width: 40%"><b>Use</b></a>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          </div>

          <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-square" src="xraysample.jpg" alt="User profile picture" style="height: 120px;">

              <h3 class="profile-username text-center">Xray Report</h3>

              <p class="text-muted text-center">For x-ray reading</p>

              <div>
                <a href="#" id="xray" class="btn btn-primary btn-xs pull-left" style="width: 40%"><b>Preview</b></a>
                  <a href="/xray?id={{ $id }}" class="btn btn-primary btn-xs pull-right" style="width: 40%"><b>Use</b></a>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-square" src="medservicesample.jpg" alt="User profile picture" style="height: 120px;">

              <h3 class="profile-username text-center">Medical Service Result</h3>

              <p class="text-muted text-center">For medical services</p>

              <div>
                <a href="#" id="medserv" class="btn btn-primary btn-xs pull-left" style="width: 40%"><b>Preview</b></a>
                  <a href="/medservice?id={{ $id }}&gid={{ $gid }}" class="btn btn-primary btn-xs pull-right" style="width: 40%"><b>Use</b></a>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
        </div>
    
</section> 

<div class="modal fade" id = "LayoutModal">
  <div class="modal-dialog">
    <div class="modal-content" id="pic">
      
    </div>  
  </div>
</div>   

@endsection
@section('datatables')
<script type="text/javascript">
  $('#medicalrequestbtn').click(function(){
    $('#pic').empty();
    $('#pic').append('<img src="medicalrequest.jpg">');
    $('#LayoutModal').modal('show');
  })
  $('#ecgbtn').click(function(){
    $('#pic').empty();
    $('#pic').append('<img src="ecgsample.jpg" style="width:150%;margin-left:-20%;">');
    $('#LayoutModal').modal('show');
  });
  $('#ultrasound').click(function(){
    $('#pic').empty();
    $('#pic').append('<img src="ultrasoundsample.jpg" style="width:150%;margin-left:-20%;">');
    $('#LayoutModal').modal('show');
  });
  $('#xray').click(function(){
    $('#pic').empty();
    $('#pic').append('<img src="xraysample.jpg" style="width:150%;margin-left:-20%;">');
    $('#LayoutModal').modal('show');
  });
  $('#medserv').click(function(){
    $('#pic').empty();
    $('#pic').append('<img src="medservicesample.jpg" style="width:150%;margin-left:-20%;">');
    $('#LayoutModal').modal('show');
  })
</script>
@endsection