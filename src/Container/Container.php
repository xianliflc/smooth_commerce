<?php

namespace App\Container;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\HttpFoundation\ParameterBag;
use App\DBAL\DBAL;

class Container extends ParameterBag {

    protected $dal;

    public function __construct(array $parameters = array())
    {
        $this->dal = new DBAL('spicy');
    }

}