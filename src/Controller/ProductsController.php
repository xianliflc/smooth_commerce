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
        $result = (new ProductsContainer())->getById();
        return $this->json($result);
    }

    public function deleteProduct(Request $request)
    {
        $id = $request->get('id');
        $result = (new ProductsContainer())->deleteById($id);
        return $this->json($result);
    }

    public function createProduct(Request $request)
    {
        try {
            $data = json_decode($request->getContent());
            $result = (new ProductsContainer())->create($data);
            return $this->json($result);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'error' => ['message' => $e->getMessage()]]);
        }

    }

}