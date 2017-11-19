<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
</head>
<body>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('style/login.css')}}">

  <nav class = "navbar navbar-default" role = "navigation">
   <div class = "navbar-header">
      <button type = "button" class = "navbar-toggle" 
         data-toggle = "collapse" data-target = "#example-navbar-collapse">
         <span class = "sr-only">Toggle navigation</span>
         <span class = "icon-bar"></span>
         <span class = "icon-bar"></span>
         <span class = "icon-bar"></span>
      </button>
    <span class="navbar-brand"><img class="logo" src="http://lis.deped.gov.ph/uis/assets/rev/6f8d601/images/deped-logo.gif" alt="DepEd" style="height: 20px; margin-top: -2px"/></span>
   </div>
   
   <div class = "collapse navbar-collapse" id = "example-navbar-collapse">
        <ul class="nav navbar-nav">
            <li><a href="#">ADMIN ACCOUNT</a></li>
        </ul>
         <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Help</a></li>
        </ul>
   </div>
</nav>


  @yield('content')
</body>
</html>