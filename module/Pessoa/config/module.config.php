<?php 

namespace Pessoa; 
use Zend\ServiceManager\Factory\InvokableFactory; 


return [
    'router'  => [ 
        'routes' => [
            'pessoa' => [
                'type' =>\Zend\Router\Http\Segment::class,
                'options' => [
                    'route' => '/pessoa[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*', 
                        'id' => '[0-9]+', 
    
                    ],
                    'defaults' => [
                        'controller' => Controller\PessoaController::class, 
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ], 
    'controllers' => [
        'factories' => [
        //    Controller\PessoaController::class => InvokableFactory::class, 
        ],
    ],
    'view_manager' => [ 
        'template_path_stack' => [ 
            'pessoa' => __DIR__. '/../view', 
        ],
    ],
    'db' => [
        'driver'   => 'Pdo_Pgsql', 
        'database' => 'pessoa', 
        'username' => 'postgres', 
        'password' => '123456', 
        'hostname' => 'localhost',
        'port'     => '5432'
    ],  
];