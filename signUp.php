<?php
include 'dbConfig.php';
 ?>

<!-- Signup Form -->

 <form style="margin-left: 10px;" method="post" action="signUpCheck.php">
   <br>
   Username:
   <br><br>
   <input type="text" name="username"><br>
   <br>Email:
   <br><br>
   <input type="Email" name="email">
   <br>
   <br>
   
   Password:
   <br><br>
   <input type="password" name="password">
   <br>
   <br>
   <input type="submit" name="signup" value="Sign Up">

 </form>
<div style="color: red;">
 <?php 

// Check and display errors

if (isset($_GET["empty"])) {
	echo "All Fields Are Required<br>";
}
if (isset($_GET["taken"])) {
	echo "Username Taken<br>";
}
if (isset($_GET["shortname"])) {
	echo "Username Must Be At Least Four Characters.<br>";
}
if (isset($_GET["shortpassword"])) {
	echo "Password Must Be At Least Seven Characters.<br>";
}
if (isset($_GET["specialchar"])) {
	echo "Do Not Use Special Characters in Username or Password.<br>";
}

 ?>
</div>