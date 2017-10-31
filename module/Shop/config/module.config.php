<?php

namespace Shop;

use Zend\Router\Http\Literal;
use Zend\ServiceManager\Factory\InvokableFactory;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

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
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'view_helpers' => [
        'factories' => [
            View\Helper\Price::class => InvokableFactory::class,
        ],
        'aliases' => [
            'price' => View\Helper\Price::class,
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
        ]
    ],
    'controllers' => [
        'factories' => [
            Controller\RimController::class => InvokableFactory::class,
            Controller\TireController::class => InvokableFactory::class,
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