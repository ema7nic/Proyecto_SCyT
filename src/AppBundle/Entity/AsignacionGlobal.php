<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AsignacionGlobal
 *
 * @ORM\Table(name="asignacion_global")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AsignacionGlobalRepository")
 */
class AsignacionGlobal
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
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var int
     *
     * @ORM\Column(name="monto", type="integer")
     */
    private $monto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_asignacion", type="datetime")
     */
    private $fechaAsignacion;

    /**
     * @var int
     *
     * @ORM\Column(name="saldo", type="integer")
     */
    private $saldo;

    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="Asignacion", mappedBy="proyectoGrupo")
     */
    private $asignaciones;
    
    
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return AsignacionGlobal
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set monto
     *
     * @param integer $monto
     *
     * @return AsignacionGlobal
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

    /**
     * Set fechaAsignacion
     *
     * @param \DateTime $fechaAsignacion
     *
     * @return AsignacionGlobal
     */
    public function setFechaAsignacion($fechaAsignacion)
    {
        $this->fechaAsignacion = $fechaAsignacion;

        return $this;
    }

    /**
     * Get fechaAsignacion
     *
     * @return \DateTime
     */
    public function getFechaAsignacion()
    {
        return $this->fechaAsignacion;
    }

    /**
     * Set saldo
     *
     * @param integer $saldo
     *
     * @return AsignacionGlobal
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;

        return $this;
    }

    /**
     * Get saldo
     *
     * @return int
     */
    public function getSaldo()
    {
        return $this->saldo;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->asignaciones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add asignacione
     *
     * @param \AppBundle\Entity\Asignacion $asignacione
     *
     * @return AsignacionGlobal
     */
    public function addAsignacione(\AppBundle\Entity\Asignacion $asignacione)
    {
        $this->asignaciones[] = $asignacione;

        return $this;
    }

    /**
     * Remove asignacione
     *
     * @param \AppBundle\Entity\Asignacion $asignacione
     */
    public function removeAsignacione(\AppBundle\Entity\Asignacion $asignacione)
    {
        $this->asignaciones->removeElement($asignacione);
    }

    /**
     * Get asignaciones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAsignaciones()
    {
        return $this->asignaciones;
    }
}
