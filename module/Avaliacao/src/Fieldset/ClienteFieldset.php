<?php
namespace Avaliacao\Fieldset;

use Avaliacao\Model\Cliente;
use Zend\Form\Element;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;

class ClienteFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('cliente');

        $this->setHydrator(new ClassMethodsHydrator(false));
        $this->setObject(new Cliente());

        $this->add([
            'name' => 'id',
            'type' => Element\Hidden::class
        ]);

        $this->add([
            'name' => 'nome',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Nome',
            ],
            'attributes' => [
                'required' => 'required',
                'class' => 'form-control'
            ],
            'label_attributes' => [
                'class' => 'control-label'
            ],
        ]);

        $this->add([
            'name' => 'cpfCnpj',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Cpf/Cnpj',
            ],
            'attributes' => [
                'required' => 'required',
                'class' => 'form-control'
            ],
            'label_attributes' => [
                'class' => 'control-label'
            ],
        ]);

        $this->add([
            'name' => 'email',
            'type' => Element\Email::class,
            'options' => [
                'label' => 'Email',
            ],
            'attributes' => [
                'required' => 'required',
                'class' => 'form-control'
            ],
            'label_attributes' => [
                'class' => 'control-label'
            ],
        ]);

        $this->add([
            'type' => Element\Radio::class,
            'name' => 'sexo',
            'options' => [
                'label' => 'Sexo',
                'value_options' => [
                    'M' => 'Masculino',
                    'F' => 'Feminino',
                ],
            ],
            'attributes' => [
                'required' => 'required',
                'class' => 'radio'
            ],
            'label_attributes' => [
                'class' => 'control-label'
            ],
        ]);

        $this->add([
            'type' => Element\Date::class,
            'name' => 'dataNascimento',
            'options' => [
                'label' => 'Data de Nascimento',
                'format' => 'Y-m-d',
            ],
            'attributes' => [
                'min' => '1900-01-01',
                'max' => '2020-01-01',
                'step' => '1', // days; default step interval is 1 day
                'required' => 'required',
                'class' => 'form-control'
            ],
            'label_attributes' => [
                'class' => 'control-label'
            ],
        ]);

        $this->add([
            'type' => Element\Collection::class,
            'name' => 'enderecos',
            'options' => [
                'label' => 'Endereços',
//                'count' => 2,
                'should_create_template' => true,
                'template_placeholder' => '__placeholder__',
                'target_element' => [
                    'type' => EnderecoFieldset::class,
                ],
            ],
        ]);

        $this->add([
            'type' => Element\Collection::class,
            'name' => 'telefones',
            'options' => [
                'label' => 'Telefones',
//                'count' => 2,
                'should_create_template' => true,
                'template_placeholder' => '__placeholder__',
                'target_element' => [
                    'type' => TelefoneFieldset::class,
                ],
            ],
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