<?php
include 'connect.php';
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
$logged_user = $_SESSION['userid'];
$selected_products = "SELECT * FROM `cart` where cart_user_id='$logged_user'";
$result = mysqli_query($con, $selected_products);
$row = mysqli_num_rows($result);
}
 echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container">
    <a class="navbar-brand" href="/Ecommerence">HOME</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
      echo '
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
          <li class="nav-item me-4">
            <p class="text-light my-0 mt-2 fw-bold mx-2"><em> welcome '. $_SESSION['username'] .'</em> </p>
          </li>
          <li class="nav-item ">
          <a class="nav-link mx-2" href="cart.php"><i class="fa-solid fa-cart-plus"></i><sup>'.$row.'</sup>cart</a>
          </li>
          <li class="nav-item">
          <a href="partials/logout.php" class="btn btn-outline-success ms-2">Logout</a>
        </li>
        </ul>';
    }
    else{
      echo '
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
         <li class="nav-item me-4">
            <a class="nav-link active"  data-bs-toggle="modal" data-bs-target="#loginModal" aria-current="page" href="#">Login</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#signupModal" href="#">Signup</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-plus"></i><sup>'.$row.'</sup>cart</a>
        </li>   
      </ul>';
    }
    echo '</div>
  </div>
</nav>';

include 'partials/loginModal.php';
include 'partials/signupModal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success! </strong> You CAN NOW LOGIN .
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>

<div class="container py-4">
  <h2 class=" d-flex float-start mb-4">hello</h2>
  <form class=" d-flex float-end w-50 mb-4" role="search" method="get" action="search.php">
    <input class="form-control me-2 py-3"  name="search_product" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success px-5" value="search" name="search_data" type="submit">Search</button>
  </form>

</div>

