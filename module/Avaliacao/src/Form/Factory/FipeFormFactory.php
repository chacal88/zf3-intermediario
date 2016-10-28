<?php

namespace Avaliacao\Form\Factory;

use Avaliacao\Entity\Veiculo;
use Avaliacao\Form\FipeForm;
use Interop\Container\ContainerInterface;
use Zend\Hydrator\ClassMethods;
use Zend\InputFilter\InputFilter;

class FipeFormFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $inputFilter = new InputFilter();
        $form = new  FipeForm();
        $form->setInputFilter($inputFilter);
        $form->setHydrator(new ClassMethods());
        $form->setObject(new Veiculo());
        return $form;
    }


}