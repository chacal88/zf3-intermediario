<?php

namespace Avaliacao\Service;

use Avaliacao\Entity\Veiculo;
use Avaliacao\Lib\Enum\ApiDetranEnum;

class ApiDetranService
{

    /**
     * @var string
     */
    private $token;

    /**
     * ApiDetran constructor.
     */
    public function __construct()
    {
        if (empty($this->token)) {
            $this->token = $this->getTokenApiFila();
        }
    }

    /**
     * Metodo que busca Token para uso da api.
     * @return mixed
     */
    public function getTokenApiFila()
    {

        $data = ['email' => ApiDetranEnum::API_EMAIL, 'password' => ApiDetranEnum::API_PASSWORD];
        $data_string = json_encode($data);

        $ch = curl_init(ApiDetranEnum::API_FILA_URL . '/' . ApiDetranEnum::API_FILA_URL_TOKEN);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );

        $output = curl_exec($ch);
        curl_close($ch);

        $output = json_decode($output, true);

        return $output['token'];

    }

    /**
     * Lista Todos Usuarios da API DENTRAN
     * @param $token
     * @return mixed
     */
    public function getAllUsers()
    {

        $ch = curl_init(ApiDetranEnum::API_FILA_URL . '/' . ApiDetranEnum::API_FILA_URL_USER);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Content-Type: application/json",
                "Authorization: JWT $this->token")
        );

        $output = curl_exec($ch);
        curl_close($ch);
        $output = json_decode($output, true);

        return $output;

    }

    /**
     * Faz Insert de Veiculo na Fila da Api Dentran
     * {
     * "placa": "MIB3036",
     * "renavam": "219723745",
     * "id_client": 83,
     * "uri_callback": "http://api.superfrota.dev.br/api/v1/public/veiculo/bot/83"
     * }
     * @param Veiculo $veiculo
     */
    public function insertVeiculo(Veiculo $veiculo)
    {

        $data = [
            'placa' => $veiculo->getPlaca(),
            'renavam' => $veiculo->getRenavam(),
            'id_client' => (string) $veiculo->getId(),
            'uri_callback' => ApiDetranEnum::API_FILA_VEICULO_URL_CALBACK . '/' . $veiculo->getId()
        ];
        $ch = curl_init(ApiDetranEnum::API_FILA_URL . '/' . ApiDetranEnum::API_FILA_URL_VEICULO);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Content-Type: application/json",
                "Authorization: JWT $this->token")
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $output = curl_exec($ch);
        curl_close($ch);
        $output = json_decode($output, true);
        return $output;

    }

    /**
     * Faz Delete de Veiculo na Fila da Api Dentran
     * {
     * }
     * @param Veiculo $veiculo
     */
    public function deleteVeiculo(Veiculo $veiculo)
    {

        $ch = curl_init(ApiDetranEnum::API_FILA_URL . '/' . ApiDetranEnum::API_FILA_URL_VEICULO . '/' . $veiculo->getIdBot());
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Content-Type: application/json",
                "Authorization: JWT $this->token")
        );

        $output = curl_exec($ch);
        curl_close($ch);
        $output = json_decode($output, true);

        return $output;

    }

}