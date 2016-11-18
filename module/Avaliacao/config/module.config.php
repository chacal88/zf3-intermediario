<?php

namespace Avaliacao;

use Avaliacao\Controller\ApiVeiculoController;
use Zend\Router\Http\Literal;

return [
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
                    'webmotors' => [
                        'type' => 'segment',
                        'options' => [
                            'route' => '/webmotors[/:action[/:id]]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\WebMotorsController::class,
                                'action' => 'index'
                            ]
                        ]
                    ],
                    'fipe' => [
                        'type' => 'segment',
                        'options' => [
                            'route' => '/fipe[/:action[/:id]]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\FipeController::class,
                                'action' => 'index'
                            ]
                        ]
                    ],
                ]
            ],
            'public-bot-avaliacao' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/bot'
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'veiculo' => [
                        'type' => 'segment',
                        'options' => [
                            'verb' => 'put',
                            'route' => '/veiculo[/:id]',
                            'defaults' => [
                                'controller' => Controller\ApiVeiculoController::class,
                            ]
                        ]
                    ]
                ]
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'avaliacao' => __DIR__ . "/../view"
        ],
        'template_map' => [
            'veiculo/label'                => __DIR__ . '/../view/avaliacao/veiculo/veiculo-label.phtml',
        ],
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ],
    'doctrine' => [
        'driver' => [
            // defines an annotation driver with two paths, and names it `my_annotation_driver`
            'Avaliacao_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [
                    __DIR__ . "/../src/Entity"
                ],
            ],

            // default metadata driver, aggregates all other drivers into a single one.
            // Override `orm_default` only if you know what you're doing
            'orm_default' => [
                'drivers' => [
                    // register `my_annotation_driver` for any entity under namespace `My\Namespace`
                    'Avaliacao\Entity' => 'Avaliacao_driver'
                ]
            ]
        ],
        'fixture' => [
            'AvaliacaoFixture' => __DIR__ . '/../srs/Fixture'
        ]
    ]
];