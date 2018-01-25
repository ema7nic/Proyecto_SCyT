<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConceptoImporteSolicitud
 *
 * @ORM\Table(name="concepto_importe_solicitud")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ConceptoImporteSolicitudRepository")
 */
class ConceptoImporteSolicitud
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
     * @ORM\Column(name="concepto", type="string", length=255)
     */
    private $concepto;

    /**
     * @var string
     *
     * @ORM\Column(name="importe", type="decimal", precision=10, scale=2)
     */
    private $importe;


    /**
     * @ORM\ManyToOne(targetEntity="Solicitud", inversedBy="conceptosImportesSolicitudes")
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
     * Set concepto
     *
     * @param string $concepto
     *
     * @return ConceptoImporteSolicitud
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;

        return $this;
    }

    /**
     * Get concepto
     *
     * @return string
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Set importe
     *
     * @param string $importe
     *
     * @return ConceptoImporteSolicitud
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get importe
     *
     * @return string
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
     * @return ConceptoImporteSolicitud
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

