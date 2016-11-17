<?php
namespace Avaliacao\Fieldset;

use Avaliacao\Entity\Endereco;
use Zend\Form\Element;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;

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
            'name' => 'delete',
            'type' => Element\Button::class,
            'options' => [
                'label' => 'delete',
            ],
            'attributes' => [
                'value' => 'Delete',
                'onclick' => 'return remove_element(this)',
                'class' => 'btn btn-danger',
//                'disabled'=>'true',
                'id' => 'delete'
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
//            'price' => [
//                'required' => true,
//                'validators' => [
//                    array(
//                        'name' => 'Float'
//                    ),
//                ],
//            ],
        ];
    }
}