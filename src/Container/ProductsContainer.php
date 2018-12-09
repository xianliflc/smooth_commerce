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

    public function getById($id) {
        return $this->dal->query('select * from products where id = ' . $id);
    }

    public function createProduct($object) {
        return $this->dal->create();
    }

    public function deleteProduct($id) {
        return $this->dal->delete($id);
    }

}