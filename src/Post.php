<?php

namespace ThiagoCI\WallsIO;

class Post extends WallsIO
{    
    /**
     * Post:
     * Add your token
     * @param  string $api_key
     * @return void
     */
    public function __construct(string $api_key)
    {
        parent::__construct($api_key);
    }
        
    /**
     * send : /v1/posts
     * POST /posts Add a new Native Post
     * https://github.com/DieSocialisten/Walls.io-API-Docs/blob/master/endpoints/POST_posts.md
     * @param  array $parameters
     * @return void
     */    

    public function new(array $parameters)
    {
        try {
            $http = $this->http->request('POST','/v1/posts', [
                'json' => array_merge($this->api_key, $parameters)
            ]);
            return json_decode($http->getBody()->getContents());
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * send : /v1/posts
     * GET /posts Get a list of posts
     * https://github.com/DieSocialisten/Walls.io-API-Docs/blob/master/endpoints/GET_posts.md
     * @param  array $parameter
     * @return void
     */
    public function list(array $parameters)
    {
        try {
            $http = $this->http->request('GET','/v1/posts', [
                'query' => array_merge($this->api_key,$parameters)
            ]);
            return json_decode($http->getBody()->getContents());
        } catch (\Exception $e) {
            return false;
        }
    }
    
    /**
     * rss : /v1/posts.rss
     * GET /posts.rss Get an RSS feed with the wall's posts
     * https://github.com/DieSocialisten/Walls.io-API-Docs/blob/master/endpoints/GET_posts.rss.md
     * @param  array $parameters
     * @return void
     */
    public function rss(?array $parameters = [])
    {
        try {
            $http = $this->http->request('GET','/v1/posts.rss', [
                'query' => array_merge($this->api_key,$parameters)
            ]);
            return $http->getBody()->getContents();
        } catch (\Exception $e) {
            return false;
        }
    }   
}