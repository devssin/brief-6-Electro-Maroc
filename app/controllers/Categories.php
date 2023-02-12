<?php 
class Categories extends Controller{
    private $categoryModel;
    public function __construct()
    {
        if(!isAdminLoggedIn()){
            flash('not_logged', 'You must login first', "p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300");
            redirect('admins/login');
            exit;
        }
        $this->categoryModel = $this->model('category');

    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'image' => $_FILES['image'] ?? null,
                'description' => trim($_POST['description']),
                'errors' => ''
            ];

            if(empty($data['name'])){
                $data['errors'] .= '<br>Name must be filled';
            }
            if(empty($data['image']['name'])){
                $data['errors'] .= '<br>Image must be filled';
            }
            if(empty($data['description'])){
                $data['errors'] .= '<br>Description must be filled';
            }

            
            if(empty($data['errors'])){
                $data['image'] = URLROOT . '/public/'. $this->uploadImg();
                if($this->categoryModel->addCategory($data)){
                    flash('category_success', 'Category added successfully', "p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-300");
                    redirect('dashboard/categories');
                }else{
                    flash('category_errors', 'Somthing went wrong', "p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-300");
                    redirect('dashboard/categories');
                }
            }else{
                flash('category_errors', 'Errors: <br>' . $data['errors'], "p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-300");
                $this->view('categories/add', $data);
            }
        }else{
            $data = [
                'name' => '',
                'image' => '',
                'description' => '',
                'errors' => ''
            ];
            $this->view('categories/add', $data);
        }
    }

    public function edit($id){
        $category = $this->categoryModel->getCategoryById($id);
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'image' => $_FILES['image'] ?? null,
                'description' => trim($_POST['description']),
                'errors' => ''
            ];

            if(empty($data['name'])){
                $data['errors'] .= '<br>Name must be filled';
            }
            
            if(empty($data['description'])){
                $data['errors'] .= '<br>Description must be filled';
            }

            
            if(empty($data['errors'])){
                if(!empty($data['image']['name'])){
                    $data['image'] = URLROOT . '/public/'. $this->uploadImg();
                }else{
                    $data['image'] = $category->img;
                }

               
                if($this->categoryModel->updateCategory($data)){
                    flash('category_success', 'Category added successfully', "p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-300");
                    redirect('dashboard/categories');
                }else{
                    flash('category_errors', 'Somthing went wrong', "p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-300");
                    redirect('dashboard/categories');
                }
            }else{
                flash('category_errors', 'Errors: <br>' . $data['errors'], "p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-300");
                $this->view('categories/edit', $data);
            }
        }else{
            $data = [
                'id' => $id,
                'name' => $category->name,
                'image' => $category->img,
                'description' => $category->description,
                'errors' => ''
            ];
            $this->view('categories/edit', $data);
        }
        

    }

    public function delete($id){
        if($this->categoryModel->deleteCategory($id)){
            flash('category_success', 'Category deleted successfully', "p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-300");
            redirect('dashboard/categories');
        }else{
            flash('category_errors', 'Somthing went wrong', "p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-300");
            redirect('dashboard/categories');
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