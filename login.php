<!DOCTYPE html>
<html>

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
    $login = false;
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        include '_dbconnect.php';
        $uname = $_POST["name"];
        $email = $_POST['email'];
        $passw = $_POST["password"];
        $exist = false;
        
        $sql = "SELECT * FROM `user` WHERE `username` = '$uname'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num==1)
        {
          while($row=mysqli_fetch_assoc($result)){
            if(password_verify($passw, $row['password'])){
              $login = true;
              session_start();
              $_SESSION['login'] = true;
              $_SESSION['username'] = $uname;
              header("location: index.php");
            }
            else{
              $showError = true;
            }
          }   
        }
        else{
          $showError = true;
        }  
    }
?>
<?php if($login){
  echo ' <div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    You have successfully logged in!
  </div>
</div>';
}
  if($showError)
  {
    echo "something went wrong!";
  }
?>
<div class="container">
    <br>
    <h1 class="text-white bg-dark text-center">
      LOGIN</h1>
    <div class="col-lg-8 m-auto d-block">  
    <form action="login.php" method="post"">
      <div class="form-group">
        <h4><label for="user"> Username </label></h4>
        <input type="text" name="name" id="name" class="form-control">
      </div>
      <div class="form-group">
        <h4><label for="user"> Email </label></h4>
        <input type="email" name="email" id="email" class="form-control">
      </div>
      <div class="form-group">
        <h4><label for="user"> Password</label></h4>
        <input type="password" name="password" id="password" class="form-control">
      </div>
      <input type="submit" name="submit" value="Login" class="btn btn-success"> 
      </p>
    </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
