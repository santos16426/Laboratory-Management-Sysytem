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

<div class="row">
  <div class="col-lg-12">
    <section class="main-content" >
              <!--state overview start-->
              <div class="row state-overview">
                  @if(Session::get('empcount')==1)
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-user-md"></i>
                          </div>
                          <div class="value">
                              <h1 class="emp_count">
                                  {{ number_format($emp_count) }}
                              </h1>
                              <p>Employee</p>
                          </div>
                      </section>
                  </div>
                  @endif
                  @if(Session::get('totpatients')==1)
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="fa fa-users"></i>
                          </div>
                          <div class="value">
                              <h1 class=" patient_count">
                                 {{ number_format($patient_count) }}
                              </h1>
                              <p>Total Patients</p>
                          </div>
                      </section>
                  </div>
                  @endif
                  @if(Session::get('service')==1)
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="fa fa-heartbeat"></i>
                          </div>
                          <div class="value">
                              <h1 class=" service_count">
                                  {{ number_format($service_count) }}
                              </h1>
                              <p>Services</p>
                          </div>
                      </section>
                  </div>
                  @endif
                  @if(Session::get('profit')==1)
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="fa fa-bar-chart-o"></i>
                          </div>
                          <div class="value">
                              <h1 class="dayincome">
                                  {{ number_format($dayincome) }}
                              </h1>
                              <p>Profit of the Day</p>
                          </div>
                      </section>
                  </div>
                  @endif
                  @if(Session::get('corpaccounts')==1)
                  <div class="col-lg-3 col-sm-6">
                    <section class="panel">
                        <div class="symbol red">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="value">
                            <h1 class=" corporate">
                                {{ number_format($corporate) }}
                            </h1>
                            <p>Corporate Accounts</p>
                        </div>
                    </section>
                  </div>
                  @endif
                  @if(Session::get('corppayment')==1)
                    <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="fa fa-rub"></i>
                          </div>
                          <div class="value">
                              <h1 class=" corppayment">
                                  {{ number_format($corppay) }}
                              </h1>
                              <p>Unsettled Corporate Payments</p>
                          </div>
                      </section>
                  </div>
                  @endif
                  @if(Session::get('rebatepercentage')==1)
                   <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="fa fa-percent"></i>
                          </div>
                          <div class="value">
                              <h1 class="emp_total">
                                 {{ $rebate }}%
                              </h1>
                              <p>Current Rebate Percentage</p>
                          </div>
                      </section>
                  </div>
                  @endif
                  @if(Session::get('rebatepayment')==1)
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-user-md"></i>
                          </div>
                          <div class="value">
                              <h1 class="rebatepayment">
                                  {{ number_format($emp_total) }}
                              </h1>
                              <p>Unsettled Rebate Payment</p>
                          </div>
                      </section>
                  </div>
                  @endif
                  @if(Session::get('transaction')==1)
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="fa fa-handshake-o"></i>
                          </div>
                          <div class="value">
                              <h1 class="daytransact">
                                  {{ number_format($daytransact) }}
                              </h1>
                              <p>Transactions for the Day</p>
                          </div>
                      </section>
                  </div>
                  @endif
                  @if(Session::get('income')==1)
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-rub"></i>
                          </div>
                          <div class="value">
                              <h1 class="monthincome">
                                  {{ number_format($monthincome) }}
                              </h1>
                              <p>Total Income for the month</p>
                          </div>
                      </section>
                  </div>
                  @endif
                  @if(Session::get('result')==1)
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="fa fa-rub"></i>
                          </div>
                          <div class="value">
                              <h1 class="unfinishtrans">
                                  {{ number_format($unfinish) }}
                              </h1>
                              <p>Pending Results</p>
                          </div>
                      </section>
                  </div>
                  @endif
              </div>
              <!--state overview end-->

              <div class="row">
               @if(Session::get('result')==1)
                <div class="col-lg-8">
                      <!--user info table start-->
                      <section class="panel">
                      	<header class="panel-heading">
													Pending Results
													<span class="tools pull-right">
											          <a class="fa fa-chevron-down" href="javascript:;"></a>
											      	</span>
												</header>
                          <div class="panel-body">
	                          <table class="table table-hover personal-task">
	                            <thead>
	                              <tr>
	                                <th>Transaction ID</th>
	                                <th>Transaction Date</th>
	                                <th>Patient Name</th>
	                                <th>Progress</th>
	                                @if((Session::get('upresult')==1))
	                                <th>Action</th>
	                                @endif
	                              </tr>
	                            </thead>
	                            <tbody>
	                              @foreach($transactions as $transact)
	                              <tr>
	                                <td>{{ $transact->trans_id }}</td>
	                                <td>
	                                    {{  date('F jS, Y',strtotime($transact->trans_date)) }}
	                                </td>
	                                <td>{{ $transact->patient_lname }} {{ $transact->patient_mname }} {{ $transact->patient_fname }}</td>
	                                <td>
	                                  @foreach($totaltrans as $totals)
	                                    @if($totals->result_id == $transact->result_id)
	                                      @if(count($donetrans)>0)
	                                      @foreach($donetrans as $dones)
	                                        @if($dones->result_id == $transact->result_id)
	                                          <?php $total = floor(($dones->count_row/$totals->count_row)*100) ?>
	                                          <div class="progress progress-striped active progress-md">
	                                            <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: {{ $total }}%">
	                                              <span>{{ $total }}% Complete</span>
	                                            </div>
	                                          </div>
	                                          @else
	                                            <div class="progress progress-striped active progress-md">
			                                          <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
			                                            <span>0% Complete</span>
			                                          </div>
	                                            </div>
	                                            @endif
	                                          @endforeach
	                                          @else
	                                        <div class="progress progress-striped active progress-md">
			                                      <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
			                                        <span>0% Complete</span>
			                                      </div>
	                                        </div>
	                                        @endif
	                                      @endif
	                                    @endforeach
	                                	</td>
	                                  @if((Session::get('upresult')==1))
	                                  @if($total == 100)
	                                  <td>
	                                      <a class="btn btn-primary btn-xs" href="/uploadFileResuls?id={{ $transact->trans_id }}"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;  Upload Result</a>
	                                  </td>
	                                  @endif
	                                  @endif
	                              </tr>
	                              @endforeach
	                            </tbody>
	                          </table>
                          </div>
                      </section>
                </div>
                @endif
              </div>
            
    </section>
  </div>
