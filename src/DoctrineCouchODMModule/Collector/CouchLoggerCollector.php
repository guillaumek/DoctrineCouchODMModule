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
namespace DoctrineCouchODMModule\Collector;


use Doctrine\CouchDB\HTTP\LoggingClient;

use ZendDeveloperTools\Collector\CollectorInterface;
use ZendDeveloperTools\Collector\AutoHideInterface;

use Zend\Mvc\MvcEvent;

use DoctrineCouchODMModule\Logging\DebugStack;

/**
 * Collector to be used in ZendDeveloperTools to record and display Couch
 * queries
 *
 * @license MIT
 * @link    www.doctrine-project.org
 */
class CouchLoggerCollector implements CollectorInterface, AutoHideInterface
{
    /**
     * Collector priority
     */
    const PRIORITY = 10;

    /**
     * @var LoggingClient
     */
    protected $couchLogger;

    /**
     * @var string
     */
    protected $name;

    /**
     * @param DebugStack $couchLogger
     * @param string     $name
     */
    public function __construct(LoggingClient $couchLogger, $name)
    {
        $this->couchLogger = $couchLogger;
        $this->name = (string) $name;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function getPriority()
    {
        return static::PRIORITY;
    }

    /**
     * {@inheritDoc}
     */
    public function collect(MvcEvent $mvcEvent)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function canHide()
    {
        return empty($this->couchLogger->requests);
    }

    /**
     * @return int
     */
    public function getQueryCount()
    {
        return count($this->couchLogger->requests);
    }

    /**
     * @return array
     */
    public function getQueries()
    {
        return $this->couchLogger->requests;
    }

    /**
     * @return float
     */
    public function getQueryTime()
    {
    	return $this->couchLogger->totalDuration;
    }
}
