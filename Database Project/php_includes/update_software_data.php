<?php
	include 'db_connection.php';
	
	session_start();
	$software_values['softwareID'] = $_SESSION['idNumber'];
	$id = $software_values['softwareID'];
	
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
	
	$sql_query = "
	UPDATE software
	SET softwareName = '$softwareName', contact = '$contact', cost = '$cost', renewalType = '$renewalType', paymentDate = '$paymentDate', renewalDate = '$renewalDate', notes = '$notes', active = '$active'
	WHERE softwareID = '$id';
	";
	
$result=mysqli_query($connection, $sql_query);
if($result){
	header("Location: ../main.php ? msg= Software data updated sucessfully");


}
else{
	echo"Failed:  " . mysqli_error($connection);
}

	
?>