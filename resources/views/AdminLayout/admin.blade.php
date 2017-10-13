@if(Session::has('loggedin'))

@else
{{Session::flash('cantlog',true)}}
<script type="text/javascript">
    window.location = "{{ url('/') }}";
</script>
@endif


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="{{ asset('/plugins/img/favicon.png') }}">
        <title>E-Diagnostic Center</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/css/bootstrap-reset.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/assets/font-awesome/css/font-awesome.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/css/owl.carousel.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/assets/dropzone/css/dropzone.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/css/style-responsive.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/assets/gritter/css/jquery.gritter.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/assets/bootstrap-fileupload/bootstrap-fileupload.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/Datatable/datatables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/bootstrapvalidator/dist/css/bootstrapValidator.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/Toastr/build/toastr.css') }}">
        <link rel="stylesheet" href="{{ asset('/plugins/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/bootstrapvalidator/dist/css/bootstrapValidator.css') }}">
        <link rel="stylesheet" href="{{ asset('/sweetalert-master/dist/sweetalert.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/assets/fancybox/source/jquery.fancybox.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/css/gallery.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/assets/bootstrap-datepicker/css/datepicker.css') }}">
        <script src="{{ asset('/sweetalert-master/dist/sweetalert.min.js') }}"></script>
        <link href="{{ asset('/plugins/css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/css/style-responsive.css') }}">
        <style type="text/css">
          .datepicker{z-index:1151 !important;}
          sup
          {
            color: red;
          }
          input
          {
            color: black
          }
        </style>

    </head>
