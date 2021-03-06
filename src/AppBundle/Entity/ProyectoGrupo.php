<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProyectoGrupo
 *
 * @ORM\Table(name="proyecto_grupo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProyectoGrupoRepository")
 */
class ProyectoGrupo
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
     * @ORM\Column(name="codigo", type="string", length=255)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_utn", type="string", length=255)
     */
    private $codigoUtn;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="datetime")
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="datetime")
     */
    private $fechaFin;

    /**
     * @var string
     *
     * @ORM\Column(name="saldo", type="decimal", precision=10, scale=2)
     */
    private $saldo;
    
    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="proyectosGrupos")
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id", nullable=false)
     */
    private $usuario;
    
    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="Asignacion", mappedBy="proyectoGrupo")
     */
    private $asignaciones;

    /**
     * @param number $asignaciones
     */
    public function setAsignaciones($asignaciones)
    {
        $this->asignaciones = $asignaciones;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->asignaciones = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set codigo
     *
     * @param string $codigo
     *
     * @return ProyectoGrupo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set codigoUtn
     *
     * @param string $codigoUtn
     *
     * @return ProyectoGrupo
     */
    public function setCodigoUtn($codigoUtn)
    {
        $this->codigoUtn = $codigoUtn;

        return $this;
    }

    /**
     * Get codigoUtn
     *
     * @return string
     */
    public function getCodigoUtn()
    {
        return $this->codigoUtn;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return ProyectoGrupo
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return ProyectoGrupo
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     *
     * @return ProyectoGrupo
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set saldo
     *
     * @param string $saldo
     *
     * @return ProyectoGrupo
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;

        return $this;
    }

    /**
     * Get saldo
     *
     * @return string
     */
    public function getSaldo()
    {
        return $this->saldo;
    }
    
    
    /**
     * Set usuario
     *
     * @param Usuario $usuario
     *
     * @return ProyectoGrupo
     */
    public function setUsuario($usuario)
    {
    	$this->usuario = $usuario;
    
    	return $this;
    }
    
    /**
     * Get usuario
     *
     * @return Usuario
     */
    public function getUsuario()
    {
    	return $this->usuario;
    }

    /**
     * Add asignacione
     *
     * @param \AppBundle\Entity\Asignacion $asignacione
     *
     * @return ProyectoGrupo
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
