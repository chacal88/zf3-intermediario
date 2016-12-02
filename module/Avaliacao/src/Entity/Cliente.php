<?php

namespace Avaliacao\Entity;

use Common\Entity\Traits\TEntity;
use Common\Lib\DateTimeStrategy;
use DataWash\Entity\PessoaFisica;
use DataWash\Entity\PessoaJuridica;
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
     * @param $pessoaFisica
     */
    public function exchangeApiCpf(PessoaFisica $pessoaFisica)
    {
        $this->setNome($pessoaFisica->getNome());
        $this->setCpfCnpj($pessoaFisica->getCpf());
        $this->setData($pessoaFisica->getDataNascimento());
        $this->setSexo($pessoaFisica->getSexo());
        $this->setTipo('Fisica');

        if ($pessoaFisica->getEnderecos()) {

            while ($item = $pessoaFisica->getEnderecos()->iterate()) {
                $endereco = new Endereco();
                $endereco->exchangeApi($item);
                $endereco->setCliente($this);
                $this->enderecos [] = $endereco;
            }
        }


        if ($pessoaFisica->getTelefones()) {
            while ($item = $pessoaFisica->getTelefones()->iterate()) {
                $telefone = new Telefone();
                $telefone->exchangeApi($item);
                $telefone->setCliente($this);
                $this->telefones[] = $telefone;

            }
        }

    }

    /**
     * @param $pessoaJuridica
     */
    public function exchangeApiCnpj(PessoaJuridica $pessoaJuridica)
    {

        $this->setNome($pessoaJuridica->getRazaoSocial());
        $this->setCpfCnpj($pessoaJuridica->getCnpj());
        $this->setData($pessoaJuridica->getDataAbertura());
        $this->setTipo('Juridica');


        if ($pessoaJuridica->getEnderecos()) {

            while ($item = $pessoaJuridica->getEnderecos()->iterate()) {
                $endereco = new Endereco();
                $endereco->exchangeApi($item);
                $endereco->setCliente($this);
                $this->enderecos [] = $endereco;
            }
        }

        if ($pessoaJuridica->getTelefones()) {

            while ($item = $pessoaJuridica->getTelefones()->iterate()) {
                $telefone = new Telefone();
                $telefone->exchangeApi($item);
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

        return $this;
    }
}