<body>
<section id="container" >
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <a href="/Admin/Dashboard" class="logo">Global<span>Health</span></a>
        <div class="top-nav ">
            <ul class="nav pull-right top-menu">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="/Employee_images/{{ Session::get('emp_pic') }}" style="max-width: 20px">
                        <span class="username">{{ Session::get('display_name') }}</span>
                    </a>
                    <ul class="dropdown-menu extended logout">
                      <div class="log-arrow-up"></div>
                      <li><a href="/logout"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="/Admin/Dashboard" class="@yield('dashboard')">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if((Session::get('addlab')== 1)||(Session::get('uplab')== 1)||(Session::get('dellab')== 1)||(Session::get('addemptype')==1)||(Session::get('upemptype')==1)||(Session::get('delemptype')==1)||(Session::get('addemp')==1)||(Session::get('upemp')==1)||(Session::get('delemp')==1)||(Session::get('editpercent')==1)||(Session::get('addempreb')==1)||(Session::get('delempreb')==1)||(Session::get('addserv')==1)||(Session::get('upserv')==1)||(Session::get('delserv')==1)||(Session::get('addservtype')==1)||(Session::get('upservtype')==1)||(Session::get('delservtype')==1)||(Session::get('addservgrp')==1)||(Session::get('upservgrp')==1)||(Session::get('delservgrp')==1)||(Session::get('addpack')==1)||(Session::get('uppack')==1)||(Session::get('delpack')==1)||(Session::get('addcorp')==1)||(Session::get('upcorp')==1)||(Session::get('delcorp')==1)||(Session::get('addcorppack')==1)||(Session::get('upcorppack')==1)||(Session::get('delcorppack')==1))
                <li class="sub-menu">
                  @yield('maintenanceactive')
                      <i class="fa fa-cogs"></i>
                      <span>Maintenance</span>
                  </a>
                  <ul class="sub">
                      @if((Session::get('addlab')== 1)||(Session::get('uplab')== 1)||(Session::get('dellab')== 1))
                      <li class="@yield('laboratoryactive')">
                        <a  href="/Maintenance/Laboratory">
                            <i class="fa fa-building-o" aria-hidden="true"></i>
                            <span>Department</span>    
                        </a>
                      </li>
                      @endif
                      @if((Session::get('addemptype')==1)||(Session::get('upemptype')==1)||(Session::get('delemptype')==1)||(Session::get('addemp')==1)||(Session::get('upemp')==1)||(Session::get('delemp')==1))
                      <li class="sub-menu" >
                          <a  href="" class="@yield('employee')">
                              <i class="fa fa-user-o " aria-hidden="true" ></i>
                              <span>Employee</span>
                          </a>
                          <ul class="sub">
                              @if((Session::get('addemptype')==1)||(Session::get('upemptype')==1)||(Session::get('delemptype')==1))
                              <li class="@yield('emptypeactive')"><a   href="/Maintenance/EmployeeType">Employee Type</a></li>
                              @endif
                              @if((Session::get('addemp')==1)||(Session::get('upemp')==1)||(Session::get('delemp')==1))
                              <li class="@yield('empactive')"><a  href="/Maintenance/Employee">Employee List</a></li>
                              @endif
                          </ul>
                      </li>
                      @endif
                      @if((Session::get('editpercent')==1)||(Session::get('addempreb')==1)||(Session::get('delempreb')==1))
                      <li class="sub-menu">
                          <a  href="" class="@yield('rebate')">
                              <i class="fa fa-percent" aria-hidden="true"></i>
                              <span>Rebate</span>
                          </a>
                          <ul class="sub">
                              @if((Session::get('editpercent')==1))
                              <li class="@yield('rebactive')"><a  href="/Maintenance/RebatePercentage">Rebate Percentage</a></li>
                              @endif
                              @if((Session::get('addempreb')==1)||(Session::get('delempreb')==1))
                              <li class="@yield('emprebactive')"><a  href="/Maintenance/EmployeeRebate">Employee's Rebate</a></li>
                              @endif
                          </ul>
                      </li>
                      @endif
                      @if((Session::get('addserv')==1)||(Session::get('upserv')==1)||(Session::get('delserv')==1)||(Session::get('addservtype')==1)||(Session::get('upservtype')==1)||(Session::get('delservtype')==1)||(Session::get('addservgrp')==1)||(Session::get('upservgrp')==1)||(Session::get('delservgrp')==1))
                      <li class="sub-menu">
                          <a  href="" class="@yield('service')">
                              <i class="fa fa-heartbeat" aria-hidden="true"></i>
                              <span>Service</span>
                          </a>
                          <ul class="sub">
                              @if((Session::get('addserv')==1)||(Session::get('upserv')==1)||(Session::get('delserv')==1))
                              <li class="@yield('servicegroupactive')"><a  href="/Maintenance/ServiceGroup">Service Group</a></li>
                              @endif
                              @if((Session::get('addservtype')==1)||(Session::get('upservtype')==1)||(Session::get('delservtype')==1))
                              <li class="@yield('servicetypeactive')"><a  href="/Maintenance/ServiceType">Service Type</a></li>
                              @endif
                              @if((Session::get('addservgrp')==1)||(Session::get('upservgrp')==1)||(Session::get('delservgrp')==1))
                              <li class="@yield('serviceactive')"><a  href="/Maintenance/Service">Service List</a></li>
                              @endif
                          </ul>
                      </li>
                      @endif
                      @if((Session::get('addpack')==1)||(Session::get('uppack')==1)||(Session::get('delpack')==1))
                      <li  class="@yield('packactive')">
                          <a  href="/Maintenance/Package">
                              <i class="fa fa-dropbox" aria-hidden="true"></i>
                              <span>Package</span>
                          </a>
                      </li>
                      @endif
                      @if((Session::get('addcorp')==1)||(Session::get('upcorp')==1)||(Session::get('delcorp')==1)||(Session::get('addcorppack')==1)||(Session::get('upcorppack')==1)||(Session::get('delcorppack')==1))
                      <li class="@yield('corpactive')">
                        <a  href="/Maintenance/Corporate">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>Corporate Accounts</span>
                        </a>
                      </li>
                      @endif
                  </ul>
                </li>
                @endif
                @if((Session::get('addpatient')==1)||(Session::get('availserv')==1)||(Session::get('corpbill')==1)||(Session::get('rebatebill')==1)||(Session::get('addresult')==1)||(Session::get('upresult')==1))
                <li class="sub-menu">
                  <a href="" class="@yield('transaction')">
                      <i class="fa fa-handshake-o"></i>
                      <span>Transactions</span>
                  </a>
                  <ul class="sub">
                      @if((Session::get('addpatient')==1)||(Session::get('availserv')==1))
                      <li class="@yield('medicalservice')"><a  href="/Transactions/PatientList"><i class="fa fa-heartbeat" aria-hidden="true"></i> Medical Services</a></li>
                      @endif
                      @if((Session::get('corpbill')==1))
                      <li class="@yield('corporatetrans')"><a  href="/Transactions/CorporateBilling"><i class="fa fa-users" aria-hidden="true"></i> Corporate Account Billing</a></li>
                      @endif
                      @if((Session::get('rebatebill')==1))
                      <li class="@yield('rebatetrans')"><a  href="/Transactions/RebateBilling"><i class="fa fa-percent" aria-hidden="true"></i> Rebate Employee Billing</a></li>
                      @endif
                      
                      @if((Session::get('addresult')==1)||(Session::get('upresult')==1))
                      <li class="sub-menu">
                          <a  href="" class="@yield('transresultactive')"><i class="fa fa-file-o" aria-hidden="true"></i> Results</a>
                          <ul class="sub">
                              @if((Session::get('addresult')==1))
                              <li class="@yield('encodeactive')"><a  href="/Transactions/ResultDashboard">Encoding of Results</a></li>
                              @endif
                              @if((Session::get('upresult')==1))
                              <li class="@yield('uploadactive')"><a  href="/Transactions/UploadOfResults">Uploading of Results</a></li>
                              @endif
                          </ul>
                      </li>
                      @endif
                  </ul>
                </li>
                @endif
                @if((Session::get('census')==1)||(Session::get('trans')==1)||(Session::get('corprep')==1)||(Session::get('rebaterep')==1))
                <li class="sub-menu">
                  <a class="@yield('reportactive')">
                      <i class="fa fa-area-chart" aria-hidden="true"></i>
                      <span>Reports</span>
                  </a>
                  <ul class="sub">
                      @if((Session::get('census')==1))
                      <li class="@yield('censusactive')"><a  href=""><i class="fa fa-line-chart" aria-hidden="true"></i> Census Reports</a></li>
                      @endif
                      @if((Session::get('trans')==1))
                      <li class="@yield('transactionactive')"><a  href="/Reports/TransactionReports"><i class="fa fa-bar-chart-o" aria-hidden="true"></i> Transaction Reports</a></li>
                      @endif
                      @if((Session::get('corprep')==1))
                      <li class="@yield('corpactive')"><a  href="/Reports/CorporateReports"><i class="fa fa-pie-chart" aria-hidden="true"></i> Corporate Reports</a></li>
                      @endif

                  </ul>
                </li>
                @endif
                @if(Session::get('emp_type_id') == 0)
                <li>
                  <a href="/Queries" class="@yield('query')">
                    <i class="fa fa-terminal" aria-hidden="true"></i>
                    <span>Queries</span>
                  </a>
                </li>
                <li class="sub-menu">
                  <a href="" class="@yield('utilitiesactive')" >
                      <i class="fa fa-wrench"></i>
                      <span>Utilities</span>
                  </a>
                  <ul class="sub">
                      <li class="@yield('reactivation')"><a  href="/Utilities/Reactivation"><span><i class="fa fa-recycle" aria-hidden="true"></i></span> Reactivation</a></li>
                      <li class="@yield('useraccess')"><a  href="/Utilities/Useraccess"><span><i class="fa fa-key" aria-hidden="true"></i></span> User Access</a></li>
                      <li class="@yield('companydetails')"><a  href="/Utilities/CompanyDetails"><span><i class="fa fa-address-card" aria-hidden="true"></i></span>Company Details</a></li>
                  </ul>
                </li>
                @endif
              </ul>
          </div>
      </aside>
      
    <section id="main-content">
        <section class="wrapper site-min-height">
            <div class="row">
                  <div class="col-lg-12">
                      <ul class="breadcrumb">
                          <li><a href="#">@yield('breadrootName')</a></li>
                          <li>@yield('breadParentName')</li>
                          <li class="active">@yield('breadactivePage')</li>
                      </ul>
                  </div>
              </div>
              @yield('content')
        </section>
    </section>
    <footer class="site-footer">
          <div class="text-center">
              2017 &copy; Poging Billy Joe
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>


