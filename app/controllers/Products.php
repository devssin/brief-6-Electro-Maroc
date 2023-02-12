<?php 
class Products extends Controller{
    private $productModel;
    private $categoryModel;
    public function __construct()
    {
        if(!isAdminLoggedIn()){
            flash('not_logged', 'You must login first', "p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300");
            redirect('admin/login');
            exit;
        }
        $this->productModel = $this->model('product');
        $this->categoryModel = $this->model('category');
    }

    public function add(){

        $categories = $this->categoryModel->getCategories();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'code_bar' => trim($_POST['code_bar']),
                'image' => $_FILES['image'] ?? null,
                'description' => trim($_POST['description']),
                'buyPrice' => trim($_POST['buyPrice']),
                'offrePrice' => trim($_POST['offrePrice']),
                'finalPrice' => trim($_POST['finalPrice']),
                'quantity' => trim($_POST['quantity']),
                'category' => trim($_POST['category']),
                'errors' => '',
                'categories' => $categories
            ];

           

            if(empty($data['name'])){
                $data['errors'] .= '<br>Name must be filled';
            }
            if(empty($data['code_bar'])){
                $data['errors'] .= '<br>Code bar must be filled';
            }
            if($data['image'] == null){
                $data['errors'] .= '<br>Image must be filled';
            }
            if(empty($data['description'])){
                $data['errors'] .= '<br>Description must be filled';
            }
            if(empty($data['buyPrice'])){
                $data['errors'] .= '<br>Buy price must be filled';
            }
            if(empty($data['offrePrice'])){
                $data['errors'] .= '<br>Offre price must be filled';
            }
            if(empty($data['finalPrice'])){
                $data['errors'] .= '<br>Final price must be filled';
            }
            if(empty($data['quantity'])){
                $data['errors'] .= '<br>Quantity must be filled';
            }
            if($data['category'] == 0){
                $data['errors'] .= '<br>Category must be Selected';
            }

            if(empty($data['errors'])){
                $data['image'] = URLROOT ."/public/". $this->uploadImg();
                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;
                if($this->productModel->addProduct($data)){
                    flash('product_success', 'Product added successfully', 'p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-300');
                    redirect('dashboard/products');
                }else{
                    die('Something went wrong');
                }
            }else{
                flash('errors',"Errors:<br>" . $data['errors'], 'p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-300');
                $this->view('products/add', $data);
            }

        }else{ 
            $data = [
                'name' => '',
                'code_bar' => '',
                'image' => '',
                'description' => '',
                'buyPrice' => '',
                'offrePrice' => '',
                'finalPrice' => '',
                'quantity' => '',
                'category' => '',
                'errors' => '',
                'categories' => $categories
            ];
            $this->view('products/add', $data);
        }

        
        
    }

    public function edit($id){
        $product = $this->productModel->getSingleProduct($id);
        $categories = $this->categoryModel->getCategories();


        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'code_bar' => trim($_POST['code_bar']),
                'image' => $_FILES['image'] ?? null,
                'description' => trim($_POST['description']),
                'buyPrice' => trim($_POST['buyPrice']),
                'offrePrice' => trim($_POST['offrePrice']),
                'finalPrice' => trim($_POST['finalPrice']),
                'quantity' => trim($_POST['quantity']),
                'category' => trim($_POST['category']),
                'errors' => '',
                'categories' => $categories
            ];

           

            if(empty($data['name'])){
                $data['errors'] .= '<br>Name must be filled';
            }
            if(empty($data['code_bar'])){
                $data['errors'] .= '<br>Code bar must be filled';
            }
            if(empty($data['description'])){
                $data['errors'] .= '<br>Description must be filled';
            }
            if(empty($data['buyPrice'])){
                $data['errors'] .= '<br>Buy price must be filled';
            }
            if(empty($data['offrePrice'])){
                $data['errors'] .= '<br>Offre price must be filled';
            }
            if(empty($data['finalPrice'])){
                $data['errors'] .= '<br>Final price must be filled';
            }
            if(empty($data['quantity'])){
                $data['errors'] .= '<br>Quantity must be filled';
            }
            if($data['category'] == 0){
                $data['errors'] .= '<br>Category must be Selected';
            }

            if(empty($data['errors'])){

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                if(!empty($data['image']['name'])){
                    $data['image'] = URLROOT ."/public/". $this->uploadImg();
                }else{
                    $data['image'] = $product->img;
                }
              
                
                if($this->productModel->updateProduct($data)){
                    flash('product_success', 'Product updatet successfully', 'p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-300');
                    redirect('dashboard/products');
                }else{
                    die('Something went wrong');
                }
            }else{
                flash('errors',"Errors:<br>" . $data['errors'], 'p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-300');
                $this->view('products/add', $data);
            }

        }else{ 
            $data = [
                'id' => $id,
                'name' => $product->name,
                'code_bar' => $product->code_bar,
                'image' => $product->img,
                'description' => $product->description,
                'buyPrice' =>   $product->buyPrice,
                'offrePrice' => $product->offrePrice,
                'finalPrice' => $product->finalPrice,
                'quantity' => $product->qte,
                'category' =>  $product->id_cat,
                'errors' => '',
                'categories' => $categories
            ];
            $this->view('products/edit', $data);
        }
    }

    public function delete($id)
    {
        if ($this->productModel->deleteProduct($id)) {
            flash("product_success", "Product deleted successfully");
            redirect('dashboard/products');
        } else {
            die("somthing went wrong");
        }
    }

    public function uploadImg()
    {
        $image = $_FILES['image'];
        $imagePath = "img/". randomString(8)."/".$image['name'];
        mkdir(dirname($imagePath));
        move_uploaded_file($image['tmp_name'],$imagePath);
        return $imagePath;

    }
    

}