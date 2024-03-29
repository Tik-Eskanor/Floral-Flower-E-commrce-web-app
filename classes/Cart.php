<?php

 class Cart
 {
     public $db = null;
     public function __construct(Database $obj)
     {
           $this->db = $obj;
     }
    
     public function add($user_id,$product_id):bool
     {
      $sql = "insert into cart set user_id = :uid, product_id = :pid";
      $stmt = $this->db->con->prepare($sql);
      $stmt->execute(['uid'=>$user_id,'pid'=>$product_id]);

      if($stmt)
      {
        return true;
      }
      else
      {
          return false;
      }
     }

     public function carts($user_id):array|null
     {

      $sql = "select * from cart where user_id = :uid";
      $stmt = $this->db->con->prepare($sql);
      $stmt->execute(['uid'=>$user_id]);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $row = $stmt->rowCount();
      if($row > 0)
      {
        return $result;
      }
      else
      {
        return null;
      }
     }
     

     public function get_product_id($user_id):array
     {
      $product_id = [];
      $sql = "select * from cart where user_id = :uid";
      $stmt = $this->db->con->prepare($sql);
      $stmt->execute(['uid'=>$user_id]);
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      if($rows)
      {
        foreach($rows as $row) 
        {
          $product_id[] = $row['product_id'];
        }
        return $product_id;
      }
      else
      {
        return [];
      }

     }

     public function delete($id):bool
     {
       $sql= "delete from cart where id = :id";
       $stmt = $this->db->con->prepare($sql);
       $result =  $stmt->execute(['id'=>$id]);
 
       if($result)
       {
         return true;
       }
       else
       {
         return false;
       } 
    } 

    
    public function delete_saved($id):bool
    {
      $sql= "delete from save where id = :id";
      $stmt = $this->db->con->prepare($sql);
      $result =  $stmt->execute(['id'=>$id]);

      if($result)
      {
        return true;
      }
      else
      {
        return false;
      } 
   } 

    public function save($user_id,$product_id,$cart_id):bool
    {

      $sql = "insert into save set user_id = :uid, product_id = :pid";
      $stmt = $this->db->con->prepare($sql);
      $save =  $stmt->execute(['uid'=>$user_id,'pid'=>$product_id]);

      if($save)
      {
        $sql= "delete from cart where id = :id";
        $stmt = $this->db->con->prepare($sql);
        $result =  $stmt->execute(['id'=>$cart_id]);
  
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
          return false;
      }
    } 

    public function back_to_cart($user_id,$product_id,$save_id):bool
    {

      $cart = $this->add($user_id,$product_id);

      if($cart)
      {
        $sql= "delete from save where id = :id";
        $stmt = $this->db->con->prepare($sql);
        $result =  $stmt->execute(['id'=>$save_id]);
  
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
          return false;
      }
    } 

   public function saved($user_id):array|null
   {

    $sql = "select * from save where user_id = :uid";
    $stmt = $this->db->con->prepare($sql);
    $stmt->execute(['uid'=>$user_id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $row = $stmt->rowCount();
    if($row > 0)
    {
      return $result;
    }
    else
    {
      return null;
    }
   }

    public function delete_all():bool
    {
     $stmt = $this->db->con->query("delete from cart");
     $result = $stmt->execute();

     if($result)
     {
       return true;
     }
     else
     {
       return false;
     }
    } 


 }