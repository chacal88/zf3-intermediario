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
            'name' => 'marcaFipe',
            'type' => Element\Select::class,
            'attributes' => [
                'id' => 'select-marca'
            ]
        ]);

        $this->add([
            'name' => 'modeloFipe',
            'type' => Element\Select::class,
            'attributes' => [
                'id' => 'select-modelo'
            ]
        ]);

        $this->add([
            'name' => 'anoFipe',
            'type' => Element\Select::class,
            'attributes' => [
                'id' => 'select-ano'
            ]
        ]);

        $this->add([
            'name' => 'veiculo',
            'type' => Element\Select::class,
            'attributes' => [
                'id' => 'select-veiculo'
            ]
        ]);

        $this->add([
            'name' => 'codigoFipe',
            'type' => Element\Hidden::class,
            'attributes' => [
                'id' => 'codigofipe'
            ]
        ]);

        $this->add([
            'name' => 'submit',
            'type' => Element\Submit::class,
            'attributes' => [
                'value' => 'Finalizar',
                'id' => 'submitbutton'
            ]
        ]);

    }
}