<?php
    namespace Request{
	abstract class DecorateProcess extends ProcessRequest{
	    protected $_processrequest;
	    
	    function __construct(ProcessRequest $pr)
	    {
		$this->_processrequest = $pr;
	    }
	}
}