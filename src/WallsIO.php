<?php

namespace ThiagoCI\WallsIO;

use GuzzleHttp\Client;
class WallsIO
{
    protected $api_url;

    protected $api_key;

    protected $http;

    public function __construct(string $api_key)
    {
        $this->api_url = 'https://api.walls.io';
        $this->api_key = [
            'access_token' => $api_key
        ];
        $this->http = new Client(['base_uri' => $this->api_url]);
    }
}