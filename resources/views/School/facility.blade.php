
@extends('Master.layout')

@section('title')
Enrollees
@endsection

@section('nav-name')
	{{ $info->school_name }}
@endsection
@section('content')
<style>
  th {
  background-color: #25373D;
	color: white;
	height: 40px;
}

text {
  margin: auto;
}

td {
	font-weight: bold;
}

input[type='text']{  }
</style>


<div class="container">
        <div class="row">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <ul class="nav navbar-nav">
                  <li ><a href="{{ route('SchoolDash')}}">Home</a></li>
                  <li ><a href="{{ route('enrollee')}}">Enrollees</a></li>
                  <li class="active"><a href="{{ route('facility')}}"><strong>Facility</strong></a></li>
                  <li ><a href="{{ route('staff')}}">Staff</a></li>
                  <li ><a href="{{ route('submission_form')}}">School Form 1</a></li>
									<li ><a href="{{ route('learner_info')}}">Enroll Learner</a></li>
                </ul>
              </div>
            </nav>
        </div>
				<div class="container">
					<div class="row">
							<div class="col-md-12">
									<div class="panel panel-default">
											<div class="panel-heading"></div>
													<div class="panel-body">
																<form class="form-horizontal" action='{{ route('facility')}}' method="post">
																			<table class="table">
																						 <thead>
																							 <tr>
																								 <th>Facility</th>
																								 <th>Description</th>
																								 <th>No.</th>
																							 </tr>
																						 </thead>
																						 <tbody>
																							 <tr>
																								 <td> Classrooms</td>
																								 <td> School Rooms for the Entire building
																								  </td>
																									<td><input type="text" name="classroom" placeholder="N/A" class="form-control" value="{{ $facilities->classroom }}" onCopy="return false"  onPaste="return false" autocomplete=off></td>
																							 </tr>
																							 <tr>
																								<td> Library</td>
																								<td>  Sources of information and similar resources, <br>
																									made accessible to a defined community for reference or borrowing
																								 </td>
																								 <td><input type="text" name="library" placeholder="N/A" class="form-control" value="{{ $facilities->library }}" onCopy="return false"  onPaste="return false" autocomplete=off></td>
																							</tr>

																							 <tr>
																								 <td> Chairs</td>
																								 <td> Supported most often by four legs and have a back
																								  </td>
																									<td><input type="text" name="chairs" placeholder="N/A" class="form-control" value="{{ $facilities->chairs }}" onCopy="return false"  onPaste="return false" autocomplete=off></td>
																							 </tr>
																							 <tr>
																								 <td> ICT Room</td>
																								 <td> Space which provides computer services to a defined community
																								  </td>
																									<td><input type="text" name="ictroom" placeholder="N/A" class="form-control" value="{{ $facilities->ict }}" onCopy="return false"  onPaste="return false" autocomplete=off></td>
																							 </tr>
																							 <tr>
																								 <td> Male Toilet</td>
																								 <td> Toilet for male
																								  </td>
																									<td><input type="text" name="male" placeholder="N/A" class="form-control" value="{{ $facilities->maletoilet }}" onCopy="return false"  onPaste="return false" autocomplete=off></td>
																							 </tr>
																							 <tr>
																								 <td> Female Toilet</td>
																								 <td> Toilet for female
																								  </td>
																									<td><input type="text" name="female" placeholder="N/A" class="form-control" value="{{ $facilities->femaletoilet }}" onCopy="return false"  onPaste="return false" autocomplete=off></td>
																							 </tr>
																							 <tr>
																								 <td> Textbooks</td>
																								 <td> Total number of textbooks
																								  </td>
																									<td><input type="text" name="textbooks" placeholder="N/A" class="form-control"value="{{ $facilities->textbooks }}" onCopy="return false"  onPaste="return false" autocomplete=off></td>
																							 </tr>
																						 </tbody>
																			</table>
																						@if($errors->any())
																							<div class="alert danger">
																									@foreach($errors->all() as $error)
																										<p><small><strong> {{ $error }} </strong></small></p>
																									@endforeach
																							</div>
																						@endif
																			{{ csrf_field() }}
																			<button type="submit" class="btn info pull-right">Update School Facility</button>


																</form>
													</div>
									</div>
							</div>
					</div>
				</div>
</div>
<script>

$(function () {

	$("input").keypress(function (e) {
		     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
		               return false;
		   		 }
		   });
});
</script>
@endsection
