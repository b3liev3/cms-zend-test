<?php
class DecoratorController extends Zend_Controller_Action
{
    public function init()
    {
        
    }
    
    public function indexAction()
    {
	echo "<h3>Decorator Controller</h3>";
	
	$tile = new \Decorator\Plains();
	echo $tile->getWealthFactor().'<br/>'; //2
	
	$tile = new Decorator\DiamondDecorator(new \Decorator\Plains());
	echo $tile->getWealthFactor().'<br/>';
	
	$tile = new Decorator\PollutionDecorator(new \Decorator\Plains());
	echo $tile->getWealthFactor().'<br/>';
	
	
        exit;
    }
    

}