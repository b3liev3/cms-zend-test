<?php
    namespace Interpreter {
	abstract class Expression {
	    private static $_keycount = 0;
	    private $_key;

	    abstract function interpret(InterpreterContext $context);

	    function getKey()
	    {
		if (!isset($this->_key)) {
		    self::$_keycount++;
		    $this->_key = self::$_keycount;
		}
		return $this->_key;
	    }
	}
    }