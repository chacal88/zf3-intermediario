<?php


namespace Avaliacao\Entity;


use Common\Entity\Traits\TEntity;
use Common\Lib\DateTimeStrategy;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Zend\Hydrator\ClassMethods;

/**
 * @ORM\Table(
 *         name="debitos"
 *         )
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Debito
{

    use TEntity;


    /**
     * @ORM\Column(name="classe", type="string", length=22, nullable=true)
     * @Serializer\Type("string")
     * @var string
     */
    protected $classe;

    /**
     * @ORM\Column(name="juros", type="float", length=20, nullable=true)
     * @Serializer\Type("float")
     * @var float
     */
    protected $juros;

    /**
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     * @Serializer\Type("string")
     * @var string
     */
    protected $link;

    /**
     * @ORM\Column(name="multa", type="float", length=20, nullable=true)
     * @Serializer\Type("float")
     * @var float
     */
    protected $multa;

    /**
     * @ORM\Column(name="numero_detrannet", type="string", length=22, nullable=true)
     * @Serializer\Type("string")
     * @var string
     */
    protected $numeroDetrannet;

    /**
     * @ORM\Column(name="valor_atual", type="float", length=20, nullable=true)
     * @Serializer\Type("float")
     * @var float
     */
    protected $valorAtual;

    /**
     * @ORM\Column(name="valor_nominal", type="float", length=20, nullable=true)
     * @Serializer\Type("float")
     * @var float
     */
    protected $valorNominal;

    /**
     * @ORM\Column(name="vencimento", type="date", nullable=true)
     * @Serializer\Type("DateTime<'Y-m-d'>")
     * @var DateTime
     */
    protected $vencimento;

    /**
     * @ORM\ManyToOne(targetEntity="Avaliacao\Entity\Veiculo", inversedBy="debitos", cascade={"persist"})
     * @ORM\JoinColumn(name="veiculo_id", referencedColumnName="id")
     * @var Veiculo
     */
    protected $veiculo;

    /**
     * @return string
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * @param string $classe
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;
    }

    /**
     * @return float
     */
    public function getJuros()
    {
        return $this->juros;
    }

    /**
     * @param float $juros
     */
    public function setJuros($juros)
    {
        $this->juros = $juros;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink( $link)
    {
        $this->link = $link;
    }

    /**
     * @return float
     */
    public function getMulta()
    {
        return $this->multa;
    }

    /**
     * @param float $multa
     */
    public function setMulta( $multa)
    {
        $this->multa = $multa;
    }

    /**
     * @return string
     */
    public function getNumeroDetrannet()
    {
        return $this->numeroDetrannet;
    }

    /**
     * @param string $numeroDetrannet
     */
    public function setNumeroDetrannet( $numeroDetrannet)
    {
        $this->numeroDetrannet = $numeroDetrannet;
    }

    /**
     * @return float
     */
    public function getValorAtual()
    {
        return $this->valorAtual;
    }

    /**
     * @param float $valorAtual
     */
    public function setValorAtual( $valorAtual)
    {
        $this->valorAtual = $valorAtual;
    }

    /**
     * @return float
     */
    public function getValorNominal()
    {
        return $this->valorNominal;
    }

    /**
     * @param float $valorNominal
     */
    public function setValorNominal($valorNominal)
    {
        $this->valorNominal = $valorNominal;
    }

    /**
     * @return DateTime
     */
    public function getVencimento()
    {
        return $this->vencimento;
    }

    /**
     * @param DateTime $vencimento
     */
    public function setVencimento($vencimento)
    {
        $this->vencimento = $vencimento;
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
     */
    public function setVeiculo(Veiculo $veiculo)
    {
        $this->veiculo = $veiculo;
    }

    public function hydrate($data)
    {
        $hydrator = new ClassMethods();
        $hydrator->addStrategy('vencimento', new DateTimeStrategy());
        $hydrator->hydrate($data, $this);
        return $this;
    }

}