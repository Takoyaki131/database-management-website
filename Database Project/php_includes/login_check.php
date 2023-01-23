<?php
	include_once 'db_connection.php';
	
	session_start();
	
	$userName = $_POST['userName'];
	$password = $_POST['password'];
	$hashedPassword = hash('sha256', $password);



	
	
	
	
	$sql_query = "SELECT * FROM users;";
	$query_result = mysqli_query($connection, $sql_query);
	
	 while ($db_row = mysqli_fetch_assoc($query_result)) {
		if ($db_row['userName'] == $userName AND $db_row['password'] == $hashedPassword) {
			header("Location: ../main.php");
			$_SESSION['loginName'] = $db_row['firstName'];
		} elseif ($db_row['userName'] != $userName AND $db_row['password'] == $hashedPassword) {
			header("Location: ../login_error.php");
		} elseif ($db_row['userName'] == $userName AND $db_row['password'] != $hashedPassword) {
			header("Location: ../login_error.php");
		}
	}
?>