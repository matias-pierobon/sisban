<?php

namespace MPM\BancoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Operacion
 *
 * @ORM\Table(name="operaciones")
 * @ORM\Entity(repositoryClass="MPM\BancoBundle\Entity\OperacionRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"deposito" = "Deposito", "extraccion" = "Extraccion", "transferencia" = "Transferencia", "prestamo" = "Prestamo"})
 */
class Operacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255)
     */
    private $ip;

    /**
     * @ORM\ManyToOne(targetEntity="Cuenta", inversedBy="operaciones")
     * @ORM\JoinColumn(name="cuenta_id", referencedColumnName="id")
     **/
    private $cuenta;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Operacion
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
     * Set ip
     *
     * @param string $ip
     * @return Operacion
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set cuenta
     *
     * @param \MPM\BancoBundle\Entity\Cuenta $cuenta
     * @return Operacion
     */
    public function setCuenta(\MPM\BancoBundle\Entity\Cuenta $cuenta = null)
    {
        $this->cuenta = $cuenta;

        return $this;
    }

    /**
     * Get cuenta
     *
     * @return \MPM\BancoBundle\Entity\Cuenta 
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }
}
