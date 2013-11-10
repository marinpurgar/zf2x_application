<?php
return array(
    'zf2x' => array(
        'permissions' => array(
            'acl' => array(
                'enable_route_listener' => true,
                'enable_default_identity_provider' => true,
                'roles' => array(
                    'guest' => null,
                    'member' => null,
                ),
                'resources' => array(
                    'application.index.controller' => null,
                ),
                'allow' => array(
                    'guest' => array(
                        'application.index.controller' => array(
                            'join',
                            'login'
                        ),
                    ),
                    'member' => array(
                        'application.index.controller' => array(
                            'dashboard',
                            'logout'
                        ),
                    ),
                ),
                'deny' => array(),
                'strategy' => array(
                    'redirect' => array(
                        'redirects' => array(
                            'guest' => array(
                                'route' => 'index',
                                'application.index.controller' => array(
                                    'logout' => array(
                                        'route' => 'login',
                                    ),
                                ),
                            ),
                            'member' => array(
                                'route' => 'dashboard',
                            ),
                        ),
                    ),
                    'deny_route' => array(
                        'templates' => array(
                            401 => '',
                            402 => '',
                            403 => '',
                        ),
                    ),
                ),
            ),
        ),
    ),
);
