<?php
class Carts extends Controller
{
    private $cartModel;
    public function __construct()
    {
        $this->cartModel = $this->model('Cart');
    }

    // get cart count
    public function count()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $data = [
                'id_client' => intval($_GET['id_client'])
            ];

            $result = $this->cartModel->getCartCount($data['id_client']);

            echo $result;
        }
    }

    // add item to cart 
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id_product' => intval($_POST['id_product']),
                'id_client' => intval($_POST['id_client']),
                'qte' => intval($_POST['qte'])
            ];

            if ($this->cartModel->checkProduct($data['id_product'], $data['id_client'])) {
                $result = $this->cartModel->increaseQte($data['id_product'], $data['id_client']);
            } else {
                $result = $this->cartModel->addToCart($data);
            }

            // echo json_encode($result);
            // exit;


            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Item added to cart']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error adding item to cart']);
            }
        }
    }

    // increase quantity
    public function increaseQte()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id_product' => intval($_POST['id_product']),
                'id_client' => intval($_POST['id_client'])
            ];

            $result = $this->cartModel->increaseQte($data['id_product'], $data['id_client']);

            if ($result) {
                $total = $this->cartModel->getTotalByClientId($_SESSION['client_session']);
                $qte = $this->cartModel->getCartQteByProductId($data['id_product'], $_SESSION['client_session']);

                echo json_encode(['total' => $total, 'qte' => $qte]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error increasing item quantity']);
            }
        }
    }

    // decrease quantity
    public function decreaseQte()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id_product' => intval($_POST['id_product']),
                'id_client' => intval($_POST['id_client'])
            ];

            $qte = $this->cartModel->getCartQteByProductId($data['id_product'], $_SESSION['client_session']);
            if ($qte > 1) {

                $result = $this->cartModel->decreaseQte($data['id_product'], $data['id_client']);

                if ($result) {
                    $total = $this->cartModel->getTotalByClientId($_SESSION['client_session']);
                    $qte = $this->cartModel->getCartQteByProductId($data['id_product'], $_SESSION['client_session']);

                    echo json_encode(['total' => $total, 'qte' => $qte]);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Error decreasing item quantity']);
                }
            }else{
                http_response_code(500);
                echo  json_encode(['status' => 'error', 'message' => 'you cannot update the cart']);
            }

        }
    }

    // delete item from cart
    public function delete($id)
    {
        if ($this->cartModel->deleteItem($id, $_SESSION['client_session'])) {
            flash('cart_message', 'Item removed from cart');
            redirect('accounts/cart');
        }
    }
}
