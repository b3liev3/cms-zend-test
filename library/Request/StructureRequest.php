<?php
    namespace Request {
	class StructureRequest extends DecorateProcess {

	    function process(RequestHelper $req)
	    {
		print __CLASS__.":structuring request data.<br/>";
		$this->_processrequest->process($req);
	    }
	}
    }