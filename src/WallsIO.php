<?php

namespace ThiagoCI;

use stdClass;

class WallsIO
{
    // const API_URL = 'https://api.walls.io/v1';
    protected $api_url;

    protected $api_key;

    protected $data;

    public function __construct(string $api_key)
    {
        $this->api_url = 'https://api.walls.io/v1';
        $this->api_key = $api_key;
    }

     /**
     * __set
     *
     * @param  mixed $name
     * @param  mixed $value
     * @return void
     */
    public function __set($name, $value)
    {
        if (empty($this->data)) {
            $this->data = new stdClass();
        }

        $this->data->$name = $value;
    }
    
    /**
     * __isset
     *
     * @param  mixed $name
     * @return void
     */
    public function __isset($name)
    {
        return isset($this->data->$name);
    }
    
    /**
     * __get
     *
     * @param  mixed $name
     * @return void
     */
    public function __get($name)
    {
        $method = $this->toCamelCase($name);
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        if (method_exists($this, $name)) {
            return $this->$name();
        }

        return ($this->data->$name ?? null);
    }
    
    /**
     * data
     * 
     * @return object
     */
    public function data()
    {
        return $this->data;
    }

    /**
     * toCamelCase
     *
     * @param  mixed $string
     * @return string
     */
    protected function toCamelCase(string $string): string
    {
        $camelCase = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
        $camelCase[0] = strtolower($camelCase[0]);
        return $camelCase;
    }
}