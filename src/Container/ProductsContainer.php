<?php

namespace App\Container;

use App\DBAL;

class ProductsContainer extends Container {
    public function __construct(array $parameters = array())
    {
        parent::__construct($parameters);
    }

    public function list() {
        return $this->dal->selectAll('products');
    }

    public function getById($id) {
        return $this->dal->query('select * from products where id = ' . $id);
    }

    public function createProduct($object) {
        $result =  $this->dal->create('', $object);
        return $result->affectedRows > 0;
    }

    public function deleteProduct($id) {
        $result =  $this->dal->delete($id);
        return $result->affectedRows > 0;
    }

}