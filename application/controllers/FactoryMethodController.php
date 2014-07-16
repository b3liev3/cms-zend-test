<?php
class FactoryMethodController extends Zend_Controller_Action
{
    public function indexAction()
    {
	$blogsCommsManager = new FactoryMethod\BloggsCommsManager();
	$adapter = $blogsCommsManager->make(FactoryMethod\CommsManager::APPT);
	
	echo $blogsCommsManager->getHeaderText();
	exit;
    }
}








