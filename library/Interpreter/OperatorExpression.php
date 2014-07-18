<?php
    namespace Interpreter{
	abstract class OperatorExpression extends Expression{
	    protected $_left_op;
	    protected $_right_op;
	    
	    function __construct(Expression $left_op, Expression $right_op)
	    {
		$this->_left_op = $left_op;
		$this->_right_op = $right_op;
	    }
	    
	    protected abstract function doInterpret(InterpreterContext $context,$result_left,$result_right);
	    
	    function interpret(InterpreterContext $context)
	    {
		$this->_left_op->interpret($context);
		$this->_right_op->interpret($context);
		$result_left = $context->lookup($this->_left_op);
		$result_right = $context->lookup($this->_right_op);
		$this->doInterpret($context,$result_left,$result_right);
	    }
	}
}