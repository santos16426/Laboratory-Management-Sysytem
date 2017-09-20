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
<section id="container">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      Result Layouts
                  </header>
                  <div class="panel-body">
                      <ul class="grid cs-style-3">
                          <li style="border: 100px">
                              <figure >
                                  <img src="{{ asset('/ResultImage/medicalrequest2.jpg') }}" alt="img04">
                                  <figcaption>
                                      <h3>Mindblowing</h3>
                                      <span>lorem ipsume </span>
                                     <div class="btn-group pull-right" role="group" style="padding-top: 3%">
                                        <a class="btn fancybox" rel="group" href="{{ asset('/ResultImage/medicalrequest.jpg') }}">View</a>
                                        <a type="button" class="btn" href="/medicalReport?id={{ $id }}">Use</a>
                                      </div>
                                  </figcaption>
                              </figure>
                          </li>
                          <li>
                              <figure>
                                  <img src="{{ asset('/ResultImage/ecgsample.jpg') }}" alt="img01">
                                  <figcaption>
                                      <h3>Clean & Fresh</h3>
                                      <span>dolor ament</span>
                                      <div class="btn-group pull-right" role="group" style="padding-top: 3%">
                                        <a class="btn fancybox" rel="group" href="{{ asset('/ResultImage/ecgsample.jpg') }}">View</a>
                                        <a type="button" class="btn" href="/ecg?id={{ $id }}">Use</a>
                                      </div>
                                  </figcaption>
                              </figure>
                          </li>
                          <li>
                              <figure>
                                  <img src="{{ asset('/ResultImage/ultrasoundsample2.jpg') }}" alt="img02">
                                  <figcaption>
                                      <h3>Flat Concept</h3>
                                      <span>tawseef tasi</span>
                                      <div class="btn-group pull-right" role="group" style="padding-top: 3%">
                                        <a class="btn fancybox" rel="group" href="{{ asset('/ResultImage/ultrasoundsample.jpg') }}">View</a>
                                        <a type="button" class="btn">Use</a>
                                      </div>
                                  </figcaption>
                              </figure>
                          </li>
                          <li>
                              <figure>
                                  <img src="{{ asset('/ResultImage/xraysample2.jpg') }}" alt="img05">
                                  <figcaption>
                                      <h3>Modern</h3>
                                      <span>dkmosa inc</span>
                                      <div class="btn-group pull-right" role="group" style="padding-top: 3%">
                                        <a class="btn fancybox" rel="group" href="{{ asset('/ResultImage/xraysample.jpg') }}">View</a>
                                        <a type="button" class="btn" href="/ultra?id={{ $id }}">Use</a>
                                      </div>
                                  </figcaption>
                              </figure>
                          </li>
                          <li>
                              <figure>
                                  <img src="{{ asset('/ResultImage/medservicesample2.jpg') }}" alt="img03">
                                  <figcaption>
                                      <h3>Clean Code</h3>
                                      <span>nice concept</span>
                                      <div class="btn-group pull-right" role="group" style="padding-top: 3%">
                                        <a class="btn fancybox" rel="group" href="{{ asset('/ResultImage/medservicesample.jpg') }}">View</a>
                                        <a type="button" class="btn" href="/xray?id={{ $id }}">Use</a>
                                      </div>
                                  </figcaption>
                              </figure>
                          </li>
                      </ul>

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