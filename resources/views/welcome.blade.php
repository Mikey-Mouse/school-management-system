@extends('Master.indexLayout')
@section('title')
  Welcome
@endsection
@section('content')
   <style type="text/css">
       #signLog
       {
        width: 5%;
        height: 5%;
        margin-left: 1%;
       }
   </style>

<div class="container">
    <div class="col-md-12">
    <div class="modal-dialog" style="margin-bottom:0">
        <div class="modal-content">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In <img src="{{ asset('img/logo_deped-gray.png')}}" id="signLog"></h3>
                    </div>
                    <div class="panel-body">
                     <form role="form" action="{{ route('loginUser') }}" method="POST">
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text" autofocus="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                                    {{ csrf_field()}}
                                  <button type="submit" class="btn warning"><strong>Login</strong></button>  <hr>
                                @if($errors->any())
                                 <div class="alert danger"zz><small><strong>{{ $errors->first() }}</strong></small></div>
                                @endif
                    </form>
                    </div>
                </div>
    </div>
</div>
</div>

@endsection
