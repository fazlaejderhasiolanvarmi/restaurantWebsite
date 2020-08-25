<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$name = $_POST['name'];
$mail = $_POST['mail'];
$message = $_POST['message'];


$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO contact(name, mail, message) VALUES ('$name', '$mail', '$message')";

if (mysqli_query($conn, $sql)) {
  mysqli_close($conn);
	header("Location: http://localhost/contact_success.php"); 
	exit(); 
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>