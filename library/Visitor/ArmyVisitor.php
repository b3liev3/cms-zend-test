<?php
    namespace Visitor {
	abstract class ArmyVisitor{

	    abstract function visit(Unit $node);
	    
	    function visitArcher(Archer $node)
	    {
		$this->visit($node);
	    }
	    
	    function visitCavalry(Cavalry $node)
	    {
		$this->visit($node);
	    }
	    
	    function visitLaserCannon(LaserCannon $node)
	    {
		$this->visit($node);
	    }
	    
	    function visitTroopCarrier(TroopCarrier $node)
	    {
		$this->visit($node);
	    }
	    
	    function visitArmy(Army $node)
	    {
		$this->visit($node);
	    }
	}
    }