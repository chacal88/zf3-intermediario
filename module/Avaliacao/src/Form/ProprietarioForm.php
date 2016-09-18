<?php


namespace Avaliacao\Form;


use Zend\Form\Element;
use Zend\Form\Form;

class  ProprietarioForm extends Form
{

    public function __construct($name=null)
    {
        parent::__construct('proprietario');

        $this->add([
           'name' => 'id',
            'type' => Element\Hidden::class
        ]);

        $this->add([
            'name' => 'placa',
            'type' => Element\Text::class,
            'options' => [
                'label'=> 'Placa'
            ]
        ]);

        $this->add([
            'name' => 'findsubmit',
            'type' => Element\Submit::class,
            'attributes' => [
                'value'=> 'Buscar Veiculo',
//                'disabled'=>'true',
                'id'=>'findsubmitbutton'
            ]
        ]);

        $this->add([
            'name' => 'renavam',
            'type' => Element\Text::class,
            'options' => [
                'label'=> 'Renavam'
            ]
        ]);

        $this->add([
            'name' => 'submit',
            'type' => Element\Submit::class,
            'attributes' => [
                'value'=> 'Próximo',
//                'disabled'=>'true',
                'id'=>'submitbutton'
            ]
        ]);

    }
}