<?php

namespace Avaliacao\Controller\Factory;

use Avaliacao\Controller\VeiculoController;
use Avaliacao\Form\ClienteForm;
use Avaliacao\Form\VeiculoForm;
use Avaliacao\Service\ApiDetranService;
use Avaliacao\Service\ApiService;
use Avaliacao\Service\VeiculoService;
use DataWashModule\Service\DataWashServiceConsult;
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

        $apiService = $container->get(ApiService::class);
        $apiDetranService = $container->get(ApiDetranService::class);
        $authService = $container->get(AuthenticationServiceInterface::class);
        $dataWashService = $container->get(DataWashServiceConsult::class);

        return new VeiculoController($veiculoForm, $clienteForm, $veiculoService, $apiService, $apiDetranService, $authService, $dataWashService);
    }


}