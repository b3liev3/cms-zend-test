<?php
class VisitorController extends Zend_Controller_Action
{
    
    public function indexAction()
    {
	echo "<h1>Visitor pattern</h1>";
	
	echo "<h2>Dumb text</h2>";
	$main_army = new \Visitor\Army();
	$main_army->addUnit(new \Visitor\Archer());
	$main_army->addUnit(new \Visitor\LaserCannon());
	$main_army->addUnit(new \Visitor\Cavalry());
	
	$textdump = new \Visitor\TextDumpArmyVisitor();
	$main_army->accept($textdump);
	print $textdump->getText();
	
	//
	echo "<h2>Taxes</h2>";
	$anotherArmy = new \Visitor\Army();
	$anotherArmy->addUnit(new \Visitor\Archer());
	$anotherArmy->addUnit(new \Visitor\LaserCannon());
	$anotherArmy->addUnit(new \Visitor\Cavalry());
	
	$taxCollector = new Visitor\TaxCollectionVisitor();
	$anotherArmy->accept($taxCollector);
	
	print $taxCollector->getReport();
	print "TOTAL: ";
	print $taxCollector->getTax()."<br/>";
	exit;
    }
  
    
}