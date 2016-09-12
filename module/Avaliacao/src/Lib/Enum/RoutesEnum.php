<?php
namespace Avaliacao\Lib\Enum;

/**
 * Class RoutesEnum
 * @package Avaliacao\Lib\Enum
 */
abstract class RoutesEnum extends AbstractEnum
{

    /**
     *
     */
    const AVALIACAO_VEICULO = "private-avaliacao/veiculo";

    const AVALIACAO_USER = "site-post";

    const AUTH_LOGIN = "login";

    const AUTH_LOGOUT = "logout";
}