<?php

namespace Avaliacao;

use Avaliacao\Controller\ApiVeiculoController;
use Avaliacao\Controller\Factory\ApiVeiculoControllerFactory;
use Avaliacao\Controller\Factory\VeiculoControllerFactory;
use Avaliacao\Controller\VeiculoController;
use Avaliacao\Form\Factory\VeiculoFormFactory;
use Avaliacao\Form\VeiculoForm;
use Avaliacao\Model\Factory\VeiculoTableFactory;
use Avaliacao\Model\Factory\VeiculoTableGatewayFactory;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ConfigProviderInterface, ServiceProviderInterface, ControllerProviderInterface
{

    public function getConfig()
    {
        return include __DIR__ . "/../config/module.config.php";
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\VeiculoTable::class                   => VeiculoTableFactory::class,
                Model\VeiculoTableGateway::class            => VeiculoTableGatewayFactory::class,
                VeiculoForm::class                          => VeiculoFormFactory::class,
                Service\ApiService::class                   => Service\Factory\ApiServiceFactory::class,
                Service\ICarrosFipeService::class           => Service\Factory\FipeServiceFactory::class,
                Service\IMotosFipeService::class            => Service\Factory\FipeServiceFactory::class,
                Service\ICaminhoesFipeService::class        => Service\Factory\FipeServiceFactory::class
            ]
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                VeiculoController::class        => VeiculoControllerFactory::class,
                ApiVeiculoController::class     => ApiVeiculoControllerFactory::class
            ]
        ];
    }

}