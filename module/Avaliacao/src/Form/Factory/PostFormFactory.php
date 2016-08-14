<?php

namespace Avaliacao\Form\Factory;

use Avaliacao\Form\PostForm;
use Avaliacao\InputFilter\PostInputFilter;
use Interop\Container\ContainerInterface;

class PostFormFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $inputFilter = new PostInputFilter();
        $form = new PostForm();
        $form->setInputFilter($inputFilter);
        return $form;
    }


}