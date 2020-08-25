<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$name = $_POST['name'];
$phone = $_POST['phone'];
$people = $_POST['people'];

$olddate = $_POST['olddate'];
$oldDate = date('Y-m-d H:i:s', strtotime($olddate));

$newdate = $_POST['newdate'];
$newDate = date('Y-m-d H:i:s', strtotime($newdate));

$message = $_POST['message'];



$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE reservation SET people = '$people', date = '$newDate', message = '$message' WHERE (name = '$name' AND phone = '$phone' AND date = '$oldDate')";

if (mysqli_query($conn, $sql)) {
	mysqli_close($conn);
	header("Location: http://localhost/update_reservation_success.php"); 
	exit();  
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>