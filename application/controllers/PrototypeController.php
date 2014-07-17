<?php
    class PrototypeController extends Zend_Controller_Action {

	public function init()
	{
	    /* Initialize action controller here */
	}

	public function indexAction()
	{
	   $factory = new Prototype\TerrainFactory(new \Prototype\EarthSea(-1), new \Prototype\MarsPlains(), new \Prototype\EarthForest());
	   exit;
	}
    }