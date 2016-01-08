<?php

namespace AE\ComptaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AEComptaBundle:Default:index.html.twig', array('name' => $name));
    }
}
