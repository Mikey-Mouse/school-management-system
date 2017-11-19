
@extends('Master.layout')

@section('title')
  	Edit Student Data
@endsection

@section('add_link')

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
                  <li><a href="{{ route('enrollee')}}"> <small> <strong><<</strong></small> <strong>Back</strong></a></li>
                  </ul>
              </div>
            </nav>
        </div>
        <div class="container">
              <div class="row">
                    <div class="col-md-6 col-sm-push-3">
                      <div class="panel panel-default">
                      <div class="panel-heading">Edit Student Information</div>
                        <div class="panel-body">
                          <form id="register_student" class="form-horizontal" action="/update_learner_information/{{ $user->id}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden"  name="grade_student_id" value="{{ $grade_user_level->id }}">
                            <div class="form-group">
                                  <label class="col-sm-3 control-label">Grade/Level</label>
                                    <div class="col-sm-4">
                                      <select class="form-control" id="sel1" name="gradelevel">
                                        <option value="{{ $grade_user_level->level_grade }}">{{ $grade_user_level->level_grade }}</option>
                                        <option value="" disabled="disabled">-------------------------------------------------------------</option>
                                        @foreach($levels as $level)
                                        <option value="{{ $level->level}}">{{ $level->level}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">LRN</label>
                                  <div class="col-sm-8">
                                      <input class="form-control" id="lrn" type="text" name="Lrn" placeholder="*" required="" value="{{ $user->Lrn}}" onCopy="return false"  onPaste="return false" autocomplete=off>
                                    </div>
                                  </div>
                            <div class="form-group">
                                  <label class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" id="focusedInput" type="text" name="name" placeholder="*" value="{{ $user->name}}">
                                    </div>
                            </div>
                            <div class="form-group">
                                  <label class="col-sm-3 control-label">Gender</label>
                                    <div class="col-sm-2">
                                      <select class="form-control" id="sel1" name="sex">
                                        @if($user->sex == 'M')
                                        <option>M</option>
                                        <option>F</option>
                                        @else
                                        <option>F</option>
                                        <option>M</option>
                                        @endif
                                      </select>
                                    </div>
                                    <label class="col-sm-2 control-label">Birthdate </label>
                                      <div class="col-sm-4">
                                        <input type="date" class="form-control" name="birthdate" value="{{ $user->birthdate}}" required="">
                                      </div>
                                  </div>
                            <div class="form-group">
                                  <label class="col-sm-3 control-label">Birth place</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" id="focusedInput" type="text" name="birth_place" placeholder="*" required="" value="{{ $user->birth_place }}">
                                    </div>
                            </div>
                            <div class="form-group">
                                  <label class="col-sm-3 control-label">Age</label>
                                    <div class="col-sm-2">
                                        <input class="form-control" id="age" id="focusedInput" type="text" name="age" value="{{ $user->age }}" placeholder="*" required=""  onCopy="return false"  onPaste="return false" autocomplete=off>
                                    </div>
                                    <label class="col-sm-2 control-label">Contact</label>
                                      <div class="col-sm-4">
                                          <input class="form-control" id="contact" type="text" name="contact" required="" value="{{ $user->contact }}" placeholder="*"  onCopy="return false"  onPaste="return false" autocomplete=off>
                                      </div>
                            </div>
                            <div class="form-group">
                                  <label class="col-sm-3 control-label">Mother tongue</label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" name="mother_tongue" required="" value="{{ $user->mother_tongue }}">
                                    </div>
                                    <label class="col-sm-1 control-label">IP </label>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control" name="ethic_group" required="" value="{{ $user->ethic_group }}">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                        <label class="col-sm-3 control-label">Religion</label>
                                          <div class="col-sm-8">
                                              <input class="form-control" id="focusedInput" type="text" name="religion" required="" value="{{ $user->religion }}">
                                          </div>
                                  </div>
                                  <div class="form-group">
                                        <label class="col-sm-3 control-label">Address</label>
                                          <div class="col-sm-8">
                                              <input class="form-control" id="focusedInput" type="text" name="address" placeholder="*" required="" value="{{  $user->address }}">
                                          </div>
                                  </div>
                                  <div class="form-group">
                                        <label class="col-sm-3 control-label">Mother name</label>
                                          <div class="col-sm-8">
                                              <input class="form-control" id="focusedInput" type="text" name="mother_name" required="" value="{{ $user->mother_name }}">
                                          </div>
                                  </div>
                                  <div class="form-group">
                                        <label class="col-sm-3 control-label">Father name</label>
                                          <div class="col-sm-8">
                                              <input class="form-control" id="focusedInput" type="text" name="father_name" required="" value="{{ $user->father_name }}">
                                          </div>
                                  </div>
                                  <div class="form-group">
                                        <label class="col-sm-3 control-label">Guardian name</label>
                                          <div class="col-sm-8">
                                              <input class="form-control" id="focusedInput" type="text" name="guardian_name" placeholder="*" required="" value="{{ $user->guardian_name }}">
                                          </div>
                                  </div>
                                <button type="submit" class="btn update pull-right">Update Data</button>
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

  @if(Session::has('clear_form'))
    alert("Updated");
  @endif

</script>
@endsection
