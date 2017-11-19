
@extends('Master.layout')

@section('title')
  	Dep-Ed Staff
@endsection

@section('add_link')

@endsection

@section('nav-name')
		{{ $user->name }}
@endsection

@section('content')
<div class="container">
     <div class="row">
         <nav class="navbar navbar-default">
           <div class="container-fluid">
             <ul class="nav navbar-nav">
               <li class="act"><a href="{{ route('depEmployee') }}"><STRONG>Home</STRONG></a></li>
               <li ><a href="{{ route('account')}}">Account</a></li>
               <li ><a href="{{ route('report')}}">Report</a></li>
               <li ><a href="{{ route('activity')}}">Activity List</a></li>
             </ul>
           </div>
         </nav>
     </div>


<div class="jumbotron">
    <center>
      <img src="{{ asset('img/logo_deped-gray.png')}}">
       <h3 style="color: gray">DIVISION OF BUTUAN</h3>
    </center>
  </div>
 </div>
@endsection
