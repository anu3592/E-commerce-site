<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    #navb {
      background-color: rgb(176,196,222);
    }
    footer #footdesc{
      width: 100%;
    }
    #footdesc .col{
      width: 23%;
      float: left;
      margin: 10px;
    }
  </style> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>  
  <?php include '_header2.php';?>
  <?php include '_dbconnect.php';?>

  <?php
    if(isset($_POST['submit']))
    {
      $name = $_POST['name'];
      $cat = $_POST['category'];
      $desc = $_POST['description'];
      $files = $_FILES['file'];
      $filename = $files['name'];
      $fileext = explode('.', $filename);
      $filecheck = strtolower(end($fileext));
      $fileextstored = array('png', 'jpg', 'jpeg');
      if(in_array($filecheck, $fileextstored))
      {
        $destination = 'image/'.$filename;
        $query = "INSERT INTO `display`(`img`, `name`, `description`) VALUES ('$destination', '$name', '$desc')";
        $result = mysqli_query($conn, $query);
      }
    }
  ?>
  <?php
    if(isset($_GET['catid'])){
      $id = $_GET['catid'];
      $sql = "SELECT * FROM `products` WHERE id = $id";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
      if($num>0){
        while($row = mysqli_fetch_assoc($result))
        {
            $n = $row['name'];
            $des = $row['description'];
            $name = strtolower($n);
            $cat1 = strtolower($row['category']);
            $q = "SELECT * FROM `display` WHERE `brand_name` = '$name'";
            $r = mysqli_query($conn,$q);
            while($row2 = mysqli_fetch_assoc($r))
            {
              $id=$row2['id'];
              $image = $row2['img'];
              $name2 = $row2['name'];
              $cat = $row2['category'];
              $price = $row2['price'];
              $descp2= $row2['description'];
              echo '<div class="media">
              <img src="'.$image.'" class="mx-5 my-5">
              <div class="media-body mx-5 my-5">
                <h3 class="mt-0"><a href="detail.php?prodid='.$id.'">'.strtoupper($name2).' Price: '.$price.'</a></h3><b>
                '.$descp2.'</b><br>'.$des.'
              </div>   
            </div>';
            }
        }
      }
    }
    else{
     $displayquery = "SELECT * FROM `display`";
     $result2 = mysqli_query($conn, $displayquery);
     $row = mysqli_num_rows($result2);
     if($row>0)
     {
       while($r=mysqli_fetch_assoc($result2))
       {
         $image = $r['img'];
         $name = $r['name'];
         $descp = $r['description'];
         $id = $r['id'];
         echo '<div class="media">
            <img src="'.$image.'" class="mx-5 my-5">
            <div class="media-body mx-5 my-5">
                <h3 class="mt-0"><a href="detail.php">'.strtoupper($name).'</a></h3>
                '.$descp.'
            </div>   
          </div>';
       }
     }
    }
  ?>
  <?php include '_footer.php';?>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>