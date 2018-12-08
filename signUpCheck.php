<?php

//Connect to SQL

include 'dbConfig.php';

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$rank = "member"; 
$char = 0;

$result = ($conn->query("SELECT * FROM users
WHERE username = '" . "$username" . "'"));

//No special characters


$checkinfo = $username . $password;
$specialchar1 = stripos($checkinfo, ';') !== false;
$specialchar2 = stripos($checkinfo, '"') !== false;
$specialchar3 = stripos($checkinfo, "'") !== false;

if ($specialchar1 == true || $specialchar2 == true || $specialchar3 == true){
	$char = 1;
}
if (stripos($checkinfo, ';')){
	header("Location: signUp.php?specialchar=1");
} else{

//Short credentials

  if (strlen($_POST["username"]) < 4) {
    	header("Location: signUp.php?shortname=1");
  } elseif (strlen($_POST["password"]) < 6) {
	header("Location: signUp.php?shortpassword=1");
  } else {

  //If username taken

    if ($result->num_rows > 0) {
    header("Location: signUp.php?taken=1");
    } elseif (!empty($username) && !empty($password) && !empty($email)) {

        //Setup SQL

  	    $sql = "INSERT INTO users (username, password, email, rank)
        VALUES ('$username', '$password', '$email', '$rank'";

	    if ($conn->query($sql) === TRUE) {

          //Account created

          sleep(1);
          header("Location: index.php?new=1");

        } else {

           //Catch SQL connection error

           echo "Error: " . $sql . "<br>" . $conn->error;
        }

      } else {

       //Empty field

        header("Location: signUp.php?empty=true");
    }

}
}
$conn->close();

var_dump($specialchar1);
var_dump($specialchar1);
var_dump($specialchar1);
var_dump($char);

?>