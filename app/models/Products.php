<?php

namespace App\Models;

use App\Models\DatabaseInteract;

class Products
{
    public $objectDbInteract;

    public function __construct()
    {
        $this->objectDbInteract = new DatabaseInteract();
    }

    public function listAllProduct()
    {
        return $this->objectDbInteract->listAll('products');
    }


    public function insertProduct($data)
    {
        $this->objectDbInteract->insert('products', $data);
    }

    public function showOneProduct($id)
    {
        return $this->objectDbInteract->showOne('products', $id);
    }

    public  function  updateProductModel($id, $data)
    {
        $this->objectDbInteract->update('products', $id, $data);
    }

    public function deleteProductModel($id)
    {
        $this->objectDbInteract->delete('products', $id);
    }
}
