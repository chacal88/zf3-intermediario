<?php

namespace Avaliacao\Form\Factory;

use Avaliacao\Form\VeiculoForm;
use Avaliacao\InputFilter\VeiculoInputFilter;
use Interop\Container\ContainerInterface;

class VeiculoFormFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $inputFilter = new EnderecoInputFilter();
        $form = new  VeiculoForm();
        $form->setInputFilter($inputFilter);
        return $form;
    }


}