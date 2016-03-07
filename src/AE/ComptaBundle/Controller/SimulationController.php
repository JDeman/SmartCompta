<?php

namespace AE\ComptaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AE\ComptaBundle\Entity\ImpotsMensuels;

class SimulationController extends Controller
{

    public function calculImpotRevenuAction($entreprise)
    {
        /* Informations relatives à l'imposition */
        $activite = $entreprise->getActivite();

        /* Conditions */
        switch ($activite)
        {
            case "PrestationDeService";
                $impotRevenu = 1.7/100;
                return $impotRevenu;
                break;

            case "VenteDeMarchandise";
                $impotRevenu = 1/100;
                return $impotRevenu;
                break;

            case "AutresPrestationsDeService";
                $impotRevenu = 2.2/100;
                return $impotRevenu;
                break;

            case "ActiviteLiberale";
                $impotRevenu = 2.2/100;
                return $impotRevenu;
                break;

        }

    }

    public function calculFormationProAction($entreprise)
    {
        /* Informations relatives à l'imposition */
        $activite = $entreprise->getActivite();

        /* Conditions */
        switch ($activite)
        {
            case "PrestationDeService";
                $formationPro = 0.3/100;
                return $formationPro;
                break;

            case "VenteDeMarchandise";
                $formationPro = 0.1/100;
                return $formationPro;
                break;

            case "AutresPrestationsDeService";
                $formationPro = 0.2/100;
                return $formationPro;
                break;

            case "ActiviteLiberale";
                $formationPro = 0.2/100;
                return $formationPro;
                break;

        }

    }

    public function calculCotisationsSocAction ($entreprise)
    {

        /* Informations relatives à l'imposition */
        $activite = $entreprise->getActivite();
        $accre = $entreprise->getAccre();

        /* Conditions */
        switch ($activite) {

            case "PrestationDeService";
                switch ($accre)
                {
                    case 0;
                        $cotisationsSoc = 22.9/100;
                        return $cotisationsSoc;
                        break;

                    case 1;
                        $cotisationsSoc = 5.8/100;
                        return $cotisationsSoc;
                        break;
                }
                break;

            case "VenteDeMarchandise";
                switch ($accre)
                {
                    case 0;
                        $cotisationsSoc = 13.3/100;
                        return $cotisationsSoc;
                        break;

                    case 1;
                        $cotisationsSoc = 3.4/100;
                        return $cotisationsSoc;
                        break;
                }
                break;

            case "AutresPrestationsDeService";
                switch ($accre)
                {
                    case 0;
                        $cotisationsSoc = 22.9/100;
                        return $cotisationsSoc;
                        break;

                    case 1;
                        $cotisationsSoc = 5.8/100;
                        return $cotisationsSoc;
                        break;
                }
                break;

            case "ActiviteLiberale";
                switch ($accre)
                {
                    case 0;
                        $cotisationsSoc = 22.9/100;
                        return $cotisationsSoc;
                        break;

                    case 1;
                        $cotisationsSoc = 5.8/100;
                        return $cotisationsSoc;
                        break;
                }
                break;

        }
    }

    public function calculTauxGlobalAction ($entreprise)
    {

        /* Informations relatives à l'imposition */
        $liberatoire = $entreprise->getLiberatoire();
        $impotRevenu = $this->calculImpotRevenuAction($entreprise);
        $cotisationsSoc = $this->calculCotisationsSocAction($entreprise);
        $formationPro = $this->calculFormationProAction($entreprise);

        /* Conditions */
        switch ($liberatoire) {
            case 1;
                $tauxGlobal = $cotisationsSoc + $formationPro;
                return $tauxGlobal;
                break;

            case 0;
                $tauxGlobal = $impotRevenu + $cotisationsSoc + $formationPro;
                return $tauxGlobal;
                break;
        }

    }

    public function saveImpotsMensuelsAction ()
    {
        $entreprise = $this->container->get('security.context')->getToken()->getUser()->getEntreprise();

        $impotRevenu = $this->calculImpotRevenuAction($entreprise);
        $cotisationsSoc = $this->calculCotisationsSocAction($entreprise);
        $formationPro = $this->calculFormationProAction($entreprise);
        $tauxGlobal = $this->calculTauxGlobalAction($entreprise);

        $impotsMensuels = new ImpotsMensuels();
        $impotsMensuels->setDate(new \Datetime());
        $impotsMensuels->setImpotSurRevenu($impotRevenu);
        $impotsMensuels->setCotisationsSociales($cotisationsSoc);
        $impotsMensuels->setImpotFormationPro($formationPro);
        $impotsMensuels->setTauxGlobal($tauxGlobal);
        $impotsMensuels->setEntreprise($entreprise);

        $em = $this->getDoctrine()->getManager();
        $em->persist($impotsMensuels);
        $em->flush();

        return $this->redirectToRoute('dashboard_user');

    }

    public function updateImpotsMensuelsAction()
    {
        $entreprise = $this->container->get('security.context')->getToken()->getUser()->getEntreprise();
        $entreprise_id = $entreprise->getId();

        $impotRevenu = $this->calculImpotRevenuAction($entreprise);
        $cotisationsSoc = $this->calculCotisationsSocAction($entreprise);
        $formationPro = $this->calculFormationProAction($entreprise);
        $tauxGlobal = $this->calculTauxGlobalAction($entreprise);

        $em = $this->getDoctrine()->getManager();
        $impotsMensuels = $em
            ->getRepository('AEComptaBundle:ImpotsMensuels')
            ->findOneByEntreprise($entreprise_id);

        if (!$impotsMensuels) {
            throw $this->createNotFoundException('Entité ImpotsMensuels impossible à trouver.');
        }

        $impotsMensuels->setDate(new \Datetime());
        $impotsMensuels->setImpotSurRevenu($impotRevenu);
        $impotsMensuels->setCotisationsSociales($cotisationsSoc);
        $impotsMensuels->setImpotFormationPro($formationPro);
        $impotsMensuels->setTauxGlobal($tauxGlobal);

        $em->flush();

        return $this->redirectToRoute('dashboard_user');

    }

}