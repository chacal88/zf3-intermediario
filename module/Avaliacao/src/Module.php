<?php

namespace Avaliacao;

use Avaliacao\Controller\ApiVeiculoController;
use Avaliacao\Controller\Factory\ApiVeiculoControllerFactory;
use Avaliacao\Controller\Factory\FipeControllerFactory;
use Avaliacao\Controller\Factory\VeiculoControllerFactory;
use Avaliacao\Controller\Factory\WebMotorsControllerFactory;
use Avaliacao\Controller\FipeController;
use Avaliacao\Controller\VeiculoController;
use Avaliacao\Controller\WebMotorsController;
use Avaliacao\Fieldset\ClienteFieldset;
use Avaliacao\Form\ClienteForm;
use Avaliacao\Form\Factory\ClienteFormFactory;
use Avaliacao\Form\Factory\FipeFormFactory;
use Avaliacao\Form\Factory\ObservacaoFormFactory;
use Avaliacao\Form\Factory\VeiculoFormFactory;
use Avaliacao\Form\Factory\WebMotorsFormFactory;
use Avaliacao\Form\FipeForm;
use Avaliacao\Form\ObservacaoForm;
use Avaliacao\Form\VeiculoForm;
use Avaliacao\Form\WebMotorsForm;
use Avaliacao\Repository\AvaliacaoFipeRepository;
use Avaliacao\Repository\Factory\AvaliacaoFipeRepositoryFactory;
use Avaliacao\Repository\Factory\VeiculoRepositoryFactory;
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

                VeiculoForm::class                          => VeiculoFormFactory::class,
                ClienteForm::class                          => ClienteFormFactory::class,
                FipeForm::class                             => FipeFormFactory::class,
                ObservacaoForm::class                       => ObservacaoFormFactory::class,
                WebMotorsForm::class                        => WebMotorsFormFactory::class,
                ClienteFieldset::class                      => InvokableFactory::class,

                Service\ApiService::class                   => Service\Factory\ApiServiceFactory::class,
                Service\WebMotorsService::class             => Service\Factory\WebMotorsServiceFactory::class,
                Service\FipeService::class                  => Service\Factory\FipeServiceFactory::class,
                Service\VeiculoService::class               => Service\Factory\VeiculoServiceFactory::class,
                Service\ApiDetranService::class             => Service\Factory\ApiDetranFactory::class,

                VeiculoRepository::class                    => VeiculoRepositoryFactory::class,
                AvaliacaoFipeRepository::class              => AvaliacaoFipeRepositoryFactory::class,
                WebMotorsRepository::class                  => WebMotorsControllerFactory::class
            ]
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                VeiculoController::class        => VeiculoControllerFactory::class,
                WebMotorsController::class      => WebMotorsControllerFactory::class,
                FipeController::class           => FipeControllerFactory::class,
                ApiVeiculoController::class     => ApiVeiculoControllerFactory::class
            ]
        ];
    }

}