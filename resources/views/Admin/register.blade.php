
@extends('Master.adminlayout')

@section('title')

@endsection
@section('content')
	 <div class="container">
        <div class="row">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <ul class="nav navbar-nav">
                  <li><a href="#">Home</a></li>
                  <li class="active"><a href="#">Register</a></li>
                </ul>
              </div>
            </nav>
        </div>
    </div>
<div class="container">
  	<div class="row">
  		<div class="col-md-6">
  			<div class="panel panel-default">
  				<div class="panel-heading"><button class="btn btn-primary btn-xs">SCHOOL REGISTRATION FORM</button></div>
  					<div class="body">

		<form class="form-horizontal" action="{{ route('registerUser') }}" method="POST">
			<fieldset>
				<hr>
					  <div class="form-group">
					  	<label class="col-md-3 control-label" for="User Id">Username</label>
					  		<div class="col-md-8">
					  			<input id="User Id" name="username" type="text" placeholder="" class="form-control input-md" required="">
					  		</div>
					  </div>

					  <div class="form-group">
					  	<label class="col-md-3 control-label" for="User Id">Password</label>
					  		<div class="col-md-8">
					  			<input id="User Id" name="password" type="text" placeholder="" class="form-control input-md" required="">
					  		</div>
					  </div>

					   <div class="form-group">
					  	<label class="col-md-3 control-label" for="User Id">School ID</label>
					  		<div class="col-md-8">
					  			<input id="sname" name="s_id" type="text" placeholder="" class="form-control input-md" required="">
					  		</div>
					  </div>

					   <div class="form-group">
					  	<label class="col-md-3 control-label" for="User Id">School Name</label>
					  		<div class="col-md-8">
					  			<input id="sname" name="s_name" type="text" placeholder="" class="form-control input-md" required="">
					  		</div>
					  </div>


					   <div class="form-group">
					  	<label class="col-md-3 control-label" for="User Id">Address</label>
					  		<div class="col-md-8">
					  			<input id="s_add" name="sch_address" type="text" placeholder="" class="form-control input-md" required="">
					  		</div>
					  </div>

					   <div class="form-group">
					  	<label class="col-md-3 control-label" for="User Id">Administrator</label>
					  		<div class="col-md-8">
					  			<input id="administrator" name="administrator" type="text" placeholder="" class="form-control input-md" required="">
					  		</div>
					  </div>

					     <div class="form-group">
					  	<label class="col-md-3 control-label" for="User Id">Email</label>
					  		<div class="col-md-8">
					  			<input id="email" name="email" type="email" placeholder="" class="form-control input-md" required="">
					  		</div>
					  </div>


					  	<input type="text" class="hidden" name="HIDE_IDEN" value="1">

					  <div class="form-group">
					  	<label class="col-md-4 control-label" for="User Id"></label>
					  		<div class="col-md-7">
					  			{!! csrf_field() !!}
					 				<button type="submit" class="btn btn-default">Register</button>
					  		</div>
					  </div>
            @if($errors->any())
                <div class="alert alert-danger">
                  <p><strong>{{ $errors->first() }}</strong></p>
                </div>
            @endif
            @if(Session::has('flash_message'))
            <div class="alert alert-info">
              <p><strong>{{ Session::get('flash_message') }}</strong></p>
            </div>
            @endif
			</fieldset>
		</form>
	</div>
  </div>
</div>
			<div class="col-md-6">
  			<div class="panel panel-default">
  				<div class="panel-heading"><button class="btn btn-success btn-xs">STAFF REGISTRATION FORM</button></div>
  					<div class="body">

		<form class="form-horizontal" action="{{ route('registerUser')}}" method="POST">
			<fieldset>
				<hr>
					 <div class="form-group">
					 	<label class="col-md-3 control-label" for="username">Username</label>
					  		<div class="col-md-8">
					  			<input id="User Id" name="username" type="text" class="form-control input-md" required="">
					  		</div>
					 </div>

					  <div class="form-group">
					  	<label class="col-md-3 control-label" for="password">Password</label>
					  		<div class="col-md-8">
					  			<input id="User Id" name="password" type="text" class="form-control input-md" required="">
					  		</div>
					  </div>

					  <div class="form-group">
					  	<label class="col-md-3 control-label" for="name">Name : </label>
					  		<div class="col-md-8">
					  			<input id="e_name" name="e_name" type="text" class="form-control input-md" required="">
					  		</div>
					  </div>

					  <div class="form-group">
					  	<label class="col-md-3 control-label" for="address">Address</label>
					  		<div class="col-md-8">
					  			<input id="e_add" name="e_add" type="text" class="form-control input-md" required="">
					  		</div>
					  </div>

					   <div class="form-group">
					  	<label class="col-md-3 control-label" for="contact">Contact</label>
					  		<div class="col-md-8">
					  			<input id="e_con" name="e_con" type="text" class="form-control input-md" required="">
					  		</div>
					  </div>

						<div class="form-group">
						<label class="col-md-3 control-label" for="department">Department</label>
							<div class="col-md-8">
									<select class="form-control" name="gov_department_id">
										@foreach($department as $departments)
												<option value="{{ $departments->id }}">{{ $departments->department }}</option>
										@endforeach
									</select>
							</div>
					</div>

					  <input type="text" class="hidden" name="HIDE_IDEN" value="2">
							@if(Session::has('exist_dep_acc'))
							<div class="alert alert-danger">{{ Session::get('exist_dep_acc') }}</div>
							@endif
					  <div class="form-group">
					  	<label class="col-md-4 control-label" for="User Id"></label>
					  		<div class="col-md-6">
					  			{!! csrf_field() !!}
					 				<button type="submit" class="btn btn-default">Register</button>
					  		</div>
					  </div>
			</fieldset>
		</form>
	</div>
  </div>
</div>

  	</div>
<!-- end of row -->




<!-- Start of modal -->
	<div id="note_registration" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><strong>Note</strong></h4>
      </div>
      <div class="modal-body">
        <p><strong>Admin Account is running ...</strong> </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- End of modal -->



 <!-- end of container -->
</div>
 <!-- <script type="text/javascript" src="{{ asset('js/note_registration.js') }}"></script> -->
@endsection
