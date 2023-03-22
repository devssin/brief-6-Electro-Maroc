<?php 
class Dashboard extends Controller{
    private $productModel;
    private $categoryModel;
    private $orderModel;
    private $clientModel;

    public function __construct()
    {
        if(!isAdminLoggedIn() ){
            flash('not_logged', 'You must login first', "p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300");
            redirect('admins/login');
            exit;
        }
        $this->productModel = $this->model('product');
        $this->categoryModel = $this->model('category');
        $this->orderModel = $this->model('order');
        $this->clientModel = $this->model('client');
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

    public function clients(){
        
    }

    public function Orders(){
        $orders = $this->orderModel->getOrders();
        foreach ($orders as $order) {
            $order->totalProducts = $this->orderModel->getTotalProductByCommandeId($order->id);
            
            $order->totalPrice = $this->orderModel->getTotalPriceByCommandeId($order->id);
        }
        $data = [
            'orders' => $orders
        ];

        // echo '<pre>';
        // print_r($orders);
        // echo '</pre>';
        // exit;
        $this->view('dashboard/orders', $data);
    }
    
    public function client(){
        $client_id = $_GET['client_id'];
        $client = $this->clientModel->findUserById($client_id);
        
        echo json_encode($client);
    }




   
}