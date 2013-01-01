<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * <http://www.doctrine-project.org>.
 */

namespace DoctrineCouchODMModule\Service;

use DoctrineModule\Service\AbstractFactory;

use Doctrine\CouchDB\HTTP\LoggingClient;

use Zend\ServiceManager\ServiceLocatorInterface;

use DoctrineCouchODMModule\Collector\CouchLoggerCollector;
use DoctrineCouchODMModule\Logging\DebugStack;
use DoctrineCouchODMModule\Logging\LoggerChain;

/**
 * Couch Logger Configuration ServiceManager factory
 *
 * @license MIT
 * @link    http://www.doctrine-project.org/
 */
class CouchLoggerCollectorFactory extends AbstractFactory
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var $options \DoctrineCouchODMModule\Options\CouchLoggerCollector */
        $options = $this->getOptions($serviceLocator, 'couch_logger_collector');
        
        if ($options->getCouchLogger()) {
            $debugStackLogger = $serviceLocator->get($options->getCouchLogger());
        } else {
            $debugStackLogger = new DebugStack();
        }

        /** @var $options \Doctrine\ODM\CouchDB\Configuration */
        $configuration = $serviceLocator->get($options->getConfiguration());
        
        $httpClient = $this->changeConnectionOptionLogging($serviceLocator, $options->getName());

        return new CouchLoggerCollector($httpClient, $options->getName());
    }
    
    protected function changeConnectionOptionLogging(ServiceLocatorInterface $sl, $name) {
    	$this->optionsClass = 'DoctrineCouchODMModule\Options\Connection';
    	$options = $this->getOptions($sl, 'connection', $name);
    	$this->optionsClass = 'DoctrineCouchODMModule\Options\CouchLoggerCollector';

    	// FIXME: Improve that part of setting the logging
    	$options->setLogging(true);
    	$dm = $sl->get("doctrine.documentmanager.{$name}");
    	$httpClient = $dm->getCouchDBClient()->getHttpClient();
    	
    	return $httpClient;
    }
    
    protected $optionsClass = 'DoctrineCouchODMModule\Options\CouchLoggerCollector';

    /**
     * {@inheritDoc}
     */
    public function getOptionsClass()
    {
        return $this->optionsClass;
    }
}
