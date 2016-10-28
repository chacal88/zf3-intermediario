<?php


namespace Avaliacao\Entity\Traits;
use Avaliacao\Entity\Cliente;

/**
 * Created by PhpStorm.
 * User: chacal
 * Date: 14/10/16
 * Time: 19:48
 */
trait TCliente
{
    /**
     * @ORM\ManyToOne(targetEntity="Avaliacao\Entity\Cliente",cascade={"persist"})
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id",nullable=true)
     */
    private $cliente;

    /**
     * Set clienteId
     *
     * @param Cliente $cliente
     *
     * @return TCliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

}