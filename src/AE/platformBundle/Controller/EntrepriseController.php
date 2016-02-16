<?php

namespace AE\platformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AE\UserBundle\Entity\User;
use AE\platformBundle\Entity\Entreprise;
use AE\platformBundle\Form\EntrepriseType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class EntrepriseController extends Controller
{
    public function newEntrepriseAction(Request $request)
    {

        $user = $this->container->get('security.context')->getToken()->getUser();

        $entreprise = new Entreprise();
        $entreprise->setUser($user);

        $form = $this->createForm(new EntrepriseType(), $entreprise);

        $form->handleRequest($request);

        if ($form->isValid()) {

            $user->setEntreprise($entreprise);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entreprise);
            $em->flush();

            return $this->redirectToRoute('dashboard_user');

        }


        return $this->render('AEplatformBundle:Entreprise:entreprise.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function showEntrepriseAction()
    {

        $entreprise = $this->container->get('security.context')->getToken()->getUser()->getEntreprise();

        if($entreprise) {

            $entreprise_id = $entreprise->getId();
            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('AEplatformBundle:Entreprise')->find($entreprise_id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Entreprise entity.');
            }

            return $this->render('AEplatformBundle:Entreprise:show_entreprise.html.twig', array(
                'entity'      => $entity,
            ));

        } else {

            return $this->redirectToRoute('new_entreprise_user', array(), 301);
        }

    }

}
