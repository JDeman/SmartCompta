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
            $impotRevenu = $impotsMensuels->getImpotSurRevenu();
            $impotFormationPro = $impotsMensuels->getImpotFormationPro();
            $cotisationsSoc = $impotsMensuels->getCotisationsSociales();
            $tauxGlobal = $impotsMensuels->getTauxGlobal();


            $montantImposable = $this->calculMontantImposableAction($chiffreAffaire, $tauxGlobal);
            $montantImpotRevenu = $this->calculMontantImpotRevenuAction($chiffreAffaire, $impotRevenu);
            $montantImpotFormationPro = $this->calculMontantImpotFormationProAction($chiffreAffaire, $impotFormationPro);
            $montantCotisationsSoc = $this->calculMontantCotisationsSocAction($chiffreAffaire, $cotisationsSoc);
        } else {
            $montantImposable = 0;
            $montantImpotRevenu = 0;
            $montantImpotFormationPro = 0;
            $montantCotisationsSoc = 0;
        }

        return $this->render('AEplatformBundle:Dashboard:dashboard.php.twig',
            array(
                'chiffreAffaire' => $chiffreAffaire,
                'montantImposable' => $montantImposable,
                'montantImpotSurRevenu' => $montantImpotRevenu,
                'montantImpotFormationPro' => $montantImpotFormationPro,
                'montantCotisationsSoc' => $montantCotisationsSoc
                ));
    }

    public function calculMontantImposableAction ($chiffreAffaire, $tauxGlobal)
    {
        $montantImposable = $chiffreAffaire * $tauxGlobal;
        return $montantImposable;
    }

    public function calculMontantImpotRevenuAction ($chiffreAffaire, $impotRevenu)
    {
        $montantImpotRevenu = $chiffreAffaire * $impotRevenu;
        return $montantImpotRevenu;
    }

    public function calculMontantImpotFormationProAction ($chiffreAffaire, $impotFormationPro)
    {
        $montantImpotFormationPro = $chiffreAffaire * $impotFormationPro;
        return $montantImpotFormationPro;
    }

    public function calculMontantCotisationsSocAction ($chiffreAffaire, $cotisationsSoc)
    {
        $montantCotisationsSoc = $chiffreAffaire * $cotisationsSoc;
        return $montantCotisationsSoc;
    }

}

?>
