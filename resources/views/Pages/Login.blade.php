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
    <script type="text/javascript" src="{{ asset('/plugins/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/plugins/js/bootstrap.min.js') }}"></script>
  </body>
</html>
