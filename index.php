<?php 

//Changes

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app01";

$conn = new mysqli($servername, $username, $password, $dbname);
    if (isset($_GET["new"])) {
        $new = $_GET["new"];
    }

	$username="user";
	$password="password";

	//Logs In

	if(isset($_SESSION["logged_in"])&&$_SESSION["logged_in"]==true){
	} if(isset($_POST["username"])&&isset($_POST["password"])){
		if($_POST["username"]==$username&&$_POST["password"]==$password){
			$_SESSION["logged_in"]=true;header("Location success.php");
		}}

    if(isset($_POST["delete"])){
  mysqli_query($conn, "DELETE * FROM users WHERE username = " . $_POST["delete"]);
}
?>


<html>
<body>

<!-- Form -->

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
