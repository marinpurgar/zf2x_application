<?php
return array(
    'view_manager' => array(
        'display_exceptions'        => true,
        'display_not_found_reason'  => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => 'application/view/layout/layout.phtml',
            'error/404'               => 'application/view/error/404.phtml',
            'error/index'             => 'application/view/error/index.phtml',
        ),
        'template_path_stack' => array(
            'application/view'
        )
    ),
);
