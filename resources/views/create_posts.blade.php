<!DOCTYPE html>
<html>
<head>
<title>create post</title>
</head>
<body>
<form action = "/create_posts" method = "post">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<table>
<tr>
<td>ID</td>
<td><input type='text' name='id' /></td>
<tr>
<td>TITLE</td>
<td><input type="text" name='title'/></td>
</tr>
<tr>
<td>CONTENT</td>
<td><input type="text" name='content'/></td>
</tr>
</tr>
<tr>
<input type = 'submit' value = "Add posts"/>
</td>
</tr>
</table>
</form>
</body>
</html>