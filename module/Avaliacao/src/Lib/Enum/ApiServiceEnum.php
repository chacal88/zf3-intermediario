<?php
namespace Avaliacao\Lib\Enum;
use Common\Enum\AbstractEnum;
use Common\Enum\TEnum;

/**
 * Class RoutesEnum
 * @package Avaliacao\Lib\Enum
 */
abstract class ApiServiceEnum
{
    use TEnum;

    /**
     *
     */
    const API_URL = "http://apiservice.superfrota.com.br/api/consulta/debitos/";
}