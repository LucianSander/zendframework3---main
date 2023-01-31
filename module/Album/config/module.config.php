<?php 

namespace Album; 
use Zend\ServiceManager\Factory\InvokableFactory; 


return [
    'router'  => [ 
        'routes' => [
            'album' => [
                'type' =>\Zend\Router\Http\Segment::class,
                'options' => [
                    'route' => '/album[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*', 
                        'id' => '[0-9]+', 
    
                    ],
                    'defaults' => [
                        'controller' => Controller\AlbumController::class, 
                        'action' => 'indexalbum',
                    ],
                ],
            ],
        ],
    ], 
    'controllers' => [
        'factories' => [
            Controller\AlbumController::class => InvokableFactory::class, 
        ],
    ],
    'view_manager' => [ 
        'template_path_stack' => [ 
            'album' => __DIR__. '/../view', 
        ],
    ],
];