<?php
    namespace Observer{
	class PartnershipTool extends LoginObserver{
	    function doUpdate(Login $login)
	    {
		$satus = $login->getStatus();
		//check IP address
		//set cookie if it matches a list
		print __CLASS__.": set cookie if IP matches a list<br/>";
	    }
	}
}