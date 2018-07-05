<!DOCTYPE html>
<html>
<head>
	<title>blog sht</title>
</head>
<body>
<table>
	<tr>
		<th>id</th>
		<th>title</th>
		<th>content</th>
	</tr>
	@foreach($articles as $article)
	<tr>
		<td>{{$article->id}}</td>
		<td>{{$article->title}}</td>
		<td>{{$article->content}}</td>
	</tr>
	@endforeach
</table>
</body>
</html>