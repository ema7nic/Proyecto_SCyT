<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Comprobante;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Comprobante controller.
 *
 * @Route("comprobante")
 */
class ComprobanteController extends Controller
{
    

    /**
     * Creates a new comprobante entity.
     *
     * @Route("/new", name="comprobante_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $comprobante = new Comprobante();
        $form = $this->createForm('AppBundle\Form\ComprobanteType', $comprobante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comprobante);
            $em->flush();

            return $this->redirectToRoute('comprobante_show', array('id' => $comprobante->getId()));
        }

        return $this->render('comprobante/new.html.twig', array(
            'comprobante' => $comprobante,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a comprobante entity.
     *
     * @Route("/{id}", name="comprobante_show")
     * @Method("GET")
     */
    public function showAction(Comprobante $comprobante)
    {
        $deleteForm = $this->createDeleteForm($comprobante);

        return $this->render('comprobante/show.html.twig', array(
            'comprobante' => $comprobante,
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Creates a form to delete a comprobante entity.
     *
     * @param Asignacion $comprobante The comprobante entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Comprobante $comprobante)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comprobante_delete', array('id' => $comprobante->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
