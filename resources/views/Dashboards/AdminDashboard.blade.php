@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-home" aria-hidden="true"></i><span> Home</span>
@endsection
@section('breadParentName')
<i class="fa fa-dashboard" aria-hidden="true"></i><span> Dashboard</span>
@endsection
@section('maintenanceactive')
<a href="" class="">
@endsection
@section('dashboard','active')
@section('content')
<input type="hidden" id="emp_count" value="{{ $emp_count }}">
<input type="hidden" id="patient_count" value="{{ $patient_count }}">
<input type="hidden" id="service_count" value="{{ $service_count }}">

<div class="row">
  <div class="col-lg-12">
    <section class="main-content" >
              <!--state overview start-->
              <div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-user-md"></i>
                          </div>
                          <div class="value">
                              <h1 class="emp_count">
                                  
                              </h1>
                              <p>Employee</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="fa fa-users"></i>
                          </div>
                          <div class="value">
                              <h1 class=" patient_count">
                                    
                              </h1>
                              <p>Patients</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="fa fa-heartbeat"></i>
                          </div>
                          <div class="value">
                              <h1 class=" service_count">
                                  
                              </h1>
                              <p>Services</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="fa fa-bar-chart-o"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count4">
                                  0
                              </h1>
                              <p>Profit of the Day</p>
                          </div>
                      </section>
                  </div>
              </div>
              <!--state overview end-->

              <div class="row">
                  <div class="col-lg-8">
                      <!--custom chart start-->
                      <div class="border-head">
                          <h3>Earning Graph</h3>
                      </div>
                      <div class="custom-bar-chart">
                          <ul class="y-axis">
                              <li><span>100</span></li>
                              <li><span>80</span></li>
                              <li><span>60</span></li>
                              <li><span>40</span></li>
                              <li><span>20</span></li>
                              <li><span>0</span></li>
                          </ul>
                          <div class="bar">
                              <div class="title">JAN</div>
                              <div class="value tooltips" data-original-title="80%" data-toggle="tooltip" data-placement="top">80%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">FEB</div>
                              <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">MAR</div>
                              <div class="value tooltips" data-original-title="40%" data-toggle="tooltip" data-placement="top">40%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">APR</div>
                              <div class="value tooltips" data-original-title="55%" data-toggle="tooltip" data-placement="top">55%</div>
                          </div>
                          <div class="bar">
                              <div class="title">MAY</div>
                              <div class="value tooltips" data-original-title="20%" data-toggle="tooltip" data-placement="top">20%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">JUN</div>
                              <div class="value tooltips" data-original-title="39%" data-toggle="tooltip" data-placement="top">39%</div>
                          </div>
                          <div class="bar">
                              <div class="title">JUL</div>
                              <div class="value tooltips" data-original-title="75%" data-toggle="tooltip" data-placement="top">75%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">AUG</div>
                              <div class="value tooltips" data-original-title="45%" data-toggle="tooltip" data-placement="top">45%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">SEP</div>
                              <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">OCT</div>
                              <div class="value tooltips" data-original-title="42%" data-toggle="tooltip" data-placement="top">42%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">NOV</div>
                              <div class="value tooltips" data-original-title="60%" data-toggle="tooltip" data-placement="top">60%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">DEC</div>
                              <div class="value tooltips" data-original-title="90%" data-toggle="tooltip" data-placement="top">90%</div>
                          </div>
                      </div>
                      <!--custom chart end-->
                  </div>
                <div class="col-lg-4">
                      <!--work progress start-->
                      <section class="panel">
                          <div class="panel-body progress-panel">
                              <div class="task-progress">
                                  <h1>Work Progress</h1>
                                  <p>Anjelina Joli</p>
                              </div>
                              <div class="task-option">
                                  <select class="styled">
                                      <option>Anjelina Joli</option>
                                      <option>Tom Crouse</option>
                                      <option>Jhon Due</option>
                                  </select>
                              </div>
                          </div>
                          <table class="table table-hover personal-task">
                              <tbody>
                              <tr>
                                  <td>1</td>
                                  <td>
                                      Target Sell
                                  </td>
                                  <td>
                                      <span class="badge bg-important">75%</span>
                                  </td>
                                  <td>
                                    <div id="work-progress1"></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td>
                                      Product Delivery
                                  </td>
                                  <td>
                                      <span class="badge bg-success">43%</span>
                                  </td>
                                  <td>
                                      <div id="work-progress2"></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td>
                                      Payment Collection
                                  </td>
                                  <td>
                                      <span class="badge bg-info">67%</span>
                                  </td>
                                  <td>
                                      <div id="work-progress3"></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>4</td>
                                  <td>
                                      Work Progress
                                  </td>
                                  <td>
                                      <span class="badge bg-warning">30%</span>
                                  </td>
                                  <td>
                                      <div id="work-progress4"></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>5</td>
                                  <td>
                                      Delivery Pending
                                  </td>
                                  <td>
                                      <span class="badge bg-primary">15%</span>
                                  </td>
                                  <td>
                                      <div id="work-progress5"></div>
                                  </td>
                              </tr>
                              </tbody>
                          </table>
                      </section>
                      <!--work progress end-->
                  </div>
              </div>
            
    </section>
  </div>
