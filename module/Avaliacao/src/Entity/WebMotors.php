<?php

namespace Avaliacao\Entity;

use Common\Entity\Traits\TEntity;
use Doctrine\ORM\Mapping as ORM;
use Zend\Db\Sql\Ddl\Column\Date;
use JMS\Serializer\Annotation as Serializer;
/**
 * Veiculos
 *
 * @ORM\Table(name="webmotors")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class WebMotors
{
    use TEntity;

    /**
     * @var string
     *
     * @ORM\Column(name="Handle", type="string", length=24, nullable=true)
     */
    private $handle;

    /**
     * @var string
     *
     * @ORM\Column(name="Marca", type="string", length=24, nullable=true)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="Modelo", type="string", length=24, nullable=true)
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="Versao", type="string", length=24, nullable=true)
     */
    private $versao;

    /**
     * @var float
     *
     * @ORM\Column(name="Preco", type="float", scale=2, nullable=true)
     */
    private $preco;

    /**
     * @var string
     *
     * @ORM\Column(name="cor", type="string", length=24, nullable=true)
     */
    private $cor;

    /**
     * @var int
     *
     * @ORM\Column(name="Ano", type="integer", length=24, nullable=true)
     */
    private $ano;

    /**
     * @var int
     *
     * @ORM\Column(name="Km", type="integer", length=24, nullable=true)
     */
    private $km;

    /**
     * @var string
     *
     * @ORM\Column(name="Combustivel", type="string", length=24, nullable=true)
     */
    private $combustivel;

    /**
     * @var int
     *
     * @ORM\Column(name="Portas", type="smallint", length=4, nullable=true)
     */
    private $portas;

    /**
     * @var string
     *
     * @ORM\Column(name="Cambio", type="string", length=24, nullable=true)
     */
    private $cambio;

    /**
     * @var int
     *
     * @ORM\Column(name="Final_placa",type="smallint", length=4, nullable=true)
     */
    private $finalPlaca;

    /**
     * @var string
     *
     * @ORM\Column(name="Carroceria", type="string", length=24, nullable=true)
     */
    private $carroceria;

    /**
     * @var Date
     *
     * @ORM\Column(name="Data_anuncio", type="date", length=24, nullable=true)
     */
    private $dataAnuncio;

    /**
     * @var float
     *
     * @ORM\Column(name="Fipe_med", type="float", scale=2, nullable=true)
     */
    private $fipeMed;

    /**
     * @var float
     *
     * @ORM\Column(name="WM_min", type="float", scale=2, nullable=true)
     */
    private $wmMin;

    /**
     * @var float
     *
     * @ORM\Column(name="WM_med",type="float", scale=2, nullable=true)
     */
    private $wmMed;

    /**
     * @var float
     *
     * @ORM\Column(name="WM_max", type="float",scale=2, nullable=true)
     */
    private $wmMax;

    /**
     * @var string
     *
     * @ORM\Column(name="Outros", type="string", length=24, nullable=true)
     */
    private $outros;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Reg_date", type="datetime", nullable=true)
     */
    private $regDate;

    /**
     * @return string
     */
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * @param string $handle
     * @return WebMotors
     */
    public function setHandle($handle)
    {
        $this->handle = $handle;
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
     * @return WebMotors
     */
    public function setMarca($marca)
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
     * @return WebMotors
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
        return $this;
    }

    /**
     * @return string
     */
    public function getVersao()
    {
        return $this->versao;
    }

    /**
     * @param string $versao
     * @return WebMotors
     */
    public function setVersao($versao)
    {
        $this->versao = $versao;
        return $this;
    }

    /**
     * @return float
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param float $preco
     * @return WebMotors
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
        return $this;
    }

    /**
     * @return string
     */
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * @param string $cor
     * @return WebMotors
     */
    public function setCor($cor)
    {
        $this->cor = $cor;
        return $this;
    }

    /**
     * @return int
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * @param int $ano
     * @return WebMotors
     */
    public function setAno($ano)
    {
        $this->ano = $ano;
        return $this;
    }

    /**
     * @return int
     */
    public function getKm()
    {
        return $this->km;
    }

    /**
     * @param int $km
     * @return WebMotors
     */
    public function setKm($km)
    {
        $this->km = $km;
        return $this;
    }

    /**
     * @return string
     */
    public function getCombustivel()
    {
        return $this->combustivel;
    }

    /**
     * @param string $combustivel
     * @return WebMotors
     */
    public function setCombustivel($combustivel)
    {
        $this->combustivel = $combustivel;
        return $this;
    }

    /**
     * @return int
     */
    public function getPortas()
    {
        return $this->portas;
    }

    /**
     * @param int $portas
     * @return WebMotors
     */
    public function setPortas($portas)
    {
        $this->portas = $portas;
        return $this;
    }

    /**
     * @return string
     */
    public function getCambio()
    {
        return $this->cambio;
    }

    /**
     * @param string $cambio
     * @return WebMotors
     */
    public function setCambio($cambio)
    {
        $this->cambio = $cambio;
        return $this;
    }

    /**
     * @return int
     */
    public function getFinalPlaca()
    {
        return $this->finalPlaca;
    }

    /**
     * @param int $finalPlaca
     * @return WebMotors
     */
    public function setFinalPlaca($finalPlaca)
    {
        $this->finalPlaca = $finalPlaca;
        return $this;
    }

    /**
     * @return string
     */
    public function getCarroceria()
    {
        return $this->carroceria;
    }

    /**
     * @param string $carroceria
     * @return WebMotors
     */
    public function setCarroceria($carroceria)
    {
        $this->carroceria = $carroceria;
        return $this;
    }

    /**
     * @return Date
     */
    public function getDataAnuncio()
    {
        return $this->dataAnuncio;
    }

    /**
     * @param Date $dataAnuncio
     * @return WebMotors
     */
    public function setDataAnuncio($dataAnuncio)
    {
        $this->dataAnuncio = $dataAnuncio;
        return $this;
    }

    /**
     * @return float
     */
    public function getFipeMed()
    {
        return $this->fipeMed;
    }

    /**
     * @param float $fipeMed
     * @return WebMotors
     */
    public function setFipeMed($fipeMed)
    {
        $this->fipeMed = $fipeMed;
        return $this;
    }

    /**
     * @return float
     */
    public function getWmMin()
    {
        return $this->wmMin;
    }

    /**
     * @param float $wmMin
     * @return WebMotors
     */
    public function setWmMin($wmMin)
    {
        $this->wmMin = $wmMin;
        return $this;
    }

    /**
     * @return float
     */
    public function getWmMed()
    {
        return $this->wmMed;
    }

    /**
     * @param float $wmMed
     * @return WebMotors
     */
    public function setWmMed($wmMed)
    {
        $this->wmMed = $wmMed;
        return $this;
    }

    /**
     * @return float
     */
    public function getWmMax()
    {
        return $this->wmMax;
    }

    /**
     * @param float $wmMax
     * @return WebMotors
     */
    public function setWmMax($wmMax)
    {
        $this->wmMax = $wmMax;
        return $this;
    }

    /**
     * @return string
     */
    public function getOutros()
    {
        return $this->outros;
    }

    /**
     * @param string $outros
     * @return WebMotors
     */
    public function setOutros($outros)
    {
        $this->outros = $outros;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getRegDate()
    {
        return $this->regDate;
    }

    /**
     * @param \DateTime $regDate
     * @return WebMotors
     */
    public function setRegDate($regDate)
    {
        $this->regDate = $regDate;
        return $this;
    }
}
