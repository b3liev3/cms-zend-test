<?php
class SingletonController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $pref = Singleton\Preferences::getInstance();
	$pref->setProperty("name","matt");
	unset($pref);
	
	$pref2 = Singleton\Preferences::getInstance();
	print $pref2->getProperty("name");
	
	exit;
    }
}