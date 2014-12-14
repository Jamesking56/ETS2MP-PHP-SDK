<?php namespace ETS2MP;

use League\Url\Url;

/**
 * Client class for communicating toETS2MP API.
 *
 * @package ETS2MP
 * @author James King <james@jamesking56.co.uk>
 * @license MIT
 * @version 0.1.0
 */
class Client {

    const BASE_URL = "http://api.ets2mp.com";

    protected $apiURL;

    protected $client;

    public function __construct(\GuzzleHttp\Client $client)
    {
        $this->apiURL = Url::createFromUrl(self::BASE_URL);
        $this->client = $client;
    }

    public function setSSL($ssl = true)
    {
        if($ssl)
        {
            $this->apiURL->getScheme("https");
        }
        else
        {
            $this->apiURL->getScheme("http");
        }
    }

    public function getServers()
    {
        $response = $this->client->get($this->apiURL->__toString());
        $response = json_decode($response);

        return $response;
    }

} 