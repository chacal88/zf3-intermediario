<?php

namespace Avaliacao\Form\Factory;

use Avaliacao\Form\FipeForm;
use Avaliacao\InputFilter\FipeInputFilter;
use Interop\Container\ContainerInterface;

class FipeFormFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $inputFilter = new FipeInputFilter();
        $form = new  FipeForm();
        $form->setInputFilter($inputFilter);
        return $form;
    }


}