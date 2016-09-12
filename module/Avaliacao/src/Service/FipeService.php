<?php

namespace Avaliacao\Service;

/**
 * Created by PhpStorm.
 * User: kaue
 * Date: 15/08/2016
 * Time: 01:00
 */
class FipeService
{

    private $tipo;

    private $url;

    /**
     * FipeService constructor.
     */
    public function __construct($tipo, $url)
    {
        $this->tipo = $tipo;
        $this->url = $url;
    }

    public function getMarcas()
    {
        $uri = $this->url . $this->tipo . '/marcas';

        return $this->request($uri);

    }

    public function getModelos($codMarca)
    {
        $uri = $this->url . $this->tipo . '/marcas/' . $codMarca . '/modelos';
        $modelos = $this->request($uri);
        return $modelos['modelos'];

    }

    public function getAnos($codMarca, $codModelo)
    {
        $uri = $this->url . $this->tipo . '/marcas/' . $codMarca . '/modelos/' . $codModelo . '/anos';
        return $this->request($uri);

    }

    public function getVeiculo($codMarca, $codModelo, $codAno)
    {
        $uri = $this->url . $this->tipo . '/marcas/' . $codMarca . '/modelos/' . $codModelo . '/anos/' . $codAno;
        return $this->request($uri);

    }

    /**
     * @param string $uri
     * @return mixed|false
     */
    protected function request($uri)
    {
        $curlOptions = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_TIMEOUT => 5,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_SSL_VERIFYPEER => 0
        ];
        $ch = curl_init($uri);
        curl_setopt_array($ch, $curlOptions);
        $html = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return ($httpCode >= 200 && $httpCode < 300) ? json_decode($html, true) : false;
    }


}