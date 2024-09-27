<?php

namespace App\Controllers;

use App\Models\Products;

class ProductsController
{
    public $objectProduct;

    public function __construct()
    {
        $this->objectProduct = new Products();
    }

    public function getAllProduct()
    {
        $title =  'Danh sach san pham';
        $view =  'products/list.php';

        $products = $this->objectProduct->listAllProduct();
        require_once PATH_VIEW_ADMIN . 'master.php';
    }

    public function CreateProduct()
    {
        $title =  'Them san pham';
        $view =  'products/create.php';

        if (!empty($_POST)) {
            $data = [
                "name" => $_POST['name'],
                "price" => $_POST['price'],
                "quantity" => $_POST['quantity'],
            ];
            $products = $this->objectProduct->insertProduct($data);
        }
        require_once PATH_VIEW_ADMIN . 'master.php';
    }

    public function UpdateProduct($id)
    {
        $product =  $this->objectProduct->showOneProduct($id);

        if (!empty($_POST)) {

            $checkStatus =  $_POST['quantity'] >= 1 ? 1 : 0;

            $data = [
                "name" => $_POST['name'],
                "price" => $_POST['price'],
                "quantity" => $_POST['quantity'],
                "status" => $checkStatus,
            ];
            $this->objectProduct->updateProductModel($id, $data);
            header('Location: ' . BASE_URL);
        }


        $title =  'Cap nhat san pham';
        $view =  'products/update.php';


        require_once PATH_VIEW_ADMIN . 'master.php';
    }
    public function DeleteProduct($id)
    {
        $title =  'Cap nhat san pham';
        $view =  'products/list.php';
        $products =  $this->objectProduct->listAllProduct();
        $this->objectProduct->deleteProductModel($id);
        header('Location: ' . BASE_URL);
    }
}
