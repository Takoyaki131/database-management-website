<?php
	include_once 'php_includes/db_connection.php';
	session_start();
	if (array_key_exists('loginName', $_SESSION)) {
		$db_row['firstName'] = $_SESSION['loginName'];
		$_SESSION['softwareName'] = $db_row['firstName'];
	} else {
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
	<!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <title>main.php</title>
  </head>

  <?php
		if (array_key_exists('name', $_GET)) {
			if ($_GET['name'] = 'logout') {
				unset($_SESSION['loginName']);
				unset($_SESSION['softwareName']);
			}
			header("Location: main.php");
		}
		?>

  <body class="loggedin">
<div class="navtop">		
	<div>
		<h1>ECaMs Software Management</h1>			
		<a href="main.php"><i ></i>Home</a>
        <a href="add_software_form.php"><i class="bi bi-plus-square-fill"></i>Add software</a>
		<a href="add_contact_form.php">Add contact</a>
		<a href="main.php?name=logout" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
			</div>
		
	<div class="name">
			<?php
		echo "<h5>";
		echo "Welcome, ";
		echo $db_row['firstName'];
		echo "!";
		echo "</h5>";
	  ?>
	</div>
	  <!--ALERT  message  after add softwareName -->

	  <?php
	  if(isset($_GET['msg'])){
		$msg = $_GET['msg'];
		echo  '<div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
		<strong>'.$msg.'</strong>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  
				
	  </div>';
			
	  }
	  ?>
	  	  <!--ALERT  message  for update -->
		  <?php	  
		 
		 
		 
		 ?>


      <!-- <h2>Database</h2> -->



	  <!-- tabel -->
	  
	  <div class="container">
    <table class="table table-striped w-auto table-hover  text-center  table-bordered " >
        <thead  class="tabel-dark align-middle">
          <tr class="bg-dark text-white " >
            <th >Software Name</th>
            <th>Contact</th>
            <th>Cost</th>
			<th>Renewal Type</th>
            <th>Payment Date</th>
            <th>Renewal Date</th>
            <th >Notes</th>
			<th >Active</th>
            <th colspan="2">Actions</th>
          </tr>
        </thead>
        <tbody>
		<?php
			$sw_query = "SELECT * FROM software;";
			$sw_result = mysqli_query($connection, $sw_query);
			
			while ($sw_row = mysqli_fetch_assoc($sw_result)) {
				echo "<tr>";
				echo "<td>";
				echo $sw_row['softwareName'];
				echo "</td>";
				echo "<td>";
				$id = $sw_row['contact'];
                $stmt = "SELECT * FROM contacts WHERE contactID=$id";
                $ct_result = mysqli_query($connection, $stmt);
                $ct_row = mysqli_fetch_assoc($ct_result);
				echo $ct_row['contactName'];
				echo "</td>";
				echo "<td>";
				if ($sw_row['cost'] == 0.00) {
					echo "";
				} else {
					echo $sw_row['cost'];
				}
				echo "</td>";
				echo "<td>";
				echo $sw_row['renewalType'];
				echo "</td>";
				echo "<td>";
				if ($sw_row['paymentDate'] == '0000-00-00') {
					echo "";
				} else {
					echo $sw_row['paymentDate'];
				}
				echo "</td>";
				echo "<td>";
				if ($sw_row['renewalDate'] == '0000-00-00') {
					echo "";
				} else {
					echo $sw_row['renewalDate'];
				}
				echo "</td>";
				echo "<td>";
				echo $sw_row['notes'];
				echo "</td>";
				echo "<td>";
				if ($sw_row['active'] == 1) {
					echo "Yes";
				} elseif ($sw_row['active'] == 0) {
					echo "No";
				}
				echo "</td>";
				echo "<td>";
				$values_query = http_build_query(array('values' => array('softwareID' => $sw_row['softwareID'], 'softwareName' => $sw_row['softwareName'], 'contactName' => $ct_row['contactName'], 'cost' => $sw_row['cost'], 'renewalType' => $sw_row['renewalType'], 'paymentDate' => $sw_row['paymentDate'], 'renewalDate' => $sw_row['renewalDate'], 'notes' => $sw_row['notes'], 'active' => $sw_row['active'])));
				echo "<a href='update.php?$values_query'' class='btn btn-success'style='padding: 5px;color:white;'> Update</a>";
				echo "</td>";
				echo "<td>";
				echo "<a class='btn btn-danger' style='padding: 5px;color:white;' href='php_includes/delete.php?id=".$sw_row['softwareID']."' onclick=\"javascript:return confirm('Are you certain you want to delete this data?');\" >Delete</a>";
				echo "</td>";
				echo "</tr>";
			}
		?><i></i>
        </tbody>
      </table>
		</div>
	  </div>
    
	</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>	
		
</div>
	
  </body>
</html>
