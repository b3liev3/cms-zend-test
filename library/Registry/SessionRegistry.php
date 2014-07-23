<?php
    namespace Registry{
	class SessionRegistry extends Registry{
	    
	    private static $_instance = null;
	    	    
	    private function __construct()
	    {
		session_start();
	    }
	    
	    static function getInstance()
	    {
		if(is_null(self::$_instance)){
		    self::$_instance = new self();
		}
		return self::$_instance;
	    }
	    
	    protected function get($key)
	    {
		if(isset($_SESSION[__CLASS__][$key])){
		    return $_SESSION[__CLASS__][$key];
		}
		return null;
	    }
	    
	    protected function set($key,$val)
	    {
		$_SESSION[__CLASS__][$key] = $val;
	    }
	    
	    function setDSN($dsn)
	    {
		self::getInstance()->set('dsn',$dsn);
	    }
	    
	    function getDSN()
	    {
		return self::getInstance()->get("dsn");
	    }
	}
}