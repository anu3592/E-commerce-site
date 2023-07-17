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
    <?php include '_header2.php';
    include '_dbconnect.php';
    ?>
    <div class="container my-3">
        <h4>Search Results for <em>"<?php echo $_GET['search']?>"</em></h4>
        <?php
            $query = $_GET['search'];
            $sql = "select * from `display` where match (name, category, brand_name) against ('$query')";
            $result = mysqli_query($conn, $sql);
            $q = "select * from `products` where `category`='$query'";
            $r = mysqli_query($conn, $q);
            $desc2 = "";
            while($row2=mysqli_fetch_assoc($r))
            {
              $desc2=$row2['description'];
            }
            $noresult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noresult = false;
                $name = $row['name'];
                $cat = $row['category'];
                $bname = $row['brand_name'];
                $img = $row['img'];
                $desc = $row['description'];
                $price = $row['price'];
                $id = $row['id'];
                echo '<div class="media">
                <img src="'.$img.'" class="mx-5 my-5">
                <div class="media-body mx-5 my-5">
                  <h3 class="mt-0"><a href="detail.php?prodid='.$id.'"><b>'.strtoupper($name).'</b> Price: '.$price.'</a></h3><b>
                  '.$desc.'</b><br>'.$desc2.'
                </div>   
              </div>';
            }
            if($noresult){
                echo '<div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <p class="display-4">No Results Found</p>
                            <p class="lead">Suggestions:<ul>
                                <li>May be product is not available or,</li>
                                <li>Make sure that all words are spelled correctly.</li>
                                <li>Try different keywords.</li>
                                <li>Try more general keywords.</li>
                                </ul> </p>
                        </div>
                      </div>';
            }
        ?>
    </div>
    <?php include '_footer.php'; ?>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>