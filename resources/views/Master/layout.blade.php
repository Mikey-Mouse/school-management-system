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
		color: black;
	}

	#navfont {
		color: black;
	}

	input[readonly]
	{
	    background-color: white !important;
	}


	button {
	  border: none;
	  background: #2CC990;
	  cursor: pointer;
	  border-radius: 3px;
	  padding: 6px;
	  width: 100px;
	  color: white !important;
	  margin-left: 25px;
	  box-shadow: 0 3px 6px 0 rgba(0,0,0,0.2);
	  &:hover {
	    transform: translateY(-3px);
	    box-shadow: 0 6px 6px 0 rgba(0,0,0,0.2);
	  }
	}


	</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('style/login.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/button.css')}}">

	<link rel="stylesheet" href="{{ asset('css/navbar.css')}}">
	<link rel="stylesheet" href="{{ asset('css/alert.css')}}">
	<link rel="stylesheet" href="{{ asset('css/semantic.min.css')}}">


	<link rel="stylesheet" href="{{ asset('css/dataTables.semanticui.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css')}}">

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/dataTables.semanticui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.js"></script>
	<script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>

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

   </div>

   <div class = "collapse navbar-collapse" id = "example-navbar-collapse">
        <ul class="nav navbar-nav">
            <li><a href="#" id="navfont">@yield('nav-name')</a></li>
        </ul>
         <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ route('logout')}}"><button type="submit" id="" name="button">Logout</button></a></li>
        </ul>
   </div>
</nav>
  @yield('content')
</body>
</html>
