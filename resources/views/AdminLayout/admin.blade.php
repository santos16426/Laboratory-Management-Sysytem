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
                        <img alt="" src="/plugins/img/images.jpg" style="max-width: 20px">
                        <span class="username">Administrator</span>
                    </a>
                    <ul class="dropdown-menu extended logout">
                      <div class="log-arrow-up"></div>
                      <li><a href="/"><i class="fa fa-key"></i> Log Out</a></li>
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
                <li class="sub-menu">
                  @yield('maintenanceactive')
                      <i class="fa fa-cogs"></i>
                      <span>Maintenance</span>
                  </a>
                  <ul class="sub">
                      <li class="@yield('laboratoryactive')">
                        <a  href="/Maintenance/Laboratory">
                            <i class="fa fa-building-o" aria-hidden="true"></i>
                            <span>Laboratory</span>    
                        </a>
                      </li>

                      <li class="sub-menu" >
                          <a  href="" class="@yield('employee')">
                              <i class="fa fa-user-o " aria-hidden="true" ></i>
                              <span>Employee</span>
                          </a>
                          <ul class="sub">
                              <li class="@yield('emptypeactive')"><a   href="/Maintenance/EmployeeType">Employee Type</a></li>
                              <li class="@yield('empactive')"><a  href="/Maintenance/Employee">Employee List</a></li>
                          </ul>
                      </li>

                      <li class="sub-menu">
                          <a  href="" class="@yield('rebate')">
                              <i class="fa fa-percent" aria-hidden="true"></i>
                              <span>Rebate</span>
                          </a>
                          <ul class="sub">
                              <li class="@yield('rebactive')"><a  href="/Maintenance/RebatePercentage">Rebate Percentage</a></li>
                              <li class="@yield('emprebactive')"><a  href="/Maintenance/EmployeeRebate">Employee's Rebate</a></li>
                          </ul>
                      </li>

                      <li class="sub-menu">
                          <a  href="" class="@yield('service')">
                              <i class="fa fa-heartbeat" aria-hidden="true"></i>
                              <span>Service</span>
                          </a>
                          <ul class="sub">
                              <li class="@yield('servicegroupactive')"><a  href="/Maintenance/ServiceGroup">Service Group</a></li>
                              <li class="@yield('servicetypeactive')"><a  href="/Maintenance/ServiceType">Service Type</a></li>
                              <li class="@yield('serviceactive')"><a  href="/Maintenance/Service">Service List</a></li>
                          </ul>
                      </li>

                      <li  class="@yield('packactive')">
                        <a  href="/Maintenance/Package">
                            <i class="fa fa-dropbox" aria-hidden="true"></i>
                            <span>Package</span>
                        </a>
                    </li>
                      <li class="@yield('corpactive')">
                        <a  href="/Maintenance/Corporate">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>Corporate Accounts</span>
                        </a>
                      </li>
                  </ul>
                </li>
                <li class="sub-menu">
                  <a href="" class="@yield('transaction')">
                      <i class="fa fa-handshake-o"></i>
                      <span>Transactions</span>
                  </a>
                  <ul class="sub">
                      <li class="@yield('medicalservice')"><a  href="/Transactions/PatientList"><i class="fa fa-heartbeat" aria-hidden="true"></i> Medical Services</a></li>
                      <li class="@yield('corporatetrans')"><a  href="/Transactions/CorporateBilling"><i class="fa fa-users" aria-hidden="true"></i> Corporate Account Billing</a></li>
                      <li class="@yield('rebatetrans')"><a  href="/Transactions/RebateBilling"><i class="fa fa-percent" aria-hidden="true"></i> Rebate Employee Billing</a></li>
                      <li class="sub-menu">
                          <a  href="" class="@yield('transresultactive')"><i class="fa fa-file-o" aria-hidden="true"></i> Results</a>
                          <ul class="sub">
                              <li class="@yield('encodeactive')"><a  href="/Transactions/ResultDashboard">Enconding of Results</a></li>
                              <li class="@yield('uploadactive')"><a  href="/Transactions/UploadOfResults">Uploading of Results</a></li>
                          </ul>
                      </li>

                  </ul>
                </li>

                <li class="sub-menu">
                  <a class="@yield('reportactive')">
                      <i class="fa fa-area-chart" aria-hidden="true"></i>
                      <span>Reports</span>
                  </a>
                  <ul class="sub">
                      <li class="@yield('censusactive')"><a  href=""><i class="fa fa-line-chart" aria-hidden="true"></i> Census Reports</a></li>
                      <li class="@yield('transactionactive')"><a  href="/Reports/TransactionReports"><i class="fa fa-bar-chart-o" aria-hidden="true"></i> Transaction Reports</a></li>
                      <li class="@yield('corpactive')"><a  href="/Reports/CorporateReports"><i class="fa fa-pie-chart" aria-hidden="true"></i> Corporate Reports</a></li>

                  </ul>
                </li>
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
                      <li class="@yield('reactivation')"><a  href="/Utilities/Useraccess"><span><i class="fa fa-recycle" aria-hidden="true"></i></span> User Access</a></li>
                      <li class="@yield('companydetails')"><a  href="/Utilities/CompanyDetails"><span><i class="fa fa-address-card" aria-hidden="true"></i></span>Company Details</a></li>
                  </ul>
                </li>
                <li>
                  <a href="/Queue" class="@yield('queue')">
                    <i class="fa fa-desktop"></i>
                    <span>Queueing</span>
                  </a>
                </li>
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
