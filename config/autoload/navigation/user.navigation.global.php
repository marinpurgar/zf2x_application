<?php
return array(
    'zf2x' => array(
        'navigation' => array(
            'user-menu' => array(
                'logout' => array(
                    'label' => 'logout',
                    'route' => 'logout',
                    'controller' => 'application.index.controller',
                    'action' => 'logout',
                ),
                'login' => array(
                    'label' => 'login',
                    'route' => 'login',
                    'controller' => 'application.index.controller',
                    'action' => 'login',
                ),
            )
        ),
    )
);
