<!DOCTYPE html>
<html>
<head>
<title>MCQ</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('/css/timer.css') }}"> -->

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="{{ asset('/js/timer.js') }}"></script>
</head>
<body>

<div class="sticky">Your time ends in : <span id="time">45:00</span> minutes!</div>
<form method="POST" id="myForm" action="">
@csrf
<div class="container mt-sm-5 my-1">
<div>
<b><h4>Multiple Choice Questions for the Subject:</h4></b>
</div>
@foreach($questions as $question)
    <div class="question ml-sm-5 pl-sm-5 pt-2" >
        <div class="py-2 h5"><b>Q.{{$question->title}}</b></div>
        @foreach($question->answer->shuffle() as $answer)
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options"> 
        <label class="options">{{$answer->answer}}
        <input type="radio" name="{{$question->id}}" value="{{$answer->id}}" name="hello"> <span class="checkmark"></span> 
        </label> 
        </div>
        @endforeach
    </div>
@endforeach
    <div class="d-flex align-items-center pt-3">
        <div class="ml-auto mr-sm-5"> <button class="btn btn-success">Submit</button> </div>
    </div>
</div>
</form>
<script>

$( document ).ready(function() {
    $.ajax('/starttime', {
    type: 'POST',  // http method
    
    success: function (data,status, xhr) {
        console.log(data);
        timer();
    },

    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  error: function (request, status, error) {
    // window.location = "https://google.com";
    }
    });

//Check if Student changes the tab
    // document.addEventListener("visibilitychange", function() {
    // if (document.hidden){
    //     window.location = "http://google.com";
    // }
    
// });


});
</script>
</body>
</html>