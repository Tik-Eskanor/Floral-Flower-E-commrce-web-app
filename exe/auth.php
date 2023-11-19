<?php
include("../autoloader.php");

 $Db = new Database();

 if(isset($_POST['signup']))
 {
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $password_r = $_POST['password_r'];

   $auth = new Auth($Db,$username,$password,$password_r,$email);
   $auth->signup();
   exit();
 }


 if(isset($_POST['login']))
 {
   $email = $_POST['email'];
   $password = $_POST['password'];

   $auth = new Auth($Db);
   $auth->login($email,$password);
   exit();
 }

 if(isset($_GET['logout']))
 {
   unset($_SESSION['user']);
   session_destroy();
   header("location:../login.php");
 }

