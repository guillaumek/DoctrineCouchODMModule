<?php
return array(
    'modules' => array(
        'DoctrineModule',
        'DoctrineCouchODMModule',
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'vendor/ardemiranda/doctrine-couch-odm-module/tests/test.module.config.php',
        ),
        'module_paths' => array(
            './vendor',
        ),
    ),
);