<script type="text/javascript" src="{{ asset('/plugins/js/jquery.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/js/jquery-1.8.3.min.js') }}" ></script>


<script type="text/javascript" src="{{ asset('/plugins/assets/advanced-datatable/media/js/jquery.dataTables.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/assets/data-tables/DT_bootstrap.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/Datatable/datatables.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/js/bootstrap.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/assets/dropzone/dropzone.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/js/jquery.dcjqaccordion.2.7.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/js/jquery.scrollTo.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/js/jquery.nicescroll.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/js/jquery.sparkline.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/assets/bootstrap-fileupload/bootstrap-fileupload.js') }}"  ></script>
<script type="text/javascript" src="{{ asset('/plugins/js/owl.carousel.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/js/jquery.customSelect.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/js/respond.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/js/common-scripts.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/js/sparkline-chart.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/js/easy-pie-chart.js') }}" ></script>

<script type="text/javascript" src="{{ asset('/bootstrapvalidator/dist/js/bootstrapValidator.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/assets/gritter/js/jquery.gritter.js') }}"></script>
<script src="{{ asset('/plugins/select2/dist/js/select2.full.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/js/bootstrap-switch.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/js/jquery.tagsinput.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/assets/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/assets/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/assets/bootstrap-daterangepicker/date.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/assets/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/ga.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/form-component.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/gritter.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/Toastr/toastr.js') }}" ></script>
<script src="{{ asset('/plugins/assets/fancybox/source/jquery.fancybox.js') }}"></script>
<script src="{{ asset('/plugins/js/modernizr.custom.js') }}"></script>
<script src="{{ asset('/plugins/js/toucheffects.js') }}"></script>
<script src="{{ asset('/plugins/js/val.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/advanced-form-components.js') }}"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">

      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

  </script>
