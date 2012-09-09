<?php

namespace DoctrineCouchDBODMModuleTest\Doctrine;

use DoctrineCouchDBODMModuleTest\Assets\Document\Simple;
use DoctrineCouchDBODMModuleTest\AbstractTest;

class PersistTest extends AbstractTest
{

    public function testPersist(){

        $documentManager = $this->getDocumentManager();

        $simple = new Simple();
        $simple->setName('lucy');

        $documentManager->persist($simple);
        $documentManager->flush();
        $id = $simple->getId();

        $repository = $documentManager->getRepository(get_class($simple));
        $simple = $repository->find($id);

        $this->assertEquals('lucy', $simple->getName());
    }
}
