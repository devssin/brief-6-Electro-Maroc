<?php 
class Shop extends Controller {
    public function __construct()
    {
        
    }

    public function index()
    {
        $this->view('shop/index');

    }

    public function single(){
        $this->view('shop/single');
    }
}