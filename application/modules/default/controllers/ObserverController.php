<?php
    class ObserverController extends Zend_Controller_Action {
	
	function indexAction()
	{
	    $login = new \Observer\Login();
	    new Observer\SecurityMonitor($login);
	    new Observer\GeneralLogger($login);
	    new Observer\PartnershipTool($login);
	    $login->handleLogin('ppages', '1234', '192.168.0.212');
	    exit();
	}
	
    }