<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Usuario controller.
 *
 * @Route("usuario")
 */
class UsuarioController extends Controller {

    /**
     * Lists all usuario entities.
     *
     * @Route("/listar", name="usuario_listar")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $usuarios = $em->getRepository('AppBundle:Usuario')->findAll();

        return $this->render('usuario/listar.html.twig', array(
                    'usuarios' => $usuarios,
        ));
    }
    
        /**
     *
     * @Route("/balance", name="usuario_balance")
     * @Method("GET")     
     */
    public function balanceAction() {

        $em = $this->getDoctrine()->getManager();

        $usuarios = $em->getRepository('AppBundle:Usuario')->findAll();

        return $this->render('usuario/balance.html.twig', array(
                    'usuarios' => $usuarios,
        ));
    }
    
    
    
    /**
     *
     * @Route("/balance_general", name="usuario_balance_general")
     * @Method("GET")
     */
    public function balanceGeneralAction() {
    
    	$em = $this->getDoctrine()->getManager();
    
    	$usuarios = $em->getRepository('AppBundle:Usuario')->findAll();
    
    	return $this->render('usuario/balance_general.html.twig', array(
    			'usuarios' => $usuarios,
    	));
    }

    /**
     * Creates a new usuario entity.
     *
     * @Route("/nuevo", name="usuario_nuevo")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request) {
        $usuario = new Usuario();
        //$usuario->setFechaAlta(new \DateTime('NOW'));
        //$usuario->setFechaUltimaModificacion(new \DateTime('NOW'));
        $form = $this->createForm('AppBundle\Form\UsuarioType', $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();

            return $this->redirectToRoute('usuario_mostrar', array('id' => $usuario->getId()));
        }

        return $this->render('usuario/nuevo.html.twig', array(
                    'usuario' => $usuario,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a usuario entity.
     *
     * @Route("/{id}", name="usuario_mostrar")
     * @Method("GET")
     */
    public function showAction(Usuario $usuario) {
        $deleteForm = $this->createDeleteForm($usuario);

        return $this->render('usuario/mostrar.html.twig', array(
                    'usuario' => $usuario,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing usuario entity.
     *
     * @Route("/{id}/editar", name="usuario_editar")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Usuario $usuario) {
        $deleteForm = $this->createDeleteForm($usuario);
        $editForm = $this->createForm('AppBundle\Form\UsuarioType', $usuario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('usuario_editar', array('id' => $usuario->getId()));
        }

        return $this->render('usuario/editar.html.twig', array(
                    'usuario' => $usuario,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a usuario entity.
     *
     * @Route("/{id}", name="usuario_eliminar")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Usuario $usuario) {
        $form = $this->createDeleteForm($usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $usuario->setFechaBaja(new \DateTime('NOW'));
            $em = $this->getDoctrine()->getManager();
            //$em->remove($usuario);
            $em->flush();
        }
        return $this->redirectToRoute('usuario_listar');
    }

    /**
     * Creates a form to delete a usuario entity.
     *
     * @param Usuario $usuario The usuario entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Usuario $usuario) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('usuario_eliminar', array('id' => $usuario->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
