<?php
class Shop extends Controller
{
    private $productModel;
    private $categoryModel;
    public function __construct()
    {
        $this->productModel = $this->model('product');
        $this->categoryModel = $this->model('category');
    }

    public function index()
    {
        $products = $this->productModel->getProducts();
        $categories = $this->categoryModel->getCategories();
        $data = [
            'products' => $products,
            'categories' => $categories
        ];
        $this->view('shop/index', $data);
    }

    public function single($id)
    {
        $product = $this->productModel->getSingleProduct($id);
        
        $this->view('shop/single', $product);
    }
}
