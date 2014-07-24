<?php
    namespace FrontController{
	class ApplicationHelper{
	    private static $_instance = null;
	    
	    private $_config = "data/options.xml";
	    
	    private function __construct() {}
	    
	    static function getInstance()
	    {
		if (is_null(self::$_instance)) {
		    self::$_instance = new self();
		}
		return self::$_instance;
	    }
	    
	    function init()
	    {
		$dsn = \Registry\ApplicationRegistry::getDSN();
		if(!is_null($dsn)){
		    return;
		}
		
		$this->getOptions();
	    }
	    
	    private function getOptions()
	    {
		$this->ensure(file_exists($this->_config),"Count not find options file");
		$options = simplexml_load_file($this->_config);
		$dsn = (string)$options->dsn;
		$this->ensure($dsn,"No DSN found");
		\Registry\ApplicationRegistry::setDSN($dsn);
	    }
	    
	    private function ensure($expr,$message)
	    {
		if(!expr){
		    throw new Exception($message);
		}
	    }
	}
}