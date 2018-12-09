<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Container\ProductsContainer;

class ProductsController extends AbstractController
{
    
    public function listAllProducts(Request $request)
    {
        $result = (new ProductsContainer())->list();
        return $this->json($result);
    }

    public function getProductById(Request $request)
    {
        $id = $request->get('id');
        $con = (new ProductsContainer())->list();
    }

    public function listAllProducts()
    {
        $con = (new ProductsContainer())->list();
    }

}