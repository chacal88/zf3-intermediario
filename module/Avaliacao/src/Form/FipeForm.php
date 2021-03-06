<?php


namespace Avaliacao\Form;


use Zend\Form\Element;
use Zend\Form\Form;

class  FipeForm extends Form
{

    public function __construct($name = null)
    {
        parent::__construct('fipe');

        $this->add([
            'name' => 'id',
            'type' => Element\Hidden::class
        ]);

        $this->add([
            'type' => Element\Select::class,
            'name' => 'tipo',
            'options' => [
                'label' => 'Tipo',
                'value_options' => [
                    'motos' => 'Motos',
                    'carros' => 'Carros',
                    'caminhoes' => 'Caminhoes'
                ]
            ],
            'attributes' => [
                'id' => 'select-tipo'
            ]
        ]);

        $this->add([
            'name' => 'marca',
            'type' => Element\Select::class,
            'attributes' => [
                'id' => 'select-marca'
            ],
            'options' => array(
                'disable_inarray_validator' => true,
            ),
        ]);

        $this->add([
            'name' => 'modelo',
            'type' => Element\Select::class,
            'attributes' => [
                'id' => 'select-modelo'
            ],
            'options' => array(
                'disable_inarray_validator' => true,
            ),
        ]);

        $this->add([
            'name' => 'ano',
            'type' => Element\Select::class,
            'attributes' => [
                'id' => 'select-ano'
            ],
            'options' => array(
                'disable_inarray_validator' => true,
            ),
        ]);

        $this->add([
            'name' => 'codigo',
            'type' => Element\Text::class,
            'attributes' => [
                'id' => 'codigo-fipe'
            ]
        ]);

        $this->add([
            'name' => 'valor_fipe',
            'type' => Element\Text::class,
            'attributes' => [
                'id' => 'valor_fipe'
            ]
        ]);

        $this->add([
            'name' => 'submit',
            'type' => Element\Submit::class,
            'attributes' => [
                'value'=> 'Proximo',
                'required' => 'required',
                'class' => 'btn btn-success'

            ]
        ]);
    }
}