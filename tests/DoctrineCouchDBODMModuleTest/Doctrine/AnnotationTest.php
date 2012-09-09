<?php

namespace DoctrineCouchDBODMModuleTest\Doctrine;

use DoctrineCouchDBODMModuleTest\AbstractTest;

class AnnotationTest extends AbstractTest
{
    public function testAnnotation(){

        $documentManager = $this->getDocumentManager();
        $metadata = $documentManager->getClassMetadata('DoctrineCouchDBODMModuleTest\Assets\Document\Annotation');
    }
}
