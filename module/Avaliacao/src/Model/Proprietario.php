<?php


namespace Avaliacao\Model;

/**
 * Class Proprietario
 * @package Avaliacao\Model
 */
class Proprietario implements IModel
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $nome;

    /**
     * @var string
     */
    protected $cpf_cnpj;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var array
     */
    protected $enderecos;

    /**
     * @var array
     */
    protected $telefones;

    /**
     * @param array $data
     */
    public function exchangeArray(array $data)
    {
        $this->id       = (!empty($data['id']))         ? $data['id'] : null;
        $this->nome     = (!empty($data['nome']))       ? $data['nome'] : null;
        $this->cpf_cnpj = (!empty($data['cpf_cnpj']))   ? $data['cpf_cnpj'] : null;
        $this->email    = (!empty($data['email']))      ? $data['email'] : null;
    }

    /**
     * @return array
     */
    public function getArrayCopy()
    {
        return [
            'id'        => $this->id,
            'nome'      => $this->nome,
            'cpf_cnpj'  => $this->cpf_cnpj,
            'email'     => $this->email,
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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getCpfCnpj()
    {
        return $this->cpf_cnpj;
    }

    /**
     * @param string $cpf_cnpj
     */
    public function setCpfCnpj($cpf_cnpj)
    {
        $this->cpf_cnpj = $cpf_cnpj;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return array
     */
    public function getEnderecos()
    {
        return $this->enderecos;
    }

    /**
     * @param array $enderecos
     */
    public function setEnderecos($enderecos)
    {
        $this->enderecos = $enderecos;
    }

    /**
     * @return array
     */
    public function getTelefones()
    {
        return $this->telefones;
    }

    /**
     * @param array $telefones
     */
    public function setTelefones($telefones)
    {
        $this->telefones = $telefones;
    }
}