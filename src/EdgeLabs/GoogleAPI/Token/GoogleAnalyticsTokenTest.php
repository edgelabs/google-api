<?php

namespace CMS\GoogleAPIBundle\Services;

use Google_Auth_AssertionCredentials;
use Google_Client;
use Google_Service_Analytics;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Config\FileLocator;

/**
 * Class GoogleAnalyticsToken
 *
 * @author  Steve Todorov <steve.todorov@carlspring.com>
 * @package CMS\GoogleAPIBundle\Services
 */
class GoogleAnalyticsTokenTest {

    const INVALID_TOKEN = "Token is invalid or could not be retrieved!";

    /**
     * @var Session
     */
    private $session;

    /**
     * @var FileLocator
     */
    private $fileLocator;

    private $clientId;
    private $serviceAccountName;
    private $certificate;

    public function __construct($clientId, $emailAddress, $certificate) {
        $this->clientId = $clientId;
        $this->serviceAccountName = $emailAddress;
        $this->certificate = $certificate;
    }

    /**
     * Returns a token from google analytics which can be used to show statistics via js.
     *
     * Checkout https://github.com/google/google-api-php-client/blob/master/examples/service-account.php for more info.
     *
     * @return array
     */
    public function getToken() {
        $client = new Google_Client();
        $client->setApplicationName("dashboard statistics");
        $client->setAccessType('offline_access');
        $client->setScopes(array('https://www.googleapis.com/auth/analytics.readonly'));

        $service = new Google_Service_Analytics($client);

        if ($this->session->has('service_token')){
            $client->setAccessToken($this->session->get('service_token'));
        }
        $key = file_get_contents($this->certificate);
        $credential = new Google_Auth_AssertionCredentials(
            $this->serviceAccountName,
            array('https://www.googleapis.com/auth/analytics.readonly'),
            $key
        );
        $client->setAssertionCredentials($credential);
        if ($client->getAuth()->isAccessTokenExpired()) {
            $client->getAuth()->refreshTokenWithAssertion($credential);
        }

        $this->session->set('service_token', $client->getAccessToken());

        $token = json_decode($client->getAccessToken());

        return array('analytics_token' => ($token ? $token->access_token : self::INVALID_TOKEN), 'analytics_client_id' => $this->clientId);
    }

    public function setSession(Session $session) {
        $this->session = $session;
    }

    public function setFileLocator(FileLocator $locator) {
        $this->fileLocator = $locator;
    }
}

?>
