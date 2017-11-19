
@extends('Master.layout')

@section('title')
  School Dashboard
@endsection
@section('nav-name')
{{ $info->school_name }}
@endsection
@section('content')
<style>
.danger{ background-color: #E3000E; border: none; color: white;  border-radius: 0px !important;}
.success { background-color: #2CC990; border: none; color: white;  border-radius: 0px !important;}
#getFlat {background-color:#25373D; color:white; border:none !important;}
input[type="text"] {
  width:100%
}
</style>
	 <div class="container">
        <div class="row">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="{{ route('SchoolDash')}}"><STRONG>Home</STRONG></a></li>
                  <li ><a href="{{ route('enrollee')}}">Enrollees</a></li>
                  <li ><a href="{{ route('facility')}}">Facility</a></li>
                  <li ><a href="{{ route('staff')}}">Staff</a></li>
                  <li ><a href="{{ route('submission_form')}}"><STRONG>School Form 1</STRONG></a></li>
                  <li ><a href="{{ route('learner_info')}}">Enroll Learner</a></li>
                </ul>
              </div>
            </nav>
        </div>
    </div>
<!-- {{ Auth::user()->password }} -->
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading" id="getFlat"><strong>Basic Information</strong></div>
                    <div class="panel-body">
                          <form class="form-horizontal" action="{{ route('update_information')}}" method="post">
                         <div class="form-group">

                                  <label class="col-sm-2 control-label">School ID</label>
                                <div class="col-sm-5">

                                  <input class="form-control" name="central" id="focusedInput" type="text" value="{{ $info->school_cen_id }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                  <label class="col-sm-2 control-label">School</label>
                                <div class="col-sm-8">
                                  <input class="form-control" name="school" id="focusedInput" type="text" value="{{ $info->school_name }}" readonly="">
                                </div>
                            </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-8">
                                  <input class="form-control" name="address" id="focusedInput" type="text" value="{{ $info->school_address }}">
                                </div>
                            </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label">Administrator</label>
                                <div class="col-sm-8">
                                  <input class="form-control" name="administrator" id="focusedInput" type="text" value="{{ $info->administrator}}" >
                                </div>
                            </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-8">
                                  <input class="form-control" name="email" id="focusedInput" type="text" value="{{ $info->email }}">
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <div class="form-group">
                                  <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-8">
                                  <button type="submit" class="btn add">Update</button>
                                </div>
                            </div>
                            @if($errors->any())
                              <div class="alert danger">
                                  @foreach($errors->all() as $error)
                                    <p><small><strong> {{ $error }} </strong></small></p>
                                  @endforeach
                              </div>
                            @endif

                            @if(Session::has('flash_message'))
                              <div class="alert success">{{ Session::get('flash_message')}}</div>
                            @endif
                        </form>
                    </div>
            </div>
        </div>
        <div class="col-md-5">
              <div class="panel panel-default">
                <div class="panel-heading" id="getFlat"><strong>Contact Information</strong></div>
                    <div class="panel-body">
                       <form class="form-horizontal" action="{{ route('updateContact') }}" method="post">
                         <div class="form-group">
                                  <label class="col-sm-4 control-label">Mobile #</label>
                                <div class="col-sm-8">
                                  <input class="form-control" name="mobile" id="mobile" type="text" value="{{ $contact->mobile }}">
                                </div>
                            </div>
                           <div class="form-group">
                                  <label class="col-sm-4 control-label">Telephone #</label>
                                <div class="col-sm-8">
                                  <input class="form-control" name="tel" id="focusedInput" type="text" value="{{ $contact->telephone }}">
                                </div>
                            </div>
                            {{ csrf_field() }}
                              <div class="col-md-4 col-md-offset-4"><button type="submit" class="btn add">Update</button></div>
                        </form>
                    </div>
                    @if(Session::has('Contact_flash'))
                      <div class="alert success">
                        <p> {{ Session::get('Contact_flash') }}</p>
                      </div>
                    @endif
            </div>
            <div class="panel panel-default">
                    <div class="panel-heading" id="getFlat">Division/District</div>
                      <div class="panel-body">
                        <form action="{{ route('div_district')}}" method="post">
                          <div class="form-group">
                                   <label class="col-sm-4 con trol-label">Division</label>
                                 <div class="col-sm-8">
                                   <input class="form-control" name="division" id="focusedInput" type="text" value="Butuan" readonly="">
                                 </div>
                             </div><br><br>
                             <div class="form-group">
                                      <label class="col-sm-4 control-label">District</label>
                                    <div class="col-sm-8">
                                          <select class="form-control" name="district">
                                                <option value="{{ $get_school_district->district_id }}">{{ $get_school_district->district }} </option>
                                                <option value="" disabled="disabled">----------------------------------------</option>
                                              @foreach($school_district as $district)
                                                <option value="{{ $district->id }}"> {{ $district->district }}</option>
                                              @endforeach
                                          </select>
                                      {{ csrf_field() }}
                                  <br>    <button type="submit" name="button" class="btn add">Update</button>
                                    </div>
                                </div>
                        </form>
                      </div>
            </div>

        </div>
    </div>
 <!-- end of container -->
</div>
<script type="text/javascript">
  $(function() {
    $("#mobile").keypress(function (e) {
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                 return false;
         }
     });
  });
</script>
@endsection
