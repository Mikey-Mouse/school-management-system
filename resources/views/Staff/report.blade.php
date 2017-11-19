
@extends('Master.layout')

@section('title')
  	Report
@endsection

@section('add_link')

@endsection

@section('nav-name')
		{{ $user->name }}
@endsection

@section('content')
  <style type="text/css">
      .img {
            position: relative;
            width:  70px;
            height: 70px;
            background-repeat:   no-repeat;
            background-size:     cover;
            }

      #comment 
      {
         border: none !important;
        overflow: auto;
        outline: none;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
      }



  </style>

<div class="container">
     <div class="row">
         <nav class="navbar navbar-default">
           <div class="container-fluid">
             <ul class="nav navbar-nav">
               <li class="#"><a href="{{ route('depEmployee')}}"><STRONG>Home</STRONG></a></li>
               <li ><a href="{{ route('account')}}">Account</a></li>
               <li class="active"><a href="{{ route('report')}}">Report</a></li>
               <li ><a href="{{ route('activity')}}">Activity List</a></li>
             </ul>
           </div>
         </nav>
     </div>
 </div>

<div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
         <?php 
         $mytime = Carbon\Carbon::now();
         echo $mytime->toDateTimeString();
          ?>
      </div>
        <div class="panel-body">
            <div id="content" >
               <form>
                <div class="row">
                      <div class="col-sm-4 col-md-4 col-sm-push-2">
                          <img src="{{ asset('img/deped2.png') }}" class="img">      
                      </div>

                      <div class="col-sm-4 col-md-4">
                           <p>&nbsp;&nbsp;&nbsp;
                            Republic of The Philippines <br> 
                            DEPARTMENT OF EDUCATION <br> 
                            &nbsp;&nbsp;&nbsp; 
                            REGION XIII (CARAGA) <br> 
                            &nbsp;&nbsp;&nbsp;DIVISION OF BUTUAN</p>
                      </div>
                      <div class="col-sm-4 col-md-4">
                          <img src="{{ asset('img/logo_deped-gray.png') }}" class="img">      
                      </div>
                </div>
                <br>
          
                <div class="form-group">
                    <textarea class="form-control" rows="50" id="comment"></textarea>
              </div>
          
            </div>
        </div>
    </div>
     <button id="create-report" class="pull-right">create report</button><br><br>
     </form>
</div>








<script>
 
$(function(){
  
/*  window.onbeforeunload = function() {

  return "Data will be lost if you leave the page, are you sure?";
  };*/





  $("textarea").keydown(function(e) {
    if(e.keyCode === 9) { // tab was pressed
        // get caret position/selection
        var start = this.selectionStart;
        var end = this.selectionEnd;

        var $this = $(this);
        var value = $this.val();

        // set textarea value to: text before caret + tab + text after caret
        $this.val(value.substring(0, start)
                    + "\t"
                    + value.substring(end));

        // put caret at right position again (add one for the tab)
        this.selectionStart = this.selectionEnd = start + 1;

        // prevent the focus lose
        e.preventDefault();
    }
});




})

</script>
@endsection
