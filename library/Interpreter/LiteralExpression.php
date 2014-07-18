<?php
    namespace Interpreter{
	class LiteralExpression extends Expression{
	    private $_value;
	    
	    function __construct($value){
		$this->_value = $value;
	    }
	    
	    function interpret(InterpreterContext $context)
	    {
		$context->replace($this,$this->_value);
	    }
	}
}