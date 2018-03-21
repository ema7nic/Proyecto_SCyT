<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsuarioRepository")
 */
class Usuario {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="roles", type="array")
     * @var array
     */
    private $roles;

    /**
     * @var string
     * 
     * @Assert\NotBlank() 
     * @Assert\Length(min="3", max="35")
     *
     * @ORM\Column(name="nombre", type="string", length=35)
     */
    private $nombre;

    /**
     * @var string
     * 
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Length(min="3", max="35")
     *
     * @ORM\Column(name="apellido", type="string", length=35)
     */
    private $apellido;

    /**
     * @var string
     * 
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="telefono", type="string", length=35, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     * 
     * @Assert\Email(
     *     message = "El email '{{ value }}' no es válido.",
     *     checkMX = true
     * )
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
     * @ORM\Column(type="string", length=6)
     * @Assert\Choice( choices = {"DNI", "LC", "LE"}, message = "Seleccione el tipo de documento")
     */
    protected $tipoDni;

    /**
     * @var int
     *
     * @ORM\Column(name="dni", type="integer", unique=true)
     */
    private $dni;

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

    public function __construct() {
        $this->solicitudes = new ArrayCollection();
        $this->asignaciones = new ArrayCollection();
        $this->roles = Array();
    }

    function getRoles() {
        return $this->roles;
    }

    function setRoles($roles) {
        $this->roles = $roles;
    }

        
    function getTipoDni() {
        return $this->tipoDni;
    }

    function setTipoDni($tipoDni) {
        $this->tipoDni = $tipoDni;
    }
        /**
     * @param \Doctrine\Common\Collections\ArrayCollection $asignaciones
     */
    public function setAsignaciones($asignaciones) {
        $this->asignaciones = $asignaciones;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set solicitud
     *
     * @param solicitudes
     */
    public function setSolicitudes($solicitudes) {

        $this->solicitudes = $solicitudes;
    }

    /**
     * Get solicitudes
     *
     * @return solicitudes
     */
    public function getSolicitudes() {
        return $this->solicitudes;
    }

    /**
     * Set clave
     *
     * @param string $clave
     *
     * @return Usuario
     */
    public function setClave($clave) {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get clave
     *
     * @return string
     */
    public function getClave() {
        return $this->clave;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Usuario
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

    function getApellido() {
        return $this->apellido;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Usuario
     */
    public function setTelefono($telefono) {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono() {
        return $this->telefono;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Usuario
     */
    public function setMail($mail) {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail() {
        return $this->mail;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     *
     * @return Usuario
     */
    public function setFechaAlta($fechaAlta) {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime
     */
    public function getFechaAlta() {
        return $this->fechaAlta;
    }

    /**
     * Set fechaBaja
     *
     * @param \DateTime $fechaBaja
     *
     * @return Usuario
     */
    public function setFechaBaja($fechaBaja) {
        $this->fechaBaja = $fechaBaja;

        return $this;
    }

    /**
     * Get fechaBaja
     *
     * @return \DateTime
     */
    public function getFechaBaja() {
        return $this->fechaBaja;
    }

    /**
     * Set fechaUltimaModificacion
     *
     * @param \DateTime $fechaUltimaModificacion
     *
     * @return Usuario
     */
    public function setFechaUltimaModificacion($fechaUltimaModificacion) {
        $this->fechaUltimaModificacion = $fechaUltimaModificacion;

        return $this;
    }

    /**
     * Get fechaUltimaModificacion
     *
     * @return \DateTime
     */
    public function getFechaUltimaModificacion() {
        return $this->fechaUltimaModificacion;
    }

    /**
     * Set dni
     *
     * @param integer $dni
     *
     * @return Usuario
     */
    public function setDni($dni) {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return int
     */
    public function getDni() {
        return $this->dni;
    }

    /**
     * Set proyectosGrupos
     *
     * @param \Object $proyectosGrupos
     *
     * @return Usuario
     */
    public function setProyectosGrupos($proyectosGrupos) {
        $this->proyectosGrupos = $proyectosGrupos;

        return $this;
    }

    /**
     * Get proyectosGrupos
     *
     * @return \Object
     */
    public function getProyectosGrupos() {
        return $this->proyectosGrupos;
    }

    /**
     * Add solicitude
     *
     * @param \AppBundle\Entity\Solicitud $solicitude
     *
     * @return Usuario
     */
    public function addSolicitude(\AppBundle\Entity\Solicitud $solicitude) {
        $this->solicitudes[] = $solicitude;

        return $this;
    }

    /**
     * Remove solicitude
     *
     * @param \AppBundle\Entity\Solicitud $solicitude
     */
    public function removeSolicitude(\AppBundle\Entity\Solicitud $solicitude) {
        $this->solicitudes->removeElement($solicitude);
    }

    /**
     * Add asignacione
     *
     * @param \AppBundle\Entity\Asignacion $asignacione
     *
     * @return Usuario
     */
    public function addAsignacione(\AppBundle\Entity\Asignacion $asignacione) {
        $this->asignaciones[] = $asignacione;

        return $this;
    }

    /**
     * Remove asignacione
     *
     * @param \AppBundle\Entity\Asignacion $asignacione
     */
    public function removeAsignacione(\AppBundle\Entity\Asignacion $asignacione) {
        $this->asignaciones->removeElement($asignacione);
    }

    /**
     * Get asignaciones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAsignaciones() {
        return $this->asignaciones;
    }

    /**
     * Add proyectosGrupo
     *
     * @param \AppBundle\Entity\ProyectoGrupo $proyectosGrupo
     *
     * @return Usuario
     */
    public function addProyectosGrupo(\AppBundle\Entity\ProyectoGrupo $proyectosGrupo) {
        $this->proyectosGrupos[] = $proyectosGrupo;

        return $this;
    }

    /**
     * Remove proyectosGrupo
     *
     * @param \AppBundle\Entity\ProyectoGrupo $proyectosGrupo
     */
    public function removeProyectosGrupo(\AppBundle\Entity\ProyectoGrupo $proyectosGrupo) {
        $this->proyectosGrupos->removeElement($proyectosGrupo);
    }

}
