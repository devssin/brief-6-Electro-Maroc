<?php

class Clients extends Controller {
    private $clientModel;
    public function __construct()
    {
        $this->clientModel = $this->model('Client');
    }

    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // Init data
            $data = [
                'fullName' => trim($_POST['fullName']),
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'errors' => ''
            ];

            //validate fullName 
            if(empty($data['fullName'])){
                $data['errors'] .= '<br>Please enter full name';
            }

            // Validate email
            if(empty($data['email'])){
                $data['errors'] .= '<br>Please enter email';
            } else {
                // Check email
                if($this->clientModel->findUserByEmail($data['email'])){
                    $data['errors'] .= '<br>Email is already taken';
                }
            }

            // Validate name
            if(empty($data['username'])){
                $data['errors'] .= '<br>Please enter name';
            }else{
                // Check name
                if($this->clientModel->findUserByUsername($data['username'])){
                    $data['errors'] .= '<br>Username is already taken';
                }
            }
            // Validate password
            if(empty($data['password'])){
                $data['errors'] .= '<br>Please enter password';
            } elseif(strlen($data['password']) < 6){
                $data['errors'] .= '<br>Password must be at least 6 characters';
            } 
            // Validate confirm password
            if(empty($data['confirmPassword'])){
                $data['errors'] .= '<br>Please confirm password';
            } else {
                if($data['password'] != $data['confirmPassword']){
                    $data['errors'] .= '<br>Passwords do not match';
                }
            }
            // Make sure errors are empty
            if(empty($data['errors'])){
                // Validated
                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register user
                if($this->clientModel->register($data)){
                    flash('register_success', 'You are registered and can log in');
                    redirect('clients/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                flash('register_errors', 'Errors: <br>' . $data['errors'], "p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-300");
                $this->view('clients/register', $data);
            }
        } else {
            // Init data
            $data = [
                'fullName' => '',
                'username' => '',
                'email' => '',
                'password' => '',
                'confirmPassword' => '',
                'errors' => ''
            ];
            // Load view
            $this->view('clients/register', $data);
        }

    }
    public function login()
    {

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // Init data
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'errors' => ''
            ];
            // Validate username
            if(empty($data['username'])){
                $data['errors'] .= '<br>Please enter username';
            }
            // Validate password
            if(empty($data['password'])){
                $data['errors'] .= '<br>Please enter password';
            }
            // Check for user/email
            if($this->clientModel->findUserByUsername($data['username'])){
                // User found
            } else {
                // User not found
                $data['errors'] .= '<br>No user found';
            }
            // Make sure errors are empty
            if(empty($data['errors'])){
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->clientModel->login($data['username'], $data['password']);
                if($loggedInUser){
                    // Create session
                    $this->createUserSession($loggedInUser);
                    flash('login_success', 'You are logged in', "p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-300");
                } else {
                    $data['errors'] .= '<br>Password incorrect';
                    flash('login_errors', 'Errors: <br>' . $data['errors'], "p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-300");
                    $this->view('clients/login', $data);
                }
            } else {
                // Load view with errors
                flash('login_errors', 'Errors: <br>' . $data['errors'], "p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-300");
                $this->view('clients/login', $data);
            }
        } else {
            // Init data
            $data = [
                'username' => '',
                'password' => '',
                'errors' => ''
            ];
            // Load view
            $this->view('clients/login', $data);
        }
    }
    public function createUserSession($user)
    {

        $_SESSION['client_session'] = $user->id;
        $_SESSION['client_username'] = $user->username;
        redirect('accounts');
    }

    public function logout()
    {
        unset($_SESSION['client_session']);
        unset($_SESSION['client_username']);
        session_destroy();
        redirect('clients/login');
    }

    // client ajax

   
}