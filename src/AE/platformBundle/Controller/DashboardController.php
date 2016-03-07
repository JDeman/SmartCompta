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

        $entreprise_id = $entreprise->getId();

        $em = $this->getDoctrine()->getManager();
        $impotsMensuels = $em->getRepository('AEComptaBundle:ImpotsMensuels')->findOneByEntreprise($entreprise_id);

        if($entreprise) {
            $chiffreAffaire = $entreprise->getChiffreDAffaireMensuel();

        } else {
            $chiffreAffaire = 0;
        }

        if ($impotsMensuels) {
            $tauxGlobal = $impotsMensuels->getTauxGlobal();
            $montantImposable = $this->calculMontantImposableAction($chiffreAffaire, $tauxGlobal);
        } else {
            $montantImposable = 0;
        }

        return $this->render('AEplatformBundle:Dashboard:dashboard.php.twig',
            array(
                'chiffreAffaire' => $chiffreAffaire,
                'montantImposable' => $montantImposable,
                ));
    }

    public function calculMontantImposableAction ($chiffreAffaire, $tauxGlobal)
    {
        $montantImposable = $chiffreAffaire * $tauxGlobal;
        return $montantImposable;
    }

}

?>
