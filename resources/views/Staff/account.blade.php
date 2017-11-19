
@extends('Master.layout')

@section('title')
  	Account
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
               <li class="#"><a href="{{ route('depEmployee') }}"><STRONG>Home</STRONG></a></li>
               <li class='active' ><a href="{{ route('account')}}">Account</a></li>
               <li ><a href="{{ route('report')}}">Report</a></li>
               <li ><a href="{{ route('activity')}}">Activity List</a></li>
             </ul>
           </div>
         </nav>
     </div>
 </div>
 <div class="container">
       <div class="row">
             <div class="col-md-6 col-sm-push-3">
               <div class="panel panel-default">
               <div class="panel-heading">Account</div>
                 <div class="panel-body">
                   <form id="register_student" class="form-horizontal" action="{{ route('update_account') }}" method="post">
                     {{ csrf_field() }}

                     <div class="form-group">

                     <div class="form-group">
                         <label class="col-sm-3 control-label">ID </label>
                           <div class="col-sm-8">
                               <input class="form-control" id="id" type="text" name="id" placeholder="*" required="" value="DP0-017-{{ $identifier }}B23" disabled="">
                             </div>
                           </div>
                     <div class="form-group">
                           <label class="col-sm-3 control-label">Name</label>
                             <div class="col-sm-8">
                                 <input class="form-control" id="focusedInput" type="text" name="name" placeholder="*" required="" value="{{ $user->name }}">
                             </div>
                     </div>


                           <div class="form-group">
                                 <label class="col-sm-3 control-label">Address</label>
                                   <div class="col-sm-8">
                                       <input class="form-control" id="focusedInput" type="text" name="address" placeholder="*" required="" value="{{ $user->address }}">
                                   </div>
                           </div>
                           <div class="form-group">
                                 <label class="col-sm-3 control-label">Contact</label>
                                   <div class="col-sm-8">
                                       <input class="form-control" id="focusedInput" type="text" name="contact" required="" value="{{ $user->contact }}">
                                   </div>
                           </div>
                           <hr>
                           <div class="form-group">
                                 <label class="col-sm-3 control-label">username * </label>
                                   <div class="col-sm-8">
                                       <input class="form-control" id="focusedInput" type="text" name="username" required="" value="{{ Auth::user()->username }}">
                                   </div>
                           </div>
                           <div class="form-group">
                                 <label class="col-sm-3 control-label">password * </label>
                                   <div class="col-sm-8">
                                       <input class="form-control" id="focusedInput" type="text" name="password" placeholder="*" required="" value="">
                                   </div>
                           </div>
                         <button type="submit" class="btn add pull-right">Update</button>
                   </form>

                   @if(Session::has('update_trigger'))
                      <div class="alert success">SUCCESSFULLY ACCOUNT</div>
                   @endif

                   @if($errors->any())
                    <div class="alert danger">
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </div>
                   @endif
                 </div>
             </div>
             </div>
       </div>

 </div>
@endsection
