<?php


namespace Avaliacao\Form;


use Zend\Form\Element;
use Zend\Form\Form;

class  FipeForm extends Form
{

    public function __construct($name=null)
    {
        parent::__construct('fipe');

        $this->add([
           'name' => 'marca',
            'type' => Element\Select::class
        ]);

        $this->add([
            'name' => 'submit',
            'type' => Element\Submit::class,
            'attributes' => [
                'value'=> 'Próximo',
                'id'=>'submitbutton'
            ]
        ]);

    }
}