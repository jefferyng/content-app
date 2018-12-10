<?php 

//Connect to SQL

include 'dbConfig.php';

//Setup Data

if (isset($_GET["passwordhash"])) {
	$passwordhash = $_GET["passwordhash"];
}
if (isset($_GET["username"])) {
	$user = $_GET["username"];
}
if (isset($_GET["logintrue"])) {
	$logintrue = $_GET["logintrue"];
}
if (isset($user)) {
		$adminsql = $conn->query("SELECT * FROM users WHERE rank = 'admin' AND username = '$user'");
}


if(isset($_POST["delete"])){
  $deleteuser = "DELETE * FROM users WHERE username = " . $_POST["delete"];
}

//Validate data

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if (isset($_GET["logintrue"]) && $_GET["logintrue"] == md5("true") && $_GET["passwordhash"] == $passwordhash) {
	echo "<h1>Welcome, $user.</h1> ";

} else {
	if (isset($_POST["delete"])) {
	}else{
	header("Location: index.php");
}
}
if ($adminsql->num_rows > 0){
	echo "<h2>You are an admin of this site.</h2>";
}
if(isset($deleteuser)){
  $conn->query($deleteuser);
}

?>

<!-- Logout button -->

 <form>
 	<button action="header('Location: index.php');">Logout</button>
 </form>

<!-- User Delete-->

<form action="index.php"  method = "post">
	<br>Delete User:
	<input type="text" name="delete">
	<input type="submit" name="submit" value="Delete">
</form>

<!-- User List-->
<br>
<h2>User List:</h2>

 <table cellpadding="4px" cellspacing="30px">
  <tr>
  	<th>ID</th>
  	<th>Username</th>
  	<th>Password</th>
  	<th>Rank</th>
  	<th>Email</th>
  </tr>
  <?php 

   $sql = "SELECT username, password, rank, email, id FROM users";
   $result = $conn->query($sql);

if ($result->num_rows > 0) {

    //Output data of each row

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>". $row["username"]. "</td><td>". $row["password"]. "</td><td>" . $row["rank"] . "</td><td>" . $row["email"] ."</td></tr>";
    }
} else {
    echo "0 results";
}

   ?>
</table>