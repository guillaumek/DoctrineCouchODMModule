<?php
return array(
    'doctrine' => array(
    	'connection' => array(
    		'odm_default' => array(
    			'host' => 'localhost',
    			'ip' => '127.0.0.1',
    			'dbname' => 'doctrine_couch_odm_module_test'
    		)
    	),
        'configuration' => array(
            'odm_default' => array(
                'default_db' => 'doctrine_couch_odm_module_test',
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
