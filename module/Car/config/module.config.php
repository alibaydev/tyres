<?php

namespace Car;

use Car\Controller\Factory\ModelControllerFactory;
use Car\Controller\Factory\RimControllerFactory;
use Car\Controller\Factory\TireControllerFactory;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'search-rims-by-params' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/search-rims-by-params',
                    'defaults' => [
                        'controller' => Controller\RimController::class,
                        'action'     => 'searchByParams',
                    ],
                ],
            ],
            'search-tires-by-params' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/search-tires-by-params',
                    'defaults' => [
                        'controller' => Controller\TireController::class,
                        'action'     => 'searchByParams',
                    ],
                ],
            ],

            'rest-models' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/brands/:brandId/models',
                    'defaults' => [
                        'controller' => Controller\ModelController::class,
                        'action'     => 'searchByBrand',
                    ],
                ],
            ]
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
    'access_filter' => [
        'controllers' => [
            Controller\RimController::class => [
                ['actions' => ['searchByParams'], 'allow' => '*'],
            ],
            Controller\TireController::class => [
                ['actions' => ['searchByParams'], 'allow' => '*'],
            ],
            Controller\ModelController::class => [
                ['actions' => ['searchByBrand'], 'allow' => '*'],
            ],
        ]
    ],
    'controllers' => [
        'factories' => [
            Controller\RimController::class => RimControllerFactory::class,
            Controller\TireController::class => TireControllerFactory::class,
            Controller\ModelController::class => ModelControllerFactory::class,
        ],
    ],
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ],
];