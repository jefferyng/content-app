<?php

// Connects to SQL server app01
// TODO: The set up for DB connection string shouldn't appear in every file
// The connection open/check/error code should be put in to a single file (dbConfig.php)
// and php included with every file that needs it.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app01";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo '<script>console.log("successful connection")</script>';
$success = 0;

$sql = "SELECT * FROM users WHERE username = '" . $_POST["username"] . "'" . " AND password = '" . $_POST["password"] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $success = 1;
}

//md5 credentials encryption

$passwordhash=md5($_POST["password"]);
$loginhash=md5("true");
$passwordhash=md5("SELECT password FROM users WHERE password = " . $_POST["password"]);
$username = $_POST["username"];
$conn->close();

//No special characters

$checkinfo = $_POST["username"] . $_POST["password"];
$specialchar1 = stripos($checkinfo, ';') !== false;
$specialchar2 = stripos($checkinfo, '"') !== false;
$specialchar3 = stripos($checkinfo, "'") !== false;
$specialchar4 = stripos($checkinfo, ".") !== false;

if ($specialchar1 || $specialchar2 || $specialchar3 || $specialchar4){
	$success = 2;
}

//Redirects to  pages

if ($success == 1) {
	header("Location: success.php?logintrue=$loginhash&passwordhash=$passwordhash&username=$username");
} elseif ($success == 0) {
	header("Location: index.php?login=failed");
} elseif ($success == 2) {
    header("Location: index.php?specialchar=1");
}


?>
