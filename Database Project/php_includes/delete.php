<?php
	include_once 'db_connection.php';
	
	$id = $_GET['id'];
	$sql_query = "DELETE FROM software WHERE softwareID=$id;";
	mysqli_query($connection, $sql_query);
	header("Location: ../main.php ? msg=Software deleted sucessfully");
?>