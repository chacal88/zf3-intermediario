<?php

namespace Avaliacao\Controller\Factory;

use Avaliacao\Controller\VeiculoController;
use Avaliacao\Form\VeiculoForm;
use Avaliacao\Model\VeiculoTable;
use Avaliacao\Service\ApiService;
use Interop\Container\ContainerInterface;

class VeiculoControllerFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $veiculoTable = $container->get(VeiculoTable::class);
        $veiculoForm = $container->get(VeiculoForm::class);
        $apiService = $container->get(ApiService::class);
        
        return new VeiculoController($veiculoTable, $veiculoForm, $apiService);
    }


}