@if (Session::has('reactivate'))
<script type="text/javascript">
  
  $( document ).ready(function() 
  {
    
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "positionClass": "toast-top-right",
      "onclick": null,
      "showDuration": "3000",
      "hideDuration": "100",
      "timeOut": "3000",
      "extendedTimeOut": "0",
      "showEasing": "swing",
      "hideEasing": "swing",
      "showMethod": "show",
      "hideMethod": "hide"
    }
    toastr.success("Success! Data restored");
  }); 
</script>
@endif
@if (Session::has('add'))
<script type="text/javascript">
  
  $( document ).ready(function() 
  {
    
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "positionClass": "toast-top-right",
      "onclick": null,
      "showDuration": "3000",
      "hideDuration": "100",
      "timeOut": "3000",
      "extendedTimeOut": "0",
      "showEasing": "swing",
      "hideEasing": "swing",
      "showMethod": "show",
      "hideMethod": "hide"
    }
    toastr.success("Successfully Added!");
  }); 
</script>
@endif
@if (Session::has('update'))
<script type="text/javascript">
  $( document ).ready(function() 
  {
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "positionClass": "toast-top-right",
      "onclick": null,
      "showDuration": "3000",
      "hideDuration": "100",
      "timeOut": "3000",
      "extendedTimeOut": "0",
      "showEasing": "swing",
      "hideEasing": "swing",
      "showMethod": "show",
      "hideMethod": "hide"
    }
    toastr.success("Successfully Updated!");
  }); 
</script>
@endif
@if (Session::has('delete'))
<script type="text/javascript">
  $( document ).ready(function() 
  {
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "positionClass": "toast-top-right",
      "onclick": null,
      "showDuration": "3000",
      "hideDuration": "100",
      "timeOut": "3000",
      "extendedTimeOut": "0",
      "showEasing": "swing",
      "hideEasing": "swing",
      "showMethod": "show",
      "hideMethod": "hide"
    }
    toastr.success("Successfully Deleted!");
  }); 
</script>
@endif
@yield('additional')
  </body>
</html>
