<?php
return array(
    'doctrine' => array(
        'configuration' => array(
            'odm_default' => array(
                'default_db' => 'doctrineCouchODMModuleTest'
            )
        ),
        'driver' => array(
            'odm_default' => array(
                'drivers' => array(
                    'DoctrineCouchODMModuleTest\Assets\Document' => 'test'
                )
            ),
            'test' => array(
                'class' => 'Doctrine\ODM\CouchDB\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/Assets/Document'
                )
            )
        )
    )
);
