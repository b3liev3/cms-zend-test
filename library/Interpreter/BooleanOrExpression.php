<?php
    namespace Interpreter{
	class BooleanOrExpression extends OperatorExpression{
	    protected function doInterpret(InterpreterContext $context,$result_left,$result_right)
	    {
		$context->replace($this,$result_left || $result_right);
	    }
	}
}