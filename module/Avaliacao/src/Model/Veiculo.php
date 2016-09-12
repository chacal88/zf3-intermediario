<?php


namespace Avaliacao\Model;

use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\String_;

/**
 * Class Veiculo
 * @package Avaliacao\Model
 */
class Veiculo
{
    /**
     * @var Integer
     */
    private $id;

    /**
     * @var String_
     */
    private $placa;

    /**
     * @var Integer
     */
    private $renavam;

    /**
     * @var String_
     */
    private $marca;

    /**
     * @var String_
     */
    private $modelo;

    /**
     * @var Integer
     */
    private $ano;

    /**
     * @var Integer
     */
    private $anoModelo;
    /**
     * @var String_
     */
    private $cor;

    /**
     * @var Integer
     */
    private $docProprietario;


    /**
     * @param array $data
     */
    public function exchangeArray(array $data)
    {
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->placa = (!empty($data['placa'])) ? $data['placa'] : null;
        $this->renavam = (!empty($data['renavam'])) ? $data['renavam'] : null;
        $this->marca = (!empty($data['marca'])) ? $data['marca'] : null;
        $this->modelo = (!empty($data['modelo'])) ? $data['modelo'] : null;
        $this->ano = (!empty($data['ano'])) ? $data['ano'] : null;
        $this->anoModelo = (!empty($data['ano_modelo'])) ? $data['ano_modelo'] : null;
        $this->cor = (!empty($data['cor'])) ? $data['cor'] : null;
        $this->docProprietario = (!empty($data['doc_proprietario'])) ? $data['doc_proprietario'] : null;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function exchangeApi(array $data)
    {
        $data = $data['data']['ConsultaDebitosResult']['Conteudo'];
        $this->placa = (!empty($data['Veiculo']['Placa'])) ? $data['Veiculo']['Placa'] : null;
        $this->renavam = (!empty($data['Veiculo']['Renavam'])) ? $data['Veiculo']['Renavam'] : null;
        $this->marca = (!empty($data['Veiculo']['Marca'])) ? $data['Veiculo']['Marca'] : null;
        $this->modelo = (!empty($data['ModeloVeiculo'])) ? $data['ModeloVeiculo'] : null;
        $this->ano = (!empty($data['Veiculo']['AnoFabricacao'])) ? $data['Veiculo']['AnoFabricacao'] : null;
        $this->anoModelo = (!empty($data['AnoModeloVeiculo'])) ? $data['AnoModeloVeiculo'] : null;
        $this->cor = (!empty($data['CorVeiculo'])) ? $data['CorVeiculo'] : null;
        $this->docProprietario = (!empty($data['Veiculo']['ProprietarioAtual']['CpfCnpj'])) ? $data['Veiculo']['ProprietarioAtual']['CpfCnpj'] : null;

    }

    /**
     * @return array
     */
    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'placa' => $this->placa,
            'renavam' => $this->renavam,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'ano' => $this->ano,
            // 'ano_modelo' => $this->anoModelo,
            'cor' => $this->cor,
            'doc_proprietario' => $this->docProprietario
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