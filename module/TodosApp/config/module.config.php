<?php
/**
 * @author Pedro Rojas <pedro.rojas@gmail.com>
 */

namespace TodosApp;

use Laminas\Router\Http\Segment;
use TodosApp\Controller\ToDoController;

return [
    'router' => [
        'routes' => [
            'todo-app' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/todos-app[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[1-9]\d*',
                    ],
                    'defaults' => [
                        'controller' => ToDoController::class,
                        'action' => 'index'
                    ],
                ]
            ]
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