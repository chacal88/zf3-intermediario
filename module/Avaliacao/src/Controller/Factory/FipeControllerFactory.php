<?php

namespace Avaliacao\Controller\Factory;

use Avaliacao\Controller\FipeController;
use Avaliacao\Form\FipeForm;
use Avaliacao\Form\ObservacaoForm;
use Avaliacao\Service\FipeService;
use Avaliacao\Service\VeiculoService;
use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationServiceInterface;

class FipeControllerFactory
{

    /**
     * @param ContainerInterface $container
     * @return FipeController
     */
    public function __invoke(ContainerInterface $container)
    {

        /** @var FipeService $fipeService */
        $fipeService = $container->get(FipeService::class);

        $authService = $container->get(AuthenticationServiceInterface::class);

        /** @var FipeForm $fipeForm */
        $fipeForm = $container->get(FipeForm::class);

        /** @var ObservacaoForm $observacaoForm */
        $observacaoForm = $container->get(ObservacaoForm::class);

        return new FipeController( $fipeService, $authService, $fipeForm , $observacaoForm);
    }

}