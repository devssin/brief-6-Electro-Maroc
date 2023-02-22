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

    public function category($id)
    {

        if (intval($id) === 0) {
            $products = $this->productModel->getProducts();
        } else {
            $products = $this->productModel->getProductsByCategory($id);
        }
        $data = json_encode($products);
        echo $data;
    }

    public function search($name = '')
    {
        if (empty($name)) {
            $products = $this->productModel->getProducts();
        } else {
            $products = $this->productModel->searchProduct($name);
        }
        $data = json_encode($products);
        echo $data;
    }

    public function sort($option)
    {
        switch ($option) {
            case 1:
                $products = $this->productModel->getProductsByPriceDesc();
                break;
            case 2:
                $products = $this->productModel->getProductsByPriceAsc();
                break;
            default:
                $products = $this->productModel->getProducts();
                break;
        }
        $data = json_encode($products);
        echo $data;
    }
}
