<?php
    echo '<nav class="navbar navbar-expand-lg bg-body-tertiary" id="navb">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Dukan</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/onlineshopping/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Top Searches
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">shoes</a></li>
              <li><a class="dropdown-item" href="#">laptops</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">smartphones</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="/onlineshopping/logout.php">Logout</a>
          </li>
        </ul>
        <form action="search.php" method="GET" class="d-flex" role="search">
          <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <form action="upload.php">
          <input type="submit" name="submit" value="Sell" class="btn btn-success mx-3 my-1">
        </form>
      </div>
    </div>
  </nav>';
?>