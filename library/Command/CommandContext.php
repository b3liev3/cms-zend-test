<?php
    namespace Command {
    class CommandContext { 
	private $_params = array();
	private $_error = "";
    
	function __construct() { 
	    $this->_params = $_REQUEST;
	}
	
	function addParam( $key, $val )
	{ 
	    $this->_params[$key] = $val;
	}
	
	function get( $key ){
	    if ( isset( $this->_params[$key] ) ) {
		return $this->_params[$key];
	    } 
	    return null;
	}
	
	function setError( $error )
	{ 
	    $this->_error = $error;
	}
	
	function getError(){ 
	    return $this->_error;
	}	
	
    }
    
}

