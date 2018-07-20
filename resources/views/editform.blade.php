<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="content">
        <div class="container">
           <h2>Inline form</h2>
        <form class="form-inline" action="/create/{{$borrowers->id}}" method="POST">
         {{ csrf_field() }}
         @method('PUT')
         <div class="form-group">
         	<label for="text">Email:</label>
         	<input type="text" class="form-control" id="text" placeholder="Enter email" name="name" value="{{$borrowers->name}}">
         </div>
            <button type="submit" class="btn btn-default">Submit</button>
         </form>
        </div>

    </div>
</body>
</html>