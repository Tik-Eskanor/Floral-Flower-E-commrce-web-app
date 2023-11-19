<?php

 class Auth
 {
     private $username;
     private $pwd;
     private $pwdrepeat;
     private $email;
     public  $db;

     public function __construct(Database $obj, $username = null, $pwd = null, $pwdrepeat = null, $email=null)
     {
         $this->username = $username;
         $this->pwd = $pwd;
         $this->pwdrepeat = $pwdrepeat;
         $this->email = $email;
         $this->db = $obj;
     }

     private function empty_input():bool
     {
        $result;
        if(empty($this->username) || empty($this->pwd) || empty($this->pwdrepeat) || empty($this->email))
        {
           $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
     }

     private function invalid_username():bool
     {  
         $result;
         if(!preg_match("/^[a-zA-Z0-9]*$/" , $this->username))
         {
            $result = false;
         }
         else
         {
             $result = true;
         }
         return $result;
     }

     private function invalid_email():bool
     {
         $result;
         if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
         {
             $result = false;
         }
         else
         {
             $result = true;
         }
         return $result;
     }

     private function pwd_match():bool
     {
         $result;
         if($this->pwd !== $this->pwdrepeat)
         {
             $result = false;
         }
         else
         {
             $result = true;
         }
         return $result;
     }

     private function already_exists():bool
     {
         $sql = "SELECT * FROM users WHERE username = :username || email = :email";
         $stmt = $this->db->con->prepare($sql);
         $stmt->execute(['username'=>$this->username, 'email'=>$this->email]);
         $count = $stmt->rowCount();
         
         $result;
         if($count > 0)
         {
             $result = false;
         }
         else
         {
             $result = true;
         }
         return $result;

     }

     public function signup():void
     {
         if($this->empty_input() == false)
         {
             header("location: ../signup.php");
             $_SESSION['error'] = "Empty input";
             exit();
         }
         if($this->invalid_username() == false)
         {
             header("location: ../signup.php");
             $_SESSION['error'] = "Invalid username";
             exit();
         }
         if($this->invalid_email() == false)
         {
             header("location: ../signup.php");
             $_SESSION['error'] = "Invalid email";
             exit();
         }
         if($this->pwd_match() == false)
         {
             header("location: ../signup.php");
             $_SESSION['error'] = "Password not match";
             exit();
         }
         if($this->already_exists() == false)
         {
             header("location: ../signup.php");
             $_SESSION['error'] = "User already exists";
             exit();
         }
         
         $sql = "INSERT INTO users SET username =:username, pwd = :pwd, email = :email";
         $stmt = $this->db->con->prepare($sql);

         //HARSHA PASSWORD
         $this->pwd = md5($this->pwd);
         $stmt->execute(['username'=>$this->username, 'pwd'=>$this->pwd, 'email'=>$this->email]);

         if($stmt)
         {
            header("location: ../login.php");
            exit();
         }
         else
         {
            header("location: ../signup.php");
            $_SESSION['error'] = " Unable Register User Please Try Again";
            exit();
         }
     }

     public function login($email,$pwd):void
     {
         $sql = "SELECT * FROM users WHERE email = :email";
         $stmt = $this->db->con->prepare($sql);
         $stmt->execute(['email'=>$email]);
         $row_count = $stmt->rowCount();
         if($row_count == 1)
         {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $pwd_db = $row['pwd'];
            $pwd_user = md5($pwd);
            if($pwd_user == $pwd_db)
            {
             header("location:../index.php");
             $_SESSION['user_id'] = $row['id'];
             exit();
            }
            else
            {
                header("location:../login.php");
                $_SESSION['error'] = "Incorrect Password";
                exit();         
            }
         }
         else
         {
             header("location:../login.php");
             $_SESSION['error'] = "Incorrect Email";
             exit();
         }
     }

     public function logout()
     {
        
     }
 }