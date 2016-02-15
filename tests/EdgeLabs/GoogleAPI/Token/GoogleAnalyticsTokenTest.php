<?php

use EdgeLabs\GoogleAPI\Token\GoogleAnalyticsToken;

/**
 * Class GoogleAnalyticsTokenTest
 *
 * @author  Steve Todorov <steve.todorov@carlspring.com>
 * @package EdgeLabs\GoogleAPI\Token
 */
class GoogleAnalyticsTokenTest extends \PHPUnit_Framework_TestCase
{

    public function testGoogleAnalyticsTokenP12()
    {
        $id = '896453552513-vktuq6qp87ss3ubugipj8teai4eq58fs.apps.googleusercontent.com';
        $email = '896453552513-vktuq6qp87ss3ubugipj8teai4eq58fs@developer.gserviceaccount.com';
        $key = base64_decode('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');

        $client = new GoogleAnalyticsToken($id, $email, $key);
        $result = $client->getToken();

        $this->assertArrayHasKey('token', $result);
        $this->assertArrayHasKey('client_id', $result);

        $this->assertEquals($id, $result['client_id']);
    }

    public function testGoogleAnalyticsTokenJSON()
    {
        $id = '896453552513-vktuq6qp87ss3ubugipj8teai4eq58fs.apps.googleusercontent.com';
        $email = '896453552513-vktuq6qp87ss3ubugipj8teai4eq58fs@developer.gserviceaccount.com';
        $key = <<<JSON
{
  "type": "service_account",
  "project_id": "testing-account-1094",
  "private_key_id": "2c40c90478d4e172d9ec0e757f6a146ca857e14a",
  "private_key": "-----BEGIN PRIVATE KEY-----\nMIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCExWyoWBSTno36\nXhsODot4emEGGc5TzTRhkgLDicDGrVM4hgcii2NC2BHzl4UbXQn5liYd6hirbvJA\n0r5+eKjtd7XLqSZwzvzn/zdL6heKsQINrnoU9+DT7PrqIJvP3ziFpGoBIAjhkqbz\nshCJNCZE6ivtKLvz2xFjRMDqsLLz4afPQBF0SiAafdEC2ShMLX74JrDt+bKreorv\n1g5S8m4M3RV1tpo0UQGp0pLmH+CDIHJ2OIRxDOFU2WOc21w9QrQdKiFTDpS1ZPhN\nToSJWWYa7cupaiJ2u8ANT2IBTSuqSAqMDzoYMaESoies/kG+2pIIfeauJShE5tKf\n7CpY2CbRAgMBAAECggEACZBzOFlH+i5UyfFXf5a6o04liRv4yf6hRFoRSua0dVtt\nAEhfYTSrTNhlyqdilksIeetACa2gY1EVsGe+AzxL5vdVqDsiIsQ2Ybv3zscpNPt1\nS2kDMFl+36VVmeIJd1r8JlxmqngVS7KVxj5QhKG2FAbObUIe7/0a7oy4XO+npHvF\nWmuXmTXLhdetrbLqBEldKVn0IOjGClp65/Mw18gqtCCxtq4SUlo9hLSshf5OpQRZ\nFzOL27C6cGxP9o9pNGZfGjVWIeQUqKvxd+6W9NK3MgOaB213VqffW2p3YEVhiIvE\niIhD2ZRZVgWDNnyXp60OPz/fhzrsVqCT0f0JrCTdJQKBgQC8eg1XWAX4a6aWaHzy\neyI0gzRoNDac+7XIdPwieZCY7FHwAlAVIbMxmpsBVsp/0IIEiv0emE6furDJFeq8\nzJnKU8tof7NkvLhkIlNwoVjg6tN1AeF/BM+IyiGEkNrmwrO/G6jQcXyTmZOBMmA3\nbk190liyy/UYXKt8ytOuHYR39wKBgQC0VmTihPR1IxcGQS5L4CcHuGWmiy/5DGmJ\nrqGzSwn13RCoqCx/hMkXiC80lKglW2yXC+VItu3AQ/P70KqvLQJN6QOaqeqH1KKz\nu+xVmwTpW4x7QVhxxH9GidhO1vJArc/+NIuzBvJ+uwEG5HoG1GPDWCNs3oe25IyK\nkDyQVvP1dwKBgQCm+I2XImDvqhbDyr9eZZ1w3gdwhUkYm5l4g8LWm9Fw2HLiaHof\nrmI8gJXvgr8Uqlh0w9jn4NBOiyqQij0Rk0RvTPq3keIQTWwhMZOwBRBi+UXps4fc\nahudOEynT1jN9BEfLdbJCrDtZbGaVFGO6cX2wIFZrHxuX7KAdINBDd9MEwKBgHPU\nYewUlad/KFS+HOxjRu5wg+na0K9YR5lFb1rnwbgHi6Gokxw8v6S7tgZBzVZhSHgk\nDdsMk9zASL/fISJu+GHuXoBCzv77lp13AK9jaF4yjSLFr/cyzMUT2Lma2fKtMUEH\nowsUVUEM//XbXn1wgbuAqxBMRkM0vQhq6FuVXhC1AoGBAJ6TsMnb+8mT+XI/tJHw\npMyINBiYYhb9m1R3tCrhoTE9SyhhUNOn7yL6lznmBNCywuAFNRtKnyDHRzWAF/dN\np2OrTBmSG0kM4s4lLbs02ZMkud17bvrJ210/puBfk3mz46xgA6X++B4/xXIkoMTo\n7Pyn+YZpU1ti9LKPz6C5y8tP\n-----END PRIVATE KEY-----\n",
  "client_email": "896453552513-vktuq6qp87ss3ubugipj8teai4eq58fs@developer.gserviceaccount.com",
  "client_id": "896453552513-vktuq6qp87ss3ubugipj8teai4eq58fs.apps.googleusercontent.com",
  "auth_uri": "https://accounts.google.com/o/oauth2/auth",
  "token_uri": "https://accounts.google.com/o/oauth2/token",
  "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
  "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/896453552513-vktuq6qp87ss3ubugipj8teai4eq58fs%40developer.gserviceaccount.com"
}
JSON;

        $client = new GoogleAnalyticsToken($id, $email, $key);
        $result = $client->getToken();

        $this->assertArrayHasKey('token', $result);
        $this->assertArrayHasKey('client_id', $result);

        $this->assertEquals($id, $result['client_id']);
    }

}

?>
