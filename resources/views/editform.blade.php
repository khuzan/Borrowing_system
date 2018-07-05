<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="content">
        <div class="container">
           <h2>Inline form</h2>
        <form class="form-inline" action="/table/{{$article->id}}" method="POST">
         {{ csrf_field() }}
         @method('PUT')
         <div class="form-group">
         	<label for="text">Email:</label>
         	<input type="text" class="form-control" id="text" placeholder="Enter email" name="title" value="{{$article->title}}">
         </div>
         <div class="form-group">
          	<label for="pwd">Password:</label>
         	<input type="text" class="form-control" id="pwd" placeholder="Enter password" name="content" value="{{$article->content}}">
         </div>
           	<div class="checkbox">
            	<label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
         </form>
        </div>

    </div>
</body>
</html>