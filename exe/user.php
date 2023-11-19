<?php
include("../autoloader.php");

 $Db = new Database();

 if(isset($_POST['submit']))
 {
   $username = $_POST['username'];
   $cp = $_POST['cp'];
   $np = $_POST['np'];

   $user = new User($Db);
   $result = $user->update($_SESSION['user']['id'],$username,$cp,$np);
   if($result)
   {
     $_SESSION['message'] = "User details updated";
     header("location:../edit-profile.php");
     exit();
   }
   else
   {
    $_SESSION['message'] = "User details not updated";
    header("location:../edit-profile.php");
    exit();
   }
 }


