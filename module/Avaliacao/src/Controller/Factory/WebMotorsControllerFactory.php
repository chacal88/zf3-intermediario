<?php

namespace Avaliacao\Controller\Factory;

use Avaliacao\Controller\WebMotorsController;
use Avaliacao\Controller\VeiculoController;
use Avaliacao\Form\WebMotorsForm;
use Avaliacao\Service\VeiculoService;
use Avaliacao\Service\WebMotorsService;
use Interop\Container\ContainerInterface;

class WebMotorsControllerFactory
{

    /**
     * @param ContainerInterface $container
     * @return VeiculoController
     */
    public function __invoke(ContainerInterface $container)
    {

        /** @var VeiculoService $veiculoService */
        $veiculoService = $container->get(VeiculoService::class);

        /** @var WebMotorsService $webMotorsService */
        $webMotorsService = $container->get(WebMotorsService::class);

        /** @var WebMotorsForm  $webMotosForm */
        $webMotosForm = $container->get(WebMotorsForm::class);

        return new WebMotorsController($veiculoService, $webMotorsService, $webMotosForm);
    }


}