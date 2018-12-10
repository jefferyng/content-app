<?php

// TODO: Should this be here or in individual files that actually need to use session.
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app01";

$conn = new mysqli($servername, $username, $password, $dbname);

// TODO: Where is this used?
if (isset($_GET["new"])) {
    $new = $_GET["new"];
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo '<script>console.log("successful connection")</script>';

 ?>
