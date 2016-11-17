<?php
namespace Avaliacao\Fieldset;

use Avaliacao\Entity\Telefone;
use Zend\Form\Element;
use Zend\Form\Fieldset;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;
use Zend\InputFilter\InputFilterProviderInterface;

class TelefoneFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('telefone');

        $this->setHydrator(new ClassMethodsHydrator(false));
        $this->setObject(new Telefone());

        $this->add([
            'name' => 'id',
            'type' => Element\Hidden::class
        ]);

        $this->add([
            'name' => 'numero',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Numero',
            ],
            'attributes' => [
                'required' => 'required',
                'class' => 'form-control'
            ],
            'label_attributes' => [
                'class' => 'sr-only'
            ],
        ]);

        $this->add([
            'type' => Element\Select::class,
            'name' => 'tipo',
            'options' => [
                'label' => 'Tipo',
                'value_options' => [
                    'Cel' => 'Cel',
                    'Residencial' => 'Residencial',
                    'Fax' => 'Fax',
                    'Comercial' => 'Comercial',
                ],
            ],
        ]);

        $this->add([
            'name' => 'whatsapp',
            'type' => Element\Checkbox::class,
            'options' => [
                'label' => 'Whatsapp',
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
                'class' => 'btn btn-danger',
                'onclick' => 'return remove_element(this)',
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