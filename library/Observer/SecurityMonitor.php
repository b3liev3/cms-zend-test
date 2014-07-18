<?php
    namespace Observer {
	class SecurityMonitor extends LoginObserver {

	    function doUpdate(Login $login)
	    {
		$status = $login->getStatus();
		if ($status[0] == Login::LOGIN_WRONG_PASS) {
		    //send mail to sysadmin
		    echo __CLASS__ . ": sending mail to sysadmin<br/>";
		}
	    }
	}
    }