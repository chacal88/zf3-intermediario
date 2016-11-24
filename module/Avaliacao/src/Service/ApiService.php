<?php

namespace Avaliacao\Service;

use Avaliacao\Entity\Veiculo;
use Avaliacao\Lib\Enum\DataWashEnum;

class ApiService
{

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function findCar(Veiculo $veiculo)
    {
        $ch     = curl_init($this->url . $veiculo->getPlaca());

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);

        curl_close($ch);

        $result = json_decode($output, true);
        if ($result != null) {

            if (!$result['data']['ConsultaDebitosResult']['PossuiErro']) {
                $veiculo->exchangeApi($result);
            }
        }

        return $veiculo;
    }

}