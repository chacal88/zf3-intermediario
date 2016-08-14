<?php

namespace Avaliacao;

use Zend\Router\Http\Literal;

return [
    'controllers' => [
        'factories' => [
            #Controller\AvaliacaoController::class => InvokableFactory::class
        ]
    ],
    'router' => [
        'routes' => [
            'admin-avaliacao' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/admin'
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'veiculo' => [
                        'type' => 'segment',
                        'options' => [
                            'route' => '/veiculo[/:action[/:id]]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\VeiculoController::class,
                                'action' => 'index'
                            ]
                        ]
                    ],
                ]
            ]
        ]


    ],
    'view_manager' => [
        'template_path_stack' => [
            'blog' => __DIR__ . "/../view"
        ]
    ]
];