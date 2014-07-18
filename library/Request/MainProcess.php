<?php
    namespace Request{
	class MainProcess extends ProcessRequest{
	    function process(RequestHelper $req)
	    {
		print __CLASS__.": doing something useful with request.<br/>";
	    }
	}
}