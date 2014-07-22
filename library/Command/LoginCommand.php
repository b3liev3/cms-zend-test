<?php
    namespace Command{
	class LoginCommand extends Command{
	    /**
	     * 
	     * The CommandContext is the "RequestHelper" object
	     * @param \Command\CommandContext $context
	     */
	    function execute(CommandContext $context)
	    {
		/*
		 //Imaginary classes
		$user = $context->get('username');
		$pass = $context->get('pass');
		
		$manager = Registry::getAccesManager();
		$userObj = $manager->login($user,$pass);
		if(is_null($userObj)){
		    $context->setError($manager->getError());
		    return false;
		}
		
		$context->addParam("user",$userObj);
		*/
		return true;
		
	    }
	}
}