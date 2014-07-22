<?php
    namespace Visitor {
	abstract class CompositeUnit extends Unit {
	    protected $_units = array();

	    public function getComposite()
	    {
		return $this;
	    }

	    protected function units()
	    {
		return $this->_units;
	    }

	    function removeUnit(Unit $unit)
	    {
		$this->_units = array_udiff($this->_units, array($unit), function($a, $b) {
			    return ($a === $b) ? 0 : 1;
			});
	    }

	    function addUnit(Unit $unit)
	    {
		if (in_array($unit, $this->_units, true)) {
		    return;
		}
		$unit->setDepth($this->depth+1);
		$this->_units[] = $unit;
	    }
	    
	    function accept(ArmyVisitor $visitor)
	    {
		parent::accept($visitor);
		foreach($this->_units as $thisunit){
		    $thisunit->accept($visitor);
		}
	    }
	}
    }