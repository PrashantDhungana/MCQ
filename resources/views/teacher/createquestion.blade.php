<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Questions and Answers</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
@isset(session('success'))    
  {{session('success')}}
@endisset
    <div class="container">
    <form method="POST" action="/teacher/questions">
    @csrf
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Enter Question</label>
    <textarea class="form-control" placeholder="Enter new question" rows="2" name="question"></textarea>
  </div>

  <div class="form-group">
    <label>Option A</label>
    <input type="text" class="form-control" placeholder="Enter Option A" name="ans[]">
    <div class="form-check">
      <input class="form-check-input" type="radio" name="correct" id="flexRadioDefault1" value="1" required>
      <label class="form-check-label" for="flexRadioDefault1">
      Correct?
      </label>
  </div>
  </div>

  <div class="form-group">
    <label>Option B</label>
    <input type="text" class="form-control" placeholder="Enter Option B" name="ans[]">
    <div class="form-check">
      <input class="form-check-input" type="radio" name="correct" id="flexRadioDefault1" value="2">
      <label class="form-check-label" for="flexRadioDefault1">
      Correct?
      </label>
  </div>
</div>

  <div class="form-group">
    <label>Option C</label>
    <input type="text" class="form-control" placeholder="Enter Option C" name="ans[]">
    <div class="form-check">
      <input class="form-check-input" type="radio" name="correct" id="flexRadioDefault1" value="3">
      <label class="form-check-label" for="flexRadioDefault1">
      Correct?
      </label>
  </div>
</div>

  <div class="form-group">
    <label>Option D</label>
    <input type="text" class="form-control" placeholder="Enter Option D" name="ans[]">
    <div class="form-check">
      <input class="form-check-input" type="radio" name="correct" id="flexRadioDefault1" value="4">
      <label class="form-check-label" for="flexRadioDefault1">
Correct?
      </label>
  </div>
</div>

  <button type="submit" class="btn btn-primary">Create Question</button>
    </form>
    </div>
    
</body>
</html>