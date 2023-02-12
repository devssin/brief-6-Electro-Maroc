<?php 
class Product{
    private $db ;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getProducts(){
        $this->db->query("SELECT product.*, category.name as 'category' FROM product JOIN category  
                          ON product.id_cat = category.id  ");
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getSingleProduct($id)
    {
        $this->db->query("SELECT product.*, category.name as 'category' FROM product JOIN category  
        ON product.id_cat = category.id WHERE product.id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->single();
    }

    
    public function addProduct($data){
        $this->db->query("INSERT INTO product(name, code_bar, img, description, buyPrice, finalPrice, offrePrice, qte, id_cat) VALUES(:name, :code_bar,:img, :description, :buyPrice,:finalPrice,:offrePrice,:qte, :id_cat)");
        $this->db->bind('name', $data['name']);
        $this->db->bind('code_bar', $data['code_bar']);
        $this->db->bind('img', $data['image']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('buyPrice', $data['buyPrice']);
        $this->db->bind('finalPrice', $data['finalPrice']);
        $this->db->bind('offrePrice', $data['offrePrice']);
        $this->db->bind('qte', $data['quantity']);
        $this->db->bind('id_cat', $data['category']);
        
        if($this->db->execute()){
            return true;
        }
        return false;
    }

    public function updateProduct($data){
        $this->db->query("UPDATE product SET name = :name, code_bar = :code_bar, img = :img, description = :description, buyPrice = :buyPrice, finalPrice = :finalPrice, offrePrice = :offrePrice, qte = :qte, id_cat = :id_cat WHERE id = :id");
        $this->db->bind('name', $data['name']);
        $this->db->bind('code_bar', $data['code_bar']);
        $this->db->bind('img', $data['image']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('buyPrice', $data['buyPrice']);
        $this->db->bind('finalPrice', $data['finalPrice']);
        $this->db->bind('offrePrice', $data['offrePrice']);
        $this->db->bind('qte', $data['quantity']);
        $this->db->bind('id_cat', $data['category']);
        $this->db->bind('id', $data['id']);
        
        if($this->db->execute()){
            return true;
        }
        return false;
    }
    public function deleteProduct($id)
    {
        $this->db->query("DELETE FROM product WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

}