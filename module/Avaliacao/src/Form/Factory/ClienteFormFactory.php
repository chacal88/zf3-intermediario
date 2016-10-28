<?php

namespace Avaliacao\Form\Factory;

use Avaliacao\Form\ClienteForm;
use Interop\Container\ContainerInterface;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;
use Zend\InputFilter\InputFilter;

class ClienteFormFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $form = new  ClienteForm();
        $form->setHydrator(new ClassMethodsHydrator(false));
        $form->setInputFilter(new InputFilter());
        return $form;
    }


}