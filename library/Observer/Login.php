<?php namespace Observer{
    class Login implements Observable{
	private $_observers = array();
	private $_storage;
	private $_status = array();
	
	const LOGIN_USER_UNKNOWN = 1;
	const LOGIN_WRONG_PASS = 2;
	const LOGIN_ACCESS = 3;
	
	function handleLogin($user,$pass,$ip)
	{
	    $isvalid = false;
	    switch(rand(1,3)){
		case 1:
		    $this->setStatus(self::LOGIN_ACCESS,$user,$ip);
		    $isvalid = true; 
		    break;
		case 2:
		    $this->setStatus(self::LOGIN_WRONG_PASS,$user,$ip);
		    $isvalid = false;
		    break;
		case 3:
		    $this->setStatus(self::LOGIN_USER_UNKNOWN,$user,$ip);
		    $isvalid = false;
		    break;
	    }
	    $this->notify();
	    return $isvalid;
	}
	
	private function setStatus($status,$user,$ip)
	{
	    $this->_status = array($status,$user,$ip);
	}
	
	function getStatus()
	{
	    return $this->_status;
	}
	
	//observable methods
	
	function attach(Observer $observer)
	{
	    $this->_observers[] = $observer;
	}
	
	function detach(Observer $observer)
	{
	    $this->_observers = array_filter($this->_observers, function($a) use ($observer){return(!($a === $observer));});
	}
	
	function notify()
	{
	    foreach($this->_observers as $o)
	    {
		$o->update($this);
	    }
	}

    }
}