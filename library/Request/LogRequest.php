<?php
    namespace Request {
	class LogRequest extends DecorateProcess {

	    function process(RequestHelper $req)
	    {
		print __CLASS__.":loggin request.<br/>";
		$this->_processrequest->process($req);
	    }
	}
    }