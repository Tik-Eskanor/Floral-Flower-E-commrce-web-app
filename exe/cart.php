<?php
 include("../autoloader.php");
 $Db = new Database();

  if(isset($_SESSION['user']))
  {
      if(isset($_POST['cart_add']))
      {
        $user_id = $_POST['user_id'];
        $product_id = $_POST['product_id'];

        $cart_obj = new Cart($Db);
        $cart_obj->add($user_id,$product_id);
        header("location:../cart.php");
      }
  }
  else
  {
    header("location:../login.php");
  }

  if(isset($_GET['cart_delete']))
  {
    $id = $_GET['cart_delete'];
    $cart_obj = new Cart($Db);
    $delete = $cart_obj->delete($id);
    if($delete)
    {
      header("location:../cart.php");
    }
  }