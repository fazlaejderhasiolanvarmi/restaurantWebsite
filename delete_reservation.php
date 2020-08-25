<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$name = $_POST['name'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$Date = date('Y-m-d H:i:s', strtotime($date));



$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM reservation WHERE (date = '$Date' AND name = '$name' AND phone = '$phone')";

if (mysqli_query($conn, $sql)) {
  mysqli_close($conn);
	header("Location: http://localhost/delete_reservation_success.php"); 
	exit(); 
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>