<?php

namespace Avaliacao\Entity;

use Common\Entity\Traits\TEntity;
use Common\Lib\DateTimeStrategy;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Zend\Hydrator\ClassMethods;

/**
 * Clientes
 *
 * @ORM\Table(name="clientes")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Cliente
{

    use TEntity;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=24, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf_cnpj", type="string", length=24, nullable=true)
     */
    private $cpfCnpj;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=12, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=24, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=12, nullable=true)
     */
    private $sexo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="date", nullable=true)
     */
    private $data;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity="Avaliacao\Entity\Telefone", mappedBy="cliente",cascade={"persist"})
     */
    private $telefones;

    /**
     * @ORM\OneToMany(targetEntity="Avaliacao\Entity\Endereco", mappedBy="cliente",cascade={"persist"})
     */
    private $enderecos;

    /**
     *
     * @ORM\OneToMany(targetEntity="Avaliacao\Entity\Veiculo", mappedBy="cliente")
     * @ORM\JoinColumn(nullable=true)
     *
     * @var ArrayCollection
     */
    private $veiculos;


    public function __construct()
    {
//        $this->active = true;
        $this->telefones = new ArrayCollection();
        $this->enderecos = new ArrayCollection();
        $this->veiculos = new ArrayCollection();
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Cliente
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set cpfCnpj
     *
     * @param string $cpfCnpj
     *
     * @return Cliente
     */
    public function setCpfCnpj($cpfCnpj)
    {
        $this->cpfCnpj = $cpfCnpj;

        return $this;
    }

    /**
     * Get cpfCnpj
     *
     * @return string
     */
    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Cliente
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
     * Set email
     *
     * @param string $email
     *
     * @return Cliente
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     *
     * @return Cliente
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     *
     * @return Cliente
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Cliente
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getTelefones()
    {
        return $this->telefones;
    }

    /**
     * @param mixed $telefones
     */
    public function setTelefones($telefones)
    {
        $this->telefones = $telefones;
    }

    public function addTelefones(Telefone $telefone)
    {
        $telefone->setCliente($this);
        $this->telefones[] = $telefone;
    }

    /**
     * @return mixed
     */
    public function getEnderecos()
    {
        return $this->enderecos;
    }

    /**
     * @param mixed $enderecos
     */
    public function setEnderecos($enderecos)
    {
        $this->enderecos = $enderecos;
    }

    public function addEnderecos(Endereco $endereco)
    {
        $endereco->setCliente($this);
        $this->enderecos[] = $endereco;
    }

    /**
     * @return ArrayCollection
     */
    public function getVeiculos()
    {
        return $this->veiculos;
    }

    /**
     * @param ArrayCollection $veiculos
     */
    public function setVeiculos($veiculos)
    {
        $this->veiculos = $veiculos;
    }


//    /**
//     * @return mixed
//     */
//    public function getVeiculos()
//    {
//        return $this->veiculos;
//    }
//
//    /**
//     * @param mixed $veiculos
//     */
//    public function setVeiculos($veiculos)
//    {
//        $this->veiculos = $veiculos;
//    }
//
//    public function addVeiculo(Veiculo $veiculo)
//    {
//        $veiculo->setCliente($this);
//        $this->veiculos[] = $veiculo;
//    }

    /**
     * @param $data
     */
    public function exchangeApiCpf($data)
    {
        if (!empty($data->DADOS->NOME)) {
            $this->setNome((string)$data->DADOS->NOME);
        }

        if (!empty($data->DADOS->CPF)) {
            $this->setCpfCnpj((string)$data->DADOS->CPF);
        }

        if (!empty($data->DADOS->DATA_NASC)) {
            $this->setData($data->DADOS->DATA_NASC);
        }

        if (!empty($data->DADOS->SEXO)) {
            $this->setSexo((string)$data->DADOS->SEXO);
        }

        $this->setTipo('Fisica');

        $enderecoArray = $data->DADOS->ENDERECOS->ENDERECO;
        $enderecoSize = count($enderecoArray);
        if (count($enderecoSize) > 0) {
            for ($i = 0; $i < $enderecoSize; $i++) {
                $endereco = new Endereco();
                $endereco->exchangeApi($enderecoArray[$i]);
                $this->addEnderecos($endereco);
            }
        }

        $telefoneArray = $data->DADOS->TELEFONES_FIXOS->TELEFONE;
        $telefoneSize = count($telefoneArray);
        if (count($telefoneSize) > 0) {
            for ($i = 0; $i < $telefoneSize; $i++) {
                $telefone = new Telefone();
                $telefone->setNumero((string)$telefoneArray[$i]);
                $telefone->setTipo('Residencial');
                $this->addTelefones($telefone);
            }
        }

        $telefoneArray = $data->DADOS->TELEFONES_MOVEIS->TELEFONE;
        $telefoneSize = count($telefoneArray);
        if (count($telefoneSize) > 0) {
            for ($i = 0; $i < $telefoneSize; $i++) {
                $telefone = new Telefone();
                $telefone->setNumero((string)$telefoneArray[$i]);
                $telefone->setTipo('Cel');
                $telefone->setCliente($this);
                $this->addTelefones($telefone);
            }
        }

        $telefoneArray = $data->DADOS->TELEFONES_COMERCIAIS->TELEFONE;
        $telefoneSize = count($telefoneArray);
        if (count($telefoneSize) > 0) {
            for ($i = 0; $i < $telefoneSize; $i++) {
                $telefone = new Telefone();
                $telefone->setNumero((string)$telefoneArray[$i]);
                $telefone->setTipo('Comercial');
                $telefone->setCliente($this);
                $this->addTelefones($telefone);
            }
        }
    }

    /**
     * @param $data
     */
    public function exchangeApiCnpj($data)
    {
        $this->nome = (string)(!empty($data->DADOS->RAZAO_SOCIAL)) ? $data->DADOS->RAZAO_SOCIAL : null;
        $this->cpfCnpj = (!empty($data->DADOS->CNPJ)) ? $data->DADOS->CNPJ : null;
        $this->data = (!empty($data->DADOS->DATA_ABERTURA)) ? $data->DADOS->DATA_ABERTURA : null;
        $this->tipo = 'Juridica';

        $enderecoArray = $data->DADOS->ENDERECOS;
        $enderecoSize = count($data->DADOS->ENDERECOS);
        if (count($enderecoSize) > 0) {
            for ($i = 0; $i < $enderecoSize; $i++) {
                $endereco = new Endereco();
                $endereco->exchangeApi($enderecoArray[$i]->ENDERECO);
                $endereco->setCliente($this);
                $this->enderecos [] = $endereco;
            }
        }

        $telefoneArray = $data->DADOS->TELEFONES->TELEFONE;
        $telefoneSize = count($telefoneArray);
        if (count($telefoneSize) > 0) {
            for ($i = 0; $i < $telefoneSize; $i++) {
                $telefone = new Telefone();
                $telefone->setNumero($telefoneArray[$i]);
                $telefone->setTipo('Comercial');
                $telefone->setCliente($this);
                $this->telefones[] = $telefone;
            }
        }
    }

    public function hydrate($data)
    {
        $hydrator = new ClassMethods();
        $hydrator->addStrategy('data', new DateTimeStrategy());
        $hydrator->hydrate($data, $this);

        $this->__construct();

        if (!empty($data['enderecos'])) {

            $enderecoArray = $data['enderecos'];
            $enderecoSize = count($enderecoArray);

            if (count($enderecoSize) > 0) {
                for ($i = 0; $i < $enderecoSize; $i++) {
                    $endereco = new Endereco();
                    $endereco->hydrate($enderecoArray[$i]);
                    $endereco->setCliente($this);
                    $this->enderecos[] = $endereco;
                }
            }
        }

        if (!empty($data['telefones'])) {

            $telefoneArray = $data['telefones'];
            $telefoneSize = count($telefoneArray);

            if (count($telefoneSize) > 0) {
                for ($i = 0; $i < $telefoneSize; $i++) {
                    $telefone = new Telefone();
                    $telefone->hydrate($telefoneArray[$i]);
                    $telefone->setCliente($this);
                    $this->telefones[] = $telefone;
                }
            }
        }

//        if(!empty($data['veiculos'])){
//
//            $veiculoArray   = $data['veiculos'];
//            $veiculosSize    = count($telefoneArray);
//
//            if(count($veiculosSize) >0)
//            {
//                for($i=0;$i< $veiculosSize;$i++){
//                    $veiculo = new Veiculo();
//                    $veiculo->hydrate($veiculoArray[$i]);
//                    $this->veiculos[] = $veiculo;
//                }
//            }
//        }
        return $this;
    }
}
