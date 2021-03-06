<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SolicitudConcepto
 *
 * @ORM\Table(name="solicitud_concepto")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SolicitudConceptoRepository")
 */
class SolicitudConcepto
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="monto", type="integer")
     */
    private $monto;
    
    /**
     * @ORM\ManyToOne(targetEntity="Solicitud", inversedBy="conceptos", cascade={"persist"})
     * @ORM\JoinColumn(name="solicitud_id", referencedColumnName="id", nullable=FALSE)
     * */
    protected $solicitud;

    /**
     * @ORM\ManyToOne(targetEntity="Concepto", inversedBy="solicitudes", cascade={"persist"})
     * @ORM\JoinColumn(name="concepto_id", referencedColumnName="id", nullable=FALSE)
     * */
    protected $concepto;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set monto
     *
     * @param integer $monto
     *
     * @return SolicitudConcepto
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return int
     */
    public function getMonto()
    {
        return $this->monto;
    }
    
    function getSolicitud() {
        return $this->solicitud;
    }

    function getConcepto() {
        return $this->concepto;
    }

    function setSolicitud($solicitud) {
        $this->solicitud = $solicitud;
    }

    function setConcepto($concepto) {
        $this->concepto = $concepto;
    }
}

