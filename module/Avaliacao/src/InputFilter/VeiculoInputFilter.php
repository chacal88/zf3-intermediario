<?php

namespace Avaliacao\InputFilter;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\I18n\Filter\Alnum;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;

class VeiculoInputFilter extends InputFilter
{

    public function __construct()
    {
        $this->add([
            'name' => 'id',
            'required' => true,
            'allow_empty' => true
        ]);

        $this->add([
            'name' => 'placa',
            'required' => true,
            'filters' => [
                ['name' => StringTrim::class],
                ['name' => Alnum::class],
                ['name' => StripTags::class]
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [
                            NotEmpty::IS_EMPTY => 'O campo é requerido!'
                        ]
                    ]
                ]
            ]
        ]);

        $this->add([
            'name' => 'renavam',
            'required' => false,
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [
                            NotEmpty::IS_EMPTY => 'O campo é requerido!'
                        ]
                    ]
                ]
            ]
        ]);
    }


}