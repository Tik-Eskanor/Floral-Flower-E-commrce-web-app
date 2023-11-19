<?php
 class User
 {
    public $Db;

    public function __construct(Database $Db)
    {
        $this->Db = $Db;
    }



     public function get_user($id):array
    {
        $sql = "select * from users where id = :id";
        $stmt = $this->Db->con->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $row_count = $stmt->rowCount();
        if($row_count > 0)
        {
            return $result;
        }
        else
        {
            return [];
        }
    }

    public function update($id,$username,$cp,$np):bool
    {
        if(empty($cp) && empty($np))
        {
            $sql = "update users set username = :un where id = :id";
            $stmt = $this->Db->con->prepare($sql);
            $result =  $stmt->execute(['un'=>$username,'id'=>$id]);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            $cp = md5($cp);
            $sql = "select * from users where pwd = :cp && id = :id";
            $stmt = $this->Db->con->prepare($sql);
            $stmt->execute(['id'=>$id,'cp'=>$cp]);
     
            $row_count = $stmt->rowCount();
     
            if($row_count == 1)
            {
             $sql = "update users set username = :un, pwd = :np where id = :id";
             $stmt = $this->Db->con->prepare($sql);
             $result = $stmt->execute(['id'=>$id,'un'=>$username,'np'=>md5($new)]);
             
             if($result)
             {
                 return true;
             }
             else
             {
                 return false;
             }      
           }
           else
           {
                $_SESSION['message'] = "Invalid Password";
                header("location:../edit-profile.php");
                exit(); 
           }
       }
    }

}