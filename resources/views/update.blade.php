<!DOCTYPE html>
<html>
<head>
<title>POST | Edit</title>
</head>
<body>
<form action = "/update/<?php echo $posts[0]->id; //posts[0] is object post?>" method = "post"> 
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
ID:<?php echo $posts[0]->id; ?>
<table>
<tr>
<td>TITLE</td>
<td>
<input type = 'text' name = 'title'
value = '<?php echo$posts[0]->title; ?>'/> </td>
</tr>
<tr>
<td>Content</td>
<td>
<input type = 'text' name = 'content'
value = '<?php echo$posts[0]->content; ?>'/>
</td>
</tr>
<tr>
<td colspan = '2'>
<input type = 'submit' value = "Update post" />
</td>
</tr>
</table>
</form>
</body>
</html>