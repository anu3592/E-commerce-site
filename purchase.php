<?php
session_start();
    include '_dbconnect.php';
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $date = date('m/d/Y h:i:s', time());
        $sql = "INSERT INTO `customer`(`name`, `address`, `date`) VALUES ('$name', '$address', '$date')";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            echo'<div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Payment Successful!</h4>
            <p>You have successfuly payed for the product.</p>
            <hr>
            <p class="mb-0">Now the product will be deliverable within 1 week as the address given you.</p>
          </div>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>  

  <div class="container">
    <br>
    <h1 class="text-white bg-dark text-center">
      Payment Details</h1>
    <div class="col-lg-8 m-auto d-block">  
    <form action="purchase.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="user"> <h5>Name</h5> </label>
        <input type="text" name="name" id="name" class="form-control">
      </div>
      <div class="form-group">
        <label for="user"> <h5>Address</h5> </label>
        <textarea name="address" rows="5" cols="50" placeholder="Enter your address"></textarea>
      </div>
      <div class="form-group">
       <h5>Payment Options</h5> 
      <ul>
        <li><input type="radio" name="age" value="Cash_on_Delivery" checked> Cash On Delivery</li> 
        <li><input type="radio" name="age" value="Debit_card"> By Debit Card</li>
        <li><input type="radio" name="age" value="Credit_card"> By Credit Card</li>
        <li><input type="radio" name="age" value="upi"> By UPI Transaction</li>
      </ul>
      </div>
      <input type="submit" name="submit" value="Pay" class="btn btn-success"> 
    </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>