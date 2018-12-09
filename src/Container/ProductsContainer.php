<?php

namespace App\Container;

use App\DBAL;

class ProductsContainer extends Container {
    public function __construct(array $parameters = array())
    {
        parent::__construct($parameters);
    }

    public function list() {
        return $this->dal->query('select * from products');
    }

    public function getProductById($id) {
        return $this->dal->query('select * from products where id = ' . $id);
    }

    public function createProduct($object) {
    }

    public function deleteProduct($object) {

    }

}