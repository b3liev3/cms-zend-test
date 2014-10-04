<?php
class CompositeController extends Zend_Controller_Action
{
    public function indexAction()
    {
	$main_army = new Composite\Army();
	
	//add some units
	$main_army->addUnit(new \Composite\Archer()); //4
	$main_army->addUnit(new Composite\LaserCannon()); //44
	
	//create a new army
	$sub_army = new Composite\Army();
	
	//add some units
	$sub_army->addUnit(new \Composite\Archer()); //4
	$sub_army->addUnit(new \Composite\Archer()); //4
	$sub_army->addUnit(new \Composite\Archer()); //4
	
	//add the second army to the first
	$main_army->addUnit($sub_army);
	
	//all the calculations behind the scenes
	print "attacking with strength: {$main_army->bombardStrength()}";
        exit;
    }
}