<?php

namespace ThiagoCI;

class Post extends WallsIO
{
    public function __construct($api_key)
    {
        $this->api_key = $api_key;
    }
    public function send()
    {
        echo "Send: {$this->api_key}";
    }
   
}