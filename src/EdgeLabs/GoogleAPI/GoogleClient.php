<?php

namespace EdgeLabs\GoogleAPI;

use Google_Client;
use Monolog\Logger;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Config\FileLocator;


/**
 * Class GoogleClient
 *
 * @author  Steve Todorov <steve.todorov@carlspring.com>
 * @package EdgeLabs\GoogleAPI
 */
abstract class GoogleClient
{

    /**
     * @var string
     */
    protected $clientId;

    /**
     * @var string
     */
    protected $serviceAccountName;

    /**
     * @var string (file content)
     */
    private $privateKey;

    /**
     * @param string $clientId     Your analytics client id
     * @param string $emailAddress Your service email address (don't forget generate the user in console and then allow read & analyze permissions in google analytics)
     * @param string $privateKey   Path to your private certificate file.
     */
    public function __construct($clientId, $emailAddress, $privateKey) {
        $this->clientId = $clientId;
        $this->serviceAccountName = $emailAddress;

        if(@file_exists($privateKey)){
            $this->privateKey = file_get_contents($privateKey);
        } else {
            $this->privateKey = $privateKey;
        }
    }

    /**
     * @param string $applicationName
     * @param array  $scopes
     *
     * @return \Google_Client
     */
    public function createClient($applicationName, array $scopes = array()) {
        $client = new Google_Client();
        $client->setApplicationName($applicationName);
        $client->setAccessType('offline_access');

        if($scopes){
            $client->setScopes($scopes);
        }

        return $client;
    }

    public function getPrivateKey() {
        if ($json = json_decode($this->privateKey)) {
            return $json->private_key;
        } else {
            return $this->privateKey;
        }
    }
}

?>
