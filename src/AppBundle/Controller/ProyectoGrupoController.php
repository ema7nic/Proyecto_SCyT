<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ProyectoGrupo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Proyectogrupo controller.
 *
 * @Route("proyectogrupo")
 */
class ProyectoGrupoController extends Controller
{
    /**
     * Lists all proyectoGrupo entities.
     *
     * @Route("/", name="proyectogrupo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $proyectoGrupos = $em->getRepository('AppBundle:ProyectoGrupo')->findAll();

        return $this->render('proyectogrupo/index.html.twig', array(
            'proyectoGrupos' => $proyectoGrupos,
        ));
    }

    /**
     * Creates a new proyectoGrupo entity.
     *
     * @Route("/new", name="proyectogrupo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $proyectoGrupo = new Proyectogrupo();
        $form = $this->createForm('AppBundle\Form\ProyectoGrupoType', $proyectoGrupo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proyectoGrupo);
            $em->flush();

            return $this->redirectToRoute('proyectogrupo_show', array('id' => $proyectoGrupo->getId()));
        }

        return $this->render('proyectogrupo/new.html.twig', array(
            'proyectoGrupo' => $proyectoGrupo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a proyectoGrupo entity.
     *
     * @Route("/{id}", name="proyectogrupo_show")
     * @Method("GET")
     */
    public function showAction(ProyectoGrupo $proyectoGrupo)
    {
        $deleteForm = $this->createDeleteForm($proyectoGrupo);

        return $this->render('proyectogrupo/show.html.twig', array(
            'proyectoGrupo' => $proyectoGrupo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing proyectoGrupo entity.
     *
     * @Route("/{id}/edit", name="proyectogrupo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProyectoGrupo $proyectoGrupo)
    {
        $deleteForm = $this->createDeleteForm($proyectoGrupo);
        $editForm = $this->createForm('AppBundle\Form\ProyectoGrupoType', $proyectoGrupo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proyectogrupo_edit', array('id' => $proyectoGrupo->getId()));
        }

        return $this->render('proyectogrupo/edit.html.twig', array(
            'proyectoGrupo' => $proyectoGrupo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a proyectoGrupo entity.
     *
     * @Route("/{id}", name="proyectogrupo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProyectoGrupo $proyectoGrupo)
    {
        $form = $this->createDeleteForm($proyectoGrupo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($proyectoGrupo);
            $em->flush();
        }

        return $this->redirectToRoute('proyectogrupo_index');
    }

    /**
     * Creates a form to delete a proyectoGrupo entity.
     *
     * @param ProyectoGrupo $proyectoGrupo The proyectoGrupo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProyectoGrupo $proyectoGrupo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proyectogrupo_delete', array('id' => $proyectoGrupo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
