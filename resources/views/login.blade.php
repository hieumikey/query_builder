<html>
<h1>Login</h1> <br>
<form action="/goto" method="post">
@csrf
Username: <input type="text" name="username"><br>
Password: <input type="password" name="password"><br>
<button>Login</button>
</form>
</html>
