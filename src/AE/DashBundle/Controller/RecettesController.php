<?php

namespace AE\DashBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AE\DashBundle\Entity\Recettes;
use AE\DashBundle\Form\RecettesType;

/**
 * Recettes controller.
 *
 */
class RecettesController extends Controller
{

    /**
     * Lists all Recettes entities.
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

        $entities = $em->getRepository('AEDashBundle:Recettes')->findByEntreprise($entreprise_id);

        $entity = new Recettes();
        $entity->setEntreprise($entreprise);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $entity->getJustificatif();

            if ($file) {

                // Generate a unique name for the file before saving it
                $fileName = md5(uniqid()) . '.' . $file->guessExtension();

                // Move the file to the directory where justificatifs are stored
                $brochuresDir = $this->container->getParameter('kernel.root_dir') . '/../web/uploads/justificatifs';
                $file->move($brochuresDir, $fileName);

                $entity->setJustificatif($fileName);
            }

            $recette = $entity->getMontant();
            $entreprise_old_CA = $entreprise->getChiffreDAffaireMensuel();
            $entreprise_new_CA = $entreprise_old_CA + $recette;

            $entreprise->setChiffreDAffaireMensuel($entreprise_new_CA);

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('recettes_show', array('id' => $entity->getId())));
        }

        return $this->render('AEDashBundle:Recettes:index.html.twig', array(
            'entities' => $entities,
            'form'   => $form->createView(),
        ));
    }
    /**
     * Creates a new Recettes entity.
     *
     */
    /*public function createAction(Request $request)
    {
        $entity = new Recettes();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('recettes_show', array('id' => $entity->getId())));
        }

        return $this->render('AEDashBundle:Recettes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }*/

    /**
     * Creates a form to create a Recettes entity.
     *
     * @param Recettes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Recettes $entity)
    {
        $form = $this->createForm(new RecettesType(), $entity, array(
            'action' => $this->generateUrl('recettes'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer'));

        return $form;
    }

    /**
     * Displays a form to create a new Recettes entity.
     *
     */
    public function newAction()
    {
        $entity = new Recettes();
        $form   = $this->createCreateForm($entity);

        return $this->render('AEDashBundle:Recettes:index.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Recettes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AEDashBundle:Recettes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Recettes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AEDashBundle:Recettes:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Recettes entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AEDashBundle:Recettes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Recettes entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AEDashBundle:Recettes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Recettes entity.
     *
     * @param Recettes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Recettes $entity)
    {
        $form = $this->createForm(new RecettesType(), $entity, array(
            'action' => $this->generateUrl('recettes_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing Recettes entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AEDashBundle:Recettes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Recettes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('recettes_edit', array('id' => $id)));
        }

        return $this->render('AEDashBundle:Recettes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Recettes entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AEDashBundle:Recettes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Recettes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('recettes'));
    }

    /**
     * Creates a form to delete a Recettes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('recettes_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer'))
            ->getForm()
            ;
    }
}