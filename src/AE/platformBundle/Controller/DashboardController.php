<?php
// src/AE/platformBundle/Controller/AdvertController.php

namespace AE\platformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DashboardController extends Controller
{
    public function dashboardAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $chiffreAffaire = $user->getEntreprise()->getChiffreDAffaireMensuel();

        return $this->render('AEplatformBundle:Dashboard:dashboard.php.twig', array('chiffreAffaire' => $chiffreAffaire));
    }

}

?>
