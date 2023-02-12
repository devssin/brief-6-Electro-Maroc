<?php 
class Category{
    private $db;
    public function __construct()
    {
        $this->db = new Database;

    }

    public function getCategories(){
        $this->db->query("SELECT * FROM category ");
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getCategoryById($id){
        $this->db->query("SELECT * FROM category WHERE id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->single();
    }

    public function addCategory($data){
        $this->db->query("INSERT INTO category(name, img, description) VALUES(:name, :img, :description)");
        $this->db->bind('name', $data['name']);
        $this->db->bind('img', $data['image']);
        $this->db->bind('description', $data['description']);
        if($this->db->execute()){
            return true;
        }
        return false;
    }

    public function updateCategory($data){
        $this->db->query("UPDATE category SET name = :name, img = :image, description = :description WHERE id = :id");
        $this->db->bind('name', $data['name']);
        $this->db->bind('image', $data['image']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('id', $data['id']);
        if($this->db->execute()){
            return true;
        }
        return false;
    }

    public function deleteCategory($id){
        $this->db->query("DELETE FROM category WHERE id = :id");
        $this->db->bind('id', $id);
        if($this->db->execute()){
            return true;
        }
        return false;

    }


}