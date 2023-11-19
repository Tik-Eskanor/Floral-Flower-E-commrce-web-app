<?php
include('../connect/connection.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<br><br><br>
<div class="container">
    <div class="row justify-content-center">
    
            <div class="col-md-10">
            
                <div  class="success-message  bg-danger p-3 text-center text-light rounded">
                <i  class="fas  fa-exclamation-triangle fa-5x"></i>
                    <h2>Your payment was unsuccess</h2>

                    <h4><?php  
                                if(isset($_SESSION['verify_err']))
                                {
                                    echo  $_SESSION['verify_err'];
                                   
                                }
                        ?>
                    </h4>
                </div> 
            </div>

       
        
    </div>
</div>

<script src="../j-query/jquery.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>