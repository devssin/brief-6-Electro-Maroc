<?php 
class Product{
    private $db ;
    public function __construct()
    {
        $this->db = new Database;
    }

    // get all products
    public function getProducts(){
        $this->db->query("SELECT product.*, category.name as 'category' FROM product JOIN category  
                          ON product.id_cat = category.id  ");
        $this->db->execute();
        return $this->db->resultSet();
    }

    // get single product
    public function getSingleProduct($id)
    {
        $this->db->query("SELECT product.*, category.name as 'category' FROM product JOIN category  
        ON product.id_cat = category.id WHERE product.id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->single();
    }


    // get products by category
    public function getProductsByCategory($id){
        $this->db->query("SELECT product.*, category.name as 'category' FROM product JOIN category  
        ON product.id_cat = category.id WHERE product.id_cat = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->resultSet();
    }


    // search product By name
    public function searchProduct($name = null){
        
        $this->db->query("SELECT product.*, category.name as 'category' FROM product JOIN category  
        ON product.id_cat = category.id WHERE product.name LIKE :name");
        $this->db->bind('name', '%'.$name.'%');
        $this->db->execute();
        return $this->db->resultSet();
    }
    
    // add product
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

    // update product
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

    // delete product
    public function deleteProduct($id)
    {
        $this->db->query("DELETE FROM product WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }


    // get products by price desc
    public function getProductsByPriceDesc(){
        $this->db->query("SELECT product.*, category.name as 'category' FROM product JOIN category  
                          ON product.id_cat = category.id ORDER BY buyPrice DESC");
        $this->db->execute();
        return $this->db->resultSet();
    }

    // get products by price asc
    public function getProductsByPriceAsc(){
        $this->db->query("SELECT product.*, category.name as 'category' FROM product JOIN category  
                          ON product.id_cat = category.id ORDER BY buyPrice ASC");
        $this->db->execute();
        return $this->db->resultSet();
    }

    // change product quantity
    public function updateProductQuantity($id, $qte){
        $this->db->query("UPDATE product SET qte = qte - :qte WHERE id = :id");
        $this->db->bind('qte', $qte);
        $this->db->bind('id', $id);
        if($this->db->execute()){
            return true;
        }
        return false;
    }

    public function hideProduct($id){
        $this->db->query("UPDATE product SET hidden = 1 WHERE id = :id");
        $this->db->bind('id', $id);
        if($this->db->execute()){
            return true;
        }
        return false;
    }

    public function unhideProduct($id){
        $this->db->query("UPDATE product SET hidden = 0 WHERE id = :id");
        $this->db->bind(':id', $id);
        if($this->db->execute()){
            return true;
        }
        return false;
    }

}