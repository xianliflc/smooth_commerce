<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Container\CategoriesContainer;

class CategoriesController extends AbstractController
{
    
    public function listAllCategories()
    {
        $con = (new CategoriesContainer())->list();
        return $this->json($con);
    }

}