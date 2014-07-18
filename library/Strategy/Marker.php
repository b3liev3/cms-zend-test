<?php
    namespace Strategy{
	abstract class Marker{
	    protected $_test;
	    function __construct($test)
	    {
		$this->_test = $test;
	    }
	    
	    abstract function mark($response);
	}
}