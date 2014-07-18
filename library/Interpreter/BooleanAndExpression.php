<?php
    namespace Interpreter{
	class BooleanAndExpression extends OperatorExpression{
	    protected function doInterpret(InterpreterContext $context,$result_left,$result_right)
	    {
		$context->replace($this,$result_left && $result_right);
	    }
	}
}