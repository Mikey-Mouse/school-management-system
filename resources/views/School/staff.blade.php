
@extends('Master.layout')

@section('title')
Staff
@endsection

@section('add_link')
<link rel="stylesheet" href="{{ asset('css/dataTables.semanticui.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="{{ asset('css/semantic.min.css')}}">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.js"></script>
@endsection

@section('nav-name')
	{{ $info->school_name }}
@endsection
@section('content')
<style>
#getWidth {
  width: 100%;
}
  </style>
<div class="container">
        <div class="row">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <ul class="nav navbar-nav">
                  <li ><a href="{{ route('SchoolDash')}} ">Home</a></li>
                  <li ><a href="{{ route('enrollee')}}">Enrollees</a></li>
                  <li ><a href="{{ route('facility')}}">Facility</a></li>
                  <li class="active"><a href="{{ route('staff')}}"><strong>Staff</strong></a></li>
                  <li ><a href="{{ route('submission_form')}}">School Form 1</a></li>
									<li ><a href="{{ route('learner_info')}}">Enroll Learner</a></li>
                </ul>
              </div>
            </nav>
        </div>
        <div class="container" id="getWidth">
            <form id="insert_staff" action="{{ route('insert_staff')}}" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Ex. John Cena" style="width:100%" required="">
                  </div>
									<div class="form-group">
	  											<label for="sel1">STAFF</label>
												<select class="form-control" id="sel1" name="staff" required="">
													    <option>TEACHING STAFF</option>
													    <option>NON-TEACHING STAFF</option>
												</select>
									</div>
											{{ csrf_field() }}
                      <button class="btn add">Add Personnel</button>
            </form><br>

							<div class="hide" id="personnel"> New Personnel Inserted </div>

						<table id="example" class="display" cellspacing="0" width="100%">
				        <thead>
				            <tr>
												<th>GEN ID</th>
				                <th>Name</th>
				                <th>Postion</th>
				                <th>Date</th>
				                <th>Action</th>
				            </tr>
				        </thead>
				        <tfoot>
				            <tr>
											<th>GEN ID</th>
											<th>Name</th>
											<th>Postion</th>
											<th>Date</th>
											<th>Action</th>
				            </tr>
				        </tfoot>
				        <tbody>
									@foreach($staff as $staffs)
									<tr>
										<td><small>DPD{{ $staffs->school_id }}BTN</small></td>
										<td>{{ $staffs->name }}</td>
										<td>{{ $staffs->staff }}</td>
										<td>{{ $staffs->created_at->diffForHumans() }}</td>
										<td>
											<a href="{{ URL::to('editStaff/'. $staffs->id) }}" class="btn add"><span class="glyphicon glyphicon-edit"></span> Edit</a>
											<a href="{{ URL::to('deleteStaff/'. $staffs->id) }}" class="btn delete"><span class="glyphicon glyphicon-trash"></span> Delete</a>
										</td>
									</tr>
									@endforeach
				        </tbody>
	    </table><br>
				@if(Session::has('EditStaff'))
						<div class="alert info"> EDIT STAFF</div>
									<form action="{{ route('update_staff')}}" method="post">
										<input type="text" name="up_id" class="form-control" placeholder="" value="{{ Session::get('EditStaff') }}" hidden="">
													<div class="form-group">
															<label for="exampleInputEmail1">Update Name</label>
																	<input type="text" name="up_name" class="form-control" placeholder="" value="">
												</div>
												<div class="form-group">
															<label for="sel1">STAFF</label>
																	<select class="form-control" id="sel1" name="up_staff">
																			<option>TEACHING STAFF</option>
																			<option>NON-TEACHING STAFF</option>
																	</select>
												</div>
														{{ csrf_field() }}
														<button class="btn add">Update</button>
									</form>
				@endif
  </div>


</div>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});

@if(Session::has('Insert_Personnel'))
		$('#personnel').removeClass('hide').addClass('alert success').html;
@else
		$('#insert_staff')[0].reset();
@endif
</script>
@endsection
