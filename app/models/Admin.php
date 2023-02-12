<?php 
class Admin{
    private $db;
    public function __construct()
    {
        $this->db = new Database;

    }

    // Register new user
    // public function register($data)
    // {
    //     $this->db->query("INSERT INTO users(name, email, password) VALUES(:name, :email, :password)");
    //     $this->db->bind('name', $data['name']);
    //     $this->db->bind('email', $data['email']);
    //     $this->db->bind('password', $data['password']);
    //     if( $this->db->execute()){
    //         return true;
    //     }
    //     return false;

    // }

    public function login($username, $password)
    {
        $this->db->query("SELECT * FROM admin WHERE username = :username");
        $this->db->bind('username', $username);

        $this->db->execute();

        $row = $this->db->single();
        $hashedPassword = $row->password;
        if(password_verify($password, $hashedPassword) ){
            return $row;
        }
        return false;

    }

    // Check if user email is already taken 
    public function findUserByUsername($username)
    {
        $this->db->query('SELECT * FROM admin WHERE username = :username');
        $this->db->bind('username', $username);

        $row = $this->db->single();
        //Check row
        if($this->db->rowCount() > 0){
            return true;
        }
        return false;
    }
}