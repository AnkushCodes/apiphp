<?php
class Api{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function findBySql($query){
        $this->db->query($query);
        $set=$this->db->resultSet();
        return $set; 
        }

    public function addProduct($prdt_name,$prdt_price,$prdt_qty){
        $this->db->query('INSERT INTO products(product_name,product_price,product_qty) VALUES(:name, :price, :qty)');
        $this->db->bind(':name',$prdt_name);
        $this->db->bind(':price',$prdt_price);
        $this->db->bind(':qty',$prdt_qty);
    
    
    if($this->db->execute()){
       
        return true;
    }else{
        return false;
    }
 }

 public function modifyProduct($id,$product_name,$product_price,$product_qty){
    $this->db->query('UPDATE  products SET product_name=:name,product_price=:price,product_qty=:qty,updated_at=now() WHERE id=:id');
    $this->db->bind(':name',$product_name);
    $this->db->bind(':price',$product_price);
    $this->db->bind(':qty',$product_qty);
    $this->db->bind(':id',$id);

       if($this->db->execute()){
         return true;
       }else{
      return false;
       }
    }

    public function deleteProduct($id){
        $this->db->query("DELETE FROM products WHERE id=:id");
        $this->db->bind(":id",$id);
    
    if($this->db->execute()){
        return true;
      }else{
     return false;
      }
    }

    public function getProductById($id){
        $this->db->query("SELECT FROM products WHERE id=:id");
        $this->db->bind(":id",$id);

        $row =$this->db->single();
        return $row;
    
    }

    public function getAllProducts(){
        $query ="SELECT * FROM products";
       
      return $this->findBySql($query);
    }
}

 $api = new Api();

?>