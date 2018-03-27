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

