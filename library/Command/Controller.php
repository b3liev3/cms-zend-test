<?php
    namespace Command{
	class Controller{
	    private $_context;
	    
	    function __construct()
	    {
		$this->_context = new CommandContext();
	    }
	    
	    function getContext()
	    {
		return $this->_context;
	    }
	    
	    function process()
	    {
		$action = $this->_context->get('action');
		$action = (is_null($action)) ? 'default' : $action;
		$cmd = CommandFactory::getCommand($action);
		if(!$cmd->execute($this->context)){
		    //handle failure
		}else{
		    //success
		    //dispatch the view now
		}
	    }
	}
}