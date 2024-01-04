<?php
require 'config.php';
if(isset($_POST["submit"])){
  $EnterYourUsername = $_POST["username"];
  $EnterYourName = $_POST["fullname"];
  $EnterYourEmail = $_POST["email"];
  $CreateaPassword = $_POST["password"];
  $Confirmpassword = $_POST["repassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM `tbl_medic` WHERE username = '$EnterYourUsername' OR email = '$EnterYourEmail'");
  if(mysqli_num_rows($duplicate) > 0){
    echo "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($CreateaPassword == $Confirmpassword){
      $query = "INSERT INTO tbl_medic VALUES('','$EnterYourUsername','$EnterYourName','$EnterYourEmail','$CreateaPassword')";
     
      echo "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>

<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Medicine</title>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center login-container">
        <div class="form-group">
            <!-- Registration Form -->
            <div class="form signup">
                <form class="login-form text-center" action="" method="post">
                <img class="mb-5 logo" src="image/LOGO.png"/></br>
                <span class="title">Registration</span>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control rounded-pill form-control-lg" placeholder="Enter Your Username" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="fullname" class="form-control rounded-pill form-control-lg" placeholder="Enter Your Name" required>
                    <div class="form-group">
                        <input type="email" name="email"class="form-control rounded-pill form-control-lg" placeholder="Enter Your Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password"class="form-control rounded-pill form-control-lg" placeholder="Creat a Password" required>
                    <div class="form-group">
                        <input type="repassword" name="repassword"class="form-control rounded-pill form-control-lg" placeholder="Confirm Password" required>
                    </div>
                    <button type="submit" name="submit" class="btn mt-1 rounded-pill btn-lg btn-custom btn-block text-uppercase">Register Now!</button>
                    <span class="text">You have already account?
                        <a href="login.php" class="text login-link">Log in!</a>
                    </span>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
