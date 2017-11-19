
@extends('Master.layout')
@section('title')
	Submission Form
@endsection

@section('add_link')
@endsection

@section('nav-name')
	{{ $info->school_name }}
@endsection
@section('content')

<style>

#fonts { color: black; font-size: 11px; font-weight: bold; height:150px; overflow:auto; margin: auto;}
#add { margin-left: 40%; }
#getWidth { width: 60%; }
textarea:focus, input:focus { outline: none; }
.textredius { border: none }
#addLeft { margin-left: 20px; }
.modal-dialog { width: 70%; margin: auto; margin-top: 30px; }
.addSTD{ height: 30px; width: auto; background: none ; border: none; border-bottom: 2px solid #3C3741;}
th { background: #F0F1F5 !important; color: black; }

table {
	color: black !important;
	word-wrap: break-word;
	font-size: 10.5px;
	overflow-x: 100px;

}


</style>
<div class="container">
        <div class="row">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <ul class="nav navbar-nav">
                  <li ><a href="{{ route('SchoolDash')}}">Home</a></li>
                  <li ><a href="{{ route('enrollee')}}">Enrollees</a></li>
                  <li ><a href="{{ route('facility')}}">Facility</a></li>
                  <li ><a href="{{ route('staff')}}">Staff</a></li>
                  <li class="active"><a href="{{ route('submission_form')}}">School Form 1</a></li>
									<li ><a href="{{ route('learner_info')}}">Enroll Learner</a></li>
                </ul>
              </div>
            </nav>
        </div>
</div>
<div class="container-fluid">
	<center><strong>School Form 1 (SF1) School Register</strong><br>
					<div class="row">
							<div class="col-sm-2 col-sm-push-5">
								<label for="">Form Level</label>
								<select class="form-control" id="gradelevel">
											<option value="" selected disabled hidden>-----------------------------------</option>
											@foreach($levels as $level)
											<option>{{ $level->level}}</option>
											@endforeach
									</select>
							</div>
					</div>
	</center><hr>
			<form class="form-horizontal">
					<div class="form-group">
							<label class="col-sm-1 control-label">SCHOOL-ID</label>
									<div class="col-sm-2">
											<input class="form-control" id="focusedInput" type="text" placeholder="School Id" value="{{ $info->school_cen_id }}" readonly="">
									</div>
									<label class="col-sm-1 control-label">REGION</label>
											<div class="col-sm-1">
													<input class="form-control" id="focusedInput" type="text" value="XIII" readonly="">
											</div>
									<label class="col-sm-2 control-label">DIVISION</label>
											<div class="col-sm-2">
													<input class="form-control" id="focusedInput" type="text" placeholder="School Id" value="{{ $school->division}}" readonly="">
											</div>
											<label class="col-sm-1 control-label">DISTRICT</label>
													<div class="col-sm-2">
															<input class="form-control" id="focusedInput" type="text" placeholder="School Id" value="{{ $school->district}}" readonly="">
													</div>
					</div>
					<div class="form-group">
							<label class="col-sm-1 control-label">NAME</label>
									<div class="col-sm-4">
											<input class="form-control" id="focusedInput" type="text" placeholder="School Id" value="{{ $info->school_name }}" readonly="">
									</div>
									<label class="col-sm-1 control-label">S.Y</label>
											<div class="col-sm-2">
													<input class="form-control" id="focusedInput" type="text" placeholder="School Id" value="2017-2018" readonly="">
											</div>
											<label class="col-sm-1 control-label">GRADE</label>
													<div class="col-sm-2">
															<input type="text" name="grade" id="grade" class="form-control" value="Nursery I" readonly="">
															</div>
											</div>
												<table class="table table-bordered  table-striped table-hover" id="fonts">
												<thead>
													<tr>
														<th>LRN</th>
														<th>Name</th>
														<th>Sex</th>
														<th>Birhdate</th>
														<th>Age</th>
														<th>Birth of place</th>
														<th>Mother Tongue</th>
														<th>ETC GRP</th>
														<th>Religion</th>
														<th>Address <small>(Street/Barangay/City/Province)</small></th>
														<th>Mother Name</th>
														<th>Father Name</th>
														<th>Guardian Name</th>
														<th>Contact</th>
												 </tr>
										 </thead>
											<tbody>
											</tbody>
									</table>
								</form>

</div>
<script>
$(document).ready(function() {
	  $('#example').DataTable();
	});
		$('#gradelevel').change('click',function(e) {
				e.preventDefault();
				$('#grade, #gradeLevel').val($(this).val());
				$("#fonts > tbody").html("");
						$.ajax({
							url: "getRequest",
							type: 'post',
							data :{gradelevel:$(this).val()},
							dataType: 'json',
							success: function(data){
							for (prop in data) {
							//	console.log(data[prop].lrn + " -> " + data[prop].name);
							$("#fonts tbody").append(
									"<tr>"
										+"<td>"+data[prop].lrn+"</td>"
										+"<td>"+data[prop].name+"</td>"
										+"<td>"+data[prop].sex+"</td>"
										+"<td>"+data[prop].birthdate+"</td>"
										+"<td>"+data[prop].age+"</td>"
										+"<td>"+data[prop].birth_place+"</td>"
										+"<td>"+data[prop].mother_tongue+"</td>"
										+"<td>"+data[prop].ethic_group+"</td>"
										+"<td>"+data[prop].religion+"</td>"
										+"<td>"+data[prop].address+"</td>"
										+"<td>"+data[prop].mother_name+"</td>"
										+"<td>"+data[prop].father_name+"</td>"
										+"<td>"+data[prop].guardian_name+"</td>"
										+"<td>"+data[prop].contact+"</td>"
									+"</tr>")
							}
						}
				});

});
</script>
@endsection
