<?php

namespace Avaliacao\Entity;

use Avaliacao\Entity\Traits\TCliente;
use Common\Entity\Traits\TEntity;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Telefones
 *
 * @ORM\Table(name="telefones")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Telefone
{
    use TEntity;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=24, nullable=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="ddd", type="string", length=12, nullable=true)
     */
    private $ddd;

    /**
     * @var string
     *
     * @ORM\Column(name="ddi", type="string", length=12, nullable=true)
     */
    private $ddi;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=12, nullable=true)
     */
    private $tipo;

    /**
     * @var integer
     *
     * @ORM\Column(name="whatsapp", type="smallint", nullable=true)
     */
    private $whatsapp = '0';


    use TCliente;

    /**
     * Set numero
     *
     * @param string $numero
     *
     * @return Telefone
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set ddd
     *
     * @param string $ddd
     *
     * @return Telefone
     */
    public function setDdd($ddd)
    {
        $this->ddd = $ddd;

        return $this;
    }

    /**
     * Get ddd
     *
     * @return string
     */
    public function getDdd()
    {
        return $this->ddd;
    }

    /**
     * Set ddi
     *
     * @param string $ddi
     *
     * @return Telefone
     */
    public function setDdi($ddi)
    {
        $this->ddi = $ddi;

        return $this;
    }

    /**
     * Get ddi
     *
     * @return string
     */
    public function getDdi()
    {
        return $this->ddi;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Telefone
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set whatsapp
     *
     * @param integer $whatsapp
     *
     * @return Telefone
     */
    public function setWhatsapp($whatsapp)
    {
        $this->whatsapp = $whatsapp;

        return $this;
    }

    /**
     * Get whatsapp
     *
     * @return integer
     */
    public function isWhatsapp()
    {
        return $this->whatsapp;
    }

    /**
     * @param $data
     */
    public function exchangeApi(\DataWash\Entity\Telefone $data)
    {
        $this->setNumero($data->getNumero());
        $this->setTipo($data->getTipo());
        $this->setDdd($data->getDdd());
    }
}
