<?php
	include_once 'php_includes/db_connection.php';
	session_start();
	if (array_key_exists('softwareName', $_SESSION)) {
		$db_row['firstName'] = $_SESSION['softwareName'];
	} else {
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
	<!-- Font Awesome -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
	 integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	 <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>	
	<script src="https://kit.fontawesome.com/71826afc16.js" crossorigin="anonymous"></script>
    <title>Add Software</title>
  </head>
  <body  style="background:#eee">
  
	<div><nav class="navbar navbar-light justify-content-center fs-3 mb-3" style="background-color:darkred;color:white;margin:2px">		
		<h2>ECaMs Software Management</h2>
		</nav>
		&nbsp;
		&nbsp;
		<a href="main.php"><button type="button" class="btn btn-warning"><i class="fa-solid fa-left-long" ></button></i></a>&nbsp;
        <!-- <a href="add_software_form.php">Add software</a> -->
		<a href="add_contact_form.php"class="btn btn-success">Add contact</a>&nbsp;&nbsp;
		<a  href="main.php?name=logout " class="btn btn-danger" onclick="return confirm('Are you sure you want to logout?')">Logout</a>


 <div class="container">
	 <div class="text-center ">		
		<h3>Add Software </h3>
		<p class="text-muted">Complete the form below to Create a Software</p>		
	
    <div>		
	</div>
	
	
    <!-- software -->
	
		<div class="container d-flex justify-content-center mb-3 ">
      		<form  class="form-inline " action="php_includes/add_software_data.php" method="POST" id="addForm"style="width:50vw; min-width:300px" >
			  <div class="row">
			  <div class="col">
                        <label class="form-label mb-3" for="SoftwareName"></label>
						<input class="form-control " type="text" name="softwareName"placeholder="Software Name"required>
                    </div>				

		<!-- contact -->
		<div class="col-sm-6 mb-4">
		&nbsp;
		<?php
		echo'<select class="form-select"';		
			$sql_query = "SELECT * FROM contacts;";
			$query_result = mysqli_query($connection, $sql_query);
			$query_result_num = mysqli_num_rows($query_result);
			
			echo '<select name="contacts" id="contacts" form="addForm">';
			while ($db_row = mysqli_fetch_assoc($query_result)) {
				echo '<option  value="'.$db_row['contactName'].'">';
				echo $db_row['contactName'];
				echo "</option>";
			}
			echo "</select>";	
		?>
			</div>
			 

		<!-- cost -->
		<div class="col-sm-6 mb-2">	
		<div class="input-group">						  
		<label class="form-label " for="cost"></label>
        <input class="form-control" type="text" name="cost" placeholder="Cost">
		</div>
		</div>
		
	    <!-- renewal Type -->
         <div class="col-sm-6 mb-2">							  
			<select class="form-select" aria-label="Default select example"name="renewalType" id="renewalType" form="addForm"class="form-control">
				<option value="annual" selected>annual</option>
				<option value="monthly">monthly</option>
				<option value="unknown">unknown</option>
			</select>	

				</div>
					</div>
			
			<!-- payment date -->

			<div class="row">
			  <div class="col ">					
			<div class="md-form md-outline input-with-post-icon datepicker" inline="true">	&nbsp;
			<label for="paymentDate">Payment Date:</label> 
			<input  type="date" id="paymentDate" class="form-control mb-2"name="paymentDate"placeholder="Payment Date">				
			
			</div>
			
			<!-- renwal date -->
			<div class="row">
			  <div class="col">
			<div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker" inline="true">	&nbsp;
			<label for="renewalDate">Renewal Date:</label>
				<input type="date" id="renewalDate" class="form-control"name="renewalDate"placeholder="Payment Date">
				
				</div>
			</div>

        <!-- notes -->
		<div class="form-group">
		<label for="notes"></label>
        <textarea  class="form-control"  id="notes" name="notes" rows="3" cols="3" placeholder="Notes"></textarea>

	</div>
			<!-- active -->
		<div class="col-md-12 mb-3">							  
		<label class="form-label" for="active">Active:</label>
		<select  class="form-select" name="active" id="active" form="addForm" id="validationCustom04" required>
		<option selected>Select......</option >
			<option value="Yes">Yes</option>
			<option value="No">No</option>
		</select>
	
	</div>

		<!-- submit -->
	<div class="d-grid gap-2">
        <input class="btn btn-primary" type="submit" value="Add">
		</div>
	</div>

		</div> 
	</div>
<div>
      </form>

  </body>
</html>