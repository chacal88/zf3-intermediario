<?php


namespace Avaliacao\Model;

/**
 * Class Veiculo
 * @package Avaliacao\Model
 */
class Veiculo
{
    /**
     * @var
     */
    public $id;
    /**
     * @var
     */
    public $placa;
    /**
     * @var
     */
    public $renavam;
    /**
     * @var
     */
    public $marca;
    /**
     * @var
     */
    public $modelo;
    /**
     * @var
     */
    public $ano;
    /**
     * @var
     */
    public $cor;
    /**
     * @var
     */
    public $docProprietario;


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
        $this->cor = (!empty($data['cor'])) ? $data['cor'] : null;
        $this->docProprietario = (!empty($data['docProprietario'])) ? $data['docProprietario'] : null;
    }

    /**
     * @return array
     */
    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'placa' => $this->placa,
            'renavam' => $this->renvam,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'ano' => $this->ano,
            'cor' => $this->cor,
            'docProprietario' => $this->docProprietario
        ];
    }
}