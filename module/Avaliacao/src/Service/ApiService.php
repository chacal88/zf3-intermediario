<?php

namespace Avaliacao\Service;

use Avaliacao\Lib\Enum\DataWashEnum;
use Avaliacao\Entity\Cliente;
use Avaliacao\Entity\Veiculo;
use Zend\Http\Client;
use Zend\Http\Request;

/**
 * Created by PhpStorm.
 * User: kaue
 * Date: 15/08/2016
 * Time: 01:00
 */
class ApiService
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var Client
     */
    private $client;

    /**
     * ApiService constructor.
     * @param $url
     * @param $request
     * @param $client
     */
    public function __construct($url, $request, $client)
    {
        $this->url = $url;
        $this->request = $request;
        $this->client = $client;
    }

    /**
     * @param Veiculo $veiculo
     * @return Veiculo
     */
    public function findCar(Veiculo $veiculo)
    {
        $this->request->setUri($this->url . $veiculo->getPlaca());
        $this->request->setMethod(Request::METHOD_GET);

        $this->client->setOptions(array('timeout' => 300));
        $response = $this->client->send($this->request);

        if ($response->isSuccess()) {

            $result = json_decode($response->getContent(), true);
            if($result != null){

                if(!$result['data']['ConsultaDebitosResult']['PossuiErro']){
                    $veiculo->exchangeApi($result);
                }
            }
        }

        return $veiculo;
    }

    public function findByDoc($doc)
    {
        $numeros = preg_replace('/[^0-9]/', '', $doc);

        if (strlen($numeros) <= 11) {
            $cliente = $this->findCpf($doc);
        } elseif (strlen($numeros) > 11) {
            $cliente = $this->findCnpj($doc);
        }

        return $cliente;
    }

    public function findCpf($doc)
    {

        $soap = "http://webservice.datawash.com.br/localizacao.asmx/ConsultaCPFCompleta?Cliente=neoshare&Usuario=*&Senha=neoshare2015&CPF=" . $doc;

        $this->request->setUri($soap);
        $this->request->setMethod(Request::METHOD_GET);

        $this->client->setOptions(array('timeout' => 300));
        $response = $this->client->send($this->request);

        if ($response->isSuccess()) {
            $result = simplexml_load_string($response->getBody());
            $cliente = new Cliente();
            $cliente->exchangeApiCpf($result);
            return $cliente;
        }
    }

    public function findCnpj($doc)
    {

        $soap = "http://webservice.datawash.com.br/localizacao.asmx/ConsultaCNPJ?Cliente=neoshare&Usuario=*&Senha=neoshare2015&CNPJ=" . $doc;

        $this->request->setUri($soap);
        $this->request->setMethod(Request::METHOD_GET);

        $this->client->setOptions(array('timeout' => 300));
        $response = $this->client->send($this->request);

        if ($response->isSuccess()) {
            $result = simplexml_load_string($response->getBody());
            $cliente = new Cliente();
            $cliente->exchangeApiCnpj($result);

            return $cliente;
        }
    }


}