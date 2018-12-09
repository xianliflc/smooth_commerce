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
        $query = 'select * from categories';
        return $this->dql->query($query);
    }

}