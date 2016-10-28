<?php

namespace Avaliacao\Entity;

use Avaliacao\Entity\Traits\TCliente;
use Common\Entity\Traits\TEntity;
use Common\Lib\StrFormat;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Zend\Hydrator\ClassMethods;

/**
 * Veiculo
 *
 * @ORM\Table(name="veiculos")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Veiculo
{
    use TEntity;

    /**
     * @var int
     *
     * @ORM\Column(name="id_bot", type="integer", nullable=true)
     */
    private $idBot;

    /**
     * @var string
     *
     * @ORM\Column(name="placa", type="string", length=24, nullable=true)
     */
    private $placa;

    /**
     * @var string
     *
     * @ORM\Column(name="renavam", type="string", length=24, nullable=true)
     */
    private $renavam;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=24, nullable=true)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=24, nullable=true)
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="ano", type="string", length=24, nullable=true)
     */
    private $ano;

    /**
     * @var string
     *
     * @ORM\Column(name="ano_modelo", type="string", length=10, nullable=true)
     */
    private $anoModelo;

    /**
     * @var string
     *
     * @ORM\Column(name="cor", type="string", length=24, nullable=true)
     */
    private $cor;

    /**
     * @var string
     *
     * @ORM\Column(name="proprietario_doc", type="string", length=24, nullable=true)
     */
    private $proprietarioDoc;

    /**
     * @var string
     *
     * @ORM\Column(name="marca_fipe", type="string", length=45, nullable=true)
     */
    private $marcaFipe;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo_fipe", type="string", length=45, nullable=true)
     */
    private $modeloFipe;

    /**
     * @var string
     *
     * @ORM\Column(name="ano_fipe", type="string", length=45, nullable=true)
     */
    private $anoFipe;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_fipe", type="string", length=45, nullable=true)
     */
    private $codigoFipe;

    /**
     * @var float
     *
     * @ORM\Column(name="valor_fipe", type="float", precision=10, scale=0, nullable=true)
     */
    private $valorFipe;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status;

    /**
     * @var WebMotors
     *
     * @ORM\ManyToOne(targetEntity="Avaliacao\Entity\WebMotors")
     * @ORM\JoinColumn(name="webmotors_id", referencedColumnName="id")
     */
    private $webmotors;

    /**
     * @ORM\OneToMany(targetEntity="Avaliacao\Entity\Debito",mappedBy="veiculo", cascade={"persist","remove"})
     *
     * @var ArrayCollection
     *
     */
    protected $debitos;

    /**
     * Veiculo constructor.
     */
    public function __construct()
    {
        $this->debitos = new ArrayCollection();
    }

