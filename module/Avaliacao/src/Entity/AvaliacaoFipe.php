<?php


namespace Avaliacao\Entity;


use Common\Entity\Traits\TEntity;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use User\Entity\User;

/**
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
     * @ORM\Column(name="quilometragem", type="float", nullable=true)
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
     * @var text
     */
    private $obs;

    /**
     * @ORM\Column(name="valor", type="float", nullable=true)
     * @Serializer\Type("float")
     * @var float
     */
    private $valor;

    /**
     * @ORM\ManyToOne(targetEntity="Avaliacao\Entity\Veiculo",cascade={"persist"})
     * @ORM\JoinColumn(name="veiculo_id", referencedColumnName="id",nullable=true)
     */
    private $veiculo;

    /**
     * @ORM\ManyToOne(targetEntity="User\Entity\User",cascade={"persist"})
     * @ORM\JoinColumn(name="avaliador_id", referencedColumnName="id",nullable=true)
     */
    private $avaliador;

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
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param string $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
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
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
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
     */
    public function setAno($ano)
    {
        $this->ano = $ano;
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
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
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
     */
    public function setQuilometragem($quilometragem)
    {
        $this->quilometragem = $quilometragem;
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
     */
    public function setPneu($pneu)
    {
        $this->pneu = $pneu;
    }

    /**
     * @return text
     */
    public function getObs()
    {
        return $this->obs;
    }

    /**
     * @param text $obs
     */
    public function setObs($obs)
    {
        $this->obs = $obs;
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
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getVeiculo()
    {
        return $this->veiculo;
    }

    /**
     * @param mixed $veiculo
     */
    public function setVeiculo($veiculo)
    {
        $this->veiculo = $veiculo;
    }

    /**
     * @return User
     */
    public function getAvaliador()
    {
        return $this->avaliador;
    }

    /**
     * @param mixed $avaliador
     */
    public function setAvaliador($avaliador)
    {
        $this->avaliador = $avaliador;
    }

}