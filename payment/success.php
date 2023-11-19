<?php
include('../autoloader.php')
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
<body  class="m-bg">
<div class="container success">
    <div class="row">
        <div class="col-md-6 p-4 m-auto">
            <div class="content">
                <div class="content-wrapper text-center text-light p-4">
                    <h1 class="py-3 fs-1">Thank you <i class="fas fa-thumbs-up"></i></h1>
                    <p class="text-left">
                        Order has been place and will be delivered to your specified addrss<br>
                        An email has been sent to you at <?php echo  $_SESSION['emailused'] ?>.
                    </p>
                    <p  class="text-center"><strong>Thank you, Good luck!</strong></p>
                    <div class="text-center py-3">
                        <a href="../index.php" class="btn bg-light text-dark px-4"><b>OK</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../j-query/jquery.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>