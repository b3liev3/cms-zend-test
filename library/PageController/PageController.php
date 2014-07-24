<?php namespace PageController{
    abstract class PageController{
	abstract function process();
	
	function forward($resource)
	{
	    include($resource);
	    exit(0);
	}
	
	function getRequest()
	{
	    return \Registry\ApplicationRegistry::getRequest();
	}
    }
}