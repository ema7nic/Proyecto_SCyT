<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comprobante
 *
 * @ORM\Table(name="comprobante")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ComprobanteRepository")
 */
class Comprobante
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
     * @ORM\Column(name="nombre_archivo", type="string", length=255)
     */
    private $nombreArchivo;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion_archivo", type="string", length=255)
     */
    private $ubicacionArchivo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

	/**
     * @ORM\ManyToOne(targetEntity="Solicitud", inversedBy="comprobantes")
     * @ORM\JoinColumn(name="id_solicitud", referencedColumnName="id", nullable=false)
     */
	private $solicitud;

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
     * Set nombreArchivo
     *
     * @param string $nombreArchivo
     *
     * @return Comprobante
     */
    public function setNombreArchivo($nombreArchivo)
    {
        $this->nombreArchivo = $nombreArchivo;

        return $this;
    }

    /**
     * Get nombreArchivo
     *
     * @return string
     */
    public function getNombreArchivo()
    {
        return $this->nombreArchivo;
    }

    /**
     * Set ubicacionArchivo
     *
     * @param string $ubicacionArchivo
     *
     * @return Comprobante
     */
    public function setUbicacionArchivo($ubicacionArchivo)
    {
        $this->ubicacionArchivo = $ubicacionArchivo;

        return $this;
    }

    /**
     * Get ubicacionArchivo
     *
     * @return string
     */
    public function getUbicacionArchivo()
    {
        return $this->ubicacionArchivo;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Comprobante
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }
    
    
    /**
     *  Get solicitud
     *  @return \Solicitud
     * */
    public function getSolicitud()
    {
    	return $this->solicitud;
    }
     
    /**
     * Set solicitud
     * @param \Solicitud $solicitud
     * @return Comprobante
     */
    public function setSolicitud($solicitud)
    {
    	$this->solicitud = $solicitud;
    	
    	return $this;
    }
    
}
