<?php
//Used to fetch category data
 class Category
 {
   public $db = null;

   public function __construct(Database $obj)
   {
        $this->db = $obj; 
   }

   public function get_all_categories():array
   {
    $stmt = $this->db->con->query("select * from category");
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
   
   public function get_category($id):array
   {
     $sql = "select * from category where id = :id";
     $stmt = $this->db->con->prepare($sql);
     $stmt->execute(['id'=>$id]);
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
 }
 

