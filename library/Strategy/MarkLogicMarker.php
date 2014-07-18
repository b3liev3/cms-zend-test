<?php 
    namespace Strategy{
	class MarkLogicMarker extends Marker{
	    private $_engine;
	    function __construct($test){
		//$this->_engine = new MarkParse($test);
	    }
	    
	    function mark($response)
	    {
		//return $this->_engine->evalute($response);
		//dummy return value
		return true;
	    }
	}
}