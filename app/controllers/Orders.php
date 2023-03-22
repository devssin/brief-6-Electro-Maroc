<?php
class Orders extends Controller
{
    private $clientModel;
    private $cartModel;
    private $commandeModel;
    private $productModel;
    public function __construct()
    {
        if(!isClientLoggedIn() && !isAdminLoggedIn()){
            flash('not_logged', 'You must login first', "p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300");
            redirect('clients/login');
            exit;
        }
        $this->clientModel = $this->model('Client');
        $this->cartModel = $this->model('Cart');
        $this->commandeModel = $this->model('Order');
        $this->productModel = $this->model('Product');
    }


   

    public function checkout()
    {
        $client = $this->clientModel->findUserById($_SESSION['client_session']);
        $cartItems = $this->cartModel->getCartByClientId($_SESSION['client_session']);
        $total = $this->cartModel->getTotalByClientId($_SESSION['client_session']);



        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id_client' => $_SESSION['client_session'],
                'fullName' => trim($_POST['fullName']),
                'tel' => trim($_POST['phone']),
                'email' => trim($_POST['email']),
                'adress' => trim($_POST['adress']),
                'ville' => trim($_POST['ville']),
                'code_postal' => trim($_POST['code_postal']),
                'cartItems' => $cartItems,
                'total' => $total


            ];
        } else {

            $data = [
                'id_client' => $client->id,
                'fullName' => $client->fullName,
                'tel' => $client->tel,
                'email' => $client->email,
                'adress' => $client->adress,
                'ville' => $client->ville,
                'code_postal' => $client->code_postal,
                'cartItems' => $cartItems,
                'total' => $total
            ];

            $this->view('clients/checkout', $data);
        }
    }

    public function confirme(){
        $client_id = $_SESSION['client_session'];
        $cartItems = $this->cartModel->getCartByClientId($client_id);
        $total = $this->cartModel->getTotalByClientId($client_id);

        if($this->commandeModel->addOrder($client_id, $cartItems)){
            echo json_encode(['status' => 'success', 'message' => 'Order added successfully', 'total' => $total]);
        }else{
            echo json_encode(['status' => 'error', 'message' => 'Somthing went wrong']);
        }
    }

    public function products(){

        $id_commande = $_GET['id_commande'];
        $products = $this->commandeModel->getProductsByCommande($id_commande);
        
        $data = json_encode($products);

        echo $data;
        
    }

    public function confirmeOrder($id_commande){
        if($this->commandeModel->confirmeOrder($id_commande)){
            flash('order_success', 'Order confirmed successfully', "p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-300");
            redirect('dashboard/orders');
        }else{
            flash('order_errors', 'Somthing went wrong', "p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-300");
            redirect('dashboard/orders');
        }
    }

    public function deliverOrder($id_commande){
        if($this->commandeModel->deliverOrder($id_commande)){
            flash('order_success', 'Order delivered successfully', "p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-300");
            redirect('dashboard/orders');
        }else{
            flash('order_errors', 'Somthing went wrong', "p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-300");
            redirect('dashboard/orders');
        }

    }

    public function cancelOrder($id_commande){

        
        if($this->commandeModel->cancelOrder($id_commande)){
            flash('order_success', 'Order canceled successfully', "p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-300");
            redirect('dashboard/orders');
        }else{
            flash('order_errors', 'Somthing went wrong', "p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-300");
            redirect('dashboard/orders');
        }
    }

    public function bill($id_commande){
        $commande = $this->commandeModel->findCommandeById($id_commande);
        $products = $this->commandeModel->getProductsByCommande($id_commande);
        $totalPrice = $this->commandeModel->getTotalPriceByCommandeId($id_commande);
        
        $data = [
            'commande' => $commande, 
            'products' => $products,
            'totalPrice' => $totalPrice
        ];

        $this->view('pages/bill', $data);
    }

    
}

