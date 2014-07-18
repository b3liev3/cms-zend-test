<?php
    namespace Interpreter{
	class InterpreterContext{
	    private $_expressionstore = array();
	    
	    function replace(Expression $exp, $value){
		$this->_expressionstore[$exp->getKey()] = $value;
	    }
	    
	    function lookup(Expression $exp){
		return $this->_expressionstore[$exp->getKey()];
	    }
	}
}