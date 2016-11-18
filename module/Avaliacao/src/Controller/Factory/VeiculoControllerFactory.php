<?php

namespace Avaliacao\Controller\Factory;

use Avaliacao\Controller\VeiculoController;
use Avaliacao\Form\ClienteForm;
use Avaliacao\Form\VeiculoForm;
use Avaliacao\Service\ApiDetranService;
use Avaliacao\Service\ApiService;
use Avaliacao\Service\Factory\VeiculoServiceFactory;
use Avaliacao\Service\VeiculoService;
use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationServiceInterface;

class VeiculoControllerFactory
{

    /**
     * @param ContainerInterface $container
     * @return VeiculoController
     */
    public function __invoke(ContainerInterface $container)
    {

        /** @var VeiculoService $veiculoService */
        $veiculoService = $container->get(VeiculoService::class);

        $veiculoForm = $container->get(VeiculoForm::class);
        $clienteForm = $container->get(ClienteForm::class);
//        $fipeForm = $container->get(FipeForm::class);
//        $webMotorsForm = $container->get(WebMotorsForm::class);

        $apiService = $container->get(ApiService::class);
        $apiDetranService = $container->get(ApiDetranService::class);
        $authService = $container->get(AuthenticationServiceInterface::class);

//        $fipeService = $container->get(ICarrosFipeService::class);
//        $webMotorsService = $container->get(WebMotorsService::class);

        return new VeiculoController($veiculoForm, $clienteForm, $veiculoService, $apiService, $apiDetranService, $authService);
    }


}