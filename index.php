<?php

include 'dbConfig.php';

	//Logs In
  // TODO: What does all this do?
	// TODO: This can all be reduced to one if statement probably
	if(isset($_SESSION["logged_in"])&&$_SESSION["logged_in"]==true){
	} if(isset($_POST["username"])&&isset($_POST["password"])){
		if($_POST["username"]==$username&&$_POST["password"]==$password){
			$_SESSION["logged_in"]=true;header("Location success.php");
		}}

  // TODO: Why is this here?
    if(isset($_POST["delete"])){
  mysqli_query($conn, "DELETE * FROM users WHERE username = " . $_POST["delete"]);
}
?>
<html>
<body>

<!-- Form -->
<!-- // TODO: Don't use br and inline styles, start an css file. -->
<form method="post" action="loginCheck.php" style="margin-left: 10px;"><br>
Username:<br><br>
<input type="text" name="username"><br><br>
Password:<br><br>
<input type="password" name="password"><br><br>
<input type="submit" value="Login">
</form>

<div style="color:red;">
<?php

//Displays Errors
// TODO: Move the php to the top of the page. Try to keep as much of the php
// logic in one place. Set flags and variables use them to decide what to display.

// TODO: Use && to make one if statement
if (isset($_GET["login"])) {
	if ($_GET["login"] == 0) {
	echo "Username or Password Incorrect";
    }
}
if (!empty($new)) {
	echo "<br>Login With Your New Username and Password.<br>";
}
if (!empty($_GET["specialchar"])) {
	echo "<br>Username and/or Password Contains Special Characters.<br>";
}
?>
</div>
<br>
Don't have an account?
<a href="signUp.php">Sign Up Here</a>
</body>
</html>
