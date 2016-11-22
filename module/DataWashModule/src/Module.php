<?php


namespace DataWashModule;

use DataWashModule\Service\DataWashServiceConsult;
use DataWashModule\Service\Factory\DataWashServiceConsultFactory;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ServiceProviderInterface
{

    public function getServiceConfig()
    {
        return [
            'factories' => [
                DataWashServiceConsult::class => DataWashServiceConsultFactory::class
            ]
        ];
    }

}