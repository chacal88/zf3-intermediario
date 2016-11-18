<?php


namespace Avaliacao\Form;


use Zend\Form\Element;
use Zend\Form\Form;

class  VeiculoForm extends Form
{

    public function __construct($name=null)
    {
        parent::__construct('veiculo');

        $this->add([
           'name' => 'id',
            'type' => Element\Hidden::class
        ]);

        $this->add([
            'name' => 'placa',
            'type' => Element\Text::class,
            'options' => [
                'label'=> 'Placa'
            ],
            'attributes' => [
                'required' => 'required',
                'class' => 'form-control'
            ],
            'label_attributes' => [
                'class' => 'control-label'
            ]
        ]);

        $this->add([
            'name' => 'renavam',
            'type' => Element\Text::class,
            'options' => [
                'label'=> 'Renavam'
            ],
            'attributes' => [
                'class' => 'form-control'
            ],
            'label_attributes' => [
                'class' => 'control-label'
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