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

  if(isset($_GET['save_delete']))
  {
    $id = $_GET['save_delete'];
    $cart_obj = new Cart($Db);
    $delete = $cart_obj->delete_saved($id);
    if($delete)
    {
      header("location:../cart.php");
    }
  }

  if(isset($_GET['user_id']) && isset($_GET['product_id']) && isset($_GET['cart_id']))
  {
    $user_id = $_GET['user_id'];
    $product_id = $_GET['product_id'];
    $cart_id = $_GET['cart_id'];

    $cart_obj = new Cart($Db);
    $save = $cart_obj->save($user_id,$product_id,$cart_id);

    if($save)
    {
      header("location:../cart.php");
    }
  }

  if(isset($_GET['user_id']) && isset($_GET['product_id']) && isset($_GET['save_id']))
  {
    $user_id = $_GET['user_id'];
    $product_id = $_GET['product_id'];
    $save_id = $_GET['save_id'];

    $cart_obj = new Cart($Db);
    $cart = $cart_obj->back_to_Cart($user_id,$product_id,$save_id);

    if($cart)
    {
      header("location:../cart.php");
    }
  }