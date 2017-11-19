
@extends('Master.layout')

@section('title')
  	Level
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
        <table id="example" class="ui celled table" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>LRN</th>
                <th>NAME</th>
                <th>GENDER</th>
                <th>AGE</th>
                <th>CONTACT</th>
                <th>created_at</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>LRN</th>
              <th>NAME</th>
              <th>GENDER</th>
              <th>AGE</th>
              <th>CONTACT</th>
              <th>created_at</th>
              <th>ACTION</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach($student_list as $list)
              <tr>
                <td>{{ $list->lrn }}</td>
                <td>{{ $list->name }}</td>
                <td>{{ $list->sex }}</td>
                <td>{{ $list->age }}</td>
                <td>{{ $list->contact }}</td>
                <td>{{ $list->created_at }}</td>
                <td>
                  <a href="{{ URL::to('edit_data/'. $list->id) }}" class="btn add"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                  <a href="{{ URL::to('delete_data/'. $list->id) }}" class="btn delete"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </td>
              </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
$(document).ready(function() {
  $('#example').DataTable();
});
</script>
@endsection
