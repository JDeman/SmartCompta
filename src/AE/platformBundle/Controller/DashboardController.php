<?php
// src/AE/platformBundle/Controller/AdvertController.php

namespace AE\platformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DashboardController extends Controller
{
    public function dashboardAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $entreprise = $user->getEntreprise();

        if($entreprise) {
            $chiffreAffaire = $user->getEntreprise()->getChiffreDAffaireMensuel();
        } else {
            $chiffreAffaire = 0;
        }

        return $this->render('AEplatformBundle:Dashboard:dashboard.php.twig', array('chiffreAffaire' => $chiffreAffaire));
    }

}

?>