</div>

@endsection
@section('additional')
<script type="text/javascript">
  $(document).ready(function(){

    
    patient_count($('#patient_count').val());
    service_count($('#service_count').val());   
    emp_count($('#emp_count').val());
    function emp_count(emp_count)
    {

        var div_by = 100,
            speed = Math.round(emp_count / div_by),
            $display = $('.emp_count'),
            run_count = 1,
            int_speed = 24;

        var int = setInterval(function() {
            if(run_count < div_by){
                $display.text(speed * run_count);
                run_count++;
            } else if(parseInt($display.text()) < emp_count) {
                var curr_count = parseInt($display.text()) + 1;
                $display.text(curr_count);
            } else {
                clearInterval(int);
            }
        }, int_speed);
    }
    function patient_count(patient_count)
    {
        var div_by = 100,
            speed = Math.round(patient_count / div_by),
            $display = $('.patient_count'),
            run_count = 1,
            int_speed = 24;

        var int = setInterval(function() {
            if(run_count < div_by){
                $display.text(speed * run_count);
                run_count++;
            } else if(parseInt($display.text()) < patient_count) {
                var curr_count = parseInt($display.text()) + 1;
                $display.text(curr_count);
            } else {
                clearInterval(int);
            }
        }, int_speed);
    }
    function service_count(service_count)
    {
        var div_by = 100,
            speed = Math.round(service_count / div_by),
            $display = $('.service_count'),
            run_count = 1,
            int_speed = 24;

        var int = setInterval(function() {
            if(run_count < div_by){
                $display.text(speed * run_count);
                run_count++;
            } else if(parseInt($display.text()) < service_count) {
                var curr_count = parseInt($display.text()) + 1;
                $display.text(curr_count);
            } else {
                clearInterval(int);
            }
        }, int_speed);
    }
  });
