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

namespace DoctrineCouchODMModule\Options;

use Zend\Stdlib\AbstractOptions;

/**
 * Configuration options for a collector
 *
 * @license MIT
 * @link    http://www.doctrine-project.org/
 */
class CouchLoggerCollector extends AbstractOptions
{
    /**
     * @var string name to be assigned to the collector
     */
    protected $name = 'odm_default';

    /**
     * @var string|null service name of the configuration where the logger has to be put
     */
    protected $configuration;

    /**
     * @var string|null service name of the Logger to be used
     */
    protected $couchLogger;

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = (string) $name;
    }

    /**
     * Name of the collector
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string|null $configuration
     */
    public function setConfiguration($configuration)
    {
        $this->configuration = $configuration ? (string) $configuration : null;
    }

    /**
     * Configuration service name (where to set the logger)
     *
     * @return string
     */
    public function getConfiguration()
    {
        return $this->configuration ? $this->configuration : 'doctrine.configuration.odm_default';
    }

    /**
     * @param string|null $couchLogger
     */
    public function setCouchLogger($couchLogger)
    {
        $this->couchLogger = $couchLogger ? (string) $couchLogger : null;
    }

    /**
     * Logger service name
     *
     * @return string|null
     */
    public function getCouchLogger()
    {
        return $this->couchLogger;
    }
}
