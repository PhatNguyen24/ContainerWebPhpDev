<?php

?>

<html>
	<head>
		<title>Advanced Web Development</title>
	</head>
	<body>
		<p style="color: black;">Login Form</p>
		<form action="Controller/checkLogin.php" method="POST">
		<a>Username:</a><input type=text name="userName" size =16>
		<a>Password:</a><input type=password name="passWord" size =16>
		<input type=submit name=submit value="Login">
		</form>
	</body>
</html>