<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Concepto
 *
 * @ORM\Table(name="concepto")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ConceptoRepository")
 */
class Concepto {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="concepto", type="text")
     */
    private $concepto;

    /**
     * @ORM\OneToMany(targetEntity="SolicitudConcepto" , mappedBy="concepto", cascade={"persist"})
     * 
     */
    private $solicitudes;

    public function __construct() {
        $this->solicitudes = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set concepto
     *
     * @param string $concepto
     *
     * @return ConceptoSolicitud
     */
    public function setConcepto($concepto) {
        $this->concepto = $concepto;

        return $this;
    }

    /**
     * Get concepto
     *
     * @return string
     */
    public function getConcepto() {
        return $this->concepto;
    }

    function getSolicitudes() {
        return $this->solicitudes;
    }

    function setSolicitudes($solicitudes) {
        $this->solicitudes = $solicitudes;
    }
        
    public function addSolicitud(\AppBundle\Entity\Solicitud $solicitud) {
        $this->solicituds->add($solicitud);

        return $this;
    }

    public function removeSolicitud(\AppBundle\Entity\Solicitud $solicitud) {
        $this->solicituds->removeElement($solicitud);
    }

}
