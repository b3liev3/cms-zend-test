<?php
    namespace Visitor{
	class TaxCollectionVisitor extends ArmyVisitor{
	    private $_due = 0;
	    private $_report = "";
	    
	    function visit(Unit $node)
	    {
		$this->_levy($node,1);
	    }
	    
	    function visitArcher(Archer $node)
	    {
		$this->_levy($node,2);
	    }
	    
	    function visitCavalry(Cavalry $node)
	    {
		$this->_levy($node,3);
	    }
	    
	    function visitTroopCarrier(TroopCarrier $node)
	    {
		$this->_levy($node,5);
	    }
	    
	    private function _levy(Unit $unit, $amount)
	    {
		$this->_report .= "tax levied for ".get_class($unit);
		$this->_report .= ": {$amount}<br/>";
		$this->_due += $amount;
	    }
	    
	    function getReport()
	    {
		return $this->_report;
	    }
	    
	    function getTax()
	    {
		return $this->_due;
	    }
	}
}