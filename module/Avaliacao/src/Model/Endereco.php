<?php


namespace Avaliacao\Model;

/**
 * Class Endereco
 * @package Avaliacao\Model
 */
class Endereco implements IModel
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $logradouro;

    /**
     * @var int
     */
    protected $numero;

    /**
     * @var string
     */
    protected $complemento;

    /**
     * @var string
     */
    protected $bairro;

    /**
     * @var string
     */
    protected $cep;

    /**
     * @param array $data
     */
    public function exchangeArray(array $data)
    {
        $this->id           = (!empty($data['id']))         ? $data['id'] : null;
        $this->logradouro   = (!empty($data['logradouro'])) ? $data['logradouro'] : null;
        $this->numero       = (!empty($data['numero']))     ? $data['numero'] : null;
        $this->complemento  = (!empty($data['complemento']))? $data['complemento'] : null;
        $this->bairro       = (!empty($data['bairro']))     ? $data['bairro'] : null;
        $this->cep          = (!empty($data['cep']))        ? $data['cep'] : null;
    }

    /**
     * @return array
     */
    public function getArrayCopy()
    {
        return [
            'id'            => $this->id,
            'logradouro'    => $this->logradouro,
            'numero'        => $this->numero,
            'complemento'   => $this->complemento,
            'bairro'        => $this->bairro,
            'cep'           => $this->cep,
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
     * @return string
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * @param string $logradouro
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
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
     * @return string
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * @param string $complemento
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }

    /**
     * @return string
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param string $bairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    /**
     * @return string
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param string $cep
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    }

}