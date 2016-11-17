<?php

namespace Avaliacao\Form\Factory;

use Avaliacao\Entity\WebMotors;
use Avaliacao\Form\WebMotorsForm;
use Interop\Container\ContainerInterface;
use Zend\Hydrator\ClassMethods;
use Zend\InputFilter\InputFilter;

class WebMotorsFormFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $inputFilter = new InputFilter();
        $form = new  WebMotorsForm();
        $form->setInputFilter($inputFilter);
        $form->setHydrator(new ClassMethods());
        $form->setObject(new WebMotors());
        return $form;
    }


}