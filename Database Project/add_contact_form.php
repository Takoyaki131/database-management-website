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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <title>Add Contact</title>
  </head>
  <body class="loggedin">
		<nav class="navtop">
			<div>
			<!-- <h1>Add contact</h1> -->
		<a href="main.php"><i  class="bi bi-arrow-left"></i>Back</a>
        <a href="add_software_form.php"><i class="bi bi-plus-square-fill"></i>Add software</a>
		<!-- <a href="add_contact_form.php">Add contact</a> -->
		<a href="main.php?name=logout" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
		</div>
</nav>
<br>
<br>
<br>

<center><h3>Add Contact</h3></center>
    
     <form class="" action="php_includes/add_contact_data.php" method="post">      
        <label for="contactName"></label>
		<input  class="contacts" type="text" name="contactName" placeholder="Contact Name"required>
        
		<label for="contactEmail"></label>
		<input class="contacts" type="Email" name="contactEmail" placeholder="Name@email.com">
        <br>
        <input type="submit" value="Add"class="contactName">
      </form>

    </div>
  </body>
</html>