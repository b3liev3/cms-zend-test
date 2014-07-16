<?php
    namespace Employee {
	abstract class Employee {
	    protected $_name;
	    private static $_types = array('Minion', 'CluedUp', 'WellConnected');

	    function __construct($name)
	    {
		$this->name = $name;
	    }

	    abstract function fire();

	    static function recruit($name)
	    {
		$num = rand(1, count(self::$_types)) - 1;
		$class = '\Employee\\'.self::$_types[$num];
		return new $class($name);
	    }
	}
    }