<?php
require 'config.php';
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM `tbl_medic` WHERE username = '$usernameemail' AND user_password = '$password'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['user_password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      

      header("Location: home.html");
    }
    else{
      echo "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo "<script> alert('User Not Registered'); </script>";
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
    <title>Medicine </title>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center login-container">
        <form class="login-form text-center" action="" method="post">
            <img class="mb-5 logo" src="image/LOGO.png"/>
            <div class="form-group">
                <input type="usernameemail" name="usernameemail" id="usernameemail" class="form-control rounded-pill form-control-lg" placeholder="Username"  required>
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" class="form-control rounded-pill form-control-lg" placeholder="Password" required>
            </div>
            <div class="forgot-link form-group d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Remember Password</label>
                </div>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" name="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase">Log in</button>
            <p class="mt-3 font-weight-normal">Don't have an account? <a href="registration.php"><strong>Register Now</strong></a></p>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
