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
            'name' => 'marca',
            'type' => Element\Select::class,
            'attributes' => [
                'id' => 'select-marca'
            ]
        ]);

        $this->add([
            'name' => 'modelo',
            'type' => Element\Select::class,
            'attributes' => [
                'id' => 'select-modelo'
            ]
        ]);

        $this->add([
            'name' => 'ano',
            'type' => Element\Select::class,
            'attributes' => [
                'id' => 'select-ano'
            ]
        ]);

        $this->add([
            'name' => 'veiculos',
            'type' => Element\Select::class,
            'attributes' => [
                'id' => 'select-veiculo'
            ]
        ]);

        $this->add([
            'name' => 'submit',
            'type' => Element\Submit::class,
            'attributes' => [
                'value' => 'Próximo',
                'id' => 'submitbutton'
            ]
        ]);

    }
}