<!DOCTPE html>
<html>
<head>
<title>Comment</title>
</head>
<body>
<h1>DETAIL</h1>
<table border = "1">
<tr>
<td>TITLE</td>
<td>CONTENT</td>
<td>COMMENT</td>

</tr>
@foreach ($data as $val)
<tr>
<td>{{ $val->title }}</td>
<td>{{ $val->content }}</td>
<td>{{ $val->content_comment }}</td>
</tr>
@endforeach
</table>
</body>
</html>