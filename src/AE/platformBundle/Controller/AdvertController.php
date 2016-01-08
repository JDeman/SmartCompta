<?php
// src/AE/platformBundle/Controller/AdvertController.php

namespace AE\platformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AdvertController extends Controller
{
    public function homepageAction()
    {
        return $this->render('AEplatformBundle:Advert:homepage.php.twig');
    }

    public function faqAction()
    {
        return $this->render('AEplatformBundle:Advert:faq.php.twig');
    }

    public function newEntrepriseAction(Request $request)
    {

        $entreprise = new Entreprise();

        $form = $this->createForm(new EntrepriseType(), $entreprise);

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($entreprise);
            $em->flush();

            return $this->redirectToRoute('dashboard_user');

        }


        return $this->render('AEUserBundle:Entreprise:entreprise.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}

?>
