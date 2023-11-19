<?php
  include("autoloader.php");
  $Db = new Database();

  $user_obj = new User($Db);
  if(isset($_SESSION['user_id']))
  {
    $_SESSION['user'] = $user_obj->get_user($_SESSION['user_id']);
  }

  $product_obj = new Product($Db);
  $products = $product_obj->get_all_products();
  
  $category_obj = new Category($Db);
  $categories = $category_obj->get_all_categories();

  $cart_obj = new Cart($Db);
  $check = $cart_obj->carts($_SESSION['user']['id'] ?? 0);
  if(isset($check))
  {
    $carts = $check;
  }
  else
  {
    $carts = [];
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Floral</title>
</head>
<body>

<!-- Header ------------------------------------------------>
<header id="header">

<!-- navigation----------------------------------- -->
<section class="navigation">
  <!-- top nav--- -->
   <div class=" top-nav container d-flex  align-items-center">
       <div class="search-bar d-flex justify-content-center py-4">
       <form action="search.php" method="post">
         <input type="search" name="term">
         <button type="submit" name="search"><i class="fas fa-search"></i></button>
       </form>
       </div>
       <?php
       if(isset($_SESSION['user']))
       {
        ?>
        <div class="user d-flex align-items-center">
        <div class="dropdown">
            <a class="nav-link  my-account" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              My Account <i class="fas fa-user-circle ms-1"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="edit-profile.php">Edit Profile</a></li>
            </ul>
          </div>
          <a href="exe/auth.php?logout= " class="mx-2 m-0">Logout</a>
        </div>
        <?php
       }
       else
       {
      ?>
       <div class="user d-flex align-items-center py-2">
        <a href="signup.php" class="mx-2 m-0">Sign Up</a> |
        <a href="login.php" class="mx-2 m-0">Login</a>
       </div>
      <?php
       }
       ?>

   </div>
  <!-- ---------- -->
  <!-- main nav-- -->
  <nav class="navbar navbar-expand-lg navbar-light m-bg">
    <div class="container">
      <a class="navbar-brand fw-bold fs-4 text-light" href="#">F<span class="fs-3 ">LO</span>RAL</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-md-center">
          <li class="nav-item ms-2">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item ms-2">
            <a class="nav-link text-dark" href="index.php#about-us">About Us</a>
          </li>
          <li class="nav-item ms-2">
            <a class="nav-link  text-dark" href="index.php#product">Shop</a>
          </li>
          <li class="nav-item ms-2">
            <a class="nav-link  text-dark" href="index.php#product">Categories</a>
          </li>
          <li class="nav-item ms-2">
            <a class="nav-link  text-dark" href="index.php#product">New Update</a>
          </li>
          <li class="nav-item ms-2">
            <a class="nav-link  text-dark" href="index.php#footer">Reach Out</a>
          </li>
          <li class="ms-3 cart-icon-wrapper">
            <a class=" fs-5 d-inline-block px-4 bg-light rounded-pill py-1  text-dark" href="cart.php"><i class="fas fa-cart-plus"></i><span class="fw-bold ms-1"><?= count($carts) ?></span></a>
          </li>
          <li class="ms-2">
            <?php
            if(isset($_SESSION['user']))
            {
              ?>
              <div class="user mobile d-none align-items-center">
                <div class="dropdown">
                    <a class="nav-link  my-account" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      My Account <i class="fas fa-user-circle ms-1"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="edit-profile.php">Edit Profile</a></li>
                    </ul>
                  </div>
                  <a href="exe/auth.php?logout= " class="mx-2 m-0">Logout</a>
                </div>
              </div>
            <?php
            }
            else
            {
            ?>
            <div class="user mobile d-none align-items-center py-2">
              <a href="signup.php" class="mx-2 m-0">Sign Up</a> |
              <a href="login.php" class="mx-2 m-0">Login</a>
            </div>
            <?php
            }
            ?>
          </li>
      </div>
    </div>
  </nav>
  <!-- ----------- -->
</section>

<!-- ---------------------------------------------- -->
</header>
<!-- ---------------------------------------------------- -->

<!-- main------------------------------------------------- -->
<div id="main-site">