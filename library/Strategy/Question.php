<?php
    namespace Strategy{
	abstract class Question{
	    protected $_prompt;
	    protected $_marker;
	    
	    function __construct($prompt, Marker $marker)
	    {
		$this->_marker = $marker;
		$this->_prompt = $prompt;
	    }
	    
	    function mark($response){
		return $this->_marker->mark($response);
	    }
	}
}