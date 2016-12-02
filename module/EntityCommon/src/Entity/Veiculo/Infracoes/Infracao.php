<?php
/**
 * Copyright (c) 2016 , Nexxus Tecnologia All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are permitted,:
 *
 */

namespace VeiculoCommon\Entity\Infracoes;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Exclude;
use Skel\Entity\Entity as Persistable;
use Skel\Entity\Infracoes\Recursos\Recurso;
use Skel\Lib\DataTime as DataFactory;


/**
 * Class Infracao
 *
 * @author Kaue Rodrigues <kauemsc@gmail.com>
 *
 * @package VeiculoCommon\Entity\Infracoes
 *
 * @ORM\Table(
 *     name="infracao",
 *     indexes={
 *         @ORM\Index(name="infracao_index_id", columns={"id"})
 *     }
 * )
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 *
 */
class Infracao
{

    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(name="nivel", type="integer", length=1, nullable=true)
     */
    protected $nivel;

    /**
     * @ORM\Column(name="orgao", type="string", length=22, nullable=true)
     */
    protected $orgao;

    /**
     * @ORM\Column(name="numero", type="string", length=22, nullable=true)
     */
    protected $numero;

    /**
     * @ORM\Column(name="codigo", type="string", length=22, nullable=true)
     */
    protected $codigo;

    /**
     * @ORM\Column(name="situacao", type="string", length=20, nullable=true)
     */
    protected $situacao;

    /**
     * @ORM\Column(name="descricao", type="string", length=255, nullable=true)
     */
    protected $descricao;

    /**
     * @ORM\Column(name="cidade", type="string", length=20, nullable=true)
     */
    protected $cidade;

    /**
     * @ORM\Column(name="data", type="datetime", length=20, nullable=true)
     *
     * @var \DateTime
     */
    protected $data;

    /**
     * @ORM\Column(name="valor", type="float", length=20, nullable=true)
     */
    protected $valor;

    /**
     * @ORM\Column(name="limite", type="datetime", length=20, nullable=true)
     *
     * @var \DateTime
     */
    protected $limite;

    /**
     * @ORM\Column(name="lancamento", type="datetime", length=20, nullable=true)
     *
     * @var \DateTime
     */
    protected $lancamento;

    /**
     * @ORM\Column(name="local", type="string", length=90, nullable=true)
     */
    protected $local;

    /**
     * @ORM\OneToOne(targetEntity="Skel\Entity\Infracoes\Recursos\Recurso",cascade={"persist"})
     * @ORM\JoinColumn(name="recurso_id", referencedColumnName="id")
     *
     * @var Recurso
     */
    protected $recurso;

    /**
     * @Exclude
     * @ORM\ManyToOne(targetEntity="Skel\Entity\Veiculos\Veiculo", inversedBy="infracoes", cascade={"persist"})
     * @ORM\JoinColumn(name="veiculo_id", referencedColumnName="id")
     *
     * @var Veiculo
     */
    protected $veiculo;

    /**
     * @Exclude
     * @ORM\ManyToOne(targetEntity="Skel\Entity\Condutores\Condutor", inversedBy="infracoes", cascade={"persist"})
     *
     * @var Veiculo
     */
    protected $condutor;

    /**
     *
     * @param DateTime $data            
     */
    public function setData($data)
    {
            $this->data = DataFactory::created($data);
    }

    /**
     *
     * @param DateTime $limite            
     */
    public function setLimite($limite)
    {
            $this->limite = DataFactory::created($limite);
    }

    /**
     *
     * @param DateTime $lancamento            
     */
    public function setLancamento($lancamento)
    {
            $this->lancamento = DataFactory::created($lancamento);
    }

    /**
     *
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @return the $nivel
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * @return mixed
     */
    public function getOrgao()
    {
        return $this->orgao;
    }

    /**
     * @param mixed $orgao
     */
    public function setOrgao($orgao)
    {
        $this->orgao = $orgao;
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }


    /**
     *
     * @return the $numero
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     *
     * @return the $situacao
     */
    public function getSituacao()
    {
        return $this->situacao;
    }

    /**
     *
     * @return the $descricao
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     *
     * @return the $cidade
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     *
     * @return the $data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     *
     * @return the $valor
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     *
     * @return the $limite
     */
    public function getLimite()
    {
        return $this->limite;
    }

    /**
     *
     * @return the $lancamento
     */
    public function getLancamento()
    {
        return $this->lancamento;
    }

    /**
     *
     * @return the $local
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     *
     * @return the $veiculo
     */
    public function getVeiculo()
    {
        return $this->veiculo;
    }

    /**
     *
     * @return the $recurso
     */
    public function getRecurso()
    {
        return $this->recurso;
    }

    /**
     *
     * @param number $id            
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     *
     * @param field_type $nivel            
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }


    /**
     *
     * @param field_type $numero            
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     *
     * @param field_type $situacao            
     */
    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;
    }

    /**
     *
     * @param field_type $descricao            
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     *
     * @param field_type $cidade            
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    /**
     *
     * @param field_type $valor            
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     *
     * @param field_type $local            
     */
    public function setLocal($local)
    {
        $this->local = $local;
    }

    /**
     *
     * @param \Skel\Entity\Infracoes\Veiculo $veiculo            
     */
    public function setVeiculo($veiculo)
    {
        $this->veiculo = $veiculo;
    }

    /**
     *
     * @param \Skel\Entity\Infracoes\Recursos\Recurso $recurso            
     */
    public function setRecurso($recurso)
    {
        $this->recurso = $recurso;
    }

    /**
     * @return the $condutor
     */
    public function getCondutor()
    {
        return $this->condutor;
    }

    /**
     * @param \Skel\Entity\Infracoes\Veiculo $condutor
     */
    public function setCondutor($condutor)
    {
        $this->condutor = $condutor;
    }

}
