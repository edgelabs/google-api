<?php

namespace EdgeLabs\GoogleAPI\Token;

use EdgeLabs\GoogleAPI\GoogleClient;
use Google_Auth_AssertionCredentials;
use Google_Service_Analytics;

/**
 * Class GoogleAnalyticsToken
 *
 * @author  Steve Todorov <steve.todorov@carlspring.com>
 * @package EdgeLabs\GoogleAPI\Token
 */
class GoogleAnalyticsToken extends GoogleClient
{

    /**
     * Returns a token from google analytics which can be used to show statistics via js.
     *
     * Checkout https://github.com/google/google-api-php-client/blob/master/examples/service-account.php for more info.
     *
     * @return array
     */
    public function getToken() {
        $scopes = array(Google_Service_Analytics::ANALYTICS_READONLY);
        $client = $this->createClient('dashboard statistics', $scopes);

        //$service = new Google_Service_Analytics($client);

        if (isset($_SESSION['service_token']) && !empty($_SESSION['service_token'])){
            $client->setAccessToken($_SESSION['service_token']);
        }

        $credential = new Google_Auth_AssertionCredentials($this->serviceAccountName, $scopes, $this->privateKey);
        $client->setAssertionCredentials($credential);
        if ($client->getAuth()->isAccessTokenExpired()) {
            $client->getAuth()->refreshTokenWithAssertion($credential);
        }

        $_SESSION['service_token'] = $client->getAccessToken();

        $token = json_decode($client->getAccessToken());

        return array('token' => ($token ? $token->access_token : self::INVALID_TOKEN), 'client_id' => $this->clientId);
    }
}

