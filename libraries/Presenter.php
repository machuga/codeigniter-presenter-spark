<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Allow pass_through to existent methods/attributes
 */

class Presenter
{

    protected $ci           = null;
    protected $path         = null;
    protected $options      = array();
    protected $presenters   = array();

    public function __construct()
    {
        $this->ci = get_instance();
        $this->path = APPPATH.'presenters/';
    }

    public function load($presenter, $resource = null, $options = array(), $presenter_options = array())
    {
        $this->options['as']            = $presenter.'_presenter';
        $this->options['path']          = $this->path.$presenter.'_presenter.php';
        $this->options['class_name']    = ucfirst($presenter).'_Presenter';

        $this->options = array_merge($this->options, $options);

        $this->load_file();
        $this->load_presenter($resource, $presenter_options);
        $this->clean_up();
    }

    protected function load_file()
    {
        $class_exists = class_exists($this->options['class_name']);
        if ($class_exists)
        {
            log_message('error', "Unable to load class {$this->options['class_name']}");
        }
        else
        {
            $this->ci->load->file($this->options['path']);
        }
        return $class_exists;
    }

    protected function load_presenter($resource, $presenter_options)
    {
        extract($this->options);
        if ( ! in_array($as, $this->presenters) && isset($this->ci->{$as}))
        {
            log_message('error', "{$as} is already in use on the super-object, or this presenter is already loaded");
            return false;
        }
        else
        {
            $this->ci->{$as} = new $class_name($resource, $presenter_options);
            $this->presenters[$class_name] = $as;
            return true;
        }
    }

    protected function clean_up()
    {
        $this->options = array();
    }
}
