<?php

namespace CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CrudController extends Controller
{
    public function indexAction()
    {
        return $this->render('CustomerBundle:Crud:index.html.twig');
    }
}
