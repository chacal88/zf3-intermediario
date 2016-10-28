<?php
namespace Avaliacao\Lib\Enum;
use Common\Entity\Traits\TEntity;
use Common\Enum\TEnum;

/**
 * Class RoutesEnum
 * @package Avaliacao\Lib\Enum
 */
abstract class RoutesEnum
{
    use TEnum;

    /**
     *
     */
    const WEBMOTORS = "private-avaliacao/webmotors";

    const VEICULO= "private-avaliacao/veiculo";

    const AUTH_LOGIN = "login";

    const AUTH_LOGOUT = "logout";
}