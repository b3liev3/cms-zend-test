<?php
    class CompositionController extends Zend_Controller_Action {

	public function init()
	{
	    /* Initialize action controller here */
	}

	public function indexAction()
	{
	    $lessons = array();

	    $lessons[] = new \Composition\Seminar(4, new Composition\TimedCostStrategy());
	    $lessons[] = new \Composition\Lecture(4, new Composition\FixedCostStrategy());
	    
	    $mgr = new \Composition\RegistrationMgr();

	    foreach ($lessons as $lesson) {
		$mgr->register($lesson);
	    }
	    
	    exit;
	}
    }