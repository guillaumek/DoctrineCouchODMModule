<?php

namespace DoctrineCouchODMModuleTest;

use PHPUnit_Framework_TestCase;
use Zend\Mvc\Application;

abstract class AbstractTest extends PHPUnit_Framework_TestCase
{

    protected $application;
    protected $serviceManager;


    protected static $applicationConfig;

    protected function setup(){

        $this->application = Application::init(self::$applicationConfig);
        $this->serviceManager = $this->application->getServiceManager();
    }

    public static function setApplicationConfig($applicationConfig)
    {
        self::$applicationConfig = $applicationConfig;
    }

    public function getDocumentManager()
    {
        return $this->serviceManager->get('doctrine.documentmanager.odm_default');
    }

    protected function tearDown()
    {
        $collections = $this->getDocumentManager()->getConnection()->selectDatabase('doctrineCouchODMModuleTest')->listCollections();
        foreach ($collections as $collection) {
            $collection->remove(array(), array('safe' => true));
        }
    }
}
