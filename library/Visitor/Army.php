<?php
    namespace Visitor {
	class Army extends CompositeUnit {

	    function bombardStrength()
	    {
		$strength = 0;
		foreach ($this->_units as $unit) {
		    //echo get_class($unit).' '.$unit->bombardStrength().'<br/>';
		    $strength += $unit->bombardStrength();
		}
		return $strength;
	    }
	}
    }