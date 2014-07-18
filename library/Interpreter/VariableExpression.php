<?php
    namespace Interpreter{
	class VariableExpression extends Expression{
	    private $_name;
	    private $_val;
	    
	    function __construct($name,$val = null)
	    {
		$this->_name = $name;
		$this->_val = $val;
	    }
	    
	    function interpret(InterpreterContext $context)
	    {
		if(!is_null($this->_val)){
		    $context->replace($this,$this->_val);
		    $this->_val = null;
		}
	    }
	    
	    function setValue($value)
	    {
		$this->_val = $value;
	    }
	    
	    function getKey()
	    {
		return $this->_name;
	    }
	}
}