<?php

namespace AE\platformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function dashboardAction($name)
    {
        return $this->render('AEplatformBundle:Default:index.html.twig', array('name' => $name));
    }
}
