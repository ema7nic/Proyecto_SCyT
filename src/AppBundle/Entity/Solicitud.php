<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

/**
 * Solicitud
 *
 * @ORM\Table(name="solicitud")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SolicitudRepository")
 */
class Solicitud
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_generacion", type="datetime")
     */
    private $fechaGeneracion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ultima_modificacion", type="datetime")
     * 
     */
    private $fechaUltimaModificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_baja", type="datetime", nullable=true)
     */
    private $fechaBaja;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     * 
     * @Assert\NotBlank()
     *  @Assert\Type(
     * 		type = "string", 
     * 		message = "El valor {{value}} no es valido, debe ser: {{type}}."
     * 		)
     */
    private $direccion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="datetime")
     * 
     * @Assert\NotBlank()
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="datetime")
     * 
     * @Assert\NotBlank()
     */
    private $fechaFin;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_evento", type="string", length=255)
     * 
     * @Assert\NotBlank()
     *  @Assert\Type(
     * 		type = "string", 
     * 		message = "El valor {{value}} no es valido, debe ser: {{type}}."
     * 		)
     */
    private $nombreEvento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_salida", type="datetime")
     * 
     * @Assert\NotBlank()
     */
    private $fechaSalida;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_llegada", type="datetime")
     * 
     * @Assert\NotBlank()
     */
    private $fechaLlegada;

    /**
     * @var NumberType
     *
     * @ORM\Column(name="importe_total", type="decimal", precision=10, scale=2)
     * 
     * @Assert\NotBlank()
     *  @Assert\Type(
     * 		type = "float", 
     * 		message = "El valor {{value}} no es valido, debe ser: {{type}}."
     * 		)
     */
    private $importeTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=255)
     * 
     * 
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="autores", type="string", length=255)
     * 
     * @Assert\NotBlank()
     *  @Assert\Type(
     * 		type = "string", 
     * 		message = "El valor {{value}} no es valido, debe ser: {{type}}."
     * 		)
     */
    private $autores;

    /**
     * @var string
     *
     * @ORM\Column(name="contratados", type="string", length=255)
     * 
     * @Assert\NotBlank()
     *  @Assert\Type(
     * 		type = "string", 
     * 		message = "El valor {{value}} no es valido, debe ser: {{type}}."
     * 		)
     */
    private $contratados;
    
    /**
     * @var int
     *
     * @ORM\Column(name="ejercicio", type="integer")
     * 
     */
    private $ejercicio;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=255)
     * 
     * @Assert\NotBlank()
     *  @Assert\Type(
     * 		type = "string", 
     * 		message = "El valor {{value}} no es valido, debe ser: {{type}}."
     * 		)
     */
    private $observaciones;

    /**
     * @var int
     *
     * @ORM\Column(name="nro_nota", type="integer", nullable=true)
     * 
     */
    private $nroNota;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_revision", type="datetime", nullable=true)
     * 
     */
    private $fechaRevision;
    
    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="solicitudes")
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id", nullable=false)
     */
    private $usuario;


	/**
	*@ORM\ManyToOne(targetEntity="Localidad")
     * @ORM\JoinColumn(name="id_localidad", referencedColumnName="id", nullable=false)
	 */
	private $localidad;
	
	
	 /**
     * @var integer
     * 
     * @ORM\OneToMany(targetEntity="Comprobante", mappedBy="solicitud")
	*/
	private $comprobantes;
	/**
	*@ORM\ManyToOne(targetEntity="ProyectoGrupo")
     * @ORM\JoinColumn(name="id_proyecto_grupo", referencedColumnName="id", nullable=false)
	 */
	private $proyectoGrupo;
		
	
	/**
	 * 
	 * @ORM\OneToMany(targetEntity="ConceptoImporteSolicitud", mappedBy="solicitud")
	 */
	private $conceptosImportesSolicitudes;
	
	
	/**
	 *
	 * @ORM\OneToMany(targetEntity="TipoEvento", mappedBy="solicitud")
	 */
	private $tiposEventos;
	
	/**
	 * 
	 * 
	 * @var CheckboxType
	 */
	private $chkpasajes;
	
	
	/**
	 * 
	 * @var NumberType
	 */
	private $mntpasajes;
	
	
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
     * Set fechaGeneracion
     *
     * @param \DateTime $fechaGeneracion
     *
     * @return Solicitud
     */
    public function setFechaGeneracion($fechaGeneracion)
    {
        $this->fechaGeneracion = $fechaGeneracion;

        return $this;
    }

    /**
     * Get fechaGeneracion
     *
     * @return \DateTime
     */
    public function getFechaGeneracion()
    {
        return $this->fechaGeneracion;
    }

    /**
     * Set fechaUltimaModificacion
     *
     * @param \DateTime $fechaUltimaModificacion
     *
     * @return Solicitud
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
     * Get fechaBaja
     * 
     * @return \DateTime
     */
    public function getFechaBaja()
    {
        return $this->fechaBaja;
    }

    /**
     * Set fechaBja
     * 
     * @param DateTIme $fechaBaja
     * 
     * @return Solicitud
     */

     public function setFechaBaja($fechaBaja)
     {
         $this->fechaBaja = $fechaBaja;

         return $this;
     }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Solicitud
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
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return Solicitud
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
     * @return Solicitud
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
     * Set nombreEvento
     *
     * @param string $nombreEvento
     *
     * @return Solicitud
     */
    public function setNombreEvento($nombreEvento)
    {
        $this->nombreEvento = $nombreEvento;

        return $this;
    }

    /**
     * Get nombreEvento
     *
     * @return string
     */
    public function getNombreEvento()
    {
        return $this->nombreEvento;
    }

    /**
     * Set fechaSalida
     *
     * @param \DateTime $fechaSalida
     *
     * @return Solicitud
     */
    public function setFechaSalida($fechaSalida)
    {
        $this->fechaSalida = $fechaSalida;

        return $this;
    }

    /**
     * Get fechaSalida
     *
     * @return \DateTime
     */
    public function getFechaSalida()
    {
        return $this->fechaSalida;
    }

    /**
     * Set fechaLlegada
     *
     * @param \DateTime $fechaLlegada
     *
     * @return Solicitud
     */
    public function setFechaLlegada($fechaLlegada)
    {
        $this->fechaLlegada = $fechaLlegada;

        return $this;
    }

    /**
     * Get fechaLlegada
     *
     * @return \DateTime
     */
    public function getFechaLlegada()
    {
        return $this->fechaLlegada;
    }

    /**
     * Set importeTotal
     *
     * @param string $importeTotal
     *
     * @return Solicitud
     */
    public function setImporteTotal($importeTotal)
    {
        $this->importeTotal = $importeTotal;

        return $this;
    }

    /**
     * Get importeTotal
     *
     * @return string
     */
    public function getImporteTotal()
    {
        return $this->importeTotal;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Solicitud
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set autores
     *
     * @param string $autores
     *
     * @return Solicitud
     */
    public function setAutores($autores)
    {
        $this->autores = $autores;

        return $this;
    }

    /**
     * Get autores
     *
     * @return string
     */
    public function getAutores()
    {
        return $this->autores;
    }
    
    
    /**
     * Set contratados
     *
     * @param string $contratados
     *
     * @return Solicitud
     */
    public function setContratados($contratados)
    {
    	$this->contratados = $contratados;
    
    	return $this;
    }
    
    /**
     * Get contratados
     *
     * @return string
     */
    public function getContratados()
    {
    	return $this->contratados;
    }

    /**
     * Set ejercicio
     *
     * @param integer $ejercicio
     *
     * @return Solicitud
     */
    public function setEjercicio($ejercicio)
    {
        $this->ejercicio = $ejercicio;

        return $this;
    }

    /**
     * Get ejercicio
     *
     * @return int
     */
    public function getEjercicio()
    {
        return $this->ejercicio;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return Solicitud
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set nroNota
     *
     * @param integer $nroNota
     *
     * @return Solicitud
     */
    public function setNroNota($nroNota)
    {
        $this->nroNota = $nroNota;

        return $this;
    }

    /**
     * Get nroNota
     *
     * @return int
     */
    public function getNroNota()
    {
        return $this->nroNota;
    }

    /**
     * Set fechaRevision
     *
     * @param \DateTime $fechaRevision
     *
     * @return Solicitud
     */
    public function setFechaRevision($fechaRevision)
    {
        $this->fechaRevision = $fechaRevision;

        return $this;
    }

    /**
     * Get fechaRevision
     *
     * @return \DateTime
     */
    public function getFechaRevision()
    {
        return $this->fechaRevision;
    }
	
	/**
	* Set usuario
	**@param \Usuario $usuario
	*
	*@return Solicitud
	*/
	
	public function setUsuario($usuario)
	{
		$this->usuario = $usuario;
		return $this;
	}
	
	/**
	* Get usuario
	*
	* @return \Usuario
	*/
	
	public function getUsuario()
	{
		return $this->usuario;
		
	}
	
	
	/**
	* Set localidad
	**@param \Localidad $localidad
	*
	*@return Solicitud
	*/
	
	public function setLocalidad($localidad)
	{
		$this->localidad = $localidad;
		return $this;
	}
	
	/**
	* Get localidad
	*
	* @return \Localidad
	*/
	
	public function getLocalidad()
	{
		return $this->localidad;
		
	}
	
	
	/**
	* Set proyectoGrupo
	**@param \ProyectoGrupo $proyectoGrupo
	*
	*@return Solicitud
	*/
	
	public function setProyectoGrupo($proyectoGrupo)
	{
		$this->proyectoGrupo = $proyectoGrupo;
		return $this;
	}
	
	/**
	* Get proyectoGrupo
	*
	* @return \ProyectoGrupo
	*/
	
	public function getProyectoGrupo()
	{
		return $this->proyectoGrupo;
		
	}
	
	/**
	 * Set comprobantes
	 **@param \Object $comprobantes
	 *
	 *@return Solicitud
	 */
	
	public function setComprobantes($comprobantes)
	{
		$this->comprobantes = $comprobantes;
		return $this;
	}
	
	/**
	 * Get comprobantes
	 *
	 * @return \Object
	 */
	
	public function getComprobantes()
	{
		return $this->comprobantes;
	
	}
	
	/**
	 * Set conceptosImportesSolicitudes
	 **@param \Object $conceptosImportesSolicitudes
	 *
	 *@return Solicitud
	 */
	
	public function setConceptosImportesSolicitudes($conceptosImportesSolicitudes)
	{
		$this->conceptosImportesSolicitudes = $conceptosImportesSolicitudes;
		return $this;
	}
	
	/**
	 * Get conceptosImportesSolicitudes
	 *
	 * @return \Object
	 */
	
	public function getConcpetosImportesSolicitudes()
	{
		return $this->conceptosImportesSolicitudes;
	
	}
	
	
	/**
	 * Set tiposEventos
	 **@param \Object $tiposEventos
	 *
	 *@return Solicitud
	 */
	
	public function setTiposEventos($tiposEventos)
	{
		$this->tiposEventos = $tiposEventos;
		return $this;
	}
	
	/**
	 * Get tiposEventos
	 *
	 * @return \Object
	 */
	
	public function getTiposEventos()
	{
		return $this->tiposEventos;
	
	}
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comprobantes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->conceptosImportesSolicitudes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tiposEventos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add comprobante
     *
     * @param \AppBundle\Entity\Comprobante $comprobante
     *
     * @return Solicitud
     */
    public function addComprobante(\AppBundle\Entity\Comprobante $comprobante)
    {
        $this->comprobantes[] = $comprobante;

        return $this;
    }

    /**
     * Remove comprobante
     *
     * @param \AppBundle\Entity\Comprobante $comprobante
     */
    public function removeComprobante(\AppBundle\Entity\Comprobante $comprobante)
    {
        $this->comprobantes->removeElement($comprobante);
    }

    /**
     * Add conceptosImportesSolicitude
     *
     * @param \AppBundle\Entity\ConceptoImporteSolicitud $conceptosImportesSolicitude
     *
     * @return Solicitud
     */
    public function addConceptosImportesSolicitude(\AppBundle\Entity\ConceptoImporteSolicitud $conceptosImportesSolicitude)
    {
        $this->conceptosImportesSolicitudes[] = $conceptosImportesSolicitude;

        return $this;
    }

    /**
     * Remove conceptosImportesSolicitude
     *
     * @param \AppBundle\Entity\ConceptoImporteSolicitud $conceptosImportesSolicitude
     */
    public function removeConceptosImportesSolicitude(\AppBundle\Entity\ConceptoImporteSolicitud $conceptosImportesSolicitude)
    {
        $this->conceptosImportesSolicitudes->removeElement($conceptosImportesSolicitude);
    }

    /**
     * Get conceptosImportesSolicitudes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConceptosImportesSolicitudes()
    {
        return $this->conceptosImportesSolicitudes;
    }

    /**
     * Add tiposEvento
     *
     * @param \AppBundle\Entity\TipoEvento $tiposEvento
     *
     * @return Solicitud
     */
    public function addTiposEvento(\AppBundle\Entity\TipoEvento $tiposEvento)
    {
        $this->tiposEventos[] = $tiposEvento;

        return $this;
    }

    /**
     * Remove tiposEvento
     *
     * @param \AppBundle\Entity\TipoEvento $tiposEvento
     */
    public function removeTiposEvento(\AppBundle\Entity\TipoEvento $tiposEvento)
    {
        $this->tiposEventos->removeElement($tiposEvento);
    }
    
    /**
     * 
     * @return \Symfony\Component\Form\Extension\Core\Type\CheckboxType
     */
    public function getchkpasajes()
    {
    	return $this->chkpasajes;
    }
    
    /**
     * 
     * @param unknown $chkpasaje
     */
    public function setChkPasajes($chkpasaje)
    {
    	$this->chkpasajes = $chkpasaje;
    	return $this;
    }
    
    /**
     * 
     * @return \Symfony\Component\Form\Extension\Core\Type\NumberType
     */
    public function getmntPasajes()
    {
    	return $this->mntpasajes;
    }
    
    /**
     * 
     * @param unknown $mntpasaje
     * @return \AppBundle\Entity\Solicitud
     */
    public function setmntPasajes($mntpasaje)
    {
    	$this->mntpasajes = $mntpasaje;
    	return $this;
    }
}
