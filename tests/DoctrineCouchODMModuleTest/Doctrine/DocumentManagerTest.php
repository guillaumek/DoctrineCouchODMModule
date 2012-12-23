<?php

namespace DoctrineCouchODMModuleTest\Doctrine;

use Doctrine\ODM\CouchDB\DocumentManager;
use DoctrineCouchODMModuleTest\AbstractTest;

class DocumentManagerTest extends AbstractTest{

    public function testDocumentManager(){

        $documentManager = $this->getDocumentManager();

        $this->assertTrue($documentManager instanceof DocumentManager);
    }
}
