<?php
namespace Avaliacao\Form;

use Avaliacao\Fieldset\ClienteFieldset;
use Zend\Form\Element;
use Zend\Form\Form;


class ClienteForm extends Form
{
    public function __construct()
    {
        parent::__construct('cliente_form');

        $this->setAttribute('method', 'post');

        $this->add([
            'type' => ClienteFieldset::class,
            'options' => [
                'use_as_base_fieldset' => true,
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'type' => Element\Submit::class,
            'attributes' => [
                'value'=> 'Finalizar',
//                'disabled'=>'true',
                'id'=>'submitbutton',
                'class' => 'btn btn-success'
            ]

        ]);
    }
}