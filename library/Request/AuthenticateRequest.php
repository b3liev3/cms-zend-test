<?php
    namespace Request {
	class AuthenticateRequest extends DecorateProcess {

	    function process(RequestHelper $req)
	    {
		print __CLASS__.":authetnicating request.<br/>";
		$this->_processrequest->process($req);
	    }
	}
    }