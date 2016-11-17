<?php

namespace Avaliacao\Form\Factory;

use Avaliacao\Entity\AvaliacaoFipe;
use Avaliacao\Form\FipeForm;
use Avaliacao\InputFilter\FipeInputFilter;
use Interop\Container\ContainerInterface;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;

class FipeFormFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $form = new  FipeForm();
        $form->setInputFilter(new FipeInputFilter());
        $form->setHydrator(new ClassMethodsHydrator());
//        $form->setObject(new AvaliacaoFipe());
        return $form;
    }


}