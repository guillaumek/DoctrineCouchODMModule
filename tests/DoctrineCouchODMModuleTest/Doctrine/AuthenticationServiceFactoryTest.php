<?php

namespace DoctrineCouchODMModuleTest\Doctrine;

use DoctrineCouchODMModuleTest\AbstractTest;

class AuthenticationServiceFactoryTest extends AbstractTest
{
    public function testAuthenticationServiceFactory(){

        $authenticationService = $this->serviceManager->get('doctrine.authenticationservice.odm_default');
        $this->assertInstanceOf('Zend\Authentication\AuthenticationService', $authenticationService);
    }
}
