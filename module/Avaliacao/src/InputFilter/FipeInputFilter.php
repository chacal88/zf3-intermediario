<?php

namespace Avaliacao\InputFilter;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;

class FipeInputFilter extends InputFilter
{

    public function __construct()
    {
        $this->add([
            'name' => 'marca',
            'required' => true,
            'allow_empty' => true
        ]);

    }
}