<?php 
class Order {
    

    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }



    // get all orders
    public function getOrders(){
        $this->db->query("SELECT commande.*, client.fullName as 'fullName', client.adress as 'adress'  FROM commande join client on commande.id_client = client.id ORDER BY commande.creation_date DESC");
        $this->db->execute();
        return $this->db->resultSet();
    }

    // get Orders by client id
    public function getOrdersByClientId($id_client){
        $this->db->query("SELECT commande.*, client.fullName as 'fullName', client.adress as 'adress'  FROM commande join client on commande.id_client = client.id  WHERE id_client = :id_client ORDER BY commande.creation_date DESC");
        $this->db->bind('id_client', $id_client);
        $this->db->execute();
        return $this->db->resultSet();
    }


    // get products by commande id
    public function getProductsByCommande($cmd_id){
        $this->db->query("SELECT product_commande.*, product.name, product.img, product.buyPrice FROM product_commande JOIN product on product_commande.id_product = product.id WHERE product_commande.id_commande = :id_cmd");
        $this->db->bind('id_cmd', $cmd_id);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function addOrder($id_client,$items){
        $this->db->beginTransaction();
        $this->db->query("INSERT INTO commande (id_client, creation_date, state	) VALUES(:id_client , NOW(), 'On Hold')");
        $this->db->bind('id_client', $id_client);
        if($this->db->execute()){
            $commandeId =  $this->db->getLastInsertedId();
            foreach($items as $item){
                $this->addOrderDetails($commandeId, $item->id_product, $item->quantity, $item->buyPrice);
                $this->db->query('UPDATE product SET qte = qte - :qte WHERE id = :id');
                $this->db->bind('qte', $item->quantity);
                $this->db->bind('id', $item->id_product);
                $this->db->execute();
            }
            $this->db->query('DELETE FROM cart WHERE id_client = :id_client');
            $this->db->bind('id_client', $id_client);
            $this->db->execute();
            $this->db->commit();
            return true;    
        }else{
            return false;
        }
    }

    public function addOrderDetails($id_cmd, $id_prod, $qte, $price ){
        $this->db->query("INSERT INTO product_commande (id_commande	, id_product, qte, price) VALUES(:id_cmd, :id_prod, :qte, :price)");
        $this->db->bind('id_cmd', $id_cmd);
        $this->db->bind('id_prod', $id_prod);
        $this->db->bind('qte', $qte);
        $this->db->bind('price', $price);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getTotalProductByCommandeId($cmd_id){
        // echo $cmd_id;
        // exit;
        $this->db->query("SELECT  count(*) as 'total' FROM product_commande  GROUP BY id_commande HAVING id_commande = :id_cmd");
        $this->db->bind('id_cmd', $cmd_id);
        $this->db->execute();
        $row = $this->db->single();
        return $row->total;

    }

    public function getTotalPriceByCommandeId($cmd_id){
        $this->db->query("SELECT  sum(price * qte) as 'total' FROM product_commande JOIN commande on product_commande.id_commande = commande.id WHERE id_commande = :id_cmd");
        $this->db->bind('id_cmd', $cmd_id);
        $this->db->execute();
        $row = $this->db->single();
        return $row->total;
    }

    public function confirmeOrder($id_cmd){
        $this->db->query("UPDATE commande SET state = 'Confirmed', sent_date = NOW() WHERE id = :id");
        $this->db->bind('id', $id_cmd);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public function deliverOrder($id_cmd){
        $this->db->query("UPDATE commande SET state = 'Delivered', delivery_date = NOW() WHERE id = :id");
        $this->db->bind('id', $id_cmd);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function cancelOrder($id_cmd){
        $this->db->query("UPDATE commande SET state = 'Canceled' WHERE id = :id");
        $this->db->bind('id', $id_cmd);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function findCommandeById($id){
        $this->db->query("SELECT commande.*, client.fullName as 'fullName',client.email as 'email', client.adress as 'adress' , client.ville as 'city' , client.tel  as 'phone', client.code_postal as 'code_postal' FROM commande join client on commande.id_client = client.id  WHERE commande.id = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->single();
    }

}