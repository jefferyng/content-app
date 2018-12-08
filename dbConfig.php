<?php 

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app01";

$conn = new mysqli($servername, $username, $password, $dbname);
    if (isset($_GET["new"])) {
        $new = $_GET["new"];
    }

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo '<script>console.log("successful connection")</script>';
$success = 0;

 ?>