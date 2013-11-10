<?php
return array(
    'modules' => array(
        'ZF2x\Permissions\Acl',
        'ZF2x\Navigation\Permissions\Acl',
        'ZF2x\Navigation',
        'ZF2x\Authentication',
        'ZF2x\Doctrine',
        'ZF2x\Doctrine\ORM',
        'ZF2x\User',
        'ZF2x\Doctrine\ORM\User',
        'ZF2x\Identity',
        'ZF2x\Mail',
        'ZF2x\Mandrill',
        'ZF2x\Twitter\Bootstrap',
        'Application',
    ),
    'module_listener_options' => array(
        'module_paths' => array(),
        'config_glob_paths' => array(
            'config/autoload/{*}/{*}.php',
            'config/autoload/{,*.}{global,local}.php',
        ),
    ),
);
