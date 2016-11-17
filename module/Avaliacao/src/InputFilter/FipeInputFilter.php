<?php

namespace Avaliacao\InputFilter;

use Zend\InputFilter\InputFilter;

class FipeInputFilter extends InputFilter
{

    public function __construct()
    {
        $this->add([
            'name' => 'tipo',
            'required' => true,
            'allow_empty' => false
        ]);

        $this->add([
            'name' => 'marca',
            'required' => false,
            'allow_empty' => false
        ]);

        $this->add([
            'name' => 'modelo',
            'required' => false,
            'allow_empty' => false
        ]);

        $this->add([
            'name' => 'ano',
            'required' => false,
            'allow_empty' => false
        ]);

        $this->add([
            'name' => 'codigo',
            'required' => false,
            'allow_empty' => false
        ]);

    }
}