<?php
class Accounts extends Controller
{
    private $clientModel;
    private $cartModel;
    private $orderModel;
    public function __construct()
    {
        if (!isClientLoggedIn()) {
            flash('not_logged', 'You must login first', "p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300");
            redirect('clients/login');
            exit;
        }
        $this->clientModel = $this->model('Client');
        $this->cartModel = $this->model('Cart');
        $this->orderModel = $this->model('Order');


    }
    public function index()
    {
        $client = $this->clientModel->findUserById($_SESSION['client_session']);

        $this->view('clients/account', $client);
    }

    public function editInfos($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'fullName' => trim($_POST['fullName']),
                'tel' => trim($_POST['phone']),
                'adress' => trim($_POST['adress']),
                'ville' => trim($_POST['ville']),
                'code_postal' => trim($_POST['code_postal']),
            ];



            if ($this->clientModel->updateInfos($data)) {
                flash('infos_success', 'Infos updated successfully', "p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-300");
                redirect('accounts');
            } else {
                flash('infos_errors', 'Somthing went wrong', "p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-300");
                redirect('accounts');
            }

        } else {

            $client = $this->clientModel->findUserById($_SESSION['client_session']);
            $data = [
                'id' => $id,
                'fullName' => $client->fullName,
                'username' => $client->username,
                'email' => $client->email,
                'phone' => $client->tel,
                'adress' => $client->adress,
                'ville' => $client->ville,
                'code_postal' => $client->code_postal,
                'errors' => ''
            ];

            $this->view('clients/editInfos', $data);
        }
    }

    public function cart(){

        $cart = $this->cartModel->getCartByClientId($_SESSION['client_session']);
        $total = $this->cartModel->getTotalByClientId($_SESSION['client_session']);
        $data = [
            'cart_items' => $cart,
            'total' => $total,
        ];
        
        $this->view('clients/cart', $data);
    }

    public function orders(){

        $orders = $this->orderModel->getOrdersByClientId($_SESSION['client_session']);
        foreach ($orders as $order) {
            $order->totalProducts = $this->orderModel->getTotalProductByCommandeId($order->id);
            
            $order->totalPrice = $this->orderModel->getTotalPriceByCommandeId($order->id);
        }
        $data = [
            'orders' => $orders
        ];
        $this->view('clients/orders', $data);
    }


    public function cancelOrder($id_commande){
        if($this->orderModel->cancelOrder($id_commande)){
            flash('order_success', 'Order canceled successfully', "p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-300");
            redirect('accounts/orders');
        }else{
            flash('order_errors', 'Somthing went wrong', "p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-300");
            redirect('accounts/orders');
        }
    }
}
