<?php
	include_once 'php_includes/db_connection.php';
	
	session_start();
	if (array_key_exists('softwareName', $_SESSION)) {
		$db_row['firstName'] = $_SESSION['softwareName'];
	} else {
		header("Location: index.php");
	}
	
	$software_values = $_GET['values'];
	$_SESSION['idNumber'] = $software_values['softwareID'];
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
	<!-- Font Awesome -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
	 integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	 <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>	
	<script src="https://kit.fontawesome.com/71826afc16.js" crossorigin="anonymous"></script>
    <title>Update Software</title>
  </head>
  <body style="background:#eee">
  
	<div><nav class="navbar navbar-light justify-content-center fs-3 mb-3" style="background-color:darkred;color:white;margin:2px">		
		<h2>Software Update Form</h2>
		</nav>
	</div>	

	<section> &nbsp;&nbsp;&nbsp;

		<a href="main.php"><button type="button" class="btn btn-warning"><i class="fa-solid fa-left-long" ></button></i></a>&nbsp;&nbsp;
        <a href="add_software_form.php" class="btn btn-secondary">Add software</a>
		<a href="add_contact_form.php"class="btn btn-success">Add contact</a>&nbsp;
		<a  href="main.php?name=logout " class="btn btn-danger" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
		
	
       
  

	<div class="container d-flex justify-content-center">
	&nbsp;
      <form class="form-inline" action="php_includes/update_software_data.php" method="post" id="updateForm"style="width:40vw; min-width:300px">

	  <!-- softwareName -->
	  <div class="form-row">
	  <div class="col form-group ">
        <label  for="softwareName"></label>&nbsp;
		<input class="form-control " type="text" name="softwareName" value='<?php echo $software_values['softwareName'] ?>'>
   	
		<div>
	<div>
			

	<!-- Contacts -->

		<!-- <label for="contacts">Contacts:</label>&nbsp; -->
		<div class="col form-group ">
		&nbsp;
		<?php
		echo'<select class="form-select " aria-label="Default select example>"';		

			$sql_query = "SELECT * FROM contacts;";
			$query_result = mysqli_query($connection, $sql_query);
			$query_result_num = mysqli_num_rows($query_result);
			
			echo '<select name="contacts" id="contacts" form="updateForm">';
			while ($db_row = mysqli_fetch_assoc($query_result)) {
				if ($db_row['contactName'] == $software_values['contactName']) {
					echo '<option value="'.$db_row['contactName'].'" selected>';
					echo $db_row['contactName'];
					echo "</option>";
				} else {
					echo '<option value="'.$db_row['contactName'].'">';
					echo $db_row['contactName'];
					echo "</option>";
				}
			}
			echo "</select>";
		?>
        	</div>
			

	<!-- Cost -->
	<div class="form-row">
	  <div class="col form-group">
		<label for="cost"></label>&nbsp;
		<?php
		
			if (array_key_exists('cost', $software_values)) {
				if ($software_values['cost'] == 0.00) {
					echo '<input type="textarea" name="cost" placeholder="Cost"class="form-control">';
				} else {
					echo "<input class='form-control'type='textarea' name='cost' value='".$software_values['cost']."'>";
				}
			} else {
				echo '<input class="form-control" type="textarea" name="cost" placeholder="Cost">';
			}
        ?>
        </div>

		<!-- renewalType -->
		<div class="form-row">
	  <div class="col form-group">

		<label  for="renewalType"></label>&nbsp;
		<select class="form-select " class="form-select" aria-label="Default select example"  name="renewalType" id="renewalType" form="updateForm">
			<?php
			
				if ($software_values['renewalType'] == "annual") {
					echo '<option value="annual" selected>annual</option>';
					echo '<option value="monthly">monthly</option>';
					echo '<option value="unknown">unknown</option>';
				} elseif ($software_values['renewalType'] == "monthly") {
					echo '<option value="annual">annual</option>';
					echo '<option value="monthly" selected>monthly</option>';
					echo '<option value="unknown">unknown</option>';
				} elseif ($software_values['renewalType'] == "unknown") {
					echo '<option value="annual">annual</option>';
					echo '<option value="monthly">monthly</option>';
					echo '<option value="unknown" selected >unknown</option>';
				}
			?>
		</select>
		
		</div>

		<!-- paymentDate -->
		<div class="form-row">
	  <div class="col form-group">
		<div class="md-form md-outline input-with-post-icon datepicker" inline="true">	&nbsp;
	
		<label for="paymentDate"></label>&nbsp;&nbsp;
        <input class="form-control mb-2" type="date" name="paymentDate" value='<?php echo $software_values['paymentDate'] ?>'>
      
		</div>
		

		<!-- renewalDate -->
		<div class="form-row">
	  <div class="col form-group">
        <label for="renewalDate"> </label>&nbsp;&nbsp;
        <input class="form-control "type="date" name="renewalDate" value='<?php echo $software_values['renewalDate'] ?>'>
		</div>
		</div>


		<!-- Notes -->
		<div class="form-row">
	  <div class="col form-group mb-3">
		<label for="notes"></label>&nbsp;
		<?php
			if (array_key_exists('notes', $software_values)) {
				if ($software_values['notes'] == "") {
					echo '<textarea  class="form-control" id="notes" name="notes" rows="3" cols="3" placeholder="Notes"class="form-control"></textarea>';
				} else {
					echo "<textarea  id='notes' name='notes' rows='3' cols='3' class='form-control'>".$software_values['notes']."</textarea>";
				}
			} else {
				echo '<textarea  class="form-control" id="notes" name="notes" rows="3" cols="3" placeholder="Notes"></textarea>';
			}
        ?>
		</div>


		<!-- Active -->
		<div class="form-row">
	   <div class="col form-group">

		<label for="active"> </label>
		<select class="form-select " class="form-select" aria-label="Default select example" name="active" id="active" form="updateForm">
			<?php
				if ($software_values['active'] == true) {
					echo '<option value="Yes" selected>Yes</option>';
					echo '<option value="No">No</option>';
				} elseif ($software_values['active'] == false) {
					echo '<option value="Yes">Yes</option>';
					echo '<option value="No" selected>No</option>';
				}
			?>
		</select>&nbsp;
		</div>
		<input class="btn btn-outline-success" type="submit" value="Save">
		<a href="main.php" class="btn btn-outline-danger" type="Cancel" value="Cancel">Cancel</a>


           </div>
	    </div>
	  </div>
   </div>
</div>
	</form>
</body>
	</html>