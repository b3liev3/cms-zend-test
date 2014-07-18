<?php
    namespace Observer{
	class GeneralLogger extends LoginObserver{
	    function doUpdate(Login $login)
	    {
		$status = $login->getStatus();
		//add login data to log
		print __CLASS__.": add loggin to data log<br/>";
	    }
	}
}