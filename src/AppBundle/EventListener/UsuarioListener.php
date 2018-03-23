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

class UsuarioListener {

    /** @PrePersist
     * 
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args) {
        $entity = $args->getEntity();
        if (!$entity instanceof Usuario) {
            return;
        }
        $entity->setFechaAlta(new \DateTime('NOW'));
        $entity->setFechaUltimaModificacion(new \DateTime('NOW'));
    }

    public function preUpdate(PreUpdateEventArgs $args) {
        $entity = $args->getEntity();
        if (!$entity instanceof Usuario) {
            return;
        }
        $entity->setFechaUltimaModificacion(new \DateTime('NOW'));
    }

}