</div>

@endsection
@section('additional')

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
  var prescriptions = "";
  $.ajax
      ({
        url: '/retrieveReciept', 
        type: 'get',
        data: {ID:trans_id}, 
        dataType : 'json',
        success:function(response) { 
          response[0].forEach(function(data){
            date = data.trans_date;
            date = new Date(date);
            date = date.toDateString();
            total = data.trans_total;
            payment = data.trans_payment;
            change = data.trans_change;
            prescriptions = data.prescriptions;
            total = parseFloat(total).toFixed(2);
            payment= parseFloat(payment).toFixed(2);
            change =parseFloat(change).toFixed(2);

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
          frameDoc.document.write('<style>@page { margin: 2; } .invoice-box{ max-width:800px; margin:auto; padding:30px; font-size:16px; line-height:24px; font-family:Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; color:#555; } .invoice-box table{ width:100%; line-height:inherit; text-align:left; } .invoice-box table td{ padding:5px; vertical-align:top; } .invoice-box table tr td:nth-child(2){ text-align:right; } .invoice-box table tr td:nth-child(3){ text-align:left; padding-left:200px; } .invoice-box table tr.top table td{ padding-bottom:20px; } .invoice-box table tr.top table td.title{ font-size:45px; line-height:45px; color:#333; } .invoice-box table tr.information table td{ padding-bottom:40px; } .invoice-box table tr.heading td{ background:#eee; border-bottom:1px solid #ddd; font-weight:bold; } .invoice-box table tr.details td{ padding-bottom:20px; } .invoice-box table tr.item td{ border-bottom:1px solid #eee; } .invoice-box table tr.item.last td{ border-bottom:none; } .invoice-box table tr.total td:nth-child(2){ border-top:2px solid #eee; font-weight:bold; } @media only screen and (max-width: 600px) { .invoice-box table tr.top table td{ width:100%; display:block; text-align:center; } .invoice-box table tr.information table td{ width:100%; display:block; text-align:center; } } </style>');
          frameDoc.document.write('<html><body> <div class="invoice-box"> <table cellpadding="0" cellspacing="0"> <tr class="top"> <td colspan="2">   ');
          frameDoc.document.write('<table>');
          frameDoc.document.write('<tr> <td> <img src="{{ asset("/banner.jpg") }}" style="width:100%; max-width: 350px; padding 0"> </td> <td style="text-align: left; padding-top: 25px; padding: 0; font-size: 10px"> <strong>Company Name:</strong>Globalhealth Diagnostic Center Inc<br> <strong>Address:</strong>156 N. Domingo Street, San Juan City, <br>Metro Manila<br> <strong>Contact Number:</strong>722-4544/576-5357<br> <strong>Email:</strong>globalhealth_sj@yahoo.com </td> </tr>');
          frameDoc.document.write('</table>');
          frameDoc.document.write('<tr class="information"> <td colspan="2"> <table> <tr><td></td></tr>');
          frameDoc.document.write('<tr> <td> <strong>Patient Name:</strong>'+patient_name+'<br> <strong> Claiming Code:</strong> '+claimcode+'<br> <strong>Website:</strong>www.ghdc-sj.com </td> <td> </td> <td style="padding-left: 33px"> <strong>Date:</strong> '+moment(date).format('MMMM Do YYYY')+' <br> <strong>Receptionist:</strong>'+emp_name+'<br> <strong>Reffering Employee:</strong>'+ref_name+' </td></tr>');
          
          frameDoc.document.write('</table>');
          
          frameDoc.document.write('<tr class="heading"> <td> Service </td> <td> Fee </td></tr>');

          response[5].forEach(function(data){
            price = data.service_price
            price = parseFloat(price).toFixed(2);
            frameDoc.document.write('<tr><td>'+data.serv_name+'</td><td>Php '+price+'</td></tr>');
          })
          
          response[6].forEach(function(data){
            var charge = data.charge;
            if(charge == 0)
            {
              price = data.price
              price = parseFloat(price).toFixed(2);
              frameDoc.document.write('<tr class="item"><td>'+data.corpPack_name+' (Corporate Package)</td><td>Php '+price+'</td></tr>');
            }
            if(charge != 0)
            {
              frameDoc.document.write('<tr><td>'+data.corpPack_name+' (Corporate Package) </td><td>(c/o '+data.corp_name+') Php '+data.price+'</td></tr>'); 
            }
            response[7].forEach(function(data){
              frameDoc.document.write('<tr><td>&emsp;&emsp;&emsp; -'+data.service_name+'</td><td></td></tr>');
            })

          })
          response[8].forEach(function(data){
          price = data.pack_price;
          price = parseFloat(price).toFixed(2);
          frameDoc.document.write('<tr><td>'+data.pack_name+'</td><td>Php '+price+'</td></tr>');
          response[9].forEach(function(data){
            frameDoc.document.write('<tr><td>&emsp;&emsp;&emsp; -'+data.service_name+'</td><td></td></tr>');
          })
          })
          response[6].forEach(function(data){
            var discount = 0; 
            response[0].forEach(function(data){
              discount = data.discount;
            })  
            if(discount > 0)  
            {
              frameDoc.document.write('<tr class="item" > <td></td> <td>Sub Total: '+data.price+'</td></tr>');  
              frameDoc.document.write('<tr> <td></td> <td> Discount:(PWD/Senior Citizen) 32% </td></tr>');
              frameDoc.document.write('<tr class="item last total"> <td></td> <td>Grand Total: '+(data.price - (data.price *(32/100)))+'</td></tr>');
              frameDoc.document.write('<tr> <td></td> <td> Payment:  '+payment+'</td></tr>');
              frameDoc.document.write('<tr> <td></td> <td> Change: '+change+'</td></tr>');
            }
            else
            {
              frameDoc.document.write('<tr class="item last total"> <td></td> <td>Grand Total: '+data.price+'</td></tr>');  
              frameDoc.document.write('<tr> <td></td> <td> Payment:  '+payment+'</td></tr>');
              frameDoc.document.write('<tr> <td></td> <td> Change: '+change+'</td></tr>');
            }
          
          })
          frameDoc.document.write('</table><br><br><br> <table> <tr> <td> Note<sup>*</sup> </td> </tr> <tr> <td>'+prescriptions+'</td> </tr> </table> ');
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
