<?php


namespace Avaliacao\Form;


use Avaliacao\Entity\Endereco;
use Avaliacao\Entity\Telefone;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;

class  TelefoneForm extends Form
{

    public function __construct($name=null)
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
}