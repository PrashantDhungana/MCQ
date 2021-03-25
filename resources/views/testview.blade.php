 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test for old array</title>
</head>
<body>
<form method="POST" action="test">
    @csrf
@if(empty(old('field'))) 
    <input type="text" name="field[]" />
    <input type="text" name="field[]" />
    <input type="text" name="field[]" />
@endif

    <button type="button" id="add" onclick="create()">Add new text box  </button>
   
    <div id="newElementId"></div>
    
@if(old('field'))
    @foreach(old('field') as $val)
    <input type="text" name="field[]" value="{{ $val }}" />
    @endforeach
@endif

    <input type="submit" value="Submit" />
</form>
<script>
    function create(){
        var txtNewInputBox = document.createElement('div');

        txtNewInputBox.innerHTML = "<input type='text' name='field[]'>";

        document.getElementById("newElementId").appendChild(txtNewInputBox);

    }
</script>

</body>
</html>