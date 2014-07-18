<?php namespace Observer{
    abstract class LoginObserver implements Observer{
	private $_login;
	
	function __construct(Login $login)
	{
	    $this->_login = $login;
	    $login->attach($this);
	}
	
	function update(Observable $observable)
	{
	    if($observable === $this->_login){
		$this->doUpdate($observable);
	    }
	}
	
	abstract function doUpdate(Login $login);
    }
}