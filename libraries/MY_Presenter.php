<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Presenter {

    protected $resource = null;

    public function __construct($resource = null, $options = array())
    {
        $this->load($resource, $options);
    }

    public function load($resource, $options = array())
    {
        $this->resource = $resource;
    }

    public function __get($property)
    {
        return isset($this->resource->$property) ? $this->resource->$property : 'N/A';
    }
}
