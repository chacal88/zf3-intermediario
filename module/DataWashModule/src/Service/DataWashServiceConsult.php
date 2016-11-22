<?php


namespace DataWashModule\Service;


use Avaliacao\Entity\Cliente;
use DataWash\Service\DataWashService;

class DataWashServiceConsult
{
    /**
     * @var DataWashService
     */
    private $dataWashService;


    public function __construct(DataWashService $dataWashService)
    {
        $this->dataWashService = $dataWashService;
    }

    public function findByDoc($doc)
    {
        $numeros = preg_replace('/[^0-9]/', '', $doc);

        if (strlen($numeros) <= 11) {
            return $this->findCpf($doc);
        } elseif (strlen($numeros) > 11) {
            return $this->findCnpj($doc);
        }
    }

    public function findCpf($doc)
    {
        $result = $this->dataWashService->ConsultaCPFCompleta($doc);
        $cliente = new Cliente();
        $cliente->exchangeApiCpf($result);
        return $cliente;
    }

    public function findCnpj($doc)
    {


        $result = $this->dataWashService->ConsultaCNPJ($doc);
        $cliente = new Cliente();
        $cliente->exchangeApiCnpj($result);

        return $cliente;

    }
}