

@if(Session::has('loggedin'))
<script type="text/javascript">
    window.location = "{{ url('/Admin/Dashboard') }}";
</script>
@else

@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>E-Diagnostic Center|Login Page</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/css/bootstrap-reset.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/assets/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/css/style-responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/Toastr/build/toastr.css') }}">
</head>


  <body class="login-body">
    <div class="container">
      <form class="form-signin" action="/doLogin" method="POST">
      {{ csrf_field() }}
        <h2 class="form-signin-heading">E-Diagnostic Center Login</h2>
        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="Username" autofocus name="user">
            <input type="password" class="form-control" placeholder="Password" name="password">
            
            <button class="btn btn-lg btn-login btn-block" type="submit">Log in</button>
        </div>
      </form>
    </div>
    <script type="text/javascript" src="{{ asset('/plugins/js/jquery.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('/plugins/js/jquery-1.8.3.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('/plugins/Toastr/toastr.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('/plugins/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/plugins/js/bootstrap.min.js') }}"></script>

    @if (Session::has('loginfail'))
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
        toastr.error("Sorry, Username/Password not found");
      }); 
    </script>
    @endif  
    @if (Session::has('cantlog'))
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
        toastr.error("No user logged in!");
      }); 
    </script>
    @endif  
  </body>
</html>

