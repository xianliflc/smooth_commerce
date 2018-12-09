<?php

namespace App\Container;

use App\DBAL;

class CategoriesContainer extends Container {
    public function __construct(array $parameters = array())
    {
        parent::__construct($parameters);
        $this->dal->useSchema('spicy');
    }

    public function list() {
        return $this->dal->selectAll('categories');
    }

}