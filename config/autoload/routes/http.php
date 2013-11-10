<?php
return array(
    'router' => array(
        'routes' => array(
            'index' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'application.index.controller',
                        'action' => 'join',
                    ),
                ),
            ),
            'login' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/login',
                    'defaults' => array(
                        'controller' => 'application.index.controller',
                        'action' => 'login',
                    ),
                ),
            ),
            'logout' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/logout',
                    'defaults' => array(
                        'controller' => 'application.index.controller',
                        'action' => 'logout',
                    ),
                ),
            ),
            'dashboard' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/dashboard',
                    'defaults' => array(
                        'controller' => 'application.index.controller',
                        'action' => 'dashboard',
                    ),
                ),
            ),
        ),
    ),
);
