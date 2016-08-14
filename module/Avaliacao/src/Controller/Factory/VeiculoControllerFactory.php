<?php

namespace Avaliacao\Controller\Factory;

use Avaliacao\Controller\VeiculoController;
use Avaliacao\Form\PostForm;
use Avaliacao\Model\VeiculoTable;
use Interop\Container\ContainerInterface;

class VeiculoControllerFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $veiculoTable = $container->get(VeiculoTable::class);
        $postForm = $container->get(PostForm::class);
        return new VeiculoController($veiculoTable, $postForm);
    }


}