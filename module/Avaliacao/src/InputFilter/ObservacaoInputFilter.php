<?php

namespace Avaliacao\InputFilter;

use Zend\Filter\StripTags;
use Zend\I18n\Filter\NumberFormat;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;

class ObservacaoInputFilter extends InputFilter
{

    public function __construct()
    {
        $this->add([
            'name' => 'id',
            'required' => true,
            'allow_empty' => true
        ]);

        $this->add([
            'name' => 'quilometragem',
            'required' => true,
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
            'name' => 'pneu',
            'required' => true
        ]);

        $this->add([
            'name' => 'obs',
            'required' => true,
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
            'name' => 'valor',
            'require' => true,
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