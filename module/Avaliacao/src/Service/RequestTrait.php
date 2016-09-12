<?php

namespace Avaliacao\Service;

use Zend\Http\Client;
use Zend\Http\Request;

/**
 * Created by PhpStorm.
 * User: kaue
 * Date: 31/08/2016
 * Time: 00:47
 */
trait RequestTrait
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
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }
    

}