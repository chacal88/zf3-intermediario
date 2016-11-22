<?php

namespace DataWashModule\Service\Factory;

use DataWash\Lib\Enum\DataWashEnum;
use DataWash\Service\DataWashService;
use Interop\Container\ContainerInterface;
use DataWashModule\Service\DataWashServiceConsult as DataWashServiceConsult;

class DataWashServiceConsultFactory
{

    public function __invoke(ContainerInterface $container)
    {

        $dataWashService = new DataWashService(new \SoapClient(DataWashEnum::DATAWASH), 'neoshare', '*', 'neoshare2015');

        return new DataWashServiceConsult($dataWashService);
    }

}