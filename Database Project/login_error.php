<?php
	include_once 'php_includes/db_connection.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">

    <script src="https://kit.fontawesome.com/71826afc16.js" crossorigin="anonymous"></script>

    <title>login_erro</title>
  </head>
 
  <body>
   <!-- lewis img -->
    <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
      <img src="lewis.png" alt="Lewis University Logo"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <h1 class="">Log in</h1>            
          </div>

    <!-- login-form-validation -->

      <div class="alert alert-danger" role="alert">
          Invalid Username or Password</div>
        <form class="" action="php_includes/login_check.php" method="post">
          <div class="form-outline mb-4">
              <label  class="form-label" for="userName" >Username-</label >
                <input type="text" name="userName" placeholder="Username" class="form-control form-control-lg">
         </div>

         <div class="form-outline mb-4">
              <label  class="form-label"  for="password">Password:</label>
                <input type="password" name="password" placeholder="Password"class="form-control form-control-lg">
    </div>
     <div class="text-center text-lg-start mt-4 pt-2">
                <input type="submit" value="submit"class="btn btn-primary btn-lg">
            </form> 

            

         
      </div>
    </div>
  </div>
  <div 
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 " id="color">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2022. All rights reserved.
    </div>
    <!-- Copyright -->

    <!-- icons to the Right -->
    <div class="icons">
    <a href="https://www.instagram.com" class="icon icon--instagram">
        <i class="fa fa-instagram"></i>
    </a>
    <a href="https://www.twitter.com" class="icon icon--twitter">
        <i class="fa fa-twitter"></i>
    </a>
    <a href="https://www.linkedin.com" class="icon icon--linkedin">
        <i class="fa fa-linkedin"></i>
    </a>
    <a href="https://www.facebook.com" class="icon icon--facebook">
        <i class="fa fa-facebook"></i>
    </a>
</div>
    <!-- Right -->
  </div>
</section>


  </body>
</html>