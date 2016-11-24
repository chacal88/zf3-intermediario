<?php


namespace Avaliacao\Form;


use Zend\Form\Element;
use Zend\Form\Form;

class  ObservacaoForm extends Form
{

    public function __construct($name=null)
    {
        parent::__construct('observacao');

        $this->add([
           'name' => 'id',
            'type' => Element\Hidden::class
        ]);

        $this->add([
            'name' => 'quilometragem',
            'type' => Element\Text::class,
            'options' => [
                'label'=> 'quilometragem'
            ],
            'attributes' => [
                'required' => 'required',
                'class' => 'form-control quilometro'
            ],
            'label_attributes' => [
                'class' => 'control-label'
            ]
        ]);

        $this->add([
            'type' => Element\Select::class,
            'name' => 'pneu',
            'options' => [
                'label' => 'Pneus',
                'value_options' => [
                    '' =>'Selecione',
                    'bom' => 'Bom',
                    'regular' => 'Regular',
                    'ruim' => 'Ruim'
                ],
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
            'name' => 'obs',
            'type' => Element\Textarea::class,
            'options' => [
                'label'=> 'Observações'
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
            'name' => 'valor',
            'type' => Element\Text::class,
            'options' => [
                'label'=> 'Valor'
            ],
            'attributes' => [
                'required' => 'required',
                'class' => 'form-control dinheiro',
                 'id' => 'valor'
            ],
            'label_attributes' => [
                'class' => 'control-label'
            ]
        ]);

        $this->add([
            'name' => 'submit',
            'type' => Element\Submit::class,
            'attributes' => [
                'value'=> 'Finalizar',
                'required' => 'required',
                'class' => 'btn btn-success'

            ]
        ]);

    }
}