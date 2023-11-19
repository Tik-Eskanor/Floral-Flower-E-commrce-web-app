<?php
//Used to fetch product data
 class Product
 {
   public $db = null;

   public function __construct(Database $obj)
   {
        $this->db = $obj; 
   }

   public function get_all_products():array
   {
    $stmt = $this->db->con->query("select * from product");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $row = $stmt->rowCount();
    if($row > 0)
    {
      return $result;
    }
    else
    {
      return [];
    }
   }

   public function get_product($product_id):array
   {
     $sql = "select * from product where id = :id";
     $stmt = $this->db->con->prepare($sql);
     $stmt->execute(['id'=>$product_id]);
     $result = $stmt->fetch(PDO::FETCH_ASSOC);
     $row = $stmt->rowCount();
     if($row > 0)
     {
       return $result;
     }
     else
     {
       return [];
     }

   }

   public function search($term):array
   {
     $sql = "select * from product where name like :term";
     $stmt = $this->db->con->prepare($sql);
     $stmt->execute(['term'=>'%'.$term.'%']);
     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
     $row = $stmt->rowCount();
     if($row > 0)
     {
       return $result;
     }
     else
     {
       return [];
     }
   }
 }
 

