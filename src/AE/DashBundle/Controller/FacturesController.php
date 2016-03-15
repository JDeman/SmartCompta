<?php

namespace AE\DashBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AE\DashBundle\Entity\Factures;
use AE\DashBundle\Form\FacturesType;
use Symfony\Component\HttpFoundation\Response;

/**
 * Factures controller.
 *
 */
class FacturesController extends Controller
{

    /**
     * Lists all Factures entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entreprise = $this->container->get('security.context')->getToken()->getUser()->getEntreprise();

        if (!$entreprise) {
            return $this->redirectToRoute('new_entreprise_user', array(), 301);
        }

        $entreprise_id = $entreprise->getId();

        $entities = $em->getRepository('AEDashBundle:Factures')->findByEntreprise($entreprise_id);

        $entity = new Factures();

        $entity->setEntreprise($entreprise);

        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $recetteTotale = 0;
            $factureProduit = $entity->getFactureProduit();

            foreach ($factureProduit as $element) {

                $quantite = $element->getQuantite();
                $prixUnitaire = $element->getProduits()->getPrixUnitaireHT();
                $prixTotal = $quantite * $prixUnitaire;

                $element->setPrixTotalHT($prixTotal);
                $recetteTotale = $recetteTotale + $prixTotal;

            }

            $entity->setRecetteTotaleHT($recetteTotale);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->persist($entity->getContractuel());
            $em->flush();

            return $this->redirect($this->generateUrl('factures_show', array('id' => $entity->getId())));
        }


        return $this->render('AEDashBundle:Factures:index.html.twig', array(
            'entities' => $entities,
            'form'   => $form->createView(),
        ));

    }
    /**
     * Creates a new Factures entity.
     *
     */
    /*public function createAction(Request $request)
    {
        $entity = new Factures();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('factures_show', array('id' => $entity->getId())));
        }

        return $this->render('AEDashBundle:Factures:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }*/

    /**
     * Creates a form to create a Factures entity.
     *
     * @param Factures $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Factures $entity)
    {
        $form = $this->createForm(new FacturesType(), $entity, array(
            'action' => $this->generateUrl('factures'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer'));

        return $form;
    }

    /**
     * Displays a form to create a new Factures entity.
     *
     */
    public function newAction()
    {
        $entity = new Factures();
        $form   = $this->createCreateForm($entity);

        return $this->render('AEDashBundle:Factures:index.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Factures entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AEDashBundle:Factures')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Entité Factures impossible à trouver.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AEDashBundle:Factures:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Factures entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AEDashBundle:Factures')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Entité Factures impossible à trouver.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AEDashBundle:Factures:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Factures entity.
     *
     * @param Factures $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Factures $entity)
    {
        $form = $this->createForm(new FacturesType(), $entity, array(
            'action' => $this->generateUrl('factures_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing Factures entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AEDashBundle:Factures')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Entité Factures impossible à trouver.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('factures_edit', array('id' => $id)));
        }

        return $this->render('AEDashBundle:Factures:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Factures entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AEDashBundle:Factures')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Entité Factures impossible à trouver.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('factures'));
    }

    /**
     * Creates a form to delete a Factures entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('factures_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer'))
            ->getForm()
            ;
    }

    public function twigToPdfAction($id) {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AEDashBundle:Factures')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Entité Factures impossible à trouver.');
        }

        $html = $this->renderView('AEDashBundle:Factures:printable.html.twig', array(
            'entity'      => $entity,
        ));

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="facture.pdf"'
            )
        );

    }
}