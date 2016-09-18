<?php

namespace Avaliacao\InputFilter;

use Zend\InputFilter\InputFilter;

class FipeInputFilter extends InputFilter
{

    public function __construct()
    {
        $this->add([
            'name' => 'marca',
            'required' => true,
            'allow_empty' => true
        ]);

        $this->add([
            'name' => 'modelo',
            'required' => true,
            'allow_empty' => true
        ]);

        $this->add([
            'name' => 'ano',
            'required' => true,
            'allow_empty' => true
        ]);
        $this->add([
            'name' => 'veiculos',
            'required' => true,
            'allow_empty' => true
        ]);

    }
}