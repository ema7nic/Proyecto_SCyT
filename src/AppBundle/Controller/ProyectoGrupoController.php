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
     * @Route("/listar", name="proyectogrupo_listar")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $proyectoGrupos = $em->getRepository('AppBundle:ProyectoGrupo')->findAll();

        return $this->render('proyectogrupo/listar.html.twig', array(
            'proyectoGrupos' => $proyectoGrupos,
        ));
    }

    /**
     * Creates a new proyectoGrupo entity.
     *
     * @Route("/nuevo", name="proyectogrupo_nuevo")
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

            return $this->redirectToRoute('proyectogrupo_mostrar', array('id' => $proyectoGrupo->getId()));
        }

        return $this->render('proyectogrupo/nuevo.html.twig', array(
            'proyectoGrupo' => $proyectoGrupo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a proyectoGrupo entity.
     *
     * @Route("/{id}", name="proyectogrupo_mostrar")
     * @Method("GET")
     */
    public function showAction(ProyectoGrupo $proyectoGrupo)
    {
        $deleteForm = $this->createDeleteForm($proyectoGrupo);

        return $this->render('proyectogrupo/mostrar.html.twig', array(
            'proyectoGrupo' => $proyectoGrupo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing proyectoGrupo entity.
     *
     * @Route("/{id}/editar", name="proyectogrupo_editar")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProyectoGrupo $proyectoGrupo)
    {
        $deleteForm = $this->createDeleteForm($proyectoGrupo);
        $editForm = $this->createForm('AppBundle\Form\ProyectoGrupoType', $proyectoGrupo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proyectogrupo_mostrar', array('id' => $proyectoGrupo->getId()));
        }

        return $this->render('proyectogrupo/editar.html.twig', array(
            'proyectoGrupo' => $proyectoGrupo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a proyectoGrupo entity.
     *
     * @Route("/{id}", name="proyectogrupo_borrar")
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

        return $this->redirectToRoute('proyectogrupo_listar');
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
            ->setAction($this->generateUrl('proyectogrupo_borrar', array('id' => $proyectoGrupo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