</script>
@if(Session::has('transaction'))
<input type="hidden" name="" value="{{ Session::get('trans_id') }}" id="transaction_id">
<script type="text/javascript">
$( document ).ready(function() {  
  var date="";
  var total="";
  var payment="";
  var change="";
  var trans_id = $('#transaction_id').val();
  var emp_name = "";
  var patient_name ="";
  var claimcode = '';
  var ref_name = "";
  $.ajax
      ({
        url: '/retrieveReciept', 
        type: 'get',
        data: {ID:trans_id}, 
        dataType : 'json',
        success:function(response) { 
          response[0].forEach(function(data){
            date = data.trans_date;
            total = data.trans_total;
            payment = data.trans_payment;
            change = data.trans_change;
          })
          response[1].forEach(function(data) { 
            emp_name = data.Name;
        })
        response[2].forEach(function(data){
          patient_name = data.Name;
        })
        response[3].forEach(function(data){
          claimcode = data.claimCode;
        })
        response[4].forEach(function(data){
          ref_name=data.Name;
        })
          var contents = $("#formdeposit").html();
      var custtype =$("#typeDr").html();
      var frame1 = $('<iframe />');
      frame1[0].name = "frame1";
      frame1.css({ "position": "absolute", "top": "-1000000px" });
      $("body").append(frame1);
      var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
      frameDoc.document.open();
      frameDoc.document.write('<html><head>');
      frameDoc.document.write('</head><body>');
      frameDoc.document.write('<style> .invoice-box{ max-width:800px; margin:auto; padding:30px; border:1px solid #eee; box-shadow:0 0 10px rgba(0, 0, 0, .15); font-size:16px; line-height:24px; font-family:"Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; color:#555; } .invoice-box table{ width:100%; line-height:inherit; text-align:left; } .invoice-box table td{ padding:5px; vertical-align:top; } .invoice-box table tr td:nth-child(2){ text-align:right; } .invoice-box table tr.top table td{ padding-bottom:20px; } .invoice-box table tr.top table td.title{ font-size:45px; line-height:45px; color:#333; } .invoice-box table tr.information table td{ padding-bottom:40px; } .invoice-box table tr.heading td{ background:#eee; border-bottom:1px solid #ddd; font-weight:bold; } .invoice-box table tr.details td{ padding-bottom:20px; } .invoice-box table tr.item td{ border-bottom:1px solid #eee; } .invoice-box table tr.item.last td{ border-bottom:none; } .invoice-box table tr.total td:nth-child(2){ border-top:2px solid #eee; font-weight:bold; } @media only screen and (max-width: 600px) { .invoice-box table tr.top table td{ width:100%; display:block; text-align:center; } .invoice-box table tr.information table td{ width:100%; display:block; text-align:center; } } </style>');
      frameDoc.document.write('<html><body> <div class="invoice-box"> <table cellpadding="0" cellspacing="0"> <tr class="top"> <td colspan="2">   ');
      frameDoc.document.write('<table>');
      frameDoc.document.write('<tr> </td> <center><strong><strong>GLOBALHEALTH</strong></strong><br>Diagnostic Center, Inc.<br><small>Laboratory, Ultrasound, X-ray, ECG, Drug Test</small</center></tr>');
      frameDoc.document.write('</table>');
      frameDoc.document.write('<tr class="information"> <td colspan="2"> <table> <tr><td></td></tr>');
      frameDoc.document.write('<tr><td><strong>Patient Name:</strong> '+patient_name+' <br><strong>Claiming Code:</strong> '+claimcode+'<br><strong>Referring Employee: </strong> '+ref_name+' </td><td> <strong>Date:</strong> '+date+' <br><strong>Receptionist:</strong> '+emp_name+'</td></tr>');
      
      frameDoc.document.write('</table>');
      
      frameDoc.document.write('<tr class="heading"> <td> Service </td> <td> Fee </td></tr>');

      response[5].forEach(function(data){

        frameDoc.document.write('<tr><td>'+data.serv_name+'</td><td>Php '+data.service_price+'</td></tr>');
      })
      
      response[6].forEach(function(data){
        var charge = data.charge;
        if(charge == 0)
        {
          frameDoc.document.write('<tr class="item"><td>'+data.corpPack_name+' (Corporate Package)</td><td>Php '+data.price+'</td></tr>');
        }
        if(charge != 0)
        {
          frameDoc.document.write('<tr><td>'+data.corpPack_name+' (Corporate Package) (c/o '+data.corp_name+')</td><td>Php 0</td></tr>'); 
        }
        response[7].forEach(function(data){
          frameDoc.document.write('<tr><td>&emsp;&emsp;&emsp; -'+data.service_name+'</td><td></td></tr>');
        })

      })
      response[8].forEach(function(data){
        frameDoc.document.write('<tr><td>'+data.pack_name+'</td><td>Php '+data.pack_price+'</td></tr>');
        response[9].forEach(function(data){
          frameDoc.document.write('<tr><td>&emsp;&emsp;&emsp; -'+data.service_name+'</td><td></td></tr>');
        })
      })
      frameDoc.document.write('<tr class="item last total"> <td></td> <td> Total: '+total+'</td></tr>');
      frameDoc.document.write('<tr> <td></td> <td> Payment:  '+payment+'</td></tr>');
      frameDoc.document.write('<tr> <td></td> <td> Change: '+change+'</td></tr>');
      frameDoc.document.write('</table>');
      frameDoc.document.write('</div></body></html>');
      frameDoc.document.close();
      setTimeout(function () {
        window.frames["frame1"].focus();
        window.frames["frame1"].print();
        frame1.remove();
      }, 500);
    }
     });
});
</script>
@endif
@endsection
