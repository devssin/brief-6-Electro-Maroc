<?php 
class Admins extends Controller{
    private $adminModel;
    public function __construct()
    {
        $this->adminModel = $this->model('admin');
    }

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            if (empty($data['username'])) {
                $data['username_err'] = 'username must be filled';
            }
            if (empty($data['password'])) {
                $data['password_err'] = 'Password must be filled';
            }

            if(!$this->adminModel->findUserByUsername($data['username'])){
                $data['username_err'] = 'User not found';
            }

            if (empty($data['username_err']) && empty($data['password_err'])) {
                $loggedInUser = $this->adminModel->login($data['username'], $data['password']);
                if($loggedInUser){
                    // die('success');
                    flash('login_success', "You are now logged in");
                    $this->createUserSession($loggedInUser);
                    

                }else{
                    $data['password_err'] = "Password is incorrect";
                    $this->view('admin/login',$data);
                }
            } else {
                $this->view('admin/login', $data);
            }
        } else {

            $data = [
                'username' => '',
                'password' => '',
                'username_err' => '',
                'password_err' => '',
            ];
            $this->view('admin/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['admin_session'] = $user->username;
        redirect('dashboard/products');
    }

    public function logout(){
      
        unset($_SESSION['admin_session']);
        session_destroy();
        redirect('admins/login');
    }
}