<?php

namespace Car;

use Zend\Router\Http\Literal;
use Zend\ServiceManager\Factory\InvokableFactory;

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
];