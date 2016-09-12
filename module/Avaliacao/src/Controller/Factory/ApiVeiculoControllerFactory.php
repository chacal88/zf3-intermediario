<?php

namespace Avaliacao\Controller\Factory;

use Avaliacao\Controller\ApiVeiculoController;
use Avaliacao\Model\VeiculoTable;
use Avaliacao\Service\FipeService;
use Avaliacao\Service\ICarrosFipeService;
use Interop\Container\ContainerInterface;

class ApiVeiculoControllerFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $veiculoTable = $container->get(VeiculoTable::class);

        
        $fipeService = $container->get(ICarrosFipeService::class);

        return new ApiVeiculoController($veiculoTable, $fipeService);
    }

}