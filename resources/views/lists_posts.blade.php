<!DOCTPE html>
<html>
<head>
<title>View POSTS Records</title>
</head>
<body>
<table border = "1">
<tr>
<td>ID</td>
<td>TITLE</td>
<td>CONTENT</td>
<td>DELETE</td>
<td>UPDATE</td>
</tr>
@foreach ($posts as $post)
<tr>
<td>{{ $post->id }}</td>
<td>{{ $post->title }}</td>
<td>{{ $post->content }}</td>
<td><a href = 'delete/{{ $post->id }}'>Delete</a></td>
<td><a href = 'update/{{ $post->id }}'>Update</a></td>
</tr>
@endforeach
<a href = 'comment/{{ $post->id }}'>View Comments</a>
</table>
<a href = '/logout'>Log out</a>
</body>
</html>