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

        $form = $this->createCreateForm($entreprise);

        $form->handleRequest($request);

        if ($form->isValid()) {

            $user->setEntreprise($entreprise);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entreprise);
            $em->flush();

            return $this->redirectToRoute('ae_compta_simulation_save');

        }

        return $this->render('AEplatformBundle:Entreprise:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Entreprise entity.
     *
     * @param Entreprise $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Entreprise $entity)
    {
        $form = $this->createForm(new EntrepriseType(), $entity, array(
            'action' => $this->generateUrl('new_entreprise_user'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer'));

        return $form;
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

            return $this->render('AEplatformBundle:Entreprise:show.html.twig', array(
                'entity'      => $entity,
            ));

        } else {

            return $this->redirectToRoute('new_entreprise_user', array(), 301);
        }

    }

    /**
     * Displays a form to edit an existing Entreprise entity.
     *
     */
    public function editEntrepriseAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AEplatformBundle:Entreprise')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Entité Entreprise impossible à trouver.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AEplatformBundle:Entreprise:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Entreprise entity.
     *
     * @param Entreprise $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Entreprise $entity)
    {
        $form = $this->createForm(new EntrepriseType(), $entity, array(
            'action' => $this->generateUrl('update_entreprise_user', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }

    /**
     * Edits an existing Entreprise entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AEplatformBundle:Entreprise')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Entité Entreprise impossible à trouver.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirectToRoute('ae_compta_simulation_update');
        }

        return $this->render('AEplatformBundle:Enteprise:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Entreprise entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $entreprise_id = $this->container->get('security.context')->getToken()->getUser()->getEntreprise()->getId();

            $entity = $em->getRepository('AEplatformBundle:Entreprise')->find($id);

            $factures = $em->getRepository('AEDashBundle:Factures')->findByEntreprise($entreprise_id);
            $achats = $em->getRepository('AEDashBundle:Achats')->findByEntreprise($entreprise_id);
            $recettes = $em->getRepository('AEDashBundle:Recettes')->findByEntreprise($entreprise_id);

            if (!$entity) {
                throw $this->createNotFoundException('Entité Entreprise impossible à trouver.');
            }

            //$em->remove($factures);
            //$em->remove($achats);
            //$em->remove($recettes);
            $em->remove($entity);

            $em->flush();
        }

        return $this->redirect($this->generateUrl('new_entreprise_user'));
    }

    /**
     * Creates a form to delete a Entreprise entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('delete_entreprise_user', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer'))
            ->getForm()
            ;
    }

}
