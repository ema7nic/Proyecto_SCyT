<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Solicitud;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Solicitud controller.
 *
 * @Route("solicitud")
 */
class SolicitudController extends Controller {

    /**
     * Lists all solicitud entities.
     *
     * @Route("/", name="solicitud_index")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $solicituds = $em->getRepository('AppBundle:Solicitud')->findAll();

        return $this->render('solicitud/index.html.twig', array(
                    'solicituds' => $solicituds,
        ));
    }

    /**
     * Creates a new solicitud entity.
     *
     * @Route("/new", name="solicitud_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request) {
        $solicitud = new Solicitud();
        $form = $this->createForm('AppBundle\Form\SolicitudType', $solicitud, ['attr' => ['id' => 'task-form']]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            foreach ($solicitud->getConceptos() as $solicitudConcepto) {
                $solicitudConcepto->setSolicitud($solicitud);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($solicitud);
            $em->flush();
            return $this->redirectToRoute('solicitud_show', array('id' => $solicitud->getId()));
        }

        return $this->render('solicitud/new.html.twig', array(
                    'solicitud' => $solicitud,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a solicitud entity.
     *
     * @Route("/{id}", name="solicitud_show")
     * @Method("GET")
     */
    public function showAction(Solicitud $solicitud) {
        $deleteForm = $this->createDeleteForm($solicitud);

        return $this->render('solicitud/show.html.twig', array(
                    'solicitud' => $solicitud,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing solicitud entity.
     *
     * @Route("/{id}/edit", name="solicitud_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Solicitud $solicitud) {
        $entityManager = $this->getDoctrine()->getManager();
        $deleteForm = $this->createDeleteForm($solicitud);

        $originalSolicitudes = new ArrayCollection();

        foreach ($solicitud->getConceptos() as $conceptoSolicitud) {
            $originalSolicitudes->add($conceptoSolicitud);
        }

        $editForm = $this->createForm('AppBundle\Form\SolicitudType', $solicitud);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            foreach ($originalSolicitudes as $conceptoSolicitud) {
                if (false === $solicitud->getConceptos()->contains($conceptoSolicitud)) {
                    $solicitud->removeConceptos($conceptoSolicitud);
                    $conceptoSolicitud->setSolicitud(null);
                    $conceptoSolicitud->setConcepto(null);

                    $entityManager->persist($conceptoSolicitud);
                    $entityManager->remove($conceptoSolicitud);
                }
            }

            foreach ($solicitud->getConceptos() as $solicitudConcepto) {
                $solicitudConcepto->setSolicitud($solicitud);
            }

            $entityManager->persist($solicitud);
            $entityManager->flush();

            return $this->redirectToRoute('solicitud_edit', array('id' => $solicitud->getId()));
        }

        return $this->render('solicitud/edit.html.twig', array(
                    'solicitud' => $solicitud,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a solicitud entity.
     *
     * @Route("/{id}", name="solicitud_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Solicitud $solicitud) {
        $form = $this->createDeleteForm($solicitud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $solicitud->setFechaBaja(new \DateTime('NOW'));
            // $em = $this->getDoctrine()->getManager();
            //$em->remove($solicitud);
            //$em->flush();
        }

        return $this->redirectToRoute('solicitud_index');
    }

    /**
     * Creates a form to delete a solicitud entity.
     *
     * @param Solicitud $solicitud The solicitud entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Solicitud $solicitud) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('solicitud_delete', array('id' => $solicitud->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
