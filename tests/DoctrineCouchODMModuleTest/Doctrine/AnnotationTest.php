<?php

namespace DoctrineCouchODMModuleTest\Doctrine;

use DoctrineCouchODMModuleTest\AbstractTest;

class AnnotationTest extends AbstractTest
{
    public function testAnnotation(){

        $documentManager = $this->getDocumentManager();
        $metadata = $documentManager->getClassMetadata('DoctrineCouchODMModuleTest\Assets\Document\Annotation');
    }
}
