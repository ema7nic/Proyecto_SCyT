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
     * @ORM\ManyToOne(targetEntity="Solicitud", inversedBy="conceptos")
     * @ORM\JoinColumn(name="solicitud_id", referencedColumnName="id")
     * */
    protected $solicitud;

    /**
     * @ORM\ManyToOne(targetEntity="Concepto", inversedBy="solicitudes")
     * @ORM\JoinColumn(name="concepto_id", referencedColumnName="id")
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
}

