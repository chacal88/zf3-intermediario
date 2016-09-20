<?php


namespace Avaliacao\Model;

/**
 * Class Cliente
 * @package Avaliacao\Model
 */
class Cliente implements IModel
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
     * @var string
     */
    protected $sexo;

    /**
     * @var Date
     */
    protected $data_nascimento;

    /**
     * @var Endereco[]
     */
    protected $enderecos;

    /**
     * @var Telefone[]
     */
    protected $telefones;

    /**
     * @param array $data
     */
    public function exchangeArray(array $data)
    {
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->nome = (!empty($data['nome'])) ? $data['nome'] : null;
        $this->cpf_cnpj = (!empty($data['cpf_cnpj'])) ? $data['cpf_cnpj'] : null;
        $this->email = (!empty($data['email'])) ? $data['email'] : null;
    }

    /**
     * @param $data
     */
    public function exchangeApi($data)
    {
        $this->nome = (string) (!empty($data->DADOS->NOME)) ? $data->DADOS->NOME : null;
        $this->cpf_cnpj = (!empty($data->DADOS->CPF)) ? $data->DADOS->CPF : null;
        $this->data_nascimento = (!empty($data->DADOS->DATA_NASC)) ? $data->DADOS->DATA_NASC : null;
        $this->sexo = (!empty($data->DADOS->SEXO)) ? $data->DADOS->SEXO : null;

        $enderecoArray = $data->DADOS->ENDERECOS;
        $enderecoSize = count($data->DADOS->ENDERECOS);
        if(count($enderecoSize) >0)
        {
            for($i=0;$i< $enderecoSize;$i++){
                $endereco = new Endereco();
                $endereco->exchangeApi($enderecoArray[$i]->ENDERECO);
                $this->addEndereco($endereco);
            }
        }

        $telefoneArray = $data->DADOS->TELEFONES_MOVEIS;
        $telefoneSize = count($telefoneArray);
        if(count($telefoneSize) >0)
        {
            for($i=0;$i< $telefoneSize;$i++){
                $telefone = new Telefone();
                $telefone->setNumero($telefoneArray[$i]->TELEFONE);
                $telefone->setTipo('Cel');
                $this->addTelefone($telefone);
            }
        }

        $telefoneArray = $data->DADOS->TELEFONES_COMERCIAIS;
        $telefoneSize = count($telefoneArray);
        if(count($telefoneSize) >0)
        {
            for($i=0;$i< $telefoneSize;$i++){
                $telefone = new Telefone();
                $telefone->setNumero($telefoneArray[$i]->TELEFONE);
                $telefone->setTipo('Comercial');
                $this->addTelefone($telefone);
            }
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'cpf_cnpj' => $this->cpf_cnpj,
            'email' => $this->email,
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
        return $this;
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
        return $this;
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
        return $this;
    }

    /**
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param string $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
        return $this;
    }

    /**
     * @return Date
     */
    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }

    /**
     * @param Date $data_nascimento
     */
    public function setDataNascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
        return $this;
    }

    /**
     * @return Endereco[]
     */
    public function getEnderecos()
    {
        return $this->enderecos;
    }

    /**
     * @param Endereco[] $enderecos
     */
    public function setEnderecos(array $enderecos)
    {
        $this->enderecos = $enderecos;
        return $this;
    }

    /**
     * @param Endereco $endereco
     */
    public function addEndereco(Endereco $endereco)
    {
        $this->enderecos[] = $endereco;
        return $this;
    }

    /**
     * @return Telefone[]
     */
    public function getTelefones()
    {
        return $this->telefones;
    }

    /**
     * @param Telefone[] $telefones
     */
    public function setTelefones(array $telefones)
    {
        $this->telefones = $telefones;
        return $this;
    }

    /**
     * @param Telefone $telefone
     */
    public function addTelefone(Telefone $telefone)
    {
        $this->telefones[] = $telefone;
        return $this;
    }


}