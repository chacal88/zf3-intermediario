<?php
/**
 * Created by PhpStorm.
 * User: kaue
 * Date: 16/09/2016
 * Time: 00:30
 */

namespace Avaliacao\Model;


interface IModel
{
    public function exchangeArray(array $data);

    public function getArrayCopy();
}