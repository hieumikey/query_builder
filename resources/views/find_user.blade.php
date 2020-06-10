<html>
<form action="/find" method="post">
@csrf
User_id: <input type="text" name="id"></br>
Name: <input type="text" name="name"></br>
Class: <input type="text" name="class"></br>
<input type="submit" value="find">
</form>
</html>