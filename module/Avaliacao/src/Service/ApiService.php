<?php

namespace Avaliacao\Service;

use Avaliacao\Lib\Enum\DataWashEnum;
use Avaliacao\Model\Veiculo;
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
            $veiculo->exchangeApi($result);
        }

        return $veiculo;
    }

    public function findPeople($cpf)
    {
        $soap = "http://webservice.datawash.com.br/localizacao.asmx/ConsultaCPFCompleta?Cliente=neoshare&Usuario=*&Senha=neoshare2015&CPF=$cpf";

        $this->request->setUri($soap);
        $this->request->setMethod(Request::METHOD_GET);

        $this->client->setOptions(array('timeout' => 300));
        $response = $this->client->send($this->request);

        if ($response->isSuccess()) {

            $result  = simplexml_load_string($response->getBody());
        }

        return $result;

    }


}