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
          <div id="panel-body">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-square" src="/ResultImage/medicalrequest.jpg" alt="" style="height: 120px;">

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
<section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      Image Galley
                  </header>
                  <div class="panel-body">
                      <ul class="grid cs-style-3">
                          <li>
                              <figure>
                                  <img src="{{ asset('/plugins/img/gallery/4.jpg') }}" alt="img04">
                                  <figcaption>
                                      <h3>Mindblowing</h3>
                                      <span>lorem ipsume </span>
                                      <a class="fancybox" rel="group" href="{{ asset('/plugins/img/gallery/4.jpg') }}">Take a look</a>
                                  </figcaption>
                              </figure>
                          </li>
                          <li>
                              <figure>
                                  <img src="{{ asset('/plugins/img/gallery/1.jpg') }}" alt="img01">
                                  <figcaption>
                                      <h3>Clean & Fresh</h3>
                                      <span>dolor ament</span>
                                      <a class="fancybox" rel="group" href="{{ asset('/plugins/img/gallery/1.jpg') }}">Take a look</a>
                                  </figcaption>
                              </figure>
                          </li>
                          <li>
                              <figure>
                                  <img src="{{ asset('/plugins/img/gallery/2.jpg') }}" alt="img02">
                                  <figcaption>
                                      <h3>Flat Concept</h3>
                                      <span>tawseef tasi</span>
                                      <a class="fancybox" rel="group" href="{{ asset('/plugins/img/gallery/2.jpg') }}">Take a look</a>
                                  </figcaption>
                              </figure>
                          </li>
                          <li>
                              <figure>
                                  <img src="{{ asset('/plugins/img/gallery/5.jpg') }}" alt="img05">
                                  <figcaption>
                                      <h3>Modern</h3>
                                      <span>dkmosa inc</span>
                                      <a class="fancybox" rel="group" href="{{ asset('/plugins/img/gallery/5.jpg') }}">Take a look</a>
                                  </figcaption>
                              </figure>
                          </li>
                          <li>
                              <figure>
                                  <img src="{{ asset('/plugins/img/gallery/3.jpg') }}" alt="img03">
                                  <figcaption>
                                      <h3>Clean Code</h3>
                                      <span>nice concept</span>
                                      <a class="fancybox" rel="group" href="{{ asset('/plugins/img/gallery/3.jpg') }}">Take a look</a>
                                  </figcaption>
                              </figure>
                          </li>
                          <li>
                              <figure>
                                  <img src="{{ asset('/plugins/img/gallery/6.jpg') }}" alt="img06">
                                  <figcaption>
                                      <h3>Cheers</h3>
                                      <span>sumon ahmed</span>
                                      <a class="fancybox" rel="group" href="{{ asset('/plugins/img/gallery/6.jpg') }}">Take a look</a>
                                  </figcaption>
                              </figure>
                          </li>
                          <li>
                              <figure>
                                  <img src="{{ asset('/plugins/img/gallery/4.jpg') }}" alt="img04">
                                  <figcaption>
                                      <h3>Freshness</h3>
                                      <span>rerum facilis </span>
                                      <a class="fancybox" rel="group" href="{{ asset('/plugins/img/gallery/4.jpg') }}">Take a look</a>
                                  </figcaption>
                              </figure>
                          </li>
                          <li>
                              <figure>
                                  <img src="{{ asset('/plugins/img/gallery/1.jpg') }}" alt="img01">
                                  <figcaption>
                                      <h3>Awesome</h3>
                                      <span>At vero eos</span>
                                      <a class="fancybox" rel="group" href="{{ asset('/plugins/img/gallery/1.jpg') }}">Take a look</a>
                                  </figcaption>
                              </figure>
                          </li>
                          <li>
                              <figure>
                                  <img src="{{ asset('/plugins/img/gallery/2.jpg') }}" alt="img02">
                                  <figcaption>
                                      <h3>Music</h3>
                                      <span>atque corrupti </span>
                                      <a class="fancybox" rel="group" href="{{ asset('/plugins/img/gallery/2.jpg') }}">Take a look</a>
                                  </figcaption>
                              </figure>
                          </li>
                          <li>
                              <figure>
                                  <img src="{{ asset('/plugins/img/gallery/3.jpg') }}" alt="img03">
                                  <figcaption>
                                      <h3>Clean Code</h3>
                                      <span>nice concept</span>
                                      <a class="fancybox" rel="group" href="{{ asset('/plugins/img/gallery/3.jpg') }}">Take a look</a>
                                  </figcaption>
                              </figure>
                          </li>
                          <li>
                              <figure>
                                  <img src="{{ asset('/plugins/img/gallery/6.jpg') }}" alt="img06">
                                  <figcaption>
                                      <h3>Cheers</h3>
                                      <span>sumon ahmed</span>
                                      <a class="fancybox" rel="group" href="{{ asset('/plugins/img/gallery/6.jpg') }}">Take a look</a>
                                  </figcaption>
                              </figure>
                          </li>
                          <li>
                              <figure>
                                  <img src="{{ asset('/plugins/img/gallery/4.jpg') }}" alt="img04">
                                  <figcaption>
                                      <h3>Freshness</h3>
                                      <span>rerum facilis </span>
                                      <a class="fancybox" rel="group" href="{{ asset('/plugins/img/gallery/4.jpg') }}">Take a look</a>
                                  </figcaption>
                              </figure>
                          </li>
                      </ul>

                  </div>
              </section>

              <!-- page end-->
          </section>
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