<?php
	include 'db_connection.php';
	
	$contactName = $_POST['contactName'];
	$contactEmail = $_POST['contactEmail'];
	
	$sql_query = "INSERT INTO contacts (contactName, contactEmail) VALUES ('$contactName', '$contactEmail');";
	
	mysqli_query($connection, $sql_query);
	
	header("Location: ../main.php ? msg=New contact created sucessfully");
?>