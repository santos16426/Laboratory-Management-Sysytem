<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="plugins/img/favicon.png">
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
        <script src="{{ asset('/sweetalert-master/dist/sweetalert.min.js') }}"></script>
        <style type="text/css">
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
                        <img alt="" src="plugins/img/avatar1_small.jpg">
                        <span class="username">Jhon Doue</span>
                    </a>
                </li>
            </ul>
        </div>
    </header>
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="/Admin/Dashboard">
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

                      <li class="sub-menu">
                          <a  href=""><i class="fa fa-file-o" aria-hidden="true"></i> Results</a>
                          <ul class="sub">
                              <li><a  href="/Transactions/EncodeResults">Enconding of Results</a></li>
                              <li><a  href="/Transactions/UploadResults">Uploading of Results</a></li>
                          </ul>
                      </li>

                  </ul>
                </li>

                <li class="sub-menu">
                  <a href="" >
                      <i class="fa fa-clipboard"></i>
                      <span>Reports</span>
                  </a>
                  <ul class="sub">
                      <li><a  href="">Census</a></li>
                  </ul>
                </li>

                <li class="sub-menu">
                  <a href="" >
                      <i class="fa fa-wrench"></i>
                      <span>Utilities</span>
                  </a>
                  <ul class="sub">
                      <li><a  href="">Reactivation</a></li>
                      <li><a  href="">Company Details</a></li>
                  </ul>
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
</section>


<script type="text/javascript" src="{{ asset('/plugins/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/jquery-1.8.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/Datatable/datatables.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('/plugins/assets/advanced-datatable/media/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/assets/data-tables/DT_bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/assets/dropzone/dropzone.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/jquery.scrollTo.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/jquery.nicescroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/jquery.sparkline.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/assets/bootstrap-fileupload/bootstrap-fileupload.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/js/owl.carousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/jquery.customSelect.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/respond.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/common-scripts.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/sparkline-chart.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/easy-pie-chart.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/count.js') }}"></script>
<script type="text/javascript" src="{{ asset('/bootstrapvalidator/dist/js/bootstrapValidator.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/assets/gritter/js/jquery.gritter.js') }}"></script>
<script src="{{ asset('/plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/bootstrap-switch.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/jquery.tagsinput.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/assets/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/assets/bootstrap-daterangepicker/date.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/assets/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/ga.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/form-component.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/js/gritter.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/Toastr/toastr.js') }}" ></script>
<script src="{{ asset('/plugins/js/val.js') }}"></script>


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
