<?php
namespace Avaliacao\Fieldset;

use Avaliacao\Entity\Endereco;
use Zend\Filter\Digits;
use Zend\Filter\StringTrim;
use Zend\Form\Element;
use Zend\Form\Fieldset;
use Zend\I18n\Filter\Alnum;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;
use Zend\Validator\NotEmpty;

class EnderecoFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('endereco');

        $this->setHydrator(new ClassMethodsHydrator(false));
        $this->setObject(new Endereco());

        $this->add([
            'name' => 'id',
            'type' => Element\Hidden::class
        ]);

        $this->add([
            'name' => 'logradouro',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Logradouro',
            ],
            'attributes' => [
                'required' => 'required',
                'class' => 'form-control'
            ],
            'label_attributes' => [
                'class' => 'control-label'
            ],
        ]);

        $this->add([
            'name' => 'numero',
            'type' => Element\Number::class,
            'options' => [
                'label' => 'Numero',
            ],
            'attributes' => [
                'required' => 'required',
                'class' => 'form-control'
            ],
            'label_attributes' => [
                'class' => 'control-label'
            ],
        ]);

        $this->add([
            'name' => 'complemento',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Complemento',
            ],
            'attributes' => [
                'class' => 'form-control'
            ],
            'label_attributes' => [
                'class' => 'control-label'
            ],
        ]);

        $this->add([
            'name' => 'bairro',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Bairro',
            ],
            'attributes' => [
                'required' => 'required',
                'class' => 'form-control'
            ],
            'label_attributes' => [
                'class' => 'control-label'
            ],
        ]);

        $this->add([
            'name' => 'cidade',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Cidade',
            ],
            'attributes' => [
                'required' => 'required',
                'class' => 'form-control'
            ],
            'label_attributes' => [
                'class' => 'control-label'
            ],
        ]);

        $this->add([
            'name' => 'cep',
            'type' => Element\Number::class,
            'options' => [
                'label' => 'Cep',
            ],
            'attributes' => [
                'required' => 'required',
                'class' => 'form-control'
            ],
            'label_attributes' => [
                'class' => 'control-label'
            ],
        ]);

        $this->add([
            'name' => 'search',
            'type' => Element\Button::class,
            'options' => [
                'label' => '<i class="fa fa-search font-blue"></i>',
                'label_options' => [
                    'disable_html_escape' => true,
                ]
            ],
            'attributes' => [
                'onclick' => 'return get_element(this)',
                'class' => 'btn btn-default',
//                'disabled'=>'true',
                'style' => 'height: 34px;'
            ]
        ]);

        $this->add([
            'name' => 'delete',
            'type' => Element\Button::class,
            'options' => [
                'label' => '<i class="fa fa-trash-o font-write"></i>',
                'label_options' => [
                    'disable_html_escape' => true,
                ]
            ],
            'attributes' => [
                'value' => 'Delete',
                'onclick' => 'return remove_element(this)',
                'class' => 'btn btn-danger',
//                'disabled'=>'true',
                'id' => 'delete',
                'style' => 'height: 34px;'
            ]
        ]);


    }

    /**
     * Should return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInputFilter()}.
     *
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return [
            'name' => [
                'required' => true,
            ],
            'cep' => [
                'required' => true,
                'filters' => [
                    ['name' => StringTrim::class],
                    ['name' => Digits::class],
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
            ],
        ];
    }
}