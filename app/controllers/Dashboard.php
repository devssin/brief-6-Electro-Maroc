<?php 
class Dashboard extends Controller{
    private $productModel;
    private $categoryModel;
    public function __construct()
    {
        if(!isAdminLoggedIn()){
            flash('not_logged', 'You must login first', "p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300");
            redirect('admins/login');
            exit;
        }
        $this->productModel = $this->model('product');
        $this->categoryModel = $this->model('category');
           
    }

    public function products(){
        $products = $this->productModel->getProducts();

        $data = [
            'products' => $products
        ];

        $this->view('dashboard/products', $data);
    }

    public function categories(){
        $categories = $this->categoryModel->getCategories();
        $data = [
            'categories' => $categories
        ];
        $this->view('dashboard/categories', $data);
    }

   
}