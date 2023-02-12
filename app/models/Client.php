<?php 
class Client {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
    {
        $this->db->query("INSERT INTO client(fullName ,username, email, password) VALUES(:fullName ,:username, :email, :password)");
        $this->db->bind('fullName', $data['fullName']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $data['password']);
        if( $this->db->execute()){
            return true;
        }
        return false;

    }

    public function login($username, $password)
    {
        // echo 'username: '.$username.'<br> password: '.$password.'<br>';
        // exit;

        $this->db->query("SELECT * FROM client WHERE username = :username");
        $this->db->bind('username', $username);

        $this->db->execute();

        $row = $this->db->single();
        // echo '<pre>';
        // print_r($row);
        // echo '</pre>';
        // exit;
        $hashedPassword = $row->password;
       
        if(password_verify($password, $hashedPassword) ){
            return $row;
        }
        return false;

    }

    // Check if user email is already taken 
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM client WHERE email = :email');
        $this->db->bind('email', $email);

        $row = $this->db->single();
        //Check row
        if($this->db->rowCount() > 0){
            return true;
        }
        return false;
    }

    public function findUserByUsername($username)
    {
        $this->db->query('SELECT * FROM client WHERE username = :username');
        $this->db->bind('username', $username);

        $row = $this->db->single();
        //Check row
        if($this->db->rowCount() > 0){
            return true;
        }
        return false;
    }

}