//    /**
//     * @ORM\ManyToOne(targetEntity="Avaliacao\Entity\Cliente",cascade={"persist"})
//     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
//     */
//    private $cliente;
    use TCliente;


    /**
     * @return int
     */
    public function getIdBot()
    {
        return $this->idBot;
    }

    /**
     * @param int $idBot
     */
    public function setIdBot($idBot)
    {
        $this->idBot = $idBot;

        return $this;
    }


    /**
     * Set placa
     *
     * @param string $placa
     *
     * @return Veiculo
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;

        return $this;
    }

    /**
     * Get placa
     *
     * @return string
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * Set renavam
     *
     * @param string $renavam
     *
     * @return Veiculo
     */
    public function setRenavam($renavam)
    {
        $this->renavam = $renavam;

        return $this;
    }

    /**
     * Get renavam
     *
     * @return string
     */
    public function getRenavam()
    {
        return $this->renavam;
    }

    /**
     * Set marca
     *
     * @param string $marca
     *
     * @return Veiculo
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     *
     * @return Veiculo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set ano
     *
     * @param string $ano
     *
     * @return Veiculo
     */
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Get ano
     *
     * @return string
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * Set anoModelo
     *
     * @param string $anoModelo
     *
     * @return Veiculo
     */
    public function setAnoModelo($anoModelo)
    {
        $this->anoModelo = $anoModelo;

        return $this;
    }

    /**
     * Get anoModelo
     *
     * @return string
     */
    public function getAnoModelo()
    {
        return $this->anoModelo;
    }

    /**
     * Set cor
     *
     * @param string $cor
     *
     * @return Veiculo
     */
    public function setCor($cor)
    {
        $this->cor = $cor;

        return $this;
    }

    /**
     * Get cor
     *
     * @return string
     */
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * Set proprietarioDoc
     *
     * @param string $proprietarioDoc
     *
     * @return Veiculo
     */
    public function setProprietarioDoc($proprietarioDoc)
    {
        $this->proprietarioDoc = StrFormat::format($proprietarioDoc);

        return $this;
    }

    /**
     * Get proprietarioDoc
     *
     * @return string
     */
    public function getProprietarioDoc()
    {
        return $this->proprietarioDoc;
    }

    /**
     * Set marcaFipe
     *
     * @param string $marcaFipe
     *
     * @return Veiculo
     */
    public function setMarcaFipe($marcaFipe)
    {
        $this->marcaFipe = $marcaFipe;

        return $this;
    }

    /**
     * Get marcaFipe
     *
     * @return string
     */
    public function getMarcaFipe()
    {
        return $this->marcaFipe;
    }

    /**
     * Set modeloFipe
     *
     * @param string $modeloFipe
     *
     * @return Veiculo
     */
    public function setModeloFipe($modeloFipe)
    {
        $this->modeloFipe = $modeloFipe;

        return $this;
    }

    /**
     * Get modeloFipe
     *
     * @return string
     */
    public function getModeloFipe()
    {
        return $this->modeloFipe;
    }

    /**
     * Set anoFipe
     *
     * @param string $anoFipe
     *
     * @return Veiculo
     */
    public function setAnoFipe($anoFipe)
    {
        $this->anoFipe = $anoFipe;

        return $this;
    }

    /**
     * Get anoFipe
     *
     * @return string
     */
    public function getAnoFipe()
    {
        return $this->anoFipe;
    }

    /**
     * Set codigoFipe
     *
     * @param string $codigoFipe
     *
     * @return Veiculo
     */
    public function setCodigoFipe($codigoFipe)
    {
        $this->codigoFipe = $codigoFipe;

        return $this;
    }

    /**
     * Get codigoFipe
     *
     * @return string
     */
    public function getCodigoFipe()
    {
        return $this->codigoFipe;
    }

    /**
     * Set valorFipe
     *
     * @param float $valorFipe
     *
     * @return Veiculo
     */
    public function setValorFipe($valorFipe)
    {
        $this->valorFipe = $valorFipe;

        return $this;
    }

    /**
     * Get valorFipe
     *
     * @return float
     */
    public function getValorFipe()
    {
        return $this->valorFipe;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Veiculo
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
    public function getWebmotors()
    {
        return $this->webmotors;
    }


    /**
     * @param $webmotors
     * @return Veiculo
     */
    public function setWebmotors($webmotors)
    {
        $this->webmotors = $webmotors;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getDebitos()
    {
        return $this->debitos;
    }

    /**
     * @param ArrayCollection $debitos
     */
    public function setDebitos($debitos)
    {
        $this->debitos = $debitos;

        return $this;
    }

    public function addDebito(Debito $debito)
    {
        $debito->setVeiculo($this);
        $this->debitos[] = $debito;
    }

    /**
     * @param array $data
     * @return Veiculo
     */
    public function exchangeApi(array $data)
    {
        $data = $data['data']['ConsultaDebitosResult']['Conteudo'];

        if (!empty($data['Veiculo']['Placa'])) {
            $this->setPlaca((string)$data['Veiculo']['Placa']);
        }

        if (!empty($data['Veiculo']['Renavam'])) {
            $this->setRenavam((string)$data['Veiculo']['Renavam']);
        }

        if (!empty($data['Veiculo']['Marca'])) {
            $this->setMarca((string)$data['Veiculo']['Marca']);
        }

        if (!empty($data['ModeloVeiculo'])) {
            $this->setModelo((string)$data['ModeloVeiculo']);
        }

        if (!empty($data['Veiculo']['AnoFabricacao'])) {
            $this->setAno((string)$data['Veiculo']['AnoFabricacao']);
        }

        if (!empty($data['AnoModeloVeiculo'])) {
            $this->setAnoModelo((string)$data['AnoModeloVeiculo']);
        }
        if (!empty($data['CorVeiculo'])) {
            $this->setCor((string)$data['CorVeiculo']);
        }
        if (!empty($data['Veiculo']['ProprietarioAtual']['CpfCnpj'])) {
            $this->setProprietarioDoc((string)$data['Veiculo']['ProprietarioAtual']['CpfCnpj']);
        }

        return $this;

    }

    public function hydrate($data)
    {
        $hydrator = new ClassMethods();
        $hydrator->hydrate($data, $this);

        $this->__construct();

        if (!empty($data['debitos'])) {

            $debitosArray = $data['debitos'];
            $debitosSize = count($debitosArray);

            if (count($debitosSize) > 0) {
                for ($i = 0; $i < $debitosSize; $i++) {
                    $debito = new Debito();
                    $debito->hydrate($debitosArray[$i]);
                    $this->addDebito($debito);
                }
            }
        }
        return $this;
    }
}
