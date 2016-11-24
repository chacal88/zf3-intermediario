<?php
/**
 * Copyright (c) 2016 , Nexxus Tecnologia All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are permitted,:
 *
 */

declare(strict_types = 1);


namespace Avaliacao\Entity;


use Avaliacao\Entity\Traits\TAvaliador;
use Common\Entity\Traits\TEntity;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class AvaliacaoFipe
 *
 * @author Kaue Rodrigues <kauemsc@gmail.com>
 *
 * @package Avaliacao\Entity
 *
 * @ORM\Table(
 *         name="avaliacao_fipe"
 *         )
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class AvaliacaoFipe
{

    use TEntity;


    /**
     * @ORM\Column(name="tipo", type="string", length=22, nullable=true)
     * @Serializer\Type("string")
     * @var string
     */
    private $tipo;

    /**
     * @ORM\Column(name="marca", type="string", length=22, nullable=true)
     * @Serializer\Type("string")
     * @var string
     */
    private $marca;

    /**
     * @ORM\Column(name="modelo", type="string", length=22, nullable=true)
     * @Serializer\Type("string")
     * @var string
     */
    private $modelo;

    /**
     * @ORM\Column(name="ano", type="string", length=22, nullable=true)
     * @Serializer\Type("string")
     * @var string
     */
    private $ano;

    /**
     * @ORM\Column(name="codigo", type="string", length=22, nullable=true)
     * @Serializer\Type("string")
     * @var string
     */
    private $codigo;

    /**
     * @ORM\Column(name="quilometragem", type="float", scale=2, nullable=true)
     * @Serializer\Type("float")
     * @var float
     */
    private $quilometragem;

    /**
     * @ORM\Column(name="pneu", type="string",length=22, nullable=true)
     * @Serializer\Type("string")
     * @var string
     */
    private $pneu;

    /**
     * @ORM\Column(name="obs", type="text", nullable=true)
     * @Serializer\Type("text")
     * @var string
     */
    private $obs;

    /**
     * @ORM\Column(name="valor", type="float", scale=2,  nullable=true)
     * @Serializer\Type("float")
     * @var float
     */
    private $valor;

    /**
     * @ORM\Column(name="valor_fipe", type="string",length=22, nullable=true)
     * @Serializer\Type("string")
     * @var string
     */
    private $valorFipe;

    /**
     * @ORM\ManyToOne(targetEntity="Avaliacao\Entity\Veiculo",cascade={"persist"})
     * @ORM\JoinColumn(name="veiculo_id", referencedColumnName="id",nullable=true)
     * @var Veiculo
     */
    private $veiculo;

    use TAvaliador;


    /**
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param string $tipo
     * @return AvaliacaoFipe
     */
    public function setTipo(string $tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param string $marca
     * @return AvaliacaoFipe
     */
    public function setMarca(string $marca)
    {
        $this->marca = $marca;
        return $this;
    }

    /**
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param string $modelo
     * @return AvaliacaoFipe
     */
    public function setModelo(string $modelo)
    {
        $this->modelo = $modelo;
        return $this;
    }

    /**
     * @return string
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * @param string $ano
     * @return AvaliacaoFipe
     */
    public function setAno(string $ano)
    {
        $this->ano = $ano;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param string $codigo
     * @return AvaliacaoFipe
     */
    public function setCodigo(string $codigo)
    {
        $this->codigo = $codigo;
        return $this;
    }

    /**
     * @return float
     */
    public function getQuilometragem()
    {
        return $this->quilometragem;
    }

    /**
     * @param float $quilometragem
     * @return AvaliacaoFipe
     */
    public function setQuilometragem(string $quilometragem)
    {
        $filter = new \Zend\I18n\Filter\NumberParse('pt_BR');
        $this->quilometragem = $filter->filter($quilometragem);
        return $this;
    }

    /**
     * @return string
     */
    public function getPneu()
    {
        return $this->pneu;
    }

    /**
     * @param string $pneu
     * @return AvaliacaoFipe
     */
    public function setPneu(string $pneu)
    {
        $this->pneu = $pneu;
        return $this;
    }

    /**
     * @return string
     */
    public function getObs()
    {
        return $this->obs;
    }

    /**
     * @param string $obs
     * @return AvaliacaoFipe
     */
    public function setObs(string $obs)
    {
        $this->obs = $obs;
        return $this;
    }

    /**
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param float $valor
     * @return AvaliacaoFipe
     */
    public function setValor(string $valor)
    {
        $filter = new \Zend\I18n\Filter\NumberParse('pt_BR');
        $this->valor = $filter->filter($valor);
        return $this;
    }

    /**
     * @return string
     */
    public function getValorFipe()
    {
        return $this->valorFipe;
    }

    /**
     * @param string $valorFipe
     * @return AvaliacaoFipe
     */
    public function setValorFipe(string $valorFipe)
    {
        $this->valorFipe = $valorFipe;
        return $this;
    }

    /**
     * @return Veiculo
     */
    public function getVeiculo()
    {
        return $this->veiculo;
    }

    /**
     * @param Veiculo $veiculo
     * @return AvaliacaoFipe
     */
    public function setVeiculo(Veiculo $veiculo)
    {
        $this->veiculo = $veiculo;
        return $this;
    }

}