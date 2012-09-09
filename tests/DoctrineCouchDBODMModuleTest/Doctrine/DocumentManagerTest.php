<?php

namespace DoctrineCouchDBODMModuleTest\Doctrine;

use Doctrine\ODM\CouchDB\DocumentManager;
use DoctrineCouchDBODMModuleTest\AbstractTest;

class DocumentManagerTest extends AbstractTest{

    public function testDocumentManager(){

        $documentManager = $this->getDocumentManager();

        $this->assertTrue($documentManager instanceof DocumentManager);
    }
}
