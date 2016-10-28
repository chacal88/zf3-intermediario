<?php

namespace Avaliacao;

use Avaliacao\Controller\ApiVeiculoController;
use Avaliacao\Controller\WebMotorsController;
use Avaliacao\Controller\Factory\ApiVeiculoControllerFactory;
use Avaliacao\Controller\Factory\AvaliacaoControllerFactory;
use Avaliacao\Controller\Factory\VeiculoControllerFactory;
use Avaliacao\Controller\VeiculoController;
use Avaliacao\Fieldset\ClienteFieldset;
use Avaliacao\Form\ClienteForm;
use Avaliacao\Form\Factory\ClienteFormFactory;
use Avaliacao\Form\Factory\FipeFormFactory;
use Avaliacao\Form\Factory\VeiculoFormFactory;
use Avaliacao\Form\Factory\WebMotorsFormFactory;
use Avaliacao\Form\FipeForm;
use Avaliacao\Form\VeiculoForm;
use Avaliacao\Form\WebMotorsForm;
use Avaliacao\Model\Factory\ClienteTableFactory;
use Avaliacao\Model\Factory\ClienteTableGatewayFactory;
use Avaliacao\Model\Factory\EnderecoTableFactory;
use Avaliacao\Model\Factory\EnderecoTableGatewayFactory;
use Avaliacao\Model\Factory\TelefoneTableFactory;
use Avaliacao\Model\Factory\TelefoneTableGatewayFactory;
use Avaliacao\Model\Factory\VeiculoTableFactory;
use Avaliacao\Model\Factory\VeiculoTableGatewayFactory;
use Avaliacao\Model\Factory\WMTableFactory;
use Avaliacao\Model\Factory\WMTableGatewayFactory;
use Avaliacao\Repository\Factory\VeiculoRepositoryFactory;
use Avaliacao\Repository\Factory\WebMotorsRepositoryFactory;
use Avaliacao\Repository\VeiculoRepository;
use Avaliacao\Repository\WebMotorsRepository;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ServiceManager\Factory\InvokableFactory;

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
//                Model\VeiculoTable::class                   => VeiculoTableFactory::class,
//                Model\VeiculoTableGateway::class            => VeiculoTableGatewayFactory::class,
//                Model\ClienteTable::class                   => ClienteTableFactory::class,
//                Model\ClienteTableGateway::class            => ClienteTableGatewayFactory::class,
//                Model\EnderecoTable::class                  => EnderecoTableFactory::class,
//                Model\EnderecoTableGateway::class           => EnderecoTableGatewayFactory::class,
//                Model\TelefoneTable::class                  => TelefoneTableFactory::class,
//                Model\TelefoneTableGateway::class           => TelefoneTableGatewayFactory::class,
//                Model\WMTable::class                        => WMTableFactory::class,
//                Model\WMTableGateway::class                 => WMTableGatewayFactory::class,

                VeiculoForm::class                          => VeiculoFormFactory::class,
                ClienteForm::class                          => ClienteFormFactory::class,
                FipeForm::class                             => FipeFormFactory::class,
                WebMotorsForm::class                        => WebMotorsFormFactory::class,
                ClienteFieldset::class                      => InvokableFactory::class,

                Service\ApiService::class                   => Service\Factory\ApiServiceFactory::class,
                Service\WebMotorsService::class             => Service\Factory\WebMotorsServiceFactory::class,
                Service\VeiculoService::class               => Service\Factory\VeiculoServiceFactory::class,
                Service\ApiDetranService::class             => Service\Factory\ApiDetranFactory::class,

//                Service\ICarrosFipeService::class           => Service\Factory\FipeServiceFactory::class,
//                Service\IMotosFipeService::class            => Service\Factory\FipeServiceFactory::class,
//                Service\ICaminhoesFipeService::class        => Service\Factory\FipeServiceFactory::class,
                
                VeiculoRepository::class                    => VeiculoRepositoryFactory::class,
                WebMotorsRepository::class                  => WebMotorsRepositoryFactory::class
            ]
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                VeiculoController::class        => VeiculoControllerFactory::class,
                WebMotorsController::class        => AvaliacaoControllerFactory::class,
                ApiVeiculoController::class     => ApiVeiculoControllerFactory::class
            ]
        ];
    }

}