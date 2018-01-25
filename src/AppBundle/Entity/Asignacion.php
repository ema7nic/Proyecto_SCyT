<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asignacion
 *
 * @ORM\Table(name="asignacion")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AsignacionRepository")
 */
class Asignacion
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_asignacion",type="datetime")
     */
    private $fechaAsignacion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="asignaciones")
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     */
    private $usuario;
    
    /**
     * @ORM\ManyToOne(targetEntity="ProyectoGrupo", inversedBy="asignaciones")
     * @ORM\JoinColumn(name="id_proyecto_grupo", referencedColumnName="id")
     */
    private $proyectoGrupo;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="AsignacionGlobal", inversedBy="asignaciones")
     * @ORM\JoinColumn(name="id_asignacion_global", referencedColumnName="id")
     */
    private $asignacionGlobal;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usuario = new \Doctrine\Common\Collections\ArrayCollection();
        $this->proyectoGrupo = new \Doctrine\Common\Collections\ArrayCollection();
        $this->$asignacionGlobal = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Asignacion
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
     * @param string $fechaAsignacion
     *
     * @return Asignacion
     */
    public function setFechaAsignacion($fechaAsignacion)
    {
        $this->fechaAsignacion = $fechaAsignacion;

        return $this;
    }

    /**
     * Get fechaAsignacion
     *
     * @return string
     */
    public function getFechaAsignacion()
    {
        return $this->fechaAsignacion;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Asignacion
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
     * Set usuario
     *
     * @param \AppBundle\Entity\Usuario $usuario
     *
     * @return Asignacion
     */
    public function setUsuario(\AppBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \AppBundle\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set proyectoGrupo
     *
     * @param \AppBundle\Entity\ProyectoGrupo $proyectoGrupo
     *
     * @return Asignacion
     */
    public function setProyectoGrupo(\AppBundle\Entity\ProyectoGrupo $proyectoGrupo = null)
    {
        $this->proyectoGrupo = $proyectoGrupo;

        return $this;
    }

    /**
     * Get proyectoGrupo
     *
     * @return \AppBundle\Entity\ProyectoGrupo
     */
    public function getProyectoGrupo()
    {
        return $this->proyectoGrupo;
    }

    /**
     * Set asignacionGlobal
     *
     * @param \AppBundle\Entity\AsignacionGlobal $asignacionGlobal
     *
     * @return Asignacion
     */
    public function setAsignacionGlobal(\AppBundle\Entity\AsignacionGlobal $asignacionGlobal = null)
    {
        $this->asignacionGlobal = $asignacionGlobal;

        return $this;
    }

    /**
     * Get asignacionGlobal
     *
     * @return \AppBundle\Entity\AsignacionGlobal
     */
    public function getAsignacionGlobal()
    {
        return $this->asignacionGlobal;
    }
    
}
