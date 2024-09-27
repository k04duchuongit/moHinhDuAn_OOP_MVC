<?php
require_once './config/support.php';
require_once './config/environment.php';
require_once './config/ConnectDb.php';
require_once './app/models/DatabaseInteract.php';
require_once './app/models/Products.php';
require_once './app/controllers/ProductsController.php';

use  App\Controllers\ProductsController;

$controllerProduct = new ProductsController();

$act = $_GET['act'] ?? '/';            // ?? toan tu nulish check null or undefined

match ($act) {
    '/' => $controllerProduct->getAllProduct(),
    'create' =>  $controllerProduct->CreateProduct(),
    'update' => $controllerProduct->UpdateProduct($_GET['id']),
    'delete' => $controllerProduct->DeleteProduct($_GET['id']),
    default => "Không có giá trị phù hợp",
};
