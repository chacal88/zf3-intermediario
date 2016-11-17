<?php

namespace Avaliacao\Form\Factory;

use Avaliacao\Entity\AvaliacaoFipe;
use Avaliacao\Form\ObservacaoForm;
use Avaliacao\InputFilter\ObservacaoInputFilter;
use Interop\Container\ContainerInterface;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;

class ObservacaoFormFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $form = new  ObservacaoForm();
        $form->setInputFilter(new ObservacaoInputFilter());
        $form->setHydrator(new ClassMethodsHydrator());
        $form->setObject(new AvaliacaoFipe());
        return $form;
    }


}