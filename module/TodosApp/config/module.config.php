<?php
/**
 * @author Pedro Rojas <pedro.rojas@gmail.com>
 */

namespace TodosApp;

use Laminas\ServiceManager\Factory\InvokableFactory;
use TodosApp\Controller\ToDoController;

return [
    'router' => [
        'routes' => [
            'todos-app-index' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/todos-app/index',
                    'defaults' => [
                        'controller' => ToDoController::class,
                        'action' => 'index'
                    ]
                ]
            ],
            'todo-app-create' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/todos-app/create',
                    'defaults' => [
                        'controller' => ToDoController::class,
                        'action' => 'create'
                    ]
                ]
            ]
        ]
    ],
    'controllers' => [
        'factories' => [
            ToDoController::class => InvokableFactory::class
        ]
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ]
    ]
];