<?php

include 'dbConfig.php';

$sql = "SELECT * FROM users WHERE username = '" . $_POST["username"] . "'" . " AND password = '" . $_POST["password"] . "'";
$result = $conn->query($sql);


// TODO: look at how I reduced the if statement to ternary operators
// I did variable initialization as well. Turned 4 lines to 1.
// Also change to using boolean not integers.
// Reading: https://davidwalsh.name/php-shorthand-if-else-ternary-operators
$success = 0;
if ($result->num_rows > 0) {
    $success = 1;
}

//md5 credentials encryption
// TODO: Select rank, not password.
// TODO: Store rank and username in session.
$passwordhash=md5($_POST["password"]);
$loginhash=md5("true");
$passwordhash=md5("SELECT password FROM users WHERE password = " . $_POST["password"]);
$username = $_POST["username"];
$conn->close();

//No special characters
// TODO: Error checking should be done at the very beginning.
// Don't process if there are any errors. Instant rejection.
$checkinfo = $_POST["username"] . $_POST["password"];
$specialchar1 = stripos($checkinfo, ';') !== false;
$specialchar2 = stripos($checkinfo, '"') !== false;
$specialchar3 = stripos($checkinfo, "'") !== false;
$specialchar4 = stripos($checkinfo, ".") !== false;

if ($specialchar1 || $specialchar2 || $specialchar3 || $specialchar4){
	$success = 2;
}

//Redirects to  pages
// TODO: change to use success as a boolean. For special char use another error flag.
// TODO: Once you store rank and username in session you don't have to send passward and Username
// to another page. Passing data around unnecessarily can be dangerous and should be avoided.
if ($success == 1) {
	header("Location: success.php?logintrue=$loginhash&passwordhash=$passwordhash&username=$username");
} elseif ($success == 0) {
	header("Location: index.php?login=failed");
} elseif ($success == 2) {
    header("Location: index.php?specialchar=1");
}


?>
