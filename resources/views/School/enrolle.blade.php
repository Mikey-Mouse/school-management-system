
@extends('Master.layout')

@section('title')
  	Enrollee
@endsection

@section('nav-name')
	{{ $info->school_name }}
@endsection
@section('content')
<style>

#getWidth{
  width: 70%;
}

text {
  margin: auto;
}

</style>
<div class="container">
        <div class="row">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <ul class="nav navbar-nav">
                  <li ><a href="{{ route('SchoolDash')}}">Home</a></li>
                  <li class="active"><a href="{{ route('enrollee')}}"><strong>Enrollees</strong></a></li>
                  <li ><a href="{{ route('facility')}}">Facility</a></li>
                  <li ><a href="{{ route('staff')}}">Staff</a></li>
                  <li ><a href="{{ route('submission_form')}}">School Form 1</a></li>
                  <li ><a href="{{ route('learner_info')}}">Enroll Learner</a></li>
                </ul>
              </div>
            </nav>
        </div>
        <div class="container">
          <div class="row">
            @foreach($levels as $level => $grades)
            <div class="col-sm-2">
              <div class="panel panel-default">
                  <div class="panel-heading">{{ $grades}}<strong></strong><p class="pull-right"><span class="badge">{{ $grade_count[$level]}} EN</span></p></div>
                  <div class="panel-body">
                    <a href="{{ URL::to('section_learners_data/'.str_replace(' ','_',$grades))}}" class="btn add"><span class="glyphicon glyphicon-eye-open"></span> <small>Show</small></a>
                  </div>
              </div>
            </div>
            @endforeach
          </div>
      </div>
</div>
<script type="text/javascript">
  $(function () {
    $("input").keypress(function (e) {
  		     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
  		               return false;
  		   		 }
  		   });
  });


</script>
@endsection
