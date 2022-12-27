<?php

class Clients extends Controller {
    public function __construct()
    {
        
    }

    public function register()
    {
        $this->view('clients/register');
    }
    public function login()
    {
        $this->view('clients/login');
    }

    public function account(){
        $this->view('clients/account');
    }
}