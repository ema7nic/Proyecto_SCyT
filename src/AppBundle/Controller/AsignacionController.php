<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Asignacion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Asignacion controller.
 *
 * @Route("asignacion")
 */
class AsignacionController extends Controller
{
    

    /**
     * Creates a new asignacion entity.
     *
     * @Route("/new", name="asignacion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $asignacion = new Asignacion();
        $form = $this->createForm('AppBundle\Form\AsignacionType', $asignacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($asignacion);
            $em->flush();

            return $this->redirectToRoute('asignacion_show', array('id' => $asignacion->getId()));
        }

        return $this->render('asignacion/new.html.twig', array(
            'asignacion' => $asignacion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a asignacion entity.
     *
     * @Route("/{id}", name="asignacion_show")
     * @Method("GET")
     */
    public function showAction(Asignacion $asignacion)
    {
        $deleteForm = $this->createDeleteForm($asignacion);

        return $this->render('asignacion/show.html.twig', array(
            'asignacion' => $asignacion,
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Creates a form to delete a asignacion entity.
     *
     * @param Asignacion $asignacion The asignacion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Asignacion $asignacion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('asignacion_delete', array('id' => $asignacion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
