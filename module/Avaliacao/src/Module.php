<?php

namespace Avaliacao;

use Avaliacao\Controller\Factory\VeiculoControllerFactory;
use Avaliacao\Controller\VeiculoController;
use Avaliacao\Form\Factory\PostFormFactory;
use Avaliacao\Form\PostForm;
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
                Model\VeiculoTable::class => VeiculoTableFactory::class,
                Model\VeiculoTableGateway::class => VeiculoTableGatewayFactory::class,
                PostForm::class => PostFormFactory::class
            ]
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                VeiculoController::class => VeiculoControllerFactory::class,
            ]
        ];
    }

}