<?php namespace Command{
    class CommandFactory{
	private static $_dir = "commands";
	
	static function getCommand($action = 'Default')
	{
	    if(preg_match('\/W/', $action)){
		throw new Exception("illegal characters in action");
	    }
	    $class = UCFirst(strtolower($action))."Command";
	    $file = self::$_dir.DIRECTORY_SEPARATOR."{$class}.php";
	    if(!file_exists($file)){
		throw new CommandNotFoundException("could not find '$file'");
	    }
	    require_once($file);
	    
	    if(!class_exists($class)){
		throw new CommandNotFoundException("no '$class' class located");
	    }
	    
	    $cmd = new $class();
	    return $cmd;
	}
    }
}