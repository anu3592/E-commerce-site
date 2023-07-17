<!doctype html>
<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    .maindiv {
      width: 100%;
      height: 400px;
      position: absolute;
      left: 50%;
      right: 50%;
      margin-top: 230px;
      transform: translate(-50%, -50%);
      background-image: url("https://source.unsplash.com/1000x500/?Tshirt,wear");
      background-size: 100% 100%;
      animation: slider 12s infinite linear;
    }
    @keyframes slider{
      0%{background-image: url("https://source.unsplash.com/1000x500/?Tshirts/wear");}
      25%{background-image: url("https://source.unsplash.com/1000x500/?smartdevices,homealiance");}
      50%{background-image: url("https://source.unsplash.com/1000x500/?shoes");}
      75%{background-image: url("https://source.unsplash.com/1000x500/?facewash");}
    }
    .container{
      margin-top: 450px;
    }
    .card {
      margin: 10px;
    }
    footer #footdesc{
      width: 100%;
    }
    #footdesc .col{
      width: 23%;
      float: left;
      margin: 10px;
    }
    
    #navb {
      background-color: rgb(176,196,222);
    }
  </style>
  <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>  
<?php
//include '_header.php';
  $st = false;
  session_start();
  if(!isset($_SESSION['login']) || $_SESSION['login']!=true)
  {
    include '_header.php';
  }
  else{
    $st = true;
    include '_header2.php';
  }
?>

<?php include '_dbconnect.php';?>

<div class="maindiv"><!--animation frame-->

</div>
<div class="container">
  <div class="row">
  <?php 
                $sql = "SELECT *FROM `products`";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    $id = $row['id'];
                    $desc = $row['description'];
                    $cat = $row['category'];
                    $name = $row['name'];
                    $check = "login.php";
                    if($st)
                    {
                      $check = "products.php?catid=$id";//"products.php?catid='.$id.'"
                    }
                    echo '<div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                      <img src="https://source.unsplash.com/1000x500/?'.$cat.','.$name.'" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">'.$name.'</h5>
                        <p class="card-text">'.substr($desc,0,90).'...</p>
                        <a href="'.$check.'" class="btn btn-primary">View</a>
                      </div>
                   </div>
                </div>';
                }
            ?>
  </div>  
</div>
<?php include '_footer.php';?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>-->
</body>
</html>


<!---->
<!--INSERT INTO `products` (`id`, `name`, `category`, `description`) VALUES ('1', 'nike', 'shoes', 'Nike, Inc is an American athletic footwear');-->