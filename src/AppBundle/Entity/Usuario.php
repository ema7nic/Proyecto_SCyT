<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsuarioRepository")
 */
class Usuario
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
     * @ORM\Column(name="iup", type="string", length=255, unique=true)
     */
    private $iup;

    /**
     * @var string
     *
     * @ORM\Column(name="clave", type="string", length=255)
     */
    private $clave;

    /**
     * @var string
     *
     * @ORM\Column(name="rol", type="string", length=255)
     */
    private $rol;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="datetime")
     */
    private $fechaAlta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_baja", type="datetime")
     */
    private $fechaBaja;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ultima_modificacion", type="datetime")
     */
    private $fechaUltimaModificacion;

    /**
     * @var int
     *
     * @ORM\Column(name="dni", type="integer", unique=true)
     */
    private $dni;
    
    /**
     * @ORM\ManyToOne(targetEntity="Localidad")
     * @ORM\JoinColumn(name="id_localidad", referencedColumnName="id", nullable=false)
     */
    
    private $localidad;
    
    /**
     *
     *
     * @ORM\OneToMany(targetEntity="Solicitud", mappedBy="usuario")
     */
    private $solicitudes;
    
    /**
     *
     *
     * @ORM\OneToMany(targetEntity="Asignacion", mappedBy="usuario")
     */
    private $asignaciones;
    
    
    /**
     *
     * @ORM\OneToMany(targetEntity="ProyectoGrupo", mappedBy="usuario")
     */
    private $proyectosGrupos;
    
    public function __construct()
    {
        $this->solicitudes = new ArrayCollection();
        $this->asignaciones = new ArrayCollection();
    }
    
   


    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $asignaciones
     */
    public function setAsignaciones($asignaciones)
    {
        $this->asignaciones = $asignaciones;
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
	*Set solicitud
	*
	*@param solicitudes
	*/
	public function setSolicitudes($solicitudes)
	{
		
		$this->solicitudes = $solicitudes;
	}
	
	/**
	* Get solicitudes
	*
	* @return solicitudes
	*/
	public function getSolicitudes()
	{
		return $this->solicitudes;
	}

    /**
     * Set iup
     *
     * @param string $iup
     *
     * @return Usuario
     */
    public function setIup($iup)
    {
        $this->iup = $iup;

        return $this;
    }

    /**
     * Get iup
     *
     * @return string
     */
    public function getIup()
    {
        return $this->iup;
    }

    /**
     * Set clave
     *
     * @param string $clave
     *
     * @return Usuario
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get clave
     *
     * @return string
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set rol
     *
     * @param string $rol
     *
     * @return Usuario
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return string
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Usuario
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
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Usuario
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Usuario
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Usuario
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     *
     * @return Usuario
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set fechaBaja
     *
     * @param \DateTime $fechaBaja
     *
     * @return Usuario
     */
    public function setFechaBaja($fechaBaja)
    {
        $this->fechaBaja = $fechaBaja;

        return $this;
    }

    /**
     * Get fechaBaja
     *
     * @return \DateTime
     */
    public function getFechaBaja()
    {
        return $this->fechaBaja;
    }

    /**
     * Set fechaUltimaModificacion
     *
     * @param \DateTime $fechaUltimaModificacion
     *
     * @return Usuario
     */
    public function setFechaUltimaModificacion($fechaUltimaModificacion)
    {
        $this->fechaUltimaModificacion = $fechaUltimaModificacion;

        return $this;
    }

    /**
     * Get fechaUltimaModificacion
     *
     * @return \DateTime
     */
    public function getFechaUltimaModificacion()
    {
        return $this->fechaUltimaModificacion;
    }

    /**
     * Set dni
     *
     * @param integer $dni
     *
     * @return Usuario
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return int
     */
    public function getDni()
    {
        return $this->dni;
    }
    
    
    /**
     * Set proyectosGrupos
     *
     * @param \Object $proyectosGrupos
     *
     * @return Usuario
     */
    public function setProyectosGrupos($proyectosGrupos)
    {
    	$this->proyectosGrupos = $proyectosGrupos;
    
    	return $this;
    }
    
    /**
     * Get proyectosGrupos
     *
     * @return \Object
     */
    public function getProyectosGrupos()
    {
    	return $this->proyectosGrupos;
    }

    /**
     * Add solicitude
     *
     * @param \AppBundle\Entity\Solicitud $solicitude
     *
     * @return Usuario
     */
    public function addSolicitude(\AppBundle\Entity\Solicitud $solicitude)
    {
        $this->solicitudes[] = $solicitude;

        return $this;
    }

    /**
     * Remove solicitude
     *
     * @param \AppBundle\Entity\Solicitud $solicitude
     */
    public function removeSolicitude(\AppBundle\Entity\Solicitud $solicitude)
    {
        $this->solicitudes->removeElement($solicitude);
    }

    /**
     * Add asignacione
     *
     * @param \AppBundle\Entity\Asignacion $asignacione
     *
     * @return Usuario
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

    /**
     * Set localidad
     *
     * @param \AppBundle\Entity\Localidad $localidad
     *
     * @return Usuario
     */
    public function setLocalidad(\AppBundle\Entity\Localidad $localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get localidad
     *
     * @return \AppBundle\Entity\Localidad
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Add proyectosGrupo
     *
     * @param \AppBundle\Entity\ProyectoGrupo $proyectosGrupo
     *
     * @return Usuario
     */
    public function addProyectosGrupo(\AppBundle\Entity\ProyectoGrupo $proyectosGrupo)
    {
        $this->proyectosGrupos[] = $proyectosGrupo;

        return $this;
    }

    /**
     * Remove proyectosGrupo
     *
     * @param \AppBundle\Entity\ProyectoGrupo $proyectosGrupo
     */
    public function removeProyectosGrupo(\AppBundle\Entity\ProyectoGrupo $proyectosGrupo)
    {
        $this->proyectosGrupos->removeElement($proyectosGrupo);
    }
}
