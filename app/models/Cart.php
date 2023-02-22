<?php 
class Cart {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    // get Cart by client id
    public function getCartByClientId($id_client){
        $this->db->query("SELECT cart.id_product, cart.qte as 'quantity' , product.name, product.img, product.buyPrice FROM cart JOIN product on cart.id_product = product.id WHERE id_client = :id_client");
        $this->db->bind('id_client', $id_client);
        $this->db->execute();
        return $this->db->resultSet();
    }


    // Add item to cart 
    public function addToCart($data){
        $this->db->query("INSERT INTO cart(id_product, id_client, qte) VALUES(:id_product, :id_client, :qte)");
        $this->db->bind('id_product', $data['id_product']);
        $this->db->bind('id_client', $data['id_client']);
        $this->db->bind('qte', $data['qte']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // check if product is already in cart
    public function checkProduct($id_product, $id_client){
        $this->db->query("SELECT * FROM cart WHERE id_product = :id_product AND id_client = :id_client");
        $this->db->bind('id_product', $id_product);
        $this->db->bind('id_client', $id_client);
        $this->db->execute();
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    // get cart count
    public function getCartCount($id_client){
        $this->db->query("SELECT count(*) AS cart_count FROM cart WHERE id_client = :id_client");
        $this->db->bind('id_client', $id_client);
        $this->db->execute();
        $row = $this->db->single();
        return $row->cart_count;
    }

    // get cart qte by product id
    public function getCartQteByProductId($id_product, $id_client){
        $this->db->query("SELECT qte FROM cart WHERE id_product = :id_product AND id_client = :id_client");
        $this->db->bind('id_product', $id_product);
        $this->db->bind('id_client', $id_client);
        $this->db->execute();
        $row = $this->db->single();
        return $row->qte;
    }

    // get cart items
    public function getCartItems($id_client){
        $this->db->query("SELECT * FROM cart WHERE id_client = :id_client");
        $this->db->bind('id_client', $id_client);
        $this->db->execute();
        $results = $this->db->resultSet();
        return $results;
    }

    // increase qte of product in cart
    public function increaseQte($id_product, $id_client){
        $this->db->query("UPDATE cart SET qte = qte + 1 WHERE id_product = :id_product AND id_client = :id_client");
        $this->db->bind('id_product', $id_product);
        $this->db->bind('id_client', $id_client);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // decrease qte of product in cart
    public function decreaseQte($id_product, $id_client){
        $this->db->query("UPDATE cart SET qte = qte - 1 WHERE id_product = :id_product AND id_client = :id_client");
        $this->db->bind('id_product', $id_product);
        $this->db->bind('id_client', $id_client);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    public function getTotalByClientId($id_client){
        $this->db->query("SELECT SUM(cart.qte * product.buyPrice) AS total FROM cart JOIN product ON cart.id_product = product.id WHERE id_client = :id_client");
        $this->db->bind('id_client', $id_client);
        $this->db->execute();
        $row = $this->db->single();
        return $row->total;
    }

    // decrease qte of product in cart


    // delete item from cart
    public function deleteItem($id_product, $id_client){
        $this->db->query("DELETE FROM cart WHERE id_product = :id_product AND id_client = :id_client");
        $this->db->bind('id_product', $id_product);
        $this->db->bind('id_client', $id_client);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    // delete all items from cart
    public function deleteCartByClientId($id_client){
        $this->db->query("DELETE FROM cart WHERE id_client = :id_client");
        $this->db->bind('id_client', $id_client);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }





}