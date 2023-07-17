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
    .carousel-inner{
      width: 80%;
      max-height: 300px;
    }
  </style>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
  <?php include '_header2.php';
   include '_dbconnect.php';
  ?>
  <?php
    if(isset($_GET['prodid']))
    {
      $id = $_GET['prodid'];
      $sql = "SELECT * FROM `display` WHERE `id` = '$id'";
      $result = mysqli_query($conn, $sql);
      while($row=mysqli_fetch_assoc($result))
      {
        $name = $row['name'];
        $img = $row['img'];
        $desc = $row['description'];
        $cat = $row['category'];
        $price = $row['price'];
        $bname = $row['brand_name'];
        /*echo'<div class="img_col">
          <img src="'.$img.'" class="h-25 w-25">
        </div>';*/
        echo '<div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner my-2">
          <div class="carousel-item active">
            <img src="https://source.unsplash.com/1000x500/?'.$cat.','.$bname.'" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://source.unsplash.com/1000x500/?'.$cat.','.$bname.'" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://source.unsplash.com/1000x500/?'.$cat.','.$bname.'" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>';
      echo '<br>';
      echo '<div class="description mx-5">
          <p class="fs-4"><b>'.strtoupper($name).' Price: '.$price.'</b></p>
          <p class="fs-4">'.$desc.'</p>
      </div>';
      echo '<br>';
      echo '<div class="col-lg-4 mx-5">
      <table class="table">
      <thead class="text-center">
        <tr>
          <th scope="col" colspan="4">Save Extra with 3 offers</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <tr>
          <td colspan="4">'.substr("<b>Bank Offer (13): </b>Prime Savings 10% Instant Discount up to INR 1250 on SBI Credit Card Non-EMI Trxn. Min purchase value INR 5000. For Prime customers only",0,90).'...</td>
        </tr>
        <tr>
          <td colspan="4"><b>No Cost EMI:</b> Avail No Cost EMI on select cards for orders above ₹3000 DetailsNo Cost EMI: Avail No Cost EMI on select cards for orders above ₹3000</td>
        </tr>
        <tr>
          <td colspan="4"><b>Partner Offers:</b> Get GST invoice and save up to 28% on business purchases.</td>
        </tr>
      </tbody>
    </table>
    </div>';
    echo '<div class="quality d-inline-flex mx-5 px-2 py-2 bg-info rounded">
        <h5>Additional Information!</h5>
        <ul>
          <li>Good Product in its range</li>
          <li>Quality is up to mark</li>
          <li>Has addition feautres</li>
        </ul>
    </div><br>';

    echo'<div class="purchase mx-5 my-3 px-2 py-2 float-left bg-info rounded">
    <h4>Want To Purchase?</h4>
    <p>If you want to purchase the product then click here</p>
    <form action="purchase.php">
    <a href="purchase.php" class="btn btn-primary">Purchase</a>
    </form>
    <form action="addcart.php" method="POST">
      <button type="submit" name="Add_To_Cart" class="btn btn-info my-2 bg-primary text-light">Add To Cart</button>
      <input type="hidden" name="Item_Name" value="'.$name.'">
      <input type="hidden" name="Price" value="'.$price.'">
    </form>
    </div>';
      }
    }
  ?>
  <?php include '_footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>  
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>