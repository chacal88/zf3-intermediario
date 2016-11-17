<?php

namespace Avaliacao\Form\Factory;

use Avaliacao\Entity\Veiculo;
use Avaliacao\Form\VeiculoForm;
use Avaliacao\InputFilter\VeiculoInputFilter;
use Interop\Container\ContainerInterface;
use Zend\Hydrator\ClassMethods;

class VeiculoFormFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $inputFilter = new VeiculoInputFilter();
        $form = new  VeiculoForm();
        $form->setInputFilter($inputFilter);
        $form->setHydrator(new ClassMethods());
        $form->setObject(new Veiculo());
        return $form;
    }


}