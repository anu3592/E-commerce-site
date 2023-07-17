<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Login Page</title>
<style>
  body{
    background-color: #F0F8FF;
  }
  form {
      width: 40em;
      border: 1px solid #666;
      border-radius: 10px;
      box-shadow: .2em .2em .5em #999;
      padding: .5em;
      overflow: hidden;
     }
</style>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>  
<?php
    $showError = false;
    $showAlert = false;
    $exist = false;
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        include '_dbconnect.php';
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];
        
        $sql1 = "SELECT * FROM `user` WHERE `username` = '$name'";
        $result1 = mysqli_query($conn, $sql1);
        $num = mysqli_num_rows($result1);
        if($num>0)
        {
          $exist = true;
        }
        else{
          $exist = false;
        }
        if($pass == $cpass && $exist == false)
        {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user` (`username`, `email`, `password`) VALUES ('$name', '$email', '$hash')";
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                $showAlert = true;
            }
        }
        else{
            $showError = true;
        }
    }

  ?>
  <?php 
        if($showAlert)
        {
          session_start();
          $_SESSION['login'] = true;
          $_SESSION['username'] = $uname;
          header("location: index.php");
            echo '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
              You have successfully signed up!
            </div>
          </div>';
        }
        if($showError)
        {
            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
              Wrong!
            </div>
          </div>';
        }
    ?>
<div class="container">
    <br>
    <h1 class="text-white bg-dark text-center">
      SIGN UP</h1>
    <div class="col-lg-8 m-auto d-block">  
    <form action="signup.php" method="post"">
      <div class="form-group">
        <h4><label for="user"> Username </label></h4>
        <input type="text" name="name" id="name" class="form-control">
      </div>
      <div class="form-group">
        <h4><label for="user"> Email Id </label></h4>
        <input type="email" name="email" id="email" class="form-control">
      </div>
      <div class="form-group">
        <h4><label for="user"> Password</label></h4>
        <input type="password" name="password" id="password" class="form-control">
      </div>
      <div class="form-group">
        <h4><label for="user"> Confirm Password</label></h4>
        <input type="password" name="cpassword" id="cpassword" class="form-control">
      </div>
      <p><h5>Already have an account?</h5> (<a href="/onlineshopping/login.php">Click Here</a>)</p>
      <input type="submit" name="submit" value="Sign Up" class="btn btn-success"> 
      </p>
    </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>