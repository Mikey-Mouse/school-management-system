
@extends('Master.layout')

@section('title')
  	Activity List
@endsection

@section('add_link')

@endsection

@section('nav-name')
		{{ $user->name }}
@endsection

@section('content')
<style type="text/css">
    
   
</style>

<div class="container">
     <div class="row">
         <nav class="navbar navbar-default">
           <div class="container-fluid">
             <ul class="nav navbar-nav">
               <li class="#"><a href="{{ route('depEmployee') }}"><STRONG>Home</STRONG></a></li>
               <li ><a href="{{ route('account')}}">Account</a></li>
               <li ><a href="{{ route('report')}}">Report</a></li>
               <li class="active" ><a href="{{ route('activity')}}">Activity List</a></li>
             </ul>
           </div>
         </nav>
     </div>


     <div class="row">
        <div class="col-md-4">  
          <div class="panel panel-default">
            <div class="panel-heading">Create Activity </div>
              <div class="panel-body">   
                   <form action="{{ route('create_activity')}}" method="post" id="activity_create">
                      <div class="form-group">
                      <label for="usr">Activity :</label>
                      <input type="text" class="form-control" id="activity" name="activity">
                    </div>
                     <div class="form-group">
                      <label for="usr">Location :</label>
                      <input type="text" class="form-control" id="location" name="location">
                    </div>
                     <div class="form-group">
                      <label for="usr">Date :</label>
                      <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="form-group">
                      <label for="description">Description :</label>
                      <textarea maxlength="10000" class="form-control" rows="5" id="description" name="description"></textarea>
                  </div>
                  {{ csrf_field() }}
                  <button> Create </button>
                   </form> <br>
                    @if($errors->any())
                      <div class="alert danger">All fields is required </div>
                    @endif

                    @if(Session::has('activity_success'))
                        <div class="alert success">ACTIVITY SUCCESSFULLY CREATED</div>
                    @endif
              </div>
          </div>
        </div>
        <div class="col-md-8">        
              <table class="table table-hover ">
                <thead>
                   <tr>
                      <th>Title</th>
                      <th>Action</th>
                   </tr>
              </thead>
              <tbody>     
                  <tr>
                  <td>asaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                   <td><button class="update btn-xs">veiw</button></td>
                  </tr>
             </tbody>
          </table>
        </div>
     </div>
 </div>
 <script type="text/javascript">
    $(function() {
        @if (!Session::has('activity_success'))
          $('#activity_create')[0].reset(); 
        @endif
    })
 </script>
@endsection
