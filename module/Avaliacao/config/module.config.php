<?php

namespace Avaliacao;

use Avaliacao\Controller\ApiVeiculoController;
use Zend\Router\Http\Literal;

return [
    'controllers' => [
        'factories' => [
            #Controller\AvaliacaoController::class => InvokableFactory::class
        ]
    ],
    'router' => [
        'routes' => [
            'private-avaliacao' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/avaliacao'
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
            ],
            'test' => [
                'type' => 'literal',
                'verb' => 'get',
                'options' => [
                    'route' => '/test',
                    'defaults' => [
                        'controller' => ApiVeiculoController::class,
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'avaliacao' => __DIR__ . "/../view"
        ],
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ]
];