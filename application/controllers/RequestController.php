<?php
    class RequestController extends Zend_Controller_Action{
	public function init(){}
	
	public function indexAction()
	{
	    echo "<h3>Decorator request controller</h3>";
	    $process = new \Request\AuthenticateRequest(new \Request\StructureRequest(new \Request\LogRequest(new Request\MainProcess())));
	    $process->process(new \Request\RequestHelper());
	    exit;
	}
    }