<?php


namespace Avaliacao\Model;

/**
 * Class Endereco
 * @package Avaliacao\Model
 */
class Telefone implements IModel
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $numero;

    /**
     * @var int
     */
    protected $ddd;

    /**
     * @var int
     */
    protected $ddi;

    /**
     * @var string
     */
    protected $tipo;

    /**
     * @var boolean
     */
    protected $whatsapp;


    /**
     * @param array $data
     */
    public function exchangeArray(array $data)
    {
        $this->id       = (!empty($data['id']))         ? $data['id'] : null;
        $this->numero   = (!empty($data['numero']))     ? $data['numero'] : null;
        $this->ddd      = (!empty($data['ddd']))        ? $data['ddd'] : null;
        $this->ddi      = (!empty($data['ddi']))        ? $data['ddi'] : null;
        $this->tipo     = (!empty($data['tipo']))       ? $data['tipo'] : null;
        $this->whatsapp = (!empty($data['whatsapp']))   ? $data['whatsapp'] : null;
    }

    /**
     * @return array
     */
    public function getArrayCopy()
    {
        return [
            'id'        => $this->id,
            'numero'    => $this->numero,
            'ddd'       => $this->ddd,
            'ddi'       => $this->ddi,
            'tipo'      => $this->tipo,
            'whatsapp'  => $this->whatsapp,
        ];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param int $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return int
     */
    public function getDdd()
    {
        return $this->ddd;
    }

    /**
     * @param int $ddd
     */
    public function setDdd($ddd)
    {
        $this->ddd = $ddd;
    }

    /**
     * @return int
     */
    public function getDdi()
    {
        return $this->ddi;
    }

    /**
     * @param int $ddi
     */
    public function setDdi($ddi)
    {
        $this->ddi = $ddi;
    }

    /**
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param string $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return boolean
     */
    public function isWhatsapp()
    {
        return $this->whatsapp;
    }

    /**
     * @param boolean $whatsapp
     */
    public function setWhatsapp($whatsapp)
    {
        $this->whatsapp = $whatsapp;
    }

}