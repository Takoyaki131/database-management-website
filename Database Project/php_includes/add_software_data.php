<?php
	include 'db_connection.php';
	
	$softwareName = $_POST['softwareName'];
	$contacts = $_POST['contacts'];
	$cost = $_POST['cost'];
	$renewalType = $_POST['renewalType'];
	$paymentDate = $_POST['paymentDate'];
	$renewalDate = $_POST['renewalDate'];
	$notes = $_POST['notes'];
	$active_answer = $_POST['active'];
	
	if ($active_answer == "Yes") {
		$active = true;
	} elseif ($active_answer == "No") {
		$active = false;
	}
	
	$contact_query = "SELECT * FROM contacts;";
	$contact_result = mysqli_query($connection, $contact_query);
	
	while ($contact_row = mysqli_fetch_assoc($contact_result)) {
		if ($contact_row['contactName'] == $contacts) {
			$contact = $contact_row['contactID'];
		}
	}	
	
	$sql_query = "INSERT INTO software (softwareName, contact, cost, renewalType, paymentDate, renewalDate, notes, active) VALUES ('$softwareName', '$contact', '$cost', '$renewalType', '$paymentDate', '$renewalDate', '$notes', '$active')";
	
	$results = mysqli_query($connection, $sql_query);
	if($results){
		header("Location: ../main.php ? msg=New software created sucessfully");


	}
	else{
		echo"Failed:  " . mysqli_error($connection);
	}

	
?>