<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
</head>
<body>
	<style>

	#black {
		background-color: #F0F1F5 !important;
		font-weight: bold;
		border-radius: none !important;

	}



	#navfont {
		color: black;
	}

	
	</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('style/login.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/button.css')}}">

	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">

	<link rel="stylesheet" href="{{ asset('css/navbar.css')}}">
	<link rel="stylesheet" href="{{ asset('css/alert.css')}}">
	<link rel="stylesheet" href="{{ asset('css/semantic.min.css')}}">

	<link rel="stylesheet" href="{{ asset('css/dataTables.semanticui.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css')}}">
	<link rel="stylesheet" href="{{ asset('css/semantic.min.css')}}">


	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/dataTables.semanticui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
	<script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>

	@yield('add_link')

  <nav class = "navbar navbar-default" role = "navigation" id="black">
   <div class = "navbar-header" id="black">
      <button type = "button" class = "navbar-toggle"
         data-toggle = "collapse" data-target = "#example-navbar-collapse">
         <span class = "sr-only">Toggle navigation</span>
         <span class = "icon-bar"></span>
         <span class = "icon-bar"></span>
         <span class = "icon-bar"></span>
      </button>
    <span class="navbar-brand">
      <img class="logo" src="{{ asset('img/deped-logo.gif')}}" alt="DepEd" style="height: 20px; margin-top: -2px"/>
    </span>
		<span class="navbar-brand">Login Page</span>
   </div>
   <div class = "collapse navbar-collapse" id = "example-navbar-collapse">
        <ul class="nav navbar-nav">
            <li><a href="#" id="navfont">@yield('nav-name')</a></li>
        </ul>
         <ul class="nav navbar-nav navbar-right">
            <li><a href="#" id="navfont">Help</a></li>
        </ul>
   </div>
</nav>

<div id="bg_center">
	@yield('content')	
</div>

</body>
</html>
