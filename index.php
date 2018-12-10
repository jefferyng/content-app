<?php

include 'dbConfig.php';

	//Logs In

	if(isset($_SESSION["logged_in"])&&$_SESSION["logged_in"]==true&&(isset($_POST["username"])&&isset($_POST["password"])&&$_POST["username"]==$username&&$_POST["password"]==$password)){
		$_SESSION["logged_in"]=true;header("Location success.php");
	}
  //Checks if account deleted and redirected from Admin success.php
    if(isset($_POST["delete"])){
  mysqli_query($conn, "DELETE * FROM users WHERE username = " . $_POST["delete"]);

}

//Displays Errors

if (isset($_GET["login"]) && $_GET["login"] == 0) {
		echo "document.getElementById('error').innerHTML = 'Username or Password Incorrect';";
} elseif (!empty($_GET["specialchar"])) {
		echo "document.getElementById('error').innerHTML = 'Username or Password COntains Special Characters';";
} elseif (!empty($new)) {
		echo "document.getElementById('error').innerHTML = 'Login With Your New Account';";
}

?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

<!-- Form -->
<form method="post" action="loginCheck.php" class="loginmargin">
Username:
<input type="text" name="username" class="loginmargin">
Password:
<input type="password" name="password" class="loginmargin">
<input type="submit" value="Login" class="loginmargin">
</form>

<div id="red">
<p id="error"></p>
</div>
<br>
Don't have an account?
<a href="signUp.php">Sign Up Here</a>
</body>
</html>
