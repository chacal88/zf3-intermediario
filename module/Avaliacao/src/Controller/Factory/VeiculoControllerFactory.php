<?php

namespace Avaliacao\Controller\Factory;

use Avaliacao\Controller\VeiculoController;
use Avaliacao\Form\FipeForm;
use Avaliacao\Form\VeiculoForm;
use Avaliacao\Model\VeiculoTable;
use Avaliacao\Service\ApiService;
use Avaliacao\Service\FipeService;
use Avaliacao\Service\ICarrosFipeService;
use Interop\Container\ContainerInterface;

class VeiculoControllerFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $veiculoTable = $container->get(VeiculoTable::class);
        $veiculoForm = $container->get(VeiculoForm::class);
        $fipeForm = $container->get(FipeForm::class);
        $apiService = $container->get(ApiService::class);
        $fipeService = $container->get(ICarrosFipeService::class);

        return new VeiculoController($veiculoTable, $veiculoForm, $fipeForm, $apiService, $fipeService);
    }


}