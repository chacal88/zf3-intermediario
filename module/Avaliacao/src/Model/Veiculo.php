<?php


namespace Avaliacao\Model;

use Avaliacao\Model\Proprietario;
use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\String_;

/**
 * Class Veiculo
 * @package Avaliacao\Model
 */
class Veiculo implements IModel
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $placa;

    /**
     * @var int
     */
    private $renavam;

    /**
     * @var string
     */
    private $marca;

    /**
     * @var string
     */
    private $modelo;

    /**
     * @var int
     */
    private $ano;

    /**
     * @var int
     */
    private $ano_modelo;

    /**
     * @var string
     */
    private $cor;

    /**
     * @var int
     */
    private $proprietario_doc;

    /**
     * @var int
     */
    private $proprietario_id;

    /**
     * @var Proprietario
     */
    private $proprietario;


    /**
     * @param array $data
     */
    public function exchangeArray(array $data)
    {
        $this->id               = (!empty($data['id']))                 ? $data['id'] : null;
        $this->placa            = (!empty($data['placa']))              ? $data['placa'] : null;
        $this->renavam          = (!empty($data['renavam']))            ? $data['renavam'] : null;
        $this->marca            = (!empty($data['marca']))              ? $data['marca'] : null;
        $this->modelo           = (!empty($data['modelo']))             ? $data['modelo'] : null;
        $this->ano              = (!empty($data['ano']))                ? $data['ano'] : null;
        $this->ano_modelo       = (!empty($data['ano_modelo']))         ? $data['ano_modelo'] : null;
        $this->cor              = (!empty($data['cor']))                ? $data['cor'] : null;
        $this->proprietario_id  = (!empty($data['proprietario_id']))    ? $data['proprietario_id'] : null;
        $this->proprietario_doc = (!empty($data['proprietario_doc']))   ? $data['proprietario_doc'] : null;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function exchangeApi(array $data)
    {
        $data                   = $data['data']['ConsultaDebitosResult']['Conteudo'];
        $this->placa            = (!empty($data['Veiculo']['Placa']))           ? $data['Veiculo']['Placa'] : null;
        $this->renavam          = (!empty($data['Veiculo']['Renavam']))         ? $data['Veiculo']['Renavam'] : null;
        $this->marca            = (!empty($data['Veiculo']['Marca']))           ? $data['Veiculo']['Marca'] : null;
        $this->modelo           = (!empty($data['ModeloVeiculo']))              ? $data['ModeloVeiculo'] : null;
        $this->ano              = (!empty($data['Veiculo']['AnoFabricacao']))   ? $data['Veiculo']['AnoFabricacao'] : null;
        $this->anoModelo        = (!empty($data['AnoModeloVeiculo']))           ? $data['AnoModeloVeiculo'] : null;
        $this->cor              = (!empty($data['CorVeiculo']))                 ? $data['CorVeiculo'] : null;
        $this->docProprietario  = (!empty($data['Veiculo']['ProprietarioAtual']['CpfCnpj'])) ? $data['Veiculo']['ProprietarioAtual']['CpfCnpj'] : null;

    }

    /**
     * @return array
     */
    public function getArrayCopy()
    {
        return [
            'id'                => $this->id,
            'placa'             => $this->placa,
            'renavam'           => $this->renavam,
            'marca'             => $this->marca,
            'modelo'            => $this->modelo,
            'ano'               => $this->ano,
            'ano_modelo'        => $this->anoModelo,
            'cor'               => $this->cor,
            'proprietario_doc'  => $this->proprietario_doc,
            'proprietario_id'   => $this->proprietario_id
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
     * @return String_
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * @param String_ $placa
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }

    /**
     * @return int
     */
    public function getRenavam()
    {
        return $this->renavam;
    }

    /**
     * @param int $renavam
     */
    public function setRenavam($renavam)
    {
        $this->renavam = $renavam;
    }

    /**
     * @return String_
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param String_ $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * @return String_
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param String_ $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
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
     */
    public function setAno($ano)
    {
        $this->ano = $ano;
    }

    /**
     * @return int
     */
    public function getAnoModelo()
    {
        return $this->anoModelo;
    }

    /**
     * @param int $anoModelo
     */
    public function setAnoModelo($anoModelo)
    {
        $this->anoModelo = $anoModelo;
    }

    /**
     * @return String_
     */
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * @param String_ $cor
     */
    public function setCor($cor)
    {
        $this->cor = $cor;
    }

    /**
     * @return int
     */
    public function getDocProprietario()
    {
        return $this->docProprietario;
    }

    /**
     * @param int $docProprietario
     */
    public function setDocProprietario($docProprietario)
    {
        $this->docProprietario = $docProprietario;
    }
}