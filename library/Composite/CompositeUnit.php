<?php
    namespace Composite {
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
		$this->_units[] = $unit;
	    }
	}
    }