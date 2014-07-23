<?php
    namespace Registry {
	class RequestRegistry extends Registry {
	    private static $_instance = null;
	    private $_values = array();

	    private function __construct() {}

	    static function getInstance()
	    {
		if (is_null(self::$_instance)) {
		    self::$_instance = new self();
		}
		return self::$_instance;
	    }

	    protected function get($key)
	    {
		if (isset($this->_values[$key])) {
		    return $this->_values[$key];
		}
		return null;
	    }

	    protected function set($key, $value)
	    {
		$this->_values[$key] = $value;
	    }

	    /*
	    function isEmpty()
	    {
		return empty($this->_values);
	    }

	    function isPopulated()
	    {
		return !$this->isEmpty();
	    }

	    function clear()
	    {
		$this->_values = array();
	    }
	    */
	    
	    static function getRequest()
	    {
		//see command pattern!!!
	    }
	}
    }
