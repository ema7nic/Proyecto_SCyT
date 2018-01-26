<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoEvento
 *
 * @ORM\Table(name="tipo_evento")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TipoEventoRepository")
 */
class TipoEvento
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="importe", type="decimal", precision=10, scale=2)
     */
    private $importe;

    
    /**
     * @ORM\ManyToOne(targetEntity="Solicitud", inversedBy="tiposEventos")
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return TipoEvento
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
     * Set importe
     *
     * @param float $importe
     *
     * @return TipoEvento
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get importe
     *
     * @return float
     */
    public function getImporte()
    {
        return $this->importe;
    }
    
    
    /**
     * Set solicitud
     *
     * @param Solicitud $solicitud
     *
     * @return TipoEvento
     */
    public function setSolicitud($solicitud)
    {
    	$this->solicitud = $solicitud;
    
    	return $this;
    }
    
    /**
     * Get solicitud
     *
     * @return Solicitud
     */
    public function getSolicitud()
    {
    	return $this->solicitud;
    }
}
