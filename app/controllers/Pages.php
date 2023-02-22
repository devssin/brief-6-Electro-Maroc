<?php

class Pages extends Controller {
    private $categoryModel;
    private $productModel;
    public function __construct()
    {
        $this->categoryModel = $this->model('Category');
        $this->productModel = $this->model('Product');
    }

    public function index(){
        
        $categories = $this->categoryModel->getCategories();
        $products = array_slice($this->productModel->getProducts(), 0, 8);
        $data = [
            'categories' => $categories,
            'products' => $products
        ];
        $this->view("pages/index", $data);
    }
    public function about(){
        $data = [
            'title' => 'About us',
        ];
        $this->view('pages/about', $data);
    }
}