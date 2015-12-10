<?php

namespace AE\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class UserController extends Controller
{

    public function dashboardAction($name)
    {
        return $this->render('AEUserBundle:Default:index.html.twig', array('name' => $name));
    }

}
