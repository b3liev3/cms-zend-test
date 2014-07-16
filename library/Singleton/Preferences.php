<?php
    namespace Singleton {
	class Preferences {
	    private $_props;
	    
	    private static $instance;

	    private function __construct()
	    {
		//Nothing
	    }
	    
	    public static function getInstance()
	    {
		if(empty(self::$instance)){
		    self::$instance = new Preferences();
		}
		return self::$instance;
	    }

	    public function setProperty($key, $val)
	    {
		$this->_props[$key] = $val;
	    }
	    
	    public function getProperty($key)
	    {
		return $this->_props[$key];
	    }
	}
    }