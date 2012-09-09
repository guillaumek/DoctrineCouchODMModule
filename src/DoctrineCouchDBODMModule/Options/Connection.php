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
namespace DoctrineCouchDBODMModule\Options;

use Zend\Stdlib\AbstractOptions;

/**
 * Connection options for doctrine couchdb
 *
 * @license MIT
 * @link    http://www.doctrine-project.org/
 * @since   0.1.0
 * @author  Tim Roediger <superdweebie@gmail.com>
 */
class Connection extends AbstractOptions
{

    /**
     * The server with the couchdb instance you want to connect to
     *
     * @var string
     */
    protected $server = 'localhost';

    /**
     * Port to connect over
     *
     * @var string
     */
    protected $port = '5984';

    /**
     * Username if using couchdb auth
     *
     * @var string
     */
    protected $user = null;

    /**
     * Password if using couchdb auth
     *
     * @var string
     */
    protected $password = null;

    /**
     * If you want to connect to a specific database
     *
     * @var string
     */
    protected $dbname = null;

    /**
     * Further connection options defined by couchdb-odm
     *
     * @var array
     */
    protected $options = array();

    /**
     *
     * @return string
     */
    public function getServer() {
        return $this->server;
    }

    /**
     *
     * @param string $server
     * @return \DoctrineCouchDBODMModule\Options\Connection
     */
    public function setServer($server) {
        $this->server = (string) $server;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getPort() {
        return $this->port;
    }

    /**
     *
     * @param string $port
     * @return \DoctrineCouchDBODMModule\Options\Connection
     */
    public function setPort($port) {
        $this->port = (string) $port;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getUser() {
        return $this->user;
    }

    /**
     *
     * @param string $user
     * @return \DoctrineCouchDBODMModule\Options\Connection
     */
    public function setUser($user) {
        $this->user = (string) $user;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     *
     * @param string $password
     * @return \DoctrineCouchDBODMModule\Options\Connection
     */
    public function setPassword($password) {
        $this->password = (string) $password;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getDbname() {
        return $this->dbname;
    }

    /**
     *
     * @param string $dbname
     * @return \DoctrineCouchDBODMModule\Options\Connection
     */
    public function setDbname($dbname) {
        $this->dbname = (string) $dbname;
        return $this;
    }

    /**
     *
     * @return array
     */
    public function getOptions() {
        return $this->options;
    }

    /**
     *
     * @param array $options
     * @return \DoctrineCouchDBODMModule\Options\Connection
     */
    public function setOptions($options) {
        $this->options = $options;
        return $this;
    }
}