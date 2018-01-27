<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;


/**
 * Provincia
 *
 * @ORM\Table(name="Provincia")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProvinciaRepository")
 */
class Provincia {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(type="string") 
     *
     */
    private $nombre;    

   
    /**
     * @ORM\ManyToOne(targetEntity="Pais")
     * @ORM\JoinColumn(name="id_pais", referencedColumnName="id", nullable=false)
     */
    private $pais;

    /**
     * Constructor
     */
    public function __construct() {
        
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Provincia
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre() {
        return $this->nombre;
    }    

    public function __toString() {
        return $this->getNombre();
    }

    
    /**
     * Set pais
     *
     * @param \AppBundle\Entity\Pais $pais
     *
     * @return Provincia
     */
    public function setPais(\AppBundle\Entity\Pais $pais)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return \AppBundle\Entity\Pais
     */
    public function getPais()
    {
        return $this->pais;
    }
}
