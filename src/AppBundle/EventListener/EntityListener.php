<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use AppBundle\Entity\Usuario;
use AppBundle\Entity\Solicitud;

class EntityListener {

    /** @PrePersist
     * 
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args) {
        $entity = $args->getEntity();


       

        
        if ($entity instanceof Usuario) {
            $entity->setFechaAlta(new \DateTime('NOW'));
            $entity->setFechaUltimaModificacion(new \DateTime('NOW'));
        }
        else
        {
            if ($entity instanceof Solicitud)
            {
                
                $entity->setFechaGeneracion(new \DateTime('NOW'));
                $entity->setFechaUltimaModificacion(new \DateTime('NOW'));
                $entity->setEstado('INICIADO');
                $entity->setEjercicio(2018);
                $proy = $entity->getProyectoGrupo();
                $entity->setUsuario($proy->getUsuario());

              
                // $montoPasaje = $form->newAction.mntPasajes;
                    $montoPasaje = $entity->getmntPasajes();
                    if ($montoPasaje = null )
                    {
                     
                    }
                    else
                    {
                        if ($montoPasaje > 0)
                        {
                            $conceptoImpSol = new ConceptoImporteSolicitud();
                            $conceptoImpSol->setConcepto('PASAJES');
                            $conceptoImpSol->setImporte($montoPasaje);
                            $conceptoImpSol->setSolicitud($entity);
                            
                            $entity->addConceptosImportesSolicitude($conceptoImpSol);
                        }
                    }

                    $montoViaticos = $entity->getmntViaticos();
                    if ($montoViaticos = null )
                    {
                     
                    }
                    else
                    {
                        if ($montoViaticos > 0)
                        {
                            $conceptoImpSol = new ConceptoImporteSolicitud();
                            $conceptoImpSol->setConcepto('VIATICOS');
                            $conceptoImpSol->setImporte($montoViaticos);
                            $conceptoImpSol->setSolicitud($entity);
                            
                            $entity->addConceptosImportesSolicitude($conceptoImpSol);
                        }
                    }

                    $montoHonorarios = $entity->getmntHonorarios();
                    if ($montoHonorarios = null )
                    {
                     
                    }
                    else
                    {
                        if ($montoHonorarios > 0)
                        {
                            $conceptoImpSol = new ConceptoImporteSolicitud();
                            $conceptoImpSol->setConcepto('HONORARIOS');
                            $conceptoImpSol->setImporte($montoHonorarios);
                            $conceptoImpSol->setSolicitud($entity);
                            
                            $entity->addConceptosImportesSolicitude($conceptoImpSol);
                        }
                    }

                    $montoServicios = $entity->getmntServicios();
                    if ($montoServicios = null )
                    {
                     
                    }
                    else
                    {
                        if ($montoServicios > 0)
                        {
                            $conceptoImpSol = new ConceptoImporteSolicitud();
                            $conceptoImpSol->setConcepto('SERVICIOS');
                            $conceptoImpSol->setImporte($montoServicios);
                            $conceptoImpSol->setSolicitud($entity);
                            
                            $entity->addConceptosImportesSolicitude($conceptoImpSol);
                        }
                    }

                    $montoInscripcion = $entity->getmntInscripcion();
                    if ($montoInscripcion = null )
                    {
                     
                    }
                    else
                    {
                        if ($montoInscripcion > 0)
                        {
                            $conceptoImpSol = new ConceptoImporteSolicitud();
                            $conceptoImpSol->setConcepto('INSCRIPCION');
                            $conceptoImpSol->setImporte($montoInscripcion);
                            $conceptoImpSol->setSolicitud($entity);
                            
                            $entity->addConceptosImportesSolicitude($conceptoImpSol);
                        }
                    }

                    $montoOtros = $entity->getmntOtros();

                    if ($montoOtros = null )
                    {
                     
                    }
                    else
                    {
                        if ($montoOtros > 0)
                        {
                            $otros          = $entity->getOtros();
                            $conceptoImpSol = new ConceptoImporteSolicitud();
                            $conceptoImpSol->setConcepto($otros);
                            $conceptoImpSol->setImporte($montoOtros);
                            $conceptoImpSol->setSolicitud($entity);
                            
                            $entity->addConceptosImportesSolicitude($conceptoImpSol);
                        }
                    }
                }
                else
                {
                    return;
                }
                
        }
        
       



       
    }

    public function preUpdate(PreUpdateEventArgs $args) {
        $entity = $args->getEntity();
        if (!$entity instanceof Usuario) {
            return;
        }
        $entity->setFechaUltimaModificacion(new \DateTime('NOW'));
    }

}

