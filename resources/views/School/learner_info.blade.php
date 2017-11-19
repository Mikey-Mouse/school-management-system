
@extends('Master.layout')

@section('title')
  	Enrollee
@endsection

@section('nav-name')
	{{ $info->school_name }}
@endsection
@section('content')
<div class="container">
        <div class="row">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <ul class="nav navbar-nav">
                  <li ><a href="{{ route('SchoolDash')}}">Home</a></li>
                  <li ><a href="{{ route('enrollee')}}"><strong>Enrollees</strong></a></li>
                  <li ><a href="{{ route('facility')}}">Facility</a></li>
                  <li ><a href="{{ route('staff')}}">Staff</a></li>
                  <li ><a href="{{ route('submission_form')}}">School Form 1</a></li>
                  <li class="active"><a href="{{ route('learner_info')}}">Enroll Learner</a></li>
                </ul>
              </div>
            </nav>
        </div>
<div class="container">
      <div class="row">
            <div class="col-md-6 col-sm-push-3">
              <div class="panel panel-default">
              <div class="panel-heading">Student Information</div>
                <div class="panel-body">
                  <form id="register_student" class="form-horizontal" action="{{ route('learner_information') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                          <label class="col-sm-3 control-label">Grade/Level</label>
                            <div class="col-sm-4">
                              <select class="form-control" id="sel1" name="gradelevel">
                                @foreach($levels as $level)
                                <option value="{{ $level->level}}">{{ $level->level}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">LRN</label>
                          <div class="col-sm-8">
                              <input class="form-control" id="lrn" type="text" name="Lrn" placeholder="*" required="">
                            </div>
                          </div>
                    <div class="form-group">
                          <label class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-8">
                                <input class="form-control" id="focusedInput" type="text" name="name" placeholder="*" required="">
                            </div>
                    </div>
                    <div class="form-group">
                          <label class="col-sm-3 control-label">Gender</label>
                            <div class="col-sm-2">
                              <select class="form-control" id="sel1" name="sex">
                                   <option>M</option>
                                   <option>F</option>
                              </select>
                            </div>
                            <label class="col-sm-2 control-label">Birthdate </label>
                              <div class="col-sm-4">
                                <input type="date" class="form-control" name="birthdate" value="" required="">
                              </div>
                          </div>
                    <div class="form-group">
                          <label class="col-sm-3 control-label">Birth place</label>
                            <div class="col-sm-8">
                                <input class="form-control" id="focusedInput" type="text" name="birth_place" placeholder="*" required="">
                            </div>
                    </div>
                    <div class="form-group">
                          <label class="col-sm-3 control-label">Age</label>
                            <div class="col-sm-2">
                                <input class="form-control" id="age" id="focusedInput" type="text" name="age" placeholder="*" required=""  onCopy="return false"  onPaste="return false" autocomplete=off>
                            </div>
                            <label class="col-sm-2 control-label">Contact</label>
                              <div class="col-sm-4">
                                  <input class="form-control" id="contact" type="text" name="contact" required="" placeholder="*"  onCopy="return false"  onPaste="return false" autocomplete=off>
                              </div>
                    </div>
                    <div class="form-group">
                          <label class="col-sm-3 control-label">Mother tongue</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="mother_tongue" required="">
                            </div>
                            <label class="col-sm-1 control-label">IP </label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" name="ethic_group" required="">
                              </div>
                          </div>
                          <div class="form-group">
                                <label class="col-sm-3 control-label">Religion</label>
                                  <div class="col-sm-8">
                                      <input class="form-control" id="focusedInput" type="text" name="religion" required="">
                                  </div>
                          </div>
                          <div class="form-group">
                                <label class="col-sm-3 control-label">Address</label>
                                  <div class="col-sm-8">
                                      <input class="form-control" id="focusedInput" type="text" name="address" placeholder="*" required="">
                                  </div>
                          </div>
                          <div class="form-group">
                                <label class="col-sm-3 control-label">Mother name</label>
                                  <div class="col-sm-8">
                                      <input class="form-control" id="focusedInput" type="text" name="mother_name" required="">
                                  </div>
                          </div>
                          <div class="form-group">
                                <label class="col-sm-3 control-label">Father name</label>
                                  <div class="col-sm-8">
                                      <input class="form-control" id="focusedInput" type="text" name="father_name" required="">
                                  </div>
                          </div>
                          <div class="form-group">
                                <label class="col-sm-3 control-label">Guardian name</label>
                                  <div class="col-sm-8">
                                      <input class="form-control" id="focusedInput" type="text" name="guardian_name" placeholder="*" required="">
                                  </div>
                          </div>
                          @if($errors->any())
                            <div class="alert danger">
                                @foreach($errors->all() as $error)
                                  <p><small><strong> {{ $error }} </strong></small></p>
                                @endforeach
                            </div>
                          @endif
                        <button type="submit" class="btn add pull-right">Submit</button>
                  </form>
                </div>
            </div>
            </div>
      </div>
</div>
<script type="text/javascript">

  $(function() {
    $("#lrn,#age,#contact").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                  return false;
          }
      });
  });

  @if(Session::has('school_students'))
  alert("Successfully Enrolled");
  @else
    $('#register_student')[0].reset();
  @endif

</script>
@endsection
