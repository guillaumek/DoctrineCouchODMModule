<?php

namespace DoctrineCouchODMModuleTest\Doctrine;

use DoctrineCouchODMModuleTest\AbstractTest;

class AuthenticationStorageFactoryTest extends AbstractTest
{
    public function testAuthenticationStorageFactory(){

        $storage = $this->serviceManager->get('doctrine.authenticationstorage.odm_default');
        $this->assertInstanceOf('Zend\Authentication\Storage\StorageInterface', $storage);
    }
}
