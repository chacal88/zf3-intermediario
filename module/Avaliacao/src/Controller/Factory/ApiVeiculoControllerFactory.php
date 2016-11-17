<?php

namespace Avaliacao\Controller\Factory;

use Avaliacao\Controller\ApiVeiculoController;
use Avaliacao\Model\VeiculoTable;
use Avaliacao\Service\FipeService;
use Avaliacao\Service\ICarrosFipeService;
use Avaliacao\Service\VeiculoService;
use Interop\Container\ContainerInterface;

class ApiVeiculoControllerFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $veiculoService = $container->get(VeiculoService::class);

        return new ApiVeiculoController($veiculoService);
    }

}