<?php
    namespace Registry{
	class ApplicationRegistry extends Registry{
	    private static $_instance = null;
	    
	    private $_freezdir = "data";
	    
	    private $_values = array();
	    
	    private $_mtimes = array();
	    
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
		$path = $this->_freezdir.DIRECTORY_SEPARATOR.$key;
		if(file_exists($path)){
		    clearstatcache(); // if the same file is being checked multiple times within a single script, and that file is in danger of being removed or changed during that script's operation, you may elect to clear the status cache
		    $mtime = filemtime($path); //This function returns the time when the data blocks of a file were being written to, that is, the time when the content of the file was changed.
		    if(!isset($this->_mtimes[$key])){
			$this->_mtimes[$key] = 0;
		    }
		    if($mtime > $this->_mtimes[$key]){
			$data = file_get_contents($path);
			$this->_mtimes[$key] = $mtime;
			return ($this->_values[$key] = unserialize($data));
		    }
		}
		if(isset($this->_values[$key])){
		    return $this->_values[$key];
		}
		
		return null;
		
	    }
	    
	    protected function set($key,$val)
	    {
		$this->_values[$key] = $val;
		$path = $this->_freezdir.DIRECTORY_SEPARATOR.$key;
		file_put_contents($path,serialize($val));
		$this->_mtimes[$key] = time();
	    }	
	    
	    static function setDSN($dsn)
	    {
		self::getInstance()->set('dsn',$dsn);
	    }
	    
	    static function getDSN()
	    {
		return self::getInstance()->get("dsn");
	    }
	    
	    static function getRequest()
	    {
		//see command pattern!!!
	    }
	}
}
