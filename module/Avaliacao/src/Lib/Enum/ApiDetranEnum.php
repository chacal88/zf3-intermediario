<?php
namespace Avaliacao\Lib\Enum;
use Common\Enum\AbstractEnum;
use Common\Enum\TEnum;

/**
 * Class RoutesEnum
 * @package Avaliacao\Lib\Enum
 */
abstract class ApiDetranEnum
{
    use TEnum;

    const API_FILA_URL = "http://192.241.142.82:3000";

    const API_EMAIL = "kauemsc@gmail.com";

    const API_PASSWORD = "102030ka";

    const API_FILA_URL_TOKEN = "token";

    const API_FILA_URL_USER = "user";

    const API_FILA_URL_VEICULO = "veiculos";

    const API_FILA_URL_CONDUTOR = "condutores";

    const API_FILA_VEICULO_URL_CALBACK = "http://app.velotron.com.br/bot";

    const API_FILA_CONDUTOR_URL_CALBACK = "http://app.velotron.com.br/bot";

}