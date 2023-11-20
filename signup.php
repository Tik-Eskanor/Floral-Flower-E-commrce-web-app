<?php session_start()  ?>
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
    <title>Floral | Signup</title>
</head>
<body>

<section class="form">
    <div class="container">
        <div class="col-md-6 mx-auto">
            <div class="content">
                <h1 class="mb-4 mt-5">F<span>LO</span>RAL</h1>
                <form action="exe/auth.php" method="post"> 
                   
                  <span>Signup</span>       
                  <?php
                     if(isset($_SESSION['error']))
                     {
                        echo  "<div class='mb-3 ms-2'>".$_SESSION['error']."</div>";
                        unset($_SESSION['error']);
                     }
                   ?>          
                  <input type="text" name="username" class="input" placeholder="Username">
                  <input type="email" name="email" class="input" placeholder="Email">
                  <input type="password" name="password" class="input" placeholder="Password">
                  <input type="password" name="password_r" class="input" placeholder="Confirm Password">
                  <input type="submit" name="signup" value="Signup" class="submit">
                </form>
                <div class="text-center mt-3">
                <a href="login.php">Already have an account? <b>Login</b></a>
                </div>
            </div>
        </div>
    </div>
</section>






<script src="js/j-query/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/isotope.min.js"></script>
<script src="owl-carousel/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>