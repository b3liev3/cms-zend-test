<?php
class InterpreterController extends Zend_Controller_Action
{
    public function indexAction()
    {
	$context = new \Interpreter\InterpreterContext(); //front end for an associtative array
	
	$myvar = new Interpreter\VariableExpression('input','four');
	$myvar->interpret($context);
	
	echo $context->lookup($myvar).'<br/>'; //output:four
	
	
	$newvar = new Interpreter\VariableExpression('input');
	$newvar->interpret($context);
	echo $context->lookup($newvar).'<br/>'; //output:four
	
	$myvar->setValue('five');
	$myvar->interpret($context);
	echo $context->lookup($myvar).'<br/>'; //output:five
	echo $context->lookup($newvar).'<br/>'; //output:five
		
	//test2
	$newContext = new \Interpreter\InterpreterContext();
	$input = new Interpreter\VariableExpression('input');
	$statement = new Interpreter\BooleanOrExpression(
		new \Interpreter\EqualsExpression($input, new \Interpreter\LiteralExpression('four')), 
		new \Interpreter\EqualsExpression($input, new \Interpreter\LiteralExpression('4')));
	
	//Now, with my statement prepared, I am ready to provide a value for the input variable, and run the code:
	foreach(array("four","4","52") as $val){
	    $input->setValue($val);
	    print $val.'<br/>';
	    $statement->interpret($newContext);
	    if($newContext->lookup($statement)){
		print "top marks<br/>";
	    }else{
		print "dunce hat on<br/>";
	    }
	}

        exit;
    }
}