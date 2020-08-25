<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$name = $_POST['name'];
$phone = $_POST['phone'];
$people = $_POST['people'];
$date = $_POST['date'];
$dbInsertDate = date('Y-m-d H:i:s', strtotime($date)); 
$message = $_POST['message'];



$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO reservation(name, phone, people, date, message) VALUES ('$name', '$phone', '$people', '$dbInsertDate', '$message')";

if (mysqli_query($conn, $sql)) {
	mysqli_close($conn);
	header("Location: http://localhost/reservation_success.php"); 
	exit();
  
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>