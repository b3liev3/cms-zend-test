<?php
    namespace FrontController {
	class Controller {
	    private $applicationHelper;

	    private function __construct(){}
	    
	    static function run()
	    {
		$instance = new self();
		$instance->init();
		$instance->handleRequest();
	    }
	    
	    function init()
	    {
		$applicationHelper = ApplicationHelper::getInstance();
		$applicationHelper->init();
	    }
	    
	    function handleRequest()
	    {
		$request = \Registry\ApplicationRegistry::getRequest();
		$commandResolver = new CommandResolver();
		$command = $commandResolver->getCommand($request);
		$command->execute($request);
	    }
	}